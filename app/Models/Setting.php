<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['title', 'logo', 'email', 'phone_1','phone_2','address', 'facebook', 'twitter', 'youtube', 'instagram','description'];
}
