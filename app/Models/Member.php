<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['name','role','parent_id','phone','card_number','card_image_front','card_image_back','sex','qrcode','user_id','status'];

    protected $hidden = ['token'];

    public function bank()
    {
        return $this->hasOne(Bank::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function memberLogs()
    {
        return $this->hasMany(MemberLog::class);
    }

    public function member_role()
    {
        return $this->belongsTo(MemberRole::class);
    }

    public function parent()
    {
        return $this->hasOne(Member::class, 'id', 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @param $query
     * @param $order
     * @return mixed
     * 本地化排序
     */
    public function scopeWithOrder($query, $order)
    {
        switch ($order)
        {
            case 'id':
                $query->id($query);
                break;
            case 'member_role':
                $query->memberRole($query);
                break;
            default:
                $query->recent($query);
                break;
        }
        //预防N+1问题
        return $query->with('member_role');
    }

    public function scopeId($query)
    {
        return $query->orderBy('id', 'asc');
    }

    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeMemberRole($query)
    {
        return $query->orderBy('member_role_id','asc');
    }
}
