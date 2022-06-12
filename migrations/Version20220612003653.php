<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220612003653 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, is_archived TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE devis (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, commentaire LONGTEXT NOT NULL, estimation DOUBLE PRECISION NOT NULL, pj LONGBLOB DEFAULT NULL, date DATE NOT NULL, nom_client VARCHAR(255) NOT NULL, tel_client VARCHAR(255) NOT NULL, adresse_client VARCHAR(255) NOT NULL, email_client VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture (id INT AUTO_INCREMENT NOT NULL, montant DOUBLE PRECISION NOT NULL, date_creation DATE NOT NULL, description LONGTEXT NOT NULL, is_archived TINYINT(1) NOT NULL, nom_client VARCHAR(255) NOT NULL, tel_client VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE materiel (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, date_achete DATE NOT NULL, is_for_selling TINYINT(1) NOT NULL, date_vendu DATE NOT NULL, prix_achat DOUBLE PRECISION NOT NULL, prix_vendu DOUBLE PRECISION DEFAULT NULL, is_available TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_18D2B091BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE materiel ADD CONSTRAINT FK_18D2B091BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE image ADD piscine_id INT DEFAULT NULL, ADD produit_id INT NOT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FE18396B7 FOREIGN KEY (piscine_id) REFERENCES piscine (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_C53D045FE18396B7 ON image (piscine_id)');
        $this->addSql('CREATE INDEX IDX_C53D045FF347EFB ON image (produit_id)');
        $this->addSql('ALTER TABLE partenaire ADD is_archived TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE piscine ADD longueur DOUBLE PRECISION NOT NULL, ADD largeur DOUBLE PRECISION NOT NULL, ADD profondeur DOUBLE PRECISION NOT NULL, ADD volume DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE produit ADD categorie_id INT NOT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_29A5EC27BCF5E72D ON produit (categorie_id)');
        $this->addSql('ALTER TABLE realisation ADD service_id INT NOT NULL, ADD facture_id INT DEFAULT NULL, ADD piscine_id INT NOT NULL');
        $this->addSql('ALTER TABLE realisation ADD CONSTRAINT FK_EAA5610EED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE realisation ADD CONSTRAINT FK_EAA5610E7F2DEE08 FOREIGN KEY (facture_id) REFERENCES facture (id)');
        $this->addSql('ALTER TABLE realisation ADD CONSTRAINT FK_EAA5610EE18396B7 FOREIGN KEY (piscine_id) REFERENCES piscine (id)');
        $this->addSql('CREATE INDEX IDX_EAA5610EED5CA9E6 ON realisation (service_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EAA5610E7F2DEE08 ON realisation (facture_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EAA5610EE18396B7 ON realisation (piscine_id)');
        $this->addSql('ALTER TABLE utilisateur ADD role_id INT NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B3D60322AC ON utilisateur (role_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materiel DROP FOREIGN KEY FK_18D2B091BCF5E72D');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27BCF5E72D');
        $this->addSql('ALTER TABLE realisation DROP FOREIGN KEY FK_EAA5610E7F2DEE08');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE devis');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE materiel');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FE18396B7');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FF347EFB');
        $this->addSql('DROP INDEX IDX_C53D045FE18396B7 ON image');
        $this->addSql('DROP INDEX IDX_C53D045FF347EFB ON image');
        $this->addSql('ALTER TABLE image DROP piscine_id, DROP produit_id');
        $this->addSql('ALTER TABLE partenaire DROP is_archived');
        $this->addSql('ALTER TABLE piscine DROP longueur, DROP largeur, DROP profondeur, DROP volume');
        $this->addSql('DROP INDEX UNIQ_29A5EC27BCF5E72D ON produit');
        $this->addSql('ALTER TABLE produit DROP categorie_id');
        $this->addSql('ALTER TABLE realisation DROP FOREIGN KEY FK_EAA5610EED5CA9E6');
        $this->addSql('ALTER TABLE realisation DROP FOREIGN KEY FK_EAA5610EE18396B7');
        $this->addSql('DROP INDEX IDX_EAA5610EED5CA9E6 ON realisation');
        $this->addSql('DROP INDEX UNIQ_EAA5610E7F2DEE08 ON realisation');
        $this->addSql('DROP INDEX UNIQ_EAA5610EE18396B7 ON realisation');
        $this->addSql('ALTER TABLE realisation DROP service_id, DROP facture_id, DROP piscine_id');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3D60322AC');
        $this->addSql('DROP INDEX IDX_1D1C63B3D60322AC ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP role_id');
    }
}
