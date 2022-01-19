<?php require_once "./public/views/page-start.php"; ?>
<div class="one-page one-page__bgblue one-page__centered-content" data-roomID="<?php echo $room->getRoomId(); ?>">
    <div class="row">
        <div class="page-padding">
            <div class="game-holder outline-blue">
                <div class="game__first-step">
                    <div class="game__title">
                        <p class="game__title-text">Witaj w pokoju: <?php echo $room->getName(); ?></p>
                        <p class="game__title-text">Podaj swoją nazwę, aby móc zacząć rozgrywkę.</p>
                    </div>
                    <div class="input-holder">
                        <input type="text" class="game-form__input outline-blue">
                    </div>
                    <div class="game__button button blue">Dołącz!</div>
                </div>

                <div class="game__players" style="display:none;">
                    <p class="game__players-heading">Oczekiwanie na innych graczy</p>
                    <div class="game__players-holder outline-purple">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "./public/views/page-end.php"; ?>