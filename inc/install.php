<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NexoPOS_Install extends Tendoo_Module
{
    /**
     *  Create Tables
     *  @param string module namespace
     *  @return void
    **/

    public function create_tables( $module_namespace )
    {
        global $Options;

        if( ! $module_namespace == 'nexopos_advanced' ) {
            return;
        }

        if( ! empty( @$Options[ 'nexopos_installed' ] ) ) {
            return false;
        }

        $table_prefix       =   $this->db->dbprefix;

        /**
         * Create Items Table
        **/

        $this->db->query('CREATE TABLE IF NOT EXISTS `'.$table_prefix.'nexopos_items` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `name` varchar(200) NOT NULL,
		  `description` text NOT NULL,
		  `date_creation` datetime NOT NULL,
          `date_modification` datetime NOT NULL,
		  `author` int(11) NOT NULL,
		  `ref_category` int(11) NOT NULL,
		  `ref_department` int(11) NOT NULL,
		  `ref_taxes` int(11) NOT NULL,
          `ref_unit` int(11) NOT NULL,
          `ref_ids` varchar(200) NOT NULL,
          `ref_coupon` int(11) NOT NULL,
		  `sale_price` float NOT NULL,
          `featured_image` varchar(200) NOT NULL,
          `status` varchar(200) NOT NULL,
          `group_sale_price` float NOT NULL,
          `group_special_price` float NOT NULL,
          `type` varchar(200) NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');

        /**
         * Create Item Meta Table
        **/

        $this->db->query('CREATE TABLE IF NOT EXISTS `'.$table_prefix.'nexopos_items_metas` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `key` varchar(200) NOT NULL,
		  `value` text NOT NULL,
		  `ref_item` int(11) NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');

        /**
         * Crate Variation Table
        **/

        $this->db->query('CREATE TABLE IF NOT EXISTS `'.$table_prefix.'nexopos_variations` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `name` varchar(200) NOT NULL,
		  `sale_price` float NOT NULL,
		  `special_price` float NOT NULL,
          `discount_start` datetime NOT NULL,
          `discount_end` datetime NOT NULL,
          `sku` varchar(200) NOT NULL,
          `barcode_type` varchar(200) NOT NULL,
          `barcode` varchar(200) NOT NULL,
          `weight` varchar(200) NOT NULL,
          `height` varchar(200) NOT NULL,
          `size` varchar(200) NOT NULL,
          `color` varchar(200) NOT NULL,
          `length` varchar(200) NOT NULL,
          `width` varchar(200) NOT NULL,
          `capacity` varchar(200) NOT NULL,
          `volume` varchar(200) NOT NULL,
          `expiration_date` datetime NOT NULL,
          `ref_item` int(11) NOT NULL,
          `featured_image` varchar(200) NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');

        /**
         * Variation Gallery
        **/

        $this->db->query('CREATE TABLE IF NOT EXISTS `'.$table_prefix.'nexopos_variations_galleries` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
          `image` varchar(200) NOT NULL,
          `ref_variation` int(11) NOT NULL,
          `name` varchar(200) NOT NULL,
          `description` text NOT NULL,
          PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');

        /**
         * Variation Meta
        **/

        $this->db->query('CREATE TABLE IF NOT EXISTS `'.$table_prefix.'nexopos_variations_metas` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
          `key` varchar(200) NOT NULL,
          `value` varchar(200) NOT NULL,
          `ref_variation` int(11) NOT NULL,
          PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');

        /**
         * Stock
        **/

        $this->db->query('CREATE TABLE IF NOT EXISTS `'.$table_prefix.'nexopos_stock` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
          `ref_provider` int(11) NOT NULL,
          `ref_variation` int(11) NOT NULL,
          `ref_delivery` int(11) NOT NULL,
          `stock` int(11) NOT NULL,
          `stock_type` varchar(200) NOT NULL,
          `description` int(11) NOT NULL,
          `author` int(11) NOT NULL,
          PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');

        /**
         * Delivery
        **/

        $this->db->query('CREATE TABLE IF NOT EXISTS `'.$table_prefix.'nexopos_deliveries` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
          `name` varchar(200) NOT NULL,
          `description` text NOT NULL,
          `author` int(11) NOT NULL,
          `date_creation` datetime NOT NULL,
          `date_modification` datetime NOT NULL,
          `shipping_date` datetime NOT NULL,
          `purchase_cost` float NOT NULL,
          `auto_cost` varchar(200) NOT NULL,
          PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');

        /**
         * Category
        **/

        $this->db->query('CREATE TABLE IF NOT EXISTS `'.$table_prefix.'nexopos_categories` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
          `name` varchar(200) NOT NULL,
          `description` text NOT NULL,
          `author` int(11) NOT NULL,
          `ref_parent` int(11) NOT NULL,
          PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');

        /**
         * Deparments
        **/

        $this->db->query('CREATE TABLE IF NOT EXISTS `'.$table_prefix.'nexopos_departments` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
          `name` varchar(200) NOT NULL,
          `description` varchar(200) NOT NULL,
          `img_url` varchar(200) NOT NULL,
          `ref_parent` int(11) NOT NULL,
          `author` int(11) NOT NULL,
          `date_creation` datetime NOT NULL,
          `date_modification` datetime NOT NULL,
          PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');

        /**
         * Unit
        **/

        $this->db->query('CREATE TABLE IF NOT EXISTS `'.$table_prefix.'nexopos_units` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
          `name` varchar(200) NOT NULL,
          `description` varchar(200) NOT NULL,
          `author` int(11) NOT NULL,
          `date_creation` datetime NOT NULL,
          `date_modification` datetime NOT NULL,
          PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');

        /**
         * Taxes
        **/

        $this->db->query('CREATE TABLE IF NOT EXISTS `'.$table_prefix.'nexopos_taxes` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
          `name` varchar(200) NOT NULL,
          `description` text NOT NULL,
          `value` float NOT NULL,
          `author` int(11) NOT NULL,
          `date_creation` datetime NOT NULL,
          `date_modification` datetime NOT NULL,
          PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');

        /**
         * Providers
        **/

        $this->db->query('CREATE TABLE IF NOT EXISTS `'.$table_prefix.'nexopos_providers` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
          `name` varchar(200) NOT NULL,
          `description` text NOT NULL,
          `email` varchar(200) NOT NULL,
          `phone` varchar(200) NOT NULL,
          `author` int(11) NOT NULL,
          `date_creation` datetime NOT NULL,
          `date_modification` datetime NOT NULL,
          PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');

        /**
         * Providers Meta
        **/

        $this->db->query('CREATE TABLE IF NOT EXISTS `'.$table_prefix.'nexopos_providers_metas` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
          `key` varchar(200) NOT NULL,
          `value` varchar(200) NOT NULL,
          `ref_provider` int(11) NOT NULL,
          PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');

        /**
         * Coupons
        **/

        $this->db->query('CREATE TABLE IF NOT EXISTS `'.$table_prefix.'nexopos_coupons` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
          `name` varchar(200) NOT NULL,
          `description` text NOT NULL,
          `code` varchar(200) NOT NULL,
          `author` int NOT NULL,
          `discount_type` varchar(200) NOT NULL,
          `discount_percent` float NOT NULL,
          `discount_amount` float NOT NULL,
          `type` varchar(200) NOT NULL,
          `start_date` datetime NOT NULL,
          `end_date` datetime NOT NULL,
          `usage_limit` int(11) NOT NULL,
          PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');

        /**
         * Order Coupons
        **/

        $this->db->query('CREATE TABLE IF NOT EXISTS `'.$table_prefix.'nexopos_orders_coupons` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
          `ref_coupon` int(11) NOT NULL,
          `ref_order` int(11) NOT NULL,
          `coupon_amont` float NOT NULL,
          `coupon_percent` float NOT NULL,
          `coupon_type` varchar(200) NOT NULL,
          PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');

        /**
         * Orders
        **/

        $this->db->query('CREATE TABLE IF NOT EXISTS `'.$table_prefix.'nexopos_orders` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
          `name` varchar(200) NOT NULL,
          `author` int(11) NOT NULL,
          `description` text NOT NULL,
          `date_creation` datetime NOT NULL,
          `date_modification` datetime NOT NULL,
          `gross_total` float NOT NULL,
          `net_total` float NOT NULL,
          `perceived_amount` float NOT NULL,
          `ref_customer` int(11) NOT NULL,
          `ref_register` int(11) NOT NULL,
          `type` varchar(200) NOT NULL,
          `discount_type` varchar(200) NOT NULL,
          `discount_percent` float NOT NULL,
          `discount_amount` float NOT NULL,
          `vat` float NOT NULL,
          `code` varchar(200) NOT NULL,
          `group_discount_amount` float NOT NULL,
          `group_discount_percent` float NOT NULL,
          `group_discount_type` varchar(200) NOT NULL,
          `payment_types` varchar(200) NOT NULL,
          PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');

        /**
         * Order Meta
        **/

        $this->db->query('CREATE TABLE IF NOT EXISTS `'.$table_prefix.'nexopos_orders_metas` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
          `key` varchar(200) NOT NULL,
          `value` varchar(200) NOT NULL,
          `ref_order` int(11) NOT NULL,
          PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');

        /**
         * Order Payment
        **/

        $this->db->query('CREATE TABLE IF NOT EXISTS `'.$table_prefix.'nexopos_orders_payments` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
          `ref_order` int(11) NOT NULL,
          `type` varchar(200) NOT NULL,
          `amount` float NOT NULL,
          `author` int(11) NOT NULL,
          `date_creation` datetime NOT NULL,
          `date_modification` datetime NOT NULL,
          PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');

        /**
         * Orders Items
        **/

        $this->db->query('CREATE TABLE IF NOT EXISTS `'.$table_prefix.'nexopos_orders_items` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
          `ref_order` int(11) NOT NULL,
          `ref_item` int(11) NOT NULL,
          `item_price` float NOT NULL,
          `item_quantity` int(11) NOT NULL,
          `item_total_price` float NOT NULL,
          `discount_type` varchar(200) NOT NULL,
          `discount_amount` float NOT NULL,
          `discount_percent` float NOT NULL,
          PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');

        /**
         * Registers
        **/

        $this->db->query('CREATE TABLE IF NOT EXISTS `'.$table_prefix.'nexopos_registers` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
          `name` varchar(200) NOT NULL,
          `description` text NOT NULL,
          `status` varchar(200) NOT NULL,
          `author` int(11) NOT NULL,
          `used_by` int(11) NOT NULL,
          `date_creation` datetime NOT NULL,
          `date_modification` datetime NOT NULL,
          PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');

        /**
         * Register Activity
        **/

        $this->db->query('CREATE TABLE IF NOT EXISTS `'.$table_prefix.'nexopos_registers_activities` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
          `amount` float NOT NULL,
          `type` varchar(200) NOT NULL,
          `author` int(11) NOT NULL,
          `ref_register` int(11) NOT NULL,
          `date_creation` datetime NOT NULL,
          `date_modification` datetime NOT NULL,
          PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');

        /**
         * Customers
        **/

        $this->db->query('CREATE TABLE IF NOT EXISTS `'.$table_prefix.'nexopos_customers` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
          `name` varchar(200) NOT NULL,
          `surname` varchar(200) NOT NULL,
          `description` text NOT NULL,
          `status` varchar(200) NOT NULL,
          `author` int(11) NOT NULL,
          `sex` varchar(200) NOT NULL,
          `phone` varchar(200) NOT NULL,
          `email` varchar(200) NOT NULL,
          `address` varchar(200) NOT NULL,
          `pobox` varchar(200) NOT NULL,
          `ref_group` varchar(200) NOT NULL,
          `date_creation` datetime NOT NULL,
          `date_modification` datetime NOT NULL,
          PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');

        /**
         * Customer Meta
        **/

        $this->db->query('CREATE TABLE IF NOT EXISTS `'.$table_prefix.'nexopos_customers_metas` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
          `key` varchar(200) NOT NULL,
          `value` varchar(200) NOT NULL,
          `ref_provider` int(11) NOT NULL,
          PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');

        /**
         * Customers Group
        **/

        $this->db->query('CREATE TABLE IF NOT EXISTS `'.$table_prefix.'nexopos_customers_groups` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
          `name` varchar(200) NOT NULL,
          `description` text NOT NULL,
          `enable_discount` varchar(200) NOT NULL,
          `discount_start` datetime NOT NULL,
          `discount_end` datetime NOT NULL,
          `discount_type` varchar(200) NOT NULL,
          `discount_amount` float NOT NULL,
          `discount_percent` float NOT NULL,
          `date_creation` datetime NOT NULL,
          `date_modification` datetime NOT NULL,
          PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');

        /**
         * xpenses
        **/

        $this->db->query('CREATE TABLE IF NOT EXISTS `'.$table_prefix.'nexopos_expenses` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
          `ref_category` int(11) NOT NULL,
          `amount` float NOT NULL,
          `date_creation` datetime NOT NULL,
          `date_modification` datetime NOT NULL,
          `author` int(11) NOT NULL,
          `description` text NOT NULL,
          PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');

        /**
         * Expense Category
        **/

        $this->db->query('CREATE TABLE IF NOT EXISTS `'.$table_prefix.'nexopos_expenses_categories` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
          `ref_category` int(11) NOT NULL,
          `amount` float NOT NULL,
          `date_creation` datetime NOT NULL,
          `date_modification` datetime NOT NULL,
          `author` int(11) NOT NULL,
          `description` text NOT NULL,
          PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');

        $this->options->set( 'nexopos_installed', 'yes' );
    }

    /**
     *  Remove Module
     *  @param string module namespace
     *  @return void
    **/

    public function remove_tables( $module_namespace )
    {
        global $Options;

        if( ! $module_namespace == 'nexopos_advanced' ) {
            return;
        }

        $table_prefix       =   $this->db->dbprefix;

        $this->db->query('DROP TABLE IF EXISTS `'.$table_prefix . 'nexopos_orders`;');
        $this->db->query('DROP TABLE IF EXISTS `'.$table_prefix . 'nexopos_orders_metas`;');
        $this->db->query('DROP TABLE IF EXISTS `'.$table_prefix . 'nexopos_orders`;');
        $this->db->query('DROP TABLE IF EXISTS `'.$table_prefix . 'nexopos_orders`;');
        $this->db->query('DROP TABLE IF EXISTS `'.$table_prefix . 'nexopos_orders`;');
        $this->db->query('DROP TABLE IF EXISTS `'.$table_prefix . 'nexopos_orders`;');
        $this->db->query('DROP TABLE IF EXISTS `'.$table_prefix . 'nexopos_orders`;');
        $this->db->query('DROP TABLE IF EXISTS `'.$table_prefix . 'nexopos_orders`;');
        $this->db->query('DROP TABLE IF EXISTS `'.$table_prefix . 'nexopos_orders`;');
        $this->db->query('DROP TABLE IF EXISTS `'.$table_prefix . 'nexopos_orders`;');
        $this->db->query('DROP TABLE IF EXISTS `'.$table_prefix . 'nexopos_orders`;');
        $this->db->query('DROP TABLE IF EXISTS `'.$table_prefix . 'nexopos_orders`;');
        $this->db->query('DROP TABLE IF EXISTS `'.$table_prefix . 'nexopos_orders`;');
        $this->db->query('DROP TABLE IF EXISTS `'.$table_prefix . 'nexopos_orders`;');
        $this->db->query('DROP TABLE IF EXISTS `'.$table_prefix . 'nexopos_orders`;');
        $this->db->query('DROP TABLE IF EXISTS `'.$table_prefix . 'nexopos_orders`;');
        $this->db->query('DROP TABLE IF EXISTS `'.$table_prefix . 'nexopos_orders`;');
        $this->db->query('DROP TABLE IF EXISTS `'.$table_prefix . 'nexopos_orders`;');
    }

}
