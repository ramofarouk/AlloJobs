<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\User as UserResource;
use App\Http\Controllers\Controller as LaravelController;
use App\Models\User;
use App\Models\Admin;
use App\Models\Feedback;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;
use Validator;
use Carbon\Carbon;


class ApiController extends LaravelController
{
     /**
     * @group  Api Token
     * Update the authenticated user's API token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
     public function setToken(Request $request)
     {

        $token = "MAuto@2022";
        Admin::where(['id' => 1])->update([
            'token' => bcrypt($token)
        ]);

        return ['token' => $token];
    }

    /**
     * @group  Api Feedback
     *
     */
    public function feedback(Request $request)
    {
        $args = array();
        $args['error'] = false;

        $user = User::where('telephone', '=', $request->telephone)->first();
        if ($user == null) {
            return response()->json(["Erreur telephone"], 400);
        }
        try {
            $feedback = new Feedback();
            $feedback->contenu = $request->contenu;
            $feedback->user_id = $user->id;
            $feedback->save();
            //newFeedback();
            $args['user'] = new UserResource($user);
            $args['message'] = "Feedback enregistré avec succès";
        } catch (\Exception $e) {
            $args['error'] = true;
            $args['error_message'] = $e->errorInfo;
            $args['message'] = "Erreur lors de l'enregistrement du Feedback";
        }

        return response()->json($args, 200);

    }

 /**
     * @group  Api User
     *
     */
 public function detailsUser(Request $request,$idUser)
 {
    $user = User::where(['id' => $idUser])->first();
    return response()->json(
        new UserResource($user)
    );
}







}
