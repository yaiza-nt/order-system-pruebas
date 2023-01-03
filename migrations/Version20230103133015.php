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
        $this->addSql('ALTER TABLE coupon ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN coupon.uuid IS NULL');
        $this->addSql('ALTER TABLE "order" ALTER uuid TYPE UUID');
        $this->addSql('ALTER TABLE "order" ALTER coupon_id TYPE UUID');
        $this->addSql('ALTER TABLE "order" ALTER order_header_id TYPE UUID');
        $this->addSql('COMMENT ON COLUMN "order".uuid IS NULL');
        $this->addSql('COMMENT ON COLUMN "order".coupon_id IS NULL');
        $this->addSql('COMMENT ON COLUMN "order".order_header_id IS NULL');
        $this->addSql('ALTER TABLE order_header ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN order_header.uuid IS NULL');
        $this->addSql('ALTER TABLE order_line ALTER uuid TYPE UUID');
        $this->addSql('ALTER TABLE order_line ALTER order_id TYPE UUID');
        $this->addSql('ALTER TABLE order_line ALTER product_id TYPE UUID');
        $this->addSql('COMMENT ON COLUMN order_line.uuid IS NULL');
        $this->addSql('COMMENT ON COLUMN order_line.order_id IS NULL');
        $this->addSql('COMMENT ON COLUMN order_line.product_id IS NULL');
        $this->addSql('ALTER TABLE pack ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN pack.uuid IS NULL');
        $this->addSql('ALTER TABLE product ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN product.uuid IS NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE pack_products DROP CONSTRAINT FK_9D351E4B1919B217');
        $this->addSql('ALTER TABLE pack_products DROP CONSTRAINT FK_9D351E4B4584665A');
        $this->addSql('DROP TABLE pack_products');
        $this->addSql('ALTER TABLE order_line ALTER uuid TYPE UUID');
        $this->addSql('ALTER TABLE order_line ALTER order_id TYPE UUID');
        $this->addSql('ALTER TABLE order_line ALTER product_id TYPE UUID');
        $this->addSql('COMMENT ON COLUMN order_line.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN order_line.order_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN order_line.product_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE pack ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN pack.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE "order" ALTER uuid TYPE UUID');
        $this->addSql('ALTER TABLE "order" ALTER coupon_id TYPE UUID');
        $this->addSql('ALTER TABLE "order" ALTER order_header_id TYPE UUID');
        $this->addSql('COMMENT ON COLUMN "order".uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN "order".coupon_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN "order".order_header_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE coupon ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN coupon.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE order_header ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN order_header.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE product ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN product.uuid IS \'(DC2Type:uuid)\'');
    }
}
