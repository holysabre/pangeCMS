<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Menu extends Model
{
    use NodeTrait;

    protected $fillable = ['icon', 'route', 'params', 'name', 'link', 'permission', 'pid', 'order', 'status'];

}
