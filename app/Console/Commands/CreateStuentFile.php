<?php

namespace App\Console\Commands;

use App\Models\Student;
use App\Models\FileHistory;
use Illuminate\Console\Command;
use Spatie\SimpleExcel\SimpleExcelWriter;

class CreateStuentFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csv:generate {number}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used to create number of student row create in a csv file.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return Command::SUCCESS;
        try {
            $file_name = 'file_' . time() . '.csv';
            $path_to_csv = storage_path('csv');
            $number_of_rows = $this->argument('number');
            !is_dir($path_to_csv) ? mkdir(storage_path('csv')) : $path_to_csv;
            $create = FileHistory::create(['name' => $file_name]);
            $data = Student::factory($number_of_rows)->raw();
            $writer = SimpleExcelWriter::create($path_to_csv . '/' . $file_name)
                ->addRows($data);
            return Command::SUCCESS;
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
