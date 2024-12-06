<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CompanyProfile extends Model
{
    use HasFactory;

    protected $table = 'company_profiles';

    protected $fillable = [
        'employer_id',
        'company_name',
        'email',
        'description',
        'location',
        'website',
        'logo',
        'contact_person',
        'contact_phone',
        'contact_email',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
