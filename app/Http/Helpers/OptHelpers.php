<?php 

namespace App\Http\Helpers;

use App\Models\EmailConfig;
use Illuminate\Support\Facades\Log;


class OptHelpers
{

    public static function app_env($config)
    {
        $config = EmailConfig::first();
        $path = base_path('.env'); 
        
          // Use values from DB
        if(file_exists($path)){
                file_put_contents($path,str_replace('APP_NAME='.env('APP_NAME'), 'APP_NAME='.$config->app_name, file_get_contents($path)));
                file_put_contents($path,str_replace('APP_URL='.env('APP_URL'), 'APP_URL='.$config->app_url,file_get_contents($path)));
                file_put_contents($path,str_replace('MAIL_MAILER='.env('MAIL_MAILER'), 'MAIL_MAILER='.$config->mail_mailer,file_get_contents($path)));
                file_put_contents($path,str_replace('MAIL_HOST='.env('MAIL_HOST'), 'MAIL_HOST='.$config->mail_host,file_get_contents($path)));
                file_put_contents($path,str_replace('MAIL_PORT='.env('MAIL_PORT'), 'MAIL_PORT='.$config->mail_port,file_get_contents($path)));
                file_put_contents($path,str_replace('MAIL_USERNAME='.env('MAIL_USERNAME'), 'MAIL_USERNAME='.$config->mail_username,file_get_contents($path)));
                file_put_contents($path,str_replace('MAIL_PASSWORD='.env('MAIL_PASSWORD'), 'MAIL_PASSWORD='.$config->mail_password,file_get_contents($path)));
                file_put_contents($path,str_replace('MAIL_ENCRYPTION='.env('MAIL_ENCRYPTION'), 'MAIL_ENCRYPTION='.$config->mail_encryption,file_get_contents($path)));
                file_put_contents($path,str_replace('MAIL_FROM_ADDRESS='.env('MAIL_FROM_ADDRESS'), 'MAIL_FROM_ADDRESS='.$config->mail_from_address, file_get_contents($path)));
        }
        // if(file_exists($path)){
        //     file_put_contents($path,str_replace('APP_NAME='.env('APP_NAME'), 'APP_NAME='.$config['app_name'], file_get_contents($path)));
        //     file_put_contents($path,str_replace('APP_URL='.env('APP_URL'), 'APP_URL='.$config['app_url'],file_get_contents($path)));
        //     file_put_contents($path,str_replace('MAIL_MAILER='.env('MAIL_MAILER'), 'MAIL_MAILER='.$config['mail_mailer'],file_get_contents($path)));
        //     file_put_contents($path,str_replace('MAIL_HOST='.env('MAIL_HOST'), 'MAIL_HOST='.$config['mail_host'],file_get_contents($path)));
        //     file_put_contents($path,str_replace('MAIL_PORT='.env('MAIL_PORT'), 'MAIL_PORT='.$config['mail_port'],file_get_contents($path)));
        //     file_put_contents($path,str_replace('MAIL_USERNAME='.env('MAIL_USERNAME'), 'MAIL_USERNAME='.$config['mail_username'],file_get_contents($path)));
        //     file_put_contents($path,str_replace('MAIL_PASSWORD='.env('MAIL_PASSWORD'), 'MAIL_PASSWORD='.$config['mail_password'],file_get_contents($path)));
        //     file_put_contents($path,str_replace('MAIL_ENCRYPTION='.env('MAIL_ENCRYPTION'), 'MAIL_ENCRYPTION='.$config['mail_encryption'],file_get_contents($path)));
        //     file_put_contents($path,str_replace('MAIL_FROM_ADDRESS='.env('MAIL_FROM_ADDRESS'), 'MAIL_FROM_ADDRESS='.$config['mail_from_address'], file_get_contents($path)));
        // }

      
        
        // Log::info(\Config::get('app.mail_mailer'));
    }
}

