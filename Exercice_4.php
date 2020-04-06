<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercice 4</title>
    <link rel="stylesheet" href="Exercice_4.css">
</head>
<body>
    <?php require 'Fonction.php'?>
    <form method="post" action="">
        <fieldset>
            <legend>liste de phrases</legend>
            <div>Veuillez saisir des phrases contenants moin de 200 caractères en les commençant par une majuscule et en les terminant par des points.</div>
            <label for="texte" >texte</label><br/>
            <textarea name="texte" id="texte" cols="70" rows="10"></textarea><br/>
            <button type="submit" name="submit">Corriger</button>
        </fieldset>
        
        <?php
        $correction='';
        if (isset($_POST['submit'])) {
            $texte=$_POST['texte'];
            if (verificateur_texte($texte)) {
                $phrases=recuperateur_phrase($texte);
                $n=0;
                for ($i=0; $i <count($phrases) ; $i++) { 
                    if (verificateur_longueur_phrase($phrases[$i])) {
                        $X=correcteur_espace($phrases[$i]);
                        $correction=$correction.' '.$X;
                        $n++;
                    }
                }
                if ($n!=count($phrases)) {
                    echo 'Il y a une phrase que depasse 200 carateres.';
                }
                
            }else {
                echo "Veuillez saisir des phrases en les terminant par des points.";
            }
            
        }
        ?>
        <fieldset>
            <legend>Correction</legend>
            <textarea name="correction" id="correction" cols="70" rows="10" readonly><?php echo $correction ?></textarea>
        </fieldset>
    </form>
    
    
</body>
</html>

