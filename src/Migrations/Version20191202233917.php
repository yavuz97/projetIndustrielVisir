<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191202233917 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE activites_personnel (activites_id INT NOT NULL, personnel_id INT NOT NULL, INDEX IDX_3B56D1A65B8C31B7 (activites_id), INDEX IDX_3B56D1A61C109075 (personnel_id), PRIMARY KEY(activites_id, personnel_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnel (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, etablissement_id INT DEFAULT NULL, fonction VARCHAR(50) DEFAULT NULL, action_ir INT DEFAULT NULL, organisme VARCHAR(50) DEFAULT NULL, responsable VARCHAR(50) DEFAULT NULL, tel INT DEFAULT NULL, num_carte_xpass VARCHAR(50) DEFAULT NULL, niveau_etude VARCHAR(50) DEFAULT NULL, haut_diplome VARCHAR(50) DEFAULT NULL, specialite VARCHAR(50) DEFAULT NULL, formation_en_cours VARCHAR(50) DEFAULT NULL, droit200h VARCHAR(50) DEFAULT NULL, tp INT DEFAULT NULL, date_entree DATE DEFAULT NULL, date_sortie DATE DEFAULT NULL, INDEX IDX_A6BCF3DEA76ED395 (user_id), INDEX IDX_A6BCF3DEFF631228 (etablissement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voiture_personnel (id INT AUTO_INCREMENT NOT NULL, marque VARCHAR(50) DEFAULT NULL, modele VARCHAR(50) DEFAULT NULL, couleur VARCHAR(50) DEFAULT NULL, immarticulation VARCHAR(50) DEFAULT NULL, badge VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activites_personnel ADD CONSTRAINT FK_3B56D1A65B8C31B7 FOREIGN KEY (activites_id) REFERENCES activites (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activites_personnel ADD CONSTRAINT FK_3B56D1A61C109075 FOREIGN KEY (personnel_id) REFERENCES personnel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnel ADD CONSTRAINT FK_A6BCF3DEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE personnel ADD CONSTRAINT FK_A6BCF3DEFF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissement (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE activites_personnel DROP FOREIGN KEY FK_3B56D1A61C109075');
        $this->addSql('DROP TABLE activites_personnel');
        $this->addSql('DROP TABLE personnel');
        $this->addSql('DROP TABLE voiture_personnel');
    }
}
