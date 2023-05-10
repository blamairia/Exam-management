<?php
require_once 'functions.php';

$success_message = '';

if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $date_exam = $_POST['date_exam'];
    $heure_exam = $_POST['heure_exam'];
    
    addExamen($nom, $date_exam, $heure_exam);
    $success_message = 'Examen ajouté avec succès!';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Examens</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<div class="container">
    <?php include 'sidebar.php'; ?>
    <div class="content">
        <h2>Add Examens</h2>
        <?php if ($success_message): ?>
            <p class="success-message"><?= $success_message ?></p>
        <?php endif; ?>
        <h2>Add Examens</h2>
        <form action="ajoute_examens.php" method="post">
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="date_exam">Date:</label>
                <input type="date" id="date_exam" name="date_exam" required>
            </div>
            <div class="form-group">
                <label for="heure_exam">Heure:</label>
                <input type="time" id="heure_exam" name="heure_exam" required>
            </div>
            
            <div class="button-container">
                <input type="submit" name="submit" value="Ajouter" class="button">
            </div>
        </form>
    </div>
</div>
<style>
    .success-message {
        color: green;
        font-weight: bold;
        margin-bottom: 1rem;
    }
</style>

</body>
</html>