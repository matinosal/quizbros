<?php require_once "./public/views/page-start.php"; ?>
<?php require_once "./public/views/components/header.php"; ?>
<?php require_once "./public/views/components/logo.php"; ?>
<div class="row row__bgblue">
    <div class="page-padding">
        <div class="topbar">
            <p class="topbar__heading">Witaj w grze <?php echo $room->getName() ?></p>
        </div>
    </div>
</div>
<div class="row row__bgorange">
    <div class="page-padding">
        <div class="topbar">
            <p class="topbar__heading">Status gry: <span class="game-status">oczekuje na rozpoczęcie</span></p>
        </div>
    </div>
</div>
<div class="row row__bgpurple">
    <div class="page-padding">
        <div class="topbar">
            <p class="topbar__heading">Kod dostępu do gry: <?php echo $room->getRoomCode(); ?></p>
        </div>
    </div>
</div>
<div class="row">
    <div class="page-padding">
        <div class="game outline-blue" data-roomID="<?php echo $room->getRoomId(); ?>">
            <div class="game__players">
                <p class="game__players-heading">Lista graczy, którzy są w poczekalni:</p>
                <div class="game__players-holder outline-purple">

                </div>
            </div>
            <div class="game__start button orange">Rozpocznij grę</div>
        </div>
    </div>
</div>
<?php require_once "./public/views/components/footer.php"; ?>
<?php require_once "./public/views/page-end.php"; ?>