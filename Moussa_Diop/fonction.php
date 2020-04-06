<?php
function verificateur_nom_prenom (string $text){
    if (ctype_upper($text[0])&&strlen($text)>=2) {
        return true;
    }else {
        return false;
    }

}
function verificateur_adresse (string $text){
    if (strlen($text)>=5) {
        return true;
    }else {
        return false;
    }
}
function verificateur_numero (string $text1,string $text2){
    if ($text1==$text2&&strlen($text1)==9&&preg_match('#^[7][7650]([0-9]|[./ -]){7}#',$text1)) {
        return true;
    }else {
        return false;
    }

}
function verificateur_langue (array $tab){
    $n=0;
    for ($i=0; $i < count($tab); $i++) { 
        if (isset($tab[$i])) {
            $n++;
        }
        if ($n>=2) {
            return true;
        }
    }
    return  false;
}
function verificateur_commentaire (string $text){
    preg_match_all('#[a-z]([^.!?]|[.][0-9])*[.?!]#i',$text,$phrases);
    $n=count($phrases[0]);
    if ($n>=3) {
        return true;
    }else {
        return false;
    }
}

?>
