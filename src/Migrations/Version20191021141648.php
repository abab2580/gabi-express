<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191021141648 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ge_sponsorship (id INT AUTO_INCREMENT NOT NULL, id_filleul INT NOT NULL, id_parrain INT NOT NULL, date_created DATETIME NOT NULL, date_modified DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_CEEE4D26F10E2ABF (id_filleul), INDEX fk_association_5 (id_filleul), INDEX fk_association_51 (id_parrain), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ge_product (id INT AUTO_INCREMENT NOT NULL, id_provider INT NOT NULL, name VARCHAR(254) NOT NULL, description VARCHAR(254) DEFAULT NULL, quantity INT DEFAULT NULL, price NUMERIC(8, 0) NOT NULL, price_discounted NUMERIC(8, 0) DEFAULT NULL, date_created DATETIME NOT NULL, date_modified DATETIME DEFAULT NULL, INDEX fk_association_3 (id_provider), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ge_beneficiary (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(254) NOT NULL, email VARCHAR(254) NOT NULL, phone VARCHAR(254) DEFAULT NULL, date_created DATETIME NOT NULL, date_modified DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ge_suggested_product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(254) NOT NULL, description VARCHAR(254) DEFAULT NULL, date_created DATETIME NOT NULL, date_modified DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ge_country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(254) NOT NULL, description VARCHAR(254) DEFAULT NULL, date_created DATETIME NOT NULL, date_modified DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ge_city (id INT AUTO_INCREMENT NOT NULL, id_country INT NOT NULL, name VARCHAR(254) NOT NULL, description VARCHAR(254) DEFAULT NULL, date_created DATETIME NOT NULL, date_modified DATETIME DEFAULT NULL, INDEX fk_association_7 (id_country), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ge_address (id INT AUTO_INCREMENT NOT NULL, id_city INT NOT NULL, address1 VARCHAR(254) NOT NULL, address2 VARCHAR(254) DEFAULT NULL, phone VARCHAR(254) DEFAULT NULL, email VARCHAR(254) DEFAULT NULL, postcode INT DEFAULT NULL, date_created DATETIME NOT NULL, date_modified DATETIME DEFAULT NULL, discr VARCHAR(255) NOT NULL, INDEX IDX_DA61E201A67B1E36 (id_city), INDEX fk_association_16 (id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ge_product_image (id INT AUTO_INCREMENT NOT NULL, id_product INT NOT NULL, INDEX fk_association_12 (id_product), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ge_product_preorder (id INT AUTO_INCREMENT NOT NULL, id_pre_order INT NOT NULL, id_product INT NOT NULL, quantity INT NOT NULL, subtotal NUMERIC(8, 0) DEFAULT NULL, date_created DATETIME DEFAULT NULL, date_modified DATETIME DEFAULT NULL, INDEX fk_association_17 (id_pre_order), INDEX fk_association_18 (id_product), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ge_customer (id INT AUTO_INCREMENT NOT NULL, id_sponsorship INT DEFAULT NULL, username VARCHAR(254) NOT NULL, password VARCHAR(254) NOT NULL, email VARCHAR(254) NOT NULL, phone VARCHAR(254) DEFAULT NULL, date_created DATETIME NOT NULL, date_modified DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_6C5622A4D8E3C123 (id_sponsorship), INDEX fk_association_6 (id_sponsorship), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ge_product_order (id INT AUTO_INCREMENT NOT NULL, id_orders INT NOT NULL, id_product INT NOT NULL, quantity INT NOT NULL, subtotal NUMERIC(8, 0) DEFAULT NULL, date_created DATETIME NOT NULL, date_modified DATETIME DEFAULT NULL, INDEX fk_association_2 (id_orders), INDEX fk_association_4 (id_product), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ge_preorder (id INT AUTO_INCREMENT NOT NULL, customer_email VARCHAR(254) NOT NULL, customer_name VARCHAR(254) NOT NULL, beneficiary_email VARCHAR(254) NOT NULL, beneficiary_name VARCHAR(254) NOT NULL, beneficiary_phone VARCHAR(254) NOT NULL, date_created DATETIME NOT NULL, date_modified DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ge_image (id INT AUTO_INCREMENT NOT NULL, image_name VARCHAR(254) NOT NULL, date_created DATETIME NOT NULL, date_modified DATETIME DEFAULT NULL, discr VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ge_customer_image (id INT NOT NULL, id_customer INT NOT NULL, INDEX fk_association_13 (id_customer), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ge_provider_address (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ge_currency (id_currency INT AUTO_INCREMENT NOT NULL, name VARCHAR(254) NOT NULL, date_created DATETIME NOT NULL, date_modified DATETIME DEFAULT NULL, PRIMARY KEY(id_currency)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ge_provider (id INT AUTO_INCREMENT NOT NULL, id_administrator INT NOT NULL, id_address INT NOT NULL, name VARCHAR(254) DEFAULT NULL, date_created DATETIME NOT NULL, date_modified DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_7FABDF31D3D3C6F1 (id_address), INDEX fk_association_15 (id_administrator), INDEX fk_association_9 (id_address), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ge_administrator (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(254) NOT NULL, password VARCHAR(254) NOT NULL, name VARCHAR(254) DEFAULT NULL, date_created DATETIME NOT NULL, date_modified DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ge_delivery_address (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ge_coupon (id INT AUTO_INCREMENT NOT NULL, codes VARCHAR(254) NOT NULL, discount NUMERIC(8, 0) NOT NULL, date_expires DATETIME DEFAULT NULL, usage_count INT DEFAULT NULL, product_ids VARCHAR(254) DEFAULT NULL, free_shipping TINYINT(1) DEFAULT NULL, product_categories VARCHAR(254) DEFAULT NULL, used_by VARCHAR(254) DEFAULT NULL, usage_limit INT DEFAULT NULL, individual_use TINYINT(1) DEFAULT NULL, date_created DATETIME NOT NULL, date_modified DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ge_coupon_orders (id_coupon INT NOT NULL, id_orders INT NOT NULL, INDEX IDX_7F2DBD8B42888AEF (id_coupon), INDEX IDX_7F2DBD8BC3184803 (id_orders), PRIMARY KEY(id_coupon, id_orders)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ge_billing_address (id INT NOT NULL, firstname VARCHAR(254) DEFAULT NULL, lastname VARCHAR(254) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ge_orders (id INT AUTO_INCREMENT NOT NULL, id_customer INT NOT NULL, id_billing_address INT NOT NULL, id_delivery_address INT NOT NULL, id_beneficiary INT NOT NULL, created_via VARCHAR(254) DEFAULT NULL, status VARCHAR(254) DEFAULT NULL, currency VARCHAR(254) DEFAULT NULL, total NUMERIC(8, 0) NOT NULL, payment_method VARCHAR(254) NOT NULL, paid TINYINT(1) NOT NULL, transaction_id VARCHAR(254) DEFAULT NULL, date_paid DATETIME DEFAULT NULL, customer_note VARCHAR(254) DEFAULT NULL, date_completed DATETIME DEFAULT NULL, shipping_method VARCHAR(254) NOT NULL, shipping_total NUMERIC(8, 0) NOT NULL, number VARCHAR(254) NOT NULL, discount_total NUMERIC(8, 0) NOT NULL, total_tax NUMERIC(8, 0) NOT NULL, date_created DATETIME NOT NULL, date_modified DATETIME DEFAULT NULL, INDEX fk_association_1 (id_customer), INDEX fk_association_11 (id_delivery_address), INDEX fk_association_14 (id_beneficiary), INDEX fk_association_10 (id_billing_address), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ge_sponsorship ADD CONSTRAINT FK_CEEE4D26F10E2ABF FOREIGN KEY (id_filleul) REFERENCES ge_customer (id)');
        $this->addSql('ALTER TABLE ge_sponsorship ADD CONSTRAINT FK_CEEE4D2679359CC4 FOREIGN KEY (id_parrain) REFERENCES ge_customer (id)');
        $this->addSql('ALTER TABLE ge_product ADD CONSTRAINT FK_465892DC21F9F09 FOREIGN KEY (id_provider) REFERENCES ge_provider (id)');
        $this->addSql('ALTER TABLE ge_city ADD CONSTRAINT FK_3D18B6CE8DEE6016 FOREIGN KEY (id_country) REFERENCES ge_country (id)');
        $this->addSql('ALTER TABLE ge_address ADD CONSTRAINT FK_DA61E201A67B1E36 FOREIGN KEY (id_city) REFERENCES ge_city (id)');
        $this->addSql('ALTER TABLE ge_product_image ADD CONSTRAINT FK_43308325DD7ADDD FOREIGN KEY (id_product) REFERENCES ge_product (id)');
        $this->addSql('ALTER TABLE ge_product_preorder ADD CONSTRAINT FK_8AA2EAA66FB74054 FOREIGN KEY (id_pre_order) REFERENCES ge_preorder (id)');
        $this->addSql('ALTER TABLE ge_product_preorder ADD CONSTRAINT FK_8AA2EAA6DD7ADDD FOREIGN KEY (id_product) REFERENCES ge_product (id)');
        $this->addSql('ALTER TABLE ge_customer ADD CONSTRAINT FK_6C5622A4D8E3C123 FOREIGN KEY (id_sponsorship) REFERENCES ge_sponsorship (id)');
        $this->addSql('ALTER TABLE ge_product_order ADD CONSTRAINT FK_732414E2C3184803 FOREIGN KEY (id_orders) REFERENCES ge_orders (id)');
        $this->addSql('ALTER TABLE ge_product_order ADD CONSTRAINT FK_732414E2DD7ADDD FOREIGN KEY (id_product) REFERENCES ge_product (id)');
        $this->addSql('ALTER TABLE ge_customer_image ADD CONSTRAINT FK_D922A565D1E2629C FOREIGN KEY (id_customer) REFERENCES ge_customer (id)');
        $this->addSql('ALTER TABLE ge_customer_image ADD CONSTRAINT FK_D922A565BF396750 FOREIGN KEY (id) REFERENCES ge_image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ge_provider_address ADD CONSTRAINT FK_65B33880BF396750 FOREIGN KEY (id) REFERENCES ge_address (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ge_provider ADD CONSTRAINT FK_7FABDF31E6F7D734 FOREIGN KEY (id_administrator) REFERENCES ge_administrator (id)');
        $this->addSql('ALTER TABLE ge_provider ADD CONSTRAINT FK_7FABDF31D3D3C6F1 FOREIGN KEY (id_address) REFERENCES ge_provider_address (id)');
        $this->addSql('ALTER TABLE ge_delivery_address ADD CONSTRAINT FK_9FF525F9BF396750 FOREIGN KEY (id) REFERENCES ge_address (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ge_coupon_orders ADD CONSTRAINT FK_7F2DBD8B42888AEF FOREIGN KEY (id_coupon) REFERENCES ge_coupon (id)');
        $this->addSql('ALTER TABLE ge_coupon_orders ADD CONSTRAINT FK_7F2DBD8BC3184803 FOREIGN KEY (id_orders) REFERENCES ge_orders (id)');
        $this->addSql('ALTER TABLE ge_billing_address ADD CONSTRAINT FK_11B5FE14BF396750 FOREIGN KEY (id) REFERENCES ge_address (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ge_orders ADD CONSTRAINT FK_C770930FD1E2629C FOREIGN KEY (id_customer) REFERENCES ge_customer (id)');
        $this->addSql('ALTER TABLE ge_orders ADD CONSTRAINT FK_C770930F8F3E27DE FOREIGN KEY (id_billing_address) REFERENCES ge_billing_address (id)');
        $this->addSql('ALTER TABLE ge_orders ADD CONSTRAINT FK_C770930FE4DA858E FOREIGN KEY (id_delivery_address) REFERENCES ge_delivery_address (id)');
        $this->addSql('ALTER TABLE ge_orders ADD CONSTRAINT FK_C770930F62AD899D FOREIGN KEY (id_beneficiary) REFERENCES ge_beneficiary (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ge_customer DROP FOREIGN KEY FK_6C5622A4D8E3C123');
        $this->addSql('ALTER TABLE ge_product_image DROP FOREIGN KEY FK_43308325DD7ADDD');
        $this->addSql('ALTER TABLE ge_product_preorder DROP FOREIGN KEY FK_8AA2EAA6DD7ADDD');
        $this->addSql('ALTER TABLE ge_product_order DROP FOREIGN KEY FK_732414E2DD7ADDD');
        $this->addSql('ALTER TABLE ge_orders DROP FOREIGN KEY FK_C770930F62AD899D');
        $this->addSql('ALTER TABLE ge_city DROP FOREIGN KEY FK_3D18B6CE8DEE6016');
        $this->addSql('ALTER TABLE ge_address DROP FOREIGN KEY FK_DA61E201A67B1E36');
        $this->addSql('ALTER TABLE ge_provider_address DROP FOREIGN KEY FK_65B33880BF396750');
        $this->addSql('ALTER TABLE ge_delivery_address DROP FOREIGN KEY FK_9FF525F9BF396750');
        $this->addSql('ALTER TABLE ge_billing_address DROP FOREIGN KEY FK_11B5FE14BF396750');
        $this->addSql('ALTER TABLE ge_sponsorship DROP FOREIGN KEY FK_CEEE4D26F10E2ABF');
        $this->addSql('ALTER TABLE ge_sponsorship DROP FOREIGN KEY FK_CEEE4D2679359CC4');
        $this->addSql('ALTER TABLE ge_customer_image DROP FOREIGN KEY FK_D922A565D1E2629C');
        $this->addSql('ALTER TABLE ge_orders DROP FOREIGN KEY FK_C770930FD1E2629C');
        $this->addSql('ALTER TABLE ge_product_preorder DROP FOREIGN KEY FK_8AA2EAA66FB74054');
        $this->addSql('ALTER TABLE ge_customer_image DROP FOREIGN KEY FK_D922A565BF396750');
        $this->addSql('ALTER TABLE ge_provider DROP FOREIGN KEY FK_7FABDF31D3D3C6F1');
        $this->addSql('ALTER TABLE ge_product DROP FOREIGN KEY FK_465892DC21F9F09');
        $this->addSql('ALTER TABLE ge_provider DROP FOREIGN KEY FK_7FABDF31E6F7D734');
        $this->addSql('ALTER TABLE ge_orders DROP FOREIGN KEY FK_C770930FE4DA858E');
        $this->addSql('ALTER TABLE ge_coupon_orders DROP FOREIGN KEY FK_7F2DBD8B42888AEF');
        $this->addSql('ALTER TABLE ge_orders DROP FOREIGN KEY FK_C770930F8F3E27DE');
        $this->addSql('ALTER TABLE ge_product_order DROP FOREIGN KEY FK_732414E2C3184803');
        $this->addSql('ALTER TABLE ge_coupon_orders DROP FOREIGN KEY FK_7F2DBD8BC3184803');
        $this->addSql('DROP TABLE ge_sponsorship');
        $this->addSql('DROP TABLE ge_product');
        $this->addSql('DROP TABLE ge_beneficiary');
        $this->addSql('DROP TABLE ge_suggested_product');
        $this->addSql('DROP TABLE ge_country');
        $this->addSql('DROP TABLE ge_city');
        $this->addSql('DROP TABLE ge_address');
        $this->addSql('DROP TABLE ge_product_image');
        $this->addSql('DROP TABLE ge_product_preorder');
        $this->addSql('DROP TABLE ge_customer');
        $this->addSql('DROP TABLE ge_product_order');
        $this->addSql('DROP TABLE ge_preorder');
        $this->addSql('DROP TABLE ge_image');
        $this->addSql('DROP TABLE ge_customer_image');
        $this->addSql('DROP TABLE ge_provider_address');
        $this->addSql('DROP TABLE ge_currency');
        $this->addSql('DROP TABLE ge_provider');
        $this->addSql('DROP TABLE ge_administrator');
        $this->addSql('DROP TABLE ge_delivery_address');
        $this->addSql('DROP TABLE ge_coupon');
        $this->addSql('DROP TABLE ge_coupon_orders');
        $this->addSql('DROP TABLE ge_billing_address');
        $this->addSql('DROP TABLE ge_orders');
    }
}
