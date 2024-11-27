<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joblist extends Model
{
    use HasFactory;
    protected $table = 'joblist'; // Explicitly define the table name (if needed)

    // Optionally, you can define the fillable fields:
    protected $fillable = ['title', 'company_name', 'location', 'salary_min', 'salary_max', 'job_category', 'job_img', 'job_cover_photo', 'additional_info'];
}
