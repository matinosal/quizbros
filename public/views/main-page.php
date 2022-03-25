<?php require_once "./public/views/page-start.php"; ?>
<?php require_once "./public/views/components/header.php"; ?>
<?php require_once "./public/views/components/logo.php"; ?>
<div class="row row__bgblue">
    <div class="page-padding">
        <div class="topbar">
            <p class="topbar__heading">Masz kod dostępu?</p>
            <div class="topbar__form">
                <form action="/game" class='quickform' method="POST">
                    <input placeholder="Wprowadź go tutaj" name="code" type="text" class="quickform__input">
                </form>
            </div>
        </div>
    </div>
</div>
<?php if ($user_logged) { ?>
    <div class="row row__bgpurple">
        <div class="page-padding">
            <div class="topbar">
                <p class="topbar__heading">Nie masz pomysłu na quiz? Znajdź go!</p>
                <div class="topbar__form">
                    <form action="/" class='quickform'>
                        <input placeholder="Podaj nazwę quizu!" name="search" type="text" class="quickform__input">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<div class="row">
    <div class="page-padding">
        <div class="quizholder">
            <p class="quizholder__heading">Przeglądaj popularne quizy</p>
            <?php require_once "./public/views/components/quiz-block.php"; ?>
        </div>
    </div>
</div>
<?php require_once "./public/views/page-end.php"; ?>