<?php

namespace App\Http\Controllers;

use App\Models\Message;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class MessageController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('message');
    }

    public function store(Request $request)
    {

        try {
            $request->validate([
                'phone_number'=>'required|numeric',
                'user_name'=>'required|string',
                'email'=>'required|email'
            ]);

            Message::query()->create([
                'email'=>$request->email,
                'phone_number'=>$request->phone_number,
                'user_name'=>$request->user_name
            ]);
            $this->sendMessage($request->toArray());
            return redirect()->back()->with('message','Ваще данные отправлены !');

        } catch (\Exception $e) {

            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    /**
     * @param array $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendMessage(array $request)
    {
        Mail::send(['html'=>'mail'],['text'=>$request], function($message){
            $message->to('jal99ol3bek11@gmail.com','KONTUR')->subject('Тестовая задача');
            $message->from('jal99ol3bek@gmail.com','Ruzmetov Jaloladdin');
        });
    }
}
