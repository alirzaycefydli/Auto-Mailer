<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="{{asset('img')}}/user_bg.png" sizes="16x16">
    <link rel="icon" type="image/png" href="{{asset('img')}}/user_bg.png" sizes="32x32">

    <title>Auto Mailer</title>

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>

    <!-- uikit -->
    <link rel="stylesheet" href="{{asset('css')}}/uikit.almost-flat.min.css"/>

    <!-- altair admin login page -->
    <link rel="stylesheet" href="{{asset('css')}}/login_page.min.css" />

</head>
<body class="login_page">

<div id="app_title" class="uk-margin-top uk-text-center uk-margin-large-bottom">
    <h1 class="">Auto Mailer</h1>
</div>

<div class="login_page_wrapper">
    <div class="md-card" id="login_card">
        <div class="md-card-content large-padding" id="login_form">

            <div class="login_heading">
                <div class="user_avatar">
                    <img src="{{asset('img')}}/user_bg.png" >
                </div>
            </div>
            @if($errors->any())
                <div class="uk-alert-danger uk-text-contrast">
                    {{$errors->first()}}
                </div>
            @endif
            <form method="POST" action="{{route('admin.loginPost')}}">
                @csrf
                <div class="uk-form-row">
                    <label for="login_username">Kullanıcı Adı</label>
                    <input class="md-input" type="text" name="login_email" />
                </div>
                <div class="uk-form-row">
                    <label for="login_password">Şifre</label>
                    <input class="md-input" type="password" name="login_password" />
                </div>
                <div class="uk-margin-medium-top">
                    <button type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large">Giriş Yap</button>
                </div>
            </form>
        </div>


        <div class="md-card-content large-padding" id="register_form" style="display: none">
            <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
            <h2 class="heading_a uk-margin-medium-bottom">Yardım Sayfası</h2>
            <div>
                Kullanıcıya yardım edilecek sayfa
                Ne bileyim soru felan sorsun
            </div>
        </div>
    </div>
    <div class="uk-margin-top uk-text-center">
        <a href="#" id="signup_form_show">Yardıma İhtiyacım var!</a>
    </div>
</div>

<!-- common functions -->
<script src="{{asset('js')}}/common.min.js"></script>
<!-- uikit functions -->
<script src="{{asset('js')}}/uikit_custom.min.js"></script>
<!-- altair core functions -->
<script src="{{asset('js')}}/altair_admin_common.min.js"></script>

<!-- altair login page functions -->
<script src="{{asset('js')}}/login.min.js"></script>

</body>
</html>
