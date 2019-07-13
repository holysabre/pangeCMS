<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app(Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        $menus = Menu::all()->toArray();
        foreach ($menus as $menu){
            Permission::findOrCreate($menu['permission'],null,$menu['name'],$menu['parent_id']);
        }

        //创建管理员
        $maintainer = Role::create(['name' => 'Maintainer', 'remarks' => '超级管理员']);
        $maintainer->givePermissionTo('manage_system');
        $maintainer->givePermissionTo('manage_settings');
        $maintainer->givePermissionTo('manage_contents');
        $maintainer->givePermissionTo('manage_users');
        $maintainer->givePermissionTo('manage_members');

        //财务
        $accountant = Role::create(['name' => 'Accountant', 'remarks' => '财务']);
        $accountant->givePermissionTo('manage_members');

        //客服主管
        $customerServiceSupervisor = Role::create(['name' => 'CustomerServiceSupervisor', 'remarks' => '客服主管']);
        $customerServiceSupervisor->givePermissionTo('manage_contents');
        $customerServiceSupervisor->givePermissionTo('manage_members');

        //客服人员
        $customerServiceAgent = Role::create(['name' => 'CustomerServiceAgent', 'remarks' => '客服人员']);
        $customerServiceAgent->givePermissionTo('manage_contents');
        $customerServiceAgent->givePermissionTo('manage_members');


        // 初始化用户角色，将 1 号用户指派为『超管』
        $user = User::find(1);
        $user->assignRole('Maintainer');

        // 将 2 号用户指派为『财务』
        $user = User::find(2);
        $user->assignRole('Accountant');

        // 将 3 号用户指派为『客服主管』
        $user = User::find(3);
        $user->assignRole('CustomerServiceSupervisor');




//        $permissions = Permission::getPermissions()->toArray();
//        dd($permissions);
//        $roles = Role::all()->toArray();
//        dump($roles);
    }
}
