<?php require_once "./public/views/page-start.php"; ?>
<?php require_once "./public/views/components/header.php"; ?>
<div class="one-page one-page__bgblue one-page__centered-content">
    <div class="row">
        <div class="page-padding">
            <div class="form-holder">
                <form action="/login" class="security-form" method="POST">
                    <p class="security-form__heading">Logowanie</p>
                    <?php
                    foreach ($errorMessages as $err) { ?>
                        <p class="form-holder__error"><?php echo $err; ?></p>
                    <?php } ?>
                    <input placeholder="E-mail" name='email' type="text" class="security-form__input outline-blue">
                    <input placeholder="Haslo" name='password' type="password" class="security-form__input outline-blue">
                    <div tabindex=0 class="security-form__submit button blue ">Wchodzę</div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once "./public/views/page-end.php"; ?>