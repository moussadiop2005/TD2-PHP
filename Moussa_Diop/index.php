<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php require 'fonction.php'?>
    <form method="post">
        <fieldset>
            <div>
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" placeholder="Prénom" required>
            </div><br>
            <div>
                <label for="nom">Nom</label>
                <input type="text" name="nom" placeholder="Nom" required>
            </div><br>
            <div>
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" placeholder="Adresse" required>
            </div><br>
            <div>
                <label for="numero">Numéro</label>
                <input type="text" name="numero" placeholder="Numéro" required>
            </div><br>
            <div>
                <label for="confirmation">Confirmation numéro</label>
                <input type="text" name="confirmation" placeholder="Confirmation numéro" required>
            </div><br>
            <div>
                <label for="genre">genre</label>
                <select name="genre">
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                </select>
            </div><br>
            <div>
                <label>Satsfait :</label>
                <label for="oui" class="satisfait">Oui</label>
                <input type="radio" name="satisfait" id="oui" value="OUI" class="radio" checked>
                <label for="non" class="satisfait">Non</label>
                <input type="radio" name="satisfait" id="non" value="NON" class="radio">
            </div><br>
            <div>
                <label>Langue :</label>
                <label for="francais" class="langue">Français</label>
                <input type="checkbox" name="lang<?=1?>" id="francais" value="F" class="checkbox">
                <label for="anglais" class="langue">Anglais</label>
                <input type="checkbox" name="lang<?=2?>" id="anglais" value="A" class="checkbox">
                <label for="espagnol" class="langue">Espagnol</label>
                <input type="checkbox" name="lang<?=3?>" id="espagnol" value="E" class="checkbox">
                <label for="portugais" class="langue">Portugais</label>
                <input type="checkbox" name="lang<?=4?>" id="portugais" value="P" class="checkbox">
            </div><br>
            <div>
                <label for="commentaire">Commentaire</label>
                <textarea name="commentaire" id="commentaire" cols="40" rows="10"></textarea>
            </div><br>
            <button type="submit" name="submit" class="submit">Valider</button>
            <button type="reset" name="reset" class="reset">Réinitialiser</button>
        </fieldset>
    </form>
    <th></th>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    
    for ($i=1; $i < 4; $i++) { 
        if (isset($_POST['lang'.$i])) {
            $lang[]=$_POST['lang'.$i];
        }
    }
    $_SESSION['form']['Prénom'][]=$_POST['prenom'];
    $_SESSION['form']['Nom'][]=$_POST['nom'];
    $_SESSION['form']['Adresse'][]=$_POST['adresse'];
    $_SESSION['form']['Numéro'][]=$_POST['numero'];
    $_SESSION['form']['Genre'][]=$_POST['genre'];
    $_SESSION['form']['Satisfait'][]=$_POST['satisfait'];
    $_SESSION['form']['Langue'][]=$lang;
    echo '<table>';
    echo '<tr>';
    foreach ($_SESSION['form'] as $key1 => $value1) {
        echo '<th>'.$key1.'</th>';
    }
    echo '</tr>';
    for ($i=0; $i < count($_SESSION['form']['Prénom']); $i++) { 
        echo '<tr>';
        foreach ($_SESSION['form'] as $value) {
            if (is_array($value[$i])) {
                echo '<td>';
                for ($j=0; $j < count($value[$i]); $j++) { 
                    if (isset($value[$i][$j])) {
                        echo $value[$i][$j].', ';
                    }
                }
                echo '</td>';
            }else {
                echo '<td>'.$value[$i].'</td>';
            }
        }
        echo '</tr>';
    }
    echo '</table>';
        
    
    
    
}

?>
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                </select>
            </div><br>
            <div>
                <label>Satsfait :</label>
                <label for="oui" class="satisfait">Oui</label>
                <input type="radio" name="satisfait" id="oui" value="OUI" class="radio" checked>
                <label for="non" class="satisfait">Non</label>
                <input type="radio" name="satisfait" id="non" value="NON" class="radio">
            </div><br>
            <div>
                <label>Langue :</label>
                <label for="francais" class="langue">Français</label>
                <input type="checkbox" name="lang<?=1?>" id="francais" value="F" class="checkbox">
                <label for="anglais" class="langue">Anglais</label>
                <input type="checkbox" name="lang<?=2?>" id="anglais" value="A" class="checkbox">
                <label for="espagnol" class="langue">Espagnol</label>
                <input type="checkbox" name="lang<?=3?>" id="espagnol" value="E" class="checkbox">
                <label for="portugais" class="langue">Portugais</label>
                <input type="checkbox" name="lang<?=4?>" id="portugais" value="P" class="checkbox">
            </div><br>
            <div>
                <label for="commentaire">Commentaire</label>
                <textarea name="commentaire" id="commentaire" cols="40" rows="10"></textarea>
            </div><br>
            <button type="submit" name="submit" class="submit">Valider</button>
            <button type="reset" name="reset" class="reset">Réinitialiser</button>
        </fieldset>
    </form>
    <th></th>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    
    for ($i=1; $i < 4; $i++) { 
        if (isset($_POST['lang'.$i])) {
            $lang[]=$_POST['lang'.$i];
        }
    }
    if (verificateur_nom_prenom($_POST['prenom'])&&verificateur_nom_prenom($_POST['nom'])&&verificateur_adresse($_POST['adresse'])&&verificateur_numero($_POST['numero'],$_POST['confirmation'])&&verificateur_langue($lang)&&verificateur_commentaire($_POST['commentaire'])) {
        $_SESSION['form']['Prénom'][]=$_POST['prenom'];
        $_SESSION['form']['Nom'][]=$_POST['nom'];
        $_SESSION['form']['Adresse'][]=$_POST['adresse'];
        $_SESSION['form']['Numéro'][]=$_POST['numero'];
        $_SESSION['form']['Genre'][]=$_POST['genre'];
        $_SESSION['form']['Satisfait'][]=$_POST['satisfait'];
        $_SESSION['form']['Langue'][]=$lang;
        echo '<table>';
        echo '<tr>';
        foreach ($_SESSION['form'] as $key1 => $value1) {
            echo '<th>'.$key1.'</th>';
        }
        echo '</tr>';
        for ($i=0; $i < count($_SESSION['form']['Prénom']); $i++) { 
            echo '<tr>';
            foreach ($_SESSION['form'] as $value) {
                if (is_array($value[$i])) {
                    echo '<td>';
                    for ($j=0; $j < count($value[$i]); $j++) { 
                        if (isset($value[$i][$j])) {
                            echo $value[$i][$j].', ';
                        }
                    }
                    echo '</td>';
                }else {
                    echo '<td>'.$value[$i].'</td>';
                }
            }
            echo '</tr>';
        }
        echo '</table>';
        
    }else{

    }
    
    
}

?>
