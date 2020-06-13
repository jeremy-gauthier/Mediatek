<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200611090501 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE episodes (id INT AUTO_INCREMENT NOT NULL, number INT NOT NULL, streaming VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE episodes_saison (episodes_id INT NOT NULL, saison_id INT NOT NULL, INDEX IDX_1D33B16F319135AF (episodes_id), INDEX IDX_1D33B16FF965414C (saison_id), PRIMARY KEY(episodes_id, saison_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE episodes_saison ADD CONSTRAINT FK_1D33B16F319135AF FOREIGN KEY (episodes_id) REFERENCES episodes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE episodes_saison ADD CONSTRAINT FK_1D33B16FF965414C FOREIGN KEY (saison_id) REFERENCES saison (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE animation CHANGE streaming streaming VARCHAR(255) DEFAULT NULL, CHANGE download download VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE anime_category CHANGE picture picture VARCHAR(150) DEFAULT NULL');
        $this->addSql('ALTER TABLE mangas CHANGE streaming streaming VARCHAR(255) DEFAULT NULL, CHANGE episodes episodes INT DEFAULT NULL, CHANGE picture picture VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE movie_category CHANGE picture picture VARCHAR(150) DEFAULT NULL');
        $this->addSql('ALTER TABLE movies CHANGE streaming streaming VARCHAR(255) DEFAULT NULL, CHANGE download download VARCHAR(255) DEFAULT NULL, CHANGE picture picture VARCHAR(150) DEFAULT NULL');
        $this->addSql('ALTER TABLE saison CHANGE serie_id serie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE series CHANGE picture picture VARCHAR(255) DEFAULT NULL, CHANGE nb_saisons nb_saisons VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE episodes_saison DROP FOREIGN KEY FK_1D33B16F319135AF');
        $this->addSql('DROP TABLE episodes');
        $this->addSql('DROP TABLE episodes_saison');
        $this->addSql('ALTER TABLE animation CHANGE streaming streaming VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE download download VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE anime_category CHANGE picture picture VARCHAR(150) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE mangas CHANGE streaming streaming VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE episodes episodes INT DEFAULT NULL, CHANGE picture picture VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE movie_category CHANGE picture picture VARCHAR(150) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE movies CHANGE streaming streaming VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE download download VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE picture picture VARCHAR(150) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE saison CHANGE serie_id serie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE series CHANGE nb_saisons nb_saisons VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE picture picture VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
