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
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE coupon DROP CONSTRAINT FK_64BF3F024584665A');
        $this->addSql('DROP INDEX IDX_64BF3F024584665A');
        $this->addSql('ALTER TABLE coupon DROP product_id');
        $this->addSql('ALTER TABLE coupon ALTER uuid TYPE UUID');
        $this->addSql('COMMENT ON COLUMN coupon.uuid IS \'(DC2Type:uuid)\'');
    }
}
