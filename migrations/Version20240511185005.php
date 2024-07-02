<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240511185005 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE module DROP FOREIGN KEY FK_C242628AFC2B591');
        $this->addSql('DROP INDEX IDX_C242628AFC2B591 ON module');
        $this->addSql('ALTER TABLE module CHANGE module_id dependent_module_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE module ADD CONSTRAINT FK_C242628DBDDBF90 FOREIGN KEY (dependent_module_id) REFERENCES module (id)');
        $this->addSql('CREATE INDEX IDX_C242628DBDDBF90 ON module (dependent_module_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE module DROP FOREIGN KEY FK_C242628DBDDBF90');
        $this->addSql('DROP INDEX IDX_C242628DBDDBF90 ON module');
        $this->addSql('ALTER TABLE module CHANGE dependent_module_id module_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE module ADD CONSTRAINT FK_C242628AFC2B591 FOREIGN KEY (module_id) REFERENCES module (id)');
        $this->addSql('CREATE INDEX IDX_C242628AFC2B591 ON module (module_id)');
    }
}
