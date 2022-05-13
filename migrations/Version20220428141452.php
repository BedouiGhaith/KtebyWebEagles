<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220428141452 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis CHANGE id_avis id_avis INT AUTO_INCREMENT NOT NULL, CHANGE id_livre id_livre INT DEFAULT NULL, CHANGE id_user id_user INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categorie CHANGE nom_categorie nom_categorie VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE club CHANGE id_user id_user INT DEFAULT NULL');
        $this->addSql('ALTER TABLE evaluation CHANGE id_livre id_livre INT DEFAULT NULL');
        $this->addSql('ALTER TABLE evenement CHANGE id_club id_club INT DEFAULT NULL');
        $this->addSql('ALTER TABLE favoris CHANGE id_fav id_fav INT AUTO_INCREMENT NOT NULL, CHANGE id_user id_user INT DEFAULT NULL, CHANGE id_livre id_livre INT DEFAULT NULL');
        $this->addSql('ALTER TABLE historique CHANGE id_user id_user INT DEFAULT NULL, CHANGE id_livre id_livre INT DEFAULT NULL');
        $this->addSql('ALTER TABLE livre ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE id_categorie id_categorie INT DEFAULT NULL');
        $this->addSql('ALTER TABLE members CHANGE id_user id_user INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis CHANGE id_avis id_avis INT NOT NULL, CHANGE id_livre id_livre INT NOT NULL, CHANGE id_user id_user INT NOT NULL');
        $this->addSql('ALTER TABLE categorie CHANGE nom_categorie nom_categorie VARCHAR(30) NOT NULL');
        $this->addSql('ALTER TABLE club CHANGE id_user id_user INT NOT NULL');
        $this->addSql('ALTER TABLE evaluation CHANGE id_livre id_livre INT NOT NULL');
        $this->addSql('ALTER TABLE evenement CHANGE id_club id_club INT NOT NULL');
        $this->addSql('ALTER TABLE favoris CHANGE id_fav id_fav INT NOT NULL, CHANGE id_livre id_livre INT NOT NULL, CHANGE id_user id_user INT NOT NULL');
        $this->addSql('ALTER TABLE historique CHANGE id_user id_user INT NOT NULL, CHANGE id_livre id_livre INT NOT NULL');
        $this->addSql('ALTER TABLE livre DROP created_at, CHANGE id_categorie id_categorie INT NOT NULL');
        $this->addSql('ALTER TABLE members CHANGE id_user id_user INT AUTO_INCREMENT NOT NULL');
    }
}
