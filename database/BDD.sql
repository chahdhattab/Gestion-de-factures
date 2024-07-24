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
    montant_total DECIMAL(10, 2) NOT NULL,
    statut ENUM('payée', 'partiellement_payée', 'non_payée') NOT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (numero_client) REFERENCES clients(numero_client)
) ENGINE=InnoDB;

-- Table pour les paiements

CREATE TABLE IF NOT EXISTS paiements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_facture VARCHAR(50),
    date_paiement DATE NOT NULL,
    montant DECIMAL(10, 2) NOT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (numero_facture) REFERENCES factures(numero_facture)
) ENGINE=InnoDB;

-- Insertion des utilisateurs avec des matricules et mots de passe sécurisés

INSERT INTO utilisateurs (matricule, mot_de_passe, nom, prenom) VALUES
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

-- Ajout de la colonne téléphone 
ALTER TABLE clients
ADD COLUMN telephone VARCHAR(20) AFTER prenom;

-- Mettre à jour les numéros de téléphone pour les clients existants
UPDATE clients SET telephone = '0601234567' WHERE numero_client = '54321';
UPDATE clients SET telephone = '0602345678' WHERE numero_client = '65432';
UPDATE clients SET telephone = '0603456789' WHERE numero_client = '76543';
UPDATE clients SET telephone = '0604567890' WHERE numero_client = '87654';
UPDATE clients SET telephone = '0605678901' WHERE numero_client = '98765';
UPDATE clients SET telephone = '0606789012' WHERE numero_client = '09876';
UPDATE clients SET telephone = '0607890123' WHERE numero_client = '10987';
UPDATE clients SET telephone = '0608901234' WHERE numero_client = '21098';
UPDATE clients SET telephone = '0609012345' WHERE numero_client = '32109';
UPDATE clients SET telephone = '0600123456' WHERE numero_client = '43210';
UPDATE clients SET telephone = '0601234567' WHERE numero_client = '54320';
UPDATE clients SET telephone = '0602345678' WHERE numero_client = '65430';
UPDATE clients SET telephone = '0603456789' WHERE numero_client = '76540';
UPDATE clients SET telephone = '0604567890' WHERE numero_client = '87650';
UPDATE clients SET telephone = '0605678901' WHERE numero_client = '98760';



-- Insérer des factures dans la table factures
INSERT INTO factures (numero_facture, numero_client, montant_total, statut)
VALUES 
('234', '54321', 1500.00, 'payée'),
('789', '65432', 2500.50, 'non_payée'),
('345', '76543', 3000.75, 'partiellement_payée'),
('567', '87654', 1200.00, 'payée'),
('678', '98765', 500.00, 'non_payée'),
('456', '09876', 1750.00, 'partiellement_payée'),
('890', '10987', 2200.00, 'payée'),
('123', '21098', 1300.00, 'non_payée'),
('101', '54321', 1500.00, 'payée'),
('202', '65432', 2500.50, 'non_payée'),
('303', '76543', 3000.75, 'partiellement_payée'),
('404', '87654', 1200.00, 'payée'),
('505', '98765', 500.00, 'non_payée'),
('606', '09876', 1750.00, 'partiellement_payée'),
('707', '10987', 2200.00, 'payée'),
('808', '21098', 1300.00, 'non_payée'),
('909', '32109', 1400.00, 'payée'),
('110', '43210', 1600.00, 'partiellement_payée'),
('121', '54320', 1800.00, 'non_payée'),
('132', '65430', 2000.00, 'payée'),
('143', '76540', 1900.00, 'partiellement_payée'),
('154', '87650', 2100.00, 'payée'),
('165', '98760', 2500.00, 'non_payée'),
('176', '09876', 2700.00, 'partiellement_payée'),
('187', '10987', 2900.00, 'payée'),
('198', '21098', 3100.00, 'non_payée'),
('209', '32109', 3300.00, 'partiellement_payée'),
('210', '43210', 3500.00, 'payée');






