<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\ClientDetail;
use App\ClientComment;
use App\ClientStaffComment;
use App\BranchSetting;
use App\Adjustment_staff;
use App\OrgRating;
use App\StaffRating;

use Validator;
use Mail;

class HomeController extends Controller
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
    public function index(Request $request)
    {
        $data['logo'] = '';
        if (is_file(DIR_IMAGE.'logo.png')) {
            $data['logo'] = asset('/image/logo.png');
        }
        $v= Validator::make($request->all(),
            [
                    'email'=>'required|email',
                                    
                    
            ]);
        if($v->fails())
        {
            \Session::flash('alert-danger','Sorry This user can not access This page');
            return view('home')->with('data', $data); 
        }
        
    }
    public function InvliedUser()
    {
         \Session::flash('alert-danger','Sorry This user can not access This page');
                    return redirect('login'); 
    }

    public function clientReview(Request $request)
    {
        $data['logo'] = asset('/image/logo.png');
        $client = ClientDetail::where('id', $request->cc)->first();
        if (!isset($client->id)) {
            $data['error'] = 'Credentials did not match';
            return view('client_review')->with('data', $data);
            exit();
        }

        $data['client_email'] = $client->email;
        $data['focal_person'] = $client->focal_person;

        $data['client_id'] = $client->id;
       
        $data['ratingp'][] = ['value' => '10', 'title' => 'Outstanding'];
        $data['ratingp'][] = ['value' => '8', 'title' => 'Very Good'];
        $data['ratingp'][] = ['value' => '7', 'title' => 'Adequate'];
        $data['ratingp'][] = ['value' => '5', 'title' => 'Needs Improvement'];
        $data['ratingp'][] = ['value' => '2', 'title' => 'Unacceptable'];

        $data['yno'][] = ['value' => '10', 'title' => 'Yes'];
        $data['yno'][] = ['value' => '7', 'title' => 'May be'];
        $data['yno'][] = ['value' => '2', 'title' => 'No'];

        $data['yesno'][] = ['value' => '5', 'title' => 'Yes'];
        $data['yesno'][] = ['value' => '8', 'title' => 'No'];

        $data['focals'] = [];

        if (!empty($client->project_leader)) {
           $persons = explode(',', $client->project_leader);
           //dd($persons);
           foreach ($persons as $key => $person) {
                $fp = trim($person);
               $staff = Adjustment_staff::select('id', 'name')->where('branch',$client->branch_id)->where('name', 'LIKE', '%'.$fp.'%')->first();
               if (isset($staff->id)) {
                $stf_r_check = StaffRating::where('client_detail_id',$client->id)->where('adjustment_staff_id', $staff->id)->where('month', date('m'))->count();
                if ($stf_r_check < 1) {
                    $data['focals'][] = ['id' => $staff->id, 'name' => $staff->name];
                }
                   
               }
           }
        }

        $data['org_rating'] = '0';
        $data['all_rating'] = '0';

        $org_rating_check = OrgRating::where('client_detail_id',$client->id)->where('month', date('m'))->count();
        

        if (count($data['focals']) < 1 || $org_rating_check > 0) {
            $data['all_rating'] = '1';
        }
        //dd($data['focals']);
       //\Session::flash('alert-success', 'Thank you for giving us valuable review');
        return view('client_review')->with('data', $data);
    }

    public function clientReviewSave(Request $request)
    {
        //dd($request->all());

       $v = $this->validate($request, [ 
        'client_id' => 'required|integer',
        'organization_rating' => 'integer',
        'org_remarks' => 'min:3',
        'org_rating.*.rating' => 'integer',
        'overal.*.rating' => 'integer',
        'overal.*.remarks' => 'min:3',
        'ind_rating.*.ind_id' => 'integer',
        'ind_rating.*.rating' => 'integer',


       ]);

       if ($v) {
           \Session::flash('alert-danger', 'Please fill all the required fields');
           return redirect()->back()->withError($v)->withInput();
       }
       if(isset($request->organization_rating)){
       $orgrating = [
        'client_detail_id' => $request->client_id,
        'overal_rating' => $request->organization_rating,
        'overal_remarks' => $request->org_remarks,
        'others' => json_encode($request->org_rating),
        'year' => date('Y'),
        'month' => date('m'),
        'day' => date('d')
       ];

       OrgRating::create($orgrating);
        }
        if(count($request->overal) > 0) {
       foreach ($request->overal as $key => $crating) {
           $cothers = [];
           foreach ($request->ind_rating as  $value) {
               if ($value['ind_id'] == $key) {
                   $cothers[] = [
                    'title' => $value['title'],
                    'rating' => $value['rating'],
                    'remark' => $value['remarks'],
                   ];
               }
           }

           $crt = [
            'adjustment_staff_id' => $key,
            'client_detail_id' => $request->client_id,
            'overal_rating' => $crating['rating'],
            'overal_remarks' => $crating['remarks'],
            'others' => json_encode($cothers),
            'year' => date('Y'),
            'month' => date('m'),
            'day' => date('d')
           ];

           StaffRating::create($crt);
       }
   }

   $config = array( 'driver' => 'mail' );
       \Config::set('mail',$config);

       $client = ClientDetail::where('id', $request->client_id)->first();
$setting = BranchSetting::select('email')->where('branch_id', $client->branch_id)->first();

      $branch = Branch::where('id', $client->branch_id)->first();

        $mydata = array(
                    'name' => $branch->name, 
                    'email' => $setting->email,
                    'subject' => 'Thank you for giving feedback',
                    'to_name' => $client->focal_person,
                    'to_email' => $client->email,
                    
                    'message' => 'This is test message',
                    'logo' => asset('/image/logo.png'),                
                                      
                    );
    
         
        Mail::send('mail.client-thankyou', ['data' => $mydata], function($mail) use ($mydata){
                  $mail->to($mydata['to_email'],$mydata['to_name'])->from($mydata['email'],$mydata['name'])->subject($mydata['subject']);
                });

       \Session::flash('alert-success', 'Thank you for giving us valuable feedback');
       return redirect()->back();
    }
}
