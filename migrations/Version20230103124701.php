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
        $this->addSql('ALTER TABLE "order" ADD coupon_id UUID NOT NULL');
        $this->addSql('ALTER TABLE "order" ADD CONSTRAINT FK_F5299398910AC1A7 FOREIGN KEY (coupon_id) REFERENCES coupon (uuid) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_F5299398910AC1A7 ON "order" (coupon_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE "order" DROP CONSTRAINT FK_F5299398910AC1A7');
        $this->addSql('DROP INDEX IDX_F5299398910AC1A7');
        $this->addSql('ALTER TABLE "order" DROP coupon_id');
    }
}
