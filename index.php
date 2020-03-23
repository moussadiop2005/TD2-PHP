<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <nav>
        <ul>
            <li><form action="" method="get"><button name="Exercice_1">Exercice 1</button></form></li>
            <li><form action="" method="get"><button name="Exercice_2">Exercice 2</button></form></li>
            <li><form action="" method="get"><button name="Exercice_3">Exercice 3</button></form></li>
            <li><form action="" method="get"><button name="Exercice_4">Exercice 4</button></form></li>
            <li><form action="" method="get"><button name="Exercice_5">Exercice 5</button></form></li>
            <li><form action="" method="get"><button name="App_1">App 1</button></form></li>
            <li><form action="" method="get"><button name="App_2">App 2</button></form></li>
            <li><form action="" method="get"><button name="mini_projet_admin">mini projet admin</button></form></li>
        </ul>
    </nav>
    <br/><br/><br/><br/>
    <?php
    if (isset($_GET['Exercice_1'])) {
        include 'Exercice_1.php';
    }elseif (isset($_GET['Exercice_2'])) {
        include 'Exercice_2.php';
    }elseif (isset($_GET['Exercice_3'])) {
        include 'Exercice_3.php';
    }elseif (isset($_GET['Exercice_4'])) {
        include 'Exercice_4.php';
    }elseif (isset($_GET['Exercice_5'])) {
        include 'Exercice_5.php';
    }elseif (isset($_GET['App_1'])) {
        include 'App_1.php';
    }elseif (isset($_GET['App_2'])) {
        include 'App_2.php';
    }elseif (isset($_GET['mini_projet_admin'])) {
        include 'mini_projet_log_admin.php';
    }
    ?>
</body>
</html>