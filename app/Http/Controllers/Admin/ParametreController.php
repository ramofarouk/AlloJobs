<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Journal;
use App\Models\Admin;
use App\Models\User;
use App\Models\Parametre;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;

class ParametreController extends Controller
{
    public function add(Request $request)
    {
        $id = session('id');
        if ($request->isMethod('post')) {
            $data = $request->all();
            $libelle = strtoupper($data['libelle']);
            $valeur = $data['valeur'];
            Parametre::create([
                'libelle' => $libelle,
                'valeur' => $valeur
            ]);
            Journal::create([
                'action' => "Création du paramètre " . $libelle,
                'admin_id' => $id,
            ]);
            return redirect('/admin/parametres/add')->with('flash_message_success', 'Nouveau paramètre ajouté avec succès!');
        }
        return view('admin.dashboard.parametres.add');
    }
    public function edit(Request $request,$idParametre)
    {
        $id = session('id');
        $parametre = Parametre::where(['id' => $idParametre])->first();
        if ($request->isMethod('post')) {
            $data = $request->all();
            $libelle = strtoupper($data['libelle']);
            $valeur = $data['valeur'];
            Journal::create([
                'action' => "Modification de la valeur du paramètre ". $parametre->libelle,
                'admin_id' => $id
            ]);

            Parametre::where(['id' => $idParametre])->update([
                'libelle' => $libelle,
                'valeur' => $valeur
            ]);

            return redirect('/admin/parametres/edit/'.$idParametre)->with('flash_message_success', 'Paramètre modifié avec succès!');
        }
        return view('admin.dashboard.parametres.edit')->with(compact('parametre'));
    }
    public function show()
    {
        $id = session('id');
        $parametres = Parametre::where(['status' =>1])->get();
        return view('admin.dashboard.parametres.show', compact('parametres'));
    }
    public function delete(Request $request, $idParametre)
    {
        $id = session('id');
        $parametre = Parametre::where(['id' => $idParametre])->first();
        Parametre::where(['id' => $idParametre])->update([
            'status' => 0
        ]);
        Journal::create([
            'action' => "Suppression du paramètre" . " " . $parametre->libelle,
            'admin_id' => $id,
        ]);
        return redirect()->back()->with('flash_message_success', 'Paramètre supprimé avec succès!');
    }
}
