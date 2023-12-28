<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ApplicantCompanyQa extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_company_id',
        'about_company_quetion_state',
        'answer',
        'answer_date',
    ];
    
    public function applicant_company(): BelongsTo
    {
        return $this->belongsTo(ApplicantCompany::class);
    }
}