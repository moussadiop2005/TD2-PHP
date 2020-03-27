<?php

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercice 3</title>
    <link rel="stylesheet" href="Exercice_3.css">
</head>
<body>
    <?php require 'Fonction.php'?>
    <form method="post" action="">
        <fieldset>
            <legend>liste de mots</legend>
            <div>Veuillez saisir le nombre de mot</div>
            <input type="text" name="nb" placeholder="Nombre" value="<?php if (isset($_POST['submit1'])){echo $_POST['nb'];}?>"><br/>
            <?php
            if (isset($_POST['submit1'])) {
                $nb=$_POST['nb'];
                if (verificateur_nbre($_POST['nb'])) {
                    echo '<legend>liste de mots</legend>';
                    echo '<div>Veuillez saisir des mots contenants moin de 20 caractères en les separants par des espaces</div>';
                    for ($i=1; $i <= $nb; $i++) { 
                        echo'<label for="mot'.$i.'">Mot n°'.$i.'<label>';
                        echo '<input type="text" name="mot'.$i.'" id="mot'.$i.'" placeholder="mot"><br/>';
                    }
                    
                    $mots=[];
                    for ($i=1; $i <= $_POST['nb']; $i++) { 
                        if (isset($_POST['mot'.$i])) {
                            $mots[]=$_POST['mot'.$i];
                        }
                        
                    }
                    if(verificateur_long_mot($mots)){
                        echo "La liste des mots saisis est :";
                        $nbr=compteur_mot_avec_m($mots, 'm', 'M');
                        for ($i=0; $i < $_POST['nb']; $i++) { 
                            if (isset($mots[$i])&&verificateur_caractere($mots[$i])) {
                                echo'<div class="div">'.$mots[$i].'</div><br/>';
                            }
                        }
                        echo "Il y a ".$nbr." mots contenant la lettre M.<br/>";
                    }else{
                        echo "Veuillez saisir des mots contenants moin de 20 caractères<br/>";
                    }
                    
                }else{
                    echo "Veuillez saisir un nombre entier positif<br/>";
                }
            }
            ?>
            <input type="submit" name="submit1">
        </fieldset>
    </form>
    
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    
}


?>