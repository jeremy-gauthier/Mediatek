<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200609074535 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE movie_category_movies (movie_category_id INT NOT NULL, movies_id INT NOT NULL, INDEX IDX_FC60E9253DC01115 (movie_category_id), INDEX IDX_FC60E92553F590A4 (movies_id), PRIMARY KEY(movie_category_id, movies_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE movie_category_movies ADD CONSTRAINT FK_FC60E9253DC01115 FOREIGN KEY (movie_category_id) REFERENCES movie_category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie_category_movies ADD CONSTRAINT FK_FC60E92553F590A4 FOREIGN KEY (movies_id) REFERENCES movies (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE animation CHANGE streaming streaming VARCHAR(255) DEFAULT NULL, CHANGE download download VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE movie_category CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE movies CHANGE streaming streaming VARCHAR(255) DEFAULT NULL, CHANGE download download VARCHAR(255) DEFAULT NULL, CHANGE picture picture VARCHAR(150) DEFAULT NULL');
        $this->addSql('ALTER TABLE series CHANGE streaming streaming VARCHAR(255) DEFAULT NULL, CHANGE download download VARCHAR(255) DEFAULT NULL, CHANGE saisons saisons INT DEFAULT NULL, CHANGE picture picture VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE movie_category_movies');
        $this->addSql('ALTER TABLE animation CHANGE streaming streaming VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE download download VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE movie_category CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE movies CHANGE streaming streaming VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE download download VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE picture picture VARCHAR(150) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE series CHANGE streaming streaming VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE download download VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE saisons saisons INT DEFAULT NULL, CHANGE picture picture VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
