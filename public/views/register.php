<?php require_once "./public/views/page-start.php"; ?>
<?php require_once "./public/views/header.php"; ?>
<div class="one-page one-page__bgblue one-page__centered-content">
    <div class="row">
        <div class="page-padding">
            <div class="form-holder">
                <form action="" class="security-form">
                    <p class="security-form__heading">Rejestracja</p>
                    <input name="login" placeholder="Login" type="text" class="security-form__input">
                    <input name="password" placeholder="Hasło" type="password" class="security-form__input">
                    <input name="e-mail" placeholder="E-mail" type="text" class="security-form__input">
                    <div class="checkbox-container">
                        <input name="e-mail" type="checkbox" class="security-form__checkbox">
                        <p class="checkbox-container__desc">Pozwalam na przetwarzanie moich danych osobowych</p>
                    </div>
                    <input type="submit" value="Wchodzę!" class="security-form__submit">
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once "./public/views/page-end.php"; ?>