<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230311232228 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE incident ADD incident_id INT NOT NULL');
        $this->addSql('ALTER TABLE incident ADD CONSTRAINT FK_3D03A11A59E53FB9 FOREIGN KEY (incident_id) REFERENCES vulnerabilite (id)');
        $this->addSql('CREATE INDEX IDX_3D03A11A59E53FB9 ON incident (incident_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE incident DROP FOREIGN KEY FK_3D03A11A59E53FB9');
        $this->addSql('DROP INDEX IDX_3D03A11A59E53FB9 ON incident');
        $this->addSql('ALTER TABLE incident DROP incident_id');
    }
}
