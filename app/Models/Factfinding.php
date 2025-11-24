<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factfinding extends Model
{
    protected $guarded = [];

    public function documents()
    {
        // ✅ ใช้ pivot table document_factfinding
        return $this->belongsToMany(Document::class, 'document_factfinding', 'factfinding_id', 'document_id');
    }
}

