<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [ 'name', 'description','sku','status','user_id'];
    protected $casts = [
        'status' => \App\Enums\Status::class,
    ];

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
    public function items()
    {
        return $this->hasMany(Item::class, 'product_id');
    }
    
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
