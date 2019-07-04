<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datetime = Carbon::now();
        $sites = [
            [
                'owner' => 'system',
                'module' => 'common',
                'section' => 'basic',
                'type' => 'radio',
                'key' => 'site_status',
                'value' => '1',
                'name' => '站点状态',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
            [
                'owner' => 'system',
                'module' => 'common',
                'section' => 'basic',
                'type' => 'text',
                'key' => 'close_tip',
                'value' => '非常抱歉，站点正在维护...',
                'name' => '关闭信息',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
            [
                'owner' => 'system',
                'module' => 'common',
                'section' => 'basic',
                'type' => 'text',
                'key' => 'site_title',
                'value' => '网站名称',
                'name' => '网站名称',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
            [
                'owner' => 'system',
                'module' => 'common',
                'section' => 'basic',
                'type' => 'text',
                'key' => 'site_keywords',
                'value' => '网站关键词',
                'name' => '网站关键词',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
            [
                'owner' => 'system',
                'module' => 'common',
                'section' => 'basic',
                'type' => 'textarea',
                'key' => 'site_description',
                'value' => '网站描述',
                'name' => '网站描述',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
            [
                'owner' => 'system',
                'module' => 'common',
                'section' => 'basic',
                'type' => 'text',
                'key' => 'site_copyright',
                'value' => '网站版权',
                'name' => '网站版权',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
            [
                'owner' => 'system',
                'module' => 'common',
                'section' => 'basic',
                'type' => 'text',
                'key' => 'site_icp',
                'value' => '网站备案号',
                'name' => '网站备案号',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
            [
                'owner' => 'system',
                'module' => 'common',
                'section' => 'company',
                'type' => 'text',
                'key' => 'company_name',
                'value' => '公司名称',
                'name' => '公司名称',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
            [
                'owner' => 'system',
                'module' => 'common',
                'section' => 'company',
                'type' => 'textarea',
                'key' => 'company_description',
                'value' => '公司简介',
                'name' => '公司简介',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
            [
                'owner' => 'system',
                'module' => 'common',
                'section' => 'contact',
                'type' => 'text',
                'key' => 'contact_name',
                'value' => '联系人',
                'name' => '联系人',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
            [
                'owner' => 'system',
                'module' => 'common',
                'section' => 'contact',
                'type' => 'text',
                'key' => 'contact_tel',
                'value' => '电话',
                'name' => '电话',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
            [
                'owner' => 'system',
                'module' => 'common',
                'section' => 'contact',
                'type' => 'text',
                'key' => 'contact_mobile',
                'value' => '手机',
                'name' => '手机',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
            [
                'owner' => 'system',
                'module' => 'common',
                'section' => 'contact',
                'type' => 'text',
                'key' => 'contact_fax',
                'value' => '传真',
                'name' => '传真',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
            [
                'owner' => 'system',
                'module' => 'common',
                'section' => 'contact',
                'type' => 'text',
                'key' => 'contact_email',
                'value' => '邮箱',
                'name' => '邮箱',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
            [
                'owner' => 'system',
                'module' => 'common',
                'section' => 'contact',
                'type' => 'text',
                'key' => 'contact_qq',
                'value' => 'QQ',
                'name' => 'QQ',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
            [
                'owner' => 'system',
                'module' => 'common',
                'section' => 'contact',
                'type' => 'text',
                'key' => 'contact_wechat',
                'value' => '微信',
                'name' => '微信',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
            [
                'owner' => 'system',
                'module' => 'common',
                'section' => 'contact',
                'type' => 'text',
                'key' => 'contact_website',
                'value' => '网址',
                'name' => '网址',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
            [
                'owner' => 'system',
                'module' => 'common',
                'section' => 'contact',
                'type' => 'text',
                'key' => 'contact_address',
                'value' => '地址',
                'name' => '地址',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
        ];

        DB::table('sites')->insert($sites);
    }
}