<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220713144735 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `groups` (id INT AUTO_INCREMENT NOT NULL, tutor_id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_F06D3970208F64F1 (tutor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `lectures` (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, is_active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `lectures_materials` (id INT AUTO_INCREMENT NOT NULL, lecture_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, file_path VARCHAR(255) NOT NULL, INDEX IDX_D19FA7FC35E32FCD (lecture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `lectures_uploads` (id INT AUTO_INCREMENT NOT NULL, lecture_id INT NOT NULL, student_id INT DEFAULT NULL, deadline DATETIME DEFAULT NULL, visible TINYINT(1) NOT NULL, INDEX IDX_EAAC3E6C35E32FCD (lecture_id), INDEX IDX_EAAC3E6CCB944F1A (student_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `students` (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, is_blocked TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_A4698DB2A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student_group (student_id INT NOT NULL, group_id INT NOT NULL, INDEX IDX_E5F73D58CB944F1A (student_id), INDEX IDX_E5F73D58FE54D947 (group_id), PRIMARY KEY(student_id, group_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `tutors` (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_639001EFA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `groups` ADD CONSTRAINT FK_F06D3970208F64F1 FOREIGN KEY (tutor_id) REFERENCES `tutors` (id)');
        $this->addSql('ALTER TABLE `lectures_materials` ADD CONSTRAINT FK_D19FA7FC35E32FCD FOREIGN KEY (lecture_id) REFERENCES `lectures` (id)');
        $this->addSql('ALTER TABLE `lectures_uploads` ADD CONSTRAINT FK_EAAC3E6C35E32FCD FOREIGN KEY (lecture_id) REFERENCES `lectures` (id)');
        $this->addSql('ALTER TABLE `lectures_uploads` ADD CONSTRAINT FK_EAAC3E6CCB944F1A FOREIGN KEY (student_id) REFERENCES `students` (id)');
        $this->addSql('ALTER TABLE `students` ADD CONSTRAINT FK_A4698DB2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE student_group ADD CONSTRAINT FK_E5F73D58CB944F1A FOREIGN KEY (student_id) REFERENCES `students` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student_group ADD CONSTRAINT FK_E5F73D58FE54D947 FOREIGN KEY (group_id) REFERENCES `groups` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE `tutors` ADD CONSTRAINT FK_639001EFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student_group DROP FOREIGN KEY FK_E5F73D58FE54D947');
        $this->addSql('ALTER TABLE `lectures_materials` DROP FOREIGN KEY FK_D19FA7FC35E32FCD');
        $this->addSql('ALTER TABLE `lectures_uploads` DROP FOREIGN KEY FK_EAAC3E6C35E32FCD');
        $this->addSql('ALTER TABLE `lectures_uploads` DROP FOREIGN KEY FK_EAAC3E6CCB944F1A');
        $this->addSql('ALTER TABLE student_group DROP FOREIGN KEY FK_E5F73D58CB944F1A');
        $this->addSql('ALTER TABLE `groups` DROP FOREIGN KEY FK_F06D3970208F64F1');
        $this->addSql('ALTER TABLE `students` DROP FOREIGN KEY FK_A4698DB2A76ED395');
        $this->addSql('ALTER TABLE `tutors` DROP FOREIGN KEY FK_639001EFA76ED395');
        $this->addSql('DROP TABLE `groups`');
        $this->addSql('DROP TABLE `lectures`');
        $this->addSql('DROP TABLE `lectures_materials`');
        $this->addSql('DROP TABLE `lectures_uploads`');
        $this->addSql('DROP TABLE `students`');
        $this->addSql('DROP TABLE student_group');
        $this->addSql('DROP TABLE `tutors`');
        $this->addSql('DROP TABLE user');
    }
}
