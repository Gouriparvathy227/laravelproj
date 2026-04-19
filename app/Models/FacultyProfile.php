<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacultyProfile extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'department',
        'qualification',
        'specialization',
        'experience_years',
        'email',
        'phone',
        'photo_path',
        'display_order',
        'is_active',
    ];

    protected $casts = [
        'experience_years' => 'integer',
        'display_order' => 'integer',
        'is_active' => 'boolean',
    ];
}
