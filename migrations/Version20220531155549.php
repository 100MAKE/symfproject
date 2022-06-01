<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220531155549 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ac (id INT AUTO_INCREMENT NOT NULL, nomcomplet VARCHAR(100) NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_E98478FBE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE anneescolaire (id INT AUTO_INCREMENT NOT NULL, libelleannee VARCHAR(200) NOT NULL, etatannee VARCHAR(200) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, rp_id INT DEFAULT NULL, libelleclasse VARCHAR(200) NOT NULL, niveau VARCHAR(200) NOT NULL, filiere VARCHAR(200) NOT NULL, INDEX IDX_8F87BF96B70FF80C (rp_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE demande (id INT AUTO_INCREMENT NOT NULL, inscriptions_id INT DEFAULT NULL, rp_id INT DEFAULT NULL, motif LONGTEXT NOT NULL, date DATE NOT NULL, INDEX IDX_2694D7A58E2AD382 (inscriptions_id), INDEX IDX_2694D7A5B70FF80C (rp_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant (id INT AUTO_INCREMENT NOT NULL, nomcomplet VARCHAR(100) NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, adresse VARCHAR(200) NOT NULL, sexe VARCHAR(200) NOT NULL, matricule VARCHAR(200) NOT NULL, UNIQUE INDEX UNIQ_717E22E3E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription (id INT AUTO_INCREMENT NOT NULL, etudiant_id INT DEFAULT NULL, classe_id INT DEFAULT NULL, ac_id INT DEFAULT NULL, date DATE NOT NULL, etat VARCHAR(200) NOT NULL, INDEX IDX_5E90F6D6DDEAB1A3 (etudiant_id), INDEX IDX_5E90F6D68F5EA509 (classe_id), INDEX IDX_5E90F6D6D2E3ED2F (ac_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE module (id INT AUTO_INCREMENT NOT NULL, libellemodule VARCHAR(200) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne (id INT AUTO_INCREMENT NOT NULL, nomcomplet VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professeur (id INT AUTO_INCREMENT NOT NULL, nomcomplet VARCHAR(100) NOT NULL, grade VARCHAR(200) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professeur_classe (professeur_id INT NOT NULL, classe_id INT NOT NULL, INDEX IDX_38ABBDC6BAB22EE9 (professeur_id), INDEX IDX_38ABBDC68F5EA509 (classe_id), PRIMARY KEY(professeur_id, classe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rp (id INT AUTO_INCREMENT NOT NULL, nomcomplet VARCHAR(100) NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_CD578B7E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, nomcomplet VARCHAR(100) NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE classe ADD CONSTRAINT FK_8F87BF96B70FF80C FOREIGN KEY (rp_id) REFERENCES rp (id)');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT FK_2694D7A58E2AD382 FOREIGN KEY (inscriptions_id) REFERENCES inscription (id)');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT FK_2694D7A5B70FF80C FOREIGN KEY (rp_id) REFERENCES rp (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D68F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6D2E3ED2F FOREIGN KEY (ac_id) REFERENCES ac (id)');
        $this->addSql('ALTER TABLE professeur_classe ADD CONSTRAINT FK_38ABBDC6BAB22EE9 FOREIGN KEY (professeur_id) REFERENCES professeur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE professeur_classe ADD CONSTRAINT FK_38ABBDC68F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6D2E3ED2F');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D68F5EA509');
        $this->addSql('ALTER TABLE professeur_classe DROP FOREIGN KEY FK_38ABBDC68F5EA509');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6DDEAB1A3');
        $this->addSql('ALTER TABLE demande DROP FOREIGN KEY FK_2694D7A58E2AD382');
        $this->addSql('ALTER TABLE professeur_classe DROP FOREIGN KEY FK_38ABBDC6BAB22EE9');
        $this->addSql('ALTER TABLE classe DROP FOREIGN KEY FK_8F87BF96B70FF80C');
        $this->addSql('ALTER TABLE demande DROP FOREIGN KEY FK_2694D7A5B70FF80C');
        $this->addSql('DROP TABLE ac');
        $this->addSql('DROP TABLE anneescolaire');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE demande');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE inscription');
        $this->addSql('DROP TABLE module');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE professeur');
        $this->addSql('DROP TABLE professeur_classe');
        $this->addSql('DROP TABLE rp');
        $this->addSql('DROP TABLE `user`');
    }
}
