<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class frontNosotrosController extends Controller
{
    public function index()
    {
        return view('front.nosotros.index');
    }

}
