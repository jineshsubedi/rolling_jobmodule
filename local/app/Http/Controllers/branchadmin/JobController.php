<?php

namespace App\Http\Controllers\branchadmin;

use App\EmployeeMeeting;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Validator;
use App\Jobs;
use App\Branch;
use App\JobLevel;
use App\JobLocation;
use App\JobForm;
use App\JobRequirements;
use App\FormData;
use App\Experience;
use App\Currency;
use App\Employee;
use App\EducationLevel;
use App\JobsLocation;
use App\Trash;
use App\RecruitmentProcess;
use PDF;
use File;
use App\JobExperience;
use App\JobEducation;
use App\EmployeeEducation;
use App\EmployeeExperience;
use App\EmployeeLanguage;
use App\EmployeeTraining;
use App\EmployeeReference;
// use App\Saluation;


use App\Imagetool;
use Excel;
use ZipArchive;
use App\FlxZipArchive;

class JobController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
public function __construct()
{
  $this->middleware('branchadmin');
}
public function index(Request $request)
{ 
  $datas = [];
  
  $job = Jobs::where('trash', '!=', 1);
  if (isset($request->filter_title) && !empty($request->filter_title)) {
    $datas['filter_title'] = $request->filter_title;
    $job->where('title', 'LIKE', '%'.$request->filter_title.'%');
  } else {
    $datas['filter_title'] = '';
  }
  if (isset($request->filter_code) && !empty($request->filter_code) ) {
  $datas['filter_code'] = $request->filter_code;
  $job->where('vacancy_code', $request->filter_code);
  } else {
    $datas['filter_code'] = '';
  }
  if (isset($request->filter_employer) && !empty($request->filter_employer) ) {
  $datas['filter_employer'] = $request->filter_employer;
  $job->where('branch_id', $request->filter_employer);
  } else {
    $datas['filter_employer'] = '';
  }

  if (isset($request->filter_status) && !empty($request->filter_status) ) {
  $datas['filter_status'] = $request->filter_status;
  $job->where('status', $request->filter_status);
  } else {
    $datas['filter_status'] = '';
  }
  if (isset($request->filter_process) && !empty($request->filter_process) ) {
  $datas['filter_process'] = $request->filter_process;
  $job->where('process_status', $request->filter_process);
  } else {
    $datas['filter_process'] = '';
  }
  $jobs = $job->orderBy('id', 'desc')->paginate(50);
  $datas['branch'] = Branch::orderBy('name', 'asc')->get();


  $datas['status'][] = ['value' => 3, 'title' => 'Pending'];
  $datas['status'][] = ['value' => 1, 'title' => 'Active'];
  $datas['status'][] = ['value' => 2, 'title' => 'Disabled'];
  $datas['process_status'] = RecruitmentProcess::orderBy('id','asc')->get();

  return view('branchadmin.jobs.index')->with('data',$jobs)->with('datas', $datas);
}

public function addnew()
{
  $datas = [];
   if (Session()->has('new_form')) {
      $datas['forms'] = \App\TemporaryJobForm::where('session_id', Session()->get('new_form'))->get();
    } else {
      Session(['new_form' => date('Ymdhis')]);
      $datas['forms'] = [];
    }
  $datas['vcode'] = rand(1, 9999);

  $datas['form_fields'][] = ['value' => 'saluation', 'title' => 'Saluation'];
  $datas['form_fields'][] = ['value' => 'first_name', 'title' => 'First Name'];
  $datas['form_fields'][] = ['value' => 'middle_name', 'title' => 'Middle Name'];
  $datas['form_fields'][] = ['value' => 'last_name', 'title' => 'Last Name'];
  $datas['form_fields'][] = ['value' => 'gender', 'title' => 'Gender'];
  $datas['form_fields'][] = ['value' => 'marital_status', 'title' => 'Marital Status'];
  $datas['form_fields'][] = ['value' => 'permanent_address', 'title' => 'Permanent Address'];
  $datas['form_fields'][] = ['value' => 'temporary_address', 'title' => 'Temporary Address'];
  $datas['form_fields'][] = ['value' => 'home_phone', 'title' => 'Home Phone'];
  $datas['form_fields'][] = ['value' => 'mobile_phone', 'title' => 'Mobile Phone'];
  $datas['form_fields'][] = ['value' => 'email', 'title' => 'E-mail'];
  $datas['form_fields'][] = ['value' => 'citizenship', 'title' => 'Citizenship No'];
  $datas['form_fields'][] = ['value' => 'fax', 'title' => 'Fax'];
  $datas['form_fields'][] = ['value' => 'website', 'title' => 'Website'];
  $datas['form_fields'][] = ['value' => 'dob', 'title' => 'Date of Birth'];
  $datas['form_fields'][] = ['value' => 'nationality', 'title' => 'Nationality'];
  $datas['form_fields'][] = ['value' => 'license_of', 'title' => 'License Of'];
  $datas['form_fields'][] = ['value' => 'vehicle', 'title' => 'Vehicle'];
  $datas['form_fields'][] = ['value' => 'pp_photo', 'title' => 'PP Size Photo'];
  $datas['form_fields'][] = ['value' => 'resume', 'title' => 'Resume'];
  $datas['form_fields'][] = ['value' => 'cover_letter', 'title' => 'Cover Letter'];
  $datas['form_fields'][] = ['value' => 'education', 'title' => 'Education'];
  $datas['form_fields'][] = ['value' => 'experience', 'title' => 'Experience'];
  $datas['form_fields'][] = ['value' => 'training', 'title' => 'Training'];
  
  $datas['form_fields'][] = ['value' => 'language', 'title' => 'Language'];
  $datas['form_fields'][] = ['value' => 'reference', 'title' => 'Reference'];
  $datas['form_fields'][] = ['value' => 'location', 'title' => 'Location'];


  $datas['status'][] = ['value' => 3, 'title' => 'Pending'];
  $datas['status'][] = ['value' => 1, 'title' => 'Active'];
  $datas['status'][] = ['value' => 2, 'title' => 'Disabled'];

  $datas['gender'][] = ['value' => 'Male'];
  $datas['gender'][] = ['value' => 'Female'];
  $datas['gender'][] = ['value' => 'Any'];

  $datas['setting'][] = ['value' => 1, 'title' => 'Only CV'];
  $datas['setting'][] = ['value' => 2, 'title' => 'Normal'];

  $datas['application'][] = ['value' => 1, 'title' => 'Online Apply'];
  $datas['application'][] = ['value' => 2, 'title' => 'Email Apply'];
  $datas['application'][] = ['value' => 3, 'title' => 'Post Apply'];
  $datas['application'][] = ['value' => 4, 'title' => 'Online & Email Apply'];


  $datas['job_type'][] = ['value' => 'Hot'];
  $datas['job_type'][] = ['value' => 'Featured'];
  $datas['job_type'][] = ['value' => 'Free'];
  $datas['job_type'][] = ['value' => 'News Paper'];

  $datas['exp_format'][] = ['value' => 'Year'];
  $datas['exp_format'][] = ['value' => 'Month'];

  $datas['job_availiability'][] = ['value' => 'Full Time'];
  $datas['job_availiability'][] = ['value' => 'Part Time'];
  $datas['job_availiability'][] = ['value' => 'Contract'];

  $datas['form_type'][] = ['value' => 'text', 'title' => 'Text'];
  $datas['form_type'][] = ['value' => 'textarea', 'title' => 'Textarea'];
  $datas['form_type'][] = ['value' => 'email', 'title' => 'Email'];
  $datas['form_type'][] = ['value' => 'url', 'title' => 'Url'];
  $datas['form_type'][] = ['value' => 'select', 'title' => 'Select'];
  $datas['form_type'][] = ['value' => 'redio', 'title' => 'Redio Button'];
  $datas['form_type'][] = ['value' => 'checkbox', 'title' => 'Check Box'];
  $datas['form_type'][] = ['value' => 'file', 'title' => 'File Upload'];

  // $datas['job_category'] = JobCategory::orderBy('name', 'asc')->get();
  $datas['experiences'] = Experience::orderBy('name', 'asc')->get();
  $datas['branch'] = Branch::orderBy('name', 'asc')->get();
  $datas['salary_unit'] = Currency::orderBy('title', 'asc')->get();
  $datas['job_level'] = JobLevel::orderBy('name', 'asc')->get();
  $datas['education_level'] = EducationLevel::orderBy('name', 'asc')->get();
  $datas['job_location'] = JobLocation::orderBy('name', 'asc')->get();
  // $datas['type'] = OrganizationType::orderBy('name', 'asc')->get();
  $datas['process_status'] = RecruitmentProcess::orderBy('id','asc')->get();
  $image='catalog/back.png';
  $datas['image']=Imagetool::mycrop($image, 100, 100); 

  return view('branchadmin.jobs.newform')->with('datas', $datas);
}

public function save(Request $request)
{ 

  if (isset($request->manual_education)) {
    $manual_education = $request->manual_education;
  }else{
    $manual_education = 0;
  }
  $this->validate($request, [
    'title' => 'required|min:3',
    'seo_url' => 'required|min:3|unique:jobs',
    'branch' => 'required|integer',
    'job_availiability' => 'required',
    'vacancy_code' => 'required|min:3|unique:jobs',
    'deadline' => 'required',
    'salary_unit' => 'required',
    'negotiable' => 'required',
    'apply_type' => 'required',
    'job_setting' => 'required',
    'status' => 'required'
  ]);
  
  if(!empty($request->file('file'))){

    $this->validate($request, [
      
      'file' => 'mimes:pdf,doc,docx|max:10000',
    ]);
    
    $directory = DIR_IMAGE . 'file';
    $file = $request->File('file');
    $fname = 'file/'. $file->getClientOriginalName();
    $path = $directory.'/';
    $ff= $file->getClientOriginalName();
    $request->file('file')->move($path, $ff);

  } else {
    $fname = '';
  }
  
  $datas = [
    'title' => $request->title,
    'branch_id' => $request->branch,
    'job_level' => $request->job_level,
    'job_availability' => $request->job_availiability,
    'deadline' => $request->deadline,
    'min_experience' => $request->minimum_experience,
    'position' => $request->position,
    'vacancy_code' => $request->vacancy_code,
    'external_link' => $request->external_link,
    'gender' => $request->gender,
    'salary_unit' => $request->salary_unit,
    'negotiable' => $request->negotiable,
    'minimum_salary' => $request->salary,
    'min_age' => $request->minimum_age,
    'max_age' => $request->maximum_age,
    'seo_url' => $request->seo_url,
    'status' => $request->status,
    'publish_date' => $request->publish_date,
    'assignment_handeler' => $request->assignment_hadeler,
    'line_manager' => $request->line_manager,
    'process_status' => $request->process_status,
    'setting' => $request->job_setting,
    'apply_type' => $request->apply_type,
    'emails' => $request->emails,
    'formfields' => json_encode($request->form_fields, true),
    'education_levels' => json_encode($request->education_levels, true),
    'emanual' => $manual_education,
    'job_file' => $fname,
    'advertise_link' => $request->advertise_link,
    'advertise_detail' => $request->advertise_detail,
    'image' => $request->image,
    'edu_marks' =>$request->edu_marks,
    'exp_marks' =>$request->exp_marks,
    'sort_order' =>$request->sort_order,
    'location_title' =>$request->location_title
  ];
  $jobs=Jobs::create($datas);
  if($jobs)
  {
    if (isset($request->job_location) && count($request->job_location) > 0) {
      foreach ($request->job_location as $job_location) {
        JobsLocation::create(['jobs_id' => $jobs->id, 'location_id' => $job_location]);
      }
    }

    $require = [
      'jobs_id' => $jobs->id,
      'description' => $request->description,
      'specification' => $request->specification,
      'education_description' => $request->education_description,
      'specific_requirement' => $request->specific_requirement,
      'specific_instruction' => $request->specific_instruction
    ];
    JobRequirements::create($require);

    if (isset($request->job_experience) && count($request->job_experience) > 0) {
      foreach ($request->job_experience as $key => $value) {
        if ($value['exp_id'] != '') {
          $fvalue = [
            'jobs_id' => $jobs->id,
            'experience_id' => $value['exp_id'],
            'experience' => $value['experience'],
            'exp_format' => $value['exp_format'],
            
          ];
          JobExperience::create($fvalue);
        }
      }
    }

    if (isset($request->job_education) && count($request->job_education) > 0) {
      foreach ($request->job_education as $key => $value) {
        if ($value['education_level'] != '') {
          $fvalue = [
            'jobs_id' => $jobs->id,
            'education_level_id' => $value['education_level'],
            'faculty_id' => $value['faculty'],
            'experience' => $value['experience'],
            'exp_format' => $value['exp_format'],
            'percent' => $value['percent'],
            'cgpa' => $value['cgpa'],
            'others' => $value['others'],
            
          ];
          JobEducation::create($fvalue);
        }
      }
    }

    $job_forms = \App\TemporaryJobForm::where('session_id', Session()->get('new_form'))->orderBy('id', 'asc')->get();
      if (count($job_forms) > 0) {
        foreach ($job_forms as $value) {
          $jf = \App\TemporaryJobForm::where('id', $value->parent_id)->first();
          if (isset($jf->f_lable)) {
            $jform = JobForm::where('jobs_id', $jobs->id)->where('f_lable', $jf->f_lable)->first();
            if (isset($jform->id)) {
              $parent_id = $jform->id;
            } else{
              $parent_id = 0;
            }
          } else{
            $parent_id = 0;
          }
        $fvalue = [
          'jobs_id' => $jobs->id,
          'parent_id' => $parent_id,
          'f_lable' => $value->f_lable,
          'f_type' => $value->f_type,
          'list_menu' => $value->list_menu,
          'requ' => $value->requ,
          'marks' => $value->marks,
          'extra' => $value->extra
        ];
        JobForm::create($fvalue);
        }
        \App\TemporaryJobForm::where('session_id', Session()->get('new_form'))->delete();
            Session()->forget('new_form');
      }
    \Session::flash('alert-success','Record have been saved Successfully');
    return redirect('branchadmin/jobs');
  } else {
    \Session::flash('alert-danger','Something Went Wrong on Saving Data');
    return redirect('branchadmin/jobs'); 
  }
}

public function delete($id)
{

  $i= Jobs::where('id',$id)->first();
  if($i)
  {
    Jobs::where('id',$id)->update(['trash' => 1]);
    Trash::create(['table_name' => 'Jobs', 'table_id' => $id, 'table_title' => $i->title]);
    \Session::flash('alert-success','Record deleted Successfully');
    return redirect('branchadmin/jobs');
  }
  else 
  {
  \Session::flash('alert-danger','Something Went Wrong on Deleting data');
  return redirect('branchadmin/jobs'); 
  }
}

