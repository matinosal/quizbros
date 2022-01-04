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
                <div class="main-quiz">
                    <div class="main-quiz__question">
                        <p class="question__content">Nazwa?</p>
                    </div>
                    <div class="main-quiz__answers">
                    <div class="answer-outer">
                            <div class="answer-inner">
                                <div class="answer outline-purple">
                                    <div class="answer__details">
                                        <p class="answer__content">Odpowiedz 1</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="answer-outer">
                            <div class="answer-inner">
                                <div class="answer outline-purple">
                                    <div class="answer__details">
                                        <p class="answer__content">Odpowiedz 2</p>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                        <div class="answer-outer">
                            <div class="answer-inner">
                                <div class="answer outline-purple">
                                    <div class="answer__details">
                                        <p class="answer__content">Odpowiedz 2</p>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                        <div class="answer-outer">
                            <div class="answer-inner">
                                <div class="answer outline-purple">
                                    <div class="answer__details">
                                        <p class="answer__content">Odpowiedz 2</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<?php require_once "./public/views/page-end.php"; ?>