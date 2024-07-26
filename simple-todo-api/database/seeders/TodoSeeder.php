<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("todos")->insert([
           "title" => "Makan"
        ]);

        DB::table("todos")->insert([
            "title" => "Turu"
        ]);

        DB::table("todos")->insert([
            "title" => "Ngoding"
        ]);

    }
}
