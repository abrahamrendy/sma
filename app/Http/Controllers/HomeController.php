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

    public function confirm_payment($output = array())
    {
        if ($output == null) {
            return view('header', ['registerflag' => true])->withTitle('Payment Confirmation - KATARTIZO Mission Academy').
                view('confirmpayment').
                view('footer');    
        } else {
            return view('header', ['registerflag' => true])->withTitle('Payment Confirmation - KATARTIZO Mission Academy').
                view('confirmpayment', ['output' => $output]).
                view('footer');
        }
        
    }

    public function submit_confirm_payment(Request $request) {

        $output = array(
            'info' => 'error',
            'message' => 'Unable to contact us. Please try again later.',
            'code' => 'x' 
            );
        
        if ($request->hasFile('bukti')){
            $photoname = $request->input('firstname').'_BUKTI';
            $addPhoto = $photoname.'.'.$request->file('bukti')->getClientOriginalExtension();
            $bukti = Storage::putFileAs('bukti', $request->file('bukti'), $addPhoto);
        }

        $new_confirm_payment = array(
            'name' => strip_tags($request->input('firstname')),
            'ttl' => date("Y-m-d H:i:s", strtotime(strip_tags($request->input('ttl')))),
            'phone' => strip_tags($request->input('phone')),
            'email' => strip_tags($request->input('email')),
            'bukti' => $bukti,
            'created_at' => date("Y-m-d H:i:s"),
        ); 

        $insertid = DB::table('paymentconfirmation')->insertGetId($new_confirm_payment);

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
        

        return $this->confirm_payment($output);
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

        $akte = '';
        $ktp = '';
        $ijazah = '';
        $pasfoto = '';

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

        $email = strip_tags($request->input('email'));
        $exists = DB::table('contactus')->where('email', $email)->first();
        if (!$exists) {
        
            $new_contactus = array(
                'name' => strip_tags($request->input('firstname')),
                'gender' => strip_tags($request->input('gender')),
                'ttl' => date("Y-m-d H:i:s", strtotime(strip_tags($request->input('ttl')))),
                'phone' => strip_tags($request->input('phone')),
                'email' => strip_tags($request->input('email')),
                'alamat' => strip_tags($request->input('alamat')),
                'statuspelayanan' => strip_tags($request->input('statuspelayanan')),
                'message' => strip_tags($request->input('message')),
                'praktek' => strip_tags($request->input('praktek')),
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
        } else {
            {   # user not created
                $output['message'] = "Email sudah terdaftar. Mohon mendaftar dengan menggunakan alamat email lain.";
                $output['code'] = '2';
            }
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
        return view('header', ['faq' => true])->withTitle('FAQ - Katartizo Mission Academy').
                view('helpfaq').
                view('footer');
    }
}
