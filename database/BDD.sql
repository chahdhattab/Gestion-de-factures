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

-- Insertion des utilisateurs avec des matricules et mots de passe sécurisés

INSERT INTO utilisateurs (matricule, mot_de_passe, nom, prenom) VALUES
('M1A2B3C4', 'P@!wrdH9', 'ABRGHAZ', 'Amine'),
('D5E6F7G8', 'S3cur3@#', 'RABHI', 'Hiba'),
('H9I0J1K2', 'Str0ng$%', 'KHADIRI', 'Issam'),
('L3M4N5O6', 'Ja$$Z0rM', 'HATTAB', 'Chahd');

-- Insertion des clients avec des numéros de client entièrement modifiés et des emails
INSERT INTO clients (numero_client, matricule_utilisateur, nom, prenom, email) VALUES
('54321', 'H9I0J1K2', 'ALLAY', 'Mohammed', 'allaymohammed@gmail.com'),
('65432', 'H9I0J1K2', 'FILALI', 'Meryem', 'filalimeryem@gmail.com'),
('76543', 'H9I0J1K2', 'YACOUBI', 'Ayoub', 'yacoubiayoub@gmail.com'),
('87654', 'H9I0J1K2', 'BOUAZZA', 'Hafsa', 'bouazzahafsa@gmail.com'),
('98765', 'H9I0J1K2', 'HATTAB', 'Oussama', 'hattaboussama@gmail.com'),
('09876', 'H9I0J1K2', 'BEHRI', 'Maroua', 'behrimaroua@gmail.com'),
('10987', 'H9I0J1K2', 'FOUAR', 'Samia', 'fouarsamia@gmail.com');
('21098', 'H9I0J1K2', 'LAHRACH', 'Karim', 'lahrachkarim@gmail.com'),
('32109', 'H9I0J1K2', 'NAJI', 'Salma', 'najislama@gmail.com'),
('43210', 'H9I0J1K2', 'HAJJAJI', 'Manal', 'hajjajimanal@gmail.com'),
('54320', 'H9I0J1K2', 'RAGHIBI', 'Mohammed', 'raghibimohammed@gmail.com'),
('65430', 'H9I0J1K2', 'JAAFAR', 'Leila', 'jaafarleila@gmail.com'),
('76540', 'H9I0J1K2', 'AKILI', 'Aymane', 'akiliaymane@gmail.com'),
('87650', 'H9I0J1K2', 'KHATIBI', 'Ilyass', 'khatibiilyass@gmail.com'),
('98760', 'H9I0J1K2', 'LAHLOU', 'Lina', 'lahloulina@gmail.com');




