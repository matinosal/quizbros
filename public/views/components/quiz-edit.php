<?php
foreach ($quizes as $quiz) {
    $question = $quiz->getQuestions()[0];
?>
    <div class="quiz outline-orange" data-id="<?php echo $quiz->getId(); ?>">
        <div class="quiz-short">
            <span class="quiz__title"><?php echo $quiz->getName(); ?></span>
            <span class="quiz__counter">Zagrany: xxx razy</span>
            <span class="quiz__category">Kategoria: <span class="highlighted-text"><?php echo $quiz->getCategory(); ?></span></span>
        </div>
        <div class="quiz-details outline-blue">
            <div class="quiz-details__question">
                <h3 class="quiz-details__question-number">Pytanie <span class="question-number">1</span> <i class="fas fa-times"></i></h3>
                <h3 class="quiz-details__question-content"><?php echo $question->getContent(); ?></h3>
            </div>
            <div class="quiz-details__answers">
                <div class="quiz-details__answers-outer">
                    <div class="quiz-details__answers-inner">
                        <h3 class="quiz-details__answers-heading">Odpowiedź poprawna:</h3>
                        <?php foreach ($question->getCorrectAnswer() as $answer) { ?>
                            <div class="small-answer">
                                <i class="fas fa-pen"></i><span class="answer-right"><?php echo $answer->getContent(); ?></span>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="quiz-details__answers-outer">
                    <div class="quiz-details__answers-inner">
                        <h3 class="quiz-details__answers-heading">Błędne Odpowiedzi:</h3>
                        <?php foreach ($question->getWrongAnswers() as $answer) { ?>
                            <div class="small-answer">
                                <i class="fas fa-pen"></i><span class="answer-wrong"><?php echo $answer->getContent(); ?></span>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php } ?>