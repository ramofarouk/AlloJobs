<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produit;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\Produit as ProduitResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    /**
     * @group  Api Authentification User
     *
     */
    public function login(Request $request)
    {
        $args = array();
        $args['error'] = false;
        $telephone = $request->telephone;
        $password = $request->password;
        try {
            if (User::where(['telephone' => $telephone,'status' => 1,'type_user' => 1])->first()) {
                $user = User::where(['telephone' => $telephone,'status' => 1])->first();
                
                if (Hash::check($password, $user->password)) {
                    $args['user'] = new UserResource($user);
                    $args['message'] = "Informations recupérées avec succès!";
                    
                } else {
                    $args['error'] = true;
                }
            } else {
                $args['error'] = true;
            }

        } catch (\Exception $e) {
            $args['error'] = true;
            $args['error_message'] = $e->getMessage();
            $args['message'] = "Erreur lors de la récupération des informations";
        }
        return response()->json($args);
    }
    /**
     * @group  Api Authentification User
     *
     */
    public function register(Request $request)
    {
        $args = array();
        $args['error'] = false;
        $nom = $request->last_name;
        $prenoms = $request->first_name;
        $telephone = $request->telephone;
        $adresse = $request->adresse;
        $password = $request->password;
        try {
            if (!User::where(['telephone' => $telephone])->first()) {
                $user = User::create([
                    'nom' => $nom,
                    'prenoms' => $prenoms,
                    'telephone' => $telephone,
                    'adresse' => $adresse,
                    'sexe' => 1,
                    'password' => bcrypt($password),
                    'avatar' => "/avatars/default.png",
                    'status' => 1
                ]);
                //newUserEmail();
                $user = User::where(['telephone' => $telephone])->first();
                $args['user'] = new UserResource($user);
                $args['message'] = "Compte crée avec succès!";
            } else {
                $args['error'] = true;
            }

        } catch (\Exception $e) {
            $args['error'] = true;
            $args['error_message'] = $e->getMessage();
            $args['message'] = "Erreur lors de la récupération des informations";
        }
        return response()->json($args);
    }
    /**
     * @group  Api Authentification User
     *
     */
    public function updatePassword(Request $request)
    {
        $args = array();
        $args['error'] = false;
        $telephone = $request->telephone;
        $oldPassword = $request->old_password;
        $password = $request->password;
        try {
            if (User::where(['telephone' => $telephone])->first()) {
                $user = User::where(['telephone' => $telephone])->first();

                if (Hash::check($oldPassword, $user->password)) {
                    $user->update([
                        'password' => bcrypt($password)
                    ]);
                    $args['user'] = new UserResource($user);
                    $args['message'] = "Mot de passe modifié avec succès!";
                } else {
                    $args['error'] = true;
                }
            } else {
                $args['error'] = true;
            }

        } catch (\Exception $e) {
            $args['error'] = true;
            $args['error_message'] = $e->getMessage();
            $args['message'] = "Erreur lors de la modifcation du mot de passe";
        }
        return response()->json($args, 200);
    }


     /**
     * @group  Api Authentification User
     *
     */
     public function updateInfos(Request $request)
     {
        $args = array();
        $args['error'] = false;
        $telephone = $request->telephone;
        //$date_naissance = $request->date_naissance;
        //$whatsapp = $request->whatsapp;
        //$profession = $request->profession;
        $quartier = $request->quartier;
        $email = $request->email;
        $avatar = $request->avatar;

        try {
            if (User::where(['telephone' => $telephone])->first()) {
                $user = User::where(['telephone' => $telephone])->first();

                $avatarToSet = $user->avatar;
                if($avatar != "" && $avatar != null){
                    $reference = getRamdomText(5);
                    $avatarToSet = "/avatars/".$user->nom . $reference . ".png";
                    $ImagePath = public_path('/avatars') . "/" . $user->nom . $reference . ".png";
                    file_put_contents($ImagePath,base64_decode($avatar));
                }
                $user->update([
                    /*'date_naissance' => ($date_naissance != "" && $date_naissance != null)?$date_naissance:null,*/
                    //'whatsapp' => $whatsapp,
                    //'sexe' => $sexe,
                    //'profession' => $profession,
                    'adresse' => $quartier,
                    'avatar' => $avatarToSet,
                    'email' => $email
                ]);
                $args['user'] = new UserResource($user);
                $args['message'] = "Informations personnelles modifiées avec succès!";
            } else {
                $args['error'] = true;
            }

        } catch (\Exception $e) {
            $args['error'] = true;
            $args['error_message'] = $e->getMessage();
            $args['message'] = "Erreur lors de la modifcation des informations";
        }
        return response()->json($args, 200);
    }
    /**
     * @group  Api Authentification User
     *
     */
    public function updateAvatar(Request $request)
    {
        $args = array();
        $args['error'] = false;
        $telephone = $request->telephone;
        try {
            if (User::where(['telephone' => $telephone])->first()) {
                $user = User::where(['telephone' => $telephone])->first();

                $user->update([
                    'avatar' => '/avatars/default.png'
                ]);
                $args['user'] = new UserResource($user);
                $args['message'] = "Avatar modifié avec succès!";
            } else {
                $args['error'] = true;
            }

        } catch (\Exception $e) {
            $args['error'] = true;
            $args['error_message'] = $e->getMessage();
            $args['message'] = "Erreur lors de la modifcation du mot de passe";
        }
        return response()->json($args, 200);
    }
}
