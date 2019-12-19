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

CREATE TABLE `ip_users_partner` (
  `user_partner_id` int(11) NOT NULL,
  `user_partner_name` text DEFAULT NULL,
  `user_partner_image` text DEFAULT NULL,
  `user_partner_company` text DEFAULT NULL,
  `user_partner_address_1` text DEFAULT NULL,
  `user_partner_address_2` text DEFAULT NULL,
  `user_partner_city` text DEFAULT NULL,
  `user_partner_state` text DEFAULT NULL,
  `user_partner_zip` text DEFAULT NULL,
  `user_partner_country` text DEFAULT NULL,
  `user_partner_phone` text DEFAULT NULL,
  `user_partner_fax` text DEFAULT NULL,
  `user_partner_mobile` text DEFAULT NULL,
  `user_partner_email` text DEFAULT NULL,
  `user_partner_web` text DEFAULT NULL,
  `user_partner_vat_id` text DEFAULT NULL,
  `user_partner_tax_code` text DEFAULT NULL,
  `user_partner_all_clients` int(1) NOT NULL DEFAULT 0,
  `user_partner_subscribernumber` varchar(40) DEFAULT NULL,
  `user_partner_iban` varchar(34) DEFAULT NULL,
  `user_partner_gln` bigint(13) DEFAULT NULL,
  `user_partner_rcc` varchar(7) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

ALTER TABLE `ip_users`  ADD `user_partner_id` INT NULL  AFTER `user_rcc`;

ALTER TABLE `ip_clients` ADD `user_id` INT NULL DEFAULT NULL AFTER `client_gender`;


