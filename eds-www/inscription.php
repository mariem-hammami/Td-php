<?php
$errors = array();
$cin = $nom = $prenom = $age = $type = "";
$options = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cin = trim($_POST["cin"]);
    if (empty($cin)) {
        $errors["cin"] = "le CIN est requis.";
    }

    elseif (!preg_match("/^[0-9]{8}$/", $cin)) {
        $errors["cin"] = "le CIN doit comporter 8caracteres alphanumeriques ." ; 
    }
    $nom= trim($_POST["nom"]);
    if (empty($nom)) {
        $errors["nom"] = "Le nom est requis .";
    } elseif (!preg_match("/^[a-zA-ZA-y\s]+$", $nom)) {
        $errors["nom"]="le nom ne doit contenir que des lettres.";
    }

    $prenom = trim($_POST["prenom"]);
    if (empty($prenom)) {
        $errors["prenom"] = "Le prenom  est requis .";
    } elseif (!preg_match("/^[a-zA-ZA-y\s]+$", $prenom)) {
        $errors["prenom"]="le prenom ne doit contenir que des lettres.";
    }

    $age = trim($_POST["age"]);
    if (empty($age)) {
        $errors["age"] = "L age est requis .";
    } elseif (lis_numeric($age) || $age < 18) {
        $errors["age"]="l age  doit etre un nombre  superieur a 18.";
    }

    $type = trim($_POST["type"]);
    $types_valides = array("java" , "php" , "rubby");
    if (empty($type) || !in_array($type, $types_valides)) {
        $errors["type"] = "Veuillez selectionner un type de concours valide .";
    }

    $options = isset($_POST["options"]) ? $_POST["options"] : array();
    $options_valides = array("bac" , "1ercycle" , "2emecycle");
    foreach ($options as $opt){
        if(!in_array($opt , $options_valides)){
            $errors["options"] = "Option invalide selectionnee.";
            break;
        }

    }
   


}


?>

<html>
<body>
    <h2>Formulaire d'inscription au concours</h2>
    <form method="post">
        <label>CIN: <input type="text" name="cin" value="<?php echo htmlpecialchars($cin); ?>"></label>
        <div class="error"><?php echo isset($errors["cin"]) ? $errors["cin"] : ""; ?></div>

        <label>Nom: <input type="text" name="nom" value="<?php echo htmlspecialchars($nom); ?>"></label>
        <div class="error"><?php echo isset($errors["nom"]) ? $errors["nom"] : ""; ?></div>

        <label>Prenom: <input type="text" name="prenom" value="<?php echo htmlspecialchars($prenom); ?>"></label>
        <div class="error"><?php echo isset($errors["prenom"]) ? $errors["prenom"] : ""; ?></div>

        <label>Age: <input type="number" name="age" value="<?php echo htmlspecialchars($age); ?>"></label>
        <div class="error"><?php echo isset($errors["age"]) ? $errors["age"] : ""; ?></div>

        <label>Type de concours:
            <select name="type">
                <option value="">--  Selectionner --</option>
                <?php
                foreach(array("java", "php", "rubby") as $t) {
                    $selected = ($type == $t) ? "selected" : "" ; 
                    echo "<option value=\"$t\" $selected>$t</option>";
                }
                ?>

            </select>
            </label>
            <div class="error"><?php echo isset($errors["type"]) ? $errors["type"] : ""; ?></div>

            <fieldset>
                <legend>Options :</legend>
                <?php
                foreach (array("bac" , "1er Cycle" , "2eme Cycle") as $opt) {
                    $checked = in_array($opt , $options) ? "checked" : "";
                    echo "<label><input type='radio' name='options[]' value='$opt' $checked> $opt</label><br>";
                }
                ?>
                <div class="error"><?php echo isset($errors["options"]) ? $errors["options"] : ""; ?></div>
            </fieldset>

            <br> 
            <input type="submit" value="S'inscrire">
            </form>

</body>
</html> 