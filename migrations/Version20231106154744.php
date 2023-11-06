<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106154744 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE statut (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taches (id INT AUTO_INCREMENT NOT NULL, libelle_statut_id INT DEFAULT NULL, nom_projet_id INT DEFAULT NULL, nom_utilisateur_id INT DEFAULT NULL, titre_tache VARCHAR(255) NOT NULL, description_tache VARCHAR(255) NOT NULL, date_creation DATETIME NOT NULL, date_echeance DATETIME NOT NULL, INDEX IDX_3BF2CD98E94AD1B4 (libelle_statut_id), INDEX IDX_3BF2CD989430F333 (nom_projet_id), INDEX IDX_3BF2CD98ECB301B6 (nom_utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE taches ADD CONSTRAINT FK_3BF2CD98E94AD1B4 FOREIGN KEY (libelle_statut_id) REFERENCES statut (id)');
        $this->addSql('ALTER TABLE taches ADD CONSTRAINT FK_3BF2CD989430F333 FOREIGN KEY (nom_projet_id) REFERENCES projets (id)');
        $this->addSql('ALTER TABLE taches ADD CONSTRAINT FK_3BF2CD98ECB301B6 FOREIGN KEY (nom_utilisateur_id) REFERENCES utilisateurs (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE taches DROP FOREIGN KEY FK_3BF2CD98E94AD1B4');
        $this->addSql('ALTER TABLE taches DROP FOREIGN KEY FK_3BF2CD989430F333');
        $this->addSql('ALTER TABLE taches DROP FOREIGN KEY FK_3BF2CD98ECB301B6');
        $this->addSql('DROP TABLE statut');
        $this->addSql('DROP TABLE taches');
    }
}
