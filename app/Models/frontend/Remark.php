<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    protected $guarded = [];

    public function recipients()
    {
        return $this->belongsToMany(Recipient::class);
    }
}
