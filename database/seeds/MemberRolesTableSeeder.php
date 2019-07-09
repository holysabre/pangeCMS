<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MemberRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datetime = Carbon::now();
        $member_roles = [
            [
                'name' => '联合创始人',
                'score' => '50000',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
            [
                'name' => '执行董事',
                'score' => '10440',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
            [
                'name' => '大区经理',
                'score' => '4680',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
            [
                'name' => '区域经理',
                'score' => '2940',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
            [
                'name' => '业务经理',
                'score' => '1180',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
            [
                'name' => '普通会员',
                'score' => '0',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
            [
                'name' => '零售商',
                'score' => '0',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
        ];

        DB::table('member_roles')->insert($member_roles);
    }
}
