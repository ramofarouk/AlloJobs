<?php

use App\Models\User;
use App\Models\Admin;
use App\Models\Parametre;
use \Mailjet\Resources;

// Getting user logged informations
if (!function_exists('getAdminAuth')) {
  function getAdminAuth()
  {
    $id = session('id');
    $admin = Admin::where(['id' => $id])->first();
    return $admin;
  }
}

// Getting Paramètres
if (!function_exists('getParameters')) {
  function getParameters($libelle)
  {
    $parametre = Parametre::where(['libelle' => $libelle])->first();
    return $parametre->valeur;
  }
}

if (!function_exists('getUserAuth')) {
  function getUserAuth()
  {
    $id = session('id');
    $user = User::where(['id' => $id])->first();
    return $user;
  }
}
// Getting user logged informations
if (!function_exists('getUserById')) {
  function getUserById($idUser)
  {
    $user = User::where(['id' => $idUser])->first();
    return $user;
  }
}

if (!function_exists('getUserIsLogged')) {
  function getUserIsLogged()
  {
    $id = session('id');
    $isUser = session('is_user');
    if ($id > 0 && $isUser > 0) {
      return 1;
    }
    return 0;
  }
}


// Random string
if (!function_exists('getRamdomText')) {
  function getRamdomText($n)
  {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
      $index = rand(0, strlen($characters) - 1);
      $randomString .= $characters[$index];
    }
    return $randomString;
  }
}
// int string
if (!function_exists('getRamdomInt')) {
  function getRamdomInt($n)
  {
    $characters = '0123456789';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
      $index = rand(0, strlen($characters) - 1);
      $randomString .= $characters[$index];
    }
    return $randomString;
  }
}


if (!function_exists('checkApiToken')) {
  function checkApiToken($token)
  {
    $admin = Admin::where(['id' => 1])->first();
    if (Hash::check($token, $admin['token'])) {
      return 1;
    } else {
      return 0;
    }
  }
}

if (!function_exists('getDate')) {
  function getDate($date)
  {
    $elements = explode(" ", $date);
    return $elements[0];
  }
}


if (!function_exists('formatDate')) {
  function formatDate($date)
  {
    $formatDates = explode("T", $date);
    $elements = explode(" ", $formatDates[0]);
    $elements2 = explode("-", $elements[0]);
    $date = $elements2[2] . "-" . $elements2[1] . "-" . $elements2[0] . " " . $elements[1];
    return $date;
  }
}

if (!function_exists('superFormatDate')) {
  function superFormatDate($date)
  {
    $formatDates = explode("T", $date);
    $elements = explode(" ", $formatDates[0]);
    $elements2 = explode("-", $elements[0]);

    $timeFormat = explode(":", $elements[1]);
    $date = $elements2[2] . "-" . $elements2[1] . "-" . $elements2[0] . " à " . $timeFormat[0] . ":" . $timeFormat[1];
    return $date;
  }
}

if (!function_exists('formatDate2')) {
  function formatDate2($date)
  {
    $elements2 = explode("-", $date);
    $date = $elements2[2] . "-" . $elements2[1] . "-" . $elements2[0];
    return $date;
  }
}

if (!function_exists('reformatDate')) {
  function reformatDate($date)
  {
    $elements2 = explode("-", $date);
    $date = $elements2[2] . "-" . $elements2[1] . "-" . $elements2[0];
    return $date;
  }
}
if (!function_exists('formatDateSimple')) {
  function formatDateSimple($date)
  {
    $elements2 = explode("-", $date);
    $date = $elements2[2] . " " . getMonthName(intval($elements2[1])) . ", " . $elements2[0];
    return $date;
  }
}


if (!function_exists('reinitializePassword')) {
  function reinitializePassword($email, $name, $code)
  {
    $values = '{"name_user": "' . $name . '","code": "' . $code . '"}';
    // dd($values);
    $mj = new \Mailjet\Client('418b953927031140d7b31bd860fc3b8f', '3cdf33b3c0b9a81cb24d28a00d9b3753', true, ['version' => 'v3.1']);
    $body = [
      'Messages' => [
        [
          'From' => [
            'Email' => "no-reply@starsappofficial.com",
            'Name' => "Cible"
          ],
          'To' => [
            [
              'Email' => $email,
              'Name' => $name
            ]
          ],
          'TemplateID' => 3758185,
          'TemplateLanguage' => true,
          'Subject' => "Réinitialisation de mot de passe",
          'Variables' => json_decode($values, true)
        ]
      ]
    ];


    try {
      $response = $mj->post(Resources::$Email, ['body' => $body]);
    } catch (Exception $e) {
      echo "erreur";
    }
  }
}

if (!function_exists('getMonthName')) {
  function getMonthName($monthOfYear)
  {
    $arrayMonth = array(
      1 => "Janvier",
      2 => "Février",
      3 => "Mars",
      4 => "Avril",
      5 => "Mai",
      6 => "Juin",
      7 => "Juillet",
      8 => "Aôut",
      9 => "Septembre",
      10 => "Octobre",
      11 => "Novembre",
      12 => "Décembre"
    );
    $month =  $arrayMonth[$monthOfYear];
    return $month;
  }
}

if (!function_exists('sendCV')) {
  function sendCV($soumission)
  {
    $message = "Bonjour <b>" . $soumission->offre->entreprise->nom . "," .
      "</b><br>Veuillez trouver en pièce jointe le CV du candidat " . $soumission->demandeur->prenoms . " " . $soumission->demandeur->nom . " pour l'offre de <b>" . $soumission->offre->job .
      "</b>.<br><br>Cordialement,";

    $mailjetApiKey = 'c9760fa3fab00eb253dbf5edf299a5d6';
    $mailjetApiSecret = '229bbf87d869421a1eaa588f24c57752';
    $pdfBase64 = base64_encode(file_get_contents(public_path() . $soumission->cv));
    $data = [
      'Messages' => [
        [
          'From' => [
            'Email' => "no-reply@kofcorporation.com",
            'Name' => "ALLÔJOBS AFRICA"
          ],
          'To' => [
            [
              'Email' => $soumission->offre->entreprise->email,
              'Name' => $soumission->offre->entreprise->nom
            ]
          ],
          'Subject' => "Soumission de " . $soumission->demandeur->prenoms . " " . $soumission->demandeur->nom,
          'TextPart' => $message,
          'HTMLPart' => $message,
          'Attachments' => [
            [
              'ContentType' => "application/pdf",
              'Filename' => $soumission->demandeur->prenoms . "_cv.pdf",
              'Base64Content' =>  $pdfBase64
            ]
          ]
        ]
      ]
    ];
    try {
      $dataString = json_encode($data);
      $ch = curl_init('https://api.mailjet.com/v3.1/send');
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
      curl_setopt($ch, CURLOPT_USERPWD, "{$mailjetApiKey}:{$mailjetApiSecret}");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
          'Content-Type: application/json',
          'Content-Length: ' . strlen($dataString)
        )
      );
      $response = json_decode(curl_exec($ch));
    } catch (Exception $e) {
      echo "erreur " . $e->getMessage();
    }

    // return $response;
  }
}
