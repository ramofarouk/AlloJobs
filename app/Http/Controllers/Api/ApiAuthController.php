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
        $ville = $request->ville;
        $email = $request->email;
        $biographie = $request->biographie;
        $last_diplome = $request->last_diplome;
        $last_experience = $request->last_experience;
        $job = $request->job;
        $avatar = $request->avatar;
        $cv = $request->cv;

        try {
            if (!User::where(['telephone' => $telephone])->first()) {
               $cvToSet ="";
               if($cv != "" && $cv != null){
                $reference = getRamdomText(5);
                $cvToSet = "/cvs/".$nom . $reference . ".jpg";
                $ImagePath = public_path('/cvs') . "/" . $nom . $reference . ".jpg";
                file_put_contents($ImagePath,base64_decode($cv));
            }
            $avatarToSet ="/avatars/default.png";
            if($avatar != "" && $avatar != null){
                $reference = getRamdomText(5);
                $avatarToSet = "/avatars/".$nom . $reference . ".jpg";
                $ImagePath = public_path('/avatars') . "/" . $nom . $reference . ".jpg";
                file_put_contents($ImagePath,base64_decode($avatar));
            }
            $user = User::create([
                'nom' => $nom,
                'prenoms' => $prenoms,
                'telephone' => $telephone,
                'description' => $biographie,
                'last_diplome' => $last_diplome,
                'last_experience' => $last_experience,
                'job' => $job,
                //'pays' => $pays,
                'ville' => $ville,
                'email' => $email,
                'cv' => $cvToSet,
                'avatar' => $avatarToSet,
                'password' => bcrypt($password),
                'password_visible' => $password,
                'quartier' => "",
                'token' => getRamdomText(20),
                'status' => 1,
                'type_user' => 1
            ]);


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
        $nom = $request->name;
        $telephone = $request->telephone;
        $password = $request->password;
        $pays = $request->pays;
        $ville = $request->ville;
        $email = $request->email;
        $activite = $request->activite;
        $description = $request->description;
        $poste = $request->poste;
        $avatar = $request->avatar;
        $quartier = $request->quartier;
        $date_debut = $request->date_debut;

        try {
            if (!User::where(['telephone' => $telephone])->first()) {
                $avatarToSet ="/avatars/default.png";
                if($avatar != "" && $avatar != null){
                    $reference = getRamdomText(5);
                    $avatarToSet = "/avatars/".$nom . $reference . ".jpg";
                    $ImagePath = public_path('/avatars') . "/" . $nom . $reference . ".jpg";
                    file_put_contents($ImagePath,base64_decode($avatar));
                }
                $user = User::create([
                    'nom' => $nom,
                    'telephone' => $telephone,
                    'description' => $description,
                    'activite' => $activite,
                    'job' => $poste,
                    //'pays' => $pays,
                    'ville' => $ville,
                    'email' => $email,
                    'avatar' => $avatarToSet,
                    'password' => bcrypt($password),
                    'password_visible' => $password,
                    'quartier' => $quartier,
                    'date_debut' => $date_debut,
                    'token' => getRamdomText(20),
                    'status' => 0,
                    'type_user' => 2
                ]);


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
      public function updateEntreprise(Request $request)
      {
        $args = array();
        $args['error'] = false;
        $nom = $request->name;
        $user_id = $request->user_id;
        $ville = $request->ville;
        $email = $request->email;
        $activite = $request->activite;
        $description = $request->description;
        $poste = $request->poste;
        $avatar = $request->avatar;
        $quartier = $request->quartier;
        $date_debut = $request->date_debut;

        try {
            if (User::where(['id' => $user_id])->first()) {
                $user = User::where(['id' => $user_id])->first();
                $avatarToSet ="/avatars/default.png";
                if($avatar != "" && $avatar != null){
                    $reference = getRamdomText(5);
                    $avatarToSet = "/avatars/".$nom . $reference . ".jpg";
                    $ImagePath = public_path('/avatars') . "/" . $nom . $reference . ".jpg";
                    file_put_contents($ImagePath,base64_decode($avatar));
                }
                $user->update([
                    'nom' => $nom,
                    'description' => $description,
                    'activite' => $activite,
                    'job' => $poste,
                    'ville' => $ville,
                    'email' => $email,
                    'avatar' => $avatarToSet,
                    'quartier' => $quartier,
                    'date_debut' => $date_debut
                ]);


                $user = User::where(['id' => $user_id])->first();
                $args['user'] = new UserResource($user);
                $args['message'] = "Compte modifiée avec succès!";
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
