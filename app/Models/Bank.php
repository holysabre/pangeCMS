<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = ['owner','number','name'];

    public function member()
    {
        $this->belongsTo(Member::class);
    }
}
