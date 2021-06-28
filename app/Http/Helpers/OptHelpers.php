<?php 

namespace App\Http\Helpers;

use Illuminate\Support\Facades\Log;

class OptHelpers
{
    public static function app_env($config)
    {
        $env = [
            config(['app.mail_mailer'=>$config->mail_mailer,
                    'app.mail_host'=>$config->mail_host,
                    'app.mail_port'=>$config->mail_port,
                    'app.mail_user'=>$config->mail_username,
                    'app.mail_pass'=>$config->mail_password,
                    'app.mail_encryp'=>$config->mail_encryption,
                    'app.mail_from'=>$config->mail_from_address,
            ])
        ];
        Log::info(config('app.mail_port'));
    }
}