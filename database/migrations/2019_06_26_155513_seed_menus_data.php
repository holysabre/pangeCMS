<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class SeedMenusData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $datetime = Carbon::now();
        $menus = [
            [
                "id" => "1",
                "parent_id" => "0",
                "name" => "系统设置",
                "route" => "",
                "permission" => "manage_system",
                "link" => "",
                "query" => [],
                "params" => [],
                "icon" => "layui-icon-set",
                "created_at" => $datetime,
                "updated_at" => $datetime,
            ],
            [
                "id" => "2",
                "parent_id" => "1",
                "name" => "用户管理",
                "permission" => "manage_users",
                "icon" => "layui-icon-user",
                "link" => "",
                "route" => "users.index",
                "params" => [],
                "query" => [],
                "created_at" => $datetime,
                "updated_at" => $datetime,
            ],
            [
                "id" => "3",
                "parent_id" => "1",
                "name" => "权限管理",
                "permission" => "manage_permissions",
                "icon" => "layui-icon-circle",
                "link" => "",
                "route" => "permissions.index",
                "params" => [],
                "query" => [],
                "created_at" => $datetime,
                "updated_at" => $datetime,
            ],
            [
                "id" => "4",
                "parent_id" => "1",
                "name" => "角色管理",
                "permission" => "manage_roles",
                "icon" => "layui-icon-group",
                "link" => "",
                "route" => "roles.index",
                "params" => [],
                "query" => [],
                "created_at" => $datetime,
                "updated_at" => $datetime,
            ],
            [
                "id" => "5",
                "parent_id" => "1",
                "name" => "菜单管理",
                "permission" => "manage_menus",
                "icon" => "layui-icon-menu-fill",
                "link" => "",
                "route" => "menus.index",
                "params" => [],
                "query" => [],
                "created_at" => $datetime,
                "updated_at" => $datetime,
            ],
        ];

        foreach ($menus as $key => &$menu){
            $menu['params'] = empty($menu['params']) ? "" : json_encode($menu['params']);
            $menu['query'] = empty($menu['query']) ? "" : json_encode($menu['query']);
        }

        DB::table('menus')->insert($menus);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('menus')->truncate();
    }
}
