<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Home extends Controller
{


    public function index()
    {
        return view('back-end.home');
    }
}
