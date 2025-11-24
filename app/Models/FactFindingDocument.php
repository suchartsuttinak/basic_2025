<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactFindingDocument extends Model
{
    use HasFactory;

    protected $table = 'document_factfinding'; // ✅ ให้ตรงกับ DB

    protected $fillable = ['factfinding_id', 'document_id'];

    public function document()
    {
        return $this->belongsTo(Document::class, 'document_id');
    }

    public function factFinding()
    {
        return $this->belongsTo(Factfinding::class, 'factfinding_id');
    }
}


