<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('clients')->insert([
        //     'name' => 'client',
        //     'email' => 'client@info.com',
        //     'password' => Hash::make('client123'),
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        // ]);
    }
}
