<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailConfig;
use Illuminate\Support\Facades\Log;
use Mail;

use App\Http\Helpers\OptHelpers;

class EmailConfigController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = EmailConfig::first();
        
        return view('welcome')->with('config', $config);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestselect('id')
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'app_name' => 'required',
            'app_url' => 'required',
            'mail_mailer' => 'required',
            'mail_host' => 'required',
            'mail_port' => 'required|numeric',
            'mail_username' => 'required|email',
            'mail_password' => 'required',
            'mail_encryption' => 'required',
            'mail_from_address' => 'required|email'
        ]);

        $config = new EmailConfig([
            'app_name' => $request->get('app_name'),
            'app_url' => $request->get('app_url'),
            'mail_mailer' => $request->get('mail_mailer'),
            'mail_host' => $request->get('mail_host'),
            'mail_port' => $request->get('mail_port'),
            'mail_username' => $request->get('mail_username'),
            'mail_password' => $request->get('mail_password'),
            'mail_encryption' => $request->get('mail_encryption'),
            'mail_from_address' => $request->get('mail_from_address'),            
        ]);
                
        $config->save();
        OptHelpers::app_env();

        if ($request->get('test_mail_check') == true){
            
            $testMail = $request->get('test_email');
            Mail::send([], [], function($message)use($testMail) {
                $message->to($testMail, 'Test User')
                        ->subject('Test Mailing')
                        ->setBody('Hi, This is a test mail');                
            });
        }

        return redirect()->route('email-config')->withStatus('Configuration saved!.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $config = EmailConfig::findOrFail($id);

        $request->validate([
            'app_name' => 'required',
            'app_url' => 'required',
            'mail_mailer' => 'required',
            'mail_host' => 'required',
            'mail_port' => 'required|numeric',
            'mail_username' => 'required|email',
            'mail_password' => 'required',
            'mail_encryption' => 'required',
            'mail_from_address' => 'required|email'
        ]);

        $config->app_name = $request->input('app_name');
        $config->app_url = $request->input('app_url');
        $config->mail_mailer = $request->input('mail_mailer');
        $config->mail_host = $request->input('mail_host');
        $config->mail_port = $request->input('mail_port');
        $config->mail_username = $request->input('mail_username');
        $config->mail_password = $request->input('mail_password');
        $config->mail_encryption = $request->input('mail_encryption');
        $config->mail_from_address = $request->input('mail_from_address');

        $config->save();

        if($request->input('change') == 1){
            OptHelpers::app_env();
            // sleep(3);
        }        

        if ($request->input('test_mail_check') == true){
            
            $testMail = $request->input('test_email');
            Mail::send([], [], function($message)use($testMail) {
                $message->to($testMail, 'Test User')
                        ->subject('Test Mailing')
                        ->setBody('Hi, This is a test mail');                
            });
        }
        
        return redirect()->route('email-config')->withStatus('Configuration saved!.');
    }
}
