<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Http\Resources\Produit as ProduitResource;
use Illuminate\Support\Facades\DB;

class ProduitController extends Controller
{
    /**
     * @group  Api Produit
     *
     */
    public function all(Request $request)
    {
        return response()->json(
            ProduitResource::collection(Produit::where('status', '=', 1)->orderBy('nom','ASC')->get())
        );
    }
    /**
     * @group  Api Produit
     *
     */
    public function details(Request $request, $idProduit)
    {
        $args = array();
        $restaurant = Produit::where('id', '=', $idProduit)->first();
        $args['restaurant'] = new ProduitResource($restaurant);
        return response()->json($args, 200);
   }

}
