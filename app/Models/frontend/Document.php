<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $guarded = [];


    // Document.php
public function factfindings()
{
    return $this->belongsToMany(Factfinding::class, 'document_factfinding');
}

}
