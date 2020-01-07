<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Http\uploadedFile;
use App\UsersModel;
use Session;

class DashboardController extends Controller
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
    * Display the dashboard page
    */
    public function index()
    {
        if(!Session::get('LAD_user_id')){
            
            return redirect()->action('HomeController@index');
        }else{
            $header_loggedin = true;

            $userid = Session::get('LAD_user_id');
            $users = UsersModel::where('id',$userid)
                                    ->first();

            if ($users->type != 3) {

                $courses['popular'] = $this->getCourses(0,9,0,2);
                $courses['wishlist'] = $this->getWishlist(0,Session::get("LAD_user_id"));
                $courses['featured'] = $this->getFeaturedCourses();

                return view('header', ['header_loggedin' => $header_loggedin])->withTitle('LAD Global | Dashboard').view('dashboard/dashboard-sidebar',['users' => $users]).view('dashboard/dashboard-index', ['courses' => $courses]).view('footer');
            } else {

                // $all_users = DB::select("SELECT users.*, user_roles.name as role_name FROM `users` INNER JOIN user_roles on user_roles.id = users.role WHERE users.id != '$userid'");

                $all_users = DB:: select("  SELECT t.*, user_occupations.name as comp_occupation
                                            FROM
                                            (SELECT users.*, user_roles.name as role_name, user_occupations.name as occupation_name FROM `users` 
                                            INNER JOIN user_roles on user_roles.id = users.role 
                                            LEFT JOIN user_occupations on users.occupation = user_occupations.id 
                                            WHERE users.id != '$userid') as t
                                            LEFT JOIN user_occupations on user_occupations.id = t.corporate_admin_occupation ORDER BY t.id DESC");

                return view('header', ['header_loggedin' => $header_loggedin])->withTitle('LAD Global | Dashboard').view('dashboard/dashboard-sidebar',['users' => $users]).view('dashboard/usermanager', ['all_users' => $all_users]).view('footer');
            }
        }
        

        // return "asd";
    }

    /**
    * This function is used to display my course page
    */
    public function mycourse() {
        $allcourses = $this->getAllCurrentCourses(Session::get('LAD_user_id'));
        $userid = Session::get('LAD_user_id');
        $users = UsersModel::where('id',$userid)
                            ->first();
        return view('header')->withTitle('LAD Global | Dashboard - My Course').view('dashboard/dashboard-sidebar',['users' => $users]).view('dashboard/mycourse', ['courses' => $allcourses]).view('footer');
    }
    /**
    *
    * Display the user achivement
    *
    */
    public function myachievement() {
        $userid = Session::get('LAD_user_id');
        $users = UsersModel::where('id',$userid)
                            ->first();
        return view('header')->withTitle('LAD Global | Dashboard - My Achievement').view('dashboard/dashboard-sidebar',['users' => $users]).view('dashboard/myachievement').view('footer');
    }
    /**
    *
    * This function is used to display postcourse page
    */
    public function postcourse() {
        $header_loggedin = true;
        $courses['popular'] = $this->getOwnCreatedCourses(0,8,1,1);
        $courses['offline_popular'] = $this->getOwnCreatedCourses(0,8,1,0);
        $userid = Session::get('LAD_user_id');
        $users = UsersModel::where('id',$userid)
                            ->first();
        $count_courses = count($this->getAllUserCourses($userid));
        $courses_categories = DB::table('courses_categories')->where('priority', '!=' , 2)->orderBy('priority', 'DESC')->orderBy('name', 'ASC')->get();
        $currencies = DB::table('currencies')->orderBy('name','asc')->get();
        if ($users->type == 1 || ($users->type == 2 && $users->role == 2)) {
            return view('header', ['header_loggedin' => $header_loggedin, 'courses_categories' => $courses_categories, 'users' => $users,'currencies' =>$currencies])->withTitle('LAD Global | Dashboard - Post Course').view('dashboard/dashboard-sidebar',['users' => $users]).view('dashboard/postcourse', ['courses' => $courses,'count_courses' => $count_courses]).view('footer');
        } else {
            return abort(404);
        }
        
    }
    /**
    *
    * Display the settings page
    */
    public function settings() {
        $userid = Session::get('LAD_user_id');
        $users = UsersModel::where('id',$userid)
                                ->first();

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

        return view('header')->withTitle('LAD Global | Dashboard - Settings').view('dashboard/dashboard-sidebar',['users' => $users]).view('dashboard/setting', ['users' => $users, 'courses_categories' => $courses_categories, 'occupations' => $occupations, 'industries' => $industries]).view('footer');
    }
    /**
    *
    * This function is use to get courses
    *
    * @param int $offset The pointer of the page
    * @param int $limit The limit of the page
    * @param int $type The type of course (online or offline)
    */
    public function getCourses($offset, $limit, $ispostcourse, $type) {
        $offset = $offset * $limit;
        $str = '';
        if ($offset > 0 && $ispostcourse == 1) {
            $offset = $offset - 1;
        }
        if ($type != 2) {
            $str = 'AND TYPE = '.$type;
        }
        // GROUP_CONCAT(CONCAT(IF(users.title is null,'',CONCAT(users.title,'. ')),users.name) SEPARATOR ', ')
        return DB::select("SELECT GROUP_CONCAT(user_wishlists.user_id SEPARATOR ',') as wishlist_user_id, allcourse.* 
                            FROM
                                (SELECT users.organization as courselecturer,
                                                                            coursejoined.*
                                FROM
                                    (SELECT lecturers.user_id,
                                            coursestable.*
                                    FROM
                                        (SELECT courses.id AS course_id,
                                                courses.coursecode,
                                                courses.title,
                                                courses.price,
                                                courses.image,
                                                courses.overview,
                                                courses.info,
                                                courses.level,
                                                courses.rating,
                                                courses.subscription,
                                                courses.approved_time,
                                                currencies.name as currency,
                                                currencies.symbol as currencysymbol
                                        FROM courses 
                                        LEFT JOIN currencies ON courses.currency_id = currencies.id
                                        WHERE (STATUS=1 ". $str ." AND offline_progress<=25.00 AND IF(type=0,end_date>CURDATE(),1=1) ) ) AS coursestable
                                    LEFT JOIN (SELECT * FROM user_courses WHERE TYPE=1) AS lecturers ON lecturers.`course_id` = coursestable.course_id) AS coursejoined
                                LEFT JOIN users ON coursejoined.user_id=users.`id`
                                GROUP BY coursejoined.course_id
                                ORDER BY coursejoined.subscription DESC LIMIT ?,?) as allcourse 
                            LEFT JOIN user_wishlists ON allcourse.course_id = user_wishlists.course_id
                            GROUP BY allcourse.course_id", [$offset, $limit]);
    }
    /**
    *
    * This function is used to get the featured courses page
    */
    public function getFeaturedCourses() {
        $cat = 1;
        // GROUP_CONCAT(CONCAT(IF(users.title is null,'',CONCAT(users.title,'. ')),users.name) SEPARATOR ', ')
        return DB::select("SELECT users.organization as courselecturer,
                                                coursejoined.*
                                        FROM
                                            (SELECT lecturers.user_id,
                                                    coursestable.*
                                            FROM
                                                (SELECT courses.id AS course_id,
                                                        courses.coursecode,
                                                        courses.title,
                                                        courses.price,
                                                        courses.image,
                                                        courses.overview,
                                                        courses.info,
                                                        courses.level,
                                                        courses.rating,
                                                        courses.approved_time,
                                                        currencies.name as currency,
                                                        currencies.symbol as currencysymbol
                                                FROM courses 
                                                LEFT JOIN currencies ON courses.currency_id = currencies.id
                                                WHERE ((find_in_set(?,category) <> 0) AND status=1 AND offline_progress<=25.00 AND IF(type=0,end_date>CURDATE(),1=1) ) ) AS coursestable
                                            LEFT JOIN (SELECT * FROM user_courses WHERE TYPE=1) AS lecturers ON lecturers.`course_id` = coursestable.course_id) AS coursejoined
                                        LEFT JOIN users ON coursejoined.user_id=users.`id`
                                        GROUP BY coursejoined.course_id; ", [$cat]);
    }
    /**
    *
    * Get created course by user
    */
    public function getOwnCreatedCourses($offset, $limit, $ispostcourse, $type) {
        $userid = Session::get('LAD_user_id');
        $offset = $offset * $limit;
        $str = '';
        if ($offset > 0 && $ispostcourse == 1) {
            $offset = $offset - 1;
        }
        if ($type != 2) {
            $str = 'AND TYPE = '.$type;
        }
        // GROUP_CONCAT(CONCAT(IF(users.title is null,'',CONCAT(users.title,'. ')),users.name) SEPARATOR ', ')
        return DB::select("SELECT GROUP_CONCAT(user_wishlists.user_id SEPARATOR ',') as wishlist_user_id, allcourse.* 
                            FROM
                                (SELECT users.organization as courselecturer,
                                                                            coursejoined.*
                                FROM
                                    (SELECT lecturers.user_id,
                                            coursestable.*
                                    FROM
                                        (SELECT courses.id AS course_id,
                                                courses.coursecode,
                                                courses.title,
                                                courses.price,
                                                courses.image,
                                                courses.overview,
                                                courses.info,
                                                courses.level,
                                                courses.rating,
                                                courses.subscription,
                                                courses.approved_time,
                                                currencies.name as currency,
                                                currencies.symbol as currencysymbol
                                        FROM courses 
                                        LEFT JOIN currencies ON courses.currency_id = currencies.id
                                        WHERE (STATUS=1 ". $str ." AND offline_progress<=25.00 AND IF(type=0,end_date>CURDATE(),1=1) ) ) AS coursestable
                                    LEFT JOIN (SELECT * FROM user_courses WHERE TYPE=1) AS lecturers ON lecturers.`course_id` = coursestable.course_id) AS coursejoined
                                LEFT JOIN users ON coursejoined.user_id=users.`id`
                                WHERE user_id = ?
                                GROUP BY coursejoined.course_id
                                ORDER BY coursejoined.course_id DESC
                                LIMIT ?,?) as allcourse 
                            LEFT JOIN user_wishlists ON allcourse.course_id = user_wishlists.course_id
                            GROUP BY allcourse.course_id
                            ORDER BY allcourse.course_id DESC", [$userid, $offset, $limit]);
    }
    /**
    *
    * Return all whistlist
    *
    * @param int $offset The pointer of the page
    * @param int $user_id The user id of this user
    */
    public function getWishlist($offset,$user_id) {
        $offset = $offset * 9;
        // GROUP_CONCAT(CONCAT(IF(users.title is null,'',CONCAT(users.title,'. ')),users.name) SEPARATOR ', ')
        return DB::select("SELECT GROUP_CONCAT(user_wishlists.user_id SEPARATOR ',') as wishlist_user_id, allcourse.* 
                            FROM
                                (SELECT users.organization as courselecturer,
                                                                            coursejoined.*
                                FROM
                                    (SELECT lecturers.user_id,
                                            coursestable.*
                                    FROM
                                        (SELECT courses.id AS course_id,
                                                courses.coursecode,
                                                courses.title,
                                                courses.price,
                                                courses.image,
                                                courses.overview,
                                                courses.info,
                                                courses.level,
                                                courses.rating,
                                                courses.subscription,
                                                courses.approved_time,
                                                currencies.name as currency,
                                                currencies.symbol as currencysymbol
                                        FROM courses 
                                        LEFT JOIN currencies ON courses.currency_id = currencies.id
                                        WHERE (STATUS=1 AND offline_progress<=25.00 AND IF(type=0,end_date>CURDATE(),1=1) ) ) AS coursestable
                                    LEFT JOIN (SELECT * FROM user_courses WHERE TYPE=1) AS lecturers ON lecturers.`course_id` = coursestable.course_id) AS coursejoined
                                LEFT JOIN users ON coursejoined.user_id=users.`id`
                                GROUP BY coursejoined.course_id) as allcourse 
                            LEFT JOIN user_wishlists ON allcourse.course_id = user_wishlists.course_id
                            WHERE user_wishlists.user_id = ? 
                            GROUP BY allcourse.course_id LIMIT ?,9", [$user_id, $offset]);
    }
    /**
    *
    * Return the current courses by user
    *
    * @param int $user_id The user id of this user
    */
    public function getAllCurrentCourses($user_id) {
        // GROUP_CONCAT(CONCAT(IF(users.title is null,'',CONCAT(users.title,'. ')),users.name) SEPARATOR ', ')
        return DB::select("SELECT users.organization as courselecturer,
                                                                            coursejoined.*
                                FROM
                                    (SELECT lecturers.id as enroll_id ,lecturers.user_id, lecturers.progress,
                                            coursestable.*
                                    FROM
                                        (SELECT courses.id AS course_id,
                                                courses.coursecode,
                                                courses.title,
                                                courses.price,
                                                courses.image,
                                                courses.overview,
                                                courses.info,
                                                courses.level,
                                                courses.rating,
                                                courses.subscription,
                                                courses.approved_time,
                                                courses.start_date,
                                                courses.end_date,
                                                courses.type
                                        FROM courses 
                                        WHERE (STATUS=1 AND offline_progress<=25.00  ) ) AS coursestable
                                    LEFT JOIN (SELECT * FROM user_courses WHERE TYPE=0) AS lecturers ON lecturers.`course_id` = coursestable.course_id) AS coursejoined
                                LEFT JOIN users ON coursejoined.user_id=users.`id`
                                WHERE user_id = ?
                                GROUP BY coursejoined.course_id
                                ORDER BY coursejoined.subscription DESC", [$user_id]);
    }
    /**
    *
    * Getting all user courses
    *
    * @param int $user_id The user id of this user
    */
    public function getAllUserCourses($user_id) {
        // GROUP_CONCAT(CONCAT(IF(users.title is null,'',CONCAT(users.title,'. ')),users.name) SEPARATOR ', ')
        $output = DB::select(" SELECT allcourse.* 
                            FROM
                                (SELECT users.organization as courselecturer,
                                                                                coursejoined.*
                                    FROM
                                        (SELECT lecturers.user_id, lecturers.progress,
                                                coursestable.*
                                        FROM
                                            (SELECT courses.id AS course_id,
                                                    courses.coursecode,
                                                    courses.title,
                                                    courses.category,
                                                    courses.price,
                                                    courses.image,
                                                    courses.overview,
                                                    courses.info,
                                                    courses.level,
                                                    courses.rating,
                                                    courses.subscription,
                                                    courses.start_date,
                                                    courses.end_date,
                                                    courses.approved_time,
                                                    courses.type,
                                                    courses.status
                                            FROM courses 
                                            WHERE courses.status != 2 ) AS coursestable
                                        LEFT JOIN (SELECT * FROM user_courses WHERE TYPE=1) AS lecturers ON lecturers.`course_id` = coursestable.course_id) AS coursejoined
                                    LEFT JOIN users ON coursejoined.user_id=users.`id`
                                    WHERE user_id = ?
                                    GROUP BY coursejoined.course_id) as allcourse
                                    GROUP BY allcourse.course_id", [$user_id]);
        return $output;
    }
    /**
    *
    * This function is used to add a wishlist
    *
    * @param Request $request the request from ajax
    */
    public function addWishlist (Request $request) {
        $course_id = $request->input('course_id');
        $user_id = $request->input('user_id');
        $today = date("Y-m-d H:i:s");
        return DB::table('user_wishlists')->insertGetId(
                                            ['course_id' => $course_id,
                                             'user_id' => $user_id,
                                             'wishlist_time' => $today] );
    }
    /**
    *
    * Removing the wishlist content
    *
    * @param Request $request the request from ajax
    */
    public function removeWishlist (Request $request) {
        $course_id = $request->input('course_id');
        $user_id = $request->input('user_id');
        $today = date("Y-m-d H:i:s");
        return DB::table('user_wishlists')->where([
                                            ['course_id', '=', $course_id],
                                            ['user_id', '=', $user_id]
                                            ])->delete();
    }
    /**
    *
    * This function is used to change content in setting(ex.profilepicture)
    *
    * @param Request $request the request from ajax
    */
    public function changeSettings(Request $request) {
        $userid = Session::get('LAD_user_id');
        //get all input data
        $fullname = strip_tags($request->input('name'));
        $email = strip_tags($request->input('email'));
        $web_url = strip_tags($request->input('web_url'));
        $phone = strip_tags($request->input('phone'));
        $mailing_address = json_encode($request->input('mailing_address'));
        $occupation = strip_tags($request->input('occupation'));
        $organization = strip_tags($request->input('organization'));
        $interest = strip_tags($request->input('interest'));
        $industry = strip_tags($request->input('industry'));
        $user_desc = strip_tags($request->input('user_desc'));
        $country = strip_tags($request->input('country'));
        $path = '';
        $update = array();
        if ($request->hasFile('profpic')){
            $s3 = Storage::disk('s3');
            $photoName = time().'.'.$request->profpic->getClientOriginalExtension();
            $path = $request->profpic->storeAs('images/'.$userid.'/profpic', $photoName, 's3');
            $s3->setVisibility($path, 'public');
            // $s3->put('images/'.$userid.'/profpic', $photoName, 'public');
            $s3->setVisibility($path,'public');
            $update['photo'] = $path;
        }
        $currpassword = strip_tags($request->input('currentpassword'));
        // $currpassword = hash($this->password_hash_algo, $currpassword);
        $newpassword = strip_tags($request->input('newpassword'));
        $verifypassword = strip_tags($request->input('verifypassword'));
        $newsletters = strip_tags($request->input('newsletters'));
        if ($newsletters == 'on') {
            $newsletters = 1;
        } else {
            $newsletters = 0;
        }

        //get user from DB
        $users = UsersModel::where('id',$userid)
                                ->first();

        //process
        $error = array();
        if ($fullname != '' && $fullname != null && $fullname != $users->name) {
            //ADDED
            $update['name'] = $fullname;
        }
        if ($email != '' && $email != null && $email != $users->email) {
            //ADDED
            $update['email'] = $email;
        }
        if ($phone != '' && $phone != null && $phone != $users->corporate_phone_number) {
            //ADDED
            $update['corporate_phone_number'] = $phone;
        }
        if ($web_url != $users->web_url) {
            // ADDED
            $update['web_url'] = $web_url;
        }
        if ($mailing_address != $users->mailing_address) {
            //ADDED
            $update['mailing_address'] = $mailing_address;
        }
        if ($country != $users->country) {
            // ADDED
            $update['country'] = $country;
        }
        if ($user_desc != $users->user_desc) {
            // ADDED
            $update['user_desc'] = $user_desc;
        }
        if ($users->type == 1) {
            if ($occupation != $users->corporate_admin_occupation) {
                //ADDED
                $update['corporate_admin_occupation'] = $occupation;
            }
        } else {
            if ($occupation != $users->occupation) {
                //ADDED
                $update['occupation'] = $occupation;
            }
        }
        if ($organization != $users->organization) {
            //ADDED
            $update['organization'] = $organization;
        }
        if ($interest != $users->interest) {
            $update['interest'] = $interest;
        }
        if ($industry != $users->industry) {
            $update['industry'] = $industry;
        }
        if ($currpassword != "" && hash($this->password_hash_algo, $currpassword) == $users->password) {
            if ($newpassword == $verifypassword) {
                $newpassword = hash($this->password_hash_algo, $newpassword);
                //ADDED
                $update['password'] = $newpassword;
            } else {
                //ERROR
                $error['password_mismatch'] = "Your New Password and Verify Password don't match";
            }
        } else {
            if ($currpassword != "" && $currpassword != $users->password) {
                $error['current_password_mismatch'] = "You inputted a wrong password";
            }
        }
        if ($newsletters != $users->newsletters) {
            //ADDED
            $update['newsletters'] = $newsletters;
        }

        if ($error == null && $update != null) {
            DB::table('users')
                    ->where('id',$userid)
                    ->update($update);
            $users = UsersModel::where('id',$userid)
                                ->first();
            if (isset($update['name']) && $update['name'] != null) {
                Session::put('LAD_user_name', $fullname);
            }
            if (isset($update['photo']) && $update['photo'] != null) {
                Session::put('LAD_user_photo', $path);
            }
            $update['updatestats'] = "Success";
            return redirect()->action('DashboardController@settings')->with('status', "1");
        } else {
            return redirect()->action('DashboardController@settings')->with('status', "2");
        }

        // return view('header')->withTitle('LAD Global | Dashboard - Settings').view('dashboard/dashboard-sidebar',['users' => $users]).view('dashboard/setting', ['users' => $users, 'update' => $update, 'error' => $error]).view('footer');
    }

    /**
    *
    * This function is used to change email
    *
    * @param Request $request the request from ajax
    */
    public function addEmail(Request $request) {
        $output = array(
            'info' => 'error',
            'message' => 'Your request could not be processed. Please try again later.',
            'code' => 'x' 
            );

        $userid = Session::get('LAD_user_id');
        //get all input data
        $email = strip_tags($request->input('addemail'));

        //get user from DB
        $users = UsersModel::where('id',$userid)
                                ->first();

        //process
        if ($email != $users->email) {
            //ADDED
            $update['email'] = $email;
        }

        if ($update != null) {
            DB::table('users')
                    ->where('id',$userid)
                    ->update($update);
            $output['info'] = 'success';
            $output['message'] = 'Email updated successfully';
            $output['code'] = '1';
        } else {
            $output['info'] = 'success';
            $output['message'] = 'Nothing updated';
            $output['code'] = '1';
        }

        return json_encode($output);
        
    }

    /**
    *
    * Submit a course
    *
    * @param Request $request the request from ajax
    */
    public function submitCourse (Request $request) {
        //RETRIEVE INPUT DATA
        $coursetype = strip_tags($request->input('coursetype'));
        $titlecourse = strip_tags($request->input('course-title-course'));
        $category = strip_tags($request->input('course-category'));
        $detail = strip_tags($request->input('requestcustomized_areaoftraining_radio'));
        $description = $request->input('course-desc');
        $sfc = strip_tags($request->input('requestcustomized_sfc'));
        if (str_word_count($description,0) < 100) {
            return redirect()->action('DashboardController@postcourse')->with('status', "2");
        }
        $additionalinfo = $request->input('course-desc-additional');
        $price = strip_tags($request->input('course-price'));
        $currency = strip_tags($request->input('course-currency'));

        //SETTING UP VARIABLE
        $start_date = strip_tags($request->input('course-date'));
        $duration = strip_tags($request->input('course-duration'));
        if ($duration > 0) {
            $duration = ($duration - 1);
        } else {
            $duration = 0;
        }
        $total_duration = strip_tags($request->input('course-total-duration'));
        $end_date = date('Y-m-d 23:59:59', strtotime($start_date . ' + ' .$duration . ' days'));
        if ($coursetype == 'offline') {
            $type = 0;
        } else {
            $type = 1;
        }
        $created_by = Session::get("LAD_user_id");
        $created_time = date("Y-m-d H:i:s");
        $status = 1;

        $topics = $request->input('course-topics');
        $topics_arr = explode(';', $topics);

        //ADD TO DB
        $id_course = DB::table('courses')->insertGetId(
            [
                'title' => $titlecourse, 
                'category' => $category,
                'price' => $price,
                'type' => $type,
                'overview' => $description,
                'info' => $additionalinfo,
                'level' => $detail,
                'created_by' => $created_by,
                'created_time' => $created_time,
                'start_date' => date("Y-m-d H:i:s", strtotime($start_date)),
                'end_date' => $end_date,
                'status' => $status,
                'sfc' => $sfc,
                'currency_id' => $currency
            ]
        );

        if ($id_course != '') {
            $id = DB::table('user_courses')->insertGetId(
                [
                    'user_id' => $created_by,
                    'type' => '1',
                    'course_id' => $id_course,
                    'registration_time' => $created_time,
                ]
            );
            $ct=1;
            if (count($topics_arr) > 0 && $topics_arr[0] != '') {
                foreach ($topics_arr as $data) {
                    $id_modules = DB::table('modules')->insertGetId(
                        [
                            'course_id' => $id_course, 
                            'title' => $data,
                            'module_number' => $ct,
                            'created_by' => $created_by,
                            'created_time' => $created_time,
                            'status' => 1
                        ]
                    );
                    $ct++;
                }
            }

            if ($request->hasFile('cover')){
                $s3 = Storage::disk('s3');
                $photoName = time().'.'.$request->cover->getClientOriginalExtension();
                $path = $request->cover->storeAs('course/'.$id_course, $photoName, 's3');
                $s3->setVisibility($path,'public');
                // $s3->put('images/'.$userid.'/profpic', $photoName, 'public');
                $s3->setVisibility($path,'public');
                $update['image'] = $path;
                $update['detail_image'] = $path;
            }

            $update['coursecode'] = strtoupper($titlecourse[0]).$id_course;

            $update = DB::table('courses')
                            ->where('id',$id_course)
                            ->update($update);
        }

        if (isset($id)) {
            if ($type == 0) {
                return redirect()->action('DashboardController@postcourse')->with('status', "2");
            } else {
                return redirect()->action('DashboardController@postcourse')->with('status', "1");
            }
        } else {
            if ($type == 0) {
                return redirect()->action('DashboardController@postcourse')->with('status', "4");
            } else {
                return redirect()->action('DashboardController@postcourse')->with('status', "3");
            }
        }
    }

    /**
    * 
    * This function is used to show the user networks (networks with other learner or users)
    *
    * @param Request $request the request from ajax
    */
    public function network (Request $request) {
        $user_id = Session::get("LAD_user_id");
        if ($user_id) 
        {   # user_id is defined
            // Initialize all people
            $all_users = array(
                array('id' => "1",
                        'name' => "Bob Nilson",
                        'position' => "Accounting Staff",
                        'organization' => "Kraukman Inc.",
                        'interest' => "Leadership, Neuroscience",
                        'country' => "Singapore",
                        'photo' => "images/1/profpic/photo-min.png",
                        'description' => "Bob Nilson is a Certified Public Accounting Staff at Kraukman Inc., developing the kind of leaders people want - and really need. We disrupt business (in a good way) through a science-based framework that is changing business in Calgary, Canada.",
                        'reputation' => "3"),
                array('id' => "2",
                        'name' => "Lincoln Kyllonen",
                        'position' => "Accounting Staff",
                        'organization' => "Kraukman Inc.",
                        'interest' => "Leadership, Development",
                        'country' => "Ireland",
                        'photo' => null,
                        'description' => "Lincoln Kyllonen is a Certified Public Accounting Staff at Kraukman Inc., developing the kind of leaders people want - and really need. We disrupt business (in a good way) through a science-based framework that is changing business in Calgary, Canada.",
                        'reputation' => "3"),
                array('id' => "3",
                        'name' => "Lenny Lau",
                        'position' => "Accounting Staff",
                        'organization' => "Kraukman Inc.",
                        'interest' => "Science, Business",
                        'country' => "Malaysia",
                        'photo' => "images/1/profpic/photo-min.png",
                        'description' => "Lenny Lau is a Certified Public Accounting Staff at Kraukman Inc., developing the kind of leaders people want - and really need. We disrupt business (in a good way) through a science-based framework that is changing business in Calgary, Canada.",
                        'reputation' => "3"),
                array('id' => "4",
                        'name' => "Lane Rahmat",
                        'position' => "Accounting Staff",
                        'organization' => "Kraukman Inc.",
                        'interest' => "Culinary",
                        'country' => "Malaysia",
                        'photo' => "images/1/profpic/photo-min.png",
                        'description' => "Lane Rahmat is a Certified Public Accounting Staff at Kraukman Inc., developing the kind of leaders people want - and really need. We disrupt business (in a good way) through a science-based framework that is changing business in Calgary, Canada.",
                        'reputation' => "3"),
                array('id' => "5",
                        'name' => "Louis Gomez",
                        'position' => "Accounting Staff",
                        'organization' => "Kraukman Inc.",
                        'interest' => "Sports, Exercises",
                        'country' => "Brasil",
                        'photo' => null,
                        'description' => "Louis Gomez is a Certified Public Accounting Staff at Kraukman Inc., developing the kind of leaders people want - and really need. We disrupt business (in a good way) through a science-based framework that is changing business in Calgary, Canada.",
                        'reputation' => "3"),
                array('id' => "6",
                        'name' => "Levi Lawrence",
                        'position' => "Accounting Staff",
                        'organization' => "Kraukman Inc.",
                        'interest' => "finance, Leadership",
                        'country' => "Great Britain",
                        'photo' => "images/1/profpic/photo-min.png",
                        'description' => "Levi Lawrence is a Certified Public Accounting Staff at Kraukman Inc., developing the kind of leaders people want - and really need. We disrupt business (in a good way) through a science-based framework that is changing business in Calgary, Canada.",
                        'reputation' => "3"),
                array('id' => "7",
                        'name' => "Levi Gomez",
                        'position' => "Accounting Staff",
                        'organization' => "Kraukman Inc.",
                        'interest' => "Productivity",
                        'country' => "Singapore",
                        'photo' => null,
                        'description' => "Levi Gomez is a Certified Public Accounting Staff at Kraukman Inc., developing the kind of leaders people want - and really need. We disrupt business (in a good way) through a science-based framework that is changing business in Calgary, Canada.",
                        'reputation' => "3"),
                array('id' => "8",
                        'name' => "Lara Kunis",
                        'position' => "Accounting Staff",
                        'organization' => "Kraukman Inc.",
                        'interest' => "Leadership",
                        'country' => "Singapore",
                        'photo' => "images/1/profpic/photo-min.png",
                        'description' => "Lara Kunis is a Certified Public Accounting Staff at Kraukman Inc., developing the kind of leaders people want - and really need. We disrupt business (in a good way) through a science-based framework that is changing business in Calgary, Canada.",
                        'reputation' => "3"),
                array('id' => "9",
                        'name' => "Lawrence Sakinova",
                        'position' => "Accounting Staff",
                        'organization' => "Kraukman Inc.",
                        'interest' => "Marketing, Team Building",
                        'country' => "Russia",
                        'photo' => "images/1/profpic/photo-min.png",
                        'description' => "Lawrence Sakinova is a Certified Public Accounting Staff at Kraukman Inc., developing the kind of leaders people want - and really need. We disrupt business (in a good way) through a science-based framework that is changing business in Calgary, Canada.",
                        'reputation' => "3"),
                array('id' => "10",
                        'name' => "Louis Clark",
                        'position' => "Accounting Staff",
                        'organization' => "Kraukman Inc.",
                        'interest' => "Marketing, Team Building",
                        'country' => "United States of America",
                        'photo' => null,
                        'description' => "Louis Clark is a Certified Public Accounting Staff at Kraukman Inc., developing the kind of leaders people want - and really need. We disrupt business (in a good way) through a science-based framework that is changing business in Calgary, Canada.",
                        'reputation' => "3"),

                // Duplicate entry, just to populate the data

                array('id' => "11",
                        'name' => "Bob Nielson",
                        'position' => "Accounting Staff",
                        'organization' => "Kraukman Inc.",
                        'interest' => "Leadership, Neuroscience",
                        'country' => "Singapore",
                        'photo' => "images/1/profpic/photo-min.png",
                        'description' => "Bob Nilson is a Certified Public Accounting Staff at Kraukman Inc., developing the kind of leaders people want - and really need. We disrupt business (in a good way) through a science-based framework that is changing business in Calgary, Canada.",
                        'reputation' => "3"),
                array('id' => "12",
                        'name' => "Lincoln Kyllonnen",
                        'position' => "Accounting Staff",
                        'organization' => "Kraukman Inc.",
                        'interest' => "Leadership, Development",
                        'country' => "Ireland",
                        'photo' => null,
                        'description' => "Lincoln Kyllonen is a Certified Public Accounting Staff at Kraukman Inc., developing the kind of leaders people want - and really need. We disrupt business (in a good way) through a science-based framework that is changing business in Calgary, Canada.",
                        'reputation' => "3"),
                array('id' => "13",
                        'name' => "Leny Lau",
                        'position' => "Accounting Staff",
                        'organization' => "Kraukman Inc.",
                        'interest' => "Science, Business",
                        'country' => "Malaysia",
                        'photo' => "images/1/profpic/photo-min.png",
                        'description' => "Lenny Lau is a Certified Public Accounting Staff at Kraukman Inc., developing the kind of leaders people want - and really need. We disrupt business (in a good way) through a science-based framework that is changing business in Calgary, Canada.",
                        'reputation' => "3"),
                array('id' => "14",
                        'name' => "Jane Rahmat",
                        'position' => "Accounting Staff",
                        'organization' => "Kraukman Inc.",
                        'interest' => "Culinary",
                        'country' => "Malaysia",
                        'photo' => "images/1/profpic/photo-min.png",
                        'description' => "Lane Rahmat is a Certified Public Accounting Staff at Kraukman Inc., developing the kind of leaders people want - and really need. We disrupt business (in a good way) through a science-based framework that is changing business in Calgary, Canada.",
                        'reputation' => "3"),
                array('id' => "15",
                        'name' => "Louise Gomez",
                        'position' => "Accounting Staff",
                        'organization' => "Kraukman Inc.",
                        'interest' => "Sports, Exercises",
                        'country' => "Brasil",
                        'photo' => "images/1/profpic/photo-min.png",
                        'description' => "Louis Gomez is a Certified Public Accounting Staff at Kraukman Inc., developing the kind of leaders people want - and really need. We disrupt business (in a good way) through a science-based framework that is changing business in Calgary, Canada.",
                        'reputation' => "3"),
                array('id' => "16",
                        'name' => "Revi Lawrence",
                        'position' => "Accounting Staff",
                        'organization' => "Kraukman Inc.",
                        'interest' => "finance, Leadership",
                        'country' => "Great Britain",
                        'photo' => "images/1/profpic/photo-min.png",
                        'description' => "Levi Lawrence is a Certified Public Accounting Staff at Kraukman Inc., developing the kind of leaders people want - and really need. We disrupt business (in a good way) through a science-based framework that is changing business in Calgary, Canada.",
                        'reputation' => "3"),
                array('id' => "17",
                        'name' => "Leni Gomez",
                        'position' => "Accounting Staff",
                        'organization' => "Kraukman Inc.",
                        'interest' => "Productivity",
                        'country' => "Singapore",
                        'photo' => null,
                        'description' => "Levi Gomez is a Certified Public Accounting Staff at Kraukman Inc., developing the kind of leaders people want - and really need. We disrupt business (in a good way) through a science-based framework that is changing business in Calgary, Canada.",
                        'reputation' => "3"),
                array('id' => "18",
                        'name' => "Lara Kuniss",
                        'position' => "Accounting Staff",
                        'organization' => "Kraukman Inc.",
                        'interest' => "Leadership",
                        'country' => "Singapore",
                        'photo' => "images/1/profpic/photo-min.png",
                        'description' => "Lara Kunis is a Certified Public Accounting Staff at Kraukman Inc., developing the kind of leaders people want - and really need. We disrupt business (in a good way) through a science-based framework that is changing business in Calgary, Canada.",
                        'reputation' => "3"),
                array('id' => "19",
                        'name' => "Lawrence Sakinovic",
                        'position' => "Accounting Staff",
                        'organization' => "Kraukman Inc.",
                        'interest' => "Marketing, Team Building",
                        'country' => "Russia",
                        'photo' => null,
                        'description' => "Lawrence Sakinova is a Certified Public Accounting Staff at Kraukman Inc., developing the kind of leaders people want - and really need. We disrupt business (in a good way) through a science-based framework that is changing business in Calgary, Canada.",
                        'reputation' => "3"),
                array('id' => "20",
                        'name' => "Louis Clarkson",
                        'position' => "Accounting Staff",
                        'organization' => "Kraukman Inc.",
                        'interest' => "Marketing, Team Building",
                        'country' => "United States of America",
                        'photo' => "images/1/profpic/photo-min.png",
                        'description' => "Louis Clark is a Certified Public Accounting Staff at Kraukman Inc., developing the kind of leaders people want - and really need. We disrupt business (in a good way) through a science-based framework that is changing business in Calgary, Canada.",
                        'reputation' => "3")
                );
            
            // Assign people
            $search_input = Input::get('searchfriends', '');
            $search_result = array();
            if (strlen($search_input) > 0) 
            {   # Search people
                foreach ($all_users as $us) 
                {   # iterate people
                    if ((strpos(strtolower($us['name']), strtolower($search_input)) !== false) || strpos(strtolower($us['id']), strtolower($search_input)) !== false) 
                    {   # person name or id contains the search_input
                        array_push($search_result, $us);
                    }
                }
                // Remove duplicates
                $search_result = array_unique($search_result, SORT_REGULAR);
            } else {
                $search_result = $all_users;
            }
            

            $connections = array($all_users[0],$all_users[1],$all_users[2],$all_users[3],$all_users[4],$all_users[5]);
            $friend_suggestions = array($all_users[3],$all_users[1],$all_users[5],$all_users[4],$all_users[0],
                                        $all_users[12],$all_users[10],$all_users[14],$all_users[3],$all_users[9]);

        }
        return view('header')->withTitle('LAD Global | Network Page').
                    view('network', ['search_input' => $search_input,
                                        'connections' => $connections,
                                        'search_result' => $search_result,
                                        'friend_suggestions' => $friend_suggestions]).
                    view('footer');
    }

    public function getUser($email) {
        return json_encode(DB::table('users')->where('email',$email)->get());
    }

    /**
    *
    * Used to delete the user account
    *
    */
    public function deleteAccount() {
        $userid = Session::get('LAD_user_id');

        $deleteusers = DB::table('users')->where('id',$userid)->delete();

        $deletecourses = DB::table('courses')->where('created_by',$userid)->delete();

        $deletecustomizedcourses = DB::table('course_requests')->where('requester_id',$userid)->delete();

        $deleteproposals = DB::table('course_proposals')->where('user_id',$userid)->delete();

        $deletetransactions = DB::table('transactions')->where('user_id',$userid)->delete();

        $deletetransactioncarts = DB::table('transaction_carts')->where('user_id',$userid)->delete();

        $deleteusercourses = DB::table('user_courses')->where('user_id',$userid)->delete();

        $deletewishlists = DB::table('user_wishlists')->where('user_id',$userid)->delete();

        // return redirect()->action('AuthController@logout');

        $output = array(
            'info' => 'success',
            'message' => 'Your request could not be processed. Please try again later.',
            'code' => '0' 
            );
        
        return json_encode($output);
    }
    /**
    *
    * View enrolled users
    */
    // public function viewEnrolledUser(){
    //     $userid = Session::get('LAD_user_id');
    //     return DB::select("");
    // }
}
