<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230209143302 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nuite DROP FOREIGN KEY FK_8D4CB715BCF5E72D');
        $this->addSql('ALTER TABLE proposer DROP FOREIGN KEY FK_21866C15BCF5E72D');
        $this->addSql('CREATE TABLE categorieChambre (id INT AUTO_INCREMENT NOT NULL, libelleCategorie VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE categorie_chambre');
        $this->addSql('ALTER TABLE atelier CHANGE nb_places_maxi nbPlacesMaxi INT NOT NULL');
        $this->addSql('ALTER TABLE inscription CHANGE date_inscription dateInscription DATETIME NOT NULL');
        $this->addSql('ALTER TABLE licencie CHANGE date_adhesion dateAdhesion DATETIME NOT NULL');
        $this->addSql('ALTER TABLE nuite DROP FOREIGN KEY FK_8D4CB7153243BB18');
        $this->addSql('DROP INDEX IDX_8D4CB7153243BB18 ON nuite');
        $this->addSql('DROP INDEX IDX_8D4CB715BCF5E72D ON nuite');
        $this->addSql('ALTER TABLE nuite ADD hotel INT NOT NULL, ADD categorie INT NOT NULL, ADD inscription_id INT DEFAULT NULL, DROP hotel_id, DROP categorie_id, CHANGE date_nuitee dateNuitee DATETIME NOT NULL');
        $this->addSql('ALTER TABLE nuite ADD CONSTRAINT FK_8D4CB7153535ED9 FOREIGN KEY (hotel) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE nuite ADD CONSTRAINT FK_8D4CB715497DD634 FOREIGN KEY (categorie) REFERENCES categorieChambre (id)');
        $this->addSql('ALTER TABLE nuite ADD CONSTRAINT FK_8D4CB7155DAC5993 FOREIGN KEY (inscription_id) REFERENCES inscription (id)');
        $this->addSql('CREATE INDEX IDX_8D4CB7153535ED9 ON nuite (hotel)');
        $this->addSql('CREATE INDEX IDX_8D4CB715497DD634 ON nuite (categorie)');
        $this->addSql('CREATE INDEX IDX_8D4CB7155DAC5993 ON nuite (inscription_id)');
        $this->addSql('ALTER TABLE proposer DROP FOREIGN KEY FK_21866C153243BB18');
        $this->addSql('DROP INDEX IDX_21866C153243BB18 ON proposer');
        $this->addSql('DROP INDEX IDX_21866C15BCF5E72D ON proposer');
        $this->addSql('ALTER TABLE proposer ADD hotel INT NOT NULL, ADD categorie INT NOT NULL, DROP hotel_id, DROP categorie_id, CHANGE tarif_nuite tarifNuite DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE proposer ADD CONSTRAINT FK_21866C153535ED9 FOREIGN KEY (hotel) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE proposer ADD CONSTRAINT FK_21866C15497DD634 FOREIGN KEY (categorie) REFERENCES categorieChambre (id)');
        $this->addSql('CREATE INDEX IDX_21866C153535ED9 ON proposer (hotel)');
        $this->addSql('CREATE INDEX IDX_21866C15497DD634 ON proposer (categorie)');
        $this->addSql('ALTER TABLE qualite CHANGE libelle_qualite libelleQualite VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE restauration CHANGE date_restauration dateRestauration DATETIME NOT NULL, CHANGE type_repas typeRepas VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vacation ADD dateheureDebut DATETIME NOT NULL, ADD dateheureFin DATETIME NOT NULL, DROP dateheure_debut, DROP dateheure_fin');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nuite DROP FOREIGN KEY FK_8D4CB715497DD634');
        $this->addSql('ALTER TABLE proposer DROP FOREIGN KEY FK_21866C15497DD634');
        $this->addSql('CREATE TABLE categorie_chambre (id INT AUTO_INCREMENT NOT NULL, libelle_categorie VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE categorieChambre');
        $this->addSql('ALTER TABLE atelier CHANGE nbPlacesMaxi nb_places_maxi INT NOT NULL');
        $this->addSql('ALTER TABLE inscription CHANGE dateInscription date_inscription DATETIME NOT NULL');
        $this->addSql('ALTER TABLE licencie CHANGE dateAdhesion date_adhesion DATETIME NOT NULL');
        $this->addSql('ALTER TABLE nuite DROP FOREIGN KEY FK_8D4CB7153535ED9');
        $this->addSql('ALTER TABLE nuite DROP FOREIGN KEY FK_8D4CB7155DAC5993');
        $this->addSql('DROP INDEX IDX_8D4CB7153535ED9 ON nuite');
        $this->addSql('DROP INDEX IDX_8D4CB715497DD634 ON nuite');
        $this->addSql('DROP INDEX IDX_8D4CB7155DAC5993 ON nuite');
        $this->addSql('ALTER TABLE nuite ADD hotel_id INT NOT NULL, ADD categorie_id INT NOT NULL, DROP hotel, DROP categorie, DROP inscription_id, CHANGE dateNuitee date_nuitee DATETIME NOT NULL');
        $this->addSql('ALTER TABLE nuite ADD CONSTRAINT FK_8D4CB7153243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE nuite ADD CONSTRAINT FK_8D4CB715BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie_chambre (id)');
        $this->addSql('CREATE INDEX IDX_8D4CB7153243BB18 ON nuite (hotel_id)');
        $this->addSql('CREATE INDEX IDX_8D4CB715BCF5E72D ON nuite (categorie_id)');
        $this->addSql('ALTER TABLE proposer DROP FOREIGN KEY FK_21866C153535ED9');
        $this->addSql('DROP INDEX IDX_21866C153535ED9 ON proposer');
        $this->addSql('DROP INDEX IDX_21866C15497DD634 ON proposer');
        $this->addSql('ALTER TABLE proposer ADD hotel_id INT NOT NULL, ADD categorie_id INT NOT NULL, DROP hotel, DROP categorie, CHANGE tarifNuite tarif_nuite DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE proposer ADD CONSTRAINT FK_21866C153243BB18 FOREIGN KEY (hotel_id) REFERENCES hotel (id)');
        $this->addSql('ALTER TABLE proposer ADD CONSTRAINT FK_21866C15BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie_chambre (id)');
        $this->addSql('CREATE INDEX IDX_21866C153243BB18 ON proposer (hotel_id)');
        $this->addSql('CREATE INDEX IDX_21866C15BCF5E72D ON proposer (categorie_id)');
        $this->addSql('ALTER TABLE qualite CHANGE libelleQualite libelle_qualite VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE restauration CHANGE dateRestauration date_restauration DATETIME NOT NULL, CHANGE typeRepas type_repas VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE vacation ADD dateheure_debut DATETIME NOT NULL, ADD dateheure_fin DATETIME NOT NULL, DROP dateheureDebut, DROP dateheureFin');
    }
}
