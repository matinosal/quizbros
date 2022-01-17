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

<?php require_once "./public/views/page-end.php"; ?>