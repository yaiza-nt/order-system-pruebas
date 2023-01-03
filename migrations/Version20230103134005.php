<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230103134005 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE coupon ADD product_id UUID NOT NULL');
        $this->addSql('ALTER TABLE coupon ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN coupon.uuid IS NULL');
        $this->addSql('ALTER TABLE coupon ADD CONSTRAINT FK_64BF3F024584665A FOREIGN KEY (product_id) REFERENCES product (uuid) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_64BF3F024584665A ON coupon (product_id)');
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
        $this->addSql('ALTER TABLE pack_products DROP unit_amount');
        $this->addSql('ALTER TABLE pack_products DROP quantity');
        $this->addSql('ALTER TABLE pack_products ALTER pack_id TYPE UUID');
        $this->addSql('ALTER TABLE pack_products ALTER product_id TYPE UUID');
        $this->addSql('COMMENT ON COLUMN pack_products.pack_id IS NULL');
        $this->addSql('COMMENT ON COLUMN pack_products.product_id IS NULL');
        $this->addSql('ALTER TABLE product ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN product.uuid IS NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE order_line ALTER uuid TYPE UUID');
        $this->addSql('ALTER TABLE order_line ALTER order_id TYPE UUID');
        $this->addSql('ALTER TABLE order_line ALTER product_id TYPE UUID');
        $this->addSql('COMMENT ON COLUMN order_line.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN order_line.order_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN order_line.product_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE coupon DROP CONSTRAINT FK_64BF3F024584665A');
        $this->addSql('DROP INDEX IDX_64BF3F024584665A');
        $this->addSql('ALTER TABLE coupon DROP product_id');
        $this->addSql('ALTER TABLE coupon ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN coupon.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE pack ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN pack.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE product ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN product.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE "order" ALTER uuid TYPE UUID');
        $this->addSql('ALTER TABLE "order" ALTER coupon_id TYPE UUID');
        $this->addSql('ALTER TABLE "order" ALTER order_header_id TYPE UUID');
        $this->addSql('COMMENT ON COLUMN "order".uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN "order".coupon_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN "order".order_header_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE order_header ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN order_header.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE pack_products ADD unit_amount DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE pack_products ADD quantity INT NOT NULL');
        $this->addSql('ALTER TABLE pack_products ALTER pack_id TYPE UUID');
        $this->addSql('ALTER TABLE pack_products ALTER product_id TYPE UUID');
        $this->addSql('COMMENT ON COLUMN pack_products.pack_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN pack_products.product_id IS \'(DC2Type:uuid)\'');
    }
}
