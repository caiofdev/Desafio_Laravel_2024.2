<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Send;

class MailController extends Controller
{
    public function index(){

        return view('admin.send');
    }
    public function sendEmail(Request $request){
        try {
            $toEmailAddress = $request->email;
            $subject = $request->subject;
            $text = $request->message;
            $response = Mail::to($toEmailAddress)->send(new Send($subject, $text));

            return redirect()->back()->with('Sucess', 'Email enviado com sucesso');
        }
        catch (Exception $e){
            \Log::error("Unable to send email" . $e->getMessage());
        }
    }
}
