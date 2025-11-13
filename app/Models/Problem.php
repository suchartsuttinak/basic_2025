<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
     protected $fillable = ['name'];

    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }
}
