<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240506132307 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE dependance (id INT AUTO_INCREMENT NOT NULL, module_source_id INT DEFAULT NULL, module_cible_id INT DEFAULT NULL, INDEX IDX_B43B9E1DCF5D03A9 (module_source_id), INDEX IDX_B43B9E1DCDAE8DF7 (module_cible_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dependance ADD CONSTRAINT FK_B43B9E1DCF5D03A9 FOREIGN KEY (module_source_id) REFERENCES module (id)');
        $this->addSql('ALTER TABLE dependance ADD CONSTRAINT FK_B43B9E1DCDAE8DF7 FOREIGN KEY (module_cible_id) REFERENCES module (id)');
        $this->addSql('ALTER TABLE user CHANGE locale locale VARCHAR(10) NOT NULL, CHANGE is_verified is_verified TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE dependance');
        $this->addSql('ALTER TABLE user CHANGE locale locale VARCHAR(10) DEFAULT NULL, CHANGE is_verified is_verified TINYINT(1) DEFAULT NULL');
    }
}
