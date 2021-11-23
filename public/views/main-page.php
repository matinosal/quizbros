<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizBros</title>
    <?php echo $data['styles']; ?>
    <?php echo $data['scripts']; ?>
</head>
<body>
    
    <div class="row">
        <div class="page-padding">
            <div class="topbar">
                <p class="topbar__heading">Masz kod dostępu?</p>
                <div class="topbar__form">
                    <form action="" class='quickform'>
                        <input placeholder="Wprowadź go tutaj" type="text" class="quickform__input">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="page-padding">
            <div class="quizholder">
                <p class="quizholder__heading">Przeglądaj popularne quizy</p>
                <div class="quizblock">
                    <div class="quizblock__image"></div>
                    <div class="quizblock__title">Przykładowy quiz 1</div>
                    <div class="quizblock__description">Opis tego quizu podany przez autora jeśli jegobędzie za dużo to wtedy pojawiają się wielokropek,żeby było wiadomo, że jest tego jeszcze więcej. Ale nie ograniczamy bloku do konkretnych wysokości. Będzie to w stylu masonry grid.</div>
                    <div class="quizblock__tags">
                        Kategoria: <span class="quizblock__tag">Ogólne</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>