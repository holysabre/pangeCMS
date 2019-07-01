<?php

namespace App\Models;

use App\Models\Traits\TreeTrait;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Menu extends Model
{
    use NodeTrait, TreeTrait;

    protected $fillable = ['icon', 'route', 'params', 'name', 'link', 'permission', 'order', 'status', 'parent_id'];

    /**
     * @return array
     * 获取所有的菜单
     */
    public function allTreeList()
    {
        $menus = $this->all()->toArray();
        $menus = $this->treeList($menus);

        return $menus;
    }

}
