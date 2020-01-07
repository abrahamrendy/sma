<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\UsersModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;

class EmployeeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        // $this->middleware('guest');

    }

    /**
    * This function used to display employee page
    */
    public function index()
    {
        $userid = Session::get('LAD_user_id');
        $users = UsersModel::where('id',$userid)
                            ->first();
        $employeelists = $this->getEmployeeList();
        $dashboardController = new DashboardController();
        $allcourses = array();
        foreach ($employeelists as $data) {
            $allcourses[$data->id] = $dashboardController->getAllCurrentCourses($data->id);
         } 
        
        if ($users->type == 1 || ($users->type == 2 && $users->role == 2)) {
            return view('header')->withTitle('LAD Global | Dashboard - EmployeeList').
                view('dashboard/dashboard-sidebar', ['users' => $users]).
                view('dashboard/employee', ['users' => $users, 'employeelists' => $employeelists, 'allcourses' => $allcourses]).
                view('footer');
        } else {
            return abort(404);
        }
    }

    /**
    * Showing the sorted list of employee
    *
    * @param string $criteria The sort by
    */
    public function show_sorting($criteria) {
        $userid = Session::get('LAD_user_id');
        $users = UsersModel::where('id',$userid)
                            ->first();
        $employeelists = $this->sortingEmployee($criteria);
        $dashboardController = new DashboardController();
        $allcourses = array();
        foreach ($employeelists as $data) {
            $allcourses[$data->id] = $dashboardController->getAllCurrentCourses($data->id);
         } 
        
        if ($users->type == 1) {
            return view('header')->withTitle('LAD Global | Dashboard - EmployeeList').
                view('dashboard/dashboard-sidebar', ['users' => $users]).
                view('dashboard/employee', ['employeelists' => $employeelists, 'allcourses' => $allcourses, 'criteria' => $criteria]).
                view('footer');
        } else {
            return abort(404);
        }
    }

    /**
    * Here is how to sort the employees  
    *
    * @param string $criteria The sort by
    */
    public function sortingEmployee($criteria) {
        $userid = Session::get('LAD_user_id');
        $users = UsersModel::where('id',$userid)
                            ->first();
        // $organization = $users->organization;
        if ($criteria  == 'nameasc') {
            return DB::table('users')
                    ->where('employee_of','=',$userid)
                    ->join('user_occupations','users.occupation','=','user_occupations.id')
                    ->orderBy('users.name','asc')
                    ->select('users.*','user_occupations.name as occuname')
                    ->get();
        } else if ($criteria  == 'namedesc') {
            return DB::table('users')
                    ->where('employee_of','=',$userid)
                    ->join('user_occupations','users.occupation','=','user_occupations.id')
                    ->orderBy('users.name','desc')
                    ->select('users.*','user_occupations.name as occuname')
                    ->get();
        } else {
            return DB::table('users')
                    ->where('employee_of','=',$userid)
                    ->join('user_occupations','users.occupation','=','user_occupations.id')
                    ->orderBy('role','desc')
                    ->select('users.*','user_occupations.name as occuname')
                    ->get();
        }
    }

    /**
    * This return the list of employee
    *
    */
    public function getEmployeeList() {
        $userid = Session::get('LAD_user_id');
        $users = UsersModel::where('id',$userid)
                            ->first();
        $organization = $users->organization;
        return DB::table('users')
                    ->where('employee_of','=',$userid)
                    ->join('user_occupations','users.occupation','=','user_occupations.id')
                    ->orderBy('users.name','asc')
                    ->select('users.*','user_occupations.name as occuname')
                    ->get();
    }

    /**
    * modify functionality of the employee
    *
    * @param string $functionality The act to do
    * @param int $user_id The user id of this employee
    */
    public function modifyEmployee($functionality, $user_id) {
        if ($functionality == "promote") {
            $update['role'] = '2';
            DB::table('users')
                    ->where('id',$user_id)
                    ->update($update);
        }

        if ($functionality == 'demote') {
            $update['role'] = '1';
            DB::table('users')
                    ->where('id',$user_id)
                    ->update($update);
        }

        if ($functionality == 'remove') {
            $update['employee_of'] = null;
            $update['role'] = '1';
            $update['type'] = '0';
            DB::table('users')
                    ->where('id',$user_id)
                    ->update($update);
        }

        return json_encode("Success");
    }

    /**
    * invitation to the employee using email
    *
    * @param Request $request The request from ajax
    */
    public function inviteEmployee(Request $request){
        $emailaddress = strip_tags($request->input('employee_email'));
        $username = Session::get('LAD_user_name');
        $userid = Session::get('LAD_user_id');
        $users = DB::table('users')->where('email',$emailaddress)->first();

        $currentuser = DB::table('users')->where('id',$userid)->first();
        $organization = $currentuser->organization;
        $emp = '';
        if ($currentuser->type == 2 && $currentuser->role == 2) {
            $emp = $currentuser->employee_of;
        } else {
            $emp = $userid;
        }
        $url = url('/');
        if ($users){
            $subject = 'LAD Global | Employee Invitation';
            $message = '<html>
                            <head>
                              <title>LAD Global | Employee Invitation</title>
                            </head>
                            <body>
                                <table width=700px style="background-color:#f3f3f3; padding:20px 20px">
                                    <tr>
                                        <td>
                                            <table width=100% style="background-color: #ffffff; padding:30px 30px">
                                                <tr><td>
                                                    <div style="display: inline-block;width: 100%">
                                                        <img src="http://dev.ladglobal.com/img/logo-min.png" align="right" width="190px">
                                                    </div>
                                                </td></tr>
                                                <tr><td><br>
                                                <tr><td><br>
                                                <tr><td>
                                                    <p>
                                                        <h2 style="font-family: sans-serif; color:#666666; word-break: break-word;">You have been invited as an employee of '.$organization.'. Click the "Confirm" button below to confirm your invitation and please sign in to your account.</h2>
                                                    </p>
                                                </td></tr>
                                                <tr><td><br>
                                                <tr><td><br>
                                                <tr><td style="cursor: pointer;">
                                                    <a href="'.$url.'/confirm_invitation?id='.$users->id.'&name='.$users->name.'&emp='.$emp.'&organization='.$organization.'"><button style="text-transform: uppercase;
                                                    background-color: #018FFF;
                                                    font-family: sans-serif;
                                                    position: relative;
                                                    height: 50px;
                                                    width: 100%;
                                                    text-align: center;
                                                    color: white;
                                                    font-size: 20px;
                                                    border-color: #018FFF !important;
                                                    border-width: 1px;
                                                    border-radius: 3px;
                                                    border-style: solid;
                                                    cursor: pointer;
                                                    -webkit-transition: all 0.5s;
                                                    -o-transition: all 0.5s;
                                                    transition: all 0.5s;">Confirm</button></a>
                                                </td></tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </body>
                        </html>';
                    $type = 'html'; // or HTML
                    $charset = 'utf-8';

                    // Headers
                    $headers[] = 'MIME-Version: 1.0';
                    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
                    $headers[] = 'From: LAD Global <noreply@ladglobal.com>';

                    $ismailed = mail($emailaddress, $subject, $message, implode("\r\n", $headers));

                    $output['code'] = 0;
                    $output['message'] = "Your password reset link has been sent to your email. Use it to reset your password.";
                    $output['info'] = 'success'; 

            return redirect()->action('EmployeeController@index');
        } else {
            $subject = 'LAD Global | Employee Invitation';
            $message = '<html>
                            <head>
                              <title>LAD Global | Employee Invitation</title>
                            </head>
                            <body>
                                <table width=700px style="background-color:#f3f3f3; padding:20px 20px">
                                    <tr>
                                        <td>
                                            <table width=100% style="background-color: #ffffff; padding:30px 30px">
                                                <tr><td>
                                                    <div style="display: inline-block;width: 100%">
                                                        <img src="http://dev.ladglobal.com/img/logo-min.png" align="right" width="190px">
                                                    </div>
                                                </td></tr>
                                                <tr><td><br>
                                                <tr><td><br>
                                                <tr><td>
                                                    <p>
                                                        <h2 style="font-family: sans-serif; color:#666666; word-break: break-word;">You have been invited as an employee of '.$organization.'. Click the "Confirm" button below to confirm your invitation and please sign up.</h2>
                                                    </p>
                                                </td></tr>
                                                <tr><td><br>
                                                <tr><td><br>
                                                <tr><td style="cursor: pointer;">
                                                    <a href="'.$url.'/invitation_sign_up?emp='.$emp.'"><button style="text-transform: uppercase;
                                                    background-color: #018FFF;
                                                    font-family: sans-serif;
                                                    position: relative;
                                                    height: 50px;
                                                    width: 100%;
                                                    text-align: center;
                                                    color: white;
                                                    font-size: 20px;
                                                    border-color: #018FFF !important;
                                                    border-width: 1px;
                                                    border-radius: 3px;
                                                    border-style: solid;
                                                    cursor: pointer;
                                                    -webkit-transition: all 0.5s;
                                                    -o-transition: all 0.5s;
                                                    transition: all 0.5s;">Confirm</button></a>
                                                </td></tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </body>
                        </html>';
                    $type = 'html'; // or HTML
                    $charset = 'utf-8';

                    // Headers
                    $headers[] = 'MIME-Version: 1.0';
                    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
                    $headers[] = 'From: LAD Global <noreply@ladglobal.com>';

                    $ismailed = mail($emailaddress, $subject, $message, implode("\r\n", $headers));

                    $output['code'] = 0;
                    $output['message'] = "Your password reset link has been sent to your email. Use it to reset your password.";
                    $output['info'] = 'success'; 
            return redirect()->action('DashboardController@index');
        }

    }

    /**
    * invite an employee for exist user
    *
    * @param Request $request The request from ajax
    */
    public function existInvitation(Request $request){
        $id = strip_tags($request->input('id'));
        $name = strip_tags($request->input('name'));
        $emp = strip_tags($request->input('emp'));
        $organization = strip_tags($request->input('organization'));

        $user = DB::table('users')->where('id',$id)->first();
        $updates = array();

        if ($user->name == $name) {
            $updates['type'] = '2';
            $updates['employee_of'] = $emp;
            $updates['organization'] = $organization;
            $updates['updated_at'] = date("Y-m-d H:i:s");

            $update = DB::table('users')->where('id',$id)->update($updates);

            if ($update) {
                return redirect()->action('HomeController@index');
            }
         } else {
            return abort('404');
         }
    }
    
    /**
    * invite new user as an employee
    *
    * @param Request $request The request from ajax
    */
    public function newInvitation(Request $request){
        $emp = strip_tags($request->input('emp'));

        $courses_categories = DB::table('courses_categories')
                                ->where('name', '!=', 'FEATURED')
                                ->orderBy('priority', 'desc')
                                ->orderBy('name', 'asc')
                                ->get();
        $occupations = DB::table('user_occupations')
                                ->orderBy('priority', 'desc')
                                ->get();
        $industries = DB::table('user_industries')
                                ->orderBy('priority', 'desc')
                                ->get();

        return view('employee_sign_up', ['emp' => $emp, 'courses_categories' => $courses_categories, 'occupations' => $occupations, 'industries' => $industries])->withTitle('LAD Global | Employee Invitation Sign Up');
    }
}