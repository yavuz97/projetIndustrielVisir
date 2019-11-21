<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191117213302 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cpe_etablissement (id INT AUTO_INCREMENT NOT NULL, etablissement_id INT DEFAULT NULL, prenom VARCHAR(50) DEFAULT NULL, nom VARCHAR(50) DEFAULT NULL, INDEX IDX_1959D583FF631228 (etablissement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etablissement (id INT AUTO_INCREMENT NOT NULL, nom_etablissement VARCHAR(50) NOT NULL, code_rne VARCHAR(50) DEFAULT NULL, secteur_metz TINYINT(1) NOT NULL, chef_etablissement VARCHAR(50) DEFAULT NULL, adjoint VARCHAR(50) DEFAULT NULL, referent_es VARCHAR(50) DEFAULT NULL, tel_referent INT DEFAULT NULL, adresse VARCHAR(50) DEFAULT NULL, code_postal INT DEFAULT NULL, tel_standard INT DEFAULT NULL, tel_vie_scolaire INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE local (id INT AUTO_INCREMENT NOT NULL, etablissement_id INT DEFAULT NULL, libelle VARCHAR(50) NOT NULL, capacite INT DEFAULT NULL, utilisation VARCHAR(50) DEFAULT NULL, specialise TINYINT(1) DEFAULT NULL, observations VARCHAR(255) DEFAULT NULL, INDEX IDX_8BD688E8FF631228 (etablissement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cpe_etablissement ADD CONSTRAINT FK_1959D583FF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissement (id)');
        $this->addSql('ALTER TABLE local ADD CONSTRAINT FK_8BD688E8FF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissement (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cpe_etablissement DROP FOREIGN KEY FK_1959D583FF631228');
        $this->addSql('ALTER TABLE local DROP FOREIGN KEY FK_8BD688E8FF631228');
        $this->addSql('DROP TABLE cpe_etablissement');
        $this->addSql('DROP TABLE etablissement');
        $this->addSql('DROP TABLE local');
    }
}
