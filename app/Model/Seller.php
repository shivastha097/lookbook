<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
