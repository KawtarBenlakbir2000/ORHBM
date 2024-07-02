<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240521132856 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE incident DROP FOREIGN KEY FK_3D03A11A9D32F035');
        $this->addSql('DROP INDEX IDX_3D03A11A9D32F035 ON incident');
        $this->addSql('ALTER TABLE incident CHANGE action_id onglet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE incident ADD CONSTRAINT FK_3D03A11ABD1A86CC FOREIGN KEY (onglet_id) REFERENCES onglet (id)');
        $this->addSql('CREATE INDEX IDX_3D03A11ABD1A86CC ON incident (onglet_id)');
        $this->addSql('ALTER TABLE onglet RENAME INDEX module_id TO IDX_C6BC0239AFC2B591');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE incident DROP FOREIGN KEY FK_3D03A11ABD1A86CC');
        $this->addSql('DROP INDEX IDX_3D03A11ABD1A86CC ON incident');
        $this->addSql('ALTER TABLE incident CHANGE onglet_id action_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE incident ADD CONSTRAINT FK_3D03A11A9D32F035 FOREIGN KEY (action_id) REFERENCES action (id)');
        $this->addSql('CREATE INDEX IDX_3D03A11A9D32F035 ON incident (action_id)');
        $this->addSql('ALTER TABLE onglet RENAME INDEX idx_c6bc0239afc2b591 TO module_id');
    }
}
