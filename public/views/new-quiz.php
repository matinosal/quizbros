<?php require_once "./public/views/page-start.php"; ?>
<?php require_once "./public/views/components/header.php"; ?>
<?php require_once "./public/views/components/logo.php"; ?>
<div class="row row__bgblue">
    <div class="page-padding">
        <div class="topbar">
            <p class="topbar__heading">Nowy quiz</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="page-padding">
        <div class="quiz-creator-outer outline-blue">
            <div class="quiz-creator">
                <div class="quiz-creator__heading">
                    <p class="quiz-creator__heading-text">
                        Witaj w kreatorze QuizBros! Podaj tytuł swojego quizu, a następnie ułóż swoje pierwsze pytanie.</br>
                        Podczas edytowania odpowiedzi zaznacz <i class="fas fa-check"></i>, aby oznaczyć ją jako poprawną. </p>
                </div>

                <div class="quiz-creator__title">
                    <span class="quiz-creator__title-text">Tytuł quizu:</span>
                    <input type="text" class="quiz-creator__title-input outline-purple">
                </div>

                <div class="quiz-creator__question outline-orange">
                    <input type="text" placeholder="Pytanie 1" class="quiz-creator__question-text outline-orange">
                    <div class="quiz-creator__question-answers">
                        <?php for ($i = 0; $i < 4; $i++) { ?>
                            <div class="quiz-creator__answer">
                                <i class="fas fa-check"></i>
                                <input type="text" placeholder="Odpowiedź <?php echo $i + 1; ?>" class="quiz-creator__answer-text outline-orange">
                            </div>
                        <?php } ?>
                    </div>
                    <div class="quiz-creator__navigation">
                        <div class="quiz-creator__previous button blue">Poprzednie pytanie</div>
                        <div class="quiz-creator__next button blue">Następne pytanie</div>
                        <div class="quiz-creator__next-question button orange">Dodaj pytanie</div>
                    </div>

                </div>
                <div class="quiz-creator__save button blue">Zapisz</div>
                <div class="quiz-creator__navigation hidden">
                    <a href="/quizes">
                        <div class="button blue">Przeglądaj quizy</div>
                    </a>
                    <a href="/newquiz">
                        <div class="button blue">Dodaj nowy</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "./public/views/page-end.php"; ?>