<?php

namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;
// Class for Setting facebook signup
class SocialAccountService
{
    protected $password_hash_algo = "sha256";
    protected $fb_credential_delimiter = "&*&*&";

    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialAccount::whereProvider('facebook')
                    ->whereProviderUserId($providerUser->getId())
                    ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {
                $email = $providerUser->getEmail();
                $name = $providerUser->getName();
                if (strlen($email) > 0) 
                {   # email is not empty
                    $username = "user_".explode('@', $email)[0];
                }
                else
                {   # Name is not empty
                    $username = "user_".explode(' ', $name)[0];
                }                
                $fb_credential_raw = $email.$this->fb_credential_delimiter.$providerUser->getId();

                $fb_credential_encrypted = hash($this->password_hash_algo, $fb_credential_raw);

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

                $user = User::create([
                    'email' => $email,
                    'name' => $name,
                    'username' => $username,
                    'country' => $country,
                    'facebook_credential' => $fb_credential_encrypted,
                    'created_time' => date("Y-m-d H:i:s"),
                ]);
            }

            $account->user()->associate($user);
            $account->save();
            return $user;
        }

    }
}