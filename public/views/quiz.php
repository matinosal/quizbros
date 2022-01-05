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
            <p class="topbar__heading"><?php echo $quiz->getName(); ?></p>
        </div>
    </div>
</div>
<div class="row">
    <div class="page-padding">
        <div class="quiz-outer">
            <div class="quiz outline-orange" >
                <div class="main-quiz" data-id="<?php echo $quiz->getId(); ?>" data-order="0">
                    <div class="main-quiz__question">
                        <p class="question__content"><?php echo $question->getContent().'?'; ?></p>
                    </div>
                    <div class="main-quiz__answers">
                        <?php foreach($question->getAnswers() as $answer){ ?>
                        <div class="answer-outer">
                            <div class="answer-inner">
                                <div class="answer outline-purple">
                                    <div class="answer__details">
                                        <p class="answer__content"><?php echo $answer->getContent();?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="main-quiz__navigation">
                        <div class="quiz-navigation">
                            <span class="previous-question">&laquo;Poprzednie pytanie</span>
                            <span class="next-question">Następne pytanie &raquo;</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="page-padding">
        <div class="main-quiz__description">
            <p class="main-quiz__description-heading">Opis:</p>
            <p class="main-quiz__description-heading">
                <?php echo $quiz->getDescription(); ?>
            </p>
        </div>
    </div>
</div>
<?php require_once "./public/views/page-end.php"; ?>