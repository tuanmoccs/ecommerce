<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'price_sale',
        'menu_id',
        'content',
        'active',
        'thumb'
    ];
    public function menu(){
        return $this->hasOne(Menu::class, 'id', 'menu_id')
            ->withDefault(['name'=>'']);
    }
    public function OrderDetail()
    {
        return $this->hasMany(OrderDetail::class, 'product_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($product) {
            $thumbs = explode(',', $product->thumb);
            foreach ($thumbs as $thumb) {
                $filePath = str_replace('/storage/', 'public/', $thumb);
                Storage::delete($filePath);
            }
        });
    }
}
