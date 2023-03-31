<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230311203952 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alerte ADD utilisateur_id INT NOT NULL');
        $this->addSql('ALTER TABLE alerte ADD CONSTRAINT FK_3AE753AFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_3AE753AFB88E14F ON alerte (utilisateur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alerte DROP FOREIGN KEY FK_3AE753AFB88E14F');
        $this->addSql('DROP INDEX IDX_3AE753AFB88E14F ON alerte');
        $this->addSql('ALTER TABLE alerte DROP utilisateur_id');
    }
}
