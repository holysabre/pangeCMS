<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EncouragementTableSeeder extends Seeder
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
                'member_role_id' => '2',
                'reward' => '1000',
                'created_at' => $datetime,
            ],
            [
                'member_role_id' => '3',
                'reward' => '500',
                'created_at' => $datetime,
            ],
            [
                'member_role_id' => '4',
                'reward' => '300',
                'created_at' => $datetime,
            ],
            [
                'member_role_id' => '5',
                'reward' => '200',
                'created_at' => $datetime,
            ]
        ];
        DB::table('encouragements')->insert($data);
    }
}
