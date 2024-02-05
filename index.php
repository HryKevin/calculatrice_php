<?php
    // Vérifier si la requête HTTP est une soumission de formulaire (POST)
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les valeurs du formulaire depuis les données POST
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operator = $_POST['operator'];

        // Vérifier l'opérateur et effectuer le calcul approprié
        switch ($operator) {
            case 'addition':
                $result = $num1 + $num2;
                break;
            case 'subtraction':
                $result = $num1 - $num2;
                break;
            case 'multiplication':
                $result = $num1 * $num2;
                break;
            case 'division':
                // Vérifier la division par zéro avant de calculer
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    // Gérer l'erreur si la division par zéro est détectée
                    $error = "Erreur : division par zéro";
                }
                break;
            default:
                // Gérer le cas où l'opérateur n'est pas valide
                $error = "Opérateur invalide";
                break;
        }

        // Afficher le résultat ou l'erreur, en fonction de ce qui a été calculé
        if (isset($error)) {
            // Afficher un message d'erreur en rouge
            echo "<p style='color: red;'>$error</p>";
        } else {
            // Afficher le résultat du calcul
            echo "<p>Résultat : $result</p>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CALCULATRICE PHP</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <h2>CALCULATRICE PHP</h2>
    <form method="post" action="">
        <input type="number" name="num1" placeholder="Nombre 1" required>
        
        <select name="operator" required>
            <option value="addition">+</option>
            <option value="subtraction">-</option>
            <option value="multiplication">*</option>
            <option value="division">/</option>
        </select>
        
        <input type="number" name="num2" placeholder="Nombre 2" required>
        
        <input type="submit" value="Calculer">
    </form>
</body>
</html>
