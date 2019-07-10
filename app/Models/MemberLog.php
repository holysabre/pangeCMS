<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberLog extends Model
{
    protected $fillable = ['action','remarks','description'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
