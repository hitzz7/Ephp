<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Item extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'size_id', 'color_id', 'status', 'sku', 'price_id','inventory','weight'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function size()
    {
        return $this->belongsTo(Size::class);
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
    public function Prices()
    {
        return $this->hasMany(Price::class);
    }
}