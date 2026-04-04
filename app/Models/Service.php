<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function user(){

    return $this->belongsTo(User::class);
  }

  protected $fillable = [
    'title',
    'description',
    'image',
    'status',
    'user_id',
    'created_at',
    'updated_at',
  ];
}
