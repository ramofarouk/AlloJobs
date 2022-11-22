<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Journal;
use App\Models\Admin;
use App\Models\User;
use App\Models\Soumission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;

class SoumissionController extends Controller
{
    public function show()
    {
        $id = session('id');
        $soumissions = Soumission::orderBy('created_at','DESC')->get();
        return view('admin.dashboard.soumissions.show', compact('soumissions'));
    }

}
