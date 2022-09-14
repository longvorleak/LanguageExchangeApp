<?php $title = "Login"; ?>

<?php ob_start(); ?>

<div>
    <div id="g_id_onload"
        data-client_id="<?= $_SERVER['CLIENT_ID']; ?>"
        data-login_uri="https://localhost/sites/LanguageExchangeApp/index.php?action=googleLogin"
        data-auto_prompt="false">
    </div>
<div class="g_id_signin"
    data-type="standard"
    data-size="large"
    data-theme="outline"
    data-text="sign_in_with"
    data-shape="rectangular"
    data-logo_alignment="left">
    </div>
</div>
<form method="POST" action="../index.php?action=newSignUp">

</form>

<?php $content = ob_get_clean(); ?>

<?php require("template.php");