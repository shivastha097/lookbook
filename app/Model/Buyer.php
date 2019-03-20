<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    protected $fillable = ['user_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
