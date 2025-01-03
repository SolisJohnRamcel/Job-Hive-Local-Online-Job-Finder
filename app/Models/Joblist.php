<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joblist extends Model
{
    use HasFactory;
    protected $table = 'joblist'; // Explicitly define the table name (if needed)

    // Optionally, you can define the fillable fields:
    protected $fillable = ['employer_id', 'company_profile_id', 'title', 'company_name', 'location', 'salary_min', 'salary_max', 'work_type', 'job_category', 'job_img', 'job_cover_photo', 'additional_info'];

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class); // Relationship to the JobApplication model
    }

    public function companyProfile()
    {
    return $this->belongsTo(CompanyProfile::class, 'company_profile_id', 'id');
    }




}
