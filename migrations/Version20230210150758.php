<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230210150758 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE parametres ADD nomDdl VARCHAR(255) NOT NULL, ADD adrRue1 VARCHAR(255) NOT NULL, ADD tarifInscription DOUBLE PRECISION NOT NULL, ADD tarifRepasAccompagnant DOUBLE PRECISION NOT NULL, DROP nom_ddl, DROP adr_rue1, DROP tarif_inscription, DROP tarif_repas_accompagnant, CHANGE adr_rue2 adrRue2 VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE parametres ADD nom_ddl VARCHAR(255) NOT NULL, ADD adr_rue1 VARCHAR(255) NOT NULL, ADD tarif_inscription DOUBLE PRECISION NOT NULL, ADD tarif_repas_accompagnant DOUBLE PRECISION NOT NULL, DROP nomDdl, DROP adrRue1, DROP tarifInscription, DROP tarifRepasAccompagnant, CHANGE adrRue2 adr_rue2 VARCHAR(255) DEFAULT NULL');
    }
}
