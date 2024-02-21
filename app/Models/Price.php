<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Price extends Model
{
    use HasFactory;
    protected $fillable = ['price','quantity','weight','status','item_id'];
    public function items()
    {
        return $this->belongsTo(Product::class);
    }
}