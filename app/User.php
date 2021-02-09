<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
// アソーシエーションのために
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
// Illuminate\Foundation\Auth\UserはModelを基底クラスに持ちます（リファレンス）ので、Authenticatableを継承すれば祖先にModelはすでにある。
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'profile', 'image','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // アソーシエーション 
    /**
     * このコメントを所有するポストを取得
     */
    public function recipe(){
        return $this->hasMany('App\Models\recipe');
    }
}
