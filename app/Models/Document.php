<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $guarded = [];

    public function factfindings()
    {
        // ✅ ใช้ pivot table document_factfinding
        return $this->belongsToMany(Factfinding::class, 'document_factfinding', 'document_id', 'factfinding_id');
    }
}