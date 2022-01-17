<?php require_once "./public/views/page-start.php"; ?>
<?php require_once "./public/views/components/header.php"; ?>
<?php require_once "./public/views/components/logo.php"; ?>
<div class="row row__bgblue">
    <div class="page-padding">
        <div class="topbar">
            <p class="topbar__heading">Kreator pokoju</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="page-padding">
        <div class="room outline-blue">
            <div class="room-inner">
                <form class="room__form" action="/makeroom" method="POST">
                    <p class="room__heading">Wpisz nazwę quizu, a następnie wybierz go z listy</p>
                    <div class="room__input-holder">
                        <input placeholder="Nazwa quizu" type="text" class="room__quiz-input quiz-name">
                        <select name="quiz_id" id="" class="room__quiz-select">
                            <option disabled value="0">Dane są ładowane proszę czekać</option>
                        </select>
                    </div>
                    <p class="room__heading">Następnie podaj nazwę swojego pokoju</p>
                    <div class="room__input-holder">
                        <input placeholder="Nazwa pokoju" name="room_name" type="text" class="room__quiz-input">
                    </div>
                    <div class="room__button button blue">Stwórz pokój!</div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once "./public/views/page-end.php"; ?>