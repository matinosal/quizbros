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
            <p class="topbar__heading">Twój profil</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="page-padding">
        <div class="user-container">
            <div class="user-heading">
                <div class="user-heading__image-container">
                    <div class="user-heading__image-holder">
                        <div class="user-heading__image"></div>
                    </div>
                </div>
                <div class="user-heading__username">
                    <span class="user-heading__username-details">User123 #123123</span>
                </div>
            </div>
            <div class="user-description outline-blue">
                <div class="user-description__outer">
                    <span class="user-description__heading">Opis:</span>
                    <textarea cols="30" rows="10" class="user-description__text"><?php echo $user->getDescription(); ?></textarea>
                </div>
            </div>
            <div class="user-quizes outline-purple">
                <span class="user-quizes__heading">Najpopularniejszy quiz</span>
                <?php require_once  "./public/views/components/quiz.php"; ?>
            </div>
        </div>
    </div>
</div>

<?php require_once "./public/views/page-end.php"; ?>