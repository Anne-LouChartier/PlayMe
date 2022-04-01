CREATE DATABASE streamingmusique;

USE streamingmusique;

CREATE TABLE abonnes (
    id_abonne INT NOT NULL AUTO_INCREMENT,
    prenom VARCHAR(20) NOT NULL,
    nom VARCHAR(25) NOT NULL,
    mot_de_passe VARCHAR(70) NOT NULL,
    sexe enum('m','f') NOT NULL,
    email VARCHAR(30) NOT NULL,
    PRIMARY KEY (id_abonne)
) ENGINE=InnoDB ;

CREATE TABLE visionnages (
    id_visionnage INT NOT NULL AUTO_INCREMENT,
    id_artiste INT NOT NULL,
    id_abonne INT NOT NULL,
    id_categorie INT NOT NULL,
    date_de_visionnage DATE NOT NULL,
    id_morceau INT NOT NULL,
    PRIMARY KEY (id_visionnage),
    FOREIGN KEY (id_abonne) REFERENCES abonnes(id_abonne)
) ENGINE=InnoDB ;

CREATE TABLE categorie (
    id_categorie INT NOT NULL AUTO_INCREMENT,
    genre VARCHAR(20) NOT NULL,
    PRIMARY KEY (id_categorie),
    FOREIGN KEY (id_categorie) REFERENCES visionnages(id_categorie)
) ENGINE=InnoDB ;

CREATE TABLE artistes (
    id_artiste INT NOT NULL AUTO_INCREMENT,
    id_morceau INT NOT NULL,
    sexe enum('m','f'),
    nom VARCHAR(30) NOT NULL,
    PRIMARY KEY (id_artiste),
    FOREIGN KEY (id_artiste) REFERENCES visionnages(id_artiste),
    FOREIGN KEY (id_morceau) REFERENCES visionnages(id_morceau)
) ENGINE=InnoDB ;

CREATE TABLE morceaux (
    id_morceau INT NOT NULL AUTO_INCREMENT,
    id_artiste INT NOT NULL,
    id_categorie INT NOT NULL,
    titre VARCHAR(25) NOT NULL,
    date_de_sortie DATE NOT NULL,
    PRIMARY KEY (id_morceau),
    FOREIGN KEY (id_morceau) REFERENCES artistes(id_morceau) AND visionnages(id_morceau),
    FOREIGN KEY (id_artiste) REFERENCES artistes(id_artiste) AND visionnages(id_artiste),
    FOREIGN KEY (id_categorie) REFERENCES categorie(id_categorie) AND visionnages(id_categorie)
) ENGINE=InnoDB ;

INSERT INTO abonnes (prenom, nom, mot_de_passe, sexe, email) VALUES 
('Florian', 'Legrand', 'password', 'm', 'florianlegrand@gmail.com'),
('Anne-Lou', 'Chartier', 'hahahahahahah', 'f', 'annelouchartier@gmail.com' );

INSERT INTO categorie (genre) VALUES
('Hip-Hop'),
('Pop'),
('House'),
('RnB'),
('Rock'),
('Afro'),
('Reggae'),
('Rap');

INSERT INTO artistes (id_morceau, sexe, nom) VALUES 
(1, 'm', 'Kanye West'),
(2, 'f', 'Amy Winehouse'),
(3, 'f', 'Spice Girls'),
(4, 'm', 'Nirvana'),
(5, 'm', 'Daft Punk'),
(6, 'm', 'Stardust'),
(7, 'f', 'Beyoncé'),
(8, 'f', 'Aaliyah'),
(9, 'm', 'Queen'),
(10, 'm', 'Marilyn Manson'),
(11, 'm', 'Burna Boy'),
(12, 'm', 'Wizkid'),
(13, 'm', 'Bob Marley'),
(14, 'm', 'Peter Tosh'),
(15, 'm', 'FouKi'),
(16, 'f', 'Lala &ce'),
(17, 'm', 'Gros Mo');

INSERT INTO morceaux (id_artiste, id_categorie, titre, date_de_sortie) VALUES 
(1, 1, 'Jesus Walks', '2004-05-25'),
(2, 1, 'Rehab', '2007-02-19'),
(3, 2, 'Wannabe', '1996-07-08'),
(4, 2, 'Smells Like Teen Spirit', '1991-09-15'),
(5, 3, 'Revolution 909', '1999-06-12'),
(6, 3, 'Music Sounds Better With You', '1998-07-20'),
(7, 4, 'More than a Woman', '2001-11-13'),
(8, 4, 'Crazy in Love', '2003-05-18'),
(9, 5, 'I Want to Break Free', '1982-04-02'),
(10, 5, 'Sweet Dreams', '1983-05-02'),
(11, 6, 'Odogwu', '2020-06-17'),
(12, 6, 'Blow', '2020-04-15'),
(13, 7, 'No Woman, No Cry', '1974-10-25'),
(14, 7, 'Legalize It', '1976-08-08'),
(15, 8, 'Décibel', '2022-02-15'),
(16, 8, 'Sun Goes Down', '2022-01-17'),
(17, 8, 'Désolé', '2022-02-25'),
(17, 8, '#Hulahoop', '2021-12-28');
