<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercice 2</title>
    <link rel="stylesheet" href="Exercice_2.css">
</head>
<body>
    <?php 
    $tab=[
        'français'=>['Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Decembre'],
        'anglais'=>['January','February','March','April','May','June','Juily','August','September','October','November','December']
    ]
    ?>
    <form method="post" action="">
        <fieldset>
            <legend>Langue</legend>
            <div>Choisir une langue</div>
            <select name="lang" id="lang">
                <option value="français">français</option>
                <option value="anglais">anglais</option>
            </select><br/>
            <input type="submit"  name="submit">
        </fieldset>
    </form>
    <table>
    <?php
    
    if (isset($_POST['submit'])) {
        $lang=$_POST['lang'];
        echo $lang;
        for ($i=0; $i <12 ; $i+=3) {
            echo "<tr>";
            for ($j=0; $j <=2; $j++) { 
                echo '<td class="numero">';
                echo $j+$i+1;
                echo '</td>';
                echo '<td class="mois">';
                echo $tab[$lang][$j+$i];
                echo '</td>';
            }
            echo "</tr>";
        }
    }
    ?>
    </table>
</body>
</html>