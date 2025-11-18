<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipient extends Model
{
    use HasFactory;

    // กำหนดชื่อตาราง (ถ้าไม่ตรงกับ convention)
    protected $table = 'recipients';

    // ฟิลด์ที่สามารถ mass assignment ได้
   protected $guarded = [
       
   ];


        
    // Recipient.php (Model)
    public function getGenderTextAttribute()
    {
        return $this->gender === 'male' ? 'ชาย' : 'หญิง';
    }


    // ฟิลด์ที่เป็น date/datetime
    protected $dates = [
        'BirthDate',
        'arrival_date',
    ];

    // ความสัมพันธ์ (Relationships)
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function subDistrict()
    {
        return $this->belongsTo(SubDistrict::class, 'sup_disdrict_id');
    }

    public function house()
    {
        return $this->belongsTo(House::class, 'house_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function target()
    {
        return $this->belongsTo(Target::class, 'target_id');
    }

    public function education()
    {
      return $this->belongsTo(Education::class, 'educat_id');
    }

    public function problems()
    {
        // pivot table: recipient_problem

         return $this->belongsToMany(Problem::class, 'recipient_problem', 'recipient_id', 'problem_id');


    }


}
