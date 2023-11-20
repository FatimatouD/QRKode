<?php
// Récupérer les données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$adresse = $_POST['adresse'];
$produit = $_POST['produit'];
$quantite = $_POST['quantite'];
$paiement = $_POST['paiement'];

// Insérer les données dans la base de données
$connexion = new mysqli("localhost", "nom_utilisateur", "mot_de_passe", "nom_base_de_donnees");

// Vérifier la connexion
if ($connexion->connect_error) {
    die("Échec de la connexion à la base de données : " . $connexion->connect_error);
}

// Échapper les données pour éviter les injections SQL
$nom = $connexion->real_escape_string($nom);
$prenom = $connexion->real_escape_string($prenom);
$adresse = $connexion->real_escape_string($adresse);
$produit = $connexion->real_escape_string($produit);
$quantite = $connexion->real_escape_string($quantite);
$paiement = $connexion->real_escape_string($paiement);

// Requête SQL pour insérer les données
$requete = "INSERT INTO commandes (nom, prenom, adresse, produit, quantite, paiement) VALUES ('$nom', '$prenom', '$adresse', '$produit', '$quantite', '$paiement')";

// Exécuter la requête
if ($connexion->query($requete) === TRUE) {
    echo "La commande a été enregistrée avec succès.";
} else {
    echo "Erreur lors de l'enregistrement de la commande : " . $connexion->error;
}

// Fermer la connexion à la base de données
$connexion->close();
?>
