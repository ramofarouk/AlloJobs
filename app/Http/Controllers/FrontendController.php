<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;
class FrontendController extends Controller
{
    public function index(Request $request)
    {
        return view('index');
    }

    public function policy(Request $request)
    {
        return view('others.policy');
    }

    public function deleteData(Request $request)
    {
        return view('others.delete_data');
    }

}
