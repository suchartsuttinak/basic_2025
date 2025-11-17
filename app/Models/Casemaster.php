<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Casemaster extends Model
{
   protected $guarded = [];

    public function problems()
{
     return $this->belongsToMany(Problem::class, 'case_problem', 'case_master_id', 'problem_id');


}
}
