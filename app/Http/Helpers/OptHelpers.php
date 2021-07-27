<?php 

namespace App\Http\Helpers;

use App\Models\EmailConfig;
use Illuminate\Support\Facades\Log;


class OptHelpers
{

    public static function app_env()
    {
      $path = base_path('.env'); 
      $config = EmailConfig::first();
      $envDb = [
        'APP_NAME'          => $config->app_name,
        'APP_URL'           => $config->app_url,
        'MAIL_MAILER'       => $config->mail_mailer,
        'MAIL_HOST'         => $config->mail_host,
        'MAIL_PORT'         => $config->mail_port,
        'MAIL_USERNAME'     => $config->mail_username,
        'MAIL_PASSWORD'     => $config->mail_password,
        'MAIL_ENCRYPTION'   => $config->mail_encryption,
        'MAIL_FROM_ADDRESS' => $config->mail_from_address
      ];
      $envConfig = [
        'APP_NAME'          => env('APP_NAME'),
        'APP_URL'           => env('APP_URL'),
        'MAIL_MAILER'       => env('MAIL_MAILER'),
        'MAIL_HOST'         => env('MAIL_HOST'),
        'MAIL_PORT'         => env('MAIL_PORT'),
        'MAIL_USERNAME'     => env('MAIL_USERNAME'),
        'MAIL_PASSWORD'     => env('MAIL_PASSWORD'),
        'MAIL_ENCRYPTION'   => env('MAIL_ENCRYPTION'),
        'MAIL_FROM_ADDRESS' => env('MAIL_FROM_ADDRESS')
      ];

      /*  We loop through the .env file config
      *   and the config db values
      *   if is not equal replace only that exact value
      */
      foreach($envDb as $envDbKey => $dbConf){
        foreach($envConfig as $envKey => $envConf){
          if($envDbKey == $envKey && $dbConf != $envConf){
            if(file_exists($path)){
              file_put_contents($path,str_replace($envDbKey.'='.$envConf, $envDbKey.'='.$dbConf, file_get_contents($path)));
            }
          }else{
            Log::info('No Changes was made ');
          }
        }
      }

      // file_put_contents($path,str_replace('APP_NAME='.env('APP_NAME'), 'APP_NAME='.$config->app_name, file_get_contents($path)));

      
    }
}

