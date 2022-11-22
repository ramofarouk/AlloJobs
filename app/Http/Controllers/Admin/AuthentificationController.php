<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Journal;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthentificationController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->input();
            if (Admin::where(['email' => $data['email']])->first()) {
                $currentAdmin = Admin::where(['email' => $data['email']])->first();
                if (Hash::check($data['password'], $currentAdmin->password)) {
                    session(['id' => $currentAdmin->id,
                        'niveau' => $currentAdmin->niveau,
                        'is_admin' => 1,
                        'email' => $currentAdmin->email]);
                    Journal::create([
                        'action' => "Connexion de la plateforme",
                        'admin_id' => $currentAdmin->id,
                    ]);
                    return redirect('/admin/dashboard');

                } else {
                    return redirect()->back()->with('flash_message_error', 'Votre mot de passe invalide');
                }
            } else {
                return redirect()->back()->with('flash_message_error', 'Email invalide! Veuillez réessayer');
            }
        }
        return view('admin.index');
    }
    public function forgetPassword(Request $request)
    {
      if ($request->isMethod('post')) {
          $data = $request->input();
          if (Admin::where(['email' => $data['email']])->first()) {
              $currentAdmin = Admin::where(['email' => $data['email']])->first();
              Journal::create([
                  'action' => "Rénitialisation du mot de passe",
                  'admin_id' => $currentAdmin->id,
              ]);
              
              /*$email = $data['email'];
              $newPassword = getRamdomText(10);
              $data = array('name'=>$currentAdmin->name, 'newPassword'=>$newPassword,'email'=>$email);
              Mail::send('layouts.templates.mail', $data, function($message) use ($data){
              $message->to($data['email'], $data['name'])->subject('Réinitialisation du mot de passe');
              $message->from('admin@alcit.tg','Équipe ALCIT');
              });

              Admin::where(['id' => $currentAdmin->id])->update([
                  'password' => bcrypt($newPassword)
              ]);*/
              return redirect()->back()->with('flash_message_success', 'Votre mot de passe a été réinitialisé! Veuillez vérifier votre boite mail');
          } else {
              return redirect()->back()->with('flash_message_error', 'Email invalide! Veuillez réessayer');
          }
      }
      return view('admin.auth.forget_password');
  }
  public function testClickSend(Request $request)
  {

    //var_dump(sendSmsClickSend("+22899179270","farouk228","r@dy@t1999")); // You can check the response
    var_dump(sendSmsNotify(+22893554740,'Hello, mon frère! Ça va bien?'));
}
public function testFirebase(Request $request)
{
    $course = Course::where('id', '=', 6)->first();
    var_dump(sendCourseNotifications($course,"conducteurbZ74G2IaGaMUPC35kWYw"));
}
public function testEmail(Request $request)
{

    var_dump(newUserEmail()); // You can check the response
}

public function policy(Request $request)
{
    return view('others.policy');
}
}
