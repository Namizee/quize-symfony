<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240221144425 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE "user" ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD question INT NOT NULL');
        $this->addSql('ALTER TABLE "user" ADD response TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD is_right BOOLEAN DEFAULT false NOT NULL');
        $this->addSql('COMMENT ON COLUMN "user".response IS \'(DC2Type:simple_array)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "user" DROP user_id');
        $this->addSql('ALTER TABLE "user" DROP question');
        $this->addSql('ALTER TABLE "user" DROP response');
        $this->addSql('ALTER TABLE "user" DROP is_right');
    }
}
