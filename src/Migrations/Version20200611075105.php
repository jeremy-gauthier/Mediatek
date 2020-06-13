<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200611075105 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE animation CHANGE streaming streaming VARCHAR(255) DEFAULT NULL, CHANGE download download VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE anime_category CHANGE picture picture VARCHAR(150) DEFAULT NULL');
        $this->addSql('ALTER TABLE mangas CHANGE streaming streaming VARCHAR(255) DEFAULT NULL, CHANGE episodes episodes INT DEFAULT NULL, CHANGE picture picture VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE movie_category CHANGE picture picture VARCHAR(150) DEFAULT NULL');
        $this->addSql('ALTER TABLE movies CHANGE streaming streaming VARCHAR(255) DEFAULT NULL, CHANGE download download VARCHAR(255) DEFAULT NULL, CHANGE picture picture VARCHAR(150) DEFAULT NULL');
        $this->addSql('ALTER TABLE saison CHANGE serie_id serie_id INT DEFAULT NULL, CHANGE number number VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE series CHANGE picture picture VARCHAR(255) DEFAULT NULL, CHANGE nb_saisons nb_saisons VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE animation CHANGE streaming streaming VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE download download VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE anime_category CHANGE picture picture VARCHAR(150) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE mangas CHANGE streaming streaming VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE episodes episodes INT DEFAULT NULL, CHANGE picture picture VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE movie_category CHANGE picture picture VARCHAR(150) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE movies CHANGE streaming streaming VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE download download VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE picture picture VARCHAR(150) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE saison CHANGE serie_id serie_id INT DEFAULT NULL, CHANGE number number INT NOT NULL');
        $this->addSql('ALTER TABLE series CHANGE nb_saisons nb_saisons VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE picture picture VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
