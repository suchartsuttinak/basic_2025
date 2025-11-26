<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Recipient extends Model
{
    use HasFactory;

    protected $table = 'recipients';
    protected $guarded = [];

    protected $dates = ['birth_date', 'arrival_date'];

    // Accessor: เพศ
    public function getGenderTextAttribute()
    {
        return $this->gender === 'male' ? 'ชาย' : 'หญิง';
    }

    // Relationships
    public function province()       { return $this->belongsTo(Province::class, 'province_id'); }
    public function district()       { return $this->belongsTo(District::class, 'district_id'); }
    public function sub_district()   { return $this->belongsTo(SubDistrict::class, 'sub_district_id'); }
    public function house()          { return $this->belongsTo(House::class, 'house_id'); }
    public function project()        { return $this->belongsTo(Project::class, 'project_id'); }
    public function target()         { return $this->belongsTo(Target::class, 'target_id'); }
    public function education()      { return $this->belongsTo(Education::class, 'education_id'); }
    public function title()          { return $this->belongsTo(Title::class, 'title_id'); }
    public function national()       { return $this->belongsTo(National::class, 'national_id'); } // ตรวจชื่อจริงใน DB
    public function religion()       { return $this->belongsTo(Religion::class, 'religion_id'); }
    public function marital()        { return $this->belongsTo(Marital::class, 'marital_id'); }
    public function occupation()     { return $this->belongsTo(Occupation::class, 'occupation_id'); }
    public function income()         { return $this->belongsTo(Income::class, 'income_id'); }
    public function contact()        { return $this->belongsTo(Contact::class, 'contact_id'); }
    public function status()         { return $this->belongsTo(Status::class, 'status_id'); }

    // Accessor: คำนำหน้าตามอายุ
    public function getAdjustedTitleAttribute()
    {
        $age = $this->age;
        $title = $this->title->title_name ?? $this->title->name ?? '';

        if ($age >= 15) {
            if ($title === 'เด็กชาย') {
                $title = 'นาย';
            } elseif ($title === 'เด็กหญิง') {
                $title = 'นางสาว';
            }
        }

        return $title;
    }

    // Full name พร้อมคำนำหน้าที่ปรับแล้ว
    public function getFullNameAttribute()
    {
        return trim(($this->adjusted_title ?? optional($this->title)->name ?? '') . ' ' . $this->first_name . ' ' . $this->last_name);
    }

    // Accessor: อายุ
    public function getAgeAttribute()
    {
        return $this->birth_date ? Carbon::parse($this->birth_date)->age : null;
    }

    // Pivot table: recipient_problem
    public function problems()
    {
        return $this->belongsToMany(Problem::class, 'recipient_problem', 'recipient_id', 'problem_id');
    }

    public function factfinding()
    {
        return $this->hasOne(Factfinding::class);
    }
}