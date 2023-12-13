<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231213153434 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE nacionalidad (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('CREATE TABLE persona (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('ALTER TABLE usuario ADD COLUMN is_verified BOOLEAN NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE nacionalidad');
        $this->addSql('DROP TABLE persona');
        $this->addSql('CREATE TEMPORARY TABLE __temp__usuario AS SELECT id, email, roles, password FROM usuario');
        $this->addSql('DROP TABLE usuario');
        $this->addSql('CREATE TABLE usuario (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO usuario (id, email, roles, password) SELECT id, email, roles, password FROM __temp__usuario');
        $this->addSql('DROP TABLE __temp__usuario');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2265B05DE7927C74 ON usuario (email)');
    }
}
