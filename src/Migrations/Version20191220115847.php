<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191220115847 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE eleve ADD etablissement_id INT DEFAULT NULL, ADD personnel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F7FF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissement (id)');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F71C109075 FOREIGN KEY (personnel_id) REFERENCES personnel (id)');
        $this->addSql('CREATE INDEX IDX_ECA105F7FF631228 ON eleve (etablissement_id)');
        $this->addSql('CREATE INDEX IDX_ECA105F71C109075 ON eleve (personnel_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F7FF631228');
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F71C109075');
        $this->addSql('DROP INDEX IDX_ECA105F7FF631228 ON eleve');
        $this->addSql('DROP INDEX IDX_ECA105F71C109075 ON eleve');
        $this->addSql('ALTER TABLE eleve DROP etablissement_id, DROP personnel_id');
    }
}
