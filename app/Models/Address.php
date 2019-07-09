<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['full_address','name','phone','zipcode'];

    public function member()
    {
        $this->belongsTo(Member::class);
    }
}
