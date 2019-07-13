<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Model;

class SeedRolesAndPermissionsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //需要清除缓存，否则会报错
//        app(Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
//
//        //创建权限
//        Permission::create(['name' => 'manage_system', 'remarks' => '系统管理']);
//        Permission::create(['name' => 'manage_settings', 'remarks' => '站点管理']);
//        Permission::create(['name' => 'manage_contents', 'remarks' => '内容管理']);
//        Permission::create(['name' => 'manage_members', 'remarks' => '会员管理']);
//
//        //创建管理员
//        $maintainer = Role::create(['name' => 'Maintainer', 'remarks' => '超级管理员']);
//        $maintainer->givePermissionTo('manage_system');
//        $maintainer->givePermissionTo('manage_settings');
//        $maintainer->givePermissionTo('manage_contents');
//        $maintainer->givePermissionTo('manage_members');
//
//        //财务
//        $accountant = Role::create(['name' => 'Accountant', 'remarks' => '财务']);
//        $accountant->givePermissionTo('manage_members');
//
//        //客服主管
//        $customerServiceSupervisor = Role::create(['name' => 'CustomerServiceSupervisor', 'remarks' => '客服主管']);
//        $customerServiceSupervisor->givePermissionTo('manage_contents');
//        $customerServiceSupervisor->givePermissionTo('manage_members');
//
//        //客服人员
//        $customerServiceAgent = Role::create(['name' => 'CustomerServiceAgent', 'remarks' => '客服人员']);
//        $customerServiceAgent->givePermissionTo('manage_contents');
//        $customerServiceAgent->givePermissionTo('manage_members');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // 需清除缓存，否则会报错
//        app(Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
//
//        // 清空所有数据表数据
//        $tableNames = config('permission.table_names');
//
//        Model::unguard();
//        DB::table($tableNames['role_has_permissions'])->delete();
//        DB::table($tableNames['model_has_roles'])->delete();
//        DB::table($tableNames['model_has_permissions'])->delete();
//        DB::table($tableNames['roles'])->delete();
//        DB::table($tableNames['permissions'])->delete();
//        Model::reguard();
    }
}
