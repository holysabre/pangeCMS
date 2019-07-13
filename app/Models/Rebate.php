<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rebate extends Model
{
    protected $fillable = ['number_from','number_to','proportion'];
}
