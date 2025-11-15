<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Casemaster extends Model
{
   protected $fillable = [
    'title_name', 'gender', 'first_name', 'last_name', 'code_number',
    'birth_date', 'email', 'sup_phone', 'address', 'province_id',
    'district_id', 'sub_district_id', 'zipcode', 'contact_name',
    'status', 'phone'
];

    public function problems()
{
     return $this->belongsToMany(Problem::class, 'case_problem', 'case_master_id', 'problem_id');


}
}
