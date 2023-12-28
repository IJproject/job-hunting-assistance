<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Company;
use App\Models\ApplicantCompany;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $companies = Company::query();
        if($request->search_word){
            $companies->where('name', 'like', '%' . $request->search_word . '%');
        }
        return Inertia::render('Company/Index', [
            'companies' => $companies->paginate(60),
            'search_word' => $request->search_word ?? '',
        ]);
    }

    public function store(Request $request)
    {
        if($request->state == 'update_company'){
            if($request->id){
                $company = Company::findOrFail($request->id);

                $request->validate([
                    'name' => 'required|string|max:30',
                    'hp_url' => 'nullable|string|max:200',
                    'location' => 'nullable|string|max:100',
                ]);
            } else {
                $company = new Company();
                
                $request->validate([
                    'name' => 'required|string|max:30',
                    'corporation_number' => 'required|unique:companies,corporation_number|string|size:13',
                    'hp_url' => 'nullable|string|max:200',
                    'location' => 'nullable|string|max:100',
                ]);
            }
            
            
            $company->fill($request->only([
                'name',
                'corporation_number',
                'hp_url',
                'location',
            ]))->save();
            
        }
        
        else if($request->state == 'make_applicant_company') {
            $applicant_company = new ApplicantCompany();
        
            $applicant_company->user_id = Auth::user()->id;
            $applicant_company->company_id = $request->company_id;

            $applicant_company->save();
        }
        
        return Inertia::render('Company/Index', [
            'companies' => Company::paginate(60),
            'search_word' => $request->search_word ?? '',
        ]);
    }
}