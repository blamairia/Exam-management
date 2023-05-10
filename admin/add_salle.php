<?php
require_once '../config/dbcon.php';

if (isset($_POST['add_salle'])) {
    $nom = $_POST['nom'];
    $capacite = $_POST['capacite'];

    $sql = "INSERT INTO salles (nom, capacite) VALUES (?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "si", $nom, $capacite);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($con);
        header("Location: add_salle.php?success=1");
        exit;
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une salle</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<div class="container">
<div class="container">
    <?php include 'sidebar.php'; ?>
    <div class="container">
        <div class="table-wrapper">
        <h1>Ajouter une salle</h1>
        <?php if(isset($_GET['success']) && $_GET['success'] == 1) { ?>
            <div class="alert alert-success">Salle ajoutée avec succès!</div>
        <?php } ?>
        <div class="form-box">
            <form method="post" action="add_salle.php">
                <div class="form-group">
                    <label for="nom"><strong>Nom :</strong></label>
                    <input type="text" id="nom" name="nom" required>
                </div>

                <div class="form-group">
                    <label for="capacite"><strong>Capacité :</strong></label>
                    <input type="number" id="capacite" name="capacite" required>
                </div>

                <div class="button-container">
                    <input type="submit" name="add_salle" class="button" value="Ajouter">
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
