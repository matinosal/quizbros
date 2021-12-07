<?php require_once "./public/views/page-start.php"; ?>
<?php //require_once "./public/views/header.php"; ?>
<div class="one-page one-page__bgblue one-page__centered-content">
    <div class="row">
        <div class="page-padding">
            <div class="form-holder">
                <?php
                    foreach($errorMessages as $err){ ?>
                        <p class="form-holder__error"><?php echo $err; ?></p>
                <?php }?>
                <form action="/login" class="security-form" method="POST">
                    <p class="security-form__heading">Logowanie</p>
                    <input placeholder="E-mail" name='email' type="text" class="security-form__input">
                    <input placeholder="Haslo" name='password'type="password" class="security-form__input">
                    <input type="submit" value="Wchodzę!" class="security-form__submit">
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once "./public/views/page-end.php"; ?>