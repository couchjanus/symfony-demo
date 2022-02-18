<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220218090637 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking ADD first_name NVARCHAR(255)');
        $this->addSql('ALTER TABLE booking ADD last_name NVARCHAR(255)');
        $this->addSql('ALTER TABLE booking ADD shipping_street NVARCHAR(255)');
        $this->addSql('ALTER TABLE booking ADD shipping_city NVARCHAR(255)');
        $this->addSql('ALTER TABLE booking ADD shipping_state NVARCHAR(255)');
        $this->addSql('ALTER TABLE booking ADD zip_code NVARCHAR(255)');
        $this->addSql('ALTER TABLE booking ADD phone_number NVARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE booking ADD created_at DATETIME2(6) NOT NULL');
        $this->addSql('ALTER TABLE booking ADD updated_at DATETIME2(6) NOT NULL');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:datetime_immutable)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'booking\', N\'COLUMN\', created_at');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:datetime_immutable)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'booking\', N\'COLUMN\', updated_at');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA db_accessadmin');
        $this->addSql('CREATE SCHEMA db_backupoperator');
        $this->addSql('CREATE SCHEMA db_datareader');
        $this->addSql('CREATE SCHEMA db_datawriter');
        $this->addSql('CREATE SCHEMA db_ddladmin');
        $this->addSql('CREATE SCHEMA db_denydatareader');
        $this->addSql('CREATE SCHEMA db_denydatawriter');
        $this->addSql('CREATE SCHEMA db_owner');
        $this->addSql('CREATE SCHEMA db_securityadmin');
        $this->addSql('CREATE SCHEMA dbo');
        $this->addSql('ALTER TABLE booking DROP COLUMN first_name');
        $this->addSql('ALTER TABLE booking DROP COLUMN last_name');
        $this->addSql('ALTER TABLE booking DROP COLUMN shipping_street');
        $this->addSql('ALTER TABLE booking DROP COLUMN shipping_city');
        $this->addSql('ALTER TABLE booking DROP COLUMN shipping_state');
        $this->addSql('ALTER TABLE booking DROP COLUMN zip_code');
        $this->addSql('ALTER TABLE booking DROP COLUMN phone_number');
        $this->addSql('ALTER TABLE booking DROP COLUMN created_at');
        $this->addSql('ALTER TABLE booking DROP COLUMN updated_at');
    }
}
