<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191205072541 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE voiture_personnel ADD personnel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE voiture_personnel ADD CONSTRAINT FK_3CC8DC9A1C109075 FOREIGN KEY (personnel_id) REFERENCES personnel (id)');
        $this->addSql('CREATE INDEX IDX_3CC8DC9A1C109075 ON voiture_personnel (personnel_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE voiture_personnel DROP FOREIGN KEY FK_3CC8DC9A1C109075');
        $this->addSql('DROP INDEX IDX_3CC8DC9A1C109075 ON voiture_personnel');
        $this->addSql('ALTER TABLE voiture_personnel DROP personnel_id');
    }
}
