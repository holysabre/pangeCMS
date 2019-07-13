<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Encouragement extends Model
{
    protected $fillable = ['reward'];

    public function member_role()
    {
        return $this->belongsTo(MemberRole::class);
    }
}
