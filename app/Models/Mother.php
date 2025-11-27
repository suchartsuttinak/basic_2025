<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mother extends Model
{
     protected $guarded = [];

    public function recipient()
{
    return $this->belongsTo(Recipient::class);
}
}
