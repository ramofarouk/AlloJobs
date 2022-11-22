<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Journal;
use App\Models\Admin;
use App\Models\Restaurant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;

class AdminController extends Controller
{
    public function add(Request $request)
    {
        $id = session('id');
        $restaurants = Restaurant::where(['status' =>1])->get();
        if ($request->isMethod('post')) {
            $data = $request->all();
            $email = $data['email'];
            $restaurant = $data['restaurant'];
            $password = $data['password'];
            $c_password = $data['c_password'];

            if ($password == $c_password) {
                Admin::create([
                    'email' => $email,
                    'restaurant_id' => $restaurant,
                    'password' => bcrypt($password),
                    'niveau' =>1
                ]);
                Journal::create([
                    'action' => "Création de l'administrateur " . $email,
                    'admin_id' => $id,
                ]);
                return redirect('/admin/admins/add')->with('flash_message_success', 'Nouvel Admininistrateur ajouté avec succès!');
            }else{
                return redirect('/admin/admins/add')->with('flash_message_error', 'Mots de passe non identiques!');
            }
            
        }
        return view('admin.dashboard.admins.add',compact('restaurants'));
    }
    public function edit(Request $request,$idAdmin)
    {
        $id = session('id');
        $admin = Admin::where(['id' => $idAdmin])->first();
        $restaurants = Restaurant::where(['status' =>1])->get();
        if ($request->isMethod('post')) {
            $data = $request->all();
            $email = $data['email'];
            $restaurant = $data['restaurant'];
            Journal::create([
                'action' => "Modification du mail de l'administrateur " . $admin->email . " en " . $email,
                'admin_id' => $id
            ]);

            Admin::where(['id' => $idAdmin])->update([
                'email' => $email,
                'restaurant_id' => $restaurant,
            ]);

            return redirect('/admin/admins/edit/'.$idAdmin)->with('flash_message_success', 'Admininistrateur modifié avec succès!');
        }
        return view('admin.dashboard.admins.edit')->with(compact('admin','restaurants'));
    }
    public function show()
    {
        $id = session('id');
        $admins = Admin::where(['status' =>1,'niveau'=>1])->get();
        return view('admin.dashboard.admins.show', compact('admins'));
    }
    public function delete(Request $request, $idAdmin)
    {
        $id = session('id');
        $admin = Admin::where(['id' => $idAdmin])->first();
        Admin::where(['id' => $idAdmin])->update([
            'status' => 0
        ]);
        Journal::create([
            'action' => "Suppression de l'Admininistrateur" . " " . $admin->email,
            'admin_id' => $id,
        ]);
        return redirect()->back()->with('flash_message_success', 'Admininistrateur supprimé avec succès!');
    }
}
