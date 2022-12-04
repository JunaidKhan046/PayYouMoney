<?php

namespace App\Jobs;

use App\Models\Student;
use App\Models\FileHistory;
use App\Events\JobCompleted;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Spatie\SimpleExcel\SimpleExcelReader;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ProcessCsvFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 3;

     /**
     * The maximum number of unhandled exceptions to allow before failing.
     *
     * @var int
     */
    public $maxExceptions = 2;

    protected $file;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try{
            $path = storage_path('csv/');
            $file_name = $path.$this->file;
            $rows = SimpleExcelReader::create($file_name)
            ->getRows()
            ->each(function(array $rowProperties) {
            Student::create($rowProperties);
            });
            FileHistory::where('name', $this->file)->delete();
            event(new JobCompleted);
        }catch(\Exception $e){
            Log::error($e->getMessage());
        }   
    }
}
