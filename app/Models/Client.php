<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['first_name', 'last_name', 'gender', 'birth_date', 'address', 'phone'];

    public function problems()
    {
        return $this->belongsToMany(Problem::class);
    }
}
