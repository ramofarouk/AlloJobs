<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Parametre;
use App\Http\Resources\User as UserResource;
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
        //$password = $request->password;
        try {
            if (User::where(['telephone' => $telephone])->first()) {
                $user = User::where(['telephone' => $telephone])->first();
                $args['user'] = new UserResource($user);
                $args['message'] = "Informations recupérées avec succès!";
            } else {
                $otp = getRamdomInt(4);
                //sendSmsNotify($telephone,"Votre code de verification Ouiidrive: " . $otp);
                $args['error'] = true;
                $args['otp'] = $otp;
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
        $password = $request->password;
        $pays = $request->pays;
        $quartier = $request->quartier;
        $email = $request->email;
        $parrainage = $request->parrainage;
        try {
            if (!User::where(['telephone' => $telephone])->first()) {
               if($parrainage != "" && $parrainage != null){
                $parrain =  User::where(['code_parrainage' => $parrainage])->first();
                $user = User::create([
                    'nom' => $nom,
                    'prenoms' => $prenoms,
                    'telephone' => $telephone,
                    'pays' => $pays,
                    'ville' => " ",
                    //'code_parrainage' => $parrainage,
                    'email' => $email,
                    'password' => bcrypt($password),
                    'avatar' => "/avatars/default.png",
                    'parrain_id' => $parrain->id,
                    'quartier' => $quartier,
                    'token' => getRamdomText(20),
                    'status' => 1,
                    'type_user' => 1
                ]);
            }  else{
                $user = User::create([
                    'nom' => $nom,
                    'prenoms' => $prenoms,
                    'telephone' => $telephone,
                    'pays' => $pays,
                    'ville' => " ",
                    //'code_parrainage' => $parrainage,
                    'email' => $email,
                    'password' => bcrypt($password),
                    'avatar' => "/avatars/default.png",
                    'quartier' => $quartier,
                    'token' => getRamdomText(20),
                    'status' => 1,
                    'type_user' => 1
                ]);
            } 


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
      public function registerEntreprise(Request $request)
      {
        $args = array();
        $args['error'] = false;
        $nom = $request->last_name;
        $prenoms = $request->first_name;
        $telephone = $request->telephone;
        $password = $request->password;
        $pays = $request->pays;
        $email = $request->email;
        $immatriculation = $request->immatriculation;
        $marque = $request->marque;
        $type_user = $request->type_user;
        $vehicule = $request->vehicule;
        $avatar = $request->avatar;
        $quartier = $request->quartier;
        $parrainage = $request->parrainage;
        try {
            if (!User::where(['telephone' => $telephone])->first()) {

                $vehiculeToSet ="/vehicules/default.png";
             if($vehicule != "" && $vehicule != null){
                    $reference = getRamdomText(5);
                    $vehiculeToSet = "/vehicules/".$nom . $reference . ".jpg";
                    $ImagePath = public_path('/vehicules') . "/" . $nom . $reference . ".jpg";
                    file_put_contents($ImagePath,base64_decode($vehicule));
                }
                $avatarToSet ="/avatars/default.png";
             if($avatar != "" && $avatar != null){
                    $reference = getRamdomText(5);
                    $avatarToSet = "/avatars/".$nom . $reference . ".jpg";
                    $ImagePath = public_path('/avatars') . "/" . $nom . $reference . ".jpg";
                    file_put_contents($ImagePath,base64_decode($avatar));
                }

                if($parrainage != "" && $parrainage != null){
                    $parrain =  User::where(['code_parrainage' => $parrainage])->first();
                    $user = User::create([
                        'nom' => $nom,
                        'prenoms' => $prenoms,
                        'telephone' => $telephone,
                        'pays' => $pays,
                    //'code_parrainage' => $parrainage,
                        'email' => $email,
                        'password' => bcrypt($password),
                        'avatar' => $avatarToSet,
                       // 'cni' => $cniToSet,
                        'parrain_id' => $parrain->id,
                        'quartier' => $quartier,
                        'token' => getRamdomText(20),
                        'status' => 1,
                        'type_user' => $type_user
                    ]);
                }  else{
                    $user = User::create([
                        'nom' => $nom,
                        'prenoms' => $prenoms,
                        'telephone' => $telephone,
                        'pays' => $pays,
                    //'code_parrainage' => $parrainage,
                        'email' => $email,
                        'password' => bcrypt($password),
                        'avatar' => $avatarToSet,
                       // 'cni' => $cniToSet,
                        'quartier' => $quartier,
                        'token' => getRamdomText(20),
                        'status' => 1,
                        'type_user' => $type_user
                    ]);
                } 
                
                $user = User::where(['telephone' => $telephone])->first();

                $vehicule = Vehicule::create([
                    'marque' => $marque,
                    'photo' => $vehiculeToSet,
                    'immatriculation' => $immatriculation,
                    'description' => "",
                    'climatisation' => 1,//$climatisation,
                    'status' => 1,
                    'type' => 2,
                    'user_id'=>$user->id
                ]);

                //newUserEmail();
                
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
     public function check(Request $request)
     {
        $args = array();
        $args['error'] = false;
        $telephone = $request->telephone;
        $password = $request->password;
        try {
            if (User::where(['telephone' => $telephone])->first()) {
                $user = User::where(['telephone' => $telephone])->first();
                if (Hash::check($password, $user->password)) {
                    $args['user'] = new UserResource($user);
                    $args['message'] = "Compte recupéré avec succès!";
                }else{
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
     public function sendCode(Request $request)
     {
        $args = array();
        $args['error'] = false;
        $telephone = $request->telephone;
        try {
            $otp = getRamdomInt(4);
            sendSmsNotify($telephone,"Votre code de verification Ouiidrive: " . $otp);
            $args['otp'] = $otp;
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
     public function sendCodeSMS(Request $request)
     {
        $args = array();
        $args['error'] = false;
        $telephone = $request->telephone;
        $code = $request->code;
        try {
            $user = User::where(['telephone' => $telephone])->first();
           $args['status'] = sendSmsApi($user->telephone,$user->prenoms . " " .$user->nom,$code);
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
            $args['message'] = "Erreur lors de la modification du mot de passe";
        }
        return response()->json($args, 200);
    }

    /**
     * @group  Api Authentification User
     *
     */
    public function reinitializePassword(Request $request)
    {
        $args = array();
        $args['error'] = false;
        $telephone = $request->telephone;
        $password = $request->password;
        try {
            if (User::where(['telephone' => $telephone])->first()) {
                $user = User::where(['telephone' => $telephone])->first();

                 $user->update([
                        'password' => bcrypt($password)
                    ]);
                    $args['user'] = new UserResource($user);
                    $args['message'] = "Mot de passe modifié avec succès!";
            } else {
                $args['error'] = true;
            }

        } catch (\Exception $e) {
            $args['error'] = true;
            $args['error_message'] = $e->getMessage();
            $args['message'] = "Erreur lors de la modification du mot de passe";
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
        $avatar = $request->avatar;
        try {
            if (User::where(['telephone' => $telephone])->first()) {
                $user = User::where(['telephone' => $telephone])->first();

                $avatarToSet= "/avatars/default.png";
                  if($avatar != "" && $avatar != null){
                    $reference = getRamdomText(5);
                    $avatarToSet = "/avatars/".$user->nom . $reference . ".jpg";
                    $ImagePath = public_path('/avatars') . "/" . $user->nom . $reference . ".jpg";
                    file_put_contents($ImagePath,base64_decode($avatar));
                }

                $user->update([
                    'avatar' => $avatarToSet
                ]);
                $args['user'] = new UserResource($user);
                $args['message'] = "Avatar modifié avec succès!";
            } else {
                $args['error'] = true;
            }

        } catch (\Exception $e) {
            $args['error'] = true;
            $args['error_message'] = $e->getMessage();
            $args['message'] = "Erreur lors de la modification du mot de passe";
        }
        return response()->json($args, 200);
    }

     /**
     * @group  Api Authentification User
     *
     */
     public function update(Request $request)
     {
        $args = array();
        $args['error'] = false;
        $telephone = $request->telephone;
        $nom = $request->last_name;
        $prenoms = $request->first_name;
        $email = $request->email;
        $quartier = $request->quartier;
        try {
            if (User::where(['telephone' => $telephone])->first()) {
                $user = User::where(['telephone' => $telephone])->first();

                $user->update([
                    'nom' => $nom,
                    'prenoms' => $prenoms,
                    'email' => $email,
                    'quartier' => $quartier,
                ]);
                $args['user'] = new UserResource($user);
                $args['message'] = "Informations modifiés avec succès!";
            } else {
                $args['error'] = true;
            }

        } catch (\Exception $e) {
            $args['error'] = true;
            $args['error_message'] = $e->getMessage();
            $args['message'] = "Erreur lors de la modification des informations";
        }
        return response()->json($args, 200);
    }

}
