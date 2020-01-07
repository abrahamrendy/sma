<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\UsersModel;
use App\User;
use Session;
use Validator;


class CourseController extends Controller
{
    private $perpage = 10;
    /**
    * This array is store banner data for slider in browse course page
    */
    private $browse_banner = array(
        array('href' => '/searchcourses?search=management',
                'img' => '/img/slider/browsecourses1-min.png',
                'title' => "How To Manage Budget Successfully"),
        array('href' => '/searchcourses?search=management',
                'img' => '/img/slider/browsecourses2-min.png',
                'title' => "Science of today is the technology of tomorrow"),
        array('href' => '/searchcourses?search=coaching',
                'img' => '/img/slider/browsecourses3-min.png',
                'title' => "Be The Best Coach"),
        array('href' => '/searchcourses?search=management',
                'img' => '/img/slider/browsecourses4-min.png',
                'title' => "Train like a beast look like a beauty"),
        );


    public function __construct()
    {
        parent::__construct();
        // $this->middleware('guest');
    }

    /** 
    *
    *Sorting all courses by country 
    *
    *@param String $country The country of the course
    *@param String $cat The category of the course
    */
    public function sort_by_country($country,$cat){
        $find_in_set = "";
        if ($cat != 'a') {
            $find_in_set = "(find_in_set(".$cat.", category) <> 0) AND ";
        }
        $country_filter = "";
        if ($country != 'all') {
            $country_filter = "WHERE country = '".$country."' ";
        }
        // GROUP_CONCAT(CONCAT(IF(users.title is null,'',CONCAT(users.title,'. ')),users.name) SEPARATOR ', ')
        // IF(type=0,end_date>CURDATE(),1=1)
        $course_country = DB::select("SELECT users.organization as courselecturer,
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
                                                currencies.symbol
                                        FROM courses 
                                        INNER JOIN currencies on courses.currency_id = currencies.id
                                        WHERE (".$find_in_set."status=1 AND offline_progress<=25.00 AND IF(type=0,end_date>CURDATE(),1=1) ) ) AS coursestable
                                    LEFT JOIN (SELECT * FROM user_courses WHERE TYPE=1) AS lecturers ON lecturers.`course_id` = coursestable.course_id) AS coursejoined
                                LEFT JOIN users ON coursejoined.user_id=users.`id`
                                ".$country_filter."
                                GROUP BY coursejoined.course_id ORDER BY coursejoined.course_id DESC ", [$country]);
        return json_encode($course_country);
    }
    
    /**
    * display browse courses page
    */
    public function browse_all()
    {
        // GROUP_CONCAT(CONCAT(IF(users.title is null,'',CONCAT(users.title,'. ')),users.name) SEPARATOR ', ')
        $all_courses_data =DB::select("SELECT  users.organization as courselecturer,
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
                                                        currencies.symbol
                                                FROM courses 
                                                INNER JOIN currencies on courses.currency_id = currencies.id
                                                WHERE (status=1 AND offline_progress<=25.00 AND IF(type=0,end_date>CURDATE(),1=1) ) ) AS coursestable
                                            LEFT JOIN (SELECT * FROM user_courses WHERE TYPE=1) AS lecturers ON lecturers.`course_id` = coursestable.course_id) AS coursejoined
                                        LEFT JOIN users ON coursejoined.user_id=users.`id`
                                        GROUP BY coursejoined.course_id ORDER BY coursejoined.course_id DESC");
        //display option value on dropdown
        $courses_by_country =DB::select("SELECT DISTINCT country, c.title
                                            FROM users
                                            LEFT JOIN courses c ON users.id = c.created_by
                                            WHERE (c.status=1 AND c.offline_progress<=25.00 AND IF(c.type=0,c.end_date>CURDATE(),1=1) )
                                            GROUP BY country");
        $user_industries = DB::table('user_industries')
                                ->orderBy('priority', 'desc')
                                ->orderBy('name', 'asc')
                                ->get();
        $user_occupations = DB::table('user_occupations')
                                ->orderBy('priority', 'desc')
                                ->orderBy('name', 'asc')
                                ->get();
        $courses_categories = DB::table('courses_categories')
                                ->where('name', '!=', 'FEATURED')
                                ->orderBy('priority', 'desc')
                                ->orderBy('name', 'asc')
                                ->get();
        $categories_count = DB::table('courses_categories')->where('name', '!=', 'FEATURED')
                                                            ->count();
        $categories = array(1,2,3,4,5,6);   // default - 1 is reserved for FEATURED
        if ($categories_count > 0) 
        {   # Categories exist
            // Random 5 numbers
            $number_range = range(2, $categories_count);
            shuffle($number_range);
            $categories_head = array(1);
            $categories_randomized = array_slice($number_range, 0);
            $categories = array_merge($categories_head, $categories_randomized);
        }

        $data_by_category = array();
        $temp_data = array();
        foreach ($categories as $cat) 
        {   # find every category
            // if ($cat == 1) 
            // {   # Special algorithm: FEATURED courses
            //     // Based on rating, limit to 5 courses, start from random number
            //     $random_start = rand(0,5);
            //     $courses = DB::select("SELECT GROUP_CONCAT(CONCAT(IF(users.title is null,'',CONCAT(users.title,'. ')),users.name) SEPARATOR ', ') as courselecturer,
            //                                     coursejoined.*
            //                             FROM
            //                                 (SELECT lecturers.user_id,
            //                                         coursestable.*
            //                                 FROM
            //                                     (SELECT courses.id AS course_id,
            //                                             courses.coursecode,
            //                                             courses.title,
            //                                             courses.price,
            //                                             courses.image,
            //                                             courses.overview,
            //                                             courses.info,
            //                                             courses.level,
            //                                             courses.rating,
            //                                             courses.approved_time
            //                                     FROM courses 
            //                                     WHERE (status=1 AND offline_progress<=25.00 AND end_date>CURDATE() ) ) AS coursestable
            //                                 LEFT JOIN (SELECT * FROM user_courses WHERE TYPE=1) AS lecturers ON lecturers.`course_id` = coursestable.course_id) AS coursejoined
            //                             LEFT JOIN users ON coursejoined.user_id=users.`id`
            //                             GROUP BY coursejoined.course_id
            //                             ORDER BY coursejoined.rating DESC
            //                             LIMIT ?,5; ", [$random_start]);
            // }
            // else
            // {
                // GROUP_CONCAT(CONCAT(IF(users.title is null,'',CONCAT(users.title,'. ')),users.name) SEPARATOR ', ')
                $courses = DB::select("SELECT users.organization as courselecturer,
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
                                                        currencies.symbol
                                                FROM courses 
                                                INNER JOIN currencies on courses.currency_id = currencies.id
                                                WHERE ((find_in_set(?,category) <> 0) AND status=1 AND offline_progress<=25.00 AND IF(type=0,end_date>CURDATE(),1=1) ) ) AS coursestable
                                            LEFT JOIN (SELECT * FROM user_courses WHERE TYPE=1) AS lecturers ON lecturers.`course_id` = coursestable.course_id) AS coursejoined
                                        LEFT JOIN users ON coursejoined.user_id=users.`id`
                                        GROUP BY coursejoined.course_id ORDER BY coursejoined.course_id DESC ", [$cat]);

                


            if (count($courses) > 0) {
                if ($cat == 1) {
                    $data_by_category[$cat] = $courses;
                } else {
                    $temp_data[$cat] = $courses;
                }
            } else {
                if(($key = array_search($cat, $categories)) !== false) {
                    unset($categories[$key]);
                }
            }
        }

        arsort($temp_data);
        $new_categories = array(1);
        $coursescategories = DB::select("SELECT * FROM courses_categories
                                            WHERE id = 1");
        foreach ($temp_data as $key => $value) {
            $temp = DB::select("SELECT * FROM courses_categories
                                            WHERE id = $key");
            $coursescategories[] = $temp[0];
        }


        $data_by_category = array_merge($data_by_category,$temp_data);

        // $coursescategories_string = "(".implode(",", $new_categories).")";
        // $coursescategories = DB::select("SELECT * FROM courses_categories
        //                                     WHERE id in $coursescategories_string");

        return view('header', ['browsecoursesflag' => true,
                                'user_industries' => $user_industries,
                                'user_interests' => $courses_categories,
                                'user_occupations' => $user_occupations,
                                'courses_categories' => $courses_categories])->withTitle('LAD Global | Browse Courses').
                view('courses/all_courses', ['browse_banner' => $this->browse_banner,
                                             'coursescategories' => $coursescategories,
                                             'data_by_category'  => $data_by_category,
                                             'all_courses_data'  => $all_courses_data,
                                             'courses_by_country'=> $courses_by_country]).
                view('footer');
    }
    
    /**
    * The Search function
    * 
    * @return course or courses depends the keywords
    */
    public function search()
    {
        $user_industries = DB::table('user_industries')
                                ->orderBy('priority', 'desc')
                                ->orderBy('name', 'asc')
                                ->get();
        $user_occupations = DB::table('user_occupations')
                                ->orderBy('priority', 'desc')
                                ->orderBy('name', 'asc')
                                ->get();
        $courses_categories = DB::table('courses_categories')
                                ->where('name', '!=', 'FEATURED')
                                ->orderBy('priority', 'desc')
                                ->orderBy('name', 'asc')
                                ->get();

        $category = Input::get('search', '');
        $sort = Input::get('sort', 1); // 1 = bestmatch (Default), 2 = lowestprice, 3 = lowestlevel 
        $page = Input::get('page', 1);
        $promoted = Input::get('promoted');
        $totalcourse = 0;
        $pagination_total_page = 1;

        $courses = array();
        if ($category != '') 
        {   // Search 
            $category_clean = strip_tags($category);
            // Capture courses based on title and overview 
            // GROUP_CONCAT(CONCAT(IF(users.title is null,'',CONCAT(users.title,'. ')),users.name) SEPARATOR ', ')
            $title_overview = DB::select("SELECT users.organization as courselecturer,
                                                    course_final.*
                                            FROM
                                            (SELECT IFNULL(sum(modules.duration),0) as coursemodules_duration,
                                                    IFNULL(count(modules.id),0) as coursemodules_number,
                                                    IFNULL(course_levels.name, '') as courselevel_name,
                                                    IFNULL(course_levels.icon, '') as courselevel_icon,
                                                    coursejoined.*
                                            FROM
                                                (SELECT lecturers.user_id,
                                                        coursestable.*
                                                FROM
                                                    (SELECT courses.id AS course_id,                                                                            courses.coursecode,
                                                                courses.title,
                                                                courses.category,
                                                                courses.price,
                                                                courses.image,
                                                                courses.type,
                                                                courses.duration,
                                                                courses.overview,
                                                                courses.info,
                                                                courses.level,
                                                                courses.rating,
                                                                courses.approved_time,
                                                                currencies.symbol
                                                        FROM courses 
                                                         INNER JOIN currencies on courses.currency_id = currencies.id
                                                        WHERE ((title LIKE ?) AND status=1 AND offline_progress<=25.00 AND IF(type=0,end_date>CURDATE(),1=1) )
                                                    UNION
                                                        SELECT courses.id AS course_id,                                                                             courses.coursecode,
                                                                    courses.title,
                                                                    courses.category,
                                                                    courses.price,
                                                                    courses.image,
                                                                    courses.type,
                                                                    courses.duration,
                                                                    courses.overview,
                                                                    courses.info,
                                                                    courses.level,
                                                                    courses.rating,
                                                                    courses.approved_time,
                                                                    currencies.symbol
                                                        FROM courses 
                                                         INNER JOIN currencies on courses.currency_id = currencies.id
                                                        WHERE ((overview LIKE ?) AND status=1 AND offline_progress<=25.00 AND IF(type=0,end_date>CURDATE(),1=1) ) 
                                                    ) AS coursestable
                                                LEFT JOIN (SELECT * FROM user_courses WHERE TYPE=1) AS lecturers ON lecturers.`course_id` = coursestable.course_id) AS coursejoined
                                            LEFT JOIN modules ON coursejoined.course_id=modules.`course_id`
                                            LEFT JOIN course_levels ON coursejoined.level=course_levels.id
                                            GROUP BY coursejoined.course_id) as course_final
                                            LEFT JOIN users ON course_final.user_id=users.id
                                            GROUP BY course_final.course_id; ", ["%$category_clean%", "%$category_clean%"]);
            $courses = array_merge($courses, $title_overview);

            // Search courses based on category name (CURRENT METHOD IS NOT RECCOMMENDED) 
            $filtered_categories = DB::select("SELECT id FROM courses_categories
                                        WHERE name LIKE ?", ["%$category_clean%"]);
            $filtered_categories_courses = array();
            if (count($filtered_categories) > 0) 
            {   // Categories with criteria found 
                foreach ($filtered_categories as $fc) 
                {   // Iterate every filtered categories ID 
                    // GROUP_CONCAT(CONCAT(IF(users.title is null,'',CONCAT(users.title,'. ')),users.name) SEPARATOR ', ')
                    $filtered_categories_courses_row = DB::select("SELECT users.organization as courselecturer,
                                                                            course_final.*
                                                                    FROM
                                                                    (SELECT IFNULL(sum(modules.duration),0) as coursemodules_duration,
                                                                            IFNULL(count(modules.id),0) as coursemodules_number,
                                                                            IFNULL(course_levels.name, '') as courselevel_name,
                                                                            IFNULL(course_levels.icon, '') as courselevel_icon,
                                                                            coursejoined.*
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
                                                                                        courses.type,
                                                                                        courses.duration,
                                                                                        courses.overview,
                                                                                        courses.info,
                                                                                        courses.level,
                                                                                        courses.rating,
                                                                                        courses.approved_time,
                                                                                        currencies.symbol
                                                                            FROM courses 
                                                                            INNER JOIN currencies on courses.currency_id = currencies.id
                                                                            WHERE ((find_in_set(?,category) <> 0) AND status=1 AND offline_progress<=25.00 AND IF(type=0,end_date>CURDATE(),1=1) ) ) AS coursestable
                                                                        LEFT JOIN (SELECT * FROM user_courses WHERE TYPE=1) AS lecturers ON lecturers.`course_id` = coursestable.course_id) AS coursejoined
                                                                    LEFT JOIN modules ON coursejoined.course_id=modules.`course_id`
                                                                    LEFT JOIN course_levels ON coursejoined.level=course_levels.id
                                                                    GROUP BY coursejoined.course_id) as course_final
                                                                    LEFT JOIN users ON course_final.user_id=users.id
                                                                    GROUP BY course_final.course_id; ", [$fc->id]);
                    foreach ($filtered_categories_courses_row as $fccr) 
                    {   // Push to filtered_categories_courses 
                        array_push($filtered_categories_courses, $fccr);
                    }
                }
                // Remove duplicates 
                $courses = array_unique(array_merge($courses, $filtered_categories_courses), SORT_REGULAR);
            }
            $totalcourse = count($courses);
        }
        else
        {   // Display all results  
            // GROUP_CONCAT(CONCAT(IF(users.title is null,'',CONCAT(users.title,'. ')),users.name) SEPARATOR ', ')
            $courses = DB::select("SELECT users.organization as courselecturer,
                                            course_final.*
                                    FROM
                                    (SELECT IFNULL(sum(modules.duration),0) as coursemodules_duration,
                                            IFNULL(count(modules.id),0) as coursemodules_number,
                                            IFNULL(course_levels.name, '') as courselevel_name,
                                            IFNULL(course_levels.icon, '') as courselevel_icon,
                                            coursejoined.*
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
                                                        courses.type,
                                                        courses.duration,
                                                        courses.overview,
                                                        courses.info,
                                                        courses.level,
                                                        courses.rating,
                                                        courses.approved_time,
                                                        currencies.symbol
                                            FROM courses 
                                             INNER JOIN currencies on courses.currency_id = currencies.id
                                            WHERE (status=1 AND offline_progress<=25.00 AND IF(type=0,end_date>CURDATE(),1=1) ) ) AS coursestable
                                        LEFT JOIN (SELECT * FROM user_courses WHERE TYPE=1) AS lecturers ON lecturers.`course_id` = coursestable.course_id) AS coursejoined
                                    LEFT JOIN modules ON coursejoined.course_id=modules.`course_id`
                                    LEFT JOIN course_levels ON coursejoined.level=course_levels.id
                                    GROUP BY coursejoined.course_id) as course_final
                               LEFT JOIN users ON course_final.user_id=users.id
                               GROUP BY course_final.course_id");
            $totalcourse = count($courses);
        }

        if ($totalcourse > 0) 
        {   // Result set not empty
            //  Apply sort only if totalcourse > 0 
            // Order by. Default: Best Match */
            if ($sort == 2) 
            {   // Lowest price 
                usort($courses, function($a, $b)
                                {
                                    if ($a->price < $b->price) {
                                        return -1;
                                    } else if($a->price == $b->price)
                                    {
                                        return 0;
                                    } else
                                    {
                                        return 1;
                                    }
                                });
            }
            else if($sort == 3)
            {   // Lowest level 
                usort($courses, function($a, $b)
                                {
                                    if ($a->level < $b->level) {
                                        return -1;
                                    } else if($a->level == $b->level)
                                    {
                                        return 0;
                                    } else
                                    {
                                        return 1;
                                    }
                                });
            }  

            // Limit 
            if (count($courses) > $this->perpage) 
            {   // limit search
                //   perpage=10, page 2 
                $startpage = intval($page)-1;
                if ($startpage < 0) 
                {   // Startpage < 0 
                    $startpage = 0;
                }
                $courses = array_slice($courses, ($startpage*$this->perpage), $this->perpage);
            }

            /** Pagination */
            $pagination_total_page = ceil($totalcourse/$this->perpage);      
            $currentpage = $page;

            return view('header', ['user_industries' => $user_industries,
                                    'user_interests' => $courses_categories,
                                    'user_occupations' => $user_occupations,
                                    'courses_categories' => $courses_categories])->withTitle('LAD Global | Search Courses').
                    view('courses/search_courses', ['category' => $category,
                                                    'courses' => $courses,
                                                    'totalcourse' => $totalcourse,
                                                    'pagination_total_page' => $pagination_total_page,
                                                    'sort' => $sort,
                                                    'currentpage' => $currentpage
                                                    ]).
                    view('footer');
        }
        else
        {   // Result set empty
            /* Promoted courses */
            $promoted_random_category_id = 0;
            $promoted_random_category_name = "";
            $promoted_courses = array();
            $promoted_totalcourse = 0;

            if ($promoted) 
            {   // Promoted found, captured from several promotion courses pages 
                $promoted_random_category_id = intval(strip_tags($promoted));
            }
            else
            {   // Promotion not found, generate a new random one 
                $categories_count = DB::table('courses_categories')->where('name', '!=', 'FEATURED')
                                                                    ->where('name', '!=', 'Others')
                                                                    ->count();
                $promoted_random_category_id = rand(3, (3+intval($categories_count)-1));
            }
            
            $promoted_random_category_name = collect(DB::select("SELECT name FROM courses_categories
                                                                    WHERE id = ?", [$promoted_random_category_id]))
                                                    ->first()
                                                ->name;

            // Search promoted courses based on category name (CURRENT METHOD IS NOT RECCOMMENDED) 
            // GROUP_CONCAT(CONCAT(IF(users.title is null,'',CONCAT(users.title,'. ')),users.name) SEPARATOR ', ')
            $promoted_courses = DB::select("SELECT users.organization as courselecturer,
                                                    course_final.*
                                            FROM
                                            (SELECT IFNULL(sum(modules.duration),0) as coursemodules_duration,
                                                    IFNULL(count(modules.id),0) as coursemodules_number,
                                                    IFNULL(course_levels.name, '') as courselevel_name,
                                                    IFNULL(course_levels.icon, '') as courselevel_icon,
                                                    coursejoined.*
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
                                                                courses.type,
                                                                courses.duration,
                                                                courses.overview,
                                                                courses.info,
                                                                courses.level,
                                                                courses.rating,
                                                                courses.approved_time,
                                                                currencies.symbol
                                                    FROM courses 
                                                    INNER JOIN currencies on courses.currency_id = currencies.id
                                                    WHERE ((find_in_set(?,category) <> 0) AND status=1 AND offline_progress<=25.00 AND IF(type=0,end_date>CURDATE(),1=1) ) ) AS coursestable
                                                LEFT JOIN (SELECT * FROM user_courses WHERE TYPE=1) AS lecturers ON lecturers.`course_id` = coursestable.course_id) AS coursejoined
                                            LEFT JOIN modules ON coursejoined.course_id=modules.`course_id`
                                            LEFT JOIN course_levels ON coursejoined.level=course_levels.id
                                            GROUP BY coursejoined.course_id) as course_final
                                            LEFT JOIN users ON course_final.user_id=users.id
                                            GROUP BY course_final.course_id; ", [$promoted_random_category_id]);
            $promoted_totalcourse = count($promoted_courses);

            // Limit
            if ($promoted_totalcourse > $this->perpage) 
            {   // limit search (Promoted courses) 
                //    perpage=10, page 2 */
                $startpage = intval($page)-1;
                if ($startpage < 0) 
                {   # Startpage < 0
                    $startpage = 0;
                }
                $promoted_courses = array_slice($promoted_courses, ($startpage*$this->perpage), $this->perpage);
            }

            // Pagination promoted courses
            $promoted_pagination_total_page = ceil($promoted_totalcourse/$this->perpage);      
            $currentpage = $page;

            return view('header', ['user_industries' => $user_industries,
                                    'user_interests' => $courses_categories,
                                    'user_occupations' => $user_occupations,
                                    'courses_categories' => $courses_categories])->withTitle('LAD Global | Search Courses').
                    view('courses/search_courses', ['category' => $category,
                                                    'courses' => $courses,
                                                    'totalcourse' => $totalcourse,
                                                    'pagination_total_page' => $pagination_total_page,
                                                    'sort' => $sort,
                                                    'currentpage' => $currentpage,

                                                    // Promoted contents if result is empty
                                                    'promoted_random_category_id' => $promoted_random_category_id,
                                                    'promoted_random_category_name' => $promoted_random_category_name,
                                                    'promoted_courses' => $promoted_courses,
                                                    'promoted_totalcourse' => $promoted_totalcourse,
                                                    'promoted_pagination_total_page' => $promoted_pagination_total_page
                                                    ]).
                    view('footer');
        }              
    }

    /**
    * Display the course detail page
    *
    * @param boolean $courseid The currently selected course
    */
    public function detail($courseid = false)
    {
        $user_industries = DB::table('user_industries')
                                ->orderBy('priority', 'desc')
                                ->orderBy('name', 'asc')
                                ->get();
        $user_occupations = DB::table('user_occupations')
                                ->orderBy('priority', 'desc')
                                ->orderBy('name', 'asc')
                                ->get();
        $courses_categories = DB::table('courses_categories')
                                ->where('name', '!=', 'FEATURED')
                                ->orderBy('priority', 'desc')
                                ->orderBy('name', 'asc')
                                ->get();

        if (!$courseid) 
        {   // if courseid is empty, redirect to brosecourses 
            return redirect('/browsecourses');
        }
        else
        {   // courseid is filled 
            $courseid_clean = strip_tags($courseid);
            // TEMP FOR DISPLAYING MORE THAN ONE LECTURER
                // GROUP_CONCAT(CONCAT(IF(users.title is null,'',CONCAT(users.title,'. ')),users.name) SEPARATOR ', ')
            // END TEMP
            // GROUP_CONCAT(CONCAT(IF(users.title is null,'',CONCAT(users.title,'. ')),users.name) SEPARATOR ', ')
            $selected_course = collect(DB::select("SELECT users.organization as courselecturer,
                                                            users.photo as profpic,
                                                            users.organization as lecturer_organization,
                                                            users.country as lecturer_country,
                                                            users.web_url as web_url,
                                                            users.user_desc as lecturer_desc,
                                                            user_occupations.name as lecturer_occu,
                                                            courses_categories.name as lecturer_interest,
                                                            course_levels.name as level_name,
                                                            course_levels.icon as level_icon,
                                                            coursejoined.*
                                                    FROM
                                                        (SELECT lecturers.user_id,
                                                                coursestable.*
                                                        FROM
                                                            (SELECT courses.id AS course_id,
                                                                    courses.coursecode,
                                                                    courses.title,
                                                                    courses.price,
                                                                    courses.rating,
                                                                    courses.image,
                                                                    courses.detail_image,
                                                                    courses.type,
                                                                    courses.overview,
                                                                    courses.info,
                                                                    courses.level,
                                                                    courses.start_date,
                                                                    courses.end_date,
                                                                    courses.approved_time,
                                                                    currencies.symbol,
                                                                    courses_categories.name as catname
                                                            FROM courses
                                                            INNER JOIN currencies on courses.currency_id = currencies.id
                                                            LEFT JOIN  courses_categories
                                                            ON courses.category = courses_categories.id
                                                            WHERE (coursecode = ? and status=1)) AS coursestable
                                                        LEFT JOIN (SELECT * FROM user_courses WHERE TYPE=1) AS lecturers ON lecturers.`course_id` = coursestable.course_id) AS coursejoined
                                                    LEFT JOIN users ON coursejoined.user_id=users.`id`
                                                    LEFT JOIN course_levels ON coursejoined.level=course_levels.id
                                                    LEFT JOIN courses_categories ON users.interest = courses_categories.id
                                                    LEFT JOIN user_occupations on users.occupation = user_occupations.id
                                                    GROUP BY coursejoined.course_id ", [$courseid_clean]))->first();

            // Check if the course exists 
            $selected_course_modules = DB::select("SELECT * 
                                                    FROM modules 
                                                    WHERE (course_id=(SELECT id 
                                                                        FROM courses 
                                                                        WHERE coursecode=?) 
                                                            AND status=1) 
                                                    ORDER BY module_number ASC; ", [$courseid_clean]);
            $user_id = Session::get('LAD_user_id');

            $user_wishlists = DB::select("  SELECT course_id
                                            FROM user_wishlists
                                            WHERE user_id = ?",[$user_id]);
            $user_wishlists_arr= array();

            $user_enrolled = DB::table('user_courses')->where('user_id',$user_id)->where('type', 0)->where('course_id',$selected_course->course_id)->first();
            

            $user = DB::table('users')->where('id',$user_id)->first();
            foreach ($user_wishlists as $data) {
                array_push($user_wishlists_arr, $data->course_id);
            }

            if (isset($selected_course->type) && ($selected_course->type == 1)) 
            {   // Online courses 
                if (isset($user_enrolled)) {
                    $user_payment_status = DB::table('transaction_carts')->where('participant',$user_enrolled->user_id)->where('course_id', $selected_course->course_id)->where('status',1)->first();
                } else {
                    $user_payment_status = array();
                }
                return view('header', ['user_industries' => $user_industries,
                                        'user_interests' => $courses_categories,
                                        'user_occupations' => $user_occupations,
                                        'courses_categories' => $courses_categories])->withTitle('LAD Global | Course Detail').
                        view('courses/single_page_course', ['selected_course' => $selected_course,
                                                            'selected_course_modules' => $selected_course_modules,
                                                            'user_wishlists' => $user_wishlists_arr,
                                                            'user_enrolled' => $user_enrolled,
                                                            'user_payment_status' => $user_payment_status,
                                                            'user' => $user
                                                            ]).
                        view('footer');
            }
            else
            {   // Offline courses 
                return view('header', ['user_industries' => $user_industries,
                                        'user_interests' => $courses_categories,
                                        'user_occupations' => $user_occupations,
                                        'courses_categories' => $courses_categories])->withTitle('LAD Global | Course Detail').
                        view('courses/single_page_course_offline', ['selected_course' => $selected_course,
                                                                    'selected_course_modules' => $selected_course_modules,
                                                                    'user_wishlists' => $user_wishlists_arr,
                                                                    'user_enrolled' => $user_enrolled,
                                                                    'user' => $user
                                                                    ]).
                        view('footer');
            }
        }
    }

    /**
    * This function is used to display customized course page
    *
    */
    public function customized()
    {
        $user_industries = DB::table('user_industries')
                                ->orderBy('priority', 'desc')
                                ->orderBy('name', 'asc')
                                ->get();
        $user_occupations = DB::table('user_occupations')
                                ->orderBy('priority', 'desc')
                                ->orderBy('name', 'asc')
                                ->get();

        $userid = Session::get('LAD_user_id');
        $users = UsersModel::where('id',$userid)
                            ->first();

        $courses_categories = DB::table('courses_categories')
                                ->where('name', '!=', 'FEATURED')
                                ->orderBy('priority', 'desc')
                                ->orderBy('name', 'asc')
                                ->get();
        $courses_categories_filter = DB::select("  SELECT courses_categories.id as id, courses_categories.name as name 
                                            FROM `course_requests`
                                            INNER JOIN courses_categories 
                                            ON find_in_set(courses_categories.id,course_requests.area_of_training) 
                                            WHERE course_requests.requester_id != '$userid'
                                            group by courses_categories.id 
                                            ORDER by priority desc, name asc");    

        $countries = DB::select("   SELECT users.id as id, users.country as country 
                                    FROM `course_requests`
                                    INNER JOIN users
                                    ON course_requests.requester_id = users.id
                                    WHERE course_requests.requester_id != '$userid'
                                    GROUP BY users.id ");                                           

        $course_requests = $this->getCustomizedCourse($userid);
        $course_other_requests = $this->getOtherRequests($userid,0,9);
        $currencies = DB::table('currencies')->orderBy('name','asc')->get();
        $course_proposals = $this->getUserProposal($userid);
        if ($users->type == 1 || ($users->type == 2 && $users->role == 2)) {
            return view('header', ['courses_categories' => $courses_categories,
                                    'currencies' => $currencies,
                                    'user_industries' => $user_industries,
                                    'user_interests' => $courses_categories,
                                    'user_occupations' => $user_occupations])->withTitle('LAD Global | Dashboard - Customized Course').view('dashboard/dashboard-sidebar', ['users' => $users]).view('dashboard/customizedcourse', ['countries' => $countries, 'course_requests' => $course_requests, 'courses_categories' => $courses_categories, 'courses_categories_filter' => $courses_categories_filter, 'course_other_requests' => $course_other_requests, 'course_proposals' => $course_proposals]).view('footer');
        } else {
            return abort(404);
        }
    }

    /**
    * This function is used to display Request Customized Courses Pop up, when (+) button clicked on customized course page
    *
    * @param Request $request The request data from ajax
    */
    public function request_customized_courses(Request $request)
    {   # AJAX CALL
        $output = array(
            'info' => 'error',
            'message' => 'Your customized course request could not be processed. Please try again later.',
            'code' => 'x' 
            );

        if (Session::get('LAD_user_type') == '1') {

            $text_regex_more_characters = "/^[\r\n A-Za-zÀ-ÿ0-9_#!?.,-]+$/";
            $rules = array(
                'requestcustomized_description' => ['required', 'min:3', 'max:1000'],
                'requestcustomized_budget' => 'nullable|numeric|min:0',
                'requestcustomized_participants' => 'required|numeric|min:0|max:1000',
                'requestcustomized_confidential' => 'nullable|alpha|max:5',
                'requestcustomized_areaoftraining_radio' => 'required|numeric|min:0',
                'requestcustomized_startdate' => 'nullable|date',
                'requestcustomized_enddate' => 'nullable|date',
                'requestcustomized_additional' => ['nullable', 'max:1000'],
                // 'requestcustomized_pdf' => ['nullable', 'max:10000', 'mimes:application/pdf, application/x-pdf,application/acrobat, applications/vnd.pdf, text/pdf, text/x-pdf'] */
                'requestcustomized_pdf' => ['nullable', 'max:10000']
                // 'requestcustomized_pdf' => "nullable|mimes:application/pdf, application/x-pdf,application/acrobat, applications/vnd.pdf, text/pdf, text/x-pdf" */
                );
            $messages = array(
                'requestcustomized_description.required' => 'The Course Description is required.',
                'requestcustomized_description.min' => 'The Course Description must be more than :min characters long.',
                'requestcustomized_description.max' => 'The Course Description must be less than :max characters long.',
                // 'requestcustomized_description.regex' => 'The Course Description must be in alpha-numeric characters or accented characters or dashes and underscores and spaces.', */

                'requestcustomized_budget.numeric' => 'The Course Budget must be numeric.',
                'requestcustomized_budget.min' => 'The Course Budget must be greater than :min.',

                'requestcustomized_participants.required' => 'The Number of Participants is required.',
                'requestcustomized_participants.numeric' => 'The Number of Participants must be numeric.',
                'requestcustomized_participants.min' => 'The Number of Participants must be greater than :min.',
                'requestcustomized_participants.max' => 'The Number of Participants must be lower than :max.',

                'requestcustomized_confidential.alpha' => 'The Confidentiality must be in alphabetic characters.',
                'requestcustomized_confidential.max' => 'The Confidentiality must be lower than :max.',

                'requestcustomized_areaoftraining_radio.required' => 'The Course Area of Training is required.',
                'requestcustomized_areaoftraining_radio.numeric' => 'The Course Area of Training must be numeric.',
                'requestcustomized_areaoftraining_radio.min' => 'The Course Area of Training must be greater than :min.',

                'requestcustomized_startdate.date' => 'The Course Start Date must be in a valid date format.',

                'requestcustomized_enddate.date' => 'The Course End Date must be in a valid date format.',

                'requestcustomized_additional.max' => 'The Course Additional Information must be less than :max characters long.',
                // 'requestcustomized_additional.regex' => 'The Course Additional Information must be in alpha-numeric characters or accented characters or dashes and underscores and spaces.', */

                'requestcustomized_pdf.mimes' => 'The Course Documents must be a PDF file.',
                'requestcustomized_pdf.max' => 'The Course Documents must be smaller than 10MB.',
                );

            $validator = Validator::make($request->only('requestcustomized_description',
                                                        'requestcustomized_budget',
                                                        'requestcustomized_participants',
                                                        'requestcustomized_confidential',
                                                        'requestcustomized_areaoftraining_radio',
                                                        'requestcustomized_startdate',
                                                        'requestcustomized_enddate',
                                                        'requestcustomized_additional',
                                                        'requestcustomized_pdf'), $rules, $messages);
            if ($validator->fails()) 
            {   // Validation failed  */
                $errors = $validator->errors();
                //
                //Display all errors in arrays
                //* $message = $validator->messages();
                //* Display all errors in text
                //* $message = "";
                //* foreach ($errors->all() as $error_message) 
                //* {   # iterate error messages
                //*     $message .= $error_message." ";
                //* } 
                //*/
                $message = $errors->first();

                $output['message'] = $message;
                $output['code'] = '1';
            }
            else
            {   // Validation passed
                //*   Validate files
                $is_pdf = true;
                if ($request->hasFile('requestcustomized_pdf')) 
                {   // PDF uploaded   
                    foreach ($request->file('requestcustomized_pdf') as $uploaded_file) 
                    {   
                        if ($uploaded_file->getMimeType() != 'pdf' && 
                            $uploaded_file->getMimeType() != 'application/pdf' && 
                            $uploaded_file->getMimeType() != 'application/x-pdf' && 
                            $uploaded_file->getMimeType() != 'application/acrobat' && 
                            $uploaded_file->getMimeType() != 'applications/vnd.pdf' && 
                            $uploaded_file->getMimeType() != 'text/pdf' && 
                            $uploaded_file->getMimeType() != 'text/x-pdf') 
                        {
                            $is_pdf = false;
                        }
                    }
                }

                if (!$is_pdf) 
                {   // Not all are pdf 
                    $output['message'] = 'The Course Documents must be PDF files.';
                    $output['code'] = '5';
                }
                else
                {  // No PDF uploaded, or all is pdfs
                    $requestcustomized_description = strip_tags($request->input('requestcustomized_description'));
                    $requestcustomized_budget = strip_tags($request->input('requestcustomized_budget'));
                    $requestcustomized_participants = strip_tags($request->input('requestcustomized_participants'));
                    $requestcustomized_confidential = strip_tags($request->input('requestcustomized_confidential'));
                    $requestcustomized_areaoftraining_radio = strip_tags($request->input('requestcustomized_areaoftraining_radio'));
                    $requestcustomized_startdate = strip_tags($request->input('requestcustomized_startdate'));
                    $requestcustomized_enddate = strip_tags($request->input('requestcustomized_enddate'));
                    $requestcustomized_additional = strip_tags($request->input('requestcustomized_additional'));
                    $requestcustomized_currency = strip_tags($request->input('requestcustomized_currency'));

                    $new_data = array(
                        'description' => $requestcustomized_description,
                        'participants' => $requestcustomized_participants,
                        'area_of_training' => $requestcustomized_areaoftraining_radio,
                        'currency_id' => $requestcustomized_currency,
                        'created_time' => date("Y-m-d H:i:s")
                        );
                    if (Session::get('LAD_expire') && (time() < Session::get('LAD_expire')) && Session::get('LAD_user_id')) 
                    {   # User logged-in
                        $new_data['requester_id'] = Session::get('LAD_user_id');
                    }
                    if ($requestcustomized_budget && $requestcustomized_budget > 0) 
                    {   # Budget is set
                        $new_data['budget'] = $requestcustomized_budget;
                    }
                    if ($requestcustomized_confidential && $requestcustomized_confidential == "on") 
                    {   # Confidentiality is set
                        $new_data['confidentiality'] = 1;
                    }
                    if ($requestcustomized_startdate) 
                    {   # Start date is set
                        $new_data['start_date'] = date("Y-m-d 00:00:00", strtotime($requestcustomized_startdate));
                    }
                    if ($requestcustomized_enddate) 
                    {   # End date is set
                        $new_data['end_date'] = date("Y-m-d 23:59:59.999", strtotime($requestcustomized_enddate));
                    }
                    if ($requestcustomized_additional) 
                    {   # End date is set
                        $new_data['additional_info'] = $requestcustomized_additional;
                    }

                    if ($requestcustomized_startdate && $requestcustomized_enddate) {
                        if ($new_data['start_date'] > $new_data['end_date']) {
                            $output = array(
                            'info' => 'error',
                            'message' => 'Your end date precede start date. Please input different end date.',
                            'code' => 'x' 
                            );
                            return json_encode($output);
                        }
                    }

                    $rcc_insert_id = DB::table('course_requests')->insertGetId($new_data);
                    if (!$rcc_insert_id) 
                    {   # Insert error
                        $output['code'] = "2";
                    }
                    else
                    {   # Insert success
                        $output['message'] = "Your customized course request is being processed.";
                        $output['request_id'] = $rcc_insert_id;

                        if ($request->hasFile('requestcustomized_pdf')) 
                        {   # pdf uploaded
                            // $uploaded_file = $request->file('requestcustomized_pdf');
                            $uploaded_files = "";
                            $uploaded_counter = 0;
                            foreach ($request->file('requestcustomized_pdf') as $uploaded_file) 
                            {
                                $name = preg_replace("/[^a-zA-Z0-9.]/", "", $uploaded_file->getClientOriginalName());
                                $fileName = time().'_'.urlencode(preg_replace('/\s+/', '_', $name)); // already includes the extension
                                $directoryName = date("Ymd");
                                $filePath = "course/requests/".$directoryName."/".$rcc_insert_id;
                                           
                                $is_uploaded = $this->uploadFiletoS3($uploaded_file, $filePath, $fileName);        
                                if ($is_uploaded['info'] == 'success') 
                                {   # upload success
                                    $uploaded_files .= $filePath."/".$fileName.",";
                                    $uploaded_counter++;
                                }
                                else
                                {   # upload failed
                                    $output['code'] = "3";
                                }   
                            }

                            // Update course_requests > pdf
                            $uploaded_files = substr($uploaded_files, 0, (strlen($uploaded_files)-1));
                            $is_updated = DB::table('course_requests')
                                                    ->where('id', $rcc_insert_id)
                                                    ->update(['pdf' => $uploaded_files]);
                            if ($is_updated) 
                            {   # DB updated
                                $output['message'] .= " $uploaded_counter document(s) are uploaded successfully.";
                                $output['info'] = "success";
                                $output['code'] = "0";
                            }
                            else
                            {   # DB update error
                                $output['message'] .= " $uploaded_counter document(s) are uploaded successfully. Request documents not updated.";
                                $output['code'] = "4";
                            }
                        }
                        else
                        {   # no pdf uploaded
                            $output['info'] = "success";
                            $output['code'] = "0";
                        }
                    }
                }            
            }
        }
        return json_encode($output);
    }

    /**
    * Edit customized course page  
    * 
    * @param Request $request from ajax
    */
    public function update_customized_courses(Request $request)
    {
        $output = array(
            'info' => 'error',
            'message' => 'Your customized course request could not be processed. Please try again later.',
            'code' => 'x' 
            );

        $text_regex_more_characters = "/^[\r\n A-Za-zÀ-ÿ0-9_#!?.,-]+$/";
        $rules = array(
            'requestcustomized_description' => ['required', 'min:3', 'max:255', 'regex:'.$text_regex_more_characters],
            'requestcustomized_budget' => 'nullable|numeric|min:0',
            'requestcustomized_participants' => 'required|numeric|min:0|max:1000',
            'requestcustomized_confidential' => 'nullable|alpha|max:5',
            'requestcustomized_areaoftraining_radio' => 'required|numeric|min:0',
            'requestcustomized_startdate' => 'nullable|date',
            'requestcustomized_enddate' => 'nullable|date',
            'requestcustomized_additional' => ['nullable', 'max:255', 'regex:'.$text_regex_more_characters],
            // 'requestcustomized_pdf' => ['nullable', 'max:10000', 'mimes:application/pdf, application/x-pdf,application/acrobat, applications/vnd.pdf, text/pdf, text/x-pdf']
            'requestcustomized_pdf' => ['nullable', 'max:10000']
            // 'requestcustomized_pdf' => "nullable|mimes:application/pdf, application/x-pdf,application/acrobat, applications/vnd.pdf, text/pdf, text/x-pdf"
            );
        $messages = array(
            'requestcustomized_description.required' => 'The Course Description is required.',
            'requestcustomized_description.min' => 'The Course Description must be more than :min characters long.',
            'requestcustomized_description.max' => 'The Course Description must be less than :max characters long.',
            'requestcustomized_description.regex' => 'The Course Description must be in alpha-numeric characters or accented characters or dashes and underscores and spaces.',

            'requestcustomized_budget.numeric' => 'The Course Budget must be numeric.',
            'requestcustomized_budget.min' => 'The Course Budget must be greater than :min.',

            'requestcustomized_participants.required' => 'The Number of Participants is required.',
            'requestcustomized_participants.numeric' => 'The Number of Participants must be numeric.',
            'requestcustomized_participants.min' => 'The Number of Participants must be greater than :min.',
            'requestcustomized_participants.max' => 'The Number of Participants must be lower than :max.',

            'requestcustomized_confidential.alpha' => 'The Confidentiality must be in alphabetic characters.',
            'requestcustomized_confidential.max' => 'The Confidentiality must be lower than :max.',

            'requestcustomized_areaoftraining_radio.required' => 'The Course Area of Training is required.',
            'requestcustomized_areaoftraining_radio.numeric' => 'The Course Area of Training must be numeric.',
            'requestcustomized_areaoftraining_radio.min' => 'The Course Area of Training must be greater than :min.',

            'requestcustomized_startdate.date' => 'The Course Start Date must be in a valid date format.',

            'requestcustomized_enddate.date' => 'The Course End Date must be in a valid date format.',

            'requestcustomized_additional.max' => 'The Course Additional Information must be less than :max characters long.',
            'requestcustomized_additional.regex' => 'The Course Additional Information must be in alpha-numeric characters or accented characters or dashes and underscores and spaces.',

            'requestcustomized_pdf.mimes' => 'The Course Documents must be a PDF file.',
            'requestcustomized_pdf.max' => 'The Course Documents must be smaller than 10MB.',
            );

        $validator = Validator::make($request->only('requestcustomized_description',
                                                    'requestcustomized_budget',
                                                    'requestcustomized_participants',
                                                    'requestcustomized_confidential',
                                                    'requestcustomized_areaoftraining_radio',
                                                    'requestcustomized_startdate',
                                                    'requestcustomized_enddate',
                                                    'requestcustomized_additional',
                                                    'requestcustomized_pdf'), $rules, $messages);
        if ($validator->fails()) 
        {   # Validation failed 
            $errors = $validator->errors();

            // Display all errors in arrays
            // $message = $validator->messages();

            // Display all errors in text
            // $message = "";
            // foreach ($errors->all() as $error_message) 
            // {   # iterate error messages
            //     $message .= $error_message." ";
            // }
            $message = $errors->first();

            $output['message'] = $message;
            $output['code'] = '1';
        }
        else
        {   # Validation passed
            // Validate files
            $is_pdf = true;
            if ($request->hasFile('requestcustomized_pdf')) 
            {   # PDF uploaded    
                foreach ($request->file('requestcustomized_pdf') as $uploaded_file) 
                {   
                    if ($uploaded_file->getMimeType() != 'pdf' && 
                        $uploaded_file->getMimeType() != 'application/pdf' && 
                        $uploaded_file->getMimeType() != 'application/x-pdf' && 
                        $uploaded_file->getMimeType() != 'application/acrobat' && 
                        $uploaded_file->getMimeType() != 'applications/vnd.pdf' && 
                        $uploaded_file->getMimeType() != 'text/pdf' && 
                        $uploaded_file->getMimeType() != 'text/x-pdf') 
                    {
                        $is_pdf = false;
                    }
                }
            }

            if (!$is_pdf) 
            {   # Not all are pdf
                $output['message'] = 'The Course Documents must be PDF files.';
                $output['code'] = '5';
            }
            else
            {   # No PDF uploaded, or all is pdfs
                $requestcustomized_description = strip_tags($request->input('requestcustomized_description'));
                $requestcustomized_budget = strip_tags($request->input('requestcustomized_budget'));
                $requestcustomized_participants = strip_tags($request->input('requestcustomized_participants'));
                $requestcustomized_confidential = strip_tags($request->input('requestcustomized_confidential'));
                $requestcustomized_areaoftraining_radio = strip_tags($request->input('requestcustomized_areaoftraining_radio'));
                $requestcustomized_startdate = strip_tags($request->input('requestcustomized_startdate'));
                $requestcustomized_enddate = strip_tags($request->input('requestcustomized_enddate'));
                $requestcustomized_additional = strip_tags($request->input('requestcustomized_additional'));
                $requestcustomized_currency = strip_tags($request->input('requestcustomized_currency'));
                $id = strip_tags($request->input('isupdate'));

                $new_data = array(
                    'description' => $requestcustomized_description,
                    'participants' => $requestcustomized_participants,
                    'area_of_training' => $requestcustomized_areaoftraining_radio,
                    'currency_id' => $requestcustomized_currency
                    );
                if ($requestcustomized_budget && $requestcustomized_budget > 0) 
                {   # Budget is set
                    $new_data['budget'] = $requestcustomized_budget;
                } else {
                    $new_data['budget'] = 0;
                }
                if ($requestcustomized_confidential && $requestcustomized_confidential == "on") 
                {   # Confidentiality is set
                    $new_data['confidentiality'] = 1;
                }
                if ($requestcustomized_startdate) 
                {   # Start date is set
                    $new_data['start_date'] = date("Y-m-d 00:00:00", strtotime($requestcustomized_startdate));
                }
                if ($requestcustomized_enddate) 
                {   # End date is set
                    $new_data['end_date'] = date("Y-m-d 23:59:59.999", strtotime($requestcustomized_enddate));
                }
                if ($requestcustomized_additional) 
                {   # End date is set
                    $new_data['additional_info'] = $requestcustomized_additional;
                }

                if ($request->hasFile('requestcustomized_pdf')) 
                {   # pdf uploaded
                    // $uploaded_file = $request->file('requestcustomized_pdf');
                    $uploaded_files = "";
                    $uploaded_counter = 0;
                    foreach ($request->file('requestcustomized_pdf') as $uploaded_file) 
                    {
                        $name = preg_replace("/[^a-zA-Z0-9.]/", "", $uploaded_file->getClientOriginalName());
                        $fileName = time().'_'.urlencode(preg_replace('/\s+/', '_', $name)); // already includes the extension
                        $directoryName = date("Ymd");
                        $filePath = "course/requests/".$directoryName."/".$id;
                                   
                        $is_uploaded = $this->uploadFiletoS3($uploaded_file, $filePath, $fileName);        
                        if ($is_uploaded['info'] == 'success') 
                        {   # upload success
                            $uploaded_files .= $filePath."/".$fileName.",";
                            $uploaded_counter++;
                        }
                        else
                        {   # upload failed
                            $output['code'] = "3";
                        }   
                    }

                    // Update course_requests > pdf
                    $new_data['pdf'] = substr($uploaded_files, 0, (strlen($uploaded_files)-1));
                    // $is_updated = DB::table('course_requests')
                    //                         ->where('id', $id)
                    //                         ->update(['pdf' => $uploaded_files]);
                    // if ($is_updated) 
                    // {   # DB updated
                    //     $output['message'] .= " $uploaded_counter document(s) are uploaded successfully.";
                    //     $output['info'] = "success";
                    //     $output['code'] = "0";
                    // }
                    // else
                    // {   # DB update error
                    //     $output['message'] .= " $uploaded_counter document(s) are uploaded successfully. Request documents not updated.";
                    //     $output['code'] = "4";
                    // }
                }

                if ($requestcustomized_startdate && $requestcustomized_enddate) {
                    if ($new_data['start_date'] > $new_data['end_date']) {
                        $output = array(
                        'info' => 'error',
                        'message' => 'Your end date precede start date. Please input different end date.',
                        'code' => 'x' 
                        );
                        return json_encode($output);
                    }
                }
                
                $rcc_insert_id = DB::table('course_requests')->where('id',$id)->update($new_data);
                if (!$rcc_insert_id) 
                {   # Update error
                    $output['code'] = "2";
                }
                else
                {   # Update success
                    $output['info'] = "success";
                    $output['code'] = "0";
                    $output['message'] = "Your customized course request is being processed.";
                    $output['request_id'] = $id;

                    
                    // else
                    // {   # no pdf uploaded
                    //     $output['info'] = "success";
                    //     $output['code'] = "0";
                    // }
                }
            }            
        }
        return json_encode($output);
    }

    /**
    * To get customized course 
    * @param int $user_id The user id of this user
    */
    public function getCustomizedCourse($user_id){
        // DB::statement('SET GLOBAL group_concat_max_len = 10000000000000');
        return DB::select(" SELECT t.*, GROUP_CONCAT(course_proposals.id SEPARATOR ';') as proposal_id, GROUP_CONCAT(course_proposals.user_id SEPARATOR ';') as proposal_user_id, GROUP_CONCAT(course_proposals.title SEPARATOR ';') as proposal_title, GROUP_CONCAT(course_proposals.description SEPARATOR ';') as proposal_desc, GROUP_CONCAT(course_proposals.pdf SEPARATOR ';') as proposal_pdf, GROUP_CONCAT(course_proposals.status SEPARATOR ';') as proposal_status, GROUP_CONCAT(users.organization SEPARATOR ';') as proposal_organization, GROUP_CONCAT(users.country SEPARATOR ';') as proposal_country
                            FROM
                             (SELECT course_requests.*, currencies.symbol as currencysymbol, GROUP_CONCAT(courses_categories.name ORDER by courses_categories.priority DESC, courses_categories.name ASC SEPARATOR ',') as category_names
                                    FROM course_requests
                                    LEFT JOIN currencies
                                    ON course_requests.currency_id = currencies.id
                                    INNER JOIN courses_categories 
                                    ON find_in_set(courses_categories.id,course_requests.area_of_training)
                                    WHERE requester_id = ?
                                    AND course_requests.status != 3
                                    GROUP BY course_requests.id) AS t
                            LEFT JOIN (select * from course_proposals where status != 3) as course_proposals
                            ON t.id = course_proposals.course_request_id
                            LEFT JOIN users
                            ON find_in_set(users.id,course_proposals.user_id)
                            GROUP BY t.id", [$user_id]);
    }

    /**
    * To get Browse Other Request in customized courses page
    *
    *@param int $user_id The user id of this user
    *@param int $offset offset of the page
    *@param int $limit The limit of this page
    */
    public function getOtherRequests($user_id,$offset,$limit) {
        $offset = $offset * $limit;
        return DB::select(" SELECT *, currencies.symbol as currencysymbol, course_requests.id as ccid, GROUP_CONCAT(courses_categories.name ORDER by courses_categories.priority DESC, courses_categories.name ASC SEPARATOR ',') as category_names 
                            FROM course_requests 
                            LEFT JOIN currencies
                            ON course_requests.currency_id = currencies.id
                            INNER JOIN courses_categories 
                            ON find_in_set(courses_categories.id,course_requests.area_of_training)
                            INNER JOIN users
                            ON course_requests.requester_id = users.id
                            WHERE requester_id != ? 
                            AND course_requests.status != 3
                            GROUP BY course_requests.id
                            ORDER BY course_requests.id DESC
                            LIMIT ?,?", [$user_id, $offset, $limit]);
    }

    /**
    * Get filtered browse other request in customized courses page
    *
    *@param int $user_id The user id of this user
    *@param int $offset offset of the page
    *@param int $limit The limit of this page
    *@param string $area The filter value of area
    *@param string $country The filter value of country
    *
    */
    public function getOtherRequestsFiltered($user_id,$offset,$limit,$area,$country) {
        $offset = $offset * $limit;
        $str = '';
        if ($area != -1) {
            $str .= "AND FIND_IN_SET(".$area.", area_of_training) > 0";
        }
        if ($country != -1) {
            $str .= ' AND users.country = "'.$country.'"';
        }
        return json_encode(DB::select(" SELECT *, currencies.symbol as currencysymbol, course_requests.id as ccid, GROUP_CONCAT(courses_categories.name ORDER by courses_categories.priority DESC, courses_categories.name ASC SEPARATOR ',') as category_names 
                            FROM course_requests 
                            LEFT JOIN currencies
                            ON course_requests.id = currencies.id
                            INNER JOIN courses_categories 
                            ON find_in_set(courses_categories.id,course_requests.area_of_training)
                            INNER JOIN users
                            ON course_requests.requester_id = users.id
                            WHERE requester_id != ?
                            AND course_requests.status != 3 
                            ".$str." 
                            GROUP BY course_requests.id
                            LIMIT ?,?", [$user_id, $offset, $limit]));
    }

    /**
    * Submit the proposal
    *
    *@param Request $request The request from ajax
    */
    public function submitProposal(Request $request) {
        $output = array(
            'info' => 'error',
            'message' => 'Your customized course request could not be processed. Please try again later.',
            'code' => 'x' 
            );

        $text_regex_more_characters = "/^[ A-Za-zÀ-ÿ0-9_#!?.,-]+$/";
        $rules = array(
            'proposal-title' => ['required', 'min:3', 'max:255', 'regex:'.$text_regex_more_characters],
            'proposal-desc' => ['required', 'min:100', 'max:100000'],
            'submitproposal_pdf' => ['nullable', 'max:10000']
            );
        $messages = array(
            'proposal-title.required' => 'The Proposal Title is required.',
            'proposal-title.min' => 'The Proposal Title must be more than :min characters long.',
            'proposal-title.max' => 'The Proposal Title must be less than :max characters long.',
            'proposal-title.regex' => 'The Proposal Title must be in alpha-numeric characters or accented characters or dashes and underscores and spaces.',

            'proposal-desc.required' => 'The Proposal Description is required.',
            'proposal-desc.min' => 'The Proposal Description must be more than :min characters long.',
            'proposal-desc.max' => 'The Proposal Description must be less than :max characters long.',
            // 'proposal-desc.regex' => 'The Proposal Description must be in alpha-numeric characters or accented characters or dashes and underscores and spaces.',

            // 'submitproposal_pdf.required' => 'The Proposal Document(s) is(are) required',
            'submitproposal_pdf.mimes' => 'The Proposal Documents must be a PDF file.',
            'submitproposal_pdf.max' => 'The Proposal Documents must be smaller than 10MB.',
            );

        $validator = Validator::make($request->only('proposal-title',
                                                    'proposal-desc',
                                                    'submitproposal_pdf'), $rules, $messages);
        if ($validator->fails()) 
        {   # Validation failed 
            $errors = $validator->errors();

            // Display all errors in arrays
            // $message = $validator->messages();

            // Display all errors in text
            // $message = "";
            // foreach ($errors->all() as $error_message) 
            // {   # iterate error messages
            //     $message .= $error_message." ";
            // }
            $message = $errors->first();

            $output['message'] = $message;
            $output['code'] = '1';
        }
        else
        {   # Validation passed
            // Validate files
            $is_pdf = true;
            if ($request->hasFile('submitproposal_pdf')) 
            {   # PDF uploaded    
                foreach ($request->file('submitproposal_pdf') as $uploaded_file) 
                {   
                    if ($uploaded_file->getMimeType() != 'pdf' && 
                        $uploaded_file->getMimeType() != 'application/pdf' && 
                        $uploaded_file->getMimeType() != 'application/x-pdf' && 
                        $uploaded_file->getMimeType() != 'application/acrobat' && 
                        $uploaded_file->getMimeType() != 'applications/vnd.pdf' && 
                        $uploaded_file->getMimeType() != 'text/pdf' && 
                        $uploaded_file->getMimeType() != 'text/x-pdf') 
                    {
                        $is_pdf = false;
                    }
                }
            }

            if (!$is_pdf) 
            {   # Not all are pdf
                $output['message'] = 'The Proposal Documents must be PDF files.';
                $output['code'] = '5';
            }
            else
            {   # No PDF uploaded, or all is pdfs
                //get all input data
                $ccid = strip_tags($request->input('ccid'));
                $title = strip_tags($request->input('proposal-title'));
                $desc = strip_tags($request->input('proposal-desc'));

                $new_data = array(
                    'course_request_id' => $ccid,
                    'title' => $title,
                    'description' => $desc,
                    'created_time' => date("Y-m-d H:i:s"),
                    'status' => 0
                    );
                if (Session::get('LAD_expire') && (time() < Session::get('LAD_expire')) && Session::get('LAD_user_id')) 
                {   # User logged-in
                    $new_data['user_id'] = Session::get('LAD_user_id');
                }
                if ($request->hasFile('submitproposal_pdf')) 
                    {   # pdf uploaded
                        // $uploaded_file = $request->file('requestcustomized_pdf');
                        $uploaded_files = "";
                        $uploaded_counter = 0;
                        foreach ($request->file('submitproposal_pdf') as $uploaded_file) 
                        {
                            $name = preg_replace("/[^a-zA-Z0-9.]/", "", $uploaded_file->getClientOriginalName());
                            $fileName = time().'_'.urlencode(preg_replace('/\s+/', '_', $name)); // already includes the extension
                            $directoryName = date("Ymd");
                            $filePath = "course/proposals/".$ccid;
                                       
                            $is_uploaded = $this->uploadFiletoS3($uploaded_file, $filePath, $fileName);        
                            if ($is_uploaded['info'] == 'success') 
                            {   # upload success
                                $uploaded_files .= $filePath."/".$fileName.",";
                                $uploaded_counter++;
                            }
                            else
                            {   # upload failed
                                $output['code'] = "3";
                            }   
                        }

                        // Update course_requests > pdf
                        $uploaded_files = substr($uploaded_files, 0, (strlen($uploaded_files)-1));
                        $new_data['pdf'] = $uploaded_files;
                    }
                $count_proposal = DB::table('course_proposals')->where('user_id',Session::get('LAD_user_id'));
                if (Session::get('LAD_proposal_credits') >= count($count_proposal) ) {
                    $rcc_insert_id = DB::table('course_proposals')->insertGetId($new_data);
                }
                if (!$rcc_insert_id) 
                {   # Insert error
                    $output['code'] = "2";
                }
                else
                {   # Insert success
                    $output['info'] = "success";
                    $output['code'] = "0";
                    $output['message'] = "Your proposal has been submitted.";
                    $output['request_id'] = $rcc_insert_id;
                }
            }            
        }
        return json_encode($output);
    }

    /**
    * Display user proposal
    *
    * @param int $user_id user id this user
    */
    public function getUserProposal($user_id) {
        return DB::select(" SELECT course_proposals.*, course_requests.description as course_desc
                            FROM course_proposals
                            INNER JOIN course_requests
                            ON course_proposals.course_request_id=course_requests.id
                            WHERE user_id = ?", [$user_id]);
    } 

    /**
    *
    * Remove the rejected proposal
    *
    * @param int $user_id the user id of this user
    * @param int $cpid the proposal id
    * @param int $crid the course request id
    */
    public function removeRejectedProposal($user_id, $cpid, $crid) {
        $proposal = DB::table('course_proposals')->where('id','=',$cpid)->first();
        $output = array(
            'info' => 'error',
            'message' => 'Your request could not be processed. Please try again later.',
            'code' => 'x' 
            );
        if (($proposal->status == 2 || $proposal->status ==0) && ($proposal->user_id == $user_id) && ($proposal->course_request_id == $crid)) {
            DB::table('course_proposals')->where('id', '=', $cpid)->update(['status' => 3]);
            $output['info'] = 'success';
            $output['message'] = 'Your selected proposal has been removed from the list';
            $output['code'] = '0';
        }

        return json_encode($output);
    }

    /**
    *
    * Appointment for proposal
    *
    * @param Request $request the request from ajax
    */
    public function addAppointmentProposal (Request $request) {
        $output = array(
            'info' => 'error',
            'message' => 'Your appointment could not be processed. Please try again later.',
            'code' => 'x' 
            );

        $pid = strip_tags($request->input('pid'));
        $day = strip_tags($request->input('schedule-date'));
        $ampm = strip_tags($request->input('appointment-ampm'));
        $hour = strip_tags($request->input('appointment-hour'));
        $minute = strip_tags($request->input('appointment-minute'));
        $location = strip_tags($request->input('appointment-location'));
        $postal_code = strip_tags($request->input('appointment-postal'));
        $updates = array();

        if ($day != '' && $hour != '' && $minute != '') {
            if ($ampm == 'PM') {
                $hour = $hour + 12;
                if ($hour == 24) {
                    $hour = 00;
                }
            }

            $updates['appointment_time'] = date('Y-m-d H:i:s', strtotime($day.' '.$hour.':'.$minute));
        }

        if ($location != '') {
            $updates['appointment_location'] = $location;
        }

        if ($postal_code != '') {
            $updates['appointment_postal'] = $postal_code;
        }

        $approve = json_decode($this->approveProposal($pid));

        if ($approve->code == '0') {
            if ($updates != null) {
                $update = DB::table('course_proposals')
                            ->where('id',$pid)
                            ->update($updates);

                if ($update != 0) {
                    $output['info'] = 'success';
                    $output['message'] = 'Your appointment for selected proposal has been scheduled.';
                    $output['code'] = '0';
                } else {
                    $output['info'] = 'error';
                    $output['message'] = 'Problem scheduling appointment. Please try again later.';
                    $output['code'] = '0';
                }
            } else {
                $output['info'] = 'success';
                $output['message'] = $approve->message;
                $output['code'] = '0';
            }
        } else {
            $output['info'] = 'success';
            $output['message'] = $approve->message;
            $output['code'] = $approve->code;
        }

        return json_encode($output);
    }

    /**
    * Count all of proposal that apply to current user
    *
    * @param int $user_id The user id of this user
    */
    public function getAllProposalCount ($user_id) {
        return json_encode(DB::select(" SELECT count(course_requests.id) as total_proposal_applied
                            FROM course_requests 
                            INNER JOIN course_proposals
                            ON course_requests.id = course_proposals.course_request_id
                            WHERE requester_id = ? and course_proposals.status != 3 and course_requests.status != 3",[$user_id]));
    }

    /**
    * Approve proposal
    *
    * @param int $pid The proposal id that want to be approve
    */
    public function approveProposal ($pid) {
        // $userid = Session::get('LAD_user_id');

        $update = DB::table('course_proposals')
                    ->where('id',$pid)
                    ->update(['status' => 1]);

        $output = array(
            'info' => 'error',
            'message' => 'Your request could not be processed. Please try again later.',
            'code' => '0' 
            );
        
        if ($update != 0) {
            $output['info'] = 'success';
            $output['message'] = 'Your selected proposal has been accepted';
            $output['code'] = '0';
        }

        return json_encode($output);
    }

    /**
    * Reject proposal
    *
    *@param Request $request The request from ajax
    */
    public function rejectProposal (Request $request) {
        // $userid = Session::get('LAD_user_id');
        $feedback = strip_tags($request->input('feedback'));
        $pid = strip_tags($request->input('pid'));

        $update = DB::table('course_proposals')
                    ->where('id',$pid)
                    ->update(['status' => 2, 'feedback' => $feedback]);

        $output = array(
            'info' => 'error',
            'message' => 'Your request could not be processed. Please try again later.',
            'code' => 'x' 
            );
        
        if ($update != 0) {
            $output['info'] = 'success';
            $output['message'] = 'Your selected proposal has been rejected';
            $output['code'] = '0';
        }

        return json_encode($output);
    }

    /**
    * Delete the customized course
    *
    *@param int $crid The customized course id want to delete
    */
    public function deleteCustomizedCourse ($crid) {
        $update = DB::table('course_requests')
                    ->where('id',$crid)
                    ->update(['status' => 3]);

        $output = array(
            'info' => 'error',
            'message' => 'Your request could not be processed. Please try again later.',
            'code' => 'x' 
            );
        
        if ($update != 0) {
            $output['info'] = 'success';
            $output['message'] = 'Your selected course has been deleted';
            $output['code'] = '0';
        }

        return json_encode($output);
    }

    /**
    * Enroll course
    *
    * @param boolean $code The course status is enrolled or not
    */
    public function enroll($code = false){
        $userid = Session::get('LAD_user_id');
        if ($code != false) {
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
            $course = DB::table('courses')
                                    ->where('coursecode',$code)
                                    ->first();
            $corporateuser = DB::select("SELECT allemployee.*, GROUP_CONCAT(enroller.course_id SEPARATOR ',') as courseenrolled
                                        FROM 
                                            (SELECT users.*,user_occupations.name as occuname
                                            FROM `users` 
                                            left join user_occupations 
                                            on users.occupation = user_occupations.id
                                            where users.id = ?) as allemployee
                                        LEFT OUTER JOIN (SELECT * FROM user_courses WHERE type = 0) as enroller ON enroller.user_id = allemployee.id
                                        GROUP BY allemployee.id
                                        ORDER BY allemployee.name ASC", [$userid]);
            $employeelist = DB::select("SELECT allemployee.*, GROUP_CONCAT(enroller.course_id SEPARATOR ',') as courseenrolled
                                        FROM 
                                            (SELECT users.*,user_occupations.name as occuname
                                            FROM `users` 
                                            left join user_occupations 
                                            on users.occupation = user_occupations.id
                                            where employee_of = ?) as allemployee
                                        LEFT OUTER JOIN (SELECT * FROM user_courses WHERE type = 0) as enroller ON enroller.user_id = allemployee.id
                                        GROUP BY allemployee.id
                                        ORDER BY allemployee.name ASC", [$userid]);
            $user = DB::table('users')
                                    ->where('id',$userid)
                                    ->first();
            return view('enrollment',['corporateuser' => $corporateuser, 'user'=>$user, 'courses_categories' => $courses_categories, 'occupations' => $occupations, 'industries' => $industries,'employee_list' => $employeelist,'course' =>$course]);
        } else {
            return abort('404');
        }
    }

    /**
    *
    *Get the course creator email
    *
    *@param int $course_id The course id of the currently selected course
    *
    */
    public function getCreatorEmail($course){
         $creator = DB::select("SELECT email from 
                                users inner join user_courses 
                                ON users.id = user_courses.user_id 
                                where user_courses.type=1 AND user_courses.course_id = ?",[$course]);

        return ($creator[0]->email);
    }

    public function getCourseCreator($course){
         $creator = DB::select("SELECT * from 
                                users inner join user_courses 
                                ON users.id = user_courses.user_id 
                                where user_courses.type=1 AND user_courses.course_id = ?",[$course]);

        return ($creator[0]);
    }

    /**
    *
    *Sending mail to the course creator and admin@ladglobal when enrolled a course
    *
    *@param String $creator The email address of this course creator
    *@param String $title The course title of this course
    *@param String $email The email address of this enrolled user
    *@param String $name The name of enrolled user
    *@param String $organization The organization of this enrolled user
    *@param String $country The country of this enrolled user
    *@param String $paymentmethod The payment method of this enrolled user
    *
    *
    */
    public function sendReportmail($creator,$title,$name,$email,$organization,$country,$paymentmethod) {
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
                                                    <h2 style="font-family: sans-serif; color:#666666; word-break: break-word;">Congratulations! Your course "'.$title.'" has received a new registration : </h2><br>
                                                    <h2 style="font-family: sans-serif; color:#666666; word-break: break-word;">Name : '.$name.' </h2>
                                                    <h2 style="font-family: sans-serif; color:#666666; word-break: break-word;">Email: '.$email.'</h2>
                                                    <h2 style="font-family: sans-serif; color:#666666; word-break: break-word;">Organization: '.$organization.'</h2>
                                                    <h2 style="font-family: sans-serif; color:#666666; word-break: break-word;">Country: '.$country.'</h2>
                                                    <h2 style="font-family: sans-serif; color:#666666; word-break: break-word;">Payment Method: '.$paymentmethod.'</h2>
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
        $headers[] = 'Bcc: admin@ladglobal.com';
        //End of send email//
        return mail($creator, $subject, $message, implode("\r\n", $headers));                                                                              
    }  

    public function sendUserEnrollMail ($to,$title,$coursecreator,$code) {
        //Sending email to enrolled user//
        // $user = DB::table('users')->where('email',$email)->first();
        $url = url('/');
        $subject = 'LAD Global | Course Enrolled';
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
                                                    <h2 style="font-family: sans-serif; color:#666666; word-break: break-word;">You have been enrolled into "'.$title.'" by '.$coursecreator.' </h2><br>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr><td>
                                                <a href="'.$url.'/coursedetail/'.$code.'"><button style="text-transform: uppercase;
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
                                                transition: all 0.5s;">More Details</button></a>
                                            </td></tr>
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
        return mail($to, $subject, $message, implode("\r\n", $headers));                                                                              
    }

    public function sendAdminRegisteredEmail($to, $employeename, $title, $coursecreator) {
        //Sending email to admin of registered enrolled user//
        // $user = DB::table('users')->where('email',$email)->first();
        $url = url('/');
        $subject = 'LAD Global | Course Enrolled';
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
                                                    <h2 style="font-family: sans-serif; color:#666666; word-break: break-word;">'.$employeename.' has been successfully enrolled to "'.$title.'" by '.$coursecreator.' </h2><br>
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
        return mail($to, $subject, $message, implode("\r\n", $headers));
    }

    public function sendAdminNonUserEmail($to, $employeename, $title, $coursecreator) {
        //Sending email to admin of non-registered enrolled user//
        // $user = DB::table('users')->where('email',$email)->first();
        $url = url('/');
        $subject = 'LAD Global | Course Enrolled';
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
                                                    <h2 style="font-family: sans-serif; color:#666666; word-break: break-word;">We have received the registration details of '.$employeename.' for "'.$title.'" by '.$coursecreator.'. Registration will only be finalized when the participant has confirmed their enrollment via the link sent to their email address. </h2><br>
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
        return mail($to, $subject, $message, implode("\r\n", $headers));
    }

    /**
    * Submit enrollment
    *
    *@param Request $request The request from ajax
    */
    public function submitEnrollment(Request $request) {
        $output = array(
            'info' => 'error',
            'message' => 'Your request could not be processed. Please try again later.',
            'code' => '0' 
            );

        $code = strip_tags($request->input('code'));
        $type = strip_tags($request->input('type'));

        $course = DB::table('courses')->where('coursecode',$code)->first();

        $creator_organization = $this->getCourseCreator($course->id)->organization;

        $creator =$this-> getCreatorEmail($course->id);
        if ($type == "0") {
            // CORPORATE ENROLLMENT
            $employee_id = strip_tags($request->input('enroll_employee'));
            if ($employee_id != 'other') {
                // EMPLOYEE EXISTED
                $employee = DB::table('users')->where('id',$employee_id)->first();
                if ($employee_id == Session::get('LAD_user_id')) {
                    $employer = $employee;
                } else {
                    $employer = DB::table('users')->where('id',$employee->employee_of)->first();
                }
                $location = $employee->country;
                $sfc = false;
                // EMPLOYEE BASED IN SG
                if ($location == 'SG' && $course->sfc == 1) {
                    if (strip_tags($request->input('enroll_futurecredit')) == 1) {
                        $sfc = true;
                    }
                }

                if (!$sfc) {
                    // NOT USING SKILLSFUTURE CREDIT
                    $payment_option = strip_tags($request->input('enroll_paymentmethod'));
                    if ($payment_option == 'wired') {
                        // WIRED TRANSFER
                        // get from db check if multiple
                        $check = DB::table('user_courses')->where('user_id',$employee_id)->where('type', 0)->where('course_id',$course->id)->first();
                        if (count($check) == 0) {
                            $paymentmethod = 0;
                            if ($course->price == 0) {
                                $paymentmethod = 3;
                            }
                            $transaction_item_id = $this->insertTransactions(Session::get('LAD_user_id'),$course->id,$course->price,$paymentmethod,$employee_id);
                            if ($transaction_item_id) { 
                                $id = DB::table('user_courses')->insertGetId([
                                                                                'user_id' => $employee_id,
                                                                                'type' => 0,
                                                                                'course_id' => $course->id,
                                                                                'registration_time' => date('Y-m-d H:i:s')
                                                                            ]);
                                if ($id) {
                                    $output['info'] = 'success';
                                    //Calling sendReportmail function using parameter
                                    if ($course->price == 0) {
                                        $ismailed =$this-> sendReportmail($creator,
                                                       $course->title,
                                                       $employee->name,
                                                       $employee->email,
                                                       $employee->organization,
                                                       $employee->country,'-');
                                    } else {
                                        $ismailed =$this-> sendReportmail($creator,
                                                       $course->title,
                                                       $employee->name,
                                                       $employee->email,
                                                       $employee->organization,
                                                       $employee->country,'Wire Transfer');
                                    }
                                    $mail = $this->sendUserEnrollMail($employee->email, $course->title, $creator_organization, $course->coursecode);
                                    $mail = $this->sendAdminRegisteredEmail($employer->email, $employee->name, $course->title, $creator_organization);
                                    //End of send report email 
                                } else {
                                    $output['message'] = 'Submit enrollment failed. Please try again later.';
                                }
                            } else {
                                $output['message'] = 'Enrollment failed. Please try again later.';
                            }
                        }
                    } else {
                        // CREDIT CARD PAYMENT
                        // .....
                        // get from db check if multiple
                        $check = DB::table('user_courses')->where('user_id',$employee_id)->where('type', 0)->where('course_id',$course->id)->first();
                        if (count($check) == 0) {
                            $paymentmethod = 1;
                            if ($course->price == 0) {
                                $paymentmethod = 3;
                            }
                            $transaction_item_id = $this->insertTransactions(Session::get('LAD_user_id'),$course->id,$course->price,$paymentmethod,$employee_id);
                            $id = DB::table('user_courses')->insertGetId([
                                                                                'user_id' => $employee_id,
                                                                                'type' => 0,
                                                                                'course_id' => $course->id,
                                                                                'registration_time' => date('Y-m-d H:i:s')
                                                                        ]);
                           
                                                                    
                            if ($id) {

                                $output['info'] = 'success';
                                //Calling sendReportmail function using parameter
                                if ($course->price == 0) {
                                        $ismailed =$this-> sendReportmail($creator,
                                                       $course->title,
                                                       $employee->name,
                                                       $employee->email,
                                                       $employee->organization,
                                                       $employee->country,'-');
                                } else {
                                    $ismailed =$this-> sendReportmail($creator,
                                                       $course->title,
                                                       $employee->name,
                                                       $employee->email,
                                                       $employee->organization,
                                                       $employee->country,'Credit Card');
                                }
                                $mail = $this->sendUserEnrollMail($employee->email, $course->title, $creator_organization, $course->coursecode);
                                $mail = $this->sendAdminRegisteredEmail($employer->email, $employee->name, $course->title, $creator_organization);
                                //End of send report email 
                                $output['message'] = 'Under development.';
                            }
                        }
                    }
                } else {
                    // USING SKILLSFUTURE CREDIT
                    // ........
                    // get from db check if multiple
                    $check = DB::table('user_courses')->where('user_id',$employee_id)->where('type', 0)->where('course_id',$course->id)->first();
                    if (count($check) == 0) {
                        $paymentmethod = 2;
                        if ($course->price == 0) {
                            $paymentmethod = 3;
                        }
                        $transaction_item_id = $this->insertTransactions(Session::get('LAD_user_id'),$course->id,$course->price,$paymentmethod,$employee_id);
                        $id = DB::table('user_courses')->insertGetId([
                                                                        'user_id' => $employee_id,
                                                                        'type' => 0,
                                                                        'course_id' => $course->id,
                                                                        'registration_time' => date('Y-m-d H:i:s')
                                                                    ]);
                        if ($id) {
                            $output['info'] = 'success';
                            //Calling sendReportmail function using parameter
                            if ($course->price == 0) {
                                $ismailed =$this-> sendReportmail($creator,
                                                   $course->title,
                                                   $employee->name,
                                                   $employee->email,
                                                   $employee->organization,
                                                   $employee->country,'-');
                            } else {
                                $ismailed =$this-> sendReportmail($creator,
                                                       $course->title,
                                                       $employee->name,
                                                       $employee->email,
                                                       $employee->organization,
                                                       $employee->country, 'SkillsFuture Credit');
                            }
                            $mail = $this->sendUserEnrollMail($employee->email, $course->title, $creator_organization, $course->coursecode);
                            $mail = $this->sendAdminRegisteredEmail($employer->email, $employee->name, $course->title, $creator_organization);
                            //End of send report email 
                        } else {
                            $output['message'] = 'Submit enrollment failed. Please try again later.';
                        }
                    }
                }
            } else {
                // EMPLOYEE NOT EXISTED
                $signup_fullname = strip_tags($request->input('enroll_fullname'));
                $signup_email = strip_tags($request->input('enroll_email'));
                $signup_country = strip_tags($request->input('enroll_country'));
                $signup_interest = strip_tags($request->input('enroll_interest'));
                $signup_industry = strip_tags($request->input('enroll_industry'));
                $signup_occupation = strip_tags($request->input('enroll_occupation'));
                $payment_option = strip_tags($request->input('enroll_paymentmethod'));
                $sfc = false;
                if (strip_tags($request->input('enroll_futurecredit')) == 1) {
                    $sfc = true;
                }

                $url = url('/');
                $userid = Session::get('LAD_user_id');
                $username = Session::get('LAD_user_name');
                $employer = DB::table('users')->where('id',$userid)->first();
                $subject = 'LAD Global | Course Invitation';
                $message = '<html>
                                <head>
                                  <title>LAD Global | Course Invitation</title>
                                </head>
                                <body>
                                    <table width=700px style="background-color:#f3f3f3; padding:20px 20px">
                                        <tr>
                                            <td>
                                                <table width=100% style="background-color: #ffffff; padding:30px 30px">
                                                    <tr><td>
                                                        <div style="display: inline-block;width: 100%">
                                                            <img src="http://ladglobal.com/img/logo-min.png" align="right" width="190px">
                                                        </div>
                                                    </td></tr>
                                                    <tr><td><br>
                                                    <tr><td><br>
                                                    <tr><td>
                                                        <p>
                                                            <h2 style="font-family: sans-serif; color:#666666; word-break: break-word;">You have been invited as an employee of '.$employer->organization.' and have been enrolled to '.$course->title.'. Click the "Confirm" button below to confirm your invitation and please sign in using the temporary password provided. Upon your successful sign in, please reset your password in "Settings" to secure your account.</h2><br>
                                                            <h2 style="font-family: sans-serif; color:#666666; word-break: break-word;">email: '.$signup_email.'</h2><br>
                                                            <h2 style="font-family: sans-serif; color:#666666; word-break: break-word;">password: '.$signup_country.$signup_interest.$signup_industry.'</h2>
                                                        </p>
                                                    </td></tr>
                                                    <tr><td><br>
                                                    <tr><td><br>
                                                    <tr><td style="cursor: pointer;">
                                                        <a href="'.$url.'/new_employee_invite?emp='.$userid.'&code='.$code.'&paymentmethod='.$payment_option.'&sfc='.$sfc.'&fullname='.$signup_fullname.'&email='.$signup_email.'&country='.$signup_country.'&interest='.$signup_interest.'&industry='.$signup_industry.'&occupation='.$signup_occupation.'"><button style="text-transform: uppercase;
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

                $ismailed = mail($signup_email, $subject, $message, implode("\r\n", $headers));
                $mail = $this->sendAdminNonUserEmail($employer->email,$signup_fullname,$course->title,$creator_organization);

                $output['info'] = 'success';
                $output['message'] = 'new_employee_invite'. '?emp='.$userid.'&code='.$code.'&paymentmethod='.$payment_option.'&sfc='.$sfc.'&fullname='.$signup_fullname.'&email='.$signup_email.'&country='.$signup_country.'&interest='.$signup_interest.'&industry='.$signup_industry.'&occupation='.$signup_occupation;
            }
        } else {
            if ($type == '1') {
                // INDIVIDUAL ENROLLMENT
                $userid = Session::get('LAD_user_id');
                $user = DB::table('users')->where('id',$userid)->first();
                $location = $user->country;
                $sfc = false;
                
                if ($location == 'SG' && $course->sfc == 1) {
                    // INDIVIDUAL BASED IN SG
                    if (strip_tags($request->input('enroll_futurecredit')) == 1) {
                        $sfc = true;
                    }
                }

                if (!$sfc) {
                    // NOT USING SKILLSFUTURE CREDIT
                    $payment_option = strip_tags($request->input('enroll_paymentmethod'));
                    if ($payment_option == 'wired') {
                        // WIRED TRANSFER
                        // get from db check if multiple
                        $check = DB::table('user_courses')->where('user_id',$userid)->where('type', 0)->where('course_id',$course->id)->first();
                        if (count($check) == 0) {
                            $paymentmethod = 0;
                            if ($course->price == 0) {
                                $paymentmethod = 3;
                            }
                            $transaction_item_id = $this->insertTransactions($userid,$course->id,$course->price,$paymentmethod,$userid);
                            if ($transaction_item_id) { 
                                $id = DB::table('user_courses')->insertGetId([
                                                                                'user_id' => $userid,
                                                                                'type' => 0,
                                                                                'course_id' => $course->id,
                                                                                'registration_time' => date('Y-m-d H:i:s')
                                                                            ]);
                                if ($id) {
                                    $output['info'] = 'success';
                                    //Calling sendReportmail function using parameter
                                    if ($course->price == 0) {
                                        $ismailed =$this-> sendReportmail($creator,
                                                   $course->title,
                                                   $user->name,
                                                   $user->email,
                                                   $user->organization,
                                                   $user->country, "-");
                                    } else {
                                        $ismailed =$this-> sendReportmail($creator,
                                                       $course->title,
                                                       $user->name,
                                                       $user->email,
                                                       $user->organization,
                                                       $user->country, "Wire Transfer");
                                    }
                                    //End of send report email
                                } else {
                                    $output['message'] = 'Submit enrollment failed. Please try again later.';
                                }
                            } else {
                                $output['message'] = 'Enrollment failed. Please try again later.';
                            }
                        }
                    } else {
                        // CREDIT CARD PAYMENT
                        // .....
                        // get from db check if multiple
                        $check = DB::table('user_courses')->where('user_id',$userid)->where('type', 0)->where('course_id',$course->id)->first();
                        if (count($check) == 0) {
                            $paymentmethod = 1;
                            if ($course->price == 0) {
                                $paymentmethod = 3;
                            }
                            $transaction_item_id = $this->insertTransactions($userid,$course->id,$course->price,$paymentmethod,$userid);
                            $id = DB::table('user_courses')->insertGetId([
                                                                                'user_id' => $userid,
                                                                                'type' => 0,
                                                                                'course_id' => $course->id,
                                                                                'registration_time' => date('Y-m-d H:i:s')
                                                                            ]);
                            if ($id) {
                                $output['info'] = 'success';
                                //Calling sendReportmail function using parameter
                                if ($course->price == 0) {
                                    $ismailed =$this-> sendReportmail($creator,
                                                       $course->title,
                                                       $user->name,
                                                       $user->email,
                                                       $user->organization,
                                                       $user->country,"-");
                                } else {
                                    $ismailed =$this-> sendReportmail($creator,
                                                       $course->title,
                                                       $user->name,
                                                       $user->email,
                                                       $user->organization,
                                                       $user->country,"Credit Card");
                                }
                                //End of send report email 
                                $output['message'] = 'Under development.';
                            }
                        }
                    }
                } else {
                    // USING SKILLSFUTURE CREDIT
                    // ........
                    // get from db check if multiple
                    $check = DB::table('user_courses')->where('user_id',$userid)->where('type', 0)->where('course_id',$course->id)->first();
                    if (count($check) == 0) {
                        $paymentmethod = 2;
                        if ($course->price == 0) {
                            $paymentmethod = 3;
                        }
                        $transaction_item_id = $this->insertTransactions($userid,$course->id,$course->price,$paymentmethod,$userid);
                        $id = DB::table('user_courses')->insertGetId([
                                                                        'user_id' => $userid,
                                                                        'type' => 0,
                                                                        'course_id' => $course->id,
                                                                        'registration_time' => date('Y-m-d H:i:s')
                                                                    ]);
                        if ($id) {
                            $output['info'] = 'success';
                            //Calling sendReportmail function using parameter
                            if ($course->price == 0) {
                                $ismailed =$this-> sendReportmail($creator,
                                                       $course->title,
                                                       $user->name,
                                                       $user->email,
                                                       $user->organization,
                                                       $user->country,"-");
                            } else {
                                $ismailed =$this-> sendReportmail($creator,
                                                       $course->title,
                                                       $user->name,
                                                       $user->email,
                                                       $user->organization,
                                                       $user->country,"SkillsFuture Credit");
                            }
                            //End of send report email
                        } else {
                            $output['message'] = 'Submit enrollment failed. Please try again later.';
                        }
                    }
                }
            }
        }

        return json_encode($output);
    }

    /**
    * Add the transaction to transaction_carts
    *
    *@param int $user_id The user id of this user
    *@param int $course_id The course id of this course
    *@param int $amount The amount of the transaction
    *
    */
    public function insertTransactions($user_id,$course_id,$amount,$paymentmethod, $participant = 0){
        $id = DB::table('transaction_carts')->insertGetId([
                                                            'user_id' => $user_id,
                                                            'course_id' => $course_id,
                                                            'status' => 0,
                                                            'participant'=> $participant,
                                                            'payment_option' => $paymentmethod,
                                                            'time_added' => date('Y-m-d H:i:s'),
                                                            'total_amount' => $amount
                                                            ]);
        return $id;
    }

    /**
    * Sign up the other employee to enroll the course
    *
    * @param Request $request The request from ajax
    */
    public function employeeSignUpEnroll(Request $request) {
        $output = array(
            'code' => 1,
            'message' => "Your Sign Up Request is not valid. Please make it again.",
            'info' => 'error',
            );

        $employeeof = strip_tags($request->input('emp'));
        $user = DB::table('users')->where('id',$employeeof)->first();

        if ($user) {
            $signup_fullname = strip_tags($request->input('fullname'));
            $signup_email = strip_tags($request->input('email'));
            $signup_country = strip_tags($request->input('country'));
            $signup_interest = strip_tags($request->input('interest'));
            $signup_industry = strip_tags($request->input('industry'));
            $signup_occupation = strip_tags($request->input('occupation'));
            $signup_password = $signup_country.$signup_interest.$signup_industry;
            $signup_organization = $user->organization;
            $signup_phone = $user->corporate_phone_number;
            $signup_address = $user->mailing_address;
        } else {
            return json_encode($output);
        }

        $course_credits = 3;

        // Check whether email already exists
        if (!(User::where('email', '=', $signup_email)->exists())) 
        {   // user not found
            // $username = "user_".explode('@', $signup_email)[0];
            $hashed_password = hash($this->password_hash_algo, $signup_password);

            $new_user = array(
                    // 'username' => $username,
                    'name' => $signup_fullname,
                    'email' => $signup_email,
                    'password' => $hashed_password,
                    'corporate_phone_number' => $signup_phone,
                    'mailing_address' => $signup_address,
                    'country' => $signup_country,
                    'interest' => $signup_interest,
                    'industry' => $signup_industry,
                    'occupation' => $signup_occupation,
                    'organization' => $signup_organization,
                    'type' => 2,
                    'employee_of' => $employeeof,
                    'corporate_admin_occupation' => null,
                    'course_credits' => $course_credits,
                    'created_at' => date("Y-m-d H:i:s")
                );

            $insertid = DB::table('users')->insertGetId($new_user);
            if ($insertid) 
            {   # user created, automatically login
 
                $output['info'] = 'success';
                $output['message'] = "New individual account registered successfully. Login OK.";
                $output['ID'] = $insertid;
                $output['code'] = '0';

                $code = strip_tags($request->input('code'));
                $course = DB::table('courses')->where('coursecode',$code)->first();
                $location = $signup_country;
                $sfc = strip_tags($request->input('sfc'));
                $creator =$this-> getCreatorEmail($course->id);

                if (!$sfc) {
                    // NOT USING SKILLSFUTURE CREDIT
                    $payment_option = strip_tags($request->input('paymentmethod'));
                    if ($payment_option == 'wired') {
                        // WIRED TRANSFER
                        // get from db check if multiple
                        $check = DB::table('user_courses')->where('user_id',$insertid)->where('type', 0)->where('course_id',$course->id)->first();
                        if (count($check) == 0) {
                            $paymentmethod = 0;
                            if ($course->price == 0) {
                                $paymentmethod = 3;
                            }
                            $transaction_item_id = $this->insertTransactions($employeeof,$course->id,$course->price,$paymentmethod,$insertid);
                            if ($transaction_item_id) { 
                                $id = DB::table('user_courses')->insertGetId([
                                                                                'user_id' => $insertid,
                                                                                'type' => 0,
                                                                                'course_id' => $course->id,
                                                                                'registration_time' => date('Y-m-d H:i:s')
                                                                            ]);
                                if ($id) {
                                    $output['info'] = 'success';
                                    if ($course->price == 0) {
                                        $ismailed =$this-> sendReportmail($creator,
                                                   $course->title,
                                                   $signup_fullname,
                                                   $signup_email,
                                                   $signup_organization,
                                                   $signup_country,'-');
                                    } else {
                                        $ismailed =$this-> sendReportmail($creator,
                                                       $course->title,
                                                       $signup_fullname,
                                                       $signup_email,
                                                       $signup_organization,
                                                       $signup_country,'Wire Transfer');
                                    }
                                } else {
                                    $output['message'] = 'Submit enrollment failed. Please try again later.';
                                }
                            } else {
                                $output['message'] = 'Enrollment failed. Please try again later.';
                            }
                        }
                    } else {
                        // CREDIT CARD PAYMENT
                        // .....
                        // get from db check if multiple
                        $check = DB::table('user_courses')->where('user_id',$insertid)->where('type', 0)->where('course_id',$course->id)->first();
                        if (count($check) == 0) {
                            $paymentmethod = 1;
                            if ($course->price == 0) {
                                $paymentmethod = 3;
                            }
                            $transaction_item_id = $this->insertTransactions($employeeof,$course->id,$course->price,$paymentmethod,$insertid);
                            $id = DB::table('user_courses')->insertGetId([
                                                                                'user_id' => $insertid,
                                                                                'type' => 0,
                                                                                'course_id' => $course->id,
                                                                                'registration_time' => date('Y-m-d H:i:s')
                                                                            ]);
                            if ($id) {
                                $output['info'] = 'success';
                                if ($course->price == 0) {
                                    $ismailed =$this-> sendReportmail($creator,
                                                       $course->title,
                                                       $signup_fullname,
                                                       $signup_email,
                                                       $signup_organization,
                                                       $signup_country,'-');
                                } else {
                                    $ismailed =$this-> sendReportmail($creator,
                                                       $course->title,
                                                       $signup_fullname,
                                                       $signup_email,
                                                       $signup_organization,
                                                       $signup_country,'Credit Card');
                                }
                            } else {
                                $output['message'] = 'Submit enrollment failed. Please try again later.';
                            }
                        }
                    }
                } else {
                    // USING SKILLSFUTURE CREDIT
                    // ........
                    // get from db check if multiple
                    $check = DB::table('user_courses')->where('user_id',$insertid)->where('type', 0)->where('course_id',$course->id)->first();
                    if (count($check) == 0) {
                        $paymentmethod = 2;
                            if ($course->price == 0) {
                                $paymentmethod = 3;
                            }
                        $transaction_item_id = $this->insertTransactions($employeeof,$course->id,$course->price,$paymentmethod,$insertid);
                        $id = DB::table('user_courses')->insertGetId([
                                                                        'user_id' => $insertid,
                                                                        'type' => 0,
                                                                        'course_id' => $course->id,
                                                                        'registration_time' => date('Y-m-d H:i:s')
                                                                    ]);
                        if ($id) {
                            $output['info'] = 'success';
                            if ($course->price == 0) {
                                $ismailed =$this-> sendReportmail($creator,
                                                       $course->title,
                                                       $signup_fullname,
                                                       $signup_email,
                                                       $signup_organization,
                                                       $signup_country,'-');
                            } else {
                                $ismailed =$this-> sendReportmail($creator,
                                                       $course->title,
                                                       $signup_fullname,
                                                       $signup_email,
                                                       $signup_organization,
                                                       $signup_country,'SkillsFuture Credit');
                            }
                        } else {
                            $output['message'] = 'Submit enrollment failed. Please try again later.';
                        }
                    }
                }

                $email = $this->sendEmail($signup_fullname, $signup_email);

                return redirect()->action('HomeController@index');


                                                   
            }
            else
            {   # user not created
                $output['message'] = "Failed to register new individual account. Please try again later.";
                $output['code'] = '13';
            }
        }
        else
        {   # User already exists
            $account_type = $this->get_account_type($signup_email);
            if ($account_type) 
            {   # Account type found
                if ($account_type == $this->account_type_google) 
                {   # Registered via Google
                    $output['message'] = "This email address is already registered with a Google account. Please use the 'Sign in with Google option'.";
                }
                else if($account_type == $this->account_type_facebook)
                {   # Registered via Facebook
                    $output['message'] = "This email address is already registered with a Facebook account. Please use the 'Sign in with Facebook option'.";
                }
                else if($account_type == $this->account_type_normal_corporate)
                {   # Registered via email-password (Corporate)
                    $output['message'] = "This email address is already registered with a Corporate LADGlobal account. Please sign in with your email and password.";
                }
                else if($account_type == $this->account_type_normal)
                {   # Registered via email-password
                    $output['message'] = "This email address is already registered with an Individual LADGlobal account. Please sign in with your email and password.";
                }
            }
            $output['code'] = '12';
        }
        
        return json_encode($output);
    }

    /**
    *
    *This function is use to send welcome mail
    *
    *@param string $name the name of user
    *@param string $to_email the destination email address 
    */
    public function sendEmail ($name, $to_email) {
        $url = url('/');
        $to = $to_email;
        $subject = 'Welcome to LAD Global';
        $message = '
                    <html>
                        <head>
                          <title>Welcome to LAD Global</title>
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
                                                    <h2 style="font-family: sans-serif; color:#666666; word-break: break-word;">Hello '.$name.',</h2>
                                                    <br>
                                                    <h2 style="font-family: sans-serif; color:#666666; word-break: break-word;">Welcome to LAD!</h2>
                                                    <br>
                                                    <h2 style="font-family: sans-serif; color:#666666; word-break: break-word;">On our platform, you can sign-up for courses from all over the world, take part in learning marketplace as a corporate user and grow your network. The contents available on LAD are open to anyone and available anytime, anywhere.</h2>
                                                    <br>
                                                    <h2 style="font-family: sans-serif; color:#666666; word-break: break-word;">We are redefining workplace learning so that everyone can keep themselves relevant through the holistic and revolutionary community-driven platform. We’re here to help you stay competitive and tap on new opportunities!</h2>
                                                    <br>
                                                    <h2 style="font-family: sans-serif; color:#666666; word-break: break-word;">LAD Global Team</h2>
                                                </p>
                                            </td></tr>
                                            <tr><td><br>
                                            <tr><td><br>
                                            <tr><td>
                                                <a href="'.$url.'/browsecourses"><button style="text-transform: uppercase;
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
                                                transition: all 0.5s;">Start Searching Courses Here</button></a>
                                            </td></tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                        </body>
                    </html>
                    ';
        $type = 'html'; // or HTML
        $charset = 'utf-8';

        // $mail     = 'noreply@ladglobal.com';
        // $uniqid   = md5(uniqid(time()));
        // $headers  = 'From: '.$mail."\r\n";
        // $headers .= 'Reply-to: '.$mail."\r\n";
        // $headers .= 'Return-Path: '.$mail."\r\n";
        // $headers .= 'Message-ID: <'.$uniqid.'@'.$_SERVER['SERVER_NAME'].">\r\n";
        // $headers .= 'MIME-Version: 1.0'."\r\n";
        // $headers .= 'Date: '.gmdate('D, d M Y H:i:s', time())."\r\n";
        // $headers .= 'X-Priority: 1'."\r\n";
        // $headers .= 'X-MSMail-Priority: Normal'."\r\n";
        // $headers .= 'Content-Type: multipart/mixed;boundary="----------'.$uniqid.'"'."\r\n";
        // $headers .= '------------'.$uniqid."\r\n";
        // $headers .= 'Content-type: text/'.$type.';charset='.$charset.''."\r\n";
        // $headers .= 'Content-transfer-encoding: 7bit';

        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';

        // Additional headers
        $headers[] = 'From: LAD Global <noreply@ladglobal.com>';

        // return mail($to, $subject, $message, $headers);
        return mail($to, $subject, $message, implode("\r\n", $headers));
    }

    /**
    * This function is getting module
    *@param int $cid The course id of this course
    *@param int $module The module number of this module
    *  
    */
    public function getModule ($cid, $module) {
        $output = DB::table('modules')->where('course_id',$cid)->where('module_number',$module)->first();
        return json_encode($output);
    }

    /**
    * Update course progress status
    *
    *@param int $cid The course id of this course
    *@param decimal $progress The progress of tihs course
    */
    public function updateCourseProgress ($cid, $progress) {
        $userid = Session::get('LAD_user_id');

        $output = array(
            'info' => 'error',
            'message' => 'Your request could not be processed. Please try again later.',
            'code' => '0' 
            );

        $getProgress = DB::table('user_courses')->where('course_id',$cid)->where('user_id',$userid)->where('type',0)->first()->progress;
        $update['progress'] = $progress + $getProgress;
        if ($update['progress'] > 100) {
            $update['progress'] = 100;
        }
        $doUpdate = DB::table('user_courses')->where('course_id',$cid)->where('user_id',$userid)->where('type',0)->update($update);

        if ($update != 0) {
            $output['info'] = 'success';
            $output['message'] = 'Your course progress has been updated.';
            $output['code'] = '0';
        }

        return json_encode($output);
    }

    /**
    *
    * Get the current progress of the course
    *
    * @param int $cid The course id of this course
    */
    public function getCurrentProgress ($cid) {
        $userid = Session::get('LAD_user_id');

        $output = array(
            'info' => 'error',
            'message' => 'Your request could not be processed. Please try again later.',
            'code' => '0' 
            );

        $getProgress = DB::table('user_courses')->where('course_id',$cid)->where('user_id',$userid)->where('type',0)->first()->progress;

        if ($getProgress != null) {
            $output['info'] = 'success';
            $output['message'] = 'Your course progress has been updated.';
            $output['value'] = $getProgress;
            $output['code'] = '0';
        }

        return json_encode($output);
    }

}
