<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210527155252 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, projects_screenshots_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, completion_period VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, visibility TINYINT(1) DEFAULT NULL, thumbnail VARCHAR(255) DEFAULT NULL, github_link VARCHAR(255) DEFAULT NULL, INDEX IDX_2FB3D0EE65B81531 (projects_screenshots_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projects_screenshots (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, alt_text LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projects_tags (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projects_tags_tags (projects_tags_id INT NOT NULL, tags_id INT NOT NULL, INDEX IDX_B9A7FF49A0B854A5 (projects_tags_id), INDEX IDX_B9A7FF498D7B4FB4 (tags_id), PRIMARY KEY(projects_tags_id, tags_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projects_tags_project (projects_tags_id INT NOT NULL, project_id INT NOT NULL, INDEX IDX_605427A5A0B854A5 (projects_tags_id), INDEX IDX_605427A5166D1F9C (project_id), PRIMARY KEY(projects_tags_id, project_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tags (id INT AUTO_INCREMENT NOT NULL, tagname VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE65B81531 FOREIGN KEY (projects_screenshots_id) REFERENCES projects_screenshots (id)');
        $this->addSql('ALTER TABLE projects_tags_tags ADD CONSTRAINT FK_B9A7FF49A0B854A5 FOREIGN KEY (projects_tags_id) REFERENCES projects_tags (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projects_tags_tags ADD CONSTRAINT FK_B9A7FF498D7B4FB4 FOREIGN KEY (tags_id) REFERENCES tags (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projects_tags_project ADD CONSTRAINT FK_605427A5A0B854A5 FOREIGN KEY (projects_tags_id) REFERENCES projects_tags (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projects_tags_project ADD CONSTRAINT FK_605427A5166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projects_tags_project DROP FOREIGN KEY FK_605427A5166D1F9C');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE65B81531');
        $this->addSql('ALTER TABLE projects_tags_tags DROP FOREIGN KEY FK_B9A7FF49A0B854A5');
        $this->addSql('ALTER TABLE projects_tags_project DROP FOREIGN KEY FK_605427A5A0B854A5');
        $this->addSql('ALTER TABLE projects_tags_tags DROP FOREIGN KEY FK_B9A7FF498D7B4FB4');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE projects_screenshots');
        $this->addSql('DROP TABLE projects_tags');
        $this->addSql('DROP TABLE projects_tags_tags');
        $this->addSql('DROP TABLE projects_tags_project');
        $this->addSql('DROP TABLE tags');
        $this->addSql('DROP TABLE user');
    }
}
