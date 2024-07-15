<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class VerController extends Controller
{
    public function __invoke()
    {
        return view('ver');
    }
}
