<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercice 1</title>
    <link rel="stylesheet" href="Exercice_1.css">
</head>
<body>
    <?php require 'Fonction.php'?>
    <form method="post" action="index.php?Exercice_1=&page=1">
        <fieldset>
            <legend>Nombre premier</legend>
            <div>Saisir un nombre superieur à 10000</div>
            <input type="text" name="Nb" placeholder="nombre &gt; à 10000"><br/>
            <input type="submit" name="submit">
        </fieldset>
    </form>
    <?php
    set_time_limit(0);
    if (isset($_POST['submit'])) {
        $_SESSION['Nb']=$_POST['Nb'];
        if (is_numeric($_SESSION['Nb'])&&$_SESSION['Nb']>10000){
            $Tab=list_nb_premierver($_SESSION['Nb']);
            $_SESSION['Moy']=Classement_Moyenne($Tab);
        }else {
            echo 'Vous n\'avez pas saisi un nombre valide.<br/>';
            echo 'Veuillez saisir un nombre superieur à 10000.<br/>';
        }
    }
    if (isset($_GET['page'])) {
        echo 'Tableau des nombres premiers inférieur à la moyènne';
        pagination($_SESSION['Moy']['inferieur']);
        echo 'Tableau des nombres premiers supérieur à la moyènne';
        pagination($_SESSION['Moy']['superieur']);
    }
    function pagination (array $tab){
        $_SESSION['tab']=$tab;
        $_SESSION['nb']=count($tab);
        $_SESSION['nb_page']=ceil($_SESSION['nb']/100);
        if (isset($_SESSION['tab'])) {
            $page=$_GET['page'];
            if ($page<0) {
                $page=1;
            }elseif ($page>$_SESSION['nb_page']) {
                $page=$_SESSION['nb_page'];
            }
            if (empty($page)) {
                $n=0;
            }else {
                $n=($page-1)*100;
            }
            
            
            echo '';
            echo '<table>';
            for ($i=0; $i < 10; $i++) { 
                echo '<tr>';
                if (isset($_SESSION['tab'][$n])) {
                    for ($j=0; $j < 10; $j++) { 
                        if (isset($_SESSION['tab'][$n])) {
                            echo '<td class="div1">'.$_SESSION['tab'][$n].'</td>';
                            $n=$n+1;
                        }else {
                            echo '<td class="div1"></td>';
                        }
                    }
                }
                
                echo '</tr>';
            }
            echo '</table>';
        }
        echo '<div>';
        if ($page > 1) {
            echo '<form method="post" action="index.php?Exercice_1=&page='.($page-1).'" class="pagination"><button type="submit" name="precedent">Précédent</button></form>';
        }
        
        for ($i=1; $i <= $_SESSION['nb_page']; $i++) { 
            echo'<a href="index.php?Exercice_1=&page='.$i.'" class="pagination">'.$i.'</a>';
        }
        if ($page < $_SESSION['nb_page']) {
            echo '<form method="post" action="index.php?Exercice_1=&page='.($page+1).'" class="pagination"><button type="submit" name="suivant">Suivant</button></form>';
        }
        echo '</div>';
        
    }

   

    
    ?>
</body>
</html>