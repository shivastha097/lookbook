<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
