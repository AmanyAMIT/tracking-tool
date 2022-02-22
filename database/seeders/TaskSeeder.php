<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tasks')->insert([
            'name' => "HTML Task 1",
            'marks' => '10',
            'descriptions' => 'some desc',
            'requirements' => 'some reqs',
            'task_category_id' => '1',
            'diploma_id' => '1',
            'client_id' => '1'
        ]);
    }
}
