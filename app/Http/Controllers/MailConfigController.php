<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Helpers\OptHelpers;
use App\Jobs\TestMailConfig;

class MailConfigController extends Controller
{

    public function index()
    {  
        return view('email-config')->with([
            'app_name'      => env('APP_NAME'),
            'app_url'       => env('APP_URL'),
            'mail_mailer'   => env('MAIL_MAILER'),
            'mail_host'     => env('MAIL_HOST'),
            'mail_port'     => env('MAIL_PORT'),
            'mail_user'     => env('MAIL_USERNAME'), 
            'mail_pass'     => env('MAIL_PASSWORD'), 
            'mail_encryp'   => env('MAIL_ENCRYPTION'),  
            'mail_from'     => env('MAIL_FROM_ADDRESS'),
        ]);
    }

    public function update_config(Request $request)
    {
        $request->validate([
            'app_name'          => 'required',
            'app_url'           => 'required',
            'mail_mailer'       => 'required',
            'mail_host'         => 'required',
            'mail_port'         => 'required|numeric',
            'mail_username'     => 'required|email',
            'mail_password'     => 'required',
            'mail_encryption'   => 'required',
            'mail_from_address' => 'required|email'
        ]);

        $config = [
            'app_name'          => $request->input('app_name'),
            'app_url'           => $request->input('app_url'),
            'mail_mailer'       => $request->input('mail_mailer'),
            'mail_host'         => $request->input('mail_host'),
            'mail_port'         => $request->input('mail_port'),
            'mail_username'     => $request->input('mail_username'),
            'mail_password'     => $request->input('mail_password'),
            'mail_encryption'   => $request->input('mail_encryption'),
            'mail_from_address' => $request->input('mail_from_address'),            
        ];
        if($request->input('change') == 1){
            OptHelpers::app_env($config);
        }

        if ($request->input('test_mail_check') == true){
            
            $testMail = $request->input('test_email');
            $delay = 10;
            dispatch(new TestMailConfig($testMail))->delay($delay);
        }

        return redirect()->route('notice')->withStatus('Configuration saved!.');
    }

    public function notice()
    {
        return view('notice');
    }
}
