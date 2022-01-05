<div class="quizblock-container">
    <?php foreach($quizes as $quiz){ ?>
    <div class="quizblock-outer">
        <div class="quizblock-inner">
            <a href="/quiz/<?php echo $quiz->getId();?>" >
                <div class="quizblock">
                    <div class="quizblock-top">
                        <div class="quizblock__image">
                            <!--<img src="" alt="picture"/>-->
                        </div>
                        <div class="quizblock__title"><?php echo $quiz->getName(); ?></div>
                    </div>
                    <div class="quizblock__description"><?php echo $quiz->getDescription(); ?></div>
                    <div class="quizblock__cats">
                        Kategoria: <span class="quizblock__cat"><?php echo $quiz->getCategory(); ?></span>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <?php } ?>
</div>