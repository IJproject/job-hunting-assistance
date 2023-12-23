<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompanyQa extends Model
{
    use HasFactory;
    
    public function applicant_company(): BelongsTo
    {
        return $this->belongsTo(ApplicantCompany::class);
    }
}