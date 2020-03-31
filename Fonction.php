<?php
/*exercice 1*/
function ver(int $i){
    $n=0;
    for ( $j=1; $j<=$i/2; $j++){
        $t=$i%$j;
        if ($t==0){
            $n++;
        }
    }
    if ($n==1){
        $bool=true;
    }else{
        $bool=false;
    }
    return $bool;
}
function list_nb_premierver(int $Nb){
    for ($i=1; $i<=$Nb; $i++){
        if (ver($i)){
            $Tab[]=$i;
        }
    }
    return $Tab;
}
function Classement_Moyenne(array $Tab){
    $tableau=[
        'inferieur'=>[],
        'superieur'=>[]
    ];
    $Moyenne=array_sum($Tab)/count($Tab);
    for ($i=0;$i<count($Tab);$i++){
        if ($Tab[$i]<$Moyenne){
            $tableau['inferieur'][]=$Tab[$i];
        }else{
            $tableau['superieur'][]=$Tab[$i];
        }
    }
    return $tableau;
}
/*exercice 3 et exercice 4*/
/*compteur*/
/*compte le nombre de caractere d'une chaine*/
function str_compteur(string $chaine){
    $x=0;
    while (isset($chaine[$x])) {
        $x=$x+1;
    }
    return $x;
}
/*compte le nombre d'element d'un tableau*/
function table_compteur(array $chaine){
    $x=0;
    while (isset($chaine[$x])) {
        $x=$x+1;
    }
    return $x;
}
/*recuperateur*/
function recuperateur_phrase(string $texte){
    $n=str_compteur($texte);
    for ($i=0; $i <$n ; $i++) { 
        $Lettres[]=$texte[$i];
    }
    
    $p=0;
    $phrase='';
    for ($i=0; $i<$n ; $i++) { 
        if (@$Lettres[$i]=='.') {
            $p=$p+1;
            $phrase='';
        }else{
            $phrase=@$phrase.@$Lettres[$i];
            $phrases[$p]=$phrase.'.';
        }
    }
    return $phrases;
}
/*verificateur et correcteur*/
/*verifie si une chaine est constituée de caractere alphabétique*/
function verificateur_caractere (string $chaine){
for ($i=0; $i < str_compteur($chaine); $i++) { 
    if (($chaine[$i]>='a' && $chaine[$i]<='z')||($chaine[$i]>='A' && $chaine[$i]<='Z')) {
        return true;
    }
}
return false;
}
/*verifie si une chaine est un entier*/
function verificateur_nbre ($nombre){
    $chiffre=['0','1','2','3','4','5','6','7','8','9'];
    $n=0;
    for ($i=0; $i < str_compteur($nombre); $i++) { 
        for ($j=0; $j <= 9; $j++) { 
            if ($chiffre[$j]==$nombre[$i]) {
                $n++;
            break;
            }
        }
    }
    if ($n==str_compteur($nombre)) {
        return true;
    }else{
        return false;
    }
    
}
/*Verifie si un caractere est miniscule */
function is_lower($car){
    return ($car>='a'&&$car<='z');
}
/*Verifie si un caractere est majiscule */
function is_upper($car){
    return ($car>='A'&&$car<='Z');
}
function is_Valide($chaine){  //  founction pour la valider u mots s'il contien que des lattre alphabetic
    for ($i=0; $i < taille_chaine($chaine); $i++) { 
        if ( (!is_lower($chaine[$i])) && (!is_upper($chaine[$i])) ) {
            return false;
        }
    }
    return true;
}

