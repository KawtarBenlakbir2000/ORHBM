<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240424112356 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE action (id INT AUTO_INCREMENT NOT NULL, onglet_id INT DEFAULT NULL, nom VARCHAR(100) NOT NULL, description VARCHAR(255) DEFAULT NULL, code_source VARCHAR(255) NOT NULL, INDEX IDX_47CC8C92BD1A86CC (onglet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE data (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, type VARCHAR(100) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE incident (id INT AUTO_INCREMENT NOT NULL, action_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, type VARCHAR(50) NOT NULL, identifiant VARCHAR(100) NOT NULL, INDEX IDX_3D03A11A9D32F035 (action_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE module (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE onglet (id INT AUTO_INCREMENT NOT NULL, module_id INT DEFAULT NULL, nom VARCHAR(100) NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_C6BC0239AFC2B591 (module_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE action ADD CONSTRAINT FK_47CC8C92BD1A86CC FOREIGN KEY (onglet_id) REFERENCES onglet (id)');
        $this->addSql('ALTER TABLE incident ADD CONSTRAINT FK_3D03A11A9D32F035 FOREIGN KEY (action_id) REFERENCES action (id)');
        $this->addSql('ALTER TABLE onglet ADD CONSTRAINT FK_C6BC0239AFC2B591 FOREIGN KEY (module_id) REFERENCES module (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE incident DROP FOREIGN KEY FK_3D03A11A9D32F035');
        $this->addSql('ALTER TABLE onglet DROP FOREIGN KEY FK_C6BC0239AFC2B591');
        $this->addSql('ALTER TABLE action DROP FOREIGN KEY FK_47CC8C92BD1A86CC');
        $this->addSql('DROP TABLE action');
        $this->addSql('DROP TABLE data');
        $this->addSql('DROP TABLE incident');
        $this->addSql('DROP TABLE module');
        $this->addSql('DROP TABLE onglet');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
