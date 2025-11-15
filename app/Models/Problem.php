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

     public function cases()
{
    return $this->belongsToMany(Casemaster::class, 'case_problem', 'problem_id', 'case_id')
                ->withTimestamps()
                ->withPivot('note');
}

}
