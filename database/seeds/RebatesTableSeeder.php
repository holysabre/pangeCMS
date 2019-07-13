<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RebatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datetime = Carbon::now();
        $data = [
            [
                'member_group' => 'manager',
                'number_from' => '1',
                'number_to' => '5',
                'proportion' => '20',
                'created_at' => $datetime,
            ],
            [
                'member_group' => 'manager',
                'number_from' => '6',
                'number_to' => '10',
                'proportion' => '22',
                'created_at' => $datetime,
            ],
            [
                'member_group' => 'manager',
                'number_from' => '11',
                'number_to' => '20',
                'proportion' => '25',
                'created_at' => $datetime,
            ],
            [
                'member_group' => 'manager',
                'number_from' => '21',
                'number_to' => '30',
                'proportion' => '28',
                'created_at' => $datetime,
            ],
            [
                'member_group' => 'manager',
                'number_from' => '31',
                'number_to' => '99999',
                'proportion' => '30',
                'created_at' => $datetime,
            ],
            [
                'member_group' => 'director',
                'number_from' => '1',
                'number_to' => '5',
                'proportion' => '20',
                'created_at' => $datetime,
            ],
            [
                'member_group' => 'director',
                'number_from' => '6',
                'number_to' => '10',
                'proportion' => '22',
                'created_at' => $datetime,
            ],
            [
                'member_group' => 'director',
                'number_from' => '11',
                'number_to' => '99999',
                'proportion' => '25',
                'created_at' => $datetime,
            ],
        ];
        DB::table('rebates')->insert($data);
    }
}
