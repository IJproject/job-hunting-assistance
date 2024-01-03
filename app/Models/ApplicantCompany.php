<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ApplicantCompany extends Model
{
    use HasFactory;

    protected $attributes = [
        'selection_status_state' => 1,
    ];

    protected $fillable = [
        'user_id',
        'company_id',
        'industry_state',
        'selection_status_state',
        'memo',
        'salary',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function applicant_company_qas(): HasMany
    {
        return $this->hasMany(ApplicantCompanyQa::class);
    }
    
    public function selections(): HasMany
    {
        return $this->hasMany(Selection::class);
    }
}