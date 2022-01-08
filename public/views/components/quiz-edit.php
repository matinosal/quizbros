<?php
foreach ($quizes as $quiz) {
?>
    <div class="quiz outline-orange" data-id="<?php echo $quiz->getId(); ?>">
        <?php var_dump($quizesIds); ?>
        <div class="quiz-short">
            <span class="quiz__title"><?php echo $quiz->getName(); ?></span>
            <span class="quiz__counter">Zagrany: xxx razy</span>
            <span class="quiz__category">Kategoria: <span class="highlighted-text"><?php echo $quiz->getCategory(); ?></span></span>
        </div>
        <div class="quiz-details"></div>
    </div>
<?php } ?>