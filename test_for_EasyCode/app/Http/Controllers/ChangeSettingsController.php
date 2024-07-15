<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Support\Facades\Mail;

class ChangeSettingsController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $date = $request->validated();
        $number = rand(10000, 100000);
        setcookie('name', $date['name'], time()+3600);
        setcookie('number', $number, time()+3600);

        if ($date['select'] == 'email') {
            Mail::raw('Код подтверждения: ' . $number, fn ($mail) => $mail->to('' . auth()->user()->email . ''));
        } else if ($date['select'] == 'tg') {
            $chat = TelegraphChat::where('chat_id', auth()->user()->tg)->get()[0];
            $chat->message('Код подтверждения: ' . $number)->send();
        }
        return redirect()->route('verify');
    }
}
