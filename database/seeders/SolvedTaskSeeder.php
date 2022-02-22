<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SolvedTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('solvedtasks')->insert([
            'user_id' => '1',
            'task_id' => '1',
            'task_file' => '0',
            'status' => '0'
        ]);
    }
}
