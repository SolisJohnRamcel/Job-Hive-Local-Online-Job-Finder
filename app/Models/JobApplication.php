<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $table = 'job_applications';


    protected $fillable = [
        'job_id', 'status', 'user_id', 'first_name', 'last_name', 'email', 'phone_number', 'applied_position', 
        'start_date', 'interview_date', 'time_slot', 'resume'
    ];

    public function job()
    {
        return $this->belongsTo(Joblist::class, 'job_id'); // Relationship to the Job model
    }
}
