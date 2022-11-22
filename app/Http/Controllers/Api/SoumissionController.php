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
        $user_id = $request->user_id;
        $entreprise_id = $request->entreprise_id;
        $cv = $request->cv;
        try {

            $cvToSet ="";
            if($cv != "" && $cv != null){
                $reference = getRamdomText(5);
                $cvToSet = "/cvs/" . $reference . ".pdf";
                $ImagePath = public_path('/cvs') . "/" . $reference . ".pdf";
                file_put_contents($ImagePath,base64_decode($cv));
            }

            $soumission = Soumission::create([
                'reference' => getRamdomText(20),
                'cv' => $cvToSet,
                'entreprise_id' => $entreprise_id,
                'status' => 1,
                'demandeur_id'=>$user_id
            ]);

            $args['message'] = "Soumission effectuée avec succès!";           

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
