<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200103201512 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE file (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, comment_id INT DEFAULT NULL, project_id INT DEFAULT NULL, filename VARCHAR(255) NOT NULL, date_upload DATETIME NOT NULL, INDEX IDX_8C9F3610A76ED395 (user_id), INDEX IDX_8C9F3610F8697D13 (comment_id), INDEX IDX_8C9F3610166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, birthdate DATETIME NOT NULL, email VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, INDEX IDX_8D93D649166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, zip_code VARCHAR(255) NOT NULL, INDEX IDX_4C62E63819EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, creation_date DATETIME NOT NULL, begin_date DATETIME NOT NULL, end_date DATETIME NOT NULL, state VARCHAR(1) NOT NULL, lat VARCHAR(255) NOT NULL, lng VARCHAR(255) NOT NULL, description VARCHAR(1000) NOT NULL, project_code VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(1000) NOT NULL, date_creation DATETIME NOT NULL, INDEX IDX_9474526CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, projects_id INT DEFAULT NULL, company_name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, zip_code VARCHAR(255) NOT NULL, INDEX IDX_C74404551EDE0F55 (projects_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE file ADD CONSTRAINT FK_8C9F3610A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE file ADD CONSTRAINT FK_8C9F3610F8697D13 FOREIGN KEY (comment_id) REFERENCES comment (id)');
        $this->addSql('ALTER TABLE file ADD CONSTRAINT FK_8C9F3610166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E63819EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C74404551EDE0F55 FOREIGN KEY (projects_id) REFERENCES project (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE file DROP FOREIGN KEY FK_8C9F3610A76ED395');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CA76ED395');
        $this->addSql('ALTER TABLE file DROP FOREIGN KEY FK_8C9F3610166D1F9C');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649166D1F9C');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C74404551EDE0F55');
        $this->addSql('ALTER TABLE file DROP FOREIGN KEY FK_8C9F3610F8697D13');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E63819EB6921');
        $this->addSql('DROP TABLE file');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE client');
    }
}
