<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['name','role','parent_id','phone','card_number','card_image_front','card_image_back','sex','qrcode','user_id','status'];

    protected $hidden = ['token'];

    public function banks()
    {
        return $this->hasMany(Bank::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
