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
        return Inertia::render('User/Index');
    }

    public function show ()
    {
        return Inertia::render('User/Show');
    }

    public function edit ()
    {
        return Inertia::render('User/Edit');
    }

    public function update ()
    {
        return Inertia::render('User/Edit');
    }
}