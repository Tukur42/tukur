<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230311205024 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vulnerabilite ADD utilisateur_id INT NOT NULL');
        $this->addSql('ALTER TABLE vulnerabilite ADD CONSTRAINT FK_784F1C08FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_784F1C08FB88E14F ON vulnerabilite (utilisateur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vulnerabilite DROP FOREIGN KEY FK_784F1C08FB88E14F');
        $this->addSql('DROP INDEX IDX_784F1C08FB88E14F ON vulnerabilite');
        $this->addSql('ALTER TABLE vulnerabilite DROP utilisateur_id');
    }
}
