<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class VerUpdateController extends Controller
{
    public function __invoke(UpdateRequest $request)
    {
        $date = $request->validated();
        if ($date['number'] == $_COOKIE['number']) {
            User::find(auth()->user()->id)->update(['name' => $_COOKIE['name']]);
            setcookie('name', '', time() - 1000);
            setcookie('number', '', time() - 1000);
            return redirect()->route('home');
        } else {
            return back()->with('status', 'К сожалению, Вы ввели неправильный код. Попробуйте снова.');
        }
    }
}
