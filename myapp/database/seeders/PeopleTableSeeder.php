<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            'name' => 'taro',
            'mail' => 'taro@yamada.jp',
            'age' => 12
        ];
        DB::table('people')->insert($params);

        $params = [
            'name' => 'hanako',
            'mail' => 'hanako@flower.jp',
            'age' => 34
        ];
        DB::table('people')->insert($params);

        $params = [
            'name' => 'sachiko',
            'mail' => 'sachiko@happy.jp',
            'age' => 56
        ];
        DB::table('people')->insert($params);
    }
}
