<?php require_once "./public/views/page-start.php"; ?>
<?php require_once "./public/views/components/header.php"; ?>
<div class="row">
    <div class="page-padding">
        <div class="logo-holder">
            <!--<img src="" alt="" class="logoholder__img">-->
        </div>
    </div>
</div>
<div class="row row__bgblue">
    <div class="page-padding">
        <div class="topbar">
            <p class="topbar__heading">Twoje quizy</p>
        </div>
        
    </div>
</div>
<div class="row">
    <div class="page-padding">
        <div class="user-quizes-container">
            <div class="user-quizes outline-purple">
                <?php require_once  "./public/views/components/quiz-edit.php"; ?>
            </div>
        </div>
    </div>
</div>
<?php require_once "./public/views/page-end.php"; ?>