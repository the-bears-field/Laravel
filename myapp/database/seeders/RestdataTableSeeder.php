<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restdata;

class RestdataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            [
                'message' => 'Google Japan',
                'url' => 'https://www.google.co.jp'
            ],
            [
                'message' => 'Yahoo Japan',
                'url' => 'https://www.yahoo.co.jp'
            ],
            [
                'message' => 'MSN Japan',
                'url' => 'https://www.msn.com/ja-jp'
            ]
        ];

        foreach($params as $param) {
            (new Restdata)->fill($param)->save();
        }
    }
}
