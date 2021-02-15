<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class recipe extends Model
{
    protected $fillable = [
        'title', 'image', 'user_id', 'category_id'
    ];

    // アソーシエーション 
    /**
     * このコメントを所有するポストを取得
     */
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\Models\category');
    }
    
}
