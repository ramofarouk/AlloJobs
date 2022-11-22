<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Soumission;
use App\Http\Resources\Soumission as SoumissionResource;
use App\Models\User;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\DB;

class SoumissionController extends Controller
{
     /**
     * @group  Api Soumission
     *
     */
     public function add(Request $request)
     {
        $args = array();
        $args['error'] = false;
        $nom = $request->last_name;
        $prenoms = $request->first_name;
        $telephone = $request->telephone;
        $ville = $request->ville;
        $email = $request->email;
        $profession = $request->profession;
        $date_naissance = $request->date_naissance;
        $cni = $request->cni;
        $cniGarant = $request->cni_garant;
        $photo = $request->photo;
        $certificat = $request->certificat;
        $produit = $request->produit;
        try {

            $cniToSet ="";
            if($cni != "" && $cni != null){
                $reference = getRamdomText(5);
                $cniToSet = "/docs/".$nom . $reference . ".jpg";
                $ImagePath = public_path('/docs') . "/" . $nom . $reference . ".jpg";
                file_put_contents($ImagePath,base64_decode($cni));
            }

            $cniGarantToSet ="";
            if($cniGarant != "" && $cniGarant != null){
                $reference = getRamdomText(5);
                $cniGarantToSet = "/docs/".$nom . $reference . ".jpg";
                $ImagePath = public_path('/docs') . "/" . $nom . $reference . ".jpg";
                file_put_contents($ImagePath,base64_decode($cniGarant));
            }

            $photoToSet ="";
            if($photo != "" && $photo != null){
                $reference = getRamdomText(5);
                $photoToSet = "/docs/".$nom . $reference . ".jpg";
                $ImagePath = public_path('/docs') . "/" . $nom . $reference . ".jpg";
                file_put_contents($ImagePath,base64_decode($photo));
            }

            $certificatToSet ="";
            if($certificat != "" && $certificat != null){
                $reference = getRamdomText(5);
                $certificatToSet = "/docs/".$nom . $reference . ".jpg";
                $ImagePath = public_path('/docs') . "/" . $nom . $reference . ".jpg";
                file_put_contents($ImagePath,base64_decode($certificat));
            }

            $pseudo = getRamdomInt(8);
            $password = getRamdomText(5);
            $user = User::create([
                'nom' => $nom,
                'prenoms' => $prenoms,
                'telephone' => $telephone,
                'email' => $email,
                'ville' => $ville,
                'profession' => $profession,
                'date_naissance' => $date_naissance,
                'pseudo' => $pseudo,
                'password_visible' => $password,
                'password' => bcrypt($password),
                'token' => getRamdomText(20),
                'status' => 0
            ]);

            $reservation = Soumission::create([
                'reference' => getRamdomText(20),
                'cni_souscripteur' => $cniToSet,
                'cni_garant' => $cniGarantToSet,
                'certificat_residence' => $certificatToSet,
                'photo' => $photoToSet,
                'produit_id' => $produit,
                'status' => 0,
                'user_id'=>$user->id
            ]);


            $args['message'] = "Compte crée avec succès!";           

        } catch (\Exception $e) {
            $args['error'] = true;
            $args['error_message'] = $e->getMessage();
            $args['message'] = "Erreur lors de la récupération des informations";
        }
        return response()->json($args);
    }


/**
     * @group  Api Soumission
     *
     */
public function show(Request $request, $idUser)
{
    return response()->json(
        SoumissionResource::collection(Soumission::where('user_id', '=', $idUser)->orderBy('created_at','DESC')->get())
    );
}


     /**
     * @group  Api Soumission
     *
     */
     public function details(Request $request, $idSoumission)
     {

        $args = array();
        $course = Soumission::where('id', '=', $idSoumission)->first();
        $args['course'] = new SoumissionResource($course);

        return response()->json($args, 200);
    }
}