public function edit($id)
{

  $jobs= Jobs::where('id',$id)->first();
  if($jobs) {

  $datas = []  ;
  if (Session()->has('new_form')) {
    $datas['forms'] = \App\TemporaryJobForm::where('session_id', Session()->get('new_form'))->get();
  } else {
    Session(['new_form' => date('Ymdhis')]);
    $datas['forms'] = [];
  }

  $datas['form_fields'][] = ['value' => 'saluation', 'title' => 'Saluation'];
  $datas['form_fields'][] = ['value' => 'first_name', 'title' => 'First Name'];
  $datas['form_fields'][] = ['value' => 'middle_name', 'title' => 'Middle Name'];
  $datas['form_fields'][] = ['value' => 'last_name', 'title' => 'Last Name'];
  $datas['form_fields'][] = ['value' => 'gender', 'title' => 'Gender'];
  $datas['form_fields'][] = ['value' => 'marital_status', 'title' => 'Marital Status'];
  $datas['form_fields'][] = ['value' => 'permanent_address', 'title' => 'Permanent Address'];
  $datas['form_fields'][] = ['value' => 'temporary_address', 'title' => 'Temporary Address'];
  $datas['form_fields'][] = ['value' => 'home_phone', 'title' => 'Home Phone'];
  $datas['form_fields'][] = ['value' => 'mobile_phone', 'title' => 'Mobile Phone'];
  $datas['form_fields'][] = ['value' => 'email', 'title' => 'E-mail'];
  $datas['form_fields'][] = ['value' => 'citizenship', 'title' => 'Citizenship No'];
  $datas['form_fields'][] = ['value' => 'fax', 'title' => 'Fax'];
  $datas['form_fields'][] = ['value' => 'website', 'title' => 'Website'];
  $datas['form_fields'][] = ['value' => 'dob', 'title' => 'Date of Birth'];
  $datas['form_fields'][] = ['value' => 'nationality', 'title' => 'Nationality'];
  $datas['form_fields'][] = ['value' => 'license_of', 'title' => 'License Of'];
  $datas['form_fields'][] = ['value' => 'vehicle', 'title' => 'Vehicle'];
  $datas['form_fields'][] = ['value' => 'pp_photo', 'title' => 'PP Size Photo'];
  $datas['form_fields'][] = ['value' => 'resume', 'title' => 'Resume'];
  $datas['form_fields'][] = ['value' => 'cover_letter', 'title' => 'Cover Letter'];
  $datas['form_fields'][] = ['value' => 'education', 'title' => 'Education'];
  $datas['form_fields'][] = ['value' => 'experience', 'title' => 'Experience'];
  $datas['form_fields'][] = ['value' => 'training', 'title' => 'Training'];
  
  $datas['form_fields'][] = ['value' => 'language', 'title' => 'Language'];
  $datas['form_fields'][] = ['value' => 'reference', 'title' => 'Reference'];
  $datas['form_fields'][] = ['value' => 'location', 'title' => 'Location'];



  $datas['status'][] = ['value' => 3, 'title' => 'Pending'];
  $datas['status'][] = ['value' => 1, 'title' => 'Active'];
  $datas['status'][] = ['value' => 2, 'title' => 'Disabled'];

  $datas['gender'][] = ['value' => 'Male'];
  $datas['gender'][] = ['value' => 'Female'];
  $datas['gender'][] = ['value' => 'Any'];

  $datas['setting'][] = ['value' => 1, 'title' => 'Required'];
  $datas['setting'][] = ['value' => 0, 'title' => 'Not Required'];

  $datas['application'][] = ['value' => 1, 'title' => 'Online Apply'];
  $datas['application'][] = ['value' => 2, 'title' => 'Email Apply'];
  $datas['application'][] = ['value' => 3, 'title' => 'Post Apply'];
  $datas['application'][] = ['value' => 4, 'title' => 'Online & Email Apply'];


  $datas['job_type'][] = ['value' => 'Hot'];
  $datas['job_type'][] = ['value' => 'Featured'];
  $datas['job_type'][] = ['value' => 'Free'];
  $datas['job_type'][] = ['value' => 'News Paper'];

  $datas['job_availiability'][] = ['value' => 'Full Time'];
  $datas['job_availiability'][] = ['value' => 'Part Time'];
  $datas['job_availiability'][] = ['value' => 'Contract'];

  $datas['form_type'][] = ['value' => 'text', 'title' => 'Text'];
  $datas['form_type'][] = ['value' => 'textarea', 'title' => 'Textarea'];
  $datas['form_type'][] = ['value' => 'email', 'title' => 'Email'];
  $datas['form_type'][] = ['value' => 'url', 'title' => 'Url'];
  $datas['form_type'][] = ['value' => 'select', 'title' => 'Select'];
  $datas['form_type'][] = ['value' => 'redio', 'title' => 'Redio Button'];
  $datas['form_type'][] = ['value' => 'checkbox', 'title' => 'Check Box'];
  $datas['form_type'][] = ['value' => 'file', 'title' => 'File Upload'];

  $datas['exp_format'][] = ['value' => 'Year'];
  $datas['exp_format'][] = ['value' => 'Month'];

  $datas['experiences'] = Experience::orderBy('name', 'asc')->get();

  $datas['branch'] = Branch::orderBy('name', 'asc')->get();

  $datas['job_educations'] = $jobs->JobEducations;
  $datas['job_experiences'] = $jobs->JobExperiences;
  
  
  if(!empty($jobs->image) & $jobs->image != ' '){
    $image = $jobs->image;
  } else {
    $image = 'catalog/back.png';
  }
  $datas['jobs_requirements'] = [];
  $imagef= 'catalog/back.png';
  $image_file=Imagetool::mycrop($imagef, 100, 100);
  $datas['placeholder'] = $image_file;

  $datas['image'] = Imagetool::mycrop($image, 100, 100);

  $datas['salary_unit'] = Currency::orderBy('title', 'asc')->get();
  $datas['job_level'] = JobLevel::orderBy('name', 'asc')->get();
  $datas['education_level'] = EducationLevel::orderBy('name', 'asc')->get();
  $datas['job_location'] = JobLocation::orderBy('name', 'asc')->get();
  $datas['jobs'] = $jobs;
  $datas['jobs_f_fields'] = json_decode($jobs->formfields);
  $datas['education_levels'] = json_decode($jobs->education_levels);
  $datas['process_status'] = RecruitmentProcess::orderBy('id','asc')->get();
  $datas['jobs_location'] = [];
  foreach ($jobs->JobsLocation as $jl) {
  $datas['jobs_location'][] = $jl->location_id;
  }

  $datas['jobs_requirements'] = $jobs->JobsRequirements;
  $datas['jobs_form'] = $jobs->JobForm;


  return view('branchadmin.jobs.editform')->with('datas',$datas);
  } else {

  \Session::flash('alert-danger','You choosed wrong Data');
  return redirect('branchadmin/jobs'); 
  }
}

public function update(Request $request)
{
   
  if (isset($request->manual_education)) {
    $manual_education = $request->manual_education;
  }else{
    $manual_education = 0;
  }
  
  $this->validate($request, [
    
    'title' => 'required|min:3',
    'seo_url' => 'required|min:3|unique:jobs,seo_url,'.$request->id.',id',
    'branch' => 'required|integer',
    'job_availiability' => 'required',
    'vacancy_code' => 'required|min:3|unique:jobs,vacancy_code,'.$request->id.',id',
    'deadline' => 'required',
    'salary_unit' => 'required',
    'negotiable' => 'required',
    'apply_type' => 'required',
    'job_setting' => 'required',
    'status' => 'required'
  ]);

  if(!empty($request->file('file'))){

   $this->validate($request, [
    
    'file' => 'mimes:pdf,doc,docx|max:10000',
  ]);
   $path = DIR_IMAGE . $request->file_name;
   if (is_file($path)) {
    File::delete($path);
  }
  $filepath = Jobs::select('job_file')->where('id', $request->id)->first();
  $directory = DIR_IMAGE . 'file/';
  if (is_file($directory.$filepath->job_file)) {
    File::delete($directory.$filepath->job_file);
  }
  $file = $request->File('file');
  $fname = 'file/'. $file->getClientOriginalName();
  $ff= $file->getClientOriginalName();
  $request->file('file')->move($directory, $ff);
  } else {
    $fname = $request->file_name;
  }

  $datas = [
    'title' => $request->title,
    'branch_id' => $request->branch,
    'job_level' => $request->job_level,
    'job_availability' => $request->job_availiability,
    'deadline' => $request->deadline,
    'min_experience' => $request->minimum_experience,
    'position' => $request->position,
    'vacancy_code' => $request->vacancy_code,
    'external_link' => $request->external_link,
    'gender' => $request->gender,
    'salary_unit' => $request->salary_unit,
    'negotiable' => $request->negotiable,
    'minimum_salary' => $request->salary,
    'min_age' => $request->minimum_age,
    'max_age' => $request->maximum_age,
    'seo_url' => $request->seo_url,
    'status' => $request->status,
    'publish_date' => $request->publish_date,
    'assignment_handeler' => $request->assignment_hadeler,
    'line_manager' => $request->line_manager,
    'process_status' => $request->process_status,
    'setting' => $request->job_setting,
    'apply_type' => $request->apply_type,
    'emails' => $request->emails,
    'formfields' => json_encode($request->form_fields, true),
    'education_levels' => json_encode($request->education_levels, true),
    'emanual' => $manual_education,
    'job_file' => $fname,
    'advertise_link' => $request->advertise_link,
    'advertise_detail' => $request->advertise_detail,
    'image' => $request->image,
    'edu_marks' => $request->edu_marks,
    'exp_marks' => $request->exp_marks,
    'sort_order' =>$request->sort_order,
    'location_title' =>$request->location_title,
  ];
  $jobs=Jobs::where('id', $request->id)->update($datas);
  if($jobs)
  {
    JobsLocation::where('jobs_id', $request->id)->delete();
    JobRequirements::where('jobs_id', $request->id)->delete();

    JobExperience::where('jobs_id', $request->id)->delete();
    JobEducation::where('jobs_id', $request->id)->delete();
    if (isset($request->job_location) && count($request->job_location) > 0) {
      foreach ($request->job_location as $job_location) {
        JobsLocation::create(['jobs_id' => $request->id, 'location_id' => $job_location]);
      }
    }

    $require = [
      'jobs_id' => $request->id,
      'description' => $request->description,
      'specification' => $request->specification,
      'education_description' => $request->education_description,
      'specific_requirement' => $request->specific_requirement,
      'specific_instruction' => $request->specific_instruction
    ];
    JobRequirements::create($require);

    if (isset($request->job_experience) && count($request->job_experience) > 0) {
      foreach ($request->job_experience as $key => $expvalue) {
        if ($expvalue['exp_id'] != '') {
          $efvalue = [
            'jobs_id' => $request->id,
            'experience_id' => $expvalue['exp_id'],
            'experience' => $expvalue['experience'],
            'exp_format' => $expvalue['exp_format'],
          ];
          JobExperience::create($efvalue);
        }
      }
    }

    if (isset($request->job_education) && count($request->job_education) > 0) {
      foreach ($request->job_education as $key => $evalue) {
        if ($evalue['education_level'] != '') {
          $afvalue = [
            'jobs_id' => $request->id,
            'education_level_id' => $evalue['education_level'],
            'faculty_id' => $evalue['faculty'],
            'experience' => $evalue['experience'],
            'exp_format' => $evalue['exp_format'],
            'percent' => $evalue['percent'],
            'cgpa' => $evalue['cgpa'],
            'others' => $evalue['others'],
          ];
          JobEducation::create($afvalue);
        }
      }
    }
    \Session::flash('alert-success','Record have been saved Successfully');
    return redirect('branchadmin/jobs');
  } else {
    \Session::flash('alert-danger','Something Went Wrong on Saving Data');
    return redirect('branchadmin/jobs'); 
  }
}

public function jobView($id,Request $request)
{   
  $jobs= Jobs::where('id',$id)->first(); 
  if (isset($jobs->id)) {
  $datas['job'] = $jobs;
  // $company = Employers::where('id', $jobs->employers_id)->first();
  // if (isset($company->seo_url)) {
  //   $qr_url = url($company->seo_url.'/'.$jobs->seo_url);
  // } else {
  //   $qr_url = url('job/'.$jobs->seo_url);
  // }
  // $datas['qr_url'] = $qr_url;
  $datas['jobs_location'] = [];
  foreach ($jobs->JobsLocation as $jl) {
   $datas['jobs_location'][] = JobLocation::where('id', $jl->location_id)->first();
  }
  $datas['jobs_requirements'] = $jobs->JobsRequirements;
  $datas['jobs_form'] = [];
  foreach ($jobs->JobForm as $tabs) {
    $datas['jobs_form'][] = array(
      'level' => $tabs->f_lable,
      'rq' => $tabs->requ,
      'form' => \App\JobForm::createForm($tabs->id,$tabs->f_lable,$tabs->f_type,$tabs->list_menu,$tabs->requ,$tabs->marks,$tabs->extra,$tabs->extra_type,$tabs->fe_lable),
    );
  }
    $datas['job_educations'] = $jobs->JobEducations;
    $datas['job_experiences'] = $jobs->JobExperiences;
 
 
    $datas['source'] = [];
    $sources = FormData::where('jobs_id',$jobs->id)->where('f_title', 'Source of Vacancy Information')->groupBy('f_description')->get();
        
        if (count($sources) > 0) {
            foreach ($sources as $source) {
                $datas['source'][] = [
                    'title' => $source->f_description,
                    'total' => FormData::where('jobs_id',$jobs->id)->where('f_description', $source->f_description)->count()
                ];
            }
        }
  return view('branchadmin.jobs.view')->with('datas', $datas);
  } else{
    \Session::flash('alert-danger','Sorry we could not find your request.');
    return redirect()->back();
  }

}

public function Applications($id, Request $request)
{   
    $datas = [];
      

       
        $employee = Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0);
        if (isset($request->filter_name) && !empty($request->filter_name)) {
            $employee->where(\DB::raw('CONCAT_WS(" ", `firstname`, `middlename`, `lastname`)'), 'like', $request->filter_name . '%');
            $datas['filter_name'] = $request->filter_name;
        }else{
            $datas['filter_name'] = '';
        }

        if (isset($request->filter_id) && !empty($request->filter_id)) {
            $employee->where('id', $request->filter_id);
            $datas['filter_id'] = $request->filter_id;
        }else{
            $datas['filter_id'] = '';
        }

        
        if (isset($request->filter_email) && !empty($request->filter_email)) {
            $employee->where('email', $request->filter_email);
            $datas['filter_email'] = $request->filter_email;
        }else{
            $datas['filter_email'] = '';
        }


      $datas['employees'] = $employee->paginate(50);
      $datas['job_id'] = $id;

       $report = \App\JobReport::where('jobs_id', $id)->first();

          if (isset($report->id)) { 
            $datas['thumb'] = \App\JobReport::getThumb($report->id,'application_file');
            $datas['file'] = asset('image/'.$report->application_file);
            $datas['detail'] = $report->application_detail;
          } else {
            $datas['thumb'] = '';
            $datas['file'] = '';
            $datas['detail'] = '';
          }
          $notdata = [' The Himalayan Times','Kantipur',' Karobar Daily', ' Linkedin'];
         $daywise = Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('apply_date', '!=', NULL)->groupBy('apply_date')->get();
        $dy = [];
        foreach ($daywise as $dys) {
            //dd($dy);
           
            
            $dy[] = [
                'title' => $dys->apply_date,
                'total' => Employee::where('jobs_id', $id)->where('apply_date', $dys->apply_date)->count(),
                'total_visit' => \App\Counter::where('job_id', $id)->where('created_at', 'LIKE', $dys->apply_date.'%')->count(),
                'rolling' => FormData::where('jobs_id',$id)->where('f_title', 'Source of Vacancy Information?')->whereNotIn('f_description',$notdata)->where('created_at', 'LIKE', $dys->apply_date.'%')->count(),
            ];
        }
        
        $datas['daywise'] = $dy; 
        
        
        
        $vacancy_source = FormData::where('jobs_id',$id)->where('f_title', 'Source of Vacancy Information?')->whereIn('f_description',$notdata)->groupBy('f_description')->get();
        $rolling_source = FormData::where('jobs_id',$id)->where('f_title', 'Source of Vacancy Information?')->whereNotIn('f_description',$notdata)->count();
         $datas['vsource'][] = [
                'title' => 'Rolling Sourcing',
                'total_source' => $rolling_source,
            ];
        
        foreach($vacancy_source as $vso)
        {
            if($vso->f_description == '')
            {
                $title = 'Blank';
            }else{
                $title = $vso->f_description;
            }
            $datas['vsource'][] = [
                'title' => $title,
                'total_source' => FormData::where('jobs_id',$id)->where('f_title', 'Source of Vacancy Information?')->where('f_description', $vso->f_description)->count(),
                ];
        }
        
        
        
         $datas['total_male'] = Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('gender', 'male')->count();
        $datas['total_female'] = Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('gender', 'female')->count();
        
        
         $datas['age'][] = [
            'title' => '18-',
            'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '<', '18')->count(),
            'color' => '#f56954',
            
        ];
        $datas['age'][] = [
            'title' => '18-22',
            'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '>=', '18')->where('age', '<', '22')->count(),
            'color' => '#00a65a',
            
        ];

        $datas['age'][] = [
            'title' => '22-26',
            'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '>=', '22')->where('age', '<', '26')->count(),
            'color' => '#f39c12',
           
        ];
        $datas['age'][] = [
            'title' => '26-30',
            'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '>=', '26')->where('age', '<', '30')->count(),
            'color' => '#00c0ef',
            
        ];
        $datas['age'][] = [
            'title' => '30-40',
            'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '>=', '30')->where('age', '<', '40')->count(),
            'color' => '#3c8dbc',
            
        ];
        $datas['age'][] = [
            'title' => '40-50',
            'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '>=', '40')->where('age', '<=', '50')->count(),
            'color' => '#d2d6de',
            
        ];
        $datas['age'][] = [
            'title' => '50+',
            'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '>', '50')->count(),
            'color' => '#43e96e',
            
        ];
        
          $job = Jobs::select('title', 'id', 'branch_id', 'vacancy_code', 'process_status')->where('id',$id)->where('branch_id', auth()->guard('staffs')->user()->branch)->first();
          $employer = Branch::gettitle($job->branch_id);
          $datas['job_title'] = $job->title.' ('.$job->vacancy_code.')';
          $datas['jobs_id'] = $job->id;
          $datas['status'] = $job->process_status;
          $report = \App\JobDetail::where('jobs_id', $job->id)->where('detail_type', 0)->first();
          if (isset($report->id)) {
             $datas['report'] = [
                  'id' => $report->id,
                  'detail_type' => $report->detail_type,
                  'detail_date' => $report->detail_date,
                  'description' => $report->description,
                  'success_message' => $report->success_message,
                  'error_message' => $report->error_message,
              ];
          } else{
            $datas['report'] = [
                'id' => 0,
                'detail_type' => 0,
                'detail_date' => '',
                'description' => '',
                'success_message' => 'Dear %employee-name%,<br>Your application for the job position of '.$job->title.' ('.$job->vacancy_code.') for '.$employer.' was received on %application-date%.<br>The current status of recruitment process is <strong>"%job-process%"</strong>.',
                'error_message' => 'Dear %employee-name%,<br>Your application for the job position of '.$job->title.' ('.$job->vacancy_code.') for '.$employer.' was received on %application-date%.<br>The current status of recruitment process is <strong>"%job-process%"</strong>.<br>Your Further Recruitment Process Status : NOT SELECTED <br>We regret to inform you that you have NOT been selected for further recruitment process for the job position of '.$job->title.' ('.$job->vacancy_code.') for '.$employer.'.<br>Best wishes for upcoming successful job search. Thank you, again, for showing your interest in '.$employer.'.',
            ];
          }
          $datas['title'][] = ['value' => 1, 'title' => 'Document Verification'];
          $datas['title'][] = ['value' => 2, 'title' => 'Written Exam'];
          $datas['title'][] = ['value' => 3, 'title' => 'Group Discussion'];
          $datas['title'][] = ['value' => 4, 'title' => 'Final Interview'];
          $datas['title'][] = ['value' => 5, 'title' => 'Result Publish'];
          $datas['process_status'] = \App\RecruitmentProcess::orderBy('id','asc')->get();   
                
        return view('branchadmin.jobs.application')->with('datas',$datas);
}

