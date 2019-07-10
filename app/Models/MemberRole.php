<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberRole extends Model
{
    protected $fillable = ['name','score'];

    public function members()
    {
        $this->hasMany(Member::class);
    }
}
