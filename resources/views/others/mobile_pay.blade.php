<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.cinetpay.com/seamless/main.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="/sweet/sweetalert2.min.css">
    <style>
        .sdk {
            display: block;
            position: absolute;
            background-position: center;
            text-align: center;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            font-family: 'Montserrat', sans-serif
        }

        body{
            background-color:white;
        }

        .container {
            margin: 20px auto;
            width: 400px;
            padding: 30px
        }

        .card.box1 {
            width: 350px;
            height: 500px;
            background-color: #367439;
            color: #baf0c3;
            border-radius: 0
        }

        .card.box2 {
            width: 450px;
            height: 580px;
            background-color: #ffffff;
            border-radius: 0
        }

        .text {
            font-size: 13px
        }

        .box2 .btn.btn-primary.bar {
            width: 20px;
            background-color: transparent;
            border: none;
            color: #367439
        }

        .box2 .btn.btn-primary.bar:hover {
            color: #baf0c3
        }

        .box1 .btn.btn-primary {
            background-color: #2B432D;
            width: 45px;
            height: 45px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #ddd
        }

        .box1 .btn.btn-primary:hover {
            background-color: #f6f8f7;
            color: #2B432D
        }

        .btn.btn-success {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #ddd;
            color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            border: none
        }

        .nav.nav-tabs {
            border: none;
            border-bottom: 2px solid #ddd
        }

        .nav.nav-tabs .nav-item .nav-link {
            border: none;
            color: black;
            border-bottom: 2px solid transparent;
            font-size: 14px
        }

        .nav.nav-tabs .nav-item .nav-link:hover {
            border-bottom: 2px solid #367439;
            color: #05cf48
        }

        .nav.nav-tabs .nav-item .nav-link.active {
            border: none;
            border-bottom: 2px solid #367439
        }

        .form-control {
            border: none;
            border-bottom: 1px solid #ddd;
            box-shadow: none;
            height: 20px;
            font-weight: 600;
            font-size: 14px;
            padding: 15px 0px;
            letter-spacing: 1.5px;
            border-radius: 0
        }

        .inputWithIcon {
            position: relative
        }

        img {
            width: 50px;
            height: 20px;
            object-fit: cover
        }

        .inputWithIcon span {
            position: absolute;
            right: 0px;
            bottom: 9px;
            color: #2B432D;
            cursor: pointer;
            transition: 0.3s;
            font-size: 14px
        }

        .form-control:focus {
            box-shadow: none;
            border-bottom: 1px solid #ddd
        }

        .btn-outline-primary {
            color: black;
            background-color: #ddd;
            border: 1px solid #ddd
        }

        .btn-outline-primary:hover {
            background-color: #05cf48;
            border: 1px solid #ddd
        }

        .btn-check:active+.btn-outline-primary,
        .btn-check:checked+.btn-outline-primary,
        .btn-outline-primary.active,
        .btn-outline-primary.dropdown-toggle.show,
        .btn-outline-primary:active {
            color: #baf0c3;
            background-color: #367439;
            box-shadow: none;
            border: 1px solid #ddd
        }

        .btn-group>.btn-group:not(:last-child)>.btn,
        .btn-group>.btn:not(:last-child):not(.dropdown-toggle),
        .btn-group>.btn-group:not(:first-child)>.btn,
        .btn-group>.btn:nth-child(n+3),
        .btn-group>:not(.btn-check)+.btn {
            border-radius: 50px;
            margin-right: 20px
        }

        form {
            font-size: 14px
        }

        form .btn.btn-primary {
            width: 100%;
            height: 45px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #367439;
            border: 1px solid #ddd
        }

        form .btn.btn-primary:hover {
            background-color: #05cf48
        }

        @media (max-width:750px) {
            .container {
                padding: 10px;
                width: 100%
            }

            .text-green {
                font-size: 14px
            }

            .card.box1,
            .card.box2 {
                width: 100%
            }

            .nav.nav-tabs .nav-item .nav-link {
                font-size: 12px
            }
        }
    </style>
    <script>
        function checkout() {
            CinetPay.setConfig({
                apikey: '213188578861a0bee3cda0b2.08858835',//   YOUR APIKEY
                site_id: '730365',//YOUR_SITE_ID
                notify_url: 'https://capitalautotaxi.com/api/notify',
                mode: 'PRODUCTION'
            });
            CinetPay.getCheckout({
                transaction_id: '{{ $recharge->identifier }}', // YOUR TRANSACTION ID
                amount: parseInt('{{ $recharge->montant + $recharge->frais}}'),
                currency: 'XOF',
                channels: 'ALL',
                description: 'Recharge de portefeuille',   
                 //Fournir ces variables pour le paiements par carte bancaire
                customer_name:"{{ $recharge->user->nom }}",//Le nom du client
                customer_surname:"{{ $recharge->user->prenoms }}",//Le prenom du client
                customer_email: "{{ $recharge->user->email }}",//l'email du client
                customer_phone_number: "{{ $recharge->user->telephone }}",//l'email du client
                customer_address : "",//addresse du client
                customer_city: "",// La ville du client
                customer_country : "",// le code ISO du pays
                customer_state : "",// le code ISO l'état
                customer_zip_code : "", // code postal

            });
            CinetPay.waitResponse(function(data) {
                if (data.status == "REFUSED") {
                    Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: 'Votre paiement a échoué!'
                  })
                } else if (data.status == "ACCEPTED") {
                  Swal.fire({
                      icon: 'success',
                      title: 'Félicitations',
                      text: 'Paiement effectué avec succès, vous pouvez quitter la page!'
                  })
                }
            });
            CinetPay.onError(function(data) {
                console.log(data);
            });
        }
    </script>
</head>
<body>
</head>
<body>
    <div class="container bg-light d-md-flex align-items-center">
     <div class="card box1 shadow-sm p-md-5 p-md-5 p-4">
      <div class="fw-bolder mb-4"><h6 style="text-align:center;color: white;">Recharge de portefeuille</h6></div>
      <div class="d-flex flex-column">
        <div class="d-flex align-items-center justify-content-between text"> <span class="">Montant</span><span class="ps-1">{{ $recharge->montant }} XOF</span></span> </div>
        <div class="d-flex align-items-center justify-content-between text"> <span class="">Commission</span><span class="ps-1">{{ $recharge->frais }} XOF</span></span> </div>
        <div class="d-flex align-items-center justify-content-between text mb-4"> <span>Total</span><span class="ps-1">{{ $recharge->montant + $recharge->frais }} XOF</span></span> </div>
        <div class="border-bottom mb-4"></div>
        <div class="d-flex flex-column mb-4"> <span class="far fa-file-alt text"><span class="ps-2">Facture ID:</span></span> <span class="ps-3">{{ $recharge->identifier }}</span> </div>
        <div class="d-flex flex-column mb-5"> <span class="far fa-calendar-alt text"><span class="ps-2">Date de paiement:</span></span> <span class="ps-3">{{ $today }}</span> </div>
        <div class="col-12 px-md-3 px-4 mt-3">
         <div class="btn btn-primary w-100" onclick="checkout()">Payer maintenant</div>
     </div>
 </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/sweet/sweetalert2.all.min.js"></script>
<script src="/sweet/sweetalert2.min.js"></script>
</body>
</html>  