<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Model;

class Factfinding extends Model
{
    protected $guarded = [];

  

 public function recipient()
    {
        return $this->belongsTo(Recipient::class);
    }

  //  // pivot table: 
    public function documents()
{
    return $this->belongsToMany(Document::class, 'document_factfinding');
}

}
