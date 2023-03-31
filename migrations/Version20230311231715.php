<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230311231715 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sujet ADD incident_id INT NOT NULL');
        $this->addSql('ALTER TABLE sujet ADD CONSTRAINT FK_2E13599D59E53FB9 FOREIGN KEY (incident_id) REFERENCES incident (id)');
        $this->addSql('CREATE INDEX IDX_2E13599D59E53FB9 ON sujet (incident_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sujet DROP FOREIGN KEY FK_2E13599D59E53FB9');
        $this->addSql('DROP INDEX IDX_2E13599D59E53FB9 ON sujet');
        $this->addSql('ALTER TABLE sujet DROP incident_id');
    }
}
