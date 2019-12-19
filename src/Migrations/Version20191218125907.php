<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191218125907 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE eleve (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) DEFAULT NULL, sexe VARCHAR(50) DEFAULT NULL, date_naiss DATE DEFAULT NULL, etab_origine VARCHAR(50) DEFAULT NULL, class_origine VARCHAR(50) DEFAULT NULL, entree_ir DATE DEFAULT NULL, sortie_ir DATE DEFAULT NULL, motif_sortie VARCHAR(50) DEFAULT NULL, tel_portable INT DEFAULT NULL, email VARCHAR(50) DEFAULT NULL, chambre VARCHAR(50) DEFAULT NULL, tel_standart INT DEFAULT NULL, class_actuelle VARCHAR(50) DEFAULT NULL, niveau VARCHAR(50) DEFAULT NULL, enseignement VARCHAR(50) DEFAULT NULL, specialite VARCHAR(50) DEFAULT NULL, tel_res_es INT DEFAULT NULL, etage VARCHAR(50) DEFAULT NULL, suivie_scolaire VARCHAR(50) DEFAULT NULL, particularite VARCHAR(50) DEFAULT NULL, rlprioritaire VARCHAR(50) NOT NULL, lien_r1 VARCHAR(50) DEFAULT NULL, adresse_r1 VARCHAR(50) DEFAULT NULL, code_post_r1 VARCHAR(50) DEFAULT NULL, ville_r1 VARCHAR(50) DEFAULT NULL, tel_fixe_r1 INT DEFAULT NULL, tel_port_r1 INT DEFAULT NULL, tel_travaille_r1 INT DEFAULT NULL, email_r1 VARCHAR(50) DEFAULT NULL, resp_legal2 VARCHAR(50) DEFAULT NULL, lien_rl2 VARCHAR(50) DEFAULT NULL, adresse_r2 VARCHAR(50) DEFAULT NULL, code_post_r2 VARCHAR(50) DEFAULT NULL, ville_r2 VARCHAR(50) DEFAULT NULL, tel_fix_r2 INT NOT NULL, tel_port_r2 INT DEFAULT NULL, tel_travaille_r2 INT DEFAULT NULL, email_r2 VARCHAR(50) DEFAULT NULL, autre_contact VARCHAR(50) DEFAULT NULL, lien_ac VARCHAR(50) DEFAULT NULL, adresse_ac VARCHAR(50) DEFAULT NULL, code_post_ac VARCHAR(50) DEFAULT NULL, ville_ac VARCHAR(50) DEFAULT NULL, tel_fixe_ac INT DEFAULT NULL, tel_port_ac INT DEFAULT NULL, tel_travaille_ac INT DEFAULT NULL, email_ac VARCHAR(50) DEFAULT NULL, educatif_nom VARCHAR(50) DEFAULT NULL, educatif_prenom VARCHAR(50) DEFAULT NULL, educatif_organisme VARCHAR(50) DEFAULT NULL, educatif_tel INT DEFAULT NULL, educatif_email VARCHAR(50) DEFAULT NULL, pai VARCHAR(50) DEFAULT NULL, medicament VARCHAR(50) DEFAULT NULL, sante_nom VARCHAR(50) DEFAULT NULL, sante_prenom VARCHAR(50) DEFAULT NULL, sante_organisme VARCHAR(50) DEFAULT NULL, sante_telephone INT DEFAULT NULL, sante_email VARCHAR(50) DEFAULT NULL, sociale_nom VARCHAR(50) DEFAULT NULL, sociale_prenom VARCHAR(50) DEFAULT NULL, sociale_organisme VARCHAR(50) DEFAULT NULL, sociale_tel INT DEFAULT NULL, sociale_email VARCHAR(50) DEFAULT NULL, xpass VARCHAR(50) DEFAULT NULL, categorie_eco VARCHAR(50) DEFAULT NULL, qffm VARCHAR(50) DEFAULT NULL, pars_bses VARCHAR(50) DEFAULT NULL, pec_par VARCHAR(50) DEFAULT NULL, aide_supp VARCHAR(50) DEFAULT NULL, montant INT DEFAULT NULL, ligne_bus VARCHAR(50) DEFAULT NULL, depart_ir DATE DEFAULT NULL, notes VARCHAR(50) DEFAULT NULL, engagement_initial VARCHAR(50) DEFAULT NULL, charte_vie_collective VARCHAR(50) DEFAULT NULL, fiche_infermerie VARCHAR(50) DEFAULT NULL, charte_cdi VARCHAR(50) DEFAULT NULL, charte_info VARCHAR(50) DEFAULT NULL, avis_imposition VARCHAR(50) DEFAULT NULL, retour_seul_domicile VARCHAR(50) DEFAULT NULL, droit_image VARCHAR(50) DEFAULT NULL, presence_dimanche_soir VARCHAR(50) DEFAULT NULL, autonomie_chambre VARCHAR(50) DEFAULT NULL, sortie_educative VARCHAR(50) DEFAULT NULL, dossier_rentre VARCHAR(50) DEFAULT NULL, presence_vendredi_soir VARCHAR(50) DEFAULT NULL, presence_coupon_image VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE eleve');
    }
}
