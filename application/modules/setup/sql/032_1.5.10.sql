# Added for versioning
ALTER TABLE `ip_products` ADD `product_image` TEXT NOT NULL DEFAULT '' AFTER `product_tariff `;
ALTER TABLE `ip_quote_items` ADD `item_product_image` TEXT NOT NULL DEFAULT '' AFTER `item_product_unit_id`, ADD `item_family_id` INT NOT NULL DEFAULT '1' AFTER `item_product_image`;
ALTER TABLE `ip_products` ADD `product_oncost_price` DECIMAL(20,2) NOT NULL DEFAULT '0' AFTER `product_image`;
ALTER TABLE `ip_quote_items` ADD `item_oncost_price` DECIMAL(20,2) NOT NULL DEFAULT '0' AFTER `item_family_id`;