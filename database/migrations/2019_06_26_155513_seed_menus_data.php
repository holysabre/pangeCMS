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
                "icon" => "icon-cog",
                "created_at" => $datetime,
                "updated_at" => $datetime,
            ],
            [
                "id" => "2",
                "parent_id" => "1",
                "name" => "用户管理",
                "permission" => "manage_users",
                "icon" => "icon-user",
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
                "icon" => "icon-circle-thin",
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
                "icon" => "icon-group",
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
                "icon" => "icon-certificate",
                "link" => "",
                "route" => "menus.index",
                "params" => [],
                "query" => [],
                "created_at" => $datetime,
                "updated_at" => $datetime,
            ],
            [
                "id" => "6",
                "parent_id" => "0",
                "name" => "站点设置",
                "permission" => "manage_settings",
                "icon" => "icon-cog",
                "link" => "",
                "route" => "",
                "params" => [],
                "query" => [],
                "created_at" => $datetime,
                "updated_at" => $datetime,
            ],
            [
                "id" => "7",
                "parent_id" => "6",
                "name" => "站点信息管理",
                "permission" => "manage_sites",
                "icon" => "icon-cog",
                "link" => "",
                "route" => "sites.index",
                "params" => [],
                "query" => [],
                "created_at" => $datetime,
                "updated_at" => $datetime,
            ],
            [
                "id" => "8",
                "parent_id" => "0",
                "name" => "内容管理",
                "permission" => "manage_contents",
                "icon" => "icon-list",
                "link" => "",
                "route" => "",
                "params" => [],
                "query" => [],
                "created_at" => $datetime,
                "updated_at" => $datetime,
            ],
            [
                "id" => "9",
                "parent_id" => "8",
                "name" => "分类管理",
                "permission" => "manage_categories",
                "icon" => "icon-sitemap",
                "link" => "",
                "route" => "categories.index",
                "params" => [],
                "query" => [],
                "created_at" => $datetime,
                "updated_at" => $datetime,
            ],
            [
                "id" => "10",
                "parent_id" => "8",
                "name" => "单页管理",
                "permission" => "manage_pages",
                "icon" => "icon-file-o",
                "link" => "",
                "route" => "pages.index",
                "params" => [],
                "query" => [],
                "created_at" => $datetime,
                "updated_at" => $datetime,
            ],
            [
                "id" => "11",
                "parent_id" => "8",
                "name" => "文章管理",
                "permission" => "manage_articles",
                "icon" => "icon-newspaper-o",
                "link" => "",
                "route" => "articles.index",
                "params" => [],
                "query" => [],
                "created_at" => $datetime,
                "updated_at" => $datetime,
            ],
            [
                "id" => "12",
                "parent_id" => "8",
                "name" => "产品管理",
                "permission" => "manage_products",
                "icon" => "icon-inbox",
                "link" => "",
                "route" => "products.index",
                "params" => [],
                "query" => [],
                "created_at" => $datetime,
                "updated_at" => $datetime,
            ],
            [
                "id" => "13",
                "parent_id" => "8",
                "name" => "留言管理",
                "permission" => "manage_messages",
                "icon" => "icon-comment",
                "link" => "",
                "route" => "messages.index",
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
