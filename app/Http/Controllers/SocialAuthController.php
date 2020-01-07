<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SocialAccountService;
use Socialite;

class SocialAuthController extends Controller
{
    /**
    * Action for facebook login button
    *
    */
    public function fb_redirect()
    {
        return Socialite::driver('facebook')->redirect();   
    }   
    /**
    * Get data from Facebook API
    *
    *@param Social Account Service $service the service of social account
    */
    public function fb_callback(SocialAccountService $service)
    {
        // when facebook call us a with token   
        try {
        	$user = $service->createOrGetUser(Socialite::driver('facebook')->user());
            // if ($user->status == 1) {
                auth()->login($user);

                // Register Session
                app('App\Http\Controllers\AuthController')->create_session($user->id, $user->name, $user->photo);

                // $email = $this->sendEmail($user->name, $user->email);
                
                return redirect()->to('/dashboard');
          } catch (\Exception $e) {
        	return redirect('/');
        }
    }
    /**
    *
    * Send email when sign up using facebook
    *
    * @param string $name The name of this user
    * @param string $to_email The mail address of this user
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
        $headers[] = 'From: noreply <noreply@ladglobal.com>';

        return mail($to, $subject, $message, implode("\r\n", $headers));
    }
}
