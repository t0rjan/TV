<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    /**
     * 允许进行增改的值
     *
     * @var array
     */
    protected $fillable = [
          'password', 'phone'
    ];

    /**
     * 取出数据时进行toArray(),会自动将某个值进行隐藏
     * @demo dd(Auth::user()->toArray())
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];


    public static function getAllType()
    {
        return self::select('users.user_type', 'user_type.type_name')
            ->leftJoin('user_type', 'user_type.type_id', '=', 'users.user_type')
            ->get();
    }


}
