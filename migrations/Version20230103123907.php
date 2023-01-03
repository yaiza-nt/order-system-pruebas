<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230103123907 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE coupon (uuid UUID NOT NULL, code VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, apply_status INT NOT NULL, valid_from TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, valid_to TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, active BOOLEAN NOT NULL, archived BOOLEAN NOT NULL, public BOOLEAN NOT NULL, origin INT NOT NULL, purpose INT NOT NULL, conditional_usage TEXT DEFAULT NULL, usage_max INT NOT NULL, usage_actual INT NOT NULL, last_used TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(uuid))');
        $this->addSql('COMMENT ON COLUMN coupon.valid_from IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN coupon.valid_to IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN coupon.last_used IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN coupon.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN coupon.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE "order" (uuid UUID NOT NULL, organization_id UUID NOT NULL, request_validation_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, response_validation_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, cancelled_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, origin INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(uuid))');
        $this->addSql('COMMENT ON COLUMN "order".organization_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN "order".request_validation_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN "order".response_validation_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN "order".cancelled_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN "order".created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN "order".updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE order_header (uuid UUID NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(uuid))');
        $this->addSql('COMMENT ON COLUMN order_header.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN order_header.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE order_line (uuid UUID NOT NULL, quantity INT NOT NULL, amount DOUBLE PRECISION NOT NULL, discount DOUBLE PRECISION DEFAULT NULL, total DOUBLE PRECISION NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(uuid))');
        $this->addSql('COMMENT ON COLUMN order_line.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN order_line.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE pack (uuid UUID NOT NULL, name VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(uuid))');
        $this->addSql('COMMENT ON COLUMN pack.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN pack.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE product (uuid UUID NOT NULL, name VARCHAR(255) NOT NULL, active BOOLEAN NOT NULL, unit_price DOUBLE PRECISION NOT NULL, type INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(uuid))');
        $this->addSql('COMMENT ON COLUMN product.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN product.updated_at IS \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE coupon');
        $this->addSql('DROP TABLE "order"');
        $this->addSql('DROP TABLE order_header');
        $this->addSql('DROP TABLE order_line');
        $this->addSql('DROP TABLE pack');
        $this->addSql('DROP TABLE product');
    }
}
