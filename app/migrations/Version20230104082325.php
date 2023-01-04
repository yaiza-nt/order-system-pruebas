<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230104082325 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE coupon_validations (coupon_id UUID NOT NULL, validation_id UUID NOT NULL, PRIMARY KEY(coupon_id, validation_id))');
        $this->addSql('CREATE INDEX IDX_C674BCA866C5951B ON coupon_validations (coupon_id)');
        $this->addSql('CREATE INDEX IDX_C674BCA8A2274850 ON coupon_validations (validation_id)');
        $this->addSql('ALTER TABLE coupon_validations ADD CONSTRAINT FK_C674BCA866C5951B FOREIGN KEY (coupon_id) REFERENCES coupon (uuid) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE coupon_validations ADD CONSTRAINT FK_C674BCA8A2274850 FOREIGN KEY (validation_id) REFERENCES validation (uuid) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE coupon_validations DROP CONSTRAINT FK_C674BCA866C5951B');
        $this->addSql('ALTER TABLE coupon_validations DROP CONSTRAINT FK_C674BCA8A2274850');
        $this->addSql('DROP TABLE coupon_validations');
    }
}
