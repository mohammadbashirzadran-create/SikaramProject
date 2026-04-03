<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category; // <- important

class Product extends Model
{
    protected $fillable = ['name', 'category_id', 'user_id', 'price','image', 'description'];


    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    
}