function verificateur_long_phrase(string $texte){
    $n=0;
    $chaine=recuperateur_phrase($texte);
    for ($i=0; $i < table_compteur($chaine); $i++) { 
        if (str_compteur($chaine[$i])>200) {
            $n=$n+1;
        }
    }
    if ($n==0) {
        $bool=true;
    }else{
        $bool=false;
    }
    return $bool;
}
function verificateur_long_mot(array $mots){
    $n=0;
    for ($i=0; $i < table_compteur($mots); $i++) { 
        if (str_compteur($mots[$i])>20) {
            return false;
        }
    }
    return true;
}
/*verifie si un mot la lettre M*/
function verificateur_mot_avec_m($mot, $m, $M){
        for ($i=0; $i <=str_compteur($mot) ; $i++) {
            if (isset($mot[$i])) {
                if ($mot[$i]==$M||$mot[$i]==$m) {
                    return true;
                } 
            } 
        }
    return false;
}
/*compte le nombre de mot avec la lettre M*/
function compteur_mot_avec_m(array $chaine, $m, $M){
    $n=0;
    for ($i=0; $i < table_compteur($chaine); $i++) {
        if (verificateur_mot_avec_m($chaine[$i], $m, $M)) {
            $n=$n+1;
        }
    }
    return $n;
}
function correcteur_phrase(string $texte){
    $n=str_compteur($texte);
    for ($i=0; $i <$n ; $i++) { 
        $Lettres[]=$texte[$i];
    }
    $phrase='';
    for ($i=0; $i<$n ; $i++) { 
        if (@$Lettres[$i]==' '&&@$Lettres[$i+1]==' ') {
            $Lettres[$i]='';
            
        }elseif (@$Lettres[$i]==' '&&@$Lettres[$i+1]=='\'') {
            $Lettres[$i]='';
        }elseif (@$Lettres[$i]=='\''&&@$Lettres[$i+1]==' '){
            $p=$i;
            while ($Lettres[$p+1]==' ') {
                $Lettres[$p+1]='';
                $p=$p+1;
            }
            $phrase=@$phrase.'\'';
        }elseif (@$Lettres[$i]==' '&&@$Lettres[$i+1]==',') {
            $Lettres[$i]='';
        }else{
            $phrase=@$phrase.@$Lettres[$i];
        }
    }
    return $phrase;
}
function verificateur_maj(string $texte){
    $n=0;
    $text=correcteur_phrase($texte);
    $n=str_compteur($text);
    for ($i=0; $i <$n ; $i++) { 
        $Lettres[]=$text[$i];
    }
    
    $p=0;
    $phrase='';
    for ($i=0; $i<$n ; $i++) { 
        if (@$Lettres[$i]=='.') {
            $p=$p+1;
            $phrase='';
            $Lettres[$i+1]='';
        }else{
            $phrase=@"$phrase".@"$Lettres[$i]";
            $phrases[$p]="$phrase".'.';
        }
        
    }
    for ($i=0; $i < table_compteur($phrases) ; $i++) { 
        if (preg_match("#^[A-Z]#", $phrases[$i])) {
            $n=0;
        }else{
            $n=$n+1;
        }
    }
    if ($n==0) {
        $bool=true;
    }else {
        $bool=false;
    }
    return $bool;
}
function verificateur_point(string $texte){
    $nb=str_compteur($texte);
    if ($texte[$nb-1]=='.') {
        return true;
    }else {
        return false;
    }
}
/*exercice 5*/
function recuperateur_num(string $texte){
    $n=str_compteur($texte);
    for ($i=0; $i <$n ; $i++) { 
        $Lettres[]=$texte[$i];
    }
    
    $p=0;
    $num='';
    for ($i=0; $i<=$n ; $i++) { 
        if (@$Lettres[$i]==' '||@$Lettres[$i]==';'||@$Lettres[$i]=='-') {
            $p=$p+1;
            $num='';
        }else{
            $num=@"$num".@"$Lettres[$i]";
            $numeros[$p]=$num;
        }
    }
    return $numeros;
}
function verificateur_long_num(string $numero){
    $n=0;
    if (str_compteur($numero)!=9) {
        $n=$n+1;
    }
    if ($n==0) {
        $bool=true;
    }else{
        $bool=false;
    }
    return $bool;
}
function verificateur_num(string $numero){
    if (preg_match("#[0-9]#",$numero)) {
        $n=0;
    }else{
        $n=1;
    } 
    if ($n==0) {
        $bool=true;
    }else {
        $bool=false;
    }
    return $bool;
}
function classeur_num(string $texte){
    $tab=[
        'orange'=>[],
        'free'=>[],
        'expresso'=>[],
        'invalide'=>[],

    ];
    $numero=recuperateur_num($texte);
    for ($i=0; $i < table_compteur($numero); $i++) { 
        if (!verificateur_num($numero[$i])||!verificateur_long_num($numero[$i])) {
            $tab['invalide'][]=$numero[$i];
        }elseif (!preg_match('#^7#' , $numero[$i])) {
            $tab['invalide'][]=$numero[$i];
        }else {
            switch ($numero[$i][1]) {
                case '7':
                    $tab['orange'][]=$numero[$i];
                    break;
                case '8':
                    $tab['orange'][]=$numero[$i];
                    break;
                case '6':
                    $tab['free'][]=$numero[$i];
                    break;
                case '0':
                    $tab['expresso'][]=$numero[$i];
                    break;
                default:
                    $tab['invalide'][]=$numero[$i];
                    break;
            }
        }
    }
    return $tab;
}
function verificateur_num_invalide (string $num){
    $tab =classeur_num($num);
    if (isset($num)) {
        if (@$tab['invalide'][0]==$num) {
            $bool=true;
        }else {
            $bool=false;
        }
        return $bool;
    }
}
function verificateur_invalide (array $num){
    $tab =classeur_num($num);
    for ($i=0; $i < table_compteur($tab['invalide']); $i++) { 
        if (isset($tab['invalide'][$i])) {
            return true;
        }
    }
    return false;
}

/*mini projet*/
function verificateur_login(string $user, string $password):bool {
    $Utilisateur=[
        'moussa diop'=>'0000',
        'omar dia'=>'1111'
    ];
    $_SESSION['connecte']=0;
    foreach ($Utilisateur as $key => $value) {
        if ($user==$key && $password==$value) {
            $_SESSION['connecte']=1;
        }
    }
    if ($_SESSION['connecte']==1) {
        $bool=true;
    }else{
        $bool=false;
    }
    return $bool;
}
?>
