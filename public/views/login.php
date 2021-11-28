<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizBros - login</title>
    <?php echo $data['styles']; ?>
    <?php echo $data['scripts']; ?>
</head>
<body>
    <?php require_once "./public/views/header.php"; ?>
    <div class="one-page one-page__bgblue one-page__centered-content">
        <div class="row">
            <div class="page-padding">
                <div class="form-holder">
                    <form action="" class="security-form">
                        <p class="security-form__heading">Logowanie</p>
                        <input placeholder="Login" type="text" class="security-form__input">
                        <input placeholder="Haslo" type="password" class="security-form__input">
                        <input type="submit" value="Wchodzę!" class="security-form__submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>