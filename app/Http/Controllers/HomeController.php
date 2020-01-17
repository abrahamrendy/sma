<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Homepage;
use Validator;
use Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class HomeController extends Controller
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
    * Generated the index page
    */
    public function index()
    {
                 
        return view('header', ['homeflag' => true])->withTitle('Home - KATARTIZO Mission Academy').
                view('index').
                view('footer');
        // return "asd";
    }

    /**
    * Display about account info
    */
    public function accountinfo()
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

        return view('header', ['user_industries' => $user_industries,
                                'user_interests' => $courses_categories,
                                'user_occupations' => $user_occupations,
                                'courses_categories' => $courses_categories])->withTitle('LAD Global | Account Info').view('accountinfo').view('footer');
    }

    /**
    * Display the curriculum page
    */
    public function curriculum()
    {
        return view('header', ['curriculumflag' => true])->withTitle('Curriculum - KATARTIZO Mission Academy').view('curriculum').view('footer');
    }

    /**
    * Display the pricing plans page
    */
    public function pricingplans()
    {
        return view('header', ['pricingplansflag' => true])->withTitle('LAD Global | Pricing & Plans').view('pricingplans').view('footer');
    }

    /**
    * This function is used to redirect into 404 page not found
    */
    public function search_404()
    {
        return redirect('/index');
    }

    /**
    * Display the privacy and policy page
    */
    public function privacypolicy()
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

        return view('header', ['user_industries' => $user_industries,
                                'user_interests' => $courses_categories,
                                'user_occupations' => $user_occupations,
                                'courses_categories' => $courses_categories])->withTitle('LAD Global | Privacy Policy').
                view('privacypolicy').
                view('footer');
    }

    /**
    * This function is used to show the terms of service page
    */
    public function termsofservice()
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
        return view('header', ['user_industries' => $user_industries,
                                'user_interests' => $courses_categories,
                                'user_occupations' => $user_occupations,
                                'courses_categories' => $courses_categories])->withTitle('LAD Global | Terms of Service').
                view('termsofservice').
                view('footer');
    }

    /**
    * Display the contact us page
    */
    public function contactus()
    {
        return view('header')->withTitle('Contact Us - KATARTIZO Mission Academy').
                view('contactus').
                view('footer');
    }

    public function register($output = array())
    {
        if ($output == null) {
            return view('header', ['registerflag' => true])->withTitle('Register - KATARTIZO Mission Academy').
                view('contactus').
                view('footer');    
        } else {
            return view('header', ['registerflag' => true])->withTitle('Register - KATARTIZO Mission Academy').
                view('contactus', ['output' => $output]).
                view('footer');
        }
        
    }

    /**
    * This function is used to handle contact us form
    */
    public function contactus_submit(Request $request)
    {   # AJAX Call
        $output = array(
            'info' => 'error',
            'message' => 'Unable to contact us. Please try again later.',
            'code' => 'x' 
            );

        $text_regex = "/^[ A-Za-zÀ-ÿ0-9_#!?.,-]+$/";
        $rules_normal = array(
            'cu_firstname' => ['required', 'min:0', 'max:50', 'regex:'.$text_regex],
            'cu_lastname' => ['required', 'min:0', 'max:50', 'regex:'.$text_regex],
            'cu_email' => 'required|email|max:100',
            'cu_company' => ['nullable', 'min:3', 'max:50', 'regex:'.$text_regex],
            'cu_country' => 'required|alpha|min:1|max:5',
            'cu_phone' => 'nullable|max:20|regex:/^\+?\d+$/',
            'cu_interested_in' => ['nullable', 'min:3', 'max:255', 'regex:'.$text_regex],
            'cu_message' => ['required', 'min:3', 'max:255', 'regex:'.$text_regex]
            );
        $messages_normal = array(
            'cu_firstname.required' => 'The first name is required.',
            'cu_firstname.min' => 'The first name must be more than :min characters long.',
            'cu_firstname.max' => 'The first name must be less than :max characters long.',
            'cu_firstname.regex' => 'The first name must be in alpha-numeric characters or accented characters or dashes and underscores and spaces.',

            'cu_lastname.required' => 'The last name is required.',
            'cu_lastname.min' => 'The last name must be more than :min characters long.',
            'cu_lastname.max' => 'The last name must be less than :max characters long.',
            'cu_lastname.regex' => 'The last name must be in alpha-numeric characters or accented characters or dashes and underscores and spaces.',

            'cu_email.required' => 'The email is required.',
            'cu_email.email' => 'The email must be in a valid email format.',
            'cu_email.max' => 'The email must be less than :max characters long.',

            'cu_company.min' => 'The Company Name must be more than :min characters long.',
            'cu_company.max' => 'The Company Name must be less than :max characters long.',
            'cu_company.regex' => 'The Company Name must be in alpha-numeric characters or accented characters or dashes and underscores and spaces.',

            'cu_country.required' => 'The country code is required.',
            'cu_country.alpha' => 'The country code must only contain alphabetic characters.',
            'cu_country.min' => 'The country code must be more than :min characters long.',
            'cu_country.max' => 'The country code must be less than :max characters long.',

            'cu_phone.max' => 'The phone number must be less than :max characters long.',
            'cu_phone.regex' => 'The account phone number be in a valid phone number format.',

            'signup_password.required' => 'The password is required.',
            'signup_password.min' => 'The password must be more than :min characters long.',
            'signup_password.max' => 'The password must be less than :max characters long.',

            'cu_interested_in.min' => 'The interest must be more than :min characters long.',
            'cu_interested_in.max' => 'The interest must be less than :max characters long.',
            'cu_interested_in.regex' => 'The interest must be in alpha-numeric characters or accented characters or dashes and underscores and spaces.',

            'cu_message.required' => 'The message is required.',
            'cu_message.min' => 'The message must be more than :min characters long.',
            'cu_message.max' => 'The message must be less than :max characters long.',
            'cu_message.regex' => 'The message must be in alpha-numeric characters or accented characters or dashes and underscores and spaces.'
            );
        $validator_normal = Validator::make($request->only('cu_firstname',
                                                            'cu_lastname',
                                                            'cu_email',
                                                            'cu_company',
                                                            'cu_country',
                                                            'cu_phone',
                                                            'cu_interested_in',
                                                            'cu_message'), $rules_normal, $messages_normal);
        if ($validator_normal->fails()) 
        {   # Validation failed 
            $errors = $validator_normal->errors();

            // Display all errors in arrays
            // $message = $validator_normal->messages();

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
            $new_contactus = array(
                'first_name' => strip_tags($request->input('cu_firstname')),
                'last_name' => strip_tags($request->input('cu_lastname')),
                'email' => strip_tags($request->input('cu_email')),
                'country' => strip_tags($request->input('cu_country')),
                'message' => strip_tags($request->input('cu_message')),
                'created_time' => date("Y-m-d H:i:s"),
                ); 
            if ($request->input('cu_company')) {
                $new_contactus['company'] = strip_tags($request->input('cu_company'));
            }
            if ($request->input('cu_phone')) {
                $new_contactus['phone'] = strip_tags($request->input('cu_phone'));
            }
            if ($request->input('cu_interested_in')) {
                $new_contactus['interested_in'] = strip_tags($request->input('cu_interested_in'));
            }

            $insertid = DB::table('contactus')->insertGetId($new_contactus);
            if ($insertid) 
            {   # contactus created
                $output['info'] = 'success';
                $output['message'] = "Your message has been sent.";
                $output['code'] = '0';         

                $url = url('/');
                $to = 'info@ladglobal.com';
                $subject = 'Message From '.$new_contactus['first_name'].' '.$new_contactus['last_name'];
                $message = '
                            <html>
                                <head>
                                  <title>Contact Us</title>
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
                                                            <h2 style="font-family: sans-serif; color:#666666; word-break: break-word;">Name: '.$new_contactus['first_name'].' '.$new_contactus['last_name'].', Email: '.$new_contactus['email'].'</h2>
                                                            <br>
                                                            <h2 style="font-family: sans-serif; color:#666666; word-break: break-word;">Company: '.$new_contactus['company'].', Phone:'.$new_contactus['phone'].', Interested in: '.$new_contactus['interested_in'].'</h2>
                                                            <br>
                                                            <h2 style="font-family: sans-serif; color:#666666; word-break: break-word;">'.$new_contactus['message'].'</h2>
                                                            <br>
                                                        </p>
                                                    </td></tr>
                                                    <tr><td><br>
                                                    <tr><td><br>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>

                                </body>
                            </html>
                            ';
                $type = 'html'; // or HTML
                $charset = 'utf-8';

                $headers[] = 'MIME-Version: 1.0';
                $headers[] = 'Content-type: text/html; charset=iso-8859-1';

                // Additional headers
                $headers[] = 'From: '.$new_contactus['email'];

                mail($to, $subject, $message, implode("\r\n", $headers));                      
            }
            else
            {   # user not created
                $output['message'] = "Unable to process your message. Please try again later.";
                $output['code'] = '2';
            }
        }

        return json_encode($output);
    }

    public function register_submit(Request $request)
    {
        $output = array(
            'info' => 'error',
            'message' => 'Unable to contact us. Please try again later.',
            'code' => 'x' 
            );

        if ($request->hasFile('akte')){
            $photoname = $request->input('firstname').'_AKTE';
            $addPhoto = $photoname.'.'.$request->file('akte')->getClientOriginalExtension();
            $akte = Storage::putFileAs('akte', $request->file('akte'), $addPhoto);
        }

        if ($request->hasFile('ktp')){
            $photoname = $request->input('firstname').'_KTP';
            $addPhoto = $photoname.'.'.$request->file('ktp')->getClientOriginalExtension();
            $ktp = Storage::putFileAs('ktp', $request->file('ktp'), $addPhoto);
        }

        if ($request->hasFile('ijazah')){
            $photoname = $request->input('firstname').'_IJAZAH';
            $addPhoto = $photoname.'.'.$request->file('ijazah')->getClientOriginalExtension();
            $ijazah = Storage::putFileAs('ijazah', $request->file('ijazah'), $addPhoto);
        }

        if ($request->hasFile('pasfoto')){
            $photoname = $request->input('firstname').'_PASFOTO';
            $addPhoto = $photoname.'.'.$request->file('pasfoto')->getClientOriginalExtension();
            $pasfoto = Storage::putFileAs('pasfoto', $request->file('pasfoto'), $addPhoto);
        }
        
        $new_contactus = array(
            'name' => strip_tags($request->input('firstname')),
            'gender' => strip_tags($request->input('gender')),
            'ttl' => date("Y-m-d H:i:s", strtotime(strip_tags($request->input('ttl')))),
            'phone' => strip_tags($request->input('phone')),
            'email' => strip_tags($request->input('email')),
            'alamat' => strip_tags($request->input('alamat')),
            'statuspelayanan' => strip_tags($request->input('statuspelayanan')),
            'message' => strip_tags($request->input('message')),
            'akte' => $akte,
            'ktp' => $ktp,
            'ijazah' => $ijazah,
            'pasfoto' => $pasfoto,
            'created_time' => date("Y-m-d H:i:s"),
            'status' => 0,
            ); 

        $insertid = DB::table('contactus')->insertGetId($new_contactus);
        if ($insertid) 
        {   # contactus created
            $output['info'] = 'success';
            $output['message'] = "Thank you! You've completed your registration proccess.";
            $output['code'] = '0';         

                              
        }
        else
        {   # user not created
            $output['message'] = "Unable to process your message. Please try again later.";
            $output['code'] = '2';
        }
        

        return $this->register($output);

        return json_encode($output);   
    }

    /**
    * Display the about us page
    */
    public function aboutus()
    {

        return view('header', ['lecturerflag' => true])->withTitle('Lecturers - KATARTIZO Mission Academy').
                view('lecturers').
                view('footer');
    }
    
    /**
    * Display the faq page 
    */
    public function helpfaq()
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
                                
        $faq_contents = array(
            //Account Setup
            array(
                'title' => '<strong><p id="accountsetup" style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 19pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Account Setup</span></p></strong>',
                'contents' => array(' 
                                        <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
                                        <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Signing up</span></strong></p>
                                        <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">You can sign up as individual or corporate account</span></p>
                                        <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Differences:</span></p>
                                        <section id="testimonial">
                                            <div class="container">
                                              <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                  <div class="testimonial_area wow fadeIn" data-wow-duration="1s">
                                                    <div class="testimon_nav" style="width: 100%; margin-bottom: 30px;">
                                                      <ul>
                                                        <li class="accountinfoli">
                                                          <div class="accountinfocontents">
                                                            <div class="accountinfocontentstitle">
                                                              <img src="'.url("/").'/img/individual-min.png" alt="img">
                                                            </div>
                                                            <div class="testimonial_content_text_div">
                                                              <div class="testimonial_content_text_content">
                                                                <p>Individual</p>
                                                                <div class="testimonial_content_text_content_list">
                                                                  <div class="testimonial_content_text_content_list_content">
                                                                    <div class="contentcontainer">
                                                                      <img src="'.url("/").'/img/listyes-min.png" alt="logo">
                                                                      <p>Personalized Content</p>   
                                                                    </div>
                                                                  </div>
                                                                  <div class="testimonial_content_text_content_list_content">
                                                                    <div class="contentcontainer">
                                                                      <img src="'.url("/").'/img/listyes-min.png" alt="logo">
                                                                      <p>Enroll for Courses</p> 
                                                                    </div>
                                                                  </div>
                                                                  <div class="testimonial_content_text_content_list_content">
                                                                    <div class="contentcontainer">
                                                                      <img src="'.url("/").'/img/listyes-min.png" alt="logo">
                                                                      <p>Earn Badges</p> 
                                                                    </div>
                                                                  </div>
                                                                  <div class="testimonial_content_text_content_list_content">
                                                                    <div class="contentcontainer">
                                                                      <img src="'.url("/").'/img/listno-min.png" alt="logo">
                                                                      <p>Post Courses</p> 
                                                                    </div>
                                                                  </div>
                                                                  <div class="testimonial_content_text_content_list_content bottom">
                                                                    <div class="contentcontainer">
                                                                      <img src="'.url("/").'/img/listno-min.png" alt="logo">
                                                                      <p>Request for & Submit Proposals</p>   
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>  
                                                            </div>
                                                          </div>
                                                        </li>
                                                        <li class="accountinfoli">
                                                          <div class="accountinfocontents">
                                                            <div class="accountinfocontentstitle">
                                                              <img src="'.url("/").'/img/corporate-min.png" alt="img">
                                                            </div>
                                                            <div class="testimonial_content_text_div">
                                                              <div class="testimonial_content_text_content">
                                                                <p>Corporate</p>
                                                                <div class="testimonial_content_text_content_list">
                                                                  <div class="testimonial_content_text_content_list_content">
                                                                    <div class="contentcontainer">
                                                                      <img src="'.url("/").'/img/listyes-min.png" alt="logo">
                                                                      <p>Personalized Content</p>   
                                                                    </div>
                                                                  </div>
                                                                  <div class="testimonial_content_text_content_list_content">
                                                                    <div class="contentcontainer">
                                                                      <img src="'.url("/").'/img/listyes-min.png" alt="logo">
                                                                      <p>Enroll for Courses</p> 
                                                                    </div>
                                                                  </div>
                                                                  <div class="testimonial_content_text_content_list_content">
                                                                    <div class="contentcontainer">
                                                                      <img src="'.url("/").'/img/listyes-min.png" alt="logo">
                                                                      <p>Earn Badges</p> 
                                                                    </div>
                                                                  </div>
                                                                  <div class="testimonial_content_text_content_list_content">
                                                                    <div class="contentcontainer">
                                                                      <img src="'.url("/").'/img/listyes-min.png" alt="logo">
                                                                      <p>Post Courses</p> 
                                                                    </div>
                                                                  </div>
                                                                  <div class="testimonial_content_text_content_list_content bottom">
                                                                    <div class="contentcontainer">
                                                                      <img src="'.url("/").'/img/listyes-min.png" alt="logo">
                                                                      <p>Request for & Submit Proposals</p>   
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>  
                                                            </div>
                                                          </div>
                                                        </li>
                                                      </ul>
                                                      
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </section>
                                        <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">We recommend you signing up as </span><strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">corporate user</span></strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"> if you intend to do any of these activities:</span></p>
                                        <ul style="margin-top: 0pt; margin-bottom: 0pt;">
                                        <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">You regularly conduct workshop/seminars and will be posting it on LAD</span></li>
                                        <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Your are curating courses for your employees/team members to sign up</span></li>
                                        <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">You regularly take part in offering consultancy service to corporate or are open to consider doing so</span></li>
                                        <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">You are regularly looking for training vendors to offer learning solutions for your organization</span></li>
                                        <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">You are regularly curating for resources relevant for workplace learning in your organization.</span></li>
                                        </ul>
                                        <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
                                        <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">We recommend you signing up as </span><strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">individual user</span></strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">:</span></p>
                                        <ul style="margin-top: 0pt; margin-bottom: 0pt;">
                                        <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">You are representing yourself and wanting to browse for different courses on LAD for personal professional development</span></li>
                                        <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Have an interest in workplace learning and keen to keep abreast of the latest in marketplace</span></li>
                                        <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Looking to upgrade yourself via different training courses available worldwide and are open to other professional opportunities.</span></li>
                                        </ul>
                                        <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
                                        <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Other methods to sign up:</span></p>
                                        <ul style="margin-top: 0pt; margin-bottom: 0pt;">
                                        <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Google: login using your existing Google account to get started on LAD by clicking on the Google icon</span></li>
                                        <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Facebook: login using your existing Facebook account to get started on LAD by clicking on the Facebook icon</span></li>
                                        </ul>',
                                        '<p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
                                        <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Changing your account credentials</span></strong></p>
                                        <ul style="margin-top: 0pt; margin-bottom: 0pt;">
                                        <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Login to your account</span></li>
                                        <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Click on your account name on the top left corner section of the site to prompt a drop down menu </span></li>
                                        <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Click on Settings</span></li>
                                        <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Change the details of your information as needed</span></li>
                                        <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Click save button to implement the changes</span></li>
                                        </ul>',
                                        '<p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
                                        <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Changing your password</span></strong></p>
                                        <ul style="margin-top: 0pt; margin-bottom: 0pt;">
                                        <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Login to your account</span></li>
                                        <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Click on your account name on the top left corner section of the site to prompt a drop down menu </span></li>
                                        <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Click on Settings</span></li>
                                        <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Scroll down to the bottom of the page</span></li>
                                        <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Insert your current account password followed by new password on the second and last text field after that</span></li>
                                        <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Click save button to implement the changes</span></li>
                                        </ul>',
                                        '<p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
                                        <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Creating multiple accounts on LAD</span></strong></p>
                                        <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">In the scenario that you would like to use LAD to represent your own personal learning and your organisation&rsquo;s learning needs, you can create both individual account and corporate account under two different email accounts</span></p>',
                                        '<p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
                                        <p id = "enrollment_article" style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Incorporating an user as employee of your corporate account</span></strong></p>
                                        <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">If you have an employee who is an existing LAD user, you can add him/her into your list of employee. </span></p>
                                        <ul style="margin-top: 0pt; margin-bottom: 0pt;">
                                        <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Login to your account</span></li>
                                        <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Click on your account name on the top left corner section of the site to prompt a drop down menu </span></li>
                                        <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Click on My Dashboard</span></li>
                                        <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Select Employee List on the left panel menu bar</span></li>
                                        <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Insert the email address of your employee&rsquo;s LAD account to send an invitation as employee user of your corporate account</span></li>
                                        <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Ask your employee to check his/her email account for the invitation and confirm the invitation</span></li>
                                        </ul>
                                        <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
                                        <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Things to note:</span></p>
                                        <ul style="margin-top: 0pt; margin-bottom: 0pt;">
                                        <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Making employee as </span><strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">ADMIN</span></strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"> will allow the individual to have access to posting of courses, sending proposals and submitting customized course requests on behalf of the company. Please ensure that your employee has official to represent the company for these matters before making him/her an admin</span></li>
                                        <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Corporates can enroll the employees easily into courses available on LAD </span></li>
                                        </ul>',
                                        '<p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
                                        <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Premium user subscription</span></strong></p>
                                        <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Premium subscription is a feature that will allow users to post <strong>MORE</strong> public workshops/contents and submission of proposals. Currently, free basic user subscription will only up to 5 public workshops and 3 corporate proposals. </span></p>
                                        <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
                                        <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Premium user subscription is also a privilege offered for STADA&rsquo;s members and other partners&rsquo; network. </span></p>
                                        <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
                                        <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><a style="text-decoration: none;" href="https://ladglobal.com/contactus"><span style="font-size: 12pt; font-family: Roboto; color: #1155cc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: underline; vertical-align: baseline; white-space: pre-wrap;">Contact us</span></a><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"> to enquire about premium user subscription upgrade.</span></p>
                                    ')
                ),
    /*        //Enrollment
            array(
                'title' => 'Enrollment',
                'contents' => array('Enroll in a course', 
                                    'Enrollment options',
                                    'Find courses to take',
                                    'Session schedules',
                                    'Switch to a different session',
                                    'Platform change',
                                    'See all 7 articles')
                ),*/
            //Learning On LAD
            array(
                'title' => '<strong><p id="learningonlad" style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 19pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Learning on LAD</span></p></strong>',
                'contents'=> array('
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Type of contents available on LAD</span></strong></p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">There are both online and offline courses (on-site training/workshop) currently offered on LAD.</span></p>',
                                    '<p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Browsing courses</span></strong></p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><a style="text-decoration: none;" href="https://ladglobal.com/browsecourses"><span style="font-size: 12pt; font-family: Roboto; color: #1155cc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: underline; vertical-align: baseline; white-space: pre-wrap;">Click here</span></a><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"> to browse different courses and navigate using the different options to shortlist contents relevant to your professional development. </span></p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">The browse courses section can also be accessed from your user dashboard.</span></p>',
                                    '<p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Featured courses</span></strong></p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Featured courses highlights selected contents that offer high-quality workshops. This will also be an option for course creators to get their courses being displayed in a more prominent way. To find out how you can get your courses being featured, </span><a style="text-decoration: none;" href="https://ladglobal.com/contactus"><span style="font-size: 12pt; font-family: Roboto; color: #1155cc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: underline; vertical-align: baseline; white-space: pre-wrap;">talk to us.</span></a></p>',
                                    '<p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Knowledge partners</span></strong></p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">LAD is working with established institutions around the world to offer high quality courses for our users. To find out how you can be knowledge partner of LAD, </span><a style="text-decoration: none;" href="https://ladglobal.com/contactus"><span style="font-size: 12pt; font-family: Roboto; color: #1155cc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: underline; vertical-align: baseline; white-space: pre-wrap;">talk to us.</span></a></p>',
                                    '<p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Signing up for employees</span></strong></p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt ;font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">If you have a corporate account, you can easily enroll your existing employees (to find out how to add employee into your corporate account, see <a style="text-decoration: none;" href ="#enrollment_article"><span style="font-size: 12pt; font-family: Roboto; color: #1155cc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: underline; vertical-align: baseline; white-space: pre-wrap;">this article</span></a>) into courses available on LAD by simply clicking on &lsquo;Enroll&rsquo; button found in each course. </span></p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">If your employee is not in your list yet, select &lsquo;Other Employee&rsquo; to submit the particulars of the individual to the course organizer.</span></p>',
                                    '<p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Payment methods</span></strong></p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Currently, you can sign up and settle the enrollment investment via:</span></p>
                                    <ul style="margin-top: 0pt; margin-bottom: 0pt;">
                                    <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Credit card/Paypal:</span></strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"> our team will send you a link as follow-up to settle the registration cost. You can use normal credit card option or paypal to pay for the enrollment.</span></li>
                                    <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Wire Transfer: </span></strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">our team will send you the instructions for telegraphic transfer for the payment of the enrollment.</span></li>
                                    </ul>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">All payment will be followed up by LAD&rsquo;s administration team.</span></p>',
                                    '<p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Online and offline courses</span></strong></p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">The two types of courses available on LAD:</span></p>
                                    <ul style="margin-top: 0pt; margin-bottom: 0pt;">
                                    <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Online courses:</span></strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"> offered in bite-sized, video format learning -- users will typically be able to unlock the course contents upon successful enrollment.</span></li>
                                    <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Offline courses: </span></strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">on-site workshop -- users will be required to visit the physical venue where the training is going to be conducted.</span></li>
                                    </ul>',
                                    '<p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Cancelled or postponed classes</span></strong></p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Registrants of courses will receive a notification of cancelled or postponed classes via their email. The payment will be fully refunded upon case of cancellation and users will be given the option to enroll for subsequent class if the workshop is postponed or request for full refund. </span></p>',
                                    '<p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Canceling enrollment and refunds</span></strong></p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">In case of personal accident, illness or other serious cases faced by course registrant, the corporate or individual registrant can retract the enrollment from the dashboard and refund will be provided. </span></p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">For the case of no turn-up without prior notification, course refund will not be offered. Cancellation of enrollment must be done at least 7 working days prior to a confirmed class schedule to be eligible for refund. </span></p>',
                                    '<p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Customized courses: requests, proposals, follow-ups</span></strong></p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Corporates can submit in-house training/consultancy requests and invite learning vendors to submit their quote/proposals.</span></p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Submitting requests</span></p>
                                    <ul style="margin-top: 0pt; margin-bottom: 0pt;">
                                    <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Go to your account dashboard</span></li>
                                    <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Click on customized courses</span></li>
                                    <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Under my request tab, locate and click on &lsquo;+&rsquo; button</span></li>
                                    <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Complete the step-by-step instructions and make sure you fill up all mandatory fields</span></li>
                                    <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Submitting additional information and attaching a PDF will be strongly encouraged to invite high-quality/accurate proposals from the potential vendors</span></li>
                                    </ul>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">If you are a learning vendor wishing to send a proposal for corporate project:</span></p>
                                    <ul style="margin-top: 0pt; margin-bottom: 0pt;">
                                    <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Go to your account dashboard</span></li>
                                    <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Click on customized courses</span></li>
                                    <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Click on &lsquo;Browse Other Requests&rsquo; tab</span></li>
                                    <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Select or browse requests that might be relevant to your expertise</span></li>
                                    <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Fill up all the relevant fields</span></li>
                                    <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Upload a PDF that supports your proposal</span></li>
                                    </ul>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Follow-ups</span></p>
                                    <ul style="margin-top: 0pt; margin-bottom: 0pt;">
                                    <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Go to your account dashboard</span></li>
                                    <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Click on customized courses</span></li>
                                    <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">If you have submitted a request and received proposals, there will be relevant alerts displayed in each request. You may select to view more information and choose to accept or reject proposals. Accepting the proposal will prompt you to suggest a scheduled meeting with the learning vendor.</span></li>
                                    <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">If you have submitted a proposal and will like to find out the status, click on the &lsquo;My Proposal&rsquo; tab and monitor the outcome. If your proposal is accepted and the corporate has sent you a scheduled appointment which may not work with your availability, you can always counter propose another date/time suggestion.</span></li>
                                    </ul>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;">&nbsp;</p>
                                    <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><em><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Please note that LAD reserves the right to delete or remove requests and proposals that breaches our terms of use or have abusive contents.</span></em></p>
                                ')

                ),
            
            /*//Videos
            array(
                'title' => 'Videos',
                'contents' => array('Watch video lectures', 
                                    'Change video settings',
                                    'Answer in-video questions',
                                    'Video subtitles',
                                    'Download videos',
                                    'Video translations',
                                    'See all 7 articles')
                ),
            //ID Verification
            array(
                'title' => 'ID Verification',
                'contents' => array('Set up ID verification', 
                                    'Requirements for a valid photo ID',
                                    'Solve problems with your verification')
                ),
            //Course Certificates
            array(
                'title' => 'Course Certificates',
                'contents' => array('Solve problems with LAD Global Certificates', 
                                    'Course Certificates',
                                    'Get a Course Certificate',
                                    'Share your Course Certificate',
                                    'Course Certificate vouchers')
                ),*/

            //payments
            array(
                'title' => '<p id="payments"style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 19pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Payments</span></p>',
                'contents' => array('   
                                        <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Payment methods</span></strong></p>
                                        <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Currently all transactions on LAD can be settled by:</span></p>
                                        <ul style="margin-top: 0pt; margin-bottom: 0pt;">
                                        <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Credit card/Paypal:</span></strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;"> our team will send you a link as follow-up to settle the registration cost. You can use normal credit card option or paypal to pay for the enrollment.</span></li>
                                        <li style="list-style-type: disc; font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline;"><strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Wire Transfer: </span></strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">our team will send you the instructions for telegraphic transfer for the payment of the enrollment.</span></li>
                                        </ul>
                                        <p>&nbsp;</p>
                                        <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">All payment will be followed up by LAD&rsquo;s administration team.</span></p>
                                        <p>&nbsp;</p>',
                                        '<p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Transactions</span></strong></p>
                                        <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">LAD&rsquo;s team will be following up on all transactions and payment related matter. </span></p>
                                        <p>&nbsp;</p>',
                                        '<p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Charges for posting of courses</span></strong></p>
                                        <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Listing of courses are complimentary. LAD will charge 10% for each successful enrollment. </span></p>
                                        <p>&nbsp;</p>',
                                        '<p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Settlement for course creators</span></strong></p>
                                        <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Upon collection of payment and course completion, LAD will be settling all enrollments fees received from the platform (automatic deduction of 10% service charge). Course creator and participants must verify that the course is not cancelled or postponed before settlement. </span></p>
                                    ')
                ),
            //troubleshoot problems
            array(
                'title' => '<strong><p id= "troubleshooting" style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 19pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Troubleshoot</span></p></strong>',
                'contents' => array('
                                        <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Recommended browsers and device</span></strong></p>
                                        <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">Most recent Chrome, Firefox and Safari on Windows-PCs or OSX-Macintoshs. Mobile Browser support limited to Homepage.</span></p>
                                        <p>&nbsp;</p>',
                                        '<p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><strong><span style="font-size: 12pt; font-family: Roboto; color: #0171bc; background-color: #ffffff; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;">All other issues</span></strong></p>
                                        <p style="line-height: 1.38; margin-top: 0pt; margin-bottom: 0pt;"><a style="text-decoration: none;" href="http://ladglobal.com/contactus"><span style="font-size: 12pt; font-family: Roboto; color: #1155cc; background-color: #ffffff; font-weight: 400; font-variant: normal; text-decoration: underline; vertical-align: baseline; white-space: pre-wrap;">Contact us here.</span></a></p>
                                    ')
                )
            
           /* array(
                'title' => 'Degrees on LAD Global',
                'contents' => array('Take a degree course', 
                                    'Degree course deadlines',
                                    'Enroll in a degree course')
                )*/
            );

        $faq_search = strip_tags(Input::get('search', ''));
        $search_status = false;
        if (strlen($faq_search) > 0) 
        {   # User search for something
            $filtered_faq_contents = array();
            foreach ($faq_contents as $fc_key => $fc_value) {
                if (strpos(strtolower($fc_value['title']), strtolower($faq_search)) !== false) 
                {   # Keyword contains the query. Push everything
                    array_push($filtered_faq_contents, $fc_value);
                    $search_status = $faq_search;
                }
                else
                {   # Keyword does not contain the query, check contents
                    $filtered_faq_contents_items = array();
                    foreach ($fc_value['contents'] as $fcc) {
                        if (strpos(strtolower($fcc), strtolower($faq_search)) !== false) 
                        {   # Content contains the query. Push to items
                            array_push($filtered_faq_contents_items, $fcc);
                            $search_status = $faq_search;
                        }
                    }
                    if (count($filtered_faq_contents_items) > 0) 
                    {   # Push to filtered_faq_contents_items if found only
                        array_push($filtered_faq_contents, array('title' => $fc_value['title'], 'contents' => $filtered_faq_contents_items));    
                    }
                    
                }
            }

            $faq_contents = $filtered_faq_contents;
        }

        return view('header', ['user_industries' => $user_industries,
                                'user_interests' => $courses_categories,
                                'user_occupations' => $user_occupations,
                                'courses_categories' => $courses_categories])->withTitle('LAD Global | Help & FAQ').
                view('helpfaq', ['faq_search'=>$faq_search, 'search_status' => $search_status, 'faq_contents'=>$faq_contents]).
                view('footer');
    }
}
