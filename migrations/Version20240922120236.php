<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240922120236 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE medias (id INT AUTO_INCREMENT NOT NULL, sortie_id INT NOT NULL, path VARCHAR(511) NOT NULL, INDEX IDX_12D2AF81CC72D953 (sortie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sorties (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, date_sortie DATE NOT NULL, INDEX IDX_488163E8C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE types_sorties (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, tentatives INT NOT NULL, `lock` TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_sorties (users_id INT NOT NULL, sorties_id INT NOT NULL, INDEX IDX_B881172267B3B43D (users_id), INDEX IDX_B881172215DFCFB2 (sorties_id), PRIMARY KEY(users_id, sorties_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE medias ADD CONSTRAINT FK_12D2AF81CC72D953 FOREIGN KEY (sortie_id) REFERENCES sorties (id)');
        $this->addSql('ALTER TABLE sorties ADD CONSTRAINT FK_488163E8C54C8C93 FOREIGN KEY (type_id) REFERENCES types_sorties (id)');
        $this->addSql('ALTER TABLE users_sorties ADD CONSTRAINT FK_B881172267B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_sorties ADD CONSTRAINT FK_B881172215DFCFB2 FOREIGN KEY (sorties_id) REFERENCES sorties (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE medias DROP FOREIGN KEY FK_12D2AF81CC72D953');
        $this->addSql('ALTER TABLE sorties DROP FOREIGN KEY FK_488163E8C54C8C93');
        $this->addSql('ALTER TABLE users_sorties DROP FOREIGN KEY FK_B881172267B3B43D');
        $this->addSql('ALTER TABLE users_sorties DROP FOREIGN KEY FK_B881172215DFCFB2');
        $this->addSql('DROP TABLE medias');
        $this->addSql('DROP TABLE sorties');
        $this->addSql('DROP TABLE types_sorties');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE users_sorties');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
