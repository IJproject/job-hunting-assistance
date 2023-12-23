<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Company;
use App\Models\ApplicantCompany;
use App\Models\Selection;
use App\Models\UserQa;
use App\Models\ApplicantCompanyQa;

class UserController extends Controller
{
    public function index ()
    {
        $auth_user = Auth::user()->only(['id', 'name', 'email']);
        // dd(ApplicantCompany::get());
        $applicant_companies = ApplicantCompany::where('user_id', $auth_user['id'])->with('company')->get();
        return Inertia::render('User/Index', [
            'authUser' => $auth_user,
            'applicantCompanies' => $applicant_companies,
        ]);
    }

    public function edit ()
    {
        return Inertia::render('User/Edit');
    }

    public function update ()
    {
        return Inertia::render('User/Edit');
    }

    public function applicant_company (ApplicantCompany $applicant_company)
    {
        return Inertia::render('User/ApplicantCompany/Show', [
            'applicantCompany' => $applicant_company->load(['applicant_company_qas', 'selections']),
        ]);
    }
}