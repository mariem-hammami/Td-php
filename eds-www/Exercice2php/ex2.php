<?php
$phrase = trim($_POST["phrase"]);
if (!empty($phrase)) {
    $nbCaracteres = strlen($phrase);
    $nbMots = str_word_count($phrase);
    $premiersCaracteres = substr($phrase, 0,10);
    $t=explode("",$phrase);
    echo count($t); //ou bien sizeof
    $nbcar_sans_espaces=0;
    for($i=0;$i<count($t);$i++)
    $nbcar_sans_espaces+=strlen($t[$i]);
echo("<p>Nombre total de caractères sans compter les espaces : <strong>")
echo "<p>Nombre total de caractères : <strong>$nbCaracteres</strong></p>";
echo "<p>Nombre total de mots : <strong>$nbMots</strong></p>";
echo "les 10 premiers caractères : <strong>$premiersCaracteres</strong></p>";

}
else{
    echo "<p>Veuillez entrer une phrase,</p>";
}