public function writtenExam($id, Request $request)
{
    
  $datas = [];
    $datas['meeting'] = EmployeeMeeting::where('job_id', $id)->where('tab_id', '=', 2)->where('start_time', '>=', date('Y-m-d H:i:s'))->get();
  $employee = Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('written_exam', 1);
    if (isset($request->filter_name) && !empty($request->filter_name)) {
        $employee->where(\DB::raw('CONCAT_WS(" ", `firstname`, `middlename`, `lastname`)'), 'like', $request->filter_name . '%');
        $datas['filter_name'] = $request->filter_name;
    }else{
        $datas['filter_name'] = '';
    }

    if (isset($request->filter_id) && !empty($request->filter_id)) {
        $employee->where('id', $request->filter_id);
        $datas['filter_id'] = $request->filter_id;
    }else{
        $datas['filter_id'] = '';
    }


    if (isset($request->filter_symbol_no) && !empty($request->filter_symbol_no)) {
        $employee->where('symbol_no', $request->filter_symbol_no);
        $datas['filter_symbol_no'] = $request->filter_symbol_no;
    }else{
        $datas['filter_symbol_no'] = '';
    }

    
    if (isset($request->filter_email) && !empty($request->filter_email)) {
        $employee->where('email', $request->filter_email);
        $datas['filter_email'] = $request->filter_email;
    }else{
        $datas['filter_email'] = '';
    }
      $datas['job_id'] = $id;
  $datas['employees'] = $employee->paginate(50);
  $report = \App\JobReport::where('jobs_id', $id)->first();
      if (isset($report->id)) { 
        $datas['thumb'] = \App\JobReport::getThumb($report->id,'written_file');
        $datas['file'] = asset('image/'.$report->written_file);
        $datas['detail'] = $report->written_detail;
      } else {
        $datas['thumb'] = '';
        $datas['file'] = '';
        $datas['detail'] = '';
      }
        $job = Jobs::select('title', 'id', 'branch_id', 'vacancy_code', 'process_status')->where('id',$id)->where('branch_id', auth()->guard('staffs')->user()->branch)->first();

      $employer = Branch::gettitle($job->branch_id);
      
      $datas['job_title'] = $job->title.' ('.$job->vacancy_code.')';
      $datas['jobs_id'] = $job->id;
      $datas['status'] = $job->process_status;
      $report = \App\JobDetail::where('jobs_id', $job->id)->where('detail_type', 2)->first();
      if (isset($report->id)) {
          $datas['report'] = [
              'id' => $report->id,
              'detail_type' => $report->detail_type,
              'detail_date' => $report->detail_date,
              'detail_time' => $report->detail_time,
              'detail_venue' => $report->detail_venue,
              'description' => $report->description,
              'success_message' => $report->success_message,
              'error_message' => $report->error_message,
          ];
      } else{
        $datas['report'] = [
            'id' => 0,
            'detail_type' => 2,
            'detail_date' => '',
            'detail_time' => '',
            'detail_venue' => '',
            'description' => '',
            'success_message' => 'Dear %employee-name%,<br>Your application for the job position of '.$job->title.' ('.$job->vacancy_code.') for '.$employer.' was received on %application-date%.<br>The current status of recruitment process is <strong>"%job-process%"</strong>.<br>Your Further Recruitment Process Status :SELECTED<br>You have been selected for further process of "Written Exam". The details of the process has been sent in your email address.',
            'error_message' => 'Dear %employee-name%,<br>Your application for the job position of '.$job->title.' ('.$job->vacancy_code.') for '.$employer.' was received on %application-date%.<br>The current status of recruitment process is <strong>"%job-process%"</strong>.<br>Your Further Recruitment Process Status : NOT SELECTED <br>We regret to inform you that you have NOT been selected for further recruitment process for the job position of '.$job->title.' ('.$job->vacancy_code.') for '.$employer.'.<br>Best wishes for upcoming successful job search. Thank you, again, for showing your interest in '.$employer.'.',
        ];
      }
      $datas['title'][] = ['value' => 1, 'title' => 'Document Verification'];
      $datas['title'][] = ['value' => 2, 'title' => 'Written Exam'];
      $datas['title'][] = ['value' => 3, 'title' => 'Group Discussion'];
      $datas['title'][] = ['value' => 4, 'title' => 'Final Interview'];
      $datas['title'][] = ['value' => 5, 'title' => 'Result Publish'];
      $datas['process_status'] = \App\RecruitmentProcess::orderBy('id','asc')->get();   
      
      
      
      $datas['total_male'] = Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('written_exam', 1)->where('gender', 'male')->count();
    $datas['total_female'] = Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('written_exam', 1)->where('gender', 'female')->count();
    
    
      $datas['age'][] = [
        'title' => '18-',
        'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '<', '18')->where('written_exam', 1)->count(),
        'color' => '#f56954',
        
    ];
    $datas['age'][] = [
        'title' => '18-22',
        'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '>=', '18')->where('age', '<', '22')->where('written_exam', 1)->count(),
        'color' => '#00a65a',
        
    ];

    $datas['age'][] = [
        'title' => '22-26',
        'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '>=', '22')->where('age', '<', '26')->where('written_exam', 1)->count(),
        'color' => '#f39c12',
        
    ];
    $datas['age'][] = [
        'title' => '26-30',
        'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '>=', '26')->where('age', '<', '30')->where('written_exam', 1)->count(),
        'color' => '#00c0ef',
        
    ];
    $datas['age'][] = [
        'title' => '30-40',
        'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '>=', '30')->where('age', '<', '40')->where('written_exam', 1)->count(),
        'color' => '#3c8dbc',
        
    ];
    $datas['age'][] = [
        'title' => '40-50',
        'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '>=', '40')->where('age', '<=', '50')->where('written_exam', 1)->count(),
        'color' => '#d2d6de',
        
    ];
    $datas['age'][] = [
        'title' => '50+',
        'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '>', '50')->where('written_exam', 1)->count(),
        'color' => '#43e96e',
        
    ];
    return view('branchadmin.jobs.written_exam')->with('datas',$datas);
}

public function updateApplication(Request $request)
{  
  $v= Validator::make($request->all(),
    [
      'job_id'=>'required|integer',
      
      
    ]);
  if($v->fails())
  {
    \Session::flash('alert-danger','Sorry we did not found the job.');
    return redirect()->back();
  }


  if (count($request->employee_id) > 0) {
    foreach ($request->employee_id as $value) {
      Employee::where('id', $value)->update(['document_verification' => 1]);
    }
    \Session::flash('alert-success','You Successfully update application for written exam.');
    return redirect('branchadmin/jobs/written/'.$request->job_id);
  } else{
    \Session::flash('alert-danger','Sorry you did not select any application.');
    return redirect()->back();
  }

}

public function updateWritten(Request $request)
{
  $v= Validator::make($request->all(),
    [
      'job_id'=>'required|integer',
    ]);
  if($v->fails())
  {
    \Session::flash('alert-danger','Sorry we did not found the job.');
    return redirect()->back();
  }
  if (count($request->employee_id) > 0) {
    foreach ($request->employee_id as $value) {
      Employee::where('id', $value)->update(['group_discussion' => 1]);
    }
    \Session::flash('alert-success','You Successfully update application for Group Discussion.');
    return redirect('branchadmin/jobs/discussion/'.$request->job_id);
  } else{
    \Session::flash('alert-danger','Sorry you did not select any application.');
    return redirect()->back();
  }
}

public function updateDiscussion(Request $request)
{
  $v= Validator::make($request->all(),
    [
      'job_id'=>'required|integer',
    ]);
  if($v->fails())
  {
    \Session::flash('alert-danger','Sorry we did not found the job.');
    return redirect()->back();
  }
  if (count($request->employee_id) > 0) {
    foreach ($request->employee_id as $value) {
      Employee::where('id', $value)->update(['final_interview' => 1]);
    }
    \Session::flash('alert-success','You Successfully update application for final interview.');
    return redirect('branchadmin/jobs/interview/'.$request->job_id);
  } else{
    \Session::flash('alert-danger','Sorry you did not select any application.');
    return redirect()->back();
  }
}
public function updateInterview(Request $request)
{
  $v= Validator::make($request->all(),
    [
      'job_id'=>'required|integer',
    ]);
  if($v->fails())
  {
    \Session::flash('alert-danger','Sorry we did not found the job.');
    return redirect()->back();
  }


  if (count($request->employee_id) > 0) {
    foreach ($request->employee_id as $value) {
      Employee::where('id', $value)->update(['final_selection' => 1]);
    }
    \Session::flash('alert-success','You Successfully update application for final selection.');
    return redirect('branchadmin/jobs/selected/'.$request->job_id);
  } else{
    \Session::flash('alert-danger','Sorry you did not select any application.');
    return redirect()->back();
  }
}

public function applicationView($id)
{
  $employee= Employee::where('id',$id)->first();
  if($employee) {
    if (isset($employee->image) && !empty($employee->image)) {
    $datas['image'] = asset('image/'.$employee->image);
  } else {
    $datas['image'] ='';
  }

  $job = Jobs::select('location_title')->where('id', $employee->jobs_id)->first();
  $datas['location_title'] = '';
  if (isset($job->location_title)) {
    $datas['location_title'] = $job->location_title;
  }
  $datas['employee'] = $employee;


  $datas['education'] = $employee->EmployeeEducation;
  $datas['experience'] = $employee->EmployeeExperience;
  $datas['language'] = $employee->EmployeeLanguage;

  $datas['reference'] = $employee->EmployeeReference;
  $datas['form_data'] = FormData::where('employees_id', $employee->id)->get();
  $datas['training'] = $employee->EmployeeTraining;

  return view('branchadmin.jobs.applicant_view')->with('datas', $datas);
  } else {

  \Session::flash('alert-danger','You choosed wrong Data');
  return redirect()->back();
  }
}

public function meetingCallView($tab_id,$job_id,$id)
{
    $employee= Employee::where('id',$id)->first();
    if($employee) {
        $datas['employee'] = $employee;
        $datas['job_id']=$job_id;
        $datas['tab_id']=$tab_id;

        return view('branchadmin.jobs.meetingform')->with('datas', $datas);
    } else {

        \Session::flash('alert-danger','You choosed wrong Data');
        return redirect()->back();
    }
}


