<?php
require_once 'functions.php';

$message = '';
if (isset($_POST['submit'])) {
    $examen_id = $_POST['examen_id'];
    $salle_id = $_POST['salle_id'];
    $enseignants_id = $_POST['enseignants_id'];

    if (addAffectation($examen_id, $salle_id, $enseignants_id)) {
        $message = "Affectation added successfully!";
    } else {
        $message = "Error adding affectation!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Affectation</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<div class="container">
    <?php include 'sidebar.php'; ?>
    <div class="content">
        <h1>Add Affectation</h1>
        <?php if (!empty($message)) : ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
        <form action="ajoute_affectation.php" method="post">
            <div class="form-group">
                <label for="examen_id">Examen</label>
                <select name="examen_id" id="examen_id">
                    <?php
                    $examens = getExamens();
                    while ($row = mysqli_fetch_assoc($examens)) {
                        echo '<option value="' . $row['id'] . '">' . $row['nom'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="salle_id">Salle</label>
                <select name="salle_id" id="salle_id">
                    <?php
                    $salles = getSalles();
                    while ($row = mysqli_fetch_assoc($salles)) {
                        echo '<option value="' . $row['id'] . '">' . $row['nom'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="enseignants_id">Enseignant</label>
                <select name="enseignants_id" id="enseignants_id">
                    <?php
                    $enseignants = getEnseignants();
                    while ($row = mysqli_fetch_assoc($enseignants)) {
                        echo '<option value="' . $row['id'] . '">' . $row['nom'] . ' ' . $row['prenom'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="button-container">
                <button type="submit" name="submit" class="button">Add Affectation</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
