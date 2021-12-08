<div class="header-outer">
    <div class="header">
        <?php if($user_logged){ ?>
            <div class="header-profile"></div>
            <div class="header-icons">
                <a href="/profile" class="header__link">
                    <div class="header__icon">
                        <i class="fas fa-user"></i>
                        <span class="header__desc"></span>
                    </div>
                </a>
                <a href="/quizes" class="header__link">
                    <div class="header__icon">
                        <i class="fas fa-question-circle"></i>
                        <span class="header__desc"></span>
                    </div>
                </a>
                <a href="/makeroom" class="header__link">
                    <div class="header__icon">
                        <i class="fas fa-user-friends"></i>
                        <span class="header__desc"></span>
                    </div>
                </a>
            </div>
        <?php }
            else{ ?>
        <div class="header-noprofile"></div>
        <div class="header-icons">
            <a href="/login" class="header__link">
                <div class="header__icon">
                    <i class="fas fa-users"></i>
                    <span class="header__desc"></span>
                </div>
            </a>
            <a href="/register" class="header__link">
                <div class="header__icon">
                    <i class="fas fa-user-plus"></i>
                    <span class="header__desc"></span>
                </div>
            </a>
        </div>
        <?php } ?>
    </div>
</div>