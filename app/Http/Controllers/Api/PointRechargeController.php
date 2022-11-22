<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ville;
use App\Http\Resources\Ville as VilleResource;
use Illuminate\Support\Facades\DB;


class PointRechargeController extends Controller
{
    /**
     * @group  Api Produit
     *
     */
    public function all(Request $request)
    {
        return response()->json(
            VilleResource::collection(Ville::where('status', '=', 1)->orderBy('libelle','ASC')->get())
        );
    }
    /**
     * @group  Api Ville
     *
     */
    public function details(Request $request, $idVille)
    {
        $args = array();
        $ville = Produit::where('id', '=', $idVille)->first();
        $args['ville'] = new ProduitResource($ville);
        return response()->json($args, 200);
   }

}
