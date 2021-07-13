<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210713130400 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, userproject_id INT NOT NULL, name VARCHAR(150) NOT NULL, description LONGTEXT NOT NULL, creationdate DATE NOT NULL, deadline DATE NOT NULL, statut TINYINT(1) NOT NULL, INDEX IDX_2FB3D0EE5B113365 (userproject_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE task (id INT AUTO_INCREMENT NOT NULL, taskproject_id INT NOT NULL, name VARCHAR(150) NOT NULL, description LONGTEXT NOT NULL, creationdate DATE NOT NULL, deadline DATE NOT NULL, statut TINYINT(1) NOT NULL, INDEX IDX_527EDB2524DB73D0 (taskproject_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE5B113365 FOREIGN KEY (userproject_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB2524DB73D0 FOREIGN KEY (taskproject_id) REFERENCES project (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB2524DB73D0');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE task');
    }
}
