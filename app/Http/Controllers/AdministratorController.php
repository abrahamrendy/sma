<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\uploadedFile;
use App\UsersModel;
use Session;

class AdministratorController extends Controller
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
    *
    * This function is used to display the course manager page
    *
    */
    public function coursemanager() {
        $header_loggedin = true;
        $userid = Session::get('LAD_user_id');
        $users = UsersModel::where('id',$userid)
                                ->first();

        if ($users->type == 3) {
            $courses = $this->getCourses(0,9,0,2);
            $enrolled_courses = array();
        } else {
            $courses = $this->getAllCurrentCourses($userid);
            $enrolled_courses = $this->getAllEnrollCurrentCourses($userid);
        }

        $courses_categories = DB::table('courses_categories')
                                ->where('name', '!=', 'FEATURED')
                                ->orderBy('priority', 'desc')
                                ->orderBy('name', 'asc')
                                ->get();

        $currencies = DB::table('currencies')->orderBy('name','asc')->get();

        if ($users->type == 3 || $users->type == 1 || ($users->type == 2 && $users->role == 2)) {
            return view('header', ['header_loggedin' => $header_loggedin])->withTitle('LAD Global | Dashboard').view('dashboard/dashboard-sidebar',['users' => $users]).view('dashboard/coursemanager', ['users' => $users, 'courses' => $courses, 'enrolled_courses' => $enrolled_courses ,'courses_categories' => $courses_categories, 'currencies' => $currencies]).view('footer');
        } else {
            return abort(404);
        }
    }
    /**
    *
    * Display the course request manager page
    *
    */
    public function courserequestmanager() {
        $header_loggedin = true;
        $userid = Session::get('LAD_user_id');
        $users = UsersModel::where('id',$userid)
                                ->first();

        if ($users->type == 3) {
            $courses = $this->getAllCustomizedCourses();
        } else {
            // $courses = $this->getAllCurrentCourses($userid);
        }

        $courses_categories = DB::table('courses_categories')
                                ->where('name', '!=', 'FEATURED')
                                ->orderBy('priority', 'desc')
                                ->orderBy('name', 'asc')
                                ->get();

        if ($users->type == 3) {
            return view('header', ['header_loggedin' => $header_loggedin])->withTitle('LAD Global | Dashboard').view('dashboard/dashboard-sidebar',['users' => $users]).view('dashboard/courserequestmanager', ['users' => $users, 'courses' => $courses, 'courses_categories' => $courses_categories]).view('footer');
        } else {
            return abort(404);
        }
    }
    /**
    *
    * This function returns a list of courses
    *
    * @param int $offset The pointer of the page
    * @param int $limit The limit of the page
    * @param int $ispostcourse The status of post course
    * @param int $type The type of the course (online or offline)
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
        $output = DB::select("SELECT allcourse.*, GROUP_CONCAT(users.id SEPARATOR ';') as users_id, GROUP_CONCAT(enrolled.id SEPARATOR ';') as enroller_id, GROUP_CONCAT(users.name SEPARATOR ';') as enroller, GROUP_CONCAT(IFNULL(users.email, '') SEPARATOR ';') as enroller_email, GROUP_CONCAT(IFNULL(users.organization, '') SEPARATOR ';') as enroller_organization, GROUP_CONCAT(users.country SEPARATOR ';') as enroller_country, GROUP_CONCAT(IFNULL(users.corporate_phone_number, '') SEPARATOR ';') as enroller_phone, GROUP_CONCAT(IFNULL(user_occupations.name, '') SEPARATOR ';') as enroller_occupation
                            FROM
                            -- GROUP_CONCAT(CONCAT(IF(users.title is null,'',CONCAT(users.title,'. ')),users.name) SEPARATOR ', ')
                                (SELECT users.organization as courselecturer, coursejoined.*
                                FROM
                                    (SELECT lecturers.user_id,
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
                                                courses.sfc,
                                                courses.status,
                                                currencies.id as currency_id,
                                                currencies.name as currency,
                                                currencies.symbol as currencysymbol
                                        FROM courses 
                                        LEFT JOIN currencies ON courses.currency_id = currencies.id
                                        WHERE courses.status != 2
                                        ) AS coursestable
                                    LEFT JOIN (SELECT * FROM user_courses WHERE TYPE=1) AS lecturers ON lecturers.`course_id` = coursestable.course_id) AS coursejoined
                                LEFT JOIN users ON coursejoined.user_id=users.`id`
                                GROUP BY coursejoined.course_id
                                ) as allcourse 
                            LEFT JOIN (SELECT * FROM user_courses where TYPE = 0) as enrolled
                            ON enrolled.course_id = allcourse.course_id
                            LEFT JOIN users ON enrolled.user_id = users.id
                            LEFT JOIN user_occupations on users.occupation = user_occupations.id
                            GROUP BY allcourse.course_id
                            ORDER BY allcourse.course_id DESC", [$offset, $limit]);
        // check isfeatured
        foreach ($output as $co) {
            $co->isfeatured = 0;
            if (isset($co->category) && (strlen($co->category)) > 0) 
            {   # Category is set
                $co_category_split = explode(",",$co->category);
                foreach ($co_category_split as $ccs) {
                    if ($ccs == 1) 
                    {   # "Featured" is found in course category
                        $co->isfeatured=1;
                        break;
                    }
                }
            }
        }
        return $output;
    }
    /**
    *
    * Get all current courses 
    *
    * @param int $user_id The user id of this user
    */
    public function getAllCurrentCourses($user_id) {
  
        $output = DB::select("SELECT allcourse.*,  GROUP_CONCAT(users.id SEPARATOR ';') as users_id, GROUP_CONCAT(enrolled.id SEPARATOR ';') as enroller_id, GROUP_CONCAT(users.name SEPARATOR ';') as enroller, GROUP_CONCAT(IFNULL(users.email, '') SEPARATOR ';') as enroller_email, GROUP_CONCAT(IFNULL(users.organization, '') SEPARATOR ';') as enroller_organization, GROUP_CONCAT(users.country SEPARATOR ';') as enroller_country, GROUP_CONCAT(IFNULL(users.corporate_phone_number, '') SEPARATOR ';') as enroller_phone, GROUP_CONCAT(IFNULL(user_occupations.name, '') SEPARATOR ';') as enroller_occupation
                            FROM
                                -- GROUP_CONCAT(CONCAT(IF(users.title is null,'',CONCAT(users.title,'. ')),users.name) SEPARATOR ', ') as courselecturer
                                (SELECT users.organization as courselecturer, coursejoined.*
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
                                                    courses.sfc,
                                                    courses.status,
                                                    currencies.id as currency_id,
                                                    currencies.name as currency,
                                                    currencies.symbol as currencysymbol
                                            FROM courses 
                                            LEFT JOIN currencies ON courses.currency_id = currencies.id
                                            WHERE courses.status != 2 ) AS coursestable
                                        LEFT JOIN (SELECT * FROM user_courses WHERE TYPE=1) AS lecturers ON lecturers.`course_id` = coursestable.course_id) AS coursejoined
                                    LEFT JOIN users ON coursejoined.user_id=users.`id`
                                    WHERE user_id = ?
                                    GROUP BY coursejoined.course_id) as allcourse
                                    LEFT JOIN (SELECT * FROM user_courses where TYPE = 0) as enrolled
                                    ON enrolled.course_id = allcourse.course_id
                                    LEFT JOIN users ON enrolled.user_id = users.id
                                    LEFT JOIN user_occupations on users.occupation = user_occupations.id
                                    GROUP BY allcourse.course_id
                                    ORDER BY allcourse.course_id DESC",[$user_id]);
        // check isfeatured
        foreach ($output as $co) {
            $co->isfeatured = 0;
            if (isset($co->category) && (strlen($co->category)) > 0) 
            {   # Category is set
                $co_category_split = explode(",",$co->category);
                foreach ($co_category_split as $ccs) {
                    if ($ccs == 1) 
                    {   # "Featured" is found in course category
                        $co->isfeatured=1;
                        break;
                    }
                }
            }
        }
        return $output;
    }


    /**
    *
    * Get all current enrolled courses 
    *
    * @param int $user_id The user id of this user
    */
    public function getAllEnrollCurrentCourses($user_id) {

        $output = DB::select("  SELECT enrolled_table.*, courses.title, users.organization as courselecturer, courses.coursecode, courses.type, courses.status
                                FROM
                                    (SELECT transaction_carts.course_id as course_id, enrolled.course_id as enrolled_course_id, GROUP_CONCAT(users.id SEPARATOR ';') as users_id, GROUP_CONCAT(users.name SEPARATOR ';') as enroller, GROUP_CONCAT(IFNULL(users.email, '') SEPARATOR ';') as enroller_email, GROUP_CONCAT(IFNULL(users.organization, '') SEPARATOR ';') as enroller_organization, GROUP_CONCAT(enrolled.id SEPARATOR ';') as enroller_id, GROUP_CONCAT(users.country SEPARATOR ';') as enroller_country, GROUP_CONCAT(IFNULL(users.corporate_phone_number, '') SEPARATOR ';') as enroller_phone, GROUP_CONCAT(IFNULL(user_occupations.name, '') SEPARATOR ';') as enroller_occupation
                                    FROM transaction_carts 
                                    LEFT JOIN users on participant = users.id
                                    LEFT JOIN user_occupations on users.occupation = user_occupations.id
                                    LEFT JOIN (select * from user_courses WHERE type = 0) as enrolled on enrolled.user_id = participant and enrolled.course_id = transaction_carts.course_id
                                    WHERE transaction_carts.user_id = ? AND participant != 0 AND transaction_carts.status != 2
                                    GROUP BY transaction_carts.course_id) as enrolled_table
                                LEFT JOIN courses on enrolled_table.course_id = courses.id
                                LEFT JOIN (SELECT * FROM user_courses WHERE type = 1) as lecturer on lecturer. course_id = courses.id
                                LEFT JOIN users on lecturer.user_id = users.id",[$user_id]);

  
        // $output = DB::select("SELECT allcourse.*,  GROUP_CONCAT(users.id SEPARATOR ';') as users_id, GROUP_CONCAT(enrolled.id SEPARATOR ';') as enroller_id, GROUP_CONCAT(users.name SEPARATOR ';') as enroller, GROUP_CONCAT(IFNULL(users.email, '') SEPARATOR ';') as enroller_email, GROUP_CONCAT(IFNULL(users.organization, '') SEPARATOR ';') as enroller_organization, GROUP_CONCAT(users.country SEPARATOR ';') as enroller_country, GROUP_CONCAT(IFNULL(users.corporate_phone_number, '') SEPARATOR ';') as enroller_phone, GROUP_CONCAT(IFNULL(user_occupations.name, '') SEPARATOR ';') as enroller_occupation
        //                     FROM
        //                         -- GROUP_CONCAT(CONCAT(IF(users.title is null,'',CONCAT(users.title,'. ')),users.name) SEPARATOR ', ') as courselecturer
        //                         (SELECT users.organization as courselecturer, coursejoined.*
        //                             FROM
        //                                 (SELECT lecturers.user_id, lecturers.progress,
        //                                         coursestable.*
        //                                 FROM
        //                                     (SELECT courses.id AS course_id,
        //                                             courses.coursecode,
        //                                             courses.title,
        //                                             courses.category,
        //                                             courses.price,
        //                                             courses.image,
        //                                             courses.overview,
        //                                             courses.info,
        //                                             courses.level,
        //                                             courses.rating,
        //                                             courses.subscription,
        //                                             courses.start_date,
        //                                             courses.end_date,
        //                                             courses.approved_time,
        //                                             courses.type,
        //                                             courses.sfc,
        //                                             courses.status,
        //                                             currencies.id as currency_id,
        //                                             currencies.name as currency,
        //                                             currencies.symbol as currencysymbol
        //                                     FROM courses 
        //                                     LEFT JOIN currencies ON courses.currency_id = currencies.id
        //                                     WHERE courses.status != 2 ) AS coursestable
        //                                 LEFT JOIN (SELECT * FROM user_courses WHERE TYPE=0) AS lecturers ON lecturers.`course_id` = coursestable.course_id) AS coursejoined
        //                             LEFT JOIN users ON coursejoined.user_id=users.`id`
        //                             WHERE user_id = ?
        //                             GROUP BY coursejoined.course_id) as allcourse
        //                             LEFT JOIN (SELECT * FROM user_courses where TYPE = 0) as enrolled
        //                             ON enrolled.course_id = allcourse.course_id
        //                             LEFT JOIN users ON enrolled.user_id = users.id
        //                             LEFT JOIN user_occupations on users.occupation = user_occupations.id
        //                             GROUP BY allcourse.course_id
        //                             ORDER BY allcourse.course_id DESC",[$user_id]);
        // // check isfeatured
        // foreach ($output as $co) {
        //     $co->isfeatured = 0;
        //     if (isset($co->category) && (strlen($co->category)) > 0) 
        //     {   # Category is set
        //         $co_category_split = explode(",",$co->category);
        //         foreach ($co_category_split as $ccs) {
        //             if ($ccs == 1) 
        //             {   # "Featured" is found in course category
        //                 $co->isfeatured=1;
        //                 break;
        //             }
        //         }
        //     }
        // }
        return $output;
    }
    /**
    *
    * Get all customized courses
    *
    */
    public function getAllCustomizedCourses () {
        $output = DB::select("  SELECT course_requests.*, users.name as requester
                                FROM `course_requests` 
                                LEFT JOIN users 
                                ON course_requests.requester_id = users.id
                                ORDER BY course_requests.id DESC");
        return $output;
    }   
    /**
    *
    * Handle the edit course process
    *
    * @param Request $request the request from ajax
    */
    public function editCourse (Request $request) {
        $updates = array();

        $cid = strip_tags($request->input('cid'));
        $title = strip_tags($request->input('adm-title'));
        $code = strip_tags($request->input('adm-code'));
        $price = strip_tags($request->input('adm-price'));
        $type = strip_tags($request->input('adm-type'));
        $status = strip_tags($request->input('adm-status'));
        $organization = strip_tags($request->input('adm-lecturer'));
        $overview = $request->input('adm-overview');
        $category = strip_tags($request->input('adm-category'));
        $is_featured = strip_tags($request->input('is_featured'));
        $addinfo = $request->input('adm-info');
        $topics = $request->input('adm-topics');
        $currency = strip_tags($request->input('adm-currency'));
        $is_sfc = strip_tags($request->input('is_sfc'));

        $created_by = Session::get("LAD_user_id");
        $created_time = date("Y-m-d H:i:s");

        //get course from DB
        $course = DB::table('courses')
                                ->where('id',$cid)
                                ->first();

        if ($type != 1) {
            $start = strip_tags($request->input('adm-start'));
            $end = strip_tags($request->input('adm-end'));
            $split_start = explode('-', $start);
            $split_end = explode('-', $end);
            $updates['start_date'] = date("Y-m-d 00:00:00", strtotime($start));
            $updates['end_date'] = date("Y-m-d 23:59:59", strtotime($end));
        }


        $course_modules = json_decode($this->getModules($cid));

        $output = array(
            'info' => 'error',
            'message' => 'Your request could not be processed. Please try again later.',
            'code' => 'x' 
            );

        // if ($course->coursecode == $code) {

        $updates['title'] = $title;
        $updates['price'] = $price;
        $updates['currency_id'] = $currency;
        $updates['info'] = $addinfo;
        $updates['type'] = $type;
        $isSendEmailCompleted = false;
        if ($status != '' && $course->status != $status) {
            $updates['status'] = $status;
            if ($status == 3) {
                $isSendEmailCompleted = true;
            }
        }
        $updates['overview'] = $overview;
        if ($request->hasFile('cover')){
            $s3 = Storage::disk('s3');
            $photoName = time().'.'.$request->cover->getClientOriginalExtension();
            $path = $request->cover->storeAs('course/'.$cid, $photoName, 's3');
            // $s3->put('images/'.$userid.'/profpic', $photoName, 'public');
            $s3->setVisibility($path,'public');
            $updates['image'] = $path;
            $updates['detail_image'] = $path;
        }

        if ($is_sfc && ($is_sfc == "on")) 
        {
            $updates['sfc'] = 1;
        } else {
            $updates['sfc'] = 0;
        }

        if ($is_featured && ($is_featured == "on")) 
        {   # is_featured is set
            if (isset($course->category) && (strlen($course->category) > 0)) 
            {   # category is not empty
                $category_array = explode(",", $course->category);
                $featured_found = false;
                foreach ($category_array as $ca) {
                    if ($ca == 1) 
                    {   # featured found
                        $featured_found = true;
                        break;
                    }
                }
                if ($featured_found) 
                {   # Already Featured
                    // do nothing
                }
                else
                {   # Append featured
                    $updates['category'] = $course->category.",1";
                }
            }
            else
            {   # Category is empty
                $updates['category'] = "1";
            }
        } 
        else 
        {   # is_featured is not set
            if (isset($course->category) && (strlen($course->category) > 0)) 
            {   # category is not empty
                $category_array = explode(",", $course->category);
                $new_category_string = "";
                foreach ($category_array as $ca) {
                    if ($ca == 1) 
                    {   # featured found
                        // do nothing
                    } else {
                        $new_category_string .= $ca.",";
                    }
                }
                // Remove the last comma
                $updates['category'] = substr($new_category_string, 0, (strlen($new_category_string)-1));
            }
            else
            {   # Category is empty
                // do nothing
            }
        }

        $new_cat = '';
        $split_cat = explode(',', $course->category);
        if (!in_array($category, $split_cat)) {
            $new_cat = $category;
            $temp = explode(',', $updates['category']);
            $temparray = array();
            if (in_array(1, $temp)) {
                $updates['category'] = $category.',1';
            } else {
                $updates['category'] = $category;
            }
        }

        $output = array(
            'info' => 'error',
            'message' => 'Your request could not be processed. Please try again later.',
            'trace' => $updates,
            'code' => 'x' 
            );
        if ($updates != null) {
            $update = DB::table('courses')
                                ->where('id',$cid)
                                ->update($updates);

            //PROCESS MODULES
            if ($type == '0' && $topics != '' && $topics != null && ($course_modules[0]->module_title != $topics)) {
                $delete = DB::table('modules')
                                -> where('course_id',$cid)
                                -> delete();
                $topics_arr = explode(';', $topics);
                $ct = 1;
                foreach ($topics_arr as $data) {
                    $id_modules = DB::table('modules')->insertGetId(
                        [
                            'course_id' => $cid, 
                            'title' => $data,
                            'module_number' => $ct,
                            'created_by' => $created_by,
                            'created_time' => $created_time,
                            'status' => 1
                        ]
                    );
                    $ct++;
                }
            } else if ($type == '0' && $topics == '' && (count($course_modules) > 0)) {
                $delete = DB::table('modules')
                                -> where('course_id',$cid)
                                -> delete();
            }

            if ($update != 0) {
                if ($isSendEmailCompleted) {
                    if ($type != 1) {
                        $this->sendEmailCompleted($updates['title'],$organization,date('d-m-Y'));
                    } else {
                        $this->sendEmailCompleted($updates['title'],$organization,date('d-m-Y'));
                    }
                }
                
                $output['info'] = 'success';
                $output['message'] = 'Course has been successfully edited.';
                $output['code'] = '0';
            } else {
                $output['info'] = 'success';
                $output['message'] = 'No change in course.';
                $output['code'] = '0';
            }
        }
        // }
        
        return json_encode($output);
    }

    public function sendEmailCompleted($title,$organization,$end_date) {
        //Sending email to course creator and LAD global admin//
        // $user = DB::table('users')->where('email',$email)->first();
        $subject = 'LAD Global | Course Enrolled Report';
        $message = '<html>
                        <head>
                            <title>LAD Global | Course Enrolled</title>
                        </head>
                        <body>
                            <table width=700px style="background-color:#f3f3f3; padding:20px 20px">
                                <tr>
                                    <td>
                                        <table width=100% style="background-color: #ffffff; padding:30px 30px">
                                            <tr>
                                                <td>
                                                    <div style="display: inline-block;width: 100%">
                                                        <img src="http://ladglobal.com/img/logo-min.png" align="right" width="190px">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr><td><br>
                                            <tr><td><br>
                                            <tr>
                                                <td>
                                                    <p>
                                                    <h2 style="font-family: sans-serif; color:#666666; word-break: break-word;">The course '.$title.' by '.$organization.' ended on '.$end_date.'. </h2><br>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr><td><br>
                                            <tr><td><br>
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
        //End of send email//
        return mail("info@ladglobal.com", $subject, $message, implode("\r\n", $headers));                                                                              
    }  

    public function getCourseOverview ($code){
        $output = DB::select("  SELECT overview, info
                                FROM courses
                                WHERE coursecode = ?",[$code]);
        return json_encode($output);
    }
    /**
    *
    * This function is used to get the module
    *
    * @param int $cid The course id of this course
    */
    public function getModules($cid) {
        return json_encode(DB::select("SELECT GROUP_CONCAT(title SEPARATOR ';') as module_title FROM `modules` WHERE course_id = $cid"));
    }
    /**
    *
    * Edit the user status
    * @param Request $request the request from ajax
    */
    public function editStatusUser (Request $request) {
        $uid = strip_tags($request->input('id'));
        $web_url = strip_tags($request->input('adm-web-url'));
        $user_desc = strip_tags($request->input('adm-user-desc'));
        $status = strip_tags($request->input('adm-status'));
        $credits = strip_tags($request->input('adm-course-credits'));
        $proposal_credits = strip_tags($request->input('adm-proposal-credits'));

        $updates = array();

        //get user from DB
        $user = DB::table('users')
                                ->where('id',$uid)
                                ->first();

        $output = array(
            'info' => 'error',
            'message' => 'Your request could not be processed. Please try again later.',
            'code' => 'x' 
            );

        // if ($course->coursecode == $code) {

        $updates['user_desc'] = $user_desc;
        $updates['web_url'] = $web_url;
        $updates['status'] = $status;
        if ($credits >= $user->course_credits) {
            $updates['course_credits'] = $credits;
        }
        if ($proposal_credits >= $user->proposal_credits) {
            $updates['proposal_credits'] = $proposal_credits;
        }

        if ($updates != null) {
            $update = DB::table('users')
                                ->where('id',$uid)
                                ->update($updates);
            if ($update != 0) {
                $output['info'] = 'success';
                $output['message'] = 'User has been successfully edited.';
                $output['code'] = '0';
            }
        }
        // }
        
        return json_encode($output);
    }
    /**
    *
    * Action for delete course 
    *
    * @param Request $request the request from ajax
    */
    public function deleteCourse (Request $request) {
        $cid = strip_tags($request->input('cid'));

        $updates = array();

        $output = array(
            'info' => 'error',
            'message' => 'Your request could not be processed. Please try again later.',
            'code' => 'x' 
            );
        // if ($course->coursecode == $code) {
        $updates['status'] = 2;

        if ($updates != null) {
            $update = DB::table('courses')
                                ->where('id',$cid)
                                ->update($updates);
            if ($update != 0) {
                $output['info'] = 'success';
                $output['message'] = 'Course has been successfully deleted.';
                $output['code'] = '0';
            }
        }    
        return json_encode($output);
    }
    /**
    *
    * Delete the customized course
    *
    * @param Request $request the request from ajax
    */
    public function deleteCustomizedCourse ($cid, $title) {

        $course = DB::table('course_requests')->where('id',$cid)->first();
        $output = array(
                'info' => 'error',
                'message' => 'Your request could not be processed. Please try again later.',
                'code' => 'x' 
                );

        if ($course->description == $title) {

            $deletecourserequest = DB::table('course_requests')->where('id',$cid)->delete();

            $deletecourseproposal = DB::table('course_proposals')->where('course_request_id',$cid)->delete();

            $output = array(
                'info' => 'success',
                'message' => 'Your request could not be processed. Please try again later.',
                'code' => '0' 
                );
        }
        
        return json_encode($output);
    }

    /**
    *
    * Remove enrolled user in course
    *
    *  @param int $uid The id of the user_courses table
    *  @param int $cid The course id of course enrolled by this user
    */
    public function removeEnrolledUser ($uid, $cid) {
        $output = array(
                'info' => 'error',
                'message' => 'Your request could not be processed. Please try again later.',
                'code' => 'x' 
                );

        $updates['type'] = 2;
        $updatesTransaction['status'] = 2;

        if ($updates != null) {
            $update = DB::table('user_courses')
                                ->where('id',$uid)
                                ->where('type',0)
                                ->where('course_id',$cid)
                                ->update($updates);
            $user_courses = DB::table('user_courses')
                                ->where('id',$uid)
                                ->where('course_id',$cid)
                                ->first();
            $updateTransaction = DB::table('transaction_carts')
                                        ->where('course_id',$cid)
                                        ->where('participant',$user_courses->user_id)
                                        ->update($updatesTransaction);
            if ($update != 0) {
                $output['info'] = 'success';
                $output['message'] = 'User has been successfully deleted.';
                $output['code'] = '0';
            }
        }

        return json_encode($output);
    }
}
