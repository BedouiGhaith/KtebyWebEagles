<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220428150832 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avis (id_avis INT AUTO_INCREMENT NOT NULL, id_livre INT DEFAULT NULL, id_user INT DEFAULT NULL, commentaire VARCHAR(500) NOT NULL, INDEX id_user (id_user), INDEX id_livre (id_livre), PRIMARY KEY(id_avis)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id_categorie INT AUTO_INCREMENT NOT NULL, nom_categorie VARCHAR(255) NOT NULL, PRIMARY KEY(id_categorie)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE club (id_club INT AUTO_INCREMENT NOT NULL, id_user INT DEFAULT NULL, nom_club VARCHAR(30) NOT NULL, date_creation VARCHAR(30) NOT NULL, INDEX club_owner (id_user), PRIMARY KEY(id_club)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evaluation (id_evaluation INT AUTO_INCREMENT NOT NULL, id_livre INT DEFAULT NULL, nb_stars INT NOT NULL, INDEX fk_livre_evaluation (id_livre), PRIMARY KEY(id_evaluation)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (id_event INT AUTO_INCREMENT NOT NULL, id_club INT DEFAULT NULL, evnt_name VARCHAR(255) NOT NULL, description TEXT NOT NULL, image VARCHAR(255) NOT NULL, evnt_date DATE DEFAULT NULL, INDEX id_club (id_club), PRIMARY KEY(id_event)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE favoris (id_fav INT AUTO_INCREMENT NOT NULL, id_livre INT DEFAULT NULL, id_user INT DEFAULT NULL, INDEX id_livre (id_livre), INDEX id_user (id_user), PRIMARY KEY(id_fav)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE historique (id_histo INT AUTO_INCREMENT NOT NULL, id_user INT DEFAULT NULL, id_livre INT DEFAULT NULL, date_histo DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX id_livre (id_livre), INDEX id_user (id_user), PRIMARY KEY(id_histo)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livre (id_livre INT AUTO_INCREMENT NOT NULL, id_categorie INT DEFAULT NULL, titre VARCHAR(30) NOT NULL, auteur VARCHAR(30) NOT NULL, description TEXT NOT NULL, image VARCHAR(255) NOT NULL, text_livre TEXT NOT NULL, date DATETIME NOT NULL, INDEX id_categorie (id_categorie), PRIMARY KEY(id_livre)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE members (id_user INT NOT NULL, id_club INT NOT NULL, INDEX id_user (id_user), INDEX id_club (id_club), PRIMARY KEY(id_user, id_club)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation (id_reclamation INT AUTO_INCREMENT NOT NULL, id_user INT DEFAULT NULL, titre VARCHAR(50) NOT NULL, description TEXT NOT NULL, status INT DEFAULT NULL, response VARCHAR(25) DEFAULT NULL, INDEX id_user (id_user), PRIMARY KEY(id_reclamation)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE review (id_review INT AUTO_INCREMENT NOT NULL, id_avis INT NOT NULL, id_user INT NOT NULL, opinion INT NOT NULL, INDEX fk_user (id_user), INDEX fk_avis (id_avis), INDEX id_avis (id_avis), PRIMARY KEY(id_review)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id_user INT AUTO_INCREMENT NOT NULL, email VARCHAR(30) NOT NULL, username VARCHAR(30) NOT NULL, mdp TEXT NOT NULL, nom_prenom VARCHAR(30) NOT NULL, age INT NOT NULL, type VARCHAR(20) NOT NULL, PRIMARY KEY(id_user)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF042E60EA9 FOREIGN KEY (id_livre) REFERENCES livre (id_livre)');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF06B3CA4B FOREIGN KEY (id_user) REFERENCES utilisateur (id_user)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE38726B3CA4B FOREIGN KEY (id_user) REFERENCES utilisateur (id_user)');
        $this->addSql('ALTER TABLE evaluation ADD CONSTRAINT FK_1323A57542E60EA9 FOREIGN KEY (id_livre) REFERENCES livre (id_livre)');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681E33CE2470 FOREIGN KEY (id_club) REFERENCES club (id_club)');
        $this->addSql('ALTER TABLE favoris ADD CONSTRAINT FK_8933C43242E60EA9 FOREIGN KEY (id_livre) REFERENCES livre (id_livre)');
        $this->addSql('ALTER TABLE favoris ADD CONSTRAINT FK_8933C4326B3CA4B FOREIGN KEY (id_user) REFERENCES utilisateur (id_user)');
        $this->addSql('ALTER TABLE historique ADD CONSTRAINT FK_EDBFD5EC6B3CA4B FOREIGN KEY (id_user) REFERENCES utilisateur (id_user)');
        $this->addSql('ALTER TABLE historique ADD CONSTRAINT FK_EDBFD5EC42E60EA9 FOREIGN KEY (id_livre) REFERENCES livre (id_livre)');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F99C9486A13 FOREIGN KEY (id_categorie) REFERENCES categorie (id_categorie)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE6064046B3CA4B FOREIGN KEY (id_user) REFERENCES utilisateur (id_user)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F99C9486A13');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681E33CE2470');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF042E60EA9');
        $this->addSql('ALTER TABLE evaluation DROP FOREIGN KEY FK_1323A57542E60EA9');
        $this->addSql('ALTER TABLE favoris DROP FOREIGN KEY FK_8933C43242E60EA9');
        $this->addSql('ALTER TABLE historique DROP FOREIGN KEY FK_EDBFD5EC42E60EA9');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF06B3CA4B');
        $this->addSql('ALTER TABLE club DROP FOREIGN KEY FK_B8EE38726B3CA4B');
        $this->addSql('ALTER TABLE favoris DROP FOREIGN KEY FK_8933C4326B3CA4B');
        $this->addSql('ALTER TABLE historique DROP FOREIGN KEY FK_EDBFD5EC6B3CA4B');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE6064046B3CA4B');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE evaluation');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE favoris');
        $this->addSql('DROP TABLE historique');
        $this->addSql('DROP TABLE livre');
        $this->addSql('DROP TABLE members');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE review');
        $this->addSql('DROP TABLE utilisateur');
    }
}
