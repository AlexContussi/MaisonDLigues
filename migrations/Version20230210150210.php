<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230210150210 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE parametres (id INT AUTO_INCREMENT NOT NULL, nom_ddl VARCHAR(255) NOT NULL, adr_rue1 VARCHAR(255) NOT NULL, adr_rue2 VARCHAR(255) DEFAULT NULL, cp VARCHAR(5) NOT NULL, ville VARCHAR(255) NOT NULL, tel VARCHAR(14) NOT NULL, fax VARCHAR(20) NOT NULL, mail VARCHAR(255) NOT NULL, tarif_inscription DOUBLE PRECISION NOT NULL, tarif_repas_accompagnant DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE parametres');
    }
}
