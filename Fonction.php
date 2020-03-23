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
function str_compteur(string $chaine){
    $x=0;
    while (isset($chaine[$x])) {
        $x=$x+1;
    }
    return $x;
}
function table_compteur(array $chaine){
    $x=0;
    while (isset($chaine[$x])) {
        $x=$x+1;
    }
    return $x;
}
/*recuperateur*/
function recuperateur_mot(string $texte){
    $n=str_compteur($texte);
    for ($i=0; $i <$n ; $i++) { 
        $Lettres[]=$texte[$i];
    }
    
    $p=0;
    $mot='';
    for ($i=0; $i<=$n ; $i++) { 
        if (@$Lettres[$i]==' ') {
            $p=$p+1;
            $mot='';
        }else{
            $mot=@"$mot".@"$Lettres[$i]";
            $mots[$p]=$mot;
        }
    }
    return $mots;
}
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
function verificateur_mot_avec_m(string $mot){
    $n=0;
    for ($i=0; $i <=str_compteur($mot) ; $i++) { 
        $Lettres[]=@$mot[$i];
        if ($Lettres[$i]=='M'||$Lettres[$i]=='m') {
            $n=$n+1;
        }
        if ($n!=0) {
            $bool=true;
        }else{
            $bool=false;
        }  
    }
    return $bool;
}
function compteur_mot_avec_m(array $chaine){
    $n=0;
    for ($i=0; $i < table_compteur($chaine); $i++) {
        if (verificateur_mot_avec_m($chaine[$i])) {
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
    $n=0;
    $n=str_compteur($texte);
    for ($i=0; $i <$n ; $i++) { 
        $Lettres[]=$texte[$i];
    }
    for ($i=0; $i <$n ; $i++) { 
        if (preg_match("#\.$#",$texte)) {
            $bool=true;
        }else {
            $bool=false;
        }
    }
    return $bool;
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