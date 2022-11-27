<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Journal;
use App\Models\Parametre;
use App\Models\Admin;
use App\Models\Entreprise;
use App\Models\Soumission;
use App\Models\User;
use App\Models\Offre;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;
use GuzzleHttp\Client as HttpClient;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $id = session('id');
        $nbreEntreprises= User::where(['status' =>1,'type_user'=>2])->get()->count();
        $nbreDemandeurs= User::where(['status' =>1,'type_user'=>1])->get()->count();
        $nbreSoumissions = Soumission::where(['status' =>1])->get()->count();

        return view('admin.dashboard.index', compact('nbreEntreprises','nbreSoumissions','nbreDemandeurs'));
        
    }


    public function logout(Request $request)
    {
        $id = session('id');
        if ($id != null) {
            Journal::create([
                'action' => "Déconnexion de la plateforme",
                'admin_id' => $id,
            ]);
        }
        $locale = app()->getLocale();
        Session::flush();
        return redirect('/admin');
    }


    public function changePassword(Request $request)
    {
        $id = session('id');
        if ($request->isMethod('post')) {
            $data = $request->all();
            $current_pwd = $data['c_password'];
            $admin = Admin::where(['id' => $id])->first();
            if (Hash::check($current_pwd, $admin->password)) {
                if ($data['n_password'] == $data['cn_password']) {
                    Admin::where(['id' => $id])->update([
                        'password' => bcrypt($data['n_password'])
                    ]);
                    Journal::create([
                        'action' => "Mise à jour du mot de passe",
                        'admin_id' => $id,
                    ]);
                    return redirect()->back()->with('flash_message_success', 'Mot de passe mis à jour avec succès!');
                } else {
                    return redirect()->back()->with('flash_message_error', 'Mots de passe non identiques!');
                }
            } else {
                return redirect()->back()->with('flash_message_error', 'Mot de passe actuel invalide!');
            }

        }
        return view('admin.dashboard.profile.change_password');
    }

    public function profile(Request $request)
    {
        $id = session('id');
        $admin = Admin::where(['id' => $id])->first();
        if ($request->isMethod('post')) {
            $data = $request->all();
            Admin::where(['id' => $id])->update([
                'email' => $data['email']
            ]);
            Journal::create([
                'action' => "Mise à jour des informations personnelles",
                'admin_id' => $id,
            ]);
            return redirect('/admin/profile')->with('flash_message_success', 'Informations mises à jour avec succès!');
        }
        return view('admin.dashboard.profile.profile', compact('admin'));
    }

    public function journaux()
    {
        $id = session('id');
        $journaux = Journal::orderBy("created_at", 'DESC')->get();
        return view('admin.dashboard.journaux', compact('journaux'));
    }

    public function candidats()
    {
        $id = session('id');
        $users = User::where(['type_user' => 1])->orderBy("created_at", 'DESC')->get();
        return view('admin.dashboard.users.candidats', compact('users'));
    }

    public function deleteProfile(Request $request,$idUser)
    {
        $id = session('id');
        User::where(['id' => $idUser])->update([
            'status' => 0
        ]);

        return redirect()->back()->with('flash_message_success', 'Profil supprimé avec succès!');
    }

    public function validateSoumission(Request $request,$idUser)
    {
        $id = session('id');
        User::where(['id' => $idUser])->update([
            'status' => 1
        ]);

        return redirect()->back()->with('flash_message_success', 'Profil validé avec succès!');
    }
    public function deleteEntreprise(Request $request,$idUser)
    {
        $id = session('id');
        User::where(['id' => $idUser])->update([
            'status' => 99
        ]);

        return redirect()->back()->with('flash_message_success', 'Profil validé avec succès!');
    }

    public function detailsEntreprises(Request $request,$idUser)
    {
        $id = session('id');
        $entreprise = User::where(['id' => $idUser])->first();
        $offres = Offre::where(['status' => 1])->orderBy("created_at", 'DESC')->get();
        return view('admin.dashboard.users.details_entreprise', compact('offres','entreprise'));
    }

    public function entreprises()
    {
        $id = session('id');
        $users = User::where(['type_user' => 2])->where('status','!=',99)->orderBy("created_at", 'DESC')->get();
        return view('admin.dashboard.users.entreprises', compact('users'));
    }

}
