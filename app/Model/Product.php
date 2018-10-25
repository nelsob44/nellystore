<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Product extends Model
{
    protected $fillable = [
        'user_id', 'name', 'price', 'description', 'image', 'category_id'
    ];
    public function getRouteKeyName()
    {
        return 'name';
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getPathAttribute()
    {
        return asset("api/product/$this->name");
    }
}
