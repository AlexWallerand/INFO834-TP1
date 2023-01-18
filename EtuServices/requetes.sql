CREATE TABLE Utilisateur (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nom VARCHAR(30) NOT NULL,
prenom VARCHAR(30) NOT NULL,
email VARCHAR(50),
mdp VARCHAR(50)
);

INSERT INTO `utilisateur`(`nom`, `prenom`, `email`, `mdp`) VALUES ('Brogniart','Denis','denis.bg@kohlanta.fr','AH!');