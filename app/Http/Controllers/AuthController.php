<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Session;
use Mail;
use App\User;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Crypt;

class AuthController extends Controller
{

    private $reset_password_delimiter = "%7C%7C%7C"; // "|||"

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        // $this->middleware('guest');
        // date_default_timezone_set("Asia/Singapore");
    }
    /**
    *
    * This function is use to register user as individual
    *
    * @param Request $request the request from ajax
    */
    public function register_individual(Request $request)
    {   # Register individual account 
        $output = array(
            'info' => 'error',
            'message' => 'Unable to register individual account. Please try again later.',
            'code' => 'x' 
            );

        $text_regex = "/^[ A-Za-zÀ-ÿ0-9_#-]+$/";
        $text_regex_more_characters = "/^[ A-Za-zÀ-ÿ0-9_#!?.,-]+$/";

        $method = strip_tags($request->input('method'));
        if ($method == 1) 
        {   # Normal Sign Up 
            $rules_type = array(
                'signup_type' => 'nullable|numeric|max:2'
                );
            $messages_type = array(
                'signup_type.numeric' => 'The account type must be numeric.',
                'signup_type.max' => 'The account type must be less than :max characters long.'
                );
            $validator_type = Validator::make($request->only('signup_type'), $rules_type, $messages_type);
            if ($validator_type->fails()) 
            {   # Validation failed 
                $errors = $validator_type->errors();

                // Display all errors in arrays
                // $message = $validator_type->messages();

                // Display all errors in text
                // $message = "";
                // foreach ($errors->all() as $error_message) 
                // {   # iterate error messages
                //     $message .= $error_message." ";
                // }
                $message = $errors->first();

                $output['message'] = $message;
                $output['code'] = '11';
            }
            else
            {   # signup_type captured
                $signup_type = strip_tags($request->input('signup_type'));
                if ($signup_type == 0) 
                {   # Individual User
                    $rules_normal = array(
                        'signup_fullname' => ['required', 'min:2', 'max:50', 'regex:'.$text_regex],
                        'signup_email' => 'required|email|max:100',
                        'signup_password' => 'required|min:5|max:20',
                        'signup_corporate_company_phone_number' => 'required|max:20|regex:/^\+?\d+$/',
                        'signup_country' => 'required|alpha|min:1|max:5',
                        'signup_interest' => 'required|numeric|min:0',
                        'signup_industry' => 'required|numeric|min:0',
                        'signup_occupation' => 'required|numeric|min:0',
                        'signup_organization' => ['nullable', 'min:3', 'max:200', 'regex:'.$text_regex_more_characters]
                        );
                    $messages_normal = array(
                        'signup_fullname.required' => 'The Account Full Name is required.',
                        'signup_fullname.min' => 'The Account Full Name must be more than :min characters long.',
                        'signup_fullname.max' => 'The Account Full Name must be less than :max characters long.',
                        'signup_fullname.regex' => 'The Account Full Name must be in alpha-numeric characters or accented characters or dashes and underscores and spaces.',

                        'signup_email.required' => 'The Account Email is required.',
                        'signup_email.email' => 'The Account Email must be in a valid email format.',
                        'signup_email.max' => 'The Account Email must be less than :max characters long.',

                        'signup_password.required' => 'The Password is required.',
                        'signup_password.min' => 'The Password must be more than :min characters long.',
                        'signup_password.max' => 'The Password must be less than :max characters long.',

                        'signup_corporate_company_phone_number.required' => 'The Phone Number is required.',
                        'signup_corporate_company_phone_number.max' => 'The Phone Number must be less than :max characters long.',
                        'signup_corporate_company_phone_number.regex' => 'The Phone Number be in a valid phone number format.',

                        'signup_country.required' => 'The Country Code is required.',
                        'signup_country.alpha' => 'The Country Code must only contain alphabetic characters.',
                        'signup_country.min' => 'The Country Code must be more than :min characters long.',
                        'signup_country.max' => 'The Country Code must be less than :max characters long.',

                        'signup_interest.required' => 'The Area of Interest is required.',
                        'signup_interest.numeric' => 'The Area of Interest must be numeric.',
                        'signup_interest.min' => 'The Area of Interest must be greater than :min.',

                        'signup_industry.required' => 'The Industry is required.',
                        'signup_industry.numeric' => 'The Industry must be numeric.',
                        'signup_industry.min' => 'The Industry must be greater than :min.',

                        'signup_occupation.required' => 'The Occupation is required.',
                        'signup_occupation.numeric' => 'The Occupation must be numeric.',
                        'signup_occupation.min' => 'The Occupation must be greater than :min.',

                        'signup_organization.min' => 'The Name of Organization must be more than :min characters long.',
                        'signup_organization.max' => 'The Name of Organization must be less than :max characters long.',
                        'signup_organization.regex' => 'The Name of Organization must be in alpha-numeric characters or dashes and underscores and spaces.'
                        );
                    $validator_normal = Validator::make($request->only('signup_fullname',
                                                                        'signup_email',
                                                                        'signup_password',
                                                                        'signup_country',
                                                                        'signup_corporate_company_phone_number',
                                                                        'signup_interest',
                                                                        'signup_industry',
                                                                        'signup_occupation',
                                                                        'signup_organization'), $rules_normal, $messages_normal);
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
                        $output['code'] = '11';
                    }
                    else
                    {   # Validation passed
                        $signup_fullname = strip_tags($request->input('signup_fullname'));
                        $signup_email = strip_tags($request->input('signup_email'));
                        $signup_password = strip_tags($request->input('signup_password'));
                        $signup_corporate_company_phone_number = strip_tags($request->input('signup_corporate_company_phone_number'));
                        $signup_address = json_encode($request->input('signup_address'));
                        $signup_country = strip_tags($request->input('signup_country'));
                        $signup_interest = strip_tags($request->input('signup_interest'));
                        $signup_industry = strip_tags($request->input('signup_industry'));
                        $signup_occupation = strip_tags($request->input('signup_occupation'));
                        $signup_organization = strip_tags($request->input('signup_organization'));
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
                                    'mailing_address' => $signup_address,
                                    'country' => $signup_country,
                                    'interest' => $signup_interest,
                                    'industry' => $signup_industry,
                                    'occupation' => $signup_occupation,
                                    'organization' => $signup_organization,
                                    'corporate_phone_number' => $signup_corporate_company_phone_number,
                                    'corporate_admin_occupation' => null,
                                    'course_credits' => $course_credits,
                                    'created_at' => date("Y-m-d H:i:s")
                                );

                            $insertid = DB::table('users')->insertGetId($new_user);
                            if ($insertid) 
                            {   # user created, automatically login
                                $is_login = $this->do_login($signup_email, $signup_password);
                                if ($is_login['result']) 
                                {   # login success
                                    // Create session
                                    $this->create_session($is_login['id'], $is_login['name'], $is_login['photo'], false, $course_credits);
                                    
                                    $output['info'] = 'success';
                                    $output['message'] = "New individual account registered successfully. Login OK.";
                                    $output['ID'] = $insertid;
                                    $output['code'] = '0';

                                    $email = $this->sendEmail($signup_fullname, $signup_email);
                                    
                                }
                                else
                                {   # login failed
                                    if (isset($is_login['suspended'])) 
                                    {   # account is suspended
                                        $output['code'] = '141';   
                                        $output['message'] = "Your account is currently suspended. Please contact administrator to activate it.";
                                    }
                                    else
                                    {   # Account not found
                                        $output['code'] = '14';   
                                    }
                                        
                                }                                
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
                    }
                }
                else
                {   # Corporate User
                    $rules_corporate = array(
                        'signup_fullname' => ['required', 'min:2', 'max:50', 'regex:'.$text_regex],
                        'signup_email' => 'required|email|max:100',
                        'signup_password' => 'required|min:5|max:20',
                        'signup_corporate_company_name' => ['required', 'min:3', 'max:255'],
                        'signup_corporate_company_email' => 'required|email|max:100',
                        'signup_corporate_company_phone_number' => 'required|max:20|regex:/^\+?\d+$/',
                        'signup_country' => 'required|alpha|min:1|max:5',
                        'signup_interest' => 'required|numeric|min:0',
                        'signup_industry' => 'required|numeric|min:0',
                        'signup_corporate_admin_occupation' => 'required|numeric|min:0'
                        );
                    $messages_corporate = array(
                        'signup_fullname.required' => 'The Account Full Name is required.',
                        'signup_fullname.min' => 'The Account Full Name must be more than :min characters long.',
                        'signup_fullname.max' => 'The Account Full Name must be less than :max characters long.',
                        'signup_fullname.regex' => 'The Account Full Name must be in alpha-numeric characters or accented characters or dashes and underscores and spaces.',

                        'signup_email.required' => 'The Account Email is required.',
                        'signup_email.email' => 'The Account Email must be in a valid email format.',
                        'signup_email.max' => 'The Account Email must be less than :max characters long.',

                        'signup_password.required' => 'The Password is required.',
                        'signup_password.min' => 'The Password must be more than :min characters long.',
                        'signup_password.max' => 'The Password must be less than :max characters long.',

                        'signup_corporate_company_name.required' => 'The Company Name is required.',
                        'signup_corporate_company_name.min' => 'The Company Name must be more than :min characters long.',
                        'signup_corporate_company_name.max' => 'The Company Name must be less than :max characters long.',

                        'signup_corporate_company_email.required' => 'The Company Email is required.',
                        'signup_corporate_company_email.email' => 'The Company Email must be in a valid email format.',
                        'signup_corporate_company_email.max' => 'The Company Email must be less than :max characters long.',

                        'signup_corporate_company_phone_number.required' => 'The Phone Number is required.',
                        'signup_corporate_company_phone_number.max' => 'The Phone Number must be less than :max characters long.',
                        'signup_corporate_company_phone_number.regex' => 'The Phone Number be in a valid phone number format.',

                        'signup_country.required' => 'The Country Code is required.',
                        'signup_country.alpha' => 'The Country Code must only contain alphabetic characters.',
                        'signup_country.min' => 'The Country Code must be more than :min characters long.',
                        'signup_country.max' => 'The Country Code must be less than :max characters long.',

                        'signup_interest.required' => 'The Area of Interest is required.',
                        'signup_interest.numeric' => 'The Area of Interest must be numeric.',
                        'signup_interest.min' => 'The Area of Interest must be greater than :min.',

                        'signup_industry.required' => 'The Industry is required.',
                        'signup_industry.numeric' => 'The Industry must be numeric.',
                        'signup_industry.min' => 'The Industry must be greater than :min.',

                        'signup_corporate_admin_occupation.required' => 'The Admin\'s Occupation is required.',
                        'signup_corporate_admin_occupation.min' => 'The Admin\'s Occupation must be greater than :min.',
                        'signup_corporate_admin_occupation.numeric' => 'The Admin\'s Occupation must be numeric.'
                        );
                    $validator_corporate = Validator::make($request->only('signup_fullname',
                                                                            'signup_email',
                                                                            'signup_password',
                                                                            'signup_corporate_company_name',
                                                                            'signup_corporate_company_email',
                                                                            'signup_corporate_company_phone_number',
                                                                            'signup_country',
                                                                            'signup_interest',
                                                                            'signup_industry',
                                                                            'signup_corporate_admin_occupation'), $rules_corporate, $messages_corporate);
                    if ($validator_corporate->fails()) 
                    {   # Validation failed 
                        $errors = $validator_corporate->errors();

                        // Display all errors in arrays
                        // $message = $validator_corporate->messages();

                        // Display all errors in text
                        // $message = "";
                        // foreach ($errors->all() as $error_message) 
                        // {   # iterate error messages
                        //     $message .= $error_message." ";
                        // }
                        $message = $errors->first();

                        $output['message'] = $message;
                        $output['code'] = '21';
                    }
                    else
                    {   # Validation passed
                        $signup_fullname = strip_tags($request->input('signup_fullname'));
                        $signup_email = strip_tags($request->input('signup_email'));
                        $signup_password = strip_tags($request->input('signup_password'));
                        $signup_address = json_encode($request->input('signup_address'));
                        $signup_corporate_company_name = strip_tags($request->input('signup_corporate_company_name'));
                        $signup_corporate_company_email = strip_tags($request->input('signup_corporate_company_email'));
                        $signup_corporate_company_phone_number = strip_tags($request->input('signup_corporate_company_phone_number'));

                        $signup_country = strip_tags($request->input('signup_country'));
                        $signup_interest = strip_tags($request->input('signup_interest'));
                        $signup_industry = strip_tags($request->input('signup_industry'));
                        $signup_corporate_admin_occupation = strip_tags($request->input('signup_corporate_admin_occupation'));
                        $course_credits = 5;

                        // Check whether email already exists
                        if (!(User::where('email', '=', $signup_email)->exists())) 
                        {   // user not found
                            $hashed_password = hash($this->password_hash_algo, $signup_password);

                            $new_user = array(
                                    'name' => $signup_fullname,
                                    'email' => $signup_email,
                                    'password' => $hashed_password,
                                    'mailing_address' => $signup_address,
                                    // 'corporate_company_name' => $signup_corporate_company_name,
                                    'organization' => $signup_corporate_company_name,
                                    'corporate_company_email' => $signup_corporate_company_email,
                                    'corporate_phone_number' => $signup_corporate_company_phone_number,
                                    'country' => $signup_country,
                                    'interest' => $signup_interest,
                                    'industry' => $signup_industry,
                                    'corporate_admin_occupation' => $signup_corporate_admin_occupation,
                                    'type' => '1',
                                    'course_credits' => $course_credits,
                                    'created_at' => date("Y-m-d H:i:s")
                                );

                            $insertid = DB::table('users')->insertGetId($new_user);
                            if ($insertid) 
                            {   # user created, automatically login
                                $is_login = $this->do_login($signup_email, $signup_password);
                                if ($is_login['result']) 
                                {   # login success
                                    // Create session
                                    $this->create_session($is_login['id'], $is_login['name'], $is_login['photo'], false, $course_credits);
                                    
                                    $output['info'] = 'success';
                                    $output['message'] = "New corporate account registered successfully. Login OK.";
                                    $output['ID'] = $insertid;
                                    $output['user_type'] = Session::get('LAD_user_type');
                                    $output['code'] = '0';

                                    $email = $this->sendEmail($signup_fullname, $signup_email);
                                }
                                else
                                {   # login failed
                                    if (isset($is_login['suspended'])) 
                                    {   # account is suspended
                                        $output['code'] = '241';   
                                        $output['message'] = "Your account is currently suspended. Please contact administrator to activate it.";
                                    }
                                    else
                                    {   # Account not found
                                        $output['code'] = '24'; 
                                    }                                      
                                } 
                            }
                            else
                            {   # user not created
                                $output['message'] = "Failed to register a new Corporate Account. Please try again later.";
                                $output['code'] = '23';
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
                            $output['code'] = '22';
                        }
                    }
                }
            }
        }
        else if($method == 2)
        {   # Sign up via Google 
            $rules = array(
                'fullname' => ['required', 'min:2', 'max:50', 'regex:'.$text_regex],
                'email' => 'required|email|max:100',
                'id_token' => 'required'
                );
            $messages = array(
                'fullname.required' => 'The Account Full Name is required.',
                'fullname.min' => 'The Account Full Name must be more than :min characters long.',
                'fullname.max' => 'The Account Full Name must be less than :max characters long.',
                'fullname.regex' => 'The Account Full Name must be in alpha-numeric characters or dashes and underscores and spaces.',

                'email.required' => 'The Account Email is required.',
                'email.email' => 'The Account Email must be in a valid email format.',
                'email.max' => 'The Account Email must be less than :max characters long.',

                'id_token.required' => 'The ID Token is required.'
                );
            $validator = Validator::make($request->only('fullname','email','id_token'), $rules, $messages);
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
                $output['code'] = '21';
            }
            else
            {   # Validation passed
                $fullname = strip_tags($request->input('fullname'));
                $email = strip_tags($request->input('email'));
                $id_token = strip_tags($request->input('id_token'));
                $course_credits = 3;

                // Validate token
                $google_validation_result = $this->validate_google_token($id_token);
                if (isset($google_validation_result->error)) 
                {   # ID Token invalid
                    $output['message'] = $google_validation_result->error_description;
                    if (strtolower($google_validation_result->error) == 'invalid_token') 
                    {   # Invalid token
                        $output['message'] = "Invalid Google token.";
                    }
                    $output['code'] = '22';
                }
                else
                {   # ID Token valid
                    // Check whether email already exists
                    if (!(User::where('email', '=', $email)->exists())) 
                    {   // user not found
                        $google_credential_raw = $email.$this->google_credential_delimiter.$google_validation_result->user_id;
                        $google_credential_encrypted = hash($this->password_hash_algo, $google_credential_raw);

                        // Capture User location
                        $user_ip = getenv('REMOTE_ADDR');
                        if (($user_ip == '127.0.0.1') || ($user_ip == '::1')) 
                        {   # localhost: development only
                            $country = "LH"; // LocalHost
                        }
                        else
                        {   # real ip
                            $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
                            $country = $geo["geoplugin_countryCode"];       
                        }

                        $new_user = array(
                                'name' => $fullname,
                                'email' => $email,
                                'google_credential' => $google_credential_encrypted,
                                'country' => $country,
                                'course_credits' => $course_credits,
                                'created_at' => date("Y-m-d H:i:s")
                            );

                        $insertid = DB::table('users')->insertGetId($new_user);
                        if ($insertid) 
                        {   # user created, automatically login
                            $is_login = $this->do_login_google($email, $id_token);
                            if ($is_login['result']) 
                            {   # login success
                                // Create session
                                $this->create_session($is_login['id'], $is_login['name'], $is_login['photo'], false, $course_credits);

                                $output['info'] = 'success';
                                $output['message'] = "New individual account registered successfully. Login OK.";
                                $output['ID'] = $insertid;
                                $output['code'] = '0';

                                $email = $this->sendEmail($fullname, $email);
                            }
                            else
                            {   # login failed
                                if (isset($is_login['suspended'])) 
                                {   # account is suspended
                                    $output['code'] = '21';   
                                    $output['message'] = "Your account is currently suspended. Please contact administrator to activate it.";
                                }
                                else
                                {   # Account not found
                                    $output['code'] = '2';
                                    if (isset($is_login['message'])) 
                                    {   # Custom error message
                                        $output['message'] = $is_login['message']." (".$is_login['code'].")";
                                    }
                                }      
                            }
                        }
                        else
                        {   # user not created
                            $output['message'] = "Failed to register new individual account. Please try again later.";
                            $output['code'] = '24';
                        }
                    }
                    else
                    {   # User already exists
                        $account_type = $this->get_account_type($email);
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
                        $output['code'] = '23';
                    }
                }
            }
        }

        return json_encode($output);
    }
    /**
    *
    * This function is use reset user password
    *
    * @param Request $request the request from ajax
    */
    public function reset_password(Request $request) 
    {   # Form POST
        $output = array(
            'info' => 'error',
            'message' => 'Unable to process your password reset request. Please try again later.',
            'code' => 'x' 
            );

        $rules = array(
            'forgotpassword_email' => 'required|email|max:100'
            );
        $messages = array(
            'forgotpassword_email.required' => 'The email is required.',
            'forgotpassword_email.email' => 'The email must be in a valid email format.',
            'forgotpassword_email.max' => 'The email must be less than :max characters long.'
            );
        $validator_normal = Validator::make($request->only('forgotpassword_email'), $rules, $messages);
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
            $output['code'] = '11';
        }
        else
        {   # Validation passed
            $forgotpassword_email = strip_tags($request->input('forgotpassword_email'));

            // Find email in users
            $selectedUser = collect(DB::select("SELECT *
                                                    FROM users 
                                                    where (email = ? and password is not null) limit 1", [$forgotpassword_email]))->first();
            if ($selectedUser) 
            {   # User found. Send email
                $passw_characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $passw_charactersLength = strlen($passw_characters);
                $passw_randomString = '';
                for ($i = 0; $i < 10; $i++) {
                    $passw_randomString .= $passw_characters[rand(0, $passw_charactersLength - 1)];
                }

                $current_time = time();
                $string_to_hash = $selectedUser->id.$this->reset_password_delimiter.$current_time.$this->reset_password_delimiter.$passw_randomString;
                $encrypted = urlencode(Crypt::encryptString($string_to_hash));

                // Store to reset_password
                $new_rp = array(
                    'user_id' => $selectedUser->id,
                    'request_time' => date("Y-m-d H:i:s", $current_time),
                    'new_key' => $encrypted
                    );

                $insertid = DB::table('reset_password')->insertGetId($new_rp);
                if ($insertid) 
                {   # Request logged
                    $url = url('/');
                    $subject = 'LAD Global | Reset Password';
                    $message = '<html>
                                    <head>
                                      <title>LAD Global | Reset Password</title>
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
                                                                <h2 style="font-family: sans-serif; color:#666666; word-break: break-word;">You have requested to reset your LADGlobal password on '.date('d M Y H:i:s').' (SGT). Click the "Reset Password" button below to confirm.</h2>
                                                            </p>
                                                        </td></tr>
                                                        <tr><td><br>
                                                        <tr><td><br>
                                                        <tr><td style="cursor: pointer;">
                                                            <a href="'.$url.'/reset_password_form?id='.$selectedUser->id.'&rid='.$insertid.'&time='.$current_time.'&key1='.$encrypted.'"><button style="text-transform: uppercase;
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
                                                            transition: all 0.5s;">Reset Password</button></a>
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
                    $headers[] = 'From: noreply <noreply@ladglobal.com>';

                    $ismailed = mail($forgotpassword_email, $subject, $message, implode("\r\n", $headers));

                    $output['code'] = 0;
                    $output['message'] = "Your password reset link has been sent to your email. Use it to reset your password.";
                    $output['info'] = 'success'; 
                }
                else
                {   # Request error
                    $output['code'] = 3;
                } 
            }
            else
            {   # User not found
                $output['code'] = 2;
                $output['message'] = "The email you provided does not seem to be registered with a LAD GLobal account. Please use a registered email address or Sign Up to LAD Global.";
                $output['info'] = 'error';
            }
        }
        return json_encode($output);
    }
    /**
    *
    * This function is use to get reset password form
    *
    * @param Request $request the request from ajax
    */
    public function reset_password_form(Request $request)
    {   # Display reset password form
        $validity = array(
            'code' => 1,
            'message' => "Your Reset Password link is not valid. Please request it again.",
            'info' => 'error',
            );

        $rules = array(
            'id' => 'required|numeric|min:0',
            'rid' => 'required|numeric|min:0',
            'time' => 'required',
            'key1' => 'required'
            );
        $messages = array(
            'id.required' => 'The ID is required.',
            'id.numeric' => 'The ID must be numeric.',
            'id.min' => 'The ID must be greated than :min.',

            'rid.required' => 'The RID is required.',
            'rid.numeric' => 'The RID must be numeric.',
            'rid.min' => 'The RID must be greated than :min.',

            'time.required' => 'The Request Time is required.',

            'key1.required' => 'The Key1 is required.'
            );
        $validator = Validator::make($request->only('id','rid','time','key1'), $rules, $messages);
        if ($validator->fails()) 
        {   # Validation failed 
            $errors = $validator->errors();

            $message = $errors->first();

            $output['message'] = $message;
            $output['code'] = '11';
        }
        else
        {   # Validation passed
            $id = strip_tags($request->input('id'));
            $request_id = strip_tags($request->input('rid'));
            $time = strip_tags($request->input('time'));
            $key1 = strip_tags($request->input('key1'));

            $decrypted_string = Crypt::decryptString(urldecode($key1));
            if (strpos($decrypted_string, $this->reset_password_delimiter) !== false) 
            {   # Correct key
                // Find from DB
                $selectedRequest = collect(DB::select("SELECT *
                                                            FROM reset_password 
                                                            where (id = ? and user_id = ?) limit 1", [$request_id, $id]))->first();
                if ($selectedRequest) 
                {   # Request found
                    // Check status
                    if ($selectedRequest->status == 0) 
                    {   # Request might be valid
                        // Validate
                        $decrypted_array = explode($this->reset_password_delimiter, $decrypted_string);
                        $decrypted_id = $decrypted_array[0];
                        $decrypted_time = $decrypted_array[1];
                        $decrypted_randomString = $decrypted_array[2];

                        if (($id == $decrypted_id) && ($time == $decrypted_time)) 
                        {   # Correct request
                            // Check time. Only valid for 1 hour.
                            $current_time = time();
                            $time_difference = floor((intval($current_time) - intval($time))/60);
                            if ($time_difference < 60) 
                            {   # time less than 1 hour
                                $validity['code'] = 0;
                                $validity['message'] = 'Reset Password Request is valid.';
                                $validity['info'] = 'success';

                                $validity['data-id'] = $id;
                                $validity['data-rid'] = $request_id;
                                $validity['data-time'] = $time;
                                $validity['data-key1'] = $key1;                        
                            }
                            else
                            {   # link expired
                                $validity['code'] = 6;
                                $validity['message'] = 'This Reset Password Link is expired. Please request a new one.';
                            }
                        }  
                        else 
                        {   # Invalid request
                            $validity['code'] = 5;
                            $validity['message'] = 'Reset Password Request is invalid.';
                        }
                    }
                    else
                    {   # Request already completed or rejected
                        $validity['code'] = 4;
                        $validity['message'] = 'This Reset Password Link is no longer valid. Please request a new one.';
                    }
                }
                else
                {   # Request not found
                    $validity['code'] = 3;
                    $validity['message'] = 'Reset Password Request is invalid.';
                }
            }
            else
            {   # Key is wrong
                $validity['code'] = 2;
                $validity['message'] = 'Reset Password key is invalid.';
            }
        }

        return view('reset_password_form', ['validity' => $validity])->withTitle('LAD Global | Reset Password');
    }
    /**
    *
    * This function is use when reset password has been confirm
    *
    * @param Request $request the request from ajax
    */
    public function reset_password_confirm(Request $request) 
    {   # AJAX Call
        $output = array(
            'code' => 1,
            'message' => "Your Reset Password Request is not valid. Please make it again.",
            'info' => 'error',
            );

        $rules = array(
            'forgotpassword_form_id' => 'required|numeric|min:0',
            'forgotpassword_form_rid' => 'required|numeric|min:0',
            'forgotpassword_form_time' => 'required',
            'forgotpassword_form_key1' => 'required',
            'forgotpassword_form_password' => 'required|min:5|max:20'
            );
        $messages = array(
            'forgotpassword_form_id.required' => 'The ID is required.',
            'forgotpassword_form_id.numeric' => 'The ID must be numeric.',
            'forgotpassword_form_id.min' => 'The ID must be greated than :min.',

            'forgotpassword_form_rid.required' => 'The RID is required.',
            'forgotpassword_form_rid.numeric' => 'The RID must be numeric.',
            'forgotpassword_form_rid.min' => 'The RID must be greated than :min.',

            'forgotpassword_form_time.required' => 'The Request Time is required.',

            'forgotpassword_form_key1.required' => 'The Key1 is required.',

            'forgotpassword_form_password.required' => 'The password is required.',
            'forgotpassword_form_password.min' => 'The password must be more than :min characters long.',
            'forgotpassword_form_password.max' => 'The password must be less than :max characters long.'
            );
        $validator = Validator::make($request->only('forgotpassword_form_id','forgotpassword_form_rid','forgotpassword_form_time','forgotpassword_form_key1','forgotpassword_form_password'), $rules, $messages);
        if ($validator->fails()) 
        {   # Validation failed 
            $errors = $validator->errors();

            $message = $errors->first();

            $output['message'] = $message;
            $output['code'] = '11';
        }
        else
        {   # Validation passed
            $user_id = strip_tags($request->input('forgotpassword_form_id'));
            $request_id = strip_tags($request->input('forgotpassword_form_rid'));
            $time = strip_tags($request->input('forgotpassword_form_time'));
            $key1 = strip_tags($request->input('forgotpassword_form_key1'));
            $forgotpassword_form_password = strip_tags($request->input('forgotpassword_form_password'));

            $decrypted_string = Crypt::decryptString(urldecode($key1));
            if (strpos($decrypted_string, $this->reset_password_delimiter) !== false) 
            {   # Correct key
                // find from DB
                $selectedRequest = collect(DB::select("SELECT *
                                                            FROM reset_password 
                                                            where (id = ? and user_id = ?) limit 1", [$request_id, $user_id]))->first();
                if ($selectedRequest) 
                {   # Request found
                    // Check status
                    if ($selectedRequest->status == 0) 
                    {   # Request might be valid
                        // Validate
                        $decrypted_array = explode($this->reset_password_delimiter, $decrypted_string);
                        $decrypted_id = $decrypted_array[0];
                        $decrypted_time = $decrypted_array[1];
                        $decrypted_randomString = $decrypted_array[2];

                        if (($user_id == $decrypted_id) && ($time == $decrypted_time)) 
                        {   # Correct request
                            // Check time. Only valid for 1 hour.
                            $current_time = time();
                            $time_difference = floor((intval($current_time) - intval($time))/60);
                            if ($time_difference < 60) 
                            {   # time less than 1 hour
                                $new_password = hash($this->password_hash_algo, $forgotpassword_form_password);

                                // Reset password
                                $is_user_updated = DB::table('users')
                                                    ->where('id', $user_id)
                                                    ->limit(1)
                                                    ->update(['password' => $new_password]);
                                if ($is_user_updated >= 0) 
                                {   # Password updated
                                    $output['message'] = "Password has been reset.";
                                    $output['info'] = 'success';
                                    // Update Request status and completed_time
                                    $is_request_updated = DB::table('reset_password')
                                                                ->where('id', $request_id)
                                                                ->where('user_id', $user_id)
                                                                ->limit(1)
                                                                ->update(['status' => 1, 'completed_time' => date("Y-m-d H:i:s", $current_time)]);
                                    if ($is_request_updated) 
                                    {   # Request updated
                                        // Deactivate other requests
                                        $is_other_request_updated = DB::table('reset_password')
                                                                        ->where('request_time', '>=', date("Y-m-d H:i:s", (intval($current_time)-3600)))
                                                                        ->where('id', '!=', $request_id)
                                                                        ->update(['status' => 2, 'deactivated_time' => date("Y-m-d H:i:s", $current_time)]);
                                        if ($is_other_request_updated) 
                                        {   # DB cleared
                                            $output['code'] = 0;
                                            $output['message'] .= " ".$is_other_request_updated." other requests updated.";

                                            // Create Flashdata
                                            \Session::flash('reset_password_ok', "Your new password has been saved.");
                                        }
                                        else
                                        {   # DB not updated
                                            $output['code'] = 9;
                                            $output['message'] .= " Other requests not updated.";
                                        }
                                    }
                                    else
                                    {   # Failed to update request
                                        $output['code'] = 8;
                                        $output['message'] .= " Request not updated.";
                                    }
                                }
                                else
                                {   # Reset password update error
                                    $output['code'] = 7;
                                    $output['message'] = "Failed to reset password. Please try again later.";
                                }
                            }
                            else
                            {   # link expired
                                $output['code'] = 6;
                                $output['message'] = 'This Reset Password Request is expired. Please make a new one.';
                            }
                        }  
                        else 
                        {   # Invalid request
                            $output['code'] = 5;
                            $output['message'] = 'Reset Password Request is invalid.';
                        }
                    }
                    else
                    {   # Request already completed or rejected
                        $validity['code'] = 4;
                        $validity['message'] = 'This Reset Password Request is no longer valid. Please make a new one.';
                    }                    
                }
                else
                {   # Request not found
                    $output['code'] = 3;
                    $output['message'] = 'Reset Password Request is invalid.';
                }
            }
            else
            {   # Key is wrong
                $output['code'] = 2;
                $output['message'] = 'Reset Password key is invalid.';
            }
        }
        return json_encode($output);
    }

    /*
            Full Name       : fullname
            Given Name      : givenname
            Family Name     : 
            Image URL       : profileimage
            Email           : email
            ID Token        : id_token

            $text_regex = "/^[ A-Za-zÀ-ÿ0-9_#-]+$/";
            $rules = array(
                'fullname' => ['required', 'min:5', 'max:50', 'regex:'.$text_regex],
                'givenname' => ['nullable', 'max:50', 'regex:'.$text_regex],
                'email' => 'required|email|max:100',
                'id_token' => 'required'
                );
            $messages = array(
                'fullname.required' => 'The Account Full Name is required.',
                'fullname.min' => 'The Account Full Name must be more than :min characters long.',
                'fullname.max' => 'The Account Full Name must be less than :max characters long.',
                'fullname.regex' => 'The Account Full Name must be in alpha-numeric characters or dashes and underscores and spaces.',

                'givenname.max' => 'The Account Given Name must be less than :max characters long.',
                'givenname.regex' => 'The Account Given Name must be in alpha-numeric characters or dashes and underscores and spaces.',
               
                'email.required' => 'The Account Email is required.',
                'email.email' => 'The Account Email must be in a valid email format.',
                'email.max' => 'The Account Email must be less than :max characters long.',

                'id_token.required' => 'The ID Token is required.'
                );
    */

    /**
    *
    * This function is use to validation login
    *
    * @param Request $request the request from ajax
    */
    public function login(Request $request)
    {   # AJAX CALL 
        // Regenerate sesion
        $request->session()->regenerate();

        $output = array(
            'info' => 'error',
            'message' => 'The credential provided seems to be invalid.',
            'code' => 'x' 
            );

        $method = strip_tags($request->input('method'));
        if ($method == 1) 
        {   # Normal Login 
            $rules = array(
                'login_email' => 'required|email|max:100',
                'login_password' => 'required|min:5|max:20',
                'login_rememberme' => 'nullable|alpha_dash|max:5'
                );
            $messages = array(
                'login_email.required' => 'The email is required.',
                'login_email.email' => 'The email must be in a valid email format.',
                'login_email.max' => 'The email must be less than :max characters long.',

                'login_password.required' => 'The password is required.',
                'login_password.min' => 'The password must be more than :min characters long.',
                'login_password.max' => 'The password must be less than :max characters long.'
                );

            $validator = Validator::make($request->only('login_email','login_password','login_rememberme'), $rules, $messages);
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
                $login_email = strip_tags($request->input('login_email'));
                $login_password = strip_tags($request->input('login_password'));
                $login_rememberme = strip_tags($request->input('login_rememberme'));

                $account_type = $this->get_account_type($login_email);
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
                    else if($account_type == $this->account_type_normal || $account_type == $this->account_type_normal_corporate)
                    {   # Registered via email-password
                        $is_login = $this->do_login($login_email, $login_password);
                        if ($is_login['result']) 
                        {   # login success
                            // Create session
                            $this->create_session($is_login['id'], $is_login['name'], $is_login['photo'], $login_rememberme, $is_login['course_credits'], $is_login['proposal_credits']);
                            
                            $output['info'] = 'success';
                            $output['message'] = "Login OK.";
                            $output['user_type'] = Session::get('LAD_user_type');
                            $output['code'] = '0';
                        }
                        else
                        {   # login failed
                            // $output['code'] = hash($this->password_hash_algo, $login_password);
                            if (isset($is_login['suspended'])) 
                            {   # account is suspended
                                $output['code'] = '21';   
                                $output['message'] = "Your account is currently suspended. Please contact administrator to activate it.";
                            }
                            else
                            {   # Account not found
                                $output['code'] = '2';   
                            }
                        }
                    }
                }
            }
        }
        else if ($method == 2) 
        {   # Login via Google 
            $rules = array(
                'email' => 'required|email|max:100',
                'id_token' => 'required'
                );
            $messages = array(
                'email.required' => 'The Account Email is required.',
                'email.email' => 'The Account Email must be in a valid email format.',
                'email.max' => 'The Account Email must be less than :max characters long.',

                'id_token.required' => 'The ID Token is required.'
                );
            $validator = Validator::make($request->only('email','id_token'), $rules, $messages);
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
                $email = strip_tags($request->input('email'));
                $id_token = strip_tags($request->input('id_token'));

                $account_type = $this->get_account_type($email);
                if ($account_type) 
                {   # Account type found
                    if ($account_type == $this->account_type_google) 
                    {   # Registered via Google
                        $is_login = $this->do_login_google($email, $id_token);
                        if ($is_login['result']) 
                        {   # login success
                            // // Create session
                            $this->create_session($is_login['id'], $is_login['name'], $is_login['photo'], false, $is_login['course_credits']);

                            $output['info'] = 'success';
                            $output['message'] = "Login OK.";
                            $output['code'] = '0';
                        }
                        else
                        {   # login failed
                            if (isset($is_login['suspended'])) 
                            {   # account is suspended
                                $output['code'] = '21';   
                                $output['message'] = "Your account is currently suspended. Please contact administrator to activate it.";
                            }
                            else
                            {   # Account not found
                                $output['code'] = '2';
                                if (isset($is_login['message'])) 
                                {   # Custom error message
                                    $output['message'] = $is_login['message']." (".$is_login['code'].")";
                                }
                            }  
                        }
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
            }
        }

        return json_encode($output);
    }
    /**
    *
    * This function is use to logout
    *
    * @param Request $request the request from ajax
    */
    public function logout(Request $request)
    {   // Logout current logged-in user 
        Session::forget('LAD_user_id');
        Session::forget('LAD_user_name');
        Session::forget('LAD_user_photo');
        Session::forget('LAD_expire');
        Session::forget('LAD_rememberme');
        Session::forget('LAD_course_credits');
        Session::forget('LAD_proposal_credits');
        Session::forget('LAD_user_type');

        return redirect('/index');
    }

    private function get_account_type($email = false)
    {
        $output = false;
        if ($email != false) 
        {   # email is not empty
            $selectedUser = collect(DB::select("SELECT users.email,
                                                       users.google_credential,
                                                       users.facebook_credential,
                                                       users.password,
                                                       users.type
                                                    FROM users 
                                                    where email = ? limit 1", [$email]))->first();
            if ($selectedUser)
            {   # User found
                if ($selectedUser->google_credential != null) 
                {   # User is registered via google account
                    $output = $this->account_type_google;
                }
                else if($selectedUser->facebook_credential != null)
                {   # User is registered via facebook account
                    $output = $this->account_type_facebook;
                }
                else if($selectedUser->password != null)
                {   # User is registered via normal account
                    if ($selectedUser->type == 1) 
                    {   # corporate account
                        $output = $this->account_type_normal_corporate;
                    }
                    else
                    {   # normal account
                        $output = $this->account_type_normal;
                    }                    
                }
            }   
        }
        return $output;
    }
    /**
    *
    * This function is use to login 
    *
    * @param boolean $email The email status in DB (show exist or doesnt exist)
    * @param boolean $password The validation status between input password and password in DB
    */
    private function do_login($email = false, $password = false)
    {   # Login via DB 
        $output = array(
            'result' => false
            );

        if (($email != false) && ($password != false)) 
        {   # email and password are both filled
            $selectedUser = collect(DB::select("SELECT users.id,
                                                       users.email,
                                                       users.name,
                                                       users.photo,
                                                       users.password,
                                                       users.status,
                                                       users.course_credits,
                                                       users.proposal_credits
                                                    FROM users 
                                                    where email = ? limit 1", [$email]))->first();
            if ($selectedUser)
            {   # User found
                if ($selectedUser->status == 1) 
                {   # account is active
                    $hashed_password = hash($this->password_hash_algo, $password);
                    if ($selectedUser->password === $hashed_password) 
                    {   # password match
                        $output['result'] = true;
                        $output['id'] = $selectedUser->id;
                        $output['name'] = $selectedUser->name;
                        $output['photo'] = $selectedUser->photo;
                        $output['course_credits'] = $selectedUser->course_credits;
                        $output['proposal_credits'] = $selectedUser->proposal_credits;
                    }
                }
                else
                {   # account is suspended
                    $output['suspended'] = 1;
                }                
            }            
        }
        return $output;
    }
    /**
    *
    * This function is use to login via google api
    *
    * @param boolean $email The email status in google DB (show exist or doesnt exist)
    * @param boolean $id_token The status of token working with google api
    */
    private function do_login_google($email = false, $id_token = false)
    {   # Login to Google API 
        $output = array(
            'result' => false,
            'message' => "Failed to login via Google account. Please try again later.",
            'code' => '1'
            );
        if ($email != false && $id_token != false) 
        {   # email and  id_token are not empty
            // Validate token to Google
            $google_validation_result = $this->validate_google_token($id_token);
            if (isset($google_validation_result->error)) 
            {   # ID Token invalid
                $output['message'] = $google_validation_result->error_description;
                if (strtolower($google_validation_result->error) == 'invalid_token') 
                {   # Invalid token
                    $output['message'] = "Invalid Google token.";
                }
                $output['code'] = '2';
            }
            else
            {   # ID Token valid
                $output['data'] = $google_validation_result;
                if (isset($google_validation_result->email) && (strtolower($email) == strtolower($google_validation_result->email))) 
                {   # Email match
                    // Find in DB
                    $selectedUser = collect(DB::select("SELECT users.id,
                                                               users.email,
                                                               users.name,
                                                               users.photo,
                                                               users.google_credential,
                                                               users.status,
                                                               users.course_credits,
                                                               users.proposal_credits
                                                            FROM users 
                                                            where email = ? limit 1", [$email]))->first();
                    if ($selectedUser)
                    {   # User found
                        if ($selectedUser->status == 1) 
                        {   # user active
                            $google_credential_raw = $google_validation_result->email.$this->google_credential_delimiter.$google_validation_result->user_id;
                            $google_credential_encrypted = hash($this->password_hash_algo, $google_credential_raw);
                            if ($selectedUser->google_credential === $google_credential_encrypted) 
                            {   # google_credential match
                                $output['result'] = true;
                                $output['id'] = $selectedUser->id;
                                $output['name'] = $selectedUser->name;
                                $output['photo'] = $selectedUser->photo;
                                $output['course_credits'] = $selectedUser->course_credits;
                                $output['code'] = '0';
                                $output['message'] = "Google sign-in OK.";
                            }
                            else
                            {   # google_credential mismatch
                                $output['code'] = '5';
                                $output['message'] = "Google credentials mismatch. Please try again later.";
                            }
                        }
                        else
                        {   # user suspended
                            $output['suspended'] = 1;
                        }
                    }
                    else
                    {   # User not found
                        $output['code'] = '4';
                        $output['message'] = "User $google_validation_result->email is not registered. Please register your account first.";
                    }
                }
                else
                {   # Email mismatch
                    $output['code'] = '3';
                }
            }
        }
        return $output;
    }
    /**
    *
    * This function is use to validate google token 
    *
    * @param boolean $id_token The status of token id 
    */
    private function validate_google_token($id_token = false)
    {   # Validate Google's ID Token
        // cURL to Google endpoint URL
        $google_endpoint_validation = "https://www.googleapis.com/oauth2/v1/tokeninfo?id_token=".$id_token;
        // Send a GET request
        // $curl_response = Curl::to($google_endpoint_validation)->get();

        $ch = curl_init($google_endpoint_validation);
        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer bIHScvq8eQwDQVVL90PXmhxjUVbkzq7N',
        ];
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $curl_response = curl_exec($ch);
        curl_close($ch);

        /* 
            Sample: (error)
            error: "invalid_token"
            error_description: "Invalid Value"

            Sample: (success)
            audience: "798595003751-qrp7fstd7bvh46v0btvus1q3ev4125kd.apps.googleusercontent.com"
            email: "ivandummy123@gmail.com"
            email_verified: true
            expires_in: 3599
            issued_at: 1499835105
            issued_to: "798595003751-qrp7fstd7bvh46v0btvus1q3ev4125kd.apps.googleusercontent.com"
            issuer: "accounts.google.com"
            user_id: "100321888784948537744"
        */
        return json_decode($curl_response);
    }
    /**
    *
    * This function is use to create user session
    *
    * @param boolean $user_di The user id status
    * @param boolean $user_name The user name status
    * @param boolean $rememberme The remember me me status
    * @param int $course_credits The default value of this session (value is 5)
    * @param int $proposal_credits The default value of this session (value is 3)
    */
    public function create_session($user_id = false, $user_name = false, $user_photo = false, $rememberme = false, $course_credits = '5', $proposal_credits = '3')
    {   # Create Session 
        Session::put('LAD_user_id', $user_id);
        Session::put('LAD_user_name', $user_name);
        Session::put('LAD_user_photo', $user_photo);
        Session::put('LAD_rememberme', $rememberme);
        Session::put('LAD_course_credits', $course_credits);
        Session::put('LAD_proposal_credits', $proposal_credits);

        $user_type = DB::table('users')->where('id',$user_id)->first();
        Session::put('LAD_user_type', $user_type->type);
        if ($rememberme == "true") 
        {   # Remember me is on
            Session::put('LAD_expire', strtotime('+12 hours', time()));
        }
        else
        {   # Normal session expiry date
            Session::put('LAD_expire', strtotime('+2 hours', time()));
        }
        return true;
    }
    /**
    *
    * This function is use to send email to new user
    *
    * @param string $name The name of this new user
    * @param string $to_email The email address of this user
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
    *
    * Sign up process for employee
    * 
    * @param Request $request the request from ajax
    */
    public function employeeSignUp(Request $request) {
        $text_regex = "/^[ A-Za-zÀ-ÿ0-9_#-]+$/";
        $text_regex_more_characters = "/^[ A-Za-zÀ-ÿ0-9_#!?.,-]+$/";

        $output = array(
            'code' => 1,
            'message' => "Your Sign Up Request is not valid. Please make it again.",
            'info' => 'error',
            );

        $rules_normal = array(
                        'enroll_fullname' => ['required', 'min:2', 'max:50', 'regex:'.$text_regex],
                        'enroll_email' => 'required|email|max:100',
                        'enroll_password' => 'required|min:5|max:20',
                        'enroll_country' => 'required|alpha|min:1|max:5',
                        'enroll_interest' => 'required|numeric|min:0',
                        'enroll_industry' => 'required|numeric|min:0',
                        'enroll_occupation' => 'required|numeric|min:0'
                        );
        $messages_normal = array(
                        'enroll_fullname.required' => 'The Account Full Name is required.',
                        'enroll_fullname.min' => 'The Account Full Name must be more than :min characters long.',
                        'enroll_fullname.max' => 'The Account Full Name must be less than :max characters long.',
                        'enroll_fullname.regex' => 'The Account Full Name must be in alpha-numeric characters or accented characters or dashes and underscores and spaces.',

                        'enroll_email.required' => 'The Account Email is required.',
                        'enroll_email.email' => 'The Account Email must be in a valid email format.',
                        'enroll_email.max' => 'The Account Email must be less than :max characters long.',

                        'enroll_password.required' => 'The Password is required.',
                        'enroll_password.min' => 'The Password must be more than :min characters long.',
                        'enroll_password.max' => 'The Password must be less than :max characters long.',

                        'enroll_country.required' => 'The Country Code is required.',
                        'enroll_country.alpha' => 'The Country Code must only contain alphabetic characters.',
                        'enroll_country.min' => 'The Country Code must be more than :min characters long.',
                        'enroll_country.max' => 'The Country Code must be less than :max characters long.',

                        'enroll_interest.required' => 'The Area of Interest is required.',
                        'enroll_interest.numeric' => 'The Area of Interest must be numeric.',
                        'enroll_interest.min' => 'The Area of Interest must be greater than :min.',

                        'enroll_industry.required' => 'The Industry is required.',
                        'enroll_industry.numeric' => 'The Industry must be numeric.',
                        'enroll_industry.min' => 'The Industry must be greater than :min.',

                        'enroll_occupation.required' => 'The Occupation is required.',
                        'enroll_occupation.numeric' => 'The Occupation must be numeric.',
                        'enroll_occupation.min' => 'The Occupation must be greater than :min.'
                        );
        $validator_normal = Validator::make($request->only('enroll_fullname',
                                                            'enroll_email',
                                                            'enroll_password',
                                                            'enroll_country',
                                                            'enroll_interest',
                                                            'enroll_industry',
                                                            'enroll_occupation'), $rules_normal, $messages_normal);
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
            $output['code'] = '11';
        }
        else
        {   # Validation passed
            $employeeof = strip_tags($request->input('emp'));
            $user = DB::table('users')->where('id',$employeeof)->first();
            if ($user) {
                $signup_fullname = strip_tags($request->input('enroll_fullname'));
                $signup_email = strip_tags($request->input('enroll_email'));
                $signup_password = strip_tags($request->input('enroll_password'));
                $signup_country = strip_tags($request->input('enroll_country'));
                $signup_interest = strip_tags($request->input('enroll_interest'));
                $signup_industry = strip_tags($request->input('enroll_industry'));
                $signup_occupation = strip_tags($request->input('enroll_occupation'));
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
                        'mailing_address' => $signup_address,
                        'country' => $signup_country,
                        'interest' => $signup_interest,
                        'industry' => $signup_industry,
                        'occupation' => $signup_occupation,
                        'organization' => $signup_organization,
                        'corporate_phone_number' => $signup_phone,
                        'type' => 2,
                        'employee_of' => $employeeof,
                        'corporate_admin_occupation' => null,
                        'course_credits' => $course_credits,
                        'created_at' => date("Y-m-d H:i:s")
                    );

                $insertid = DB::table('users')->insertGetId($new_user);
                if ($insertid) 
                {   # user created, automatically login
                    $is_login = $this->do_login($signup_email, $signup_password);
                    if ($is_login['result']) 
                    {   # login success
                        // Create session
                        $this->create_session($is_login['id'], $is_login['name'], $is_login['photo'], false, $course_credits);
                        
                        $output['info'] = 'success';
                        $output['message'] = "New individual account registered successfully. Login OK.";
                        $output['ID'] = $insertid;
                        $output['code'] = '0';

                        $email = $this->sendEmail($signup_fullname, $signup_email);
                        
                    }
                    else
                    {   # login failed
                        if (isset($is_login['suspended'])) 
                        {   # account is suspended
                            $output['code'] = '141';   
                            $output['message'] = "Your account is currently suspended. Please contact administrator to activate it.";
                        }
                        else
                        {   # Account not found
                            $output['code'] = '14';   
                        }
                            
                    }                                
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
        }
        return json_encode($output);
    }
}
