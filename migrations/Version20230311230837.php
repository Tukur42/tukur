<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230311230837 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alerte ADD incident_id INT NOT NULL');
        $this->addSql('ALTER TABLE alerte ADD CONSTRAINT FK_3AE753A59E53FB9 FOREIGN KEY (incident_id) REFERENCES incident (id)');
        $this->addSql('CREATE INDEX IDX_3AE753A59E53FB9 ON alerte (incident_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alerte DROP FOREIGN KEY FK_3AE753A59E53FB9');
        $this->addSql('DROP INDEX IDX_3AE753A59E53FB9 ON alerte');
        $this->addSql('ALTER TABLE alerte DROP incident_id');
    }
}
