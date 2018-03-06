<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180306204640 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE items_attributes DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE items_attributes ADD item_id INT NOT NULL');
        $this->addSql('ALTER TABLE items_attributes ADD CONSTRAINT FK_AF83A047126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE items_attributes ADD CONSTRAINT FK_AF83A047B6E62EFA FOREIGN KEY (attribute_id) REFERENCES attribute (id)');
        $this->addSql('CREATE INDEX IDX_AF83A047126F525E ON items_attributes (item_id)');
        $this->addSql('CREATE INDEX IDX_AF83A047B6E62EFA ON items_attributes (attribute_id)');
        $this->addSql('ALTER TABLE items_attributes ADD PRIMARY KEY (item_id, attribute_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE items_attributes DROP FOREIGN KEY FK_AF83A047126F525E');
        $this->addSql('ALTER TABLE items_attributes DROP FOREIGN KEY FK_AF83A047B6E62EFA');
        $this->addSql('DROP INDEX IDX_AF83A047126F525E ON items_attributes');
        $this->addSql('DROP INDEX IDX_AF83A047B6E62EFA ON items_attributes');
        $this->addSql('ALTER TABLE items_attributes DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE items_attributes DROP item_id');
        $this->addSql('ALTER TABLE items_attributes ADD PRIMARY KEY (attribute_id)');
    }
}
