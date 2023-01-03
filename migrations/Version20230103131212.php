<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230103131212 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE coupon ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN coupon.uuid IS NULL');
        $this->addSql('ALTER TABLE "order" ALTER uuid TYPE UUID');
        $this->addSql('ALTER TABLE "order" ALTER coupon_id TYPE UUID');
        $this->addSql('ALTER TABLE "order" ALTER order_header_id TYPE UUID');
        $this->addSql('COMMENT ON COLUMN "order".uuid IS NULL');
        $this->addSql('COMMENT ON COLUMN "order".coupon_id IS NULL');
        $this->addSql('COMMENT ON COLUMN "order".order_header_id IS NULL');
        $this->addSql('ALTER INDEX idx_f5299398910ac1a7 RENAME TO IDX_F529939866C5951B');
        $this->addSql('ALTER TABLE order_header ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN order_header.uuid IS NULL');
        $this->addSql('ALTER TABLE order_line ADD order_id UUID NOT NULL');
        $this->addSql('ALTER TABLE order_line ADD product_id UUID NOT NULL');
        $this->addSql('ALTER TABLE order_line ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN order_line.uuid IS NULL');
        $this->addSql('ALTER TABLE order_line ADD CONSTRAINT FK_9CE58EE18D9F6D38 FOREIGN KEY (order_id) REFERENCES "order" (uuid) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE order_line ADD CONSTRAINT FK_9CE58EE14584665A FOREIGN KEY (product_id) REFERENCES product (uuid) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_9CE58EE18D9F6D38 ON order_line (order_id)');
        $this->addSql('CREATE INDEX IDX_9CE58EE14584665A ON order_line (product_id)');
        $this->addSql('ALTER TABLE pack ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN pack.uuid IS NULL');
        $this->addSql('ALTER TABLE product ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN product.uuid IS NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE order_header ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN order_header.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE "order" ALTER uuid TYPE UUID');
        $this->addSql('ALTER TABLE "order" ALTER coupon_id TYPE UUID');
        $this->addSql('ALTER TABLE "order" ALTER order_header_id TYPE UUID');
        $this->addSql('COMMENT ON COLUMN "order".uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN "order".coupon_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN "order".order_header_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER INDEX idx_f529939866c5951b RENAME TO idx_f5299398910ac1a7');
        $this->addSql('ALTER TABLE coupon ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN coupon.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE product ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN product.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE pack ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN pack.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE order_line DROP CONSTRAINT FK_9CE58EE18D9F6D38');
        $this->addSql('ALTER TABLE order_line DROP CONSTRAINT FK_9CE58EE14584665A');
        $this->addSql('DROP INDEX IDX_9CE58EE18D9F6D38');
        $this->addSql('DROP INDEX IDX_9CE58EE14584665A');
        $this->addSql('ALTER TABLE order_line DROP order_id');
        $this->addSql('ALTER TABLE order_line DROP product_id');
        $this->addSql('ALTER TABLE order_line ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN order_line.uuid IS \'(DC2Type:uuid)\'');
    }
}
