<?php

require_once '../config/dbcon.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function getEnseignants() {
    global $con;
    $sql = "SELECT * FROM enseignants";
    return mysqli_query($con, $sql);
}

function deleteEnseignant($id) {
    global $con;
    $sql = "DELETE FROM enseignants WHERE id = '$id'";
    return mysqli_query($con, $sql);
}

function getSalles() {
    global $con;
    $sql = "SELECT * FROM salles";
    return mysqli_query($con, $sql);
}

function deleteSalle($id) {
    global $con;
    $sql = "DELETE FROM salles WHERE id = '$id'";
    return mysqli_query($con, $sql);
}

function addExamen($nom, $date_exam, $heure_exam) {
    global $con;
    $sql = "INSERT INTO examens (nom, date_exam, heure_exam) VALUES ('$nom', '$date_exam', '$heure_exam')";
    return mysqli_query($con, $sql);
}

function getExamens() {
    global $con;
    $sql = "SELECT * FROM examens";
    return mysqli_query($con, $sql);
}

function addAffectation($examen_id, $salle_id, $enseignants_id) {
    global $con;
    $sql = "INSERT INTO affectation (examen_id, salle_id, enseignants_id) VALUES ('$examen_id', '$salle_id', '$enseignants_id')";
    return mysqli_query($con, $sql);
}
function getAffectations() {
    global $con;
    $sql = "SELECT a.id, e.nom AS examen_nom, s.nom AS salle_nom, CONCAT(ens.nom, ' ', ens.prenom) AS enseignant_nom
            FROM affectation a 
            JOIN examens e ON a.examen_id = e.id 
            JOIN salles s ON a.salle_id = s.id 
            JOIN enseignants ens ON a.enseignants_id = ens.id";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die("Error: " . mysqli_error($con));
    }
    return $result;
}



function deleteAffectation($id) {
    global $con;
    $sql = "DELETE FROM affectation WHERE id = '$id'";
    return mysqli_query($con, $sql);
}
?>