public function meetingView(Request $request)
{
    $v= Validator::make($request->all(),
        [
            'topic' => 'required|min:5',
            'password' => 'required|min:6|max:10',
        ]);
    if($v->fails()) {
        return redirect()->back()->withErrors($v)
            ->withInput();
    } else {
        $employee= Employee::where('id',$request->id)->first();
        $start_time=$request->start_date.'T'.$request->start_time.':00Z';
//        get token from function
        $token=$this->getZoomToken();
        if($employee) {
    //        zoom api
            $curl = curl_init();
            $body = json_encode(array(
                'topic'=> $request->topic,
                'type'=> '2',
                'start_time'=> $start_time,
                'duration'=> '40',
                'schedule_for'=> 'depeshkhatiwada@gmail.com',
                'timezone'=> 'Asia/Kathmandu',
                'password'=> $request->password,
                'agenda'=> $request->topic,
                'settings' => array(
                    'host_video'=> 'true',
                    'participant_video'=> 'true',
                    'cn_meeting'=> 'false',
                    'in_meeting'=> 'true',
                    'join_before_host'=> 'true',
                    'mute_upon_entry'=> 'true',
                    'watermark'=> 'false',
                    'use_pmi'=> 'false',
                    'approval_type'=> '0',
                    'registration_type'=> '1',
                    'audio'=> 'both',
                    'auto_recording'=> 'none',
                    'enforce_login'=> 'false',
                    'registrants_email_notification'=> 'true'
                )
            ), true);
            curl_setopt_array($curl, array(
                CURLOPT_HTTPHEADER => array(
                    "authorization: Bearer $token",
                    "content-type: application/json"
                ),
                CURLOPT_URL => "https://api.zoom.us/v2/users/depeshkhatiwada@gmail.com/meetings",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $body,

            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                $resp = json_decode($response);
//            dd($resp);
                try {
                    $email='deepaacee@gmail.com';
                    $staff = $employee->firstname;
                    //dd($email);
                    $val= [
                        'data' => $employee ,
                        'api' => $resp ,
                    ];
                    Mail::send('mail.zoom-meeting', $val, function ($message) use($email,$staff) {
                        $message->to($email, $staff);
                        $message->subject('Zoom Meeting Invitation');
                    });
                } catch (\Exception $e) {
                    dd($e);
                }
//                saving details to database
                $employeeMeeting=EmployeeMeeting::create([
                    'tab_id' => $request->tab_id,
                    'job_id' => $request->job_id,
                    'employee_id' => json_encode($employee->id),
                    'topic' => $resp->topic,
                    'start_time' => $resp->start_time,
                    'zoom_id' => $resp->id,
                    'zoom_password' => $resp->password,
                    'zoom_url'=> $resp->join_url
                ]);
                if($employeeMeeting)
                {
                    \Session::flash('alert-success','You Successfully invite application for zoom meeting with id: '.$resp->id);
                    return redirect('branchadmin/jobs');
                } else {

                    \Session::flash('alert-danger','Something Went Wrong on Saving Data');
                    return redirect('branchadmin/jobs');
                }
            }
        } else {

            \Session::flash('alert-danger','You choosed wrong Data');
            return redirect()->back();
        }
    }

}

public function groupMeetingView(Request $request)
{
//    dd($request);
    $v= Validator::make($request->all(),
        [
            'job_id'=>'required|integer',
        ]);
    if($v->fails())
    {
        \Session::flash('alert-danger','Sorry we did not found the job.');
        return redirect()->back();
    }
    if (count($request->employee_id) > 0) {
        $datas['employee_id']= $request->employee_id;
        $datas['job_id']= $request->job_id;
        $datas['tab_id']=$request->tab_id;
//        dd($datas['employee_id']);
        if($datas) {
            return view('branchadmin.jobs.groupmeetingform')->with('datas', $datas);

        } else {
            \Session::flash('alert-danger','You choosed wrong Data');
            return redirect()->back();
        }
    } else{
        \Session::flash('alert-danger','Sorry you did not select any application.');
        return redirect()->back();
    }
}

public function callGroupMeeting(Request $request)
{
    $v= Validator::make($request->all(),
        [
            'topic' => 'required|min:5',
            'password' => 'required|min:6|max:10',
        ]);
    if($v->fails()) {
        return redirect()->back()->withErrors($v)
            ->withInput();
    }
    if (count($request->id) > 0) {
        $start_time=$request->start_date.'T'.$request->start_time.':00Z';
//        get token from function
        $token=$this->getZoomToken();
//        zoom api
        $curl = curl_init();
        $body = json_encode(array(
            'topic'=> $request->topic,
            'type'=> '2',
            'start_time'=> $start_time,
            'duration'=> '40',
            'schedule_for'=> 'depeshkhatiwada@gmail.com',
            'timezone'=> 'Asia/Kathmandu',
            'password'=> $request->password,
            'agenda'=> $request->topic,
            'settings' => array(
                'host_video'=> 'true',
                'participant_video'=> 'true',
                'cn_meeting'=> 'false',
                'in_meeting'=> 'true',
                'join_before_host'=> 'true',
                'mute_upon_entry'=> 'true',
                'watermark'=> 'false',
                'use_pmi'=> 'false',
                'approval_type'=> '0',
                'registration_type'=> '1',
                'audio'=> 'both',
                'auto_recording'=> 'none',
                'enforce_login'=> 'false',
                'registrants_email_notification'=> 'true'
            )
        ), true);
        curl_setopt_array($curl, array(
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer $token",
                "content-type: application/json"
            ),
            CURLOPT_URL => "https://api.zoom.us/v2/users/depeshkhatiwada@gmail.com/meetings",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $body,

        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "CURL Error #:" . $err;
        } else {
            $resp = json_decode($response);
            foreach ($request->id as $value) {
                $employee = Employee::where('id', $value)->first();
                try {
                    $email='deepaacee@gmail.com';
                    $staff = $employee->firstname;
                    //dd($email);
                    $val= [
                        'data' => $employee ,
                        'api' => $resp ,
                    ];
                    Mail::send('mail.zoom-meeting', $val, function ($message) use($email,$staff) {
                        $message->to($email, $staff);
                        $message->subject('Zoom Meeting Invitation');
                    });
                } catch (\Exception $e) {
                    dd($e);
                }
            }
//          saving details to database
            $employeeMeeting=EmployeeMeeting::create([
                'tab_id' => $request->tab_id,
                'job_id' => $request->job_id,
                'employee_id' => json_encode($request->id),
                'topic' => $resp->topic,
                'start_time' => $resp->start_time,
                'zoom_id' => $resp->id,
                'zoom_password' => $resp->password,
                'zoom_url'=> $resp->join_url
            ]);
            if($employeeMeeting)
            {
                \Session::flash('alert-success','You Successfully invite application for zoom meeting with id: '.$resp->id);
                return redirect('branchadmin/jobs');
            } else {

                \Session::flash('alert-danger','Something Went Wrong on Saving Data');
                return redirect('branchadmin/jobs');
            }
        }
    } else{
        \Session::flash('alert-danger','Sorry you did not select any application.');
        return redirect()->back();
    }
}

public function discussionView($id)
{ 
  $employee= Employee::where('id',$id)->first();
  if($employee) {
    if (isset($employee->image) && !empty($employee->image)) {
    $datas['image'] = asset('image/' . $employee->image);
  } else {
    $datas['image'] ='';
  }


  $datas['employee'] = $employee;


  $datas['education'] = $employee->EmployeeEducation;
  $datas['experience'] = $employee->EmployeeExperience;
  $datas['language'] = $employee->EmployeeLanguage;

  $datas['reference'] = $employee->EmployeeReference;
  $datas['form_data'] = FormData::where('employees_id', $employee->id)->get();
  $datas['training'] = $employee->EmployeeTraining;

  return view('branchadmin.jobs.discussion_view')->with('datas', $datas);
  } else {

  \Session::flash('alert-danger','You choosed wrong Data');
  return redirect()->back(); 
  }

}

public function interviewView($id)
{
  $employee= Employee::where('id',$id)->first();
  if($employee) {
    if (isset($employee->image) && !empty($employee->image)) {
    $datas['image'] = asset('image/' . $employee->image);
  } else {
    $datas['image'] ='';
  }


  $datas['employee'] = $employee;


  $datas['education'] = $employee->EmployeeEducation;
  $datas['experience'] = $employee->EmployeeExperience;
  $datas['language'] = $employee->EmployeeLanguage;

  $datas['reference'] = $employee->EmployeeReference;
  $datas['form_data'] = FormData::where('employees_id', $employee->id)->get();
  $datas['training'] = $employee->EmployeeTraining;

  return view('branchadmin.jobs.interview_view')->with('datas', $datas);
  } else {

  \Session::flash('alert-danger','You choosed wrong Data');
  return redirect()->back(); 
  }

}
public function selectedView($id)
{
  $employee= Employee::where('id',$id)->first();
  if($employee) {
    if (isset($employee->image) && !empty($employee->image)) {
    $datas['image'] = asset('image/' . $employee->image);
  } else {
    $datas['image'] ='';
  }


  $datas['employee'] = $employee;


  $datas['education'] = $employee->EmployeeEducation;
  $datas['experience'] = $employee->EmployeeExperience;
  $datas['language'] = $employee->EmployeeLanguage;

  $datas['reference'] = $employee->EmployeeReference;
  $datas['form_data'] = FormData::where('employees_id', $employee->id)->get();
  $datas['training'] = $employee->EmployeeTraining;

  return view('branchadmin.jobs.selected_view')->with('datas', $datas);
  } else {

  \Session::flash('alert-danger','You choosed wrong Data');
  return redirect()->back(); 
  }

}

public function applicationPrint($id)
{ 
  $employee= Employee::where('id',$id)->first();
  if($employee) {
    if (isset($employee->image) && !empty($employee->image)) {
    $datas['image'] = asset('image/' . $employee->image);
  } else {
    $datas['image'] ='';
  }


  $datas['employee'] = $employee;

  $datas['education'] = $employee->EmployeeEducation;
  $datas['experience'] = $employee->EmployeeExperience;
  $datas['language'] = $employee->EmployeeLanguage;

  $datas['reference'] = $employee->EmployeeReference;
  $datas['form_data'] = FormData::where('employees_id', $employee->id)->get();
  $datas['training'] = $employee->EmployeeTraining;

  return view('branchadmin.jobs.applicant_pdf')->with('datas', $datas);
  } else {

  \Session::flash('alert-danger','You choosed wrong Data');
  return redirect()->back(); 
  }

}

public function discussionPrint($id)
{
  $employee= Employee::where('id',$id)->first();
  if($employee) {
    if (isset($employee->image) && !empty($employee->image)) {
    $datas['image'] = asset('image/' . $employee->image);
  } else {
    $datas['image'] ='';
  }


  $datas['employee'] = $employee;

  $datas['education'] = $employee->EmployeeEducation;
  $datas['experience'] = $employee->EmployeeExperience;
  $datas['language'] = $employee->EmployeeLanguage;

  $datas['reference'] = $employee->EmployeeReference;
  $datas['form_data'] = FormData::where('employees_id', $employee->id)->get();
  $datas['training'] = $employee->EmployeeTraining;

  return view('branchadmin.jobs.written_pdf')->with('datas', $datas);
  } else {

  \Session::flash('alert-danger','You choosed wrong Data');
  return redirect()->back(); 
  }

}

public function applicationPdf($id)
{
  $employee= Employee::where('id',$id)->first();
  if($employee) {
  if (isset($employee->image) && !empty($employee->image)) {
    $datas['image'] = asset('image/' . $employee->image);
  } else {
    $datas['image'] ='';
  }


  $datas['employee'] = $employee;

  $datas['education'] = $employee->EmployeeEducation;
  $datas['experience'] = $employee->EmployeeExperience;
  $datas['language'] = $employee->EmployeeLanguage;

  $datas['reference'] = $employee->EmployeeReference;
  $datas['form_data'] = FormData::where('employees_id', $employee->id)->get();
  $datas['training'] = $employee->EmployeeTraining;

  $pdf = PDF::loadView('branchadmin.jobs.applicant_pdf', ['datas' => $datas]);
  return $pdf->download(preg_replace('/\s+/', '-', $employee->firstname).'_'.$employee->lastname.'.pdf');
  } else {

  \Session::flash('alert-danger','You choosed wrong Data');
  return redirect()->back(); 
  }

}
public function discussionPdf($id)
{
  $employee= Employee::where('id',$id)->first();
  if($employee) {
  if (isset($employee->image) && !empty($employee->image)) {
    $datas['image'] = asset('image/' . $employee->image);
  } else {
    $datas['image'] ='';
  }


  $datas['employee'] = $employee;

  $datas['education'] = $employee->EmployeeEducation;
  $datas['experience'] = $employee->EmployeeExperience;
  $datas['language'] = $employee->EmployeeLanguage;

  $datas['reference'] = $employee->EmployeeReference;
  $datas['form_data'] = FormData::where('employees_id', $employee->id)->get();
  $datas['training'] = $employee->EmployeeTraining;

  $pdf = PDF::loadView('branchadmin.jobs.written_pdf', ['datas' => $datas]);
  return $pdf->download(preg_replace('/\s+/', '-', $employee->firstname).'_'.$employee->lastname.'.pdf');
  } else {

  \Session::flash('alert-danger','You choosed wrong Data');
  return redirect()->back(); 
  }

}

public function interviewPdf($id)
{ 
  $employee= Employee::where('id',$id)->first();
  if($employee) {
  if (isset($employee->image) && !empty($employee->image)) {
    $datas['image'] = asset('image/' . $employee->image);
  } else {
    $datas['image'] ='';
  }


  $datas['employee'] = $employee;

  $datas['education'] = $employee->EmployeeEducation;
  $datas['experience'] = $employee->EmployeeExperience;
  $datas['language'] = $employee->EmployeeLanguage;

  $datas['reference'] = $employee->EmployeeReference;
  $datas['form_data'] = FormData::where('employees_id', $employee->id)->get();
  $datas['training'] = $employee->EmployeeTraining;

  $pdf = PDF::loadView('branchadmin.jobs.written_pdf', ['datas' => $datas]);
  return $pdf->download(preg_replace('/\s+/', '-', $employee->firstname).'_'.$employee->lastname.'.pdf');
  } else {

  \Session::flash('alert-danger','You choosed wrong Data');
  return redirect()->back(); 
  }

}

public function selectedPdf($id)
{
  $employee= Employee::where('id',$id)->first();
  if($employee) {
  if (isset($employee->image) && !empty($employee->image)) {
    $datas['image'] = asset('image/' . $employee->image);
  } else {
    $datas['image'] ='';
  }


  $datas['employee'] = $employee;

  $datas['education'] = $employee->EmployeeEducation;
  $datas['experience'] = $employee->EmployeeExperience;
  $datas['language'] = $employee->EmployeeLanguage;

  $datas['reference'] = $employee->EmployeeReference;
  $datas['form_data'] = FormData::where('employees_id', $employee->id)->get();
  $datas['training'] = $employee->EmployeeTraining;

  $pdf = PDF::loadView('branchadmin.jobs.written_pdf', ['datas' => $datas]);
  return $pdf->download(preg_replace('/\s+/', '-', $employee->firstname).'_'.$employee->lastname.'.pdf');
  } else {

  \Session::flash('alert-danger','You choosed wrong Data');
  return redirect()->back(); 
  }

}

public function writtenDelete($id)
{ 
  Employee::where('id', $id)->update(['written_exam' => 0]);
  \Session::flash('alert-success','You Successfully update Applicant');
  return redirect()->back();
}

public function discussionDelete($id)
{
  Employee::where('id', $id)->update(['group_discussion' => 0]);
  \Session::flash('alert-success','You Successfully update Applicant');
  return redirect()->back();
}
public function interviewDelete($id)
{
  Employee::where('id', $id)->update(['final_interview' => 0]);
  \Session::flash('alert-success','You Successfully update Applicant');
  return redirect()->back();
}
public function selectedDelete($id)
{
  Employee::where('id', $id)->update(['final_selection' => 0]);
  \Session::flash('alert-success','You Successfully update Applicant');
  return redirect()->back();
}

public function writtenView($id)
{ 
  $employee= Employee::where('id',$id)->first();
  if($employee) {
    if (isset($employee->image) && !empty($employee->image)) {
    $datas['image'] = asset('image/' . $employee->image);
  } else {
    $datas['image'] ='';
  }


  $datas['employee'] = $employee;


  $datas['education'] = $employee->EmployeeEducation;
  $datas['experience'] = $employee->EmployeeExperience;
  $datas['language'] = $employee->EmployeeLanguage;

  $datas['reference'] = $employee->EmployeeReference;
  $datas['form_data'] = FormData::where('employees_id', $employee->id)->get();
  $datas['training'] = $employee->EmployeeTraining;

  return view('branchadmin.jobs.written_view')->with('datas', $datas);
  } else {

  \Session::flash('alert-danger','You choosed wrong Data');
  return redirect()->back(); 
  }

}

public function writtenPrint($id)
{ 
  $employee= Employee::where('id',$id)->first();
  if($employee) {
    if (isset($employee->image) && !empty($employee->image)) {
    $datas['image'] = asset('image/' . $employee->image);
  } else {
    $datas['image'] ='';
  }
  $datas['employee'] = $employee;
  $datas['education'] = $employee->EmployeeEducation;
  $datas['experience'] = $employee->EmployeeExperience;
  $datas['language'] = $employee->EmployeeLanguage;
  $datas['reference'] = $employee->EmployeeReference;
  $datas['form_data'] = FormData::where('employees_id', $employee->id)->get();
  $datas['training'] = $employee->EmployeeTraining;
  return view('branchadmin.jobs.written_pdf')->with('datas', $datas);
  } else {

  \Session::flash('alert-danger','You choosed wrong Data');
  return redirect()->back(); 
  }
}

public function interviewPrint($id)
{ 
  $employee= Employee::where('id',$id)->first();
  if($employee) {
    if (isset($employee->image) && !empty($employee->image)) {
    $datas['image'] = asset('image/' . $employee->image);
  } else {
    $datas['image'] ='';
  }
  $datas['employee'] = $employee;

  $datas['education'] = $employee->EmployeeEducation;
  $datas['experience'] = $employee->EmployeeExperience;
  $datas['language'] = $employee->EmployeeLanguage;

  $datas['reference'] = $employee->EmployeeReference;
  $datas['form_data'] = FormData::where('employees_id', $employee->id)->get();
  $datas['training'] = $employee->EmployeeTraining;

  return view('branchadmin.jobs.written_pdf')->with('datas', $datas);
  } else {

  \Session::flash('alert-danger','You choosed wrong Data');
  return redirect()->back(); 
  }

}
public function selectedPrint($id)
{
  $employee= Employee::where('id',$id)->first();
  if($employee) {
    if (isset($employee->image) && !empty($employee->image)) {
    $datas['image'] = asset('image/' . $employee->image);
  } else {
    $datas['image'] ='';
  }

  $datas['employee'] = $employee;

  $datas['education'] = $employee->EmployeeEducation;
  $datas['experience'] = $employee->EmployeeExperience;
  $datas['language'] = $employee->EmployeeLanguage;

  $datas['reference'] = $employee->EmployeeReference;
  $datas['form_data'] = FormData::where('employees_id', $employee->id)->get();
  $datas['training'] = $employee->EmployeeTraining;

  return view('branchadmin.jobs.written_pdf')->with('datas', $datas);
  } else {

  \Session::flash('alert-danger','You choosed wrong Data');
  return redirect()->back(); 
  }

}

public function writtenPdf($id)
{
  $employee= Employee::where('id',$id)->first();
  if($employee) {
  if (isset($employee->image) && !empty($employee->image)) {
    $datas['image'] = asset('image/' . $employee->image);
  } else {
    $datas['image'] ='';
  }

  $datas['employee'] = $employee;

  $datas['education'] = $employee->EmployeeEducation;
  $datas['experience'] = $employee->EmployeeExperience;
  $datas['language'] = $employee->EmployeeLanguage;

  $datas['reference'] = $employee->EmployeeReference;
  $datas['form_data'] = FormData::where('employees_id', $employee->id)->get();
  $datas['training'] = $employee->EmployeeTraining;

  $pdf = PDF::loadView('branchadmin.jobs.written_pdf', ['datas' => $datas]);
  return $pdf->download(preg_replace('/\s+/', '-', $employee->firstname).'_'.$employee->lastname.'.pdf');
  } else {

  \Session::flash('alert-danger','You choosed wrong Data');
  return redirect()->back(); 
  }

}

public function generateSymbol($id,$type)
{


  $job = Jobs::where('id', $id)->first();

  if (isset($job->id)) {
      $applications = [];
  if($type == 1){
    $applications = Employee::select('id')->where('document_verification', 1)->orderBy('firstname', 'asc')->get();
  }else{
        $applications = Employee::select('id')->where('written_exam', 1)->orderBy('firstname', 'asc')->get();
  }
    if (count($applications) > 0) {
      $sym = 1;
      foreach ($applications as $app) {
          $string = str_pad($sym, 5, "0", STR_PAD_LEFT);
        Employee::where('id', $app->id)->update(['symbol_no' => $job->vacancy_code.'-'.$string]);
        $sym++;
      }
    }
    \Session::flash('alert-success','You Successfully generate Symbol Number for the Applicant');
    return redirect()->back();
  } else{
    \Session::flash('alert-danger','Sorry we did not found this job you selected');
    return redirect()->back(); 
  }

}


public function uploadXldiscussion(Request $request)
{
    $v= Validator::make($request->all(),
    [
      'jobs_id' => 'required|integer',
      'upload_file' => 'mimes:csv,txt',
      
    ]);
    if($v->fails())
    {
      \Session::flash('alert-danger','Data Validation Fail.');
      return redirect()->back()->withErrors($v)
      ->withInput();     
    } 
    //get file
    $upload = $request->file('upload_file');
    $filePath = $upload->getRealPath();
    //open and read
    $file = fopen($filePath, 'r');
    $header = fgetcsv($file);
    $lheader = [];
    foreach ($header as $key => $value) {
      $lh = strtolower($value);
      array_push($lheader, $lh);
    }
    while ($columns = fgetcsv($file) ) {
      if($columns[0] == "")
      {
        continue;
      }
      foreach ($columns as $key => &$value) {
        $vlaue = trim($value);
      }
      $data = array_combine($lheader, $columns);
      $applicant_id = $data['applicant'];
      Employee::where('jobs_id', $request->jobs_id)->where('id', $applicant_id)->update(['group_discussion' => 1]);
    }
    \Session::flash('alert-success','Record have been updated Successfully');
    return redirect()->back();
}


public function uploadXlinterview(Request $request)
{
  $v= Validator::make($request->all(),
  [
    'jobs_id' => 'required|integer',
    'upload_file' => 'mimes:csv,txt',
    
  ]);
  if($v->fails())
  {
    \Session::flash('alert-danger','Data Validation Fail.');
    return redirect()->back()->withErrors($v)
    ->withInput();     
  } 
  //get file
  $upload = $request->file('upload_file');
  $filePath = $upload->getRealPath();
  //open and read
  $file = fopen($filePath, 'r');
  $header = fgetcsv($file);
  $lheader = [];
  foreach ($header as $key => $value) {
    $lh = strtolower($value);
    array_push($lheader, $lh);
  }
  while ($columns = fgetcsv($file) ) {
    if($columns[0] == "")
    {
      continue;
    }
    foreach ($columns as $key => &$value) {
      $vlaue = trim($value);
    }
    $data = array_combine($lheader, $columns);
    $applicant_id = $data['applicant'];
    Employee::where('jobs_id', $request->jobs_id)->where('id', $applicant_id)->update(['final_interview' => 1]);
  }
  \Session::flash('alert-success','Record have been updated Successfully');
  return redirect()->back();
}

public function uploadXlselected(Request $request)
{
  $v= Validator::make($request->all(),
  [
    'jobs_id' => 'required|integer',
    'upload_file' => 'mimes:csv,txt',
    
  ]);
  if($v->fails())
  {
    \Session::flash('alert-danger','Data Validation Fail.');
    return redirect()->back()->withErrors($v)
    ->withInput();     
  } 
  //get file
  $upload = $request->file('upload_file');
  $filePath = $upload->getRealPath();
  //open and read
  $file = fopen($filePath, 'r');
  $header = fgetcsv($file);
  $lheader = [];
  foreach ($header as $key => $value) {
    $lh = strtolower($value);
    array_push($lheader, $lh);
  }
  while ($columns = fgetcsv($file) ) {
    if($columns[0] == "")
    {
      continue;
    }
    foreach ($columns as $key => &$value) {
      $vlaue = trim($value);
    }
    $data = array_combine($lheader, $columns);
    $applicant_id = $data['applicant'];
    Employee::where('jobs_id', $request->jobs_id)->where('id', $applicant_id)->update(['final_selection' => 1]);
  }

  \Session::flash('alert-success','Record have been updated Successfully');
  return redirect()->back();
}


public function discussion($id, Request $request)
{
      $datas = [];
    $datas['meeting'] = EmployeeMeeting::where('job_id', $id)->where('tab_id', '=', 3)->where('start_time', '>=', date('Y-m-d H:i:s'))->get();
      $employee = Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('group_discussion', 1);
       if (isset($request->filter_name) && !empty($request->filter_name)) {
            $employee->where(\DB::raw('CONCAT_WS(" ", `firstname`, `middlename`, `lastname`)'), 'like', $request->filter_name . '%');
            $datas['filter_name'] = $request->filter_name;
        }else{
            $datas['filter_name'] = '';
        }

        if (isset($request->filter_id) && !empty($request->filter_id)) {
            $employee->where('id', $request->filter_id);
            $datas['filter_id'] = $request->filter_id;
        }else{
            $datas['filter_id'] = '';
        }

        
        if (isset($request->filter_email) && !empty($request->filter_email)) {
            $employee->where('email', $request->filter_email);
            $datas['filter_email'] = $request->filter_email;
        }else{
            $datas['filter_email'] = '';
        }

        if (isset($request->filter_symbol_no) && !empty($request->filter_symbol_no)) {
            $employee->where('symbol_no', $request->filter_symbol_no);
            $datas['filter_symbol_no'] = $request->filter_symbol_no;
        }else{
            $datas['filter_symbol_no'] = '';
        }

        
      
         $datas['job_id'] = $id;
      $datas['employees'] = $employee->paginate(50);
      $report = \App\JobReport::where('jobs_id', $id)->first();
          if (isset($report->id)) { 
            $datas['thumb'] = \App\JobReport::getThumb($report->id,'group_file');
            $datas['file'] = asset('image/'.$report->group_file);
            $datas['detail'] = $report->group_detail;
          } else {
            $datas['thumb'] = '';
            $datas['file'] = '';
            $datas['detail'] = '';
          }
          $job = Jobs::select('title', 'id', 'branch_id', 'vacancy_code', 'process_status')->where('id',$id)->where('branch_id',auth()->guard('staffs')->user()->branch)->first();
  
         $employer = Branch::gettitle($job->branch_id);
          $datas['job_title'] = $job->title.' ('.$job->vacancy_code.')';
          $datas['jobs_id'] = $job->id;
          $datas['status'] = $job->process_status;
          $report = \App\JobDetail::where('jobs_id', $job->id)->where('detail_type', 3)->first();
          if (isset($report->id)) {
             $datas['report'] = [
                  'id' => $report->id,
                  'detail_type' => $report->detail_type,
                  'detail_date' => $report->detail_date,
                  'detail_time' => $report->detail_time,
                  'detail_venue' => $report->detail_venue,
                  'description' => $report->description,
                  'success_message' => $report->success_message,
                  'error_message' => $report->error_message,
              ];
          } else{
            $datas['report'] = [
                'id' => 0,
                'detail_type' => 3,
                'detail_date' => '',
                'detail_time' => '',
                'detail_venue' => '',
                'description' => '',
                'success_message' => 'Dear %employee-name%,<br>Your application for the job position of '.$job->title.' ('.$job->vacancy_code.') for '.$employer.' was received on %application-date%.<br>The current status of recruitment process is <strong>"%job-process%"</strong>.<br>Your Further Recruitment Process Status :SELECTED<br>You have been selected for further process of "Group Discussion". The details of the process has been sent in your email address.',
                'error_message' => 'Dear %employee-name%,<br>Your application for the job position of '.$job->title.' ('.$job->vacancy_code.') for '.$employer.' was received on %application-date%.<br>The current status of recruitment process is <strong>"%job-process%"</strong>.<br>Your Further Recruitment Process Status : NOT SELECTED <br>We regret to inform you that you have NOT been selected for further recruitment process for the job position of '.$job->title.' ('.$job->vacancy_code.') for '.$employer.'.<br>Best wishes for upcoming successful job search. Thank you, again, for showing your interest in '.$employer.'.',
            ];
          }
          $datas['title'][] = ['value' => 1, 'title' => 'Document Verification'];
          $datas['title'][] = ['value' => 2, 'title' => 'Written Exam'];
          $datas['title'][] = ['value' => 3, 'title' => 'Group Discussion'];
          $datas['title'][] = ['value' => 4, 'title' => 'Final Interview'];
          $datas['title'][] = ['value' => 5, 'title' => 'Result Publish'];
          $datas['process_status'] = \App\RecruitmentProcess::orderBy('id','asc')->get();  
          
          $datas['total_male'] = Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('group_discussion', 1)->where('gender', 'male')->count();
          $datas['total_female'] = Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('group_discussion', 1)->where('gender', 'female')->count();
        
        
          $datas['age'][] = [
            'title' => '18-',
            'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '<', '18')->where('group_discussion', 1)->count(),
            'color' => '#f56954',
            
          ];
          $datas['age'][] = [
            'title' => '18-22',
            'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '>=', '18')->where('age', '<', '22')->where('group_discussion', 1)->count(),
            'color' => '#00a65a',
            
          ];

          $datas['age'][] = [
            'title' => '22-26',
            'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '>=', '22')->where('age', '<', '26')->where('group_discussion', 1)->count(),
            'color' => '#f39c12',
           
          ];
          $datas['age'][] = [
            'title' => '26-30',
            'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '>=', '26')->where('age', '<', '30')->where('group_discussion', 1)->count(),
            'color' => '#00c0ef',
            
          ];
          $datas['age'][] = [
            'title' => '30-40',
            'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '>=', '30')->where('age', '<', '40')->where('group_discussion', 1)->count(),
            'color' => '#3c8dbc',
            
          ];
          $datas['age'][] = [
            'title' => '40-50',
            'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '>=', '40')->where('age', '<=', '50')->where('group_discussion', 1)->count(),
            'color' => '#d2d6de',
            
          ];
        $datas['age'][] = [
            'title' => '50+',
            'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '>', '50')->where('group_discussion', 1)->count(),
            'color' => '#43e96e',
            
        ];
        return view('branchadmin.jobs.group_discussion')->with('datas',$datas);
        
         
}

public function interview($id, Request $request)
{
        $datas = [];
    $datas['meeting'] = EmployeeMeeting::where('job_id', $id)->where('tab_id', '=', 4)->where('start_time', '>=', date('Y-m-d H:i:s'))->get();
        $employee = Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('final_interview', 1);
          if (isset($request->filter_name) && !empty($request->filter_name)) {
              $employee->where(\DB::raw('CONCAT_WS(" ", `firstname`, `middlename`, `lastname`)'), 'like', $request->filter_name . '%');
              $datas['filter_name'] = $request->filter_name;
          }else{
              $datas['filter_name'] = '';
          }

          if (isset($request->filter_id) && !empty($request->filter_id)) {
              $employee->where('id', $request->filter_id);
              $datas['filter_id'] = $request->filter_id;
          }else{
              $datas['filter_id'] = '';
          }

        
          if (isset($request->filter_email) && !empty($request->filter_email)) {
              $employee->where('email', $request->filter_email);
              $datas['filter_email'] = $request->filter_email;
          }else{
              $datas['filter_email'] = '';
          }

          if (isset($request->filter_symbol_no) && !empty($request->filter_symbol_no)) {
              $employee->where('symbol_no', $request->filter_symbol_no);
              $datas['filter_symbol_no'] = $request->filter_symbol_no;
          }else{
              $datas['filter_symbol_no'] = '';
          }

        
        
          $datas['job_id'] = $id;
          $datas['employees'] = $employee->paginate(50);
          $report = \App\JobReport::where('jobs_id', $id)->first();
          if (isset($report->id)) { 
            $datas['thumb'] = \App\JobReport::getThumb($report->id,'interview_file');
            $datas['file'] = asset('image/'.$report->interview_file);
            $datas['detail'] = $report->interview_detail;
          } else {
            $datas['thumb'] = '';
            $datas['file'] = '';
            $datas['detail'] = '';
          }
           $job = Jobs::select('title', 'id', 'branch_id', 'vacancy_code', 'process_status')->where('id',$id)->where('branch_id',auth()->guard('staffs')->user()->branch)->first();
  
          $employer = Branch::gettitle($job->branch_id);
          $datas['job_title'] = $job->title.' ('.$job->vacancy_code.')';
          $datas['jobs_id'] = $job->id;
          $datas['status'] = $job->process_status;
          $report = \App\JobDetail::where('jobs_id', $job->id)->where('detail_type', 4)->first();
          if (isset($report->id)) {
             $datas['report'] = [
                                    'id' => $report->id,
                                    'detail_type' => $report->detail_type,
                                    'detail_date' => $report->detail_date,
                                    'detail_time' => $report->detail_time,
                                    'detail_venue' => $report->detail_venue,
                                    'description' => $report->description,
                                    'success_message' => $report->success_message,
                                    'error_message' => $report->error_message,
                                ];
          } else{
            $datas['report'] = [
                                    'id' => 0,
                                    'detail_type' => 4,
                                    'detail_date' => '',
                                    'detail_time' => '',
                                    'detail_venue' => '',
                                    'description' => '',
                                    'success_message' => 'Dear %employee-name%,<br>Your application for the job position of '.$job->title.' ('.$job->vacancy_code.') for '.$employer.' was received on %application-date%.<br>The current status of recruitment process is <strong>"%job-process%"</strong>.<br>Your Further Recruitment Process Status :SELECTED<br>You have been selected for further process of "Final Interview". The details of the process has been sent in your email address.',
                                    'error_message' => 'Dear %employee-name%,<br>Your application for the job position of '.$job->title.' ('.$job->vacancy_code.') for '.$employer.' was received on %application-date%.<br>The current status of recruitment process is <strong>"%job-process%"</strong>.<br>Your Further Recruitment Process Status : NOT SELECTED <br>We regret to inform you that you have NOT been selected for further recruitment process for the job position of '.$job->title.' ('.$job->vacancy_code.') for '.$employer.'.<br>Best wishes for upcoming successful job search. Thank you, again, for showing your interest in '.$employer.'.',
                                ];
          }
          $datas['title'][] = ['value' => 1, 'title' => 'Document Verification'];
          $datas['title'][] = ['value' => 2, 'title' => 'Written Exam'];
          $datas['title'][] = ['value' => 3, 'title' => 'Group Discussion'];
          $datas['title'][] = ['value' => 4, 'title' => 'Final Interview'];
          $datas['title'][] = ['value' => 5, 'title' => 'Result Publish'];
          $datas['process_status'] = \App\RecruitmentProcess::orderBy('id','asc')->get();
          
          
          $datas['total_male'] = Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('final_interview', 1)->where('gender', 'male')->count();
          $datas['total_female'] = Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('final_interview', 1)->where('gender', 'female')->count();
        
        
          $datas['age'][] = [
            'title' => '18-',
            'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '<', '18')->where('final_interview', 1)->count(),
            'color' => '#f56954',
            
          ];
          $datas['age'][] = [
            'title' => '18-22',
            'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '>=', '18')->where('age', '<', '22')->where('final_interview', 1)->count(),
            'color' => '#00a65a',
            
        ];

        $datas['age'][] = [
            'title' => '22-26',
            'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '>=', '22')->where('age', '<', '26')->where('final_interview', 1)->count(),
            'color' => '#f39c12',
           
        ];
        $datas['age'][] = [
            'title' => '26-30',
            'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '>=', '26')->where('age', '<', '30')->where('final_interview', 1)->count(),
            'color' => '#00c0ef',
            
        ];
        $datas['age'][] = [
            'title' => '30-40',
            'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '>=', '30')->where('age', '<', '40')->where('final_interview', 1)->count(),
            'color' => '#3c8dbc',
            
        ];
        $datas['age'][] = [
            'title' => '40-50',
            'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '>=', '40')->where('age', '<=', '50')->where('final_interview', 1)->count(),
            'color' => '#d2d6de',
            
        ];
        $datas['age'][] = [
            'title' => '50+',
            'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '>', '50')->where('final_interview', 1)->count(),
            'color' => '#43e96e',
            
        ];
                           
        return view('branchadmin.jobs.interview')->with('datas',$datas);
}

public function selected($id, Request $request)
{
    $datas = [];
    $datas['meeting'] = EmployeeMeeting::where('job_id', $id)->where('tab_id', '=', 5)->where('start_time', '>=', date('Y-m-d H:i:s'))->get();
//    $datas['meeting_emp_id']= json_decode($meeting->employee_id)

    $employee = Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('final_selection', 1);
       if (isset($request->filter_name) && !empty($request->filter_name)) {
            $employee->where(\DB::raw('CONCAT_WS(" ", `firstname`, `middlename`, `lastname`)'), 'like', $request->filter_name . '%');
            $datas['filter_name'] = $request->filter_name;
        }else{
            $datas['filter_name'] = '';
        }

        if (isset($request->filter_id) && !empty($request->filter_id)) {
            $employee->where('id', $request->filter_id);
            $datas['filter_id'] = $request->filter_id;
        }else{
            $datas['filter_id'] = '';
        }

        
        if (isset($request->filter_email) && !empty($request->filter_email)) {
            $employee->where('email', $request->filter_email);
            $datas['filter_email'] = $request->filter_email;
        }else{
            $datas['filter_email'] = '';
        }

        if (isset($request->filter_symbol_no) && !empty($request->filter_symbol_no)) {
            $employee->where('symbol_no', $request->filter_symbol_no);
            $datas['filter_symbol_no'] = $request->filter_symbol_no;
        }else{
            $datas['filter_symbol_no'] = '';
        }

        
     
         $datas['job_id'] = $id;
      $datas['employees'] = $employee->paginate(50);
      $report = \App\JobReport::where('jobs_id', $id)->first();
          if (isset($report->id)) { 
            $datas['thumb'] = \App\JobReport::getThumb($report->id,'final_file');
            $datas['file'] = asset('image/'.$report->final_file);
            $datas['detail'] = $report->final_detail;
          } else {
            $datas['thumb'] = '';
            $datas['file'] = '';
            $datas['detail'] = '';
          }
           $job = Jobs::select('title', 'id', 'branch_id', 'vacancy_code', 'process_status')->where('id',$id)->where('branch_id',auth()->guard('staffs')->user()->branch)->first();
  
          $employer = Branch::gettitle($job->branch_id);
          $datas['job_title'] = $job->title.' ('.$job->vacancy_code.')';
          $datas['jobs_id'] = $job->id;
          $datas['status'] = $job->process_status;
          $report = \App\JobDetail::where('jobs_id', $job->id)->where('detail_type', 5)->first();
          if (isset($report->id)) {
              $datas['report'] = [
                  'id' => $report->id,
                  'detail_type' => $report->detail_type,
                  'detail_date' => $report->detail_date,
                  'detail_time' => $report->detail_time,
                  'detail_venue' => $report->detail_venue,
                  'description' => $report->description,
                  'success_message' => $report->success_message,
                  'error_message' => $report->error_message,
              ];
          } else{
            $datas['report'] = [
                'id' => 0,
                'detail_type' => 5,
                'detail_date' => '',
                'detail_time' => '',
                'detail_venue' => '',
                'description' => '',
                'success_message' => 'Dear %employee-name%,<br>Your application for the job position of '.$job->title.' ('.$job->vacancy_code.') for '.$employer.' was received on %application-date%.<br>The current status of recruitment process is <strong>"%job-process%"</strong>.<br>Your Further Recruitment Process Status :SELECTED<br>You have been selected for Job Offer. The details of the process has been sent in your email address.',
                'error_message' => 'Dear %employee-name%,<br>Your application for the job position of '.$job->title.' ('.$job->vacancy_code.') for '.$employer.' was received on %application-date%.<br>The current status of recruitment process is <strong>"%job-process%"</strong>.<br>Your Further Recruitment Process Status : NOT SELECTED <br>We regret to inform you that you have NOT been selected for further recruitment process for the job position of '.$job->title.' ('.$job->vacancy_code.') for '.$employer.'.<br>Best wishes for upcoming successful job search. Thank you, again, for showing your interest in '.$employer.'.',
            ];
          }
          $datas['title'][] = ['value' => 1, 'title' => 'Document Verification'];
          $datas['title'][] = ['value' => 2, 'title' => 'Written Exam'];
          $datas['title'][] = ['value' => 3, 'title' => 'Group Discussion'];
          $datas['title'][] = ['value' => 4, 'title' => 'Final Interview'];
          $datas['title'][] = ['value' => 5, 'title' => 'Result Publish'];
          $datas['process_status'] = \App\RecruitmentProcess::orderBy('id','asc')->get();                
          return view('branchadmin.jobs.selected')->with('datas',$datas);
}

public function autocomplete(Request $request)
{
  if (isset($request->term)) {
    $data = Employers::where('name', 'LIKE', $request->term.'%')->skip(0)->take(10)->get();;
    $result = array();
    foreach ($data as $key => $v) {
      $result[]=['id'=> $v->id, 'value'=> $v->name];
    }
    return response()->json($result);
  }
}

public function changemarks(Request $request)
{
    
  $this->validate($request, [
   'id' =>'required',
   'newmarks' => 'required',
   'old_marks' => 'required'
  ]);

  FormData::where('id', $request->id)->update(['marks'=>$request->newmarks]);
  $form_data = FormData::select('employees_id')->where('id', $request->id)->first();
  $employee = Employee::select('total_marks')->where('id', $form_data->employees_id)->first();
  $new_total = $employee->total_marks - $request->old_marks + $request->newmarks;
  Employee::where('id', $form_data->employees_id)->update(['total_marks'=>$new_total]);
  return('success|'.$new_total);

}

public function autocompleteJobs(Request $request)
{
  if (isset($request->term)) {
      $result = array();
      $data = \App\TemporaryJobForm::where('f_lable', 'LIKE', $request->term.'%')->where('session_id', Session()->get('new_form'))->skip(0)->take(10)->get();

      $result[] = ['id' => '0', 'value' => 'Root'];
      foreach ($data as $key => $v) {
          $result[]=['id'=> $v->id, 'value'=> $v->f_lable];
      }
      return response()->json($result);
  }
}

public function autoJobs(Request $request)
{
    if (isset($request->term)) {
        $result = array();
        $result[] = ['id' => '0', 'value' => 'Root'];
        $fdata = JobForm::where('jobs_id', $request->jobs_id)->where('f_lable', 'LIKE', '%'.$request->term.'%')->skip(0)->take(10)->get();
        foreach ($fdata as $keys => $vf) {
          $result[]=['id'=> $vf->id, 'value'=> $vf->f_lable];
        } 
        return response()->json($result);
    }
}

public function addJobForm(Request $request)
{

  $data = [
    'parent_id' => $request->pid,
    'session_id' => Session()->get('new_form'),
    'f_lable' => $request->label,
    'f_type' => $request->types,
    'list_menu' => $request->options,
    'requ' => $request->require,
    'marks' => $request->marks,
    'extra' => $request->extra,
  ];

  $jform = \App\TemporaryJobForm::create($data);
  $parent = \App\TemporaryJobForm::getTitle($jform->parent_id);
  if($jform->requ == 1){
    $req = 'Required';
  }
  else{
    $req = 'Not Required';
  }
  return '<tr id="job_form_row_'.$request->row.'"><td>'.$parent.'</td><td>'.$jform->f_lable.'</td><td>'.$jform->f_type.'</td><td>'.$jform->list_menu.'</td><td>'.$req.'</td><td>'.$jform->marks.'</td><td>'.$jform->extra.'</td><td><button type="button" onclick="removeForm(\''.$request->row.'\',\''.$jform->id.'\');" data-toggle="tooltip" title="remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td></tr>';
}

public function deleteTempJobForm(Request $request)
{
  if(isset($request->id)){
    $temp = \App\TemporaryJobForm::where('id', $request->id)->first();

    if(isset($temp->id)){
      \App\TemporaryJobForm::where('id', $request->id)->delete();
      return 'success|Data deleted successfully.|'.$request->row_id;
    }
    else{
      return 'Error|Data not found';
    }
  }
  else{
    return 'error|Id not found';
  }
}

public function deleteJobForm(Request $request)
{
    if(isset($request->id)){
      $temp = \App\JobForm::where('id', $request->id)->first();

      if(isset($temp->id)){
        \App\JobForm::where('id', $request->id)->delete();
        return 'success|Data deleted successfully.|'.$request->row_id;
      }
      else{
        return 'Error|Data not found';
      }
    }
    else{
      return 'error|Id not found';
    }
}

public function addJobFormData(Request $request)
{

    $data = [
      'parent_id' => $request->pid,
      'jobs_id' => $request->job_id,
      'f_lable' => $request->label,
      'f_type' => $request->types,
      'list_menu' => $request->options,
      'requ' => $request->require,
      'marks' => $request->marks,
      'extra' => $request->extra,
    ];

    $jform = JobForm::create($data);
    $parent = JobForm::getTitle($jform->parent_id);
    if($jform->requ == 1){
      $req = 'Required';
    }
    else{
      $req = 'Not Required';
    }
    return '<tr id="job_form_row_'.$request->row.'"><td>'.$parent.'</td><td>'.$jform->f_lable.'</td><td>'.$jform->f_type.'</td><td>'.$jform->list_menu.'</td><td>'.$req.'</td><td>'.$jform->marks.'</td><td>'.$jform->extra.'</td><td><button type="button" onclick="editFormData(\''.$request->row.'\',\''.$jform->id.'\');" data-toggle="tooltip" title="Edit" class="btn btn-warning"><i class="fa fa-edit"></i></button><button type="button" onclick="removeFormData(\''.$request->row.'\',\''.$jform->id.'\');" data-toggle="tooltip" title="remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td></tr>';
}

public function updateJobForm(Request $request)
{

    $data = [
      'parent_id' => $request->pid,
      'jobs_id' => $request->job_id,
      'f_lable' => $request->label,
      'f_type' => $request->types,
      'list_menu' => $request->options,
      'requ' => $request->require,
      'marks' => $request->marks,
      'extra' => $request->extra,
    ];

    $jform = JobForm::where('id', $request->fid)->update($data);
    $parent = JobForm::getTitle($request->pid);
    if($request->require == 1){
      $req = 'Required';
    }
    else{
      $req = 'Not Required';
    }
    return '<td>'.$parent.'</td><td>'.$request->label.'</td><td>'.$request->types.'</td><td>'.$request->options.'</td><td>'.$req.'</td><td>'.$request->marks.'</td><td>'.$request->extra.'</td><td><button type="button" onclick="editFormData(\''.$request->row.'\',\''.$request->fid.'\');" data-toggle="tooltip" title="Edit" class="btn btn-warning"><i class="fa fa-edit"></i></button><button type="button" onclick="removeFormData(\''.$request->row.'\',\''.$request->fid.'\');" data-toggle="tooltip" title="remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
}


public function editJobForm(Request $request)
{
    if(isset($request->id)){
      $temp = \App\JobForm::where('id', $request->id)->first();

      if(isset($temp->id)){
           $parent = JobForm::getTitle($temp->parent_id);
    
    
    $formtype[] = ['value' => 'text', 'title' => 'Text'];
    $formtype[] = ['value' => 'textarea', 'title' => 'Textarea'];
    $formtype[] = ['value' => 'email', 'title' => 'Email'];
    $formtype[] = ['value' => 'url', 'title' => 'Url'];
    $formtype[] = ['value' => 'select', 'title' => 'Select'];
    $formtype[] = ['value' => 'redio', 'title' => 'Redio Button'];
    $formtype[] = ['value' => 'checkbox', 'title' => 'Check Box'];
    $formtype[] = ['value' => 'file', 'title' => 'File Upload'];
  
  
       $html = '<td><input id="parent_id_'.$request->row_id.'" class="form-control" value="'.$temp->parent_id.'" type="hidden"><input class="parent form-control" value="'.$parent.'" autocomplete="off" type="text"></td>';
       $html .= '<td><input id="label_'.$request->row_id.'" class="form-control" value="'.$temp->f_lable.'" type="text"></td>';
       $html .= '<td><select class="form-control" id="types_'.$request->row_id.'">';
       foreach($formtype as $ft)
        if($ft['value'] == $temp->f_type){
          $html .= '<option selected="selected" value="'.$ft["value"].'">'.$ft["title"].'</option>';
        } else{
          $html .= '<option value="'.$ft["value"].'">'.$ft["title"].'</option>';
        }
       
        $html .= '</select></td>';

        $html .= '<td><input id="options_'.$request->row_id.'" placeholder="option1,option2" class="form-control" value="'.$temp->list_menu.'" type="text"></td>';
        $html .= '<td><select class="form-control" id="require_'.$request->row_id.'">';
        if($temp->requ == 1){
          $html .= '<option selected="selected" value="1">Required</option><option value="2">Non Required</option>';
        }
        else{
          $html .= '<option value="1">Required</option><option selected="selected" value="2">Non Required</option>';
        }
        
        $html .= '</select></td>';

        $html .= '<td><input class="form-control" id="marks_'.$request->row_id.'" placeholder="5,2" value="'.$temp->marks.'" type="text"></td>';
        $html .= '<td><input class="form-control" id="extra_'.$request->row_id.'" placeholder="" value="'.$temp->extra.'"  type="text"></td>';
        $html .= '<td><button type="button" onclick="updateForms(\''.$request->row_id.'\',\''.$request->id.'\');" data-toggle="tooltip" title="" class="btn btn-warning" data-original-title="Update Form"><i class="fa fa-plus-circle"></i></button></td>';
        return 'success|'.$html.'|'.$request->row_id;
      }
      else{
        return 'Error|Data not found';
      }
    }
    else{
      return 'error|Id not found';
    }
}
  
public function sourceView($id, Request $request)
{
  $datas = [];
  $datas['source'] = [];
  $datas['job'] = Jobs::where('id', $id)->first();
  $datas['filter_date'] = '';
  $source = FormData::where('jobs_id',$id)->where('f_title', 'Source of Vacancy Information');
  if (isset($request->filter_date)) {
    $source->where('created_at', 'LIKE', $request->filter_date.'%');
    $datas['filter_date'] = $request->filter_date;
  }
  $sources = $source->groupBy('f_description')->get();
      
      if (count($sources) > 0) {
          foreach ($sources as $source) {
              $ss = FormData::where('jobs_id',$id)->where('f_description', $source->f_description);
              if (isset($request->filter_date)) {
                  $ss->where('created_at', 'LIKE', $request->filter_date.'%');
                  
                }
              $total = $ss->count();
              $sdatas = $ss->get();
              
              $ttip = [];
              foreach ($sdatas as $sdata) {
                $emp = Employee::select('id','firstname','middlename','lastname')->where('id',$sdata->employees_id)->first();
                if (isset($emp->id)) {
                  $ttip[] = ['url' => url('/branchadmin/jobs/application/view/'.$emp->id), 'name' => $emp->firstname.' '.$emp->middlename.' '.$emp->lastname ];
                }
              }

              $datas['source'][] = [
                  'title' => $source->f_description,
                  'total' => $total,
                  'employe' => $ttip
              ];
          }
      }
    return view('branchadmin.jobs.source')->with('datas', $datas);
}
  
public function ResetToken(Request $request)
{
  $v= Validator::make($request->all(),
  [
    'job_id'=>'required|integer',
  ]);
  if($v->fails())
  {
    \Session::flash('alert-danger','Sorry we did not found the job.');
    return redirect()->back();
  }
  if (count($request->employee_id) > 0) {
    foreach ($request->employee_id as $value) {
      if($value != ''){
          $v_token = str_random(16);
          Employee::where('id', $value)->update(['validation_token' => $v_token]);
      }
    }
    \Session::flash('alert-success','You Successfully reset token.');
    return redirect()->back();
  } else{
    \Session::flash('alert-danger','Sorry you did not select any application.');
    return redirect()->back();
  }
}

public function downloadCV($id)
{
  $job = Jobs::select('vacancy_code')->where('id', $id)->first();
  if (isset($job->vacancy_code)) {
    $the_folder = DIR_IMAGE.'catalog/employees/'.$job->vacancy_code.'/resume';
    if(is_dir($the_folder)){
      $zip_file_name = DIR_IMAGE.'archive.zip';
      $za = new FlxZipArchive;
      $res = $za->open($zip_file_name, ZipArchive::CREATE);
      if($res === TRUE) 
      {
          $za->addDir($the_folder, basename($the_folder));
          $za->close();
            header("Content-type: application/zip"); 
            header("Content-Disposition: attachment; filename=$zip_file_name");
            header("Content-Length: " . filesize($zip_file_name)); 
            header("Pragma: no-cache"); 
            header("Expires: 0"); 
            readfile($zip_file_name);
            @unlink($zip_file_name);
            \Session::flash('alert-success','You Successfully download all cvs.');
          return redirect()->back();
      }
      else{
        \Session::flash('alert-danger','Sorry could not create zip file.');
        return redirect()->back();
      }
    } else{
      \Session::flash('alert-danger','Sorry we could not find directory.');
      return redirect()->back();
    }
    
  } else{
    \Session::flash('alert-danger','Sorry we could not find any datas.');
    return redirect()->back();
  }
}

public function downloadCoverletter($id)
{
  $job = Jobs::select('vacancy_code')->where('id', $id)->first();
  if (isset($job->vacancy_code)) {

    $the_folder = DIR_IMAGE.'catalog/employees/'.$job->vacancy_code.'/coverletter';
      $zip_file_name = DIR_IMAGE.'archive.zip';
      $za = new FlxZipArchive;
      $res = $za->open($zip_file_name, ZipArchive::CREATE);
      if($res === TRUE) 
      {
          $za->addDir($the_folder, basename($the_folder));
          $za->close();
           header("Content-type: application/zip"); 
            header("Content-Disposition: attachment; filename=$zip_file_name");
            header("Content-Length: " . filesize($zip_file_name)); 
            header("Pragma: no-cache"); 
            header("Expires: 0"); 
            readfile($zip_file_name);
           @unlink($zip_file_name);
            \Session::flash('alert-success','You Successfully download all Coverletters.');
  return redirect()->back();
      }
      else{
      \Session::flash('alert-danger','Sorry could not create zip file.');
  return redirect()->back();
      }
  } else{
    \Session::flash('alert-danger','Sorry we could not find any datas.');
  return redirect()->back();
  }
}

public function Report($id)
{
  $job = Jobs::select('title', 'vacancy_code', 'id')->where('id',$id)->first();
  
  if (isset($job->id)) {
  
    $report = \App\JobReport::where('jobs_id', $id)->first();
    if (isset($report->id)) {
      $datas['job_title'] = $job->title.' ('.$job->vacancy_code.')';
      $datas['id'] = $report->id;
      $datas['jobs_id'] = $id;
      $datas['athumb'] = \App\JobReport::getThumb($report->id,'application_file');
      $datas['wthumb'] = \App\JobReport::getThumb($report->id,'written_file');
      $datas['gthumb'] = \App\JobReport::getThumb($report->id,'group_file');
      $datas['ithumb'] = \App\JobReport::getThumb($report->id,'interview_file');
      $datas['fthumb'] = \App\JobReport::getThumb($report->id,'final_file');
      $datas['application_detail'] = $report->application_detail;
      $datas['application_file'] = $report->application_file;
      $datas['written_detail'] = $report->written_detail;
      $datas['written_file'] = $report->written_file;
      $datas['group_detail'] = $report->group_detail;
      $datas['group_file'] = $report->group_file;
      $datas['interview_detail'] = $report->interview_detail;
      $datas['final_detail'] = $report->final_detail;
      $datas['final_file'] = $report->final_file;
      $datas['afile_name'] = $report->afile_name;
      $datas['wfile_name'] = $report->wfile_name;
      $datas['gfile_name'] = $report->gfile_name;
      $datas['ifile_name'] = $report->ifile_name;
      $datas['ffile_name'] = $report->ffile_name;
    } else{
      $datas['athumb'] = '';
      $datas['wthumb'] = '';
      $datas['gthumb'] = '';
      $datas['ithumb'] = '';
      $datas['fthumb'] = '';
      $datas['job_title'] = $job->title.' ('.$job->vacancy_code.')';
      $datas['id'] = '';
      $datas['jobs_id'] = $id;
      $datas['application_detail'] = '';
      $datas['application_file'] = '';
      $datas['written_detail'] = '';
      $datas['written_file'] = '';
      $datas['group_detail'] = '';
      $datas['group_file'] = '';
      $datas['interview_detail'] = '';
      $datas['final_detail'] = '';
      $datas['final_file'] = '';
      $datas['afile_name'] = '';
      $datas['wfile_name'] = '';
      $datas['gfile_name'] = '';
      $datas['ifile_name'] = '';
      $datas['ffile_name'] = '';
    }
    return view('branchadmin.jobs.report')->with('datas', $datas);
  } else{
    \Session::flash('alert-danger','Sorry You have Choose Wrong Data');
    return redirect()->back();
  }

}

public function updateReport(Request $request)
{
  $this->validate($request, [
    'jobs_id' => 'required|integer',
    'application_file' => 'mimes:pdf,doc,docx,xls,xlsx,csv|max:10000',
    'written_file' => 'mimes:pdf,doc,docx,xls,xlsx,csv|max:10000',
    'group_file' => 'mimes:pdf,doc,docx,xls,xlsx,csv|max:10000',
    'interview_file' => 'mimes:pdf,doc,docx,xls,csv,xlsx|max:10000',
    'final_file' => 'mimes:pdf,doc,docx,xls,xlsx,csv|max:10000',
  ]);
  $report = \App\JobReport::where('jobs_id', $request->jobs_id)->first();
  if (isset($report->application_file)) {
    $application_file = $report->application_file;
  }else{
    $application_file = '';
  }

  if (isset($report->written_file)) {
    $written_file = $report->written_file;
  }else{
    $written_file = '';
  }

  if (isset($report->group_file)) {
    $group_file = $report->group_file;
  }else{
    $group_file = '';
  }

  if (isset($report->interview_file)) {
    $interview_file = $report->interview_file;
  }else{
    $interview_file = '';
  }
  if (isset($report->final_file)) {
    $final_file = $report->final_file;
  }else{
    $final_file = '';
  }
  
  
  $job = Jobs::select('title', 'vacancy_code', 'id')->where('id',$request->jobs_id)->first();
  if($request->hasFile('application_file')){
    $directory = DIR_IMAGE . 'file/'.$job->vacancy_code;

        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
   
        $file = $request->File('application_file');
         $ext = $file->getClientOriginalExtension();
         $afile = 'application'.rand().'.'.$ext;
         $application_file = 'file/'.$job->vacancy_code.'/'.$afile;
         
         $path = $directory.'/';
         $file->move($path, $afile);       

   }

   if($request->hasFile('written_file')){
    $directory = DIR_IMAGE . 'file/'.$job->vacancy_code;

        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
   
        $file = $request->File('written_file');
         $ext = $file->getClientOriginalExtension();
          $rfile = 'written_file'.rand().'.'.$ext;
         $written_file = 'file/'.$job->vacancy_code.'/'.$rfile;
        
         $path = $directory.'/';
         $file->move($path, $rfile);       

   }

   if($request->hasFile('group_file')){
    $directory = DIR_IMAGE . 'file/'.$job->vacancy_code;

        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
   
        $file = $request->File('group_file');
         $ext = $file->getClientOriginalExtension();
          $gfile = 'group_file'.rand().'.'.$ext;
         $group_file = 'file/'.$job->vacancy_code.'/'.$gfile;
        
         $path = $directory.'/';
         $file->move($path, $gfile);       

   }

   if($request->hasFile('interview_file')){
    $directory = DIR_IMAGE . 'file/'.$job->vacancy_code;

        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
   
        $file = $request->File('interview_file');
         $ext = $file->getClientOriginalExtension();
         $ifile = 'interview_file'.rand().'.'.$ext;
         $interview_file = 'file/'.$job->vacancy_code.'/'.$ifile;
         
         $path = $directory.'/';
         $file->move($path, $ifile);       

   }

   if($request->hasFile('final_file')){
    $directory = DIR_IMAGE . 'file/'.$job->vacancy_code;

        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
   
        $file = $request->File('final_file');
         $ext = $file->getClientOriginalExtension();
         $ffile = 'final_file'.rand().'.'.$ext;
         $final_file = 'file/'.$job->vacancy_code.'/'.$ffile;
         
         $path = $directory.'/';
         $file->move($path, $ffile);       

   }




  
  $datas = [
    'jobs_id' => $request->jobs_id, 
    'application_detail' => $request->application_detail,
    'application_file' => $application_file,
    'written_detail' => $request->written_detail,
    'written_file' => $written_file,
    'group_detail' => $request->group_detail,
    'group_file' => $group_file,
    'interview_detail' => $request->interview_detail,
    'interview_file' => $interview_file,
    'final_detail' => $request->final_detail,
    'final_file' => $final_file,
    'afile_name' => $request->afile_name,
    'wfile_name' => $request->wfile_name,
    'gfile_name' => $request->gfile_name,
    'ifile_name' => $request->ifile_name,
    'ffile_name' => $request->ffile_name,
  ];
  if (isset($report->id)) {
    \App\JobReport::where('id', $request->id)->update($datas);
  } else{
   \App\JobReport::create($datas);
  }
  \Session::flash('alert-success','You Successfully edited Data.');
  return redirect('branchadmin/jobs'); 
}

public function deleteFile(Request $request)
{
  $v= Validator::make($request->all(),
    [
      'id'=>'required|integer',
      'field' => 'required',
      
      
    ]);
  if($v->fails())
  {
    return 'Error|We could not get required data';
  }
  $field = $request->field;
  $report = \App\JobReport::select($field)->where('id', $request->id)->first();
  $file = DIR_IMAGE.$report->$field;
  
  if (is_file($file)) {
    File::delete($file);
    \App\JobReport::where('id', $request->id)->update([$field => '']);
    return 'success|Thank You';
  } else{
    return 'Error|Sorry We could not get the file '.$file;
  }
}

public function detail($id)
{
  $job = Jobs::select('title', 'id', 'vacancy_code')->where('id',$id)->first();
  if (isset($job->id)) {
    $datas['job_title'] = $job->title.' ('.$job->vacancy_code.')';
    $datas['jobs_id'] = $job->id;
    $datas['report'] = \App\JobDetail::where('jobs_id', $id)->get();
    $datas['title'][] = ['value' => 1, 'title' => 'Written Exam'];
    $datas['title'][] = ['value' => 2, 'title' => 'Group Discussion'];
    $datas['title'][] = ['value' => 3, 'title' => 'Final Interview'];
    $datas['title'][] = ['value' => 4, 'title' => 'Result Publish'];
    //dd($datas);
    return view('branchadmin.jobs.detail')->with('datas', $datas);
  } else{
    \Session::flash('alert-danger','Sorry You have Choose Wrong Data');
    return redirect()->back();
  }

}

public function updateDetail(Request $request)
{
  $this->validate($request, [
    'jobs_id' => 'required|integer',
    'details.*.title' => 'required|integer',
    'details.*.detail_date' => 'required|date',
    'details.*.description' => 'required|min:5',
  ]);
  \App\JobDetail::where('jobs_id', $request->jobs_id)->delete();
  foreach ($request->details as $key => $value) {
    $datas = [
      'jobs_id' => $request->jobs_id, 
      'detail_type' => $value['title'],
      'detail_date' => $value['detail_date'],
      'description' => $value['description'],
    ];
    \App\JobDetail::create($datas);
  }
  \Session::flash('alert-success','You Successfully edited Data.');
  return redirect('branchadmin/jobs'); 
}

public function DocumentVerification($id, Request $request)
{
  $datas = [];
    $datas['meeting'] = EmployeeMeeting::where('job_id', $id)->where('tab_id', '=', 1)->where('start_time', '>=', date('Y-m-d H:i:s'))->get();
    $employee = Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('document_verification', 1);
        if (isset($request->filter_name) && !empty($request->filter_name)) {
            $employee->where(\DB::raw('CONCAT_WS(" ", `firstname`, `middlename`, `lastname`)'), 'like', $request->filter_name . '%');
            $datas['filter_name'] = $request->filter_name;
        }else{
            $datas['filter_name'] = '';
        }

        if (isset($request->filter_id) && !empty($request->filter_id)) {
            $employee->where('id', $request->filter_id);
            $datas['filter_id'] = $request->filter_id;
        }else{
            $datas['filter_id'] = '';
        }

        
        if (isset($request->filter_email) && !empty($request->filter_email)) {
            $employee->where('email', $request->filter_email);
            $datas['filter_email'] = $request->filter_email;
        }else{
            $datas['filter_email'] = '';
        }

        if (isset($request->filter_symbol_no) && !empty($request->filter_symbol_no)) {
          $employee->where('symbol_no', $request->filter_symbol_no);
          $datas['filter_symbol_no'] = $request->filter_symbol_no;
        }else{
          $datas['filter_symbol_no'] = '';
        }



        $datas['job_id'] = $id;
        $datas['employees'] = $employee->paginate(50);
        $job = Jobs::select('title', 'id', 'branch_id', 'vacancy_code', 'process_status')->where('id',$id)->where('branch_id',auth()->guard('staffs')->user()->branch)->first();
  
         $employer = Branch::gettitle($job->branch_id);
  
         
          $datas['job_title'] = $job->title.' ('.$job->vacancy_code.')';
          $datas['jobs_id'] = $job->id;
          $datas['status'] = $job->process_status;
          $report = \App\JobDetail::where('jobs_id', $job->id)->where('detail_type', 1)->first();
          if (isset($report->id)) {
             $datas['report'] = [
                                    'id' => $report->id,
                                    'detail_type' => $report->detail_type,
                                    'detail_date' => $report->detail_date,
                                    'detail_time' => $report->detail_time,
                                    'detail_venue' => $report->detail_venue,
                                    'description' => $report->description,
                                    'success_message' => $report->success_message,
                                    'error_message' => $report->error_message,
                                ];
          } else{
            $datas['report'] = [
                                    'id' => 0,
                                    'detail_type' => 1,
                                    'detail_date' => '',
                                    'detail_time' => '',
                                    'detail_venue' => '',
                                    'description' => '',
                                    'success_message' => 'Dear %employee-name%,<br>Your application for the job position of '.$job->title.' ('.$job->vacancy_code.') for '.$employer.' was received on %application-date%.<br>The current status of recruitment process is <strong>"%job-process%"</strong>.<br>Your Further Recruitment Process Status :SELECTED<br>You have been selected for "Document Verification". The details of the process has been sent in your email address.',
                                    'error_message' => 'Dear %employee-name%,<br>Your application for the job position of '.$job->title.' ('.$job->vacancy_code.') for '.$employer.' was received on %application-date%.<br>The current status of recruitment process is <strong>"%job-process%"</strong>.<br>Your Further Recruitment Process Status : NOT SELECTED <br>We regret to inform you that you have NOT been selected for further recruitment process for the job position of '.$job->title.' ('.$job->vacancy_code.') for '.$employer.'.<br>Best wishes for upcoming successful job search. Thank you, again, for showing your interest in '.$employer.'.',
                                ];
          }
          $datas['title'][] = ['value' => 1, 'title' => 'Document Verification'];
          $datas['title'][] = ['value' => 2, 'title' => 'Written Exam'];
          $datas['title'][] = ['value' => 3, 'title' => 'Group Discussion'];
          $datas['title'][] = ['value' => 4, 'title' => 'Final Interview'];
          $datas['title'][] = ['value' => 5, 'title' => 'Result Publish'];
          $datas['process_status'] = \App\RecruitmentProcess::orderBy('id','asc')->get();
 
          $datas['total_male'] = Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('document_verification', 1)->where('gender', 'male')->count();
          $datas['total_female'] = Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('document_verification', 1)->where('gender', 'female')->count();
        
        
          $datas['age'][] = [
            'title' => '18-',
            'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '<', '18')->where('document_verification', 1)->count(),
            'color' => '#f56954',
            
          ];
          $datas['age'][] = [
            'title' => '18-22',
            'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '>=', '18')->where('age', '<', '22')->where('document_verification', 1)->count(),
            'color' => '#00a65a',
            
          ];

          $datas['age'][] = [
            'title' => '22-26',
            'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '>=', '22')->where('age', '<', '26')->where('document_verification', 1)->count(),
            'color' => '#f39c12',
           
          ];
        $datas['age'][] = [
            'title' => '26-30',
            'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '>=', '26')->where('age', '<', '30')->where('document_verification', 1)->count(),
            'color' => '#00c0ef',
            
        ];
        $datas['age'][] = [
            'title' => '30-40',
            'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '>=', '30')->where('age', '<', '40')->where('document_verification', 1)->count(),
            'color' => '#3c8dbc',
            
        ];
        $datas['age'][] = [
            'title' => '40-50',
            'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '>=', '40')->where('age', '<=', '50')->where('document_verification', 1)->count(),
            'color' => '#d2d6de',
            
        ];
        $datas['age'][] = [
            'title' => '50+',
            'total' => Employee::where('jobs_id', $id)->where('status', '!=', 0)->where('trash', 0)->where('age', '>', '50')->where('document_verification', 1)->count(),
            'color' => '#43e96e',
            
        ];
  return view('branchadmin.jobs.document_verification')->with('datas',$datas);
}

public function updateVerification(Request $request)
{
    dd($request);
  $v= Validator::make($request->all(),
  [
    'job_id'=>'required|integer',
  ]);
  if($v->fails())
  {
    \Session::flash('alert-danger','Sorry we did not found the job.');
    return redirect()->back();
  }
  if (count($request->employee_id) > 0) {
  foreach ($request->employee_id as $value) {
    Employee::where('id', $value)->update(['written_exam' => 1]);
  }
  \Session::flash('alert-success','You Successfully update application for written exam.');
  return redirect('branchadmin/jobs/verification/'.$request->job_id);
  } else{
  \Session::flash('alert-danger','Sorry you did not select any application.');
  return redirect()->back();
  }
}

public function verificationView($id)
{
 
  $employee= Employee::where('id',$id)->first();
  if($employee) {
    if (isset($employee->image) && !empty($employee->image)) {
    $datas['image'] = asset('image/'.$employee->image);
  } else {
    $datas['image'] ='';
  }


  $datas['employee'] = $employee;


  $datas['education'] = $employee->EmployeeEducation;
  $datas['experience'] = $employee->EmployeeExperience;
  $datas['language'] = $employee->EmployeeLanguage;

  $datas['reference'] = $employee->EmployeeReference;
  $datas['form_data'] = FormData::where('employees_id', $employee->id)->get();
  $datas['training'] = $employee->EmployeeTraining;

  return view('branchadmin.jobs.verification_view')->with('datas', $datas);
  } else {

  \Session::flash('alert-danger','You choosed wrong Data');
  return redirect()->back(); 
  }

}

public function verificationDelete($id)
{
  Employee::where('id', $id)->update(['document_verification' => 0]);
  \Session::flash('alert-success','You Successfully update Applicant');
  return redirect()->back();
}

public function uploadXlverification(Request $request)
{
  $v= Validator::make($request->all(),
  [
    'jobs_id' => 'required|integer',
    'upload_file' => 'mimes:csv,txt',
  ]);
  if($v->fails())
  {
    \Session::flash('alert-danger','Data Validation Fail.');
    return redirect()->back()->withErrors($v)
    ->withInput();     
  } 
      //get file
  $upload = $request->file('upload_file');
  $filePath = $upload->getRealPath();
      //open and read

  $file = fopen($filePath, 'r');

  $header = fgetcsv($file);

  $lheader = [];
  foreach ($header as $key => $value) {
    $lh = strtolower($value);
    array_push($lheader, $lh);
  }

  while ($columns = fgetcsv($file) ) {
    if($columns[0] == "")
    {
      continue;
    }
    foreach ($columns as $key => &$value) {
      $vlaue = trim($value);
    }
    $data = array_combine($lheader, $columns);
    $applicant_id = $data['applicant'];
    Employee::where('jobs_id', $request->jobs_id)->where('id', $applicant_id)->update(['document_verification' => 1]);
  }
  \Session::flash('alert-success','Record have been updated Successfully');
  return redirect()->back();

}

public function deleteSelected(Request $request)
{
  if (!isset($request->employee_id)) {
    \Session::flash('alert-danger', 'No any Applicant selected');
    return redirect()->back();
  }

  foreach ($request->employee_id as $key => $value) {
    $employe = Employee::where('id', $value)->first();
    if ($employe->resume != '') {
        $path = DIR_IMAGE .$employe->resume;
        if (is_file($path)) {
            File::delete($path);
        }
    }
    if ($employe->image != '') {
        $path = DIR_IMAGE .$employe->image;
        if (is_file($path)) {
            File::delete($path);
        }
    }
    if ($employe->coverletter != '') {
        $path = DIR_IMAGE .$employe->coverletter;
        if (is_file($path)) {
            File::delete($path);
        }
    }
    $files = \App\FormData::where('employees_id',$employe->id)->where('type', 1)->get();
    if (count($files) > 0) {
        foreach ($files as $extra_file) {
            $path = DIR_IMAGE.$extra_file->f_description;
            if (is_file($path)) {
                File::delete($path);
            }
        }
    }
    $ext_datas = \App\EmployeeExtraData::where('employees_id', $employe->id)->get();
    if (count($ext_datas) > 0) {
        foreach ($ext_datas as $exdata) {
            if ($exdata->strategic_paper != '') {
                $ppath = DIR_IMAGE.$exdata->strategic_paper;
                if (is_file($ppath)) {
                    File::delete($ppath);
                }
            }
            if ($exdata->presentation_paper != '') {
                $pppath = DIR_IMAGE.$exdata->presentation_paper;
                if (is_file($pppath)) {
                    File::delete($pppath);
                }
            }
        }
    }
    \App\EmployeeExtraData::where('employees_id', $employe->id)->delete();
    $employe->delete();
  }
  
  \Session::flash('alert-success', 'Data Deleted Successfully');
  return redirect()->back();
}

public function updateStatus(Request $request)
{
    $this->validate($request, [
        'status' => 'required|integer',
        'jobs_id' => 'required|integer',
      ]);
      Jobs::where('id', $request->jobs_id)->update(['process_status' => $request->status]);
      \Session::flash('alert-success','You Successfully Update Event.');
      return redirect()->back();
}

public function eventUpdate(Request $request)
{
  $this->validate($request, [
    'jobs_id' => 'required|integer',
    'detail_type' => 'required|integer',
    'detail_date' => 'required',
    'description' => 'required|min:5',
  ]);

  if($request->detail_id == 0){
    $datas = [
      'jobs_id' => $request->jobs_id, 
      'detail_type' => $request->detail_type,
      'detail_date' => $request->detail_date,
      'detail_time' => $request->detail_time,
      'detail_venue' => $request->detail_venue,
      'description' => $request->description,
    ];
  \App\JobDetail::create($datas);
  } else{
    $datas = [
    'jobs_id' => $request->jobs_id, 
    'detail_type' => $request->detail_type,
    'detail_date' => $request->detail_date,
    'detail_time' => $request->detail_time,
    'detail_venue' => $request->detail_venue,
    'description' => $request->description,
  ];
  \App\JobDetail::where('id', $request->detail_id)->update($datas);
  }
  \Session::flash('alert-success','You Successfully Update Event.');
  return redirect()->back(); 
}

public function uploadXlwritten(Request $request)
{
    $v= Validator::make($request->all(),
    [
    'jobs_id' => 'required|integer',
    'upload_file' => 'mimes:csv,txt',

    ]);
    if($v->fails())
    {
      \Session::flash('alert-danger','Data Validation Fail.');
      return redirect()->back()->withErrors($v)
      ->withInput();     
    } 
    //get file
    $upload = $request->file('upload_file');
    $filePath = $upload->getRealPath();
    //open and read
    $file = fopen($filePath, 'r');
    $header = fgetcsv($file);
    $lheader = [];
    foreach ($header as $key => $value) {
      $lh = strtolower($value);
      array_push($lheader, $lh);
    }
    while ($columns = fgetcsv($file) ) {
      if($columns[0] == "")
      {
        continue;
      }
      foreach ($columns as $key => &$value) {
        $vlaue = trim($value);
      }
      $data = array_combine($lheader, $columns);

      
      $applicant_id = $data['applicant'];
      Employee::where('jobs_id', $request->jobs_id)->where('id', $applicant_id)->update(['written_exam' => 1]);
    }
    \Session::flash('alert-success','Record have been updated Successfully');
    return redirect()->back();
}

public function uploadFile($id='', $job_id = '')
{
    if ($id == '' && $job_id == '') {
      \Session::flash('alert-danger','Sorry you have choose wrong data.');
      return redirect()->back();
    }
    $documents = \App\EmployeeFiles::where('employees_id',$id)->get();
    $emp = Employee::select('firstname','middlename','lastname')->where('id',$id)->first();
    
    return view('branchadmin.jobs.upload_file')->with('id', $id)->with('job_id',$job_id)->with('documents',$documents)->with('emp',$emp);
}

public function saveFile(Request $request)
{
    $this->validate($request, [
        'applicant_id' => 'required',
        'job_id' => 'required',
        'emp_file.*.title' => 'required',
        'emp_file.*.file' => 'required|mimes:jpg,jpeg,png,doc,docx,pdf',
    ]);
    foreach ($request->emp_file as $emp_file) {
        $directory = DIR_IMAGE . 'file/employee';
        if(!is_dir($directory)){
                mkdir($directory); 
              }
            $file = $emp_file['file'];
              $ext = $file->getClientOriginalExtension();
              $fname = 'file/employee/'.rand().'.'.$ext;
            $path = $directory.'/';
              $file->move($path, $fname);  
              $datas = [
                'employees_id' => $request->applicant_id,
                'title' => $emp_file['title'],
                'file_location' => $fname,
              ];
              \App\EmployeeFiles::create($datas);
    }
    \Session::flash('alert-success','You have Successfully uploaded the data.');
    return redirect('branchadmin/jobs/interview/'.$request->job_id);
}

public function deleteEmployerFile(Request $request)
{
  if ($request->id != '') {
      $file = \App\EmployeeFiles::where('id',$request->id)->first();
      if (isset($file->file_location)) {
          if (is_file(DIR_IMAGE.$file->file_location)) {
              File::delete(DIR_IMAGE.$file->file_location);
          }
          \App\EmployeeFiles::where('id',$request->id)->delete();
      }
      return 'Success';
  } else{
      return 'Error|Sorry we could not find data';
  }
}

public function applicationDelete($id)
{
  Employee::where('id', $id)->update(['trash' => 1]);
  \Session::flash('alert-success','You Successfully update Applicant');
  return redirect()->back();
}

public function exportCsv($id, Request $request)
            {
             
              if($id == ''){
                return redirect()->back();
              }
        
              $job = Jobs::where('id', $id)->first();
              if (isset($job->id)) {
                 $total_marks = 0;
                if($job->edu_marks != ''){
                  $edu_marks = $job->edu_marks;
                }
                else{
                  $edu_marks = 0;
                }
                if($job->exp_marks != ''){
                  $exp_marks = $job->exp_marks;
                }
                else{
                  $exp_marks = 0;
                }
                $total_marks += $edu_marks + $exp_marks;
                $employees = Employee::where('jobs_id', $job->id)->where('status', 1)->where('trash', 0)->get();
                $datas = [];
                $datas['employees'] = [];
                $datas['job'] = $job;
                 $datas['jf'] = json_decode($job->formfields);
                 $datas['edu'] = '';
                 $datas['exp'] = '';
                 $datas['lag'] = '';
                 $datas['ref'] = '';
                 $datas['tra'] = '';
                 $datas['fdt'] = [];
                 $datas['f_file_total'] = [];
                 $datas['f_file_total'] = FormData::where('jobs_id', $job->id)->where('type', 1)->groupBy('sn')->get();
                  $form_data = JobForm::where('jobs_id', $job->id)->where('parent_id', 0)->where('f_type', '!=', 'file')->orderBy('id', 'asc')->get();
                if (count($form_data) > 0) {
                   
                  foreach ($form_data as $value) {
                    $r = explode(',', $value->marks);
                    if(is_array($r)){
                    $max = max($r);
                    }
                    else{
                      $max = $value->marks;
                    }
                    if($max > 0){
                        $max = $max;
                    } else{
                        $max = 0;
                    }
        
                    $total_marks += $max;
        
                    $firstchild = [];
                    $fchild = JobForm::where('parent_id', $value->id)->orderBy('id', 'asc')->get();
                    if (count($fchild) > 0) {
                      
                       foreach ($fchild as $fchilds) {
        
                          $secondchild = [];
                          $schilds = JobForm::where('parent_id', $fchilds->id)->orderBy('id', 'asc')->get();
                            if (count($schilds) > 0) {
                              foreach ($schilds as $schild) {
        
        
        
                                $thirdchild = [];
                                $tchilds = JobForm::where('parent_id', $schild->id)->orderBy('id', 'asc')->get();
                                  if (count($tchilds) > 0) {
                                    foreach ($tchilds as $tchild) {
                                      $tr = explode(',', $tchild->marks);
                                      if(is_array($tr)){
                                        $tmax = max($tr);
                                      }
                                      else{
                                        $tmax = $tchild->marks;
                                      }
        
                                      $total_marks += $tmax;
        
                                      $thirdchild[] = [
                                        'f_title' => $tchild->f_lable,
                                        'marks' => $tmax,
                                      ];
        
                                    }
                                  }
        
        
        
        
        
        
                                $sr = explode(',', $schild->marks);
                                if(is_array($sr)){
                                  $smax = max($sr);
                                }
                                else{
                                  $smax = $schild->marks;
                                }
        
                                $total_marks += $smax;
        
                                $secondchild[] = [
                                  'f_title' => $schild->f_lable,
                                  'marks' => $smax,
                                  'children' => $thirdchild
                                ];
        
                              }
                            }
        
        
                              $fr = explode(',', $fchilds->marks);
                              if(is_array($fr)){
                              $fmaxs = max($fr);
                              }
                              else{
                                $fmaxs = $fchilds->marks;
                              }
                              
                              
                              
                              
                              $fmax = (int)$fmaxs;
                              
                              
        
                              $total_marks += $fmax;
                          $firstchild[] = [
                          'f_title' => $fchilds->f_lable,
                          'marks' => $fmax,
                          'children' => $secondchild
                        ];
                       }
                    }
        
                    $datas['fdt'][] = [
                      'f_title' => $value->f_lable,
                      
                      'marks' => $max,
                      'children' => $firstchild
                    ];
                    
                  }
                  # code...
                }
                $edud = EmployeeEducation::where('jobs_id', $job->id)->groupBy('sn')->get();
                $datas['edu'] = count($edud);
                $expd = EmployeeExperience::where('jobs_id', $job->id)->groupBy('sn')->get();
               $datas['exp'] = count($expd);
               $langd = EmployeeLanguage::where('jobs_id', $job->id)->groupBy('sn')->get();
                $datas['lag'] = count($langd);
                $trad = EmployeeTraining::where('jobs_id', $job->id)->groupBy('sn')->get();
               $datas['tra'] = count($trad);
               $refd = EmployeeReference::where('jobs_id', $job->id)->groupBy('sn')->get();
                $datas['ref'] = count($refd);
                 $datas['total'] = $total_marks; 
                foreach ($employees as $employee) {
                       
                
                
                
                
        
                $datas['employees'][] = [
                  'id' => $employee->id,
                  'firstname' => $employee->firstname,
                  'middlename' => $employee->middlename,
                  'lastname' => $employee->lastname,
                  // 'saluation' => Saluation::getTitle($employee->saluation),
                  'saluation' => '',
                  'email' => $employee->email,
                  'citizenship' => $employee->citizenship,
                  'gender' => $employee->gender,
                  'dob' => $employee->dob,
                  'age' => $employee->age,
                  'total_experience' => $employee->total_experience,
                  'marital_status' => $employee->marital_status,
                  'nationality' => $employee->nationality,
                  'image' => $employee->image,
                  'resume' => $employee->resume,
                  'coverletter' => $employee->coverletter,
                  'permanent_address' => $employee->permanent_address,
                  'temporary_address' => $employee->temporary_address,
                  'home_phone' => $employee->home_phone,
                  'mobile' => $employee->mobile,
                  'fax' => $employee->fax,
                  'website' => $employee->website,
                  'vehicle' => $employee->vehicle,
                  'license_of' => $employee->license_of,
                  'created_at' => $employee->created_at,
                  'education' => EmployeeEducation::where('employees_id', $employee->id)->get(),
                  'experience' => EmployeeExperience::where('employees_id', $employee->id)->get(),
                  'language' => EmployeeLanguage::where('employees_id', $employee->id)->get(),
                  'reference' => EmployeeReference::where('employees_id', $employee->id)->get(),
                  'form_data' => FormData::where('employees_id', $employee->id)->orderBy('f_title', 'asc')->get(),
                  'training' => EmployeeTraining::where('employees_id', $employee->id)->get(),
                  'edu_marks' => $employee->edu_marks,
                  'exp_marks' => $employee->exp_marks,
                  'total_marks' => $employee->total_marks,
                  'exfile' => FormData::where('jobs_id', $job->id)->where('employees_id', $employee->id)->where('type', 1)->get()
                ];
        
        
               
        
                    
                }
               // dd($datas);
                ini_set('memory_limit','1000M');
                set_time_limit(600);
               Excel::create('application_excel', function($excel) use($datas) {
                    $excel->sheet('application_excel', function($sheet) use($datas) {
                        $sheet->loadView('branchadmin.jobs.csv')->with('datas', $datas);
                    });
                })->download('csv');
               // Excel::loadView('admin.jobs.csv', array('datas' => $datas))->export('xls');
               
                //return view('admin.jobs.csv', ['datas' => $datas]);
              } else{
                \Session::flash('alert-danger','Sorry we did not found the job of your request');
                            return redirect()->back();
              }
            }

protected function getZoomToken()
{
//        get refresh_token from db
    $refresh_token=DB::table('zoom_api')->where('id', '=', 1)->first()->refresh_token;
    $token_url="https://zoom.us/oauth/token?grant_type=refresh_token&refresh_token=".$refresh_token;
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_HTTPHEADER => array(
            "authorization: Basic dVFRdWJJZk9UOGVOb19rcUdTNFZRZzpCZXZaZjlTQnEyUnMyS3hCYktkcmZ2bTJqcXp2NXdTdw==",
        ),
        CURLOPT_URL => $token_url,
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_CUSTOMREQUEST => "POST",
    ));

    $data = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($data);
//        update refresh_token to db
    DB::table('zoom_api')->where('id', '=', 1)->update([
        'refresh_token' => $result->refresh_token,
    ]);
//        return  access_token
    return $result->access_token;
}





}

