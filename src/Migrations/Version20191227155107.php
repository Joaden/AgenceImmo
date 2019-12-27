<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191227155107 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, code VARCHAR(255) DEFAULT NULL, nameCode VARCHAR(255) DEFAULT NULL, symbol VARCHAR(2) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE departments (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, name_num VARCHAR(255) NOT NULL, region_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE regions (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_infos (id INT AUTO_INCREMENT NOT NULL, date_inscription DATETIME NOT NULL, phone VARCHAR(255) DEFAULT NULL, ip VARCHAR(20) DEFAULT NULL, connexion_time DATETIME NOT NULL, is_valid INT DEFAULT NULL, birth DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE infos_user');
        $this->addSql('ALTER TABLE user ADD user_address_id INT DEFAULT NULL, ADD user_infos_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64952D06999 FOREIGN KEY (user_address_id) REFERENCES users_address (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649B4C7A8CA FOREIGN KEY (user_infos_id) REFERENCES user_infos (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64952D06999 ON user (user_address_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649B4C7A8CA ON user (user_infos_id)');
        $this->addSql('ALTER TABLE users_address CHANGE firstname firstname VARCHAR(255) DEFAULT NULL, CHANGE lastname lastname VARCHAR(255) DEFAULT NULL, CHANGE street street VARCHAR(255) DEFAULT NULL, CHANGE cp cp VARCHAR(255) DEFAULT NULL, CHANGE city city VARCHAR(255) DEFAULT NULL, CHANGE departement_id departement_id VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE users_address ADD CONSTRAINT FK_FD4E1B4BF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE users_address ADD CONSTRAINT FK_FD4E1B4B98260155 FOREIGN KEY (region_id) REFERENCES regions (id)');
        $this->addSql('CREATE INDEX IDX_FD4E1B4BF92F3E70 ON users_address (country_id)');
        $this->addSql('CREATE INDEX IDX_FD4E1B4B98260155 ON users_address (region_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE users_address DROP FOREIGN KEY FK_FD4E1B4BF92F3E70');
        $this->addSql('ALTER TABLE users_address DROP FOREIGN KEY FK_FD4E1B4B98260155');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649B4C7A8CA');
        $this->addSql('CREATE TABLE infos_user (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, UNIQUE INDEX UNIQ_AA81A6EAA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE infos_user ADD CONSTRAINT FK_AA81A6EAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE departments');
        $this->addSql('DROP TABLE regions');
        $this->addSql('DROP TABLE user_infos');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64952D06999');
        $this->addSql('DROP INDEX UNIQ_8D93D64952D06999 ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D649B4C7A8CA ON user');
        $this->addSql('ALTER TABLE user DROP user_address_id, DROP user_infos_id');
        $this->addSql('DROP INDEX IDX_FD4E1B4BF92F3E70 ON users_address');
        $this->addSql('DROP INDEX IDX_FD4E1B4B98260155 ON users_address');
        $this->addSql('ALTER TABLE users_address CHANGE firstname firstname VARCHAR(30) NOT NULL COLLATE latin1_swedish_ci, CHANGE lastname lastname VARCHAR(30) NOT NULL COLLATE latin1_swedish_ci, CHANGE street street VARCHAR(255) NOT NULL COLLATE latin1_swedish_ci, CHANGE cp cp INT NOT NULL, CHANGE city city VARCHAR(25) NOT NULL COLLATE latin1_swedish_ci, CHANGE departement_id departement_id INT DEFAULT NULL');
    }
}
