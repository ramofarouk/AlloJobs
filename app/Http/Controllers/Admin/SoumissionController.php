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

    public function validateSoumission(Request $request,$idSoumission)
    {
        $id = session('id');
        $soumission = Soumission::where(['id' => $idSoumission])->first();
        Soumission::where(['id' => $idSoumission])->update([
            'status' => 1
        ]);

        return redirect()->back()->with('flash_message_success', 'Message d\'accpetation envoyé au candidat!');
    }

}
