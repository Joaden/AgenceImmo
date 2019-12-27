<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191227155414 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user DROP INDEX FK_8D93D64952D06999, ADD UNIQUE INDEX UNIQ_8D93D64952D06999 (user_address_id)');
        $this->addSql('ALTER TABLE user CHANGE user_infos_id user_infos_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649B4C7A8CA FOREIGN KEY (user_infos_id) REFERENCES user_infos (id)');
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

        $this->addSql('ALTER TABLE user DROP INDEX UNIQ_8D93D64952D06999, ADD INDEX FK_8D93D64952D06999 (user_address_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649B4C7A8CA');
        $this->addSql('DROP INDEX UNIQ_8D93D649B4C7A8CA ON user');
        $this->addSql('ALTER TABLE user CHANGE user_infos_id user_infos_id INT NOT NULL');
        $this->addSql('ALTER TABLE users_address DROP FOREIGN KEY FK_FD4E1B4BF92F3E70');
        $this->addSql('ALTER TABLE users_address DROP FOREIGN KEY FK_FD4E1B4B98260155');
        $this->addSql('DROP INDEX IDX_FD4E1B4BF92F3E70 ON users_address');
        $this->addSql('DROP INDEX IDX_FD4E1B4B98260155 ON users_address');
        $this->addSql('ALTER TABLE users_address CHANGE firstname firstname VARCHAR(30) NOT NULL COLLATE latin1_swedish_ci, CHANGE lastname lastname VARCHAR(30) NOT NULL COLLATE latin1_swedish_ci, CHANGE street street VARCHAR(255) NOT NULL COLLATE latin1_swedish_ci, CHANGE cp cp INT NOT NULL, CHANGE city city VARCHAR(25) NOT NULL COLLATE latin1_swedish_ci, CHANGE departement_id departement_id INT DEFAULT NULL');
    }
}
