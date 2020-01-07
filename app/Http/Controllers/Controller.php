<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Session;
use Illuminate\Contracts\Filesystem\Filesystem;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**The hash algo method*/
    protected $password_hash_algo = "sha256";
    /**The google credential delimiter*/
    protected $google_credential_delimiter = "&*&*&";
    /**Individual account type*/
    protected $account_type_normal = '1';
    /**Corporate account type*/
    protected $account_type_normal_corporate = '11';
    /**Google account type*/
    protected $account_type_google = '2';
    /**Facebook account type*/
    protected $account_type_facebook = '3';
    /**s3 bucket address*/
    protected $s3_bucket_url = 'https://lad-dev.s3.amazonaws.com/';

    public function __construct()
    {
    	/** Set timezone */ 
    	date_default_timezone_set("Asia/Singapore");

    	/** Refresh LAD expire session*/
    	if (Session::get('LAD_expire') && (time() < Session::get('LAD_expire')))
    	{	/** Session exists and not expired yet */
    		if (Session::get('LAD_expire') && (Session::get('LAD_expire') == "true")) 
    		{	/** Rememberme */
    			Session::put('LAD_expire', strtotime('+12 hours', time()));
    		} else
    		{	/** Normal */
    			Session::put('LAD_expire', strtotime('+2 hours', time()));
    		}
    	}
    }

    /**  
    * Uploaded file to S3 bucket
    * @param boolean $uploaded_file The status of the file 
    */
    public function uploadFiletoS3($uploaded_file = false, $filePath = false, $fileName = false) 
    {   
        $output = array(
            'info' => 'error',
            'message' => 'No upload is done.',
            'code' => 'x'
            );
        
        if (($uploaded_file) && ($filePath) && ($fileName)) 
        {   /** file is uploaded & filepath and filename are not empty */
            $s3 = \Storage::disk('s3');
            // $is_uploaded = $s3->put($filePath, file_get_contents($uploaded_file));
            // $is_uploaded = $s3->put($fileName, fopen($uploaded_file, 'r+'), 'public'); // use this for large files upload 
            $is_uploaded = $uploaded_file->storeAs($filePath, $fileName, 's3');   
            $s3->setVisibility($uploaded_file,'public');
            if ($is_uploaded) 
            {   //upload success
                $output['message'] = "File is uploaded successfully.";
                $output['info'] = "success";
                $output['code'] = "0";
            }
            else
            {   //upload failed 
                $output['message'] = "Upload failed.";
                $output['code'] = "1";
            }   
            $output['s3_result'] = $is_uploaded;
        }

        return $output;
    }
}
