<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\User as UserResource;
use App\Http\Controllers\Controller as LaravelController;
use App\Models\User;
use App\Models\Admin;
use App\Models\Feedback;
use App\Models\Message;
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
     * @group  Api
     *
     */
    public function candidats(Request $request)
    {
        return response()->json(
            UserResource::collection(User::where('status', '=', 1)->where('type_user', '=', 1)->orderBy('nom','ASC')->get())
        );
    }

    /**
     * @group  Api
     *
     */
    public function entreprises(Request $request)
    {
        return response()->json(
            UserResource::collection(User::where('status', '=', 1)->where('type_user', '=', 2)->orderBy('nom','ASC')->get())
        );
    }

    /**
     * @group  Api Doveenam
     *
     */
    public function discussion(Request $request, $idUser,$idContact)
    {
        $users = array();
        $messages = Message::orderBy('created_at','ASC')->where('expediteur_id','=', $idUser)
        ->where('destinataire_id',$idContact)->orWhere('expediteur_id','=', $idContact)
        ->where('destinataire_id',$idUser)
        ->get();
        return response()->json(
            $messages
        );
    }

    /**
     * @group  Api Doveenam
     *
     */
    public function send(Request $request, $idUser,$idContact)
    {
        $args = array();
        $args['error'] = false;
        $message = $request->message;
        try {
            if (User::where(['id' => $idUser])->first()) {

                $message = Message::create([
                    'message' => $message,
                    'expediteur_id' => $idUser,
                    'destinataire_id' => $idContact,
                    'status' => 1
                ]);

                $messages = Message::orderBy('created_at','ASC')->where('expediteur_id','=', $idUser)
                ->where('destinataire_id',$idContact)->orWhere('expediteur_id','=', $idContact)
                ->where('destinataire_id',$idUser)
                ->get();
                $args['messages'] = $messages;

                $expediteur = User::where(['id' => $idUser])->first();
                $destinataire = User::where(['id' => $idContact])->first();

               /* sendNotifications($destinataire->token,"Ouiidrive Doveenam", "Nouveau message de " . $destinataire->pseudo);*/

                $args['error'] = false;
                $args['message'] = "Message envoyé";

            } else {
                $args['error'] = true;
            }

        } catch (\Exception $e) {
            $args['error'] = true;
            $args['error_message'] = $e->getMessage();
            $args['message'] = "Erreur lors de l'envoi du message";
        }
        return response()->json($args, 200);
    }



}
