<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230103133015 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pack_products (pack_id UUID NOT NULL, product_id UUID NOT NULL, unit_amount DOUBLE PRECISION NOT NULL, quantity INT NOT NULL, PRIMARY KEY(pack_id, product_id))');
        $this->addSql('CREATE INDEX IDX_9D351E4B1919B217 ON pack_products (pack_id)');
        $this->addSql('CREATE INDEX IDX_9D351E4B4584665A ON pack_products (product_id)');
        $this->addSql('ALTER TABLE pack_products ADD CONSTRAINT FK_9D351E4B1919B217 FOREIGN KEY (pack_id) REFERENCES pack (uuid) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pack_products ADD CONSTRAINT FK_9D351E4B4584665A FOREIGN KEY (product_id) REFERENCES product (uuid) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pack_products DROP CONSTRAINT FK_9D351E4B1919B217');
        $this->addSql('ALTER TABLE pack_products DROP CONSTRAINT FK_9D351E4B4584665A');
        $this->addSql('DROP TABLE pack_products');
    }
}
