<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220615012941 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, is_archived TINYINT(1) NOT NULL, date_creation DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE devis (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, commentaire LONGTEXT NOT NULL, estimation DOUBLE PRECISION NOT NULL, pj LONGBLOB DEFAULT NULL, date DATE NOT NULL, nom_client VARCHAR(255) NOT NULL, tel_client VARCHAR(255) NOT NULL, adresse_client VARCHAR(255) NOT NULL, email_client VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture (id INT AUTO_INCREMENT NOT NULL, montant DOUBLE PRECISION NOT NULL, date_creation DATE NOT NULL, description LONGTEXT NOT NULL, is_archived TINYINT(1) NOT NULL, nom_client VARCHAR(255) NOT NULL, tel_client VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, piscine_id INT DEFAULT NULL, produit_id INT NOT NULL, nom_image VARCHAR(255) NOT NULL, is_achived TINYINT(1) NOT NULL, date_creation DATE NOT NULL, INDEX IDX_C53D045FE18396B7 (piscine_id), INDEX IDX_C53D045FF347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mail (id INT AUTO_INCREMENT NOT NULL, objet VARCHAR(255) DEFAULT NULL, content LONGTEXT NOT NULL, is_received TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE materiel (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, date_achete DATE NOT NULL, is_for_selling TINYINT(1) NOT NULL, date_vendu DATE NOT NULL, prix_achat DOUBLE PRECISION NOT NULL, prix_vendu DOUBLE PRECISION DEFAULT NULL, is_available TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_18D2B091BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partenaire (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, logo LONGBLOB DEFAULT NULL, is_archived TINYINT(1) NOT NULL, date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE piscine (id INT AUTO_INCREMENT NOT NULL, surface DOUBLE PRECISION NOT NULL, is_built TINYINT(1) NOT NULL, longueur DOUBLE PRECISION NOT NULL, largeur DOUBLE PRECISION NOT NULL, profondeur DOUBLE PRECISION NOT NULL, volume DOUBLE PRECISION NOT NULL, date_creation DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, is_available TINYINT(1) NOT NULL, date_creation DATE NOT NULL, UNIQUE INDEX UNIQ_29A5EC27BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE realisation (id INT AUTO_INCREMENT NOT NULL, service_id INT NOT NULL, facture_id INT DEFAULT NULL, piscine_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, date_debut DATE NOT NULL, date_fin DATE DEFAULT NULL, INDEX IDX_EAA5610EED5CA9E6 (service_id), UNIQUE INDEX UNIQ_EAA5610E7F2DEE08 (facture_id), UNIQUE INDEX UNIQ_EAA5610EE18396B7 (piscine_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, is_archived TINYINT(1) NOT NULL, date_creation DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, image LONGBLOB DEFAULT NULL, date_creation DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, role_id INT NOT NULL, username VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, is_authorized TINYINT(1) NOT NULL, date_creation DATE NOT NULL, UNIQUE INDEX UNIQ_1D1C63B3F85E0677 (username), INDEX IDX_1D1C63B3D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FE18396B7 FOREIGN KEY (piscine_id) REFERENCES piscine (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE materiel ADD CONSTRAINT FK_18D2B091BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE realisation ADD CONSTRAINT FK_EAA5610EED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE realisation ADD CONSTRAINT FK_EAA5610E7F2DEE08 FOREIGN KEY (facture_id) REFERENCES facture (id)');
        $this->addSql('ALTER TABLE realisation ADD CONSTRAINT FK_EAA5610EE18396B7 FOREIGN KEY (piscine_id) REFERENCES piscine (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE materiel DROP FOREIGN KEY FK_18D2B091BCF5E72D');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27BCF5E72D');
        $this->addSql('ALTER TABLE realisation DROP FOREIGN KEY FK_EAA5610E7F2DEE08');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FE18396B7');
        $this->addSql('ALTER TABLE realisation DROP FOREIGN KEY FK_EAA5610EE18396B7');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FF347EFB');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3D60322AC');
        $this->addSql('ALTER TABLE realisation DROP FOREIGN KEY FK_EAA5610EED5CA9E6');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE devis');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE mail');
        $this->addSql('DROP TABLE materiel');
        $this->addSql('DROP TABLE partenaire');
        $this->addSql('DROP TABLE piscine');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE realisation');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE utilisateur');
    }
}
