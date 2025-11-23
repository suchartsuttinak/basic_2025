<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactFindingDocument extends Model
{
    use HasFactory;

    // ✅ ใช้ชื่อตารางจริง
    protected $table = 'document_factfinding';

    protected $fillable = [
        'factfinding_id',
        'document_id',
    ];

    public function factFinding()
    {
        return $this->belongsTo(Factfinding::class, 'factfinding_id');
    }



}

