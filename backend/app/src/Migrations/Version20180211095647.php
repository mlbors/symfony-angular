<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180211095647 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE items_taxonomies (item_id INT NOT NULL, taxonomy_id INT NOT NULL, INDEX IDX_BD33BECE126F525E (item_id), INDEX IDX_BD33BECE9557E6F6 (taxonomy_id), PRIMARY KEY(item_id, taxonomy_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taxonomy (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE items_taxonomies ADD CONSTRAINT FK_BD33BECE126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE items_taxonomies ADD CONSTRAINT FK_BD33BECE9557E6F6 FOREIGN KEY (taxonomy_id) REFERENCES taxonomy (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE items_taxonomies DROP FOREIGN KEY FK_BD33BECE9557E6F6');
        $this->addSql('DROP TABLE items_taxonomies');
        $this->addSql('DROP TABLE taxonomy');
    }
}
