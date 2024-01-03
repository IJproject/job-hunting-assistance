<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Company;
use App\Models\ApplicantCompany;
use App\Models\Selection;
use App\Models\UserQa;
use App\Models\ApplicantCompanyQa;

class UserController extends Controller
{
    public function index()
    {
        $auth_user = Auth::user()->only(['id', 'name', 'email']);
        $applicant_companies = ApplicantCompany::where('user_id', $auth_user['id'])->with('company')->get();
        return Inertia::render('User/Index', [
            'authUser' => $auth_user,
            'applicantCompanies' => $applicant_companies,
        ]);
    }

    public function show(User $user)
    {
        if($user->id != Auth::user()->id){
            return redirect()->route('user.index');
        }
        return Inertia::render('User/Show', [
            'authUser' => $user->load(['user_qas'])
        ]);
    }

    public function update(Request $request, User $user)
    {
        if(Hash::check($request->current_password, $user->password) && $user->id == Auth::user()->id){
            if($request->password){
                $request->validate([
                    'name' => 'required|string|max:30',
                    'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
                    'password' => 'required|string|min:5|max:20|confirmed',
                ]);
                
                $user->fill($request->only([
                    'name',
                    'email',
                    'password',
                ]))->save();
            } else {
                $request->validate([
                    'name' => 'required|string|max:30',
                    'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
                ]);
                
                $user->fill($request->only([
                    'name',
                    'email',
                ]))->save();
            }
            
        }

        return to_route('user.show', $user->id);
    }

    public function user_qa_store(Request $request)
    {
        if($request->user_id == Auth::user()->id){
            if($request->id){
                $user_qa = UserQa::findOrFail($request->id);
            } 
            else {
                $user_qa = new UserQa();
            }
            $user_qa->answer_date = Carbon::now()->format('Y/m/d');

            $request->validate([
                'user_id' => 'required|integer|exists:users,id',
                'about_user_quetion_state' => 'required|integer',
                'answer' => 'required|string|max:500',
            ]);
            
            $user_qa->fill($request->only([
                'user_id',
                'about_user_quetion_state',
                'answer',
                'answer_date',
            ]))->save();
        }

        return to_route('user.show', $user_qa->user_id);
    }

    public function applicant_company_show(ApplicantCompany $applicant_company)
    {
        if($applicant_company->user_id != Auth::user()->id){
            return redirect()->route('user.index');
        }
        return Inertia::render('User/ApplicantCompany/Show', [
            'applicantCompany' => $applicant_company->load(['company', 'applicant_company_qas', 'selections']),
        ]);
    }

    public function applicant_company_update(Request $request, ApplicantCompany $applicant_company)
    {
        if($applicant_company->user_id == Auth::user()->id){
            $applicant_company->fill($request->only([
                'industry_state',
                'selection_status_state',
                'salary',
                'memo',
            ]))->save();
        }
        return to_route('user.applicant_company.show', $applicant_company->id);
    }

    public function applicant_company_destroy(Request $request)
    {
        $applicant_company = ApplicantCompany::findOrFail($request->id);
        if($applicant_company->user_id == Auth::user()->id){
            $applicant_company->delete();
        }
        return to_route('user.index');
    }

    public function selection_store(Request $request)
    {
        if($request->id){
            $selection = Selection::findOrFail($request->id);
        } 
        else {
            $selection = new Selection();
        }

        $request->validate([
            'applicant_company_id' => 'required|integer|exists:applicant_companies,id',
            'selection_step_state' => 'required|integer',
            'date' => 'nullable|date',
            'time' => 'nullable|string|max:50',
            'interviewer' => 'nullable|string|max:30',
            'memo' => 'nullable|string|max:500',
        ]);
        
        $selection->fill($request->only([
            'applicant_company_id',
            'selection_step_state',
            'date',
            'time',
            'interviewer',
            'memo',
        ]))->save();

        return to_route('user.applicant_company.show', $selection->applicant_company_id);
    }

    public function selection_destroy(Request $request)
    {
        $selection = Selection::findOrFail($request->id);
        $selection->delete();
        
        return to_route('user.applicant_company.show', $selection->applicant_company_id);
    }

    public function company_qa_store(Request $request)
    {
        if($request->id){
            $company_qa = ApplicantCompanyQa::findOrFail($request->id);
        } 
        else {
            $company_qa = new ApplicantCompanyQa();
        }
        $company_qa->answer_date = Carbon::now()->format('Y/m/d');

        $request->validate([
            'applicant_company_id' => 'required|integer|exists:applicant_companies,id',
            'about_company_quetion_state' => 'required|integer',
            'answer' => 'required|string|max:500',
            'answer_date' => 'nullable|date',
        ]);
        
        $company_qa->fill($request->only([
            'applicant_company_id',
            'about_company_quetion_state',
            'answer',
            'answer_date',
        ]))->save();

        return to_route('user.applicant_company.show', $company_qa->applicant_company_id);
    }

    public function company_qa_destroy(Request $request)
    {
        $company_qa = ApplicantCompanyQa::findOrFail($request->id);
        $company_qa->delete();
    
        return to_route('user.applicant_company.show', $company_qa->applicant_company_id);

    }
}