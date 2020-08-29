<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200828135857 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bus (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plane (id INT NOT NULL, name VARCHAR(255) NOT NULL, gate VARCHAR(3) NOT NULL, baggage_drop INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE step (id INT AUTO_INCREMENT NOT NULL, transport_id INT NOT NULL, departure_id INT NOT NULL, arrival_id INT NOT NULL, INDEX IDX_43B9FE3C9909C13F (transport_id), INDEX IDX_43B9FE3C7704ED06 (departure_id), INDEX IDX_43B9FE3C62789708 (arrival_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE train (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transport (id INT AUTO_INCREMENT NOT NULL, seat VARCHAR(5) DEFAULT NULL, discr VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trip (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bus ADD CONSTRAINT FK_2F566B69BF396750 FOREIGN KEY (id) REFERENCES transport (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plane ADD CONSTRAINT FK_C1B32D80BF396750 FOREIGN KEY (id) REFERENCES transport (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE step ADD CONSTRAINT FK_43B9FE3C9909C13F FOREIGN KEY (transport_id) REFERENCES transport (id)');
        $this->addSql('ALTER TABLE step ADD CONSTRAINT FK_43B9FE3C7704ED06 FOREIGN KEY (departure_id) REFERENCES place (id)');
        $this->addSql('ALTER TABLE step ADD CONSTRAINT FK_43B9FE3C62789708 FOREIGN KEY (arrival_id) REFERENCES place (id)');
        $this->addSql('ALTER TABLE train ADD CONSTRAINT FK_5C66E4A3BF396750 FOREIGN KEY (id) REFERENCES transport (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE step DROP FOREIGN KEY FK_43B9FE3C7704ED06');
        $this->addSql('ALTER TABLE step DROP FOREIGN KEY FK_43B9FE3C62789708');
        $this->addSql('ALTER TABLE bus DROP FOREIGN KEY FK_2F566B69BF396750');
        $this->addSql('ALTER TABLE plane DROP FOREIGN KEY FK_C1B32D80BF396750');
        $this->addSql('ALTER TABLE step DROP FOREIGN KEY FK_43B9FE3C9909C13F');
        $this->addSql('ALTER TABLE train DROP FOREIGN KEY FK_5C66E4A3BF396750');
        $this->addSql('DROP TABLE bus');
        $this->addSql('DROP TABLE place');
        $this->addSql('DROP TABLE plane');
        $this->addSql('DROP TABLE step');
        $this->addSql('DROP TABLE train');
        $this->addSql('DROP TABLE transport');
        $this->addSql('DROP TABLE trip');
    }
}
