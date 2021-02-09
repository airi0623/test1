<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class recipe extends Model
{
    protected $fillable = [
        'title', 'user_id', 'category_id', 'image' 
    ]

    protected $with = ['user'];

    public function recipes(){
        return $this->belongsTo(User::class);
    }
}
