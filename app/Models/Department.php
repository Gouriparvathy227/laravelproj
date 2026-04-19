<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Department extends Model
{
    protected $fillable = [
        'name',
        'code',
        'about',
        'established_year',
        'research_center',
        'logo_path',
    ];

    protected $casts = [
        'research_center' => 'boolean',
        'established_year' => 'integer',
    ];

    public function getSlugAttribute(): string
    {
        return Str::slug((string) $this->name);
    }
}
