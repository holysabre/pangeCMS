<?php

use Illuminate\Database\Seeder;
use App\Models\Member;
use App\Models\MemberRole;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //获取faker实例
        $faker = app(Faker\Generator::class);

        //角色
        $member_role_ids = MemberRole::all()->pluck('id')->toArray();

        //性别
        $sexes = array_keys(config('member.sex'));

        // 生成数据集合
        $members = factory(Member::class)->times(20)->make()->each(function ($member, $index)
        use($faker, $member_role_ids, $sexes)
        {
            $member->member_role_id = $faker->randomElement($member_role_ids);
            $member->sex = $faker->randomElement($sexes);
            $member->card_number = app('identity_faker')->one();
        });

        // 让隐藏字段可见，并将数据集合转换为数组
        $member_array = $members->makeVisible(['token'])->toArray();

        // 插入到数据库中
        Member::insert($member_array);
    }
}
