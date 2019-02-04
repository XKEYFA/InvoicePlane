# Added for versioning
ALTER TABLE `ip_products` ADD `product_image` TEXT NOT NULL DEFAULT '' AFTER `product_tariff `;
ALTER TABLE `ip_quote_items` ADD `item_product_image` TEXT NOT NULL DEFAULT '' AFTER `item_product_unit_id`, ADD `item_family_id` INT NOT NULL DEFAULT '1' AFTER `item_product_image`;
ALTER TABLE `ip_products` ADD `product_oncost_price` DECIMAL(20,2) NULL DEFAULT '0' AFTER `product_image`;
ALTER TABLE `ip_quote_items` ADD `item_oncost_price` DECIMAL(20,2) NULL DEFAULT '0' AFTER `item_family_id`;
# ip_quote_items
ALTER TABLE `ip_quote_item_amounts` ADD `item_oncost_subtotal` DECIMAL(20,2) NULL AFTER `item_total`, ADD `item_oncost_tax_total` DECIMAL(20,2) NULL AFTER `item_oncost_subtotal`;
ALTER TABLE `ip_quote_item_amounts` ADD `item_oncost_discount` DECIMAL(20,2) NULL AFTER `item_oncost_tax_total`, ADD `item_oncost_total` DECIMAL(20,2) NULL AFTER `item_oncost_discount`;

ALTER TABLE `ip_quote_items` ADD `item_oncost_discount_amount` DECIMAL(20,2) NULL AFTER `item_oncost_price`;

ALTER TABLE `ip_quote_amounts` ADD `quote_item_oncost_subtotal` DECIMAL(20,2) NULL AFTER `quote_total`, ADD `quote_item_oncost_tax_total` DECIMAL(20,2) NULL AFTER `quote_item_oncost_subtotal`, ADD `quote_oncost_total` DECIMAL(20,2) NULL AFTER `quote_oncost_tax_total`;

ALTER TABLE `ip_quotes` ADD `quote_oncost_discount_amount` DECIMAL(20,2) NULL AFTER `quote_discount_percent`, ADD `quote_oncost_discount_percent` DECIMAL(20,2) NULL AFTER `quote_oncost_discount_amount`;

ALTER TABLE `ip_quote_tax_rates` ADD `quote_tax_rate_oncost_amount` DECIMAL(20,2) NULL AFTER `quote_tax_rate_amount`;

