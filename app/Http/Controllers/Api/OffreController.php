<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offre;
use App\Http\Resources\Offre as OffreResource;
use App\Models\User;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\DB;

class OffreController extends Controller
{
     /**
     * @group  Api Offre
     *
     */
     public function add(Request $request)
     {
        $args = array();
        $args['error'] = false;
        $user_id = $request->user_id;
        $date_debut = $request->date_debut;
        $description = $request->description;
        $job = $request->job;
        try {

            $soumission = Offre::create([
                'date_debut' => $date_debut,
                'description' => $description,
                'job' => $job,
                'status' => 1,
                'user_id'=>$user_id
            ]);

            $args['message'] = "Offre ajoutée avec succès!";           

        } catch (\Exception $e) {
            $args['error'] = true;
            $args['error_message'] = $e->getMessage();
            $args['message'] = "Erreur lors de la récupération des informations";
        }
        return response()->json($args);
    }


/**
     * @group  Api Offre
     *
     */
public function show(Request $request, $idUser)
{
    return response()->json(
        OffreResource::collection(Offre::where('user_id', '=', $idUser)->orderBy('created_at','DESC')->get())
    );
}


/**
     * @group  Api
     *
     */
    public function all(Request $request)
    {
        return response()->json(
            OffreResource::collection(Offre::where('status', '=', 1)->orderBy('created_at','DESC')->get())
        );
    }


}
