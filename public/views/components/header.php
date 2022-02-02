<div class="header__mobile">
    <div class="header__icon-container mobile-icon">
        <i class="fas fa-bars"></i>
    </div>
</div>
<div class="header-outer">
    <div class="header">
        <?php if ($user_logged) { ?>
            <div class="header__profile">
                <?php if (isset($user) && $user->getImage() != "") { ?>
                    <div class="header__user-profile" style="background-image:url('/public/uploads/<?php echo $user->getImage(); ?>')"></div>
                <?php } ?>
            </div>
            <div class="header-icons">
                <a href="/" class="header__link">
                    <div class="header__icon">
                        <div class="header__icon-container">
                            <i class="fas fa-home"></i>
                        </div>
                        <span class="header__desc">Strona główna</span>
                    </div>
                </a>
                <a href="/profile" class="header__link">
                    <div class="header__icon">
                        <div class="header__icon-container">
                            <i class="fas fa-user"></i>
                        </div>
                        <span class="header__desc">Twój profil</span>
                    </div>
                </a>
                <a href="/quizes" class="header__link">
                    <div class="header__icon">
                        <div class="header__icon-container">
                            <i class="fas fa-question-circle"></i>
                        </div>
                        <span class="header__desc">Twoje quizy</span>
                    </div>
                </a>
                <a href="/newquiz" class="header__link">
                    <div class="header__icon">
                        <div class="header__icon-container">
                            <i class="fas fa-plus"></i>
                        </div>
                        <span class="header__desc">Dodaj nowy</span>
                    </div>
                </a>
                <a href="/makeroom" class="header__link">
                    <div class="header__icon">
                        <div class="header__icon-container">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <span class="header__desc">Stwórz pokój</span>
                    </div>
                </a>
                <a href="/logout" class="header__link">
                    <div class="header__icon">
                        <div class="header__icon-container">
                            <i class="fas fa-sign-out-alt"></i>
                        </div>
                        <span class="header__desc">Wyloguj</span>
                    </div>
                </a>
            </div>
        <?php } else { ?>
            <div class="header-noprofile"></div>
            <div class="header-icons">
                <a href="/" class="header__link">
                    <div class="header__icon">
                        <div class="header__icon-container">
                            <i class="fas fa-home"></i>
                        </div>
                        <span class="header__desc">Strona główna</span>
                    </div>
                </a>
                <a href="/login" class="header__link">
                    <div class="header__icon">
                        <div class="header__icon-container">
                            <i class="fas fa-users"></i>
                        </div>
                        <span class="header__desc">Logowanie</span>
                    </div>
                </a>
                <a href="/register" class="header__link">
                    <div class="header__icon">
                        <div class="header__icon-container">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <span class="header__desc">Rejestracja</span>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
</div>