<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class recipe extends Model
{
    protected $fillable = [
        'title', 'user_id', 'category_id', 'image',
    ];

    // アソーシエーション 
    /**
     * このコメントを所有するポストを取得
     */
    public function user(){
        return $this->belongsTo('App\User');
    }
}
