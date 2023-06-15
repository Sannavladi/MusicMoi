<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230612212816 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, image_name_category VARCHAR(255) DEFAULT NULL, updated_at_category DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug_category VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE music (id INT AUTO_INCREMENT NOT NULL, title_music VARCHAR(255) NOT NULL, created_at_music DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', length TIME NOT NULL, description_music VARCHAR(255) DEFAULT NULL, details LONGTEXT DEFAULT NULL, producers VARCHAR(255) DEFAULT NULL, writers_composers VARCHAR(255) DEFAULT NULL, studios VARCHAR(255) DEFAULT NULL, likes VARCHAR(255) DEFAULT NULL, image_name_music VARCHAR(255) DEFAULT NULL, updated_at_music DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', audio_name_music VARCHAR(255) NOT NULL, slug_music VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE music_category (music_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_C15F45E7399BBB13 (music_id), INDEX IDX_C15F45E712469DE2 (category_id), PRIMARY KEY(music_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlist (id INT AUTO_INCREMENT NOT NULL, title_playlist VARCHAR(255) NOT NULL, description_playlist VARCHAR(255) DEFAULT NULL, image_name_playlist VARCHAR(255) DEFAULT NULL, created_at_playlist DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug_playlist VARCHAR(255) DEFAULT NULL, update_at_playlist DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE music_category ADD CONSTRAINT FK_C15F45E7399BBB13 FOREIGN KEY (music_id) REFERENCES music (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE music_category ADD CONSTRAINT FK_C15F45E712469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE music_category DROP FOREIGN KEY FK_C15F45E7399BBB13');
        $this->addSql('ALTER TABLE music_category DROP FOREIGN KEY FK_C15F45E712469DE2');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE music');
        $this->addSql('DROP TABLE music_category');
        $this->addSql('DROP TABLE playlist');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
