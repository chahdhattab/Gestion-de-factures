-- Création de la base de données
CREATE DATABASE IF NOT EXISTS gestion_factures;
USE gestion_factures;

-- Table pour les utilisateurs
CREATE TABLE IF NOT EXISTS utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    matricule VARCHAR(50) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Table pour les clients
CREATE TABLE IF NOT EXISTS clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_client VARCHAR(50) UNIQUE NOT NULL,
    matricule_utilisateur VARCHAR(50),
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (matricule_utilisateur) REFERENCES utilisateurs(matricule)
) ENGINE=InnoDB;

-- Table pour les factures
CREATE TABLE IF NOT EXISTS factures (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_facture VARCHAR(50) UNIQUE NOT NULL,
    numero_client VARCHAR(50),
    matricule_utilisateur VARCHAR(50),
    date_facture DATE NOT NULL,
    montant_total DECIMAL(10, 2) NOT NULL,
    statut ENUM('payée', 'partiellement_payée', 'non_payée') NOT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (numero_client) REFERENCES clients(numero_client),
    FOREIGN KEY (matricule_utilisateur) REFERENCES utilisateurs(matricule)
) ENGINE=InnoDB;

-- Table pour les paiements
CREATE TABLE IF NOT EXISTS paiements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_facture VARCHAR(50),
    matricule_utilisateur VARCHAR(50),
    date_paiement DATE NOT NULL,
    montant DECIMAL(10, 2) NOT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (numero_facture) REFERENCES factures(numero_facture),
    FOREIGN KEY (matricule_utilisateur) REFERENCES utilisateurs(matricule)
) ENGINE=InnoDB;



