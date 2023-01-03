<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230103124701 extends AbstractMigration
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
        $this->addSql('ALTER TABLE "order" ADD coupon_id UUID NOT NULL');
        $this->addSql('ALTER TABLE "order" ADD order_header_id UUID NOT NULL');
        $this->addSql('ALTER TABLE "order" ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN "order".uuid IS NULL');
        $this->addSql('ALTER TABLE "order" ADD CONSTRAINT FK_F5299398910AC1A7 FOREIGN KEY (coupon_id) REFERENCES coupon (uuid) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "order" ADD CONSTRAINT FK_F5299398927E6420 FOREIGN KEY (order_header_id) REFERENCES order_header (uuid) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_F5299398910AC1A7 ON "order" (coupon_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F5299398927E6420 ON "order" (order_header_id)');
        $this->addSql('ALTER TABLE order_header ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN order_header.uuid IS NULL');
        $this->addSql('ALTER TABLE order_line ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN order_line.uuid IS NULL');
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
        $this->addSql('ALTER TABLE coupon ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN coupon.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE pack ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN pack.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE product ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN product.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE order_line ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN order_line.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE "order" DROP CONSTRAINT FK_F5299398910AC1A7');
        $this->addSql('ALTER TABLE "order" DROP CONSTRAINT FK_F5299398927E6420');
        $this->addSql('DROP INDEX IDX_F5299398910AC1A7');
        $this->addSql('DROP INDEX UNIQ_F5299398927E6420');
        $this->addSql('ALTER TABLE "order" DROP coupon_id');
        $this->addSql('ALTER TABLE "order" DROP order_header_id');
        $this->addSql('ALTER TABLE "order" ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN "order".uuid IS \'(DC2Type:uuid)\'');
    }
}
