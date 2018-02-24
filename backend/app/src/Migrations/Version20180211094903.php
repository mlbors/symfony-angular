<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180211094903 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE items_taxonomies (item_id INT NOT NULL, taxonomy_id INT NOT NULL, INDEX IDX_BD33BECE126F525E (item_id), INDEX IDX_BD33BECE9557E6F6 (taxonomy_id), PRIMARY KEY(item_id, taxonomy_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taxonomy (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taxonomy_item (taxonomy_id INT NOT NULL, item_id INT NOT NULL, INDEX IDX_7DF9A7A99557E6F6 (taxonomy_id), INDEX IDX_7DF9A7A9126F525E (item_id), PRIMARY KEY(taxonomy_id, item_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE items_taxonomies ADD CONSTRAINT FK_BD33BECE126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE items_taxonomies ADD CONSTRAINT FK_BD33BECE9557E6F6 FOREIGN KEY (taxonomy_id) REFERENCES taxonomy (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE taxonomy_item ADD CONSTRAINT FK_7DF9A7A99557E6F6 FOREIGN KEY (taxonomy_id) REFERENCES taxonomy (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE taxonomy_item ADD CONSTRAINT FK_7DF9A7A9126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE items_taxonomies DROP FOREIGN KEY FK_BD33BECE9557E6F6');
        $this->addSql('ALTER TABLE taxonomy_item DROP FOREIGN KEY FK_7DF9A7A99557E6F6');
        $this->addSql('DROP TABLE items_taxonomies');
        $this->addSql('DROP TABLE taxonomy');
        $this->addSql('DROP TABLE taxonomy_item');
    }
}
