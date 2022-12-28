<!DOCTYPE html>
<html lang="en">
<?php include 'function.php'; ?>
<?php include 'names.php'; ?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Идеальный подбор пары</title>
</head>
<body>
    <header> <h2>Идеальный подбор пары</h2></header>
    <main>
        <div class="card">
        <form method="POST">
                <h3 class='title'>Введите свои данные</h3>
                
                <div class='form'>
                    <label for="surname-input" class='form-row__label'>Фамилия:</label>
                    <input type="text" class='input' name='surname' id='surname-input' autocomplete="off">
                </div>
                <div class='form'>
                    <label for="name-input" class='form-row__label'>Имя:</label>
                    <input type="text" class='input' name='name' id='name-input' autocomplete="off">
                </div>
                <div class='form'>
                    <label for="patronym-input" class='form-row__label'>Отчество:</label>
                    <input type="text" class='input' name='patronym' id='patronym-input' autocomplete="off">
                </div>
                <div class='form-row form-btn-row'>
                    <input class='btn btn-danger w-40 mx-auto' type="submit" value='Показать пару'>
                    <input class='btn btn-danger clear w-40 mx-auto' type="button" value='Очистить поля'>
                </div>
            </form>
        </div>

        <?php 
                $surname = isset($_POST['surname']) ? formatName($_POST['surname']) : '';
                $name = isset($_POST['name']) ? formatName($_POST['name']) : '';
                $patronym = isset($_POST['patronym']) ?  formatName($_POST['patronym']) : '';

                $person;      
                $personParts; 
                
                if($surname!='' && $name!='' && $patronym!=''){
                    $person = "$surname $name $patronym";
                    $personParts = getPartsFromFullname($person);
                    echo "<p class='person'>Пользователь: $person </p>";
                }
                else{
                    $person = '';
                    $personParts = null;
                    echo "<p class='person'>Пользователь: 'введите данные' </p>";
                }
            ?>

<div class="wrapper">
<div class="gender">
            <h3 class="gender_title">Гендерный состав аудитории</h3>
            <p><?php echo getGenderDescription($example_persons_array) ?></p>
        </div>
        <div class="couple">
            <h3 class="couple_title">Идеальный подбор пары</h3>
            <p class="couple_output"><?php
                echo $personParts!=null ? getPerfectPartner($personParts[0], $personParts[1], $personParts[2], $example_persons_array) : ''; 
            ?></p>
        </div>
</div>
        
    </main>
    <script src="app.js"></script>
</body>
</html>