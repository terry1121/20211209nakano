<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = ['body' => 'test1',];
        DB::table('todos')->insert($param);
        $param = ['body' => 'test2',];
        DB::table('todos')->insert($param);
    }
}
