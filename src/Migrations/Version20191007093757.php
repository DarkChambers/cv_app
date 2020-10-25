<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191007093757 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE cv (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description CLOB NOT NULL)');
        $this->addSql('CREATE TABLE default_config (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, default_cv_id INTEGER NOT NULL, active BOOLEAN NOT NULL)');
        $this->addSql('CREATE INDEX IDX_33DB242F26C24DEC ON default_config (default_cv_id)');
        $this->addSql('CREATE TABLE experience (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, cv_id INTEGER NOT NULL, position VARCHAR(255) NOT NULL, content CLOB NOT NULL, entreprise VARCHAR(255) NOT NULL, period VARCHAR(255) NOT NULL, display_order SMALLINT NOT NULL)');
        $this->addSql('CREATE INDEX IDX_590C103CFE419E2 ON experience (cv_id)');
        $this->addSql('CREATE TABLE formation (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, cv_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL, content CLOB NOT NULL, school VARCHAR(255) NOT NULL, degree VARCHAR(255) NOT NULL, period VARCHAR(255) NOT NULL, display_order SMALLINT NOT NULL)');
        $this->addSql('CREATE INDEX IDX_404021BFCFE419E2 ON formation (cv_id)');
        $this->addSql('CREATE TABLE profil (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, cv_id INTEGER NOT NULL, first_name VARCHAR(255) NOT NULL, age SMALLINT NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, adress CLOB NOT NULL, language CLOB NOT NULL, about CLOB NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E6D6B297CFE419E2 ON profil (cv_id)');
        $this->addSql('CREATE TABLE reference (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, cv_id INTEGER NOT NULL, full_name VARCHAR(255) NOT NULL, entreprise VARCHAR(255) NOT NULL, content CLOB NOT NULL, image VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL)');
        $this->addSql('CREATE INDEX IDX_AEA34913CFE419E2 ON reference (cv_id)');
        $this->addSql('CREATE TABLE skill (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, cv_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, level SMALLINT NOT NULL, display_order SMALLINT NOT NULL)');
        $this->addSql('CREATE INDEX IDX_5E3DE477CFE419E2 ON skill (cv_id)');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(64) NOT NULL, is_active BOOLEAN NOT NULL, roles CLOB NOT NULL --(DC2Type:array)
        )');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE cv');
        $this->addSql('DROP TABLE default_config');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE profil');
        $this->addSql('DROP TABLE reference');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE user');
    }
}
