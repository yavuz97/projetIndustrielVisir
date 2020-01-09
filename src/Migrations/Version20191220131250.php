<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191220131250 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE suivie_activite (id INT AUTO_INCREMENT NOT NULL, eleve_id INT NOT NULL, sequence_id INT NOT NULL, absent VARCHAR(255) DEFAULT NULL, travail_afaire VARCHAR(255) DEFAULT NULL, travail_effectue VARCHAR(255) DEFAULT NULL, travail_aprevoir VARCHAR(255) DEFAULT NULL, INDEX IDX_80C4F9EAA6CC7B2 (eleve_id), INDEX IDX_80C4F9EA98FB19AE (sequence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE suivie_activite ADD CONSTRAINT FK_80C4F9EAA6CC7B2 FOREIGN KEY (eleve_id) REFERENCES eleve (id)');
        $this->addSql('ALTER TABLE suivie_activite ADD CONSTRAINT FK_80C4F9EA98FB19AE FOREIGN KEY (sequence_id) REFERENCES sequence (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE suivie_activite');
    }
}
