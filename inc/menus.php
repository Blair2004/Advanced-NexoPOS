<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NexoPOS_Admin_Menus
{
    public function register( $menus )
    {
        global $Options;
        // Inventory
        $menus  =   array_insert_after( 'dashboard', $menus, 'nexopos-inventory', [
            array(
                'title' =>  __( 'Inventory', 'nexopos' ),
                'disable'   =>  true,
                'icon'      =>  'fa fa-archive'
            ),
            array(
                'title' =>  __( 'Deliveries', 'nexopos' ),
                'href'  =>  site_url( [ 'dashboard', 'nexopos/deliveries' ] )
            ),
            array(
                'title' =>  __( 'New Delivery', 'nexopos' ),
                'href'  =>  site_url( [ 'dashboard', 'nexopos/deliveries', 'add' ] )
            ),
            array(
                'title' =>  __( 'Items', 'nexopos' ),
                'href'  =>  site_url( [ 'dashboard', 'nexopos/items' ] )
            ),
            array(
                'title' =>  __( 'New Item', 'nexopos' ),
                'href'  =>  site_url( [ 'dashboard', 'nexopos/items', 'types' ] )
            ),
            array(
                'title' =>  __( 'Import Items', 'nexopos' ),
                'href'  =>  site_url( [ 'dashboard', 'nexopos/items', 'import' ] )
            ),
            array(
                'title' =>  __( 'Categories', 'nexopos' ),
                'href'  =>  site_url( [ 'dashboard', 'nexopos/categories' ] )
            ),
            array(
                'title' =>  __( 'New Category', 'nexopos' ),
                'href'  =>  site_url( [ 'dashboard', 'nexopos/categories', 'add' ] )
            ),
            array(
                'title' =>  __( 'Departments', 'nexopos' ),
                'href'  =>  site_url( [ 'dashboard', 'nexopos/departments' ] )
            ),
            array(
                'title' =>  __( 'New Department', 'nexopos' ),
                'href'  =>  site_url( [ 'dashboard', 'nexopos/deparments', 'add' ] )
            )
        ]);

        // Customers
        $menus  =   array_insert_before( 'nexopos-inventory', $menus, 'nexopos-customers', [
            array(
                'title'     =>      __( 'Customers', 'nexopos' ),
                'href'      =>      site_url( [ 'dashboard', 'nexopos/customers' ] ),
                'icon'      =>      'fa fa-users'
            ),
            array(
                'title'     =>      __( 'New Customers', 'nexopos' ),
                'href'      =>      site_url( [ 'dashboard', 'nexopos/customers', 'add' ] )
            ),
            array(
                'title'     =>      __( 'Groups', 'nexopos' ),
                'href'      =>      site_url( [ 'dashboard', 'nexopos/customers-groups' ] )
            ),
            array(
                'title'     =>      __( 'New Group', 'nexopos' ),
                'href'      =>      site_url( [ 'dashboard', 'nexopos/customers-groups', 'add' ] )
            )
        ]);

        // Coupon
        $menus  =   array_insert_before( 'nexopos-customers', $menus, 'nexopos-coupons', [
            array(
                'title'     =>      __( 'Coupons', 'nexopos' ),
                'href'      =>      site_url( [ 'dashboard', 'nexopos/coupons' ]),
                'icon'      =>      'fa fa-gift'
            ),
            array(
                'title'     =>      __( 'New Coupon', 'nexopos' ),
                'href'      =>      site_url( [ 'dashboard', 'nexopos/coupons', 'add' ]),
            ),
        ]);

        // settings
        $menus  =   array_insert_after( 'nexopos-inventory', $menus, 'nexopos-settings', [
            array(
                'title'     =>      __( 'NexoPOS Settings', 'nexopos' ),
                'icon'      =>      'fa fa-wrench',
                'disable'   =>      true
            ),
            array(
                'title'     =>      __( 'Generals', 'nexopos' ),
                'href'      =>      site_url( [ 'dashboard', 'nexopos/settings', 'general' ]),
            ),
            array(
                'title'     =>      __( 'Checkout', 'nexopos' ),
                'href'      =>      site_url( [ 'dashboard', 'nexopos/settings', 'checkout' ]),
            ),
            array(
                'title'     =>      __( 'Items', 'nexopos' ),
                'href'      =>      site_url( [ 'dashboard', 'nexopos/settings', 'items' ]),
            ),
            array(
                'title'     =>      __( 'Customers', 'nexopos' ),
                'href'      =>      site_url( [ 'dashboard', 'nexopos/settings', 'customers' ]),
            ),
            array(
                'title'     =>      __( 'Invoices/Receipts', 'nexopos' ),
                'href'      =>      site_url( [ 'dashboard', 'nexopos/settings', 'invoices' ]),
            ),
            array(
                'title'     =>      __( 'Advanced', 'nexopos' ),
                'href'      =>      site_url( [ 'dashboard', 'nexopos/settings', 'advanced' ]),
            ),
        ]);

        // Reports
        $menus  =   array_insert_before( 'nexopos-settings', $menus, 'nexopos-reports', [
            array(
                'title'     =>      __( 'Reports', 'nexopos' ),
                'disable'   =>      true,
                'icon'      =>      'fa fa-bar-chart'
            ),
            array(
                'title'     =>      __( 'Detailed Report', 'nexopos' ),
                'href'      =>      site_url( [ 'dashboard', 'nexopos/reports', 'detailed' ] )
            ),
            array(
                'title'     =>      __( 'Daily Sales', 'nexopos' ),
                'href'      =>      site_url( [ 'dashboard', 'nexopos/reports', 'daily' ] )
            ),
            array(
                'title'     =>      __( 'Incomes & Losses', 'nexopos' ),
                'href'      =>      site_url( [ 'dashboard', 'nexopos/reports', 'incomes_losses' ] )
            ),
            array(
                'title'     =>      __( 'Expenses', 'nexopos' ),
                'href'      =>      site_url( [ 'dashboard', 'nexopos/reports', 'expense' ] )
            ),
            array(
                'title'     =>      __( 'Taxes', 'nexopos' ),
                'href'      =>      site_url( [ 'dashboard', 'nexopos/reports', 'taxes' ] )
            ),
            array(
                'title'     =>      __( 'Stock', 'nexopos' ),
                'href'      =>      site_url( [ 'dashboard', 'nexopos/reports', 'stock' ] )
            ),
            array(
                'title'     =>      __( 'Cashiers', 'nexopos' ),
                'href'      =>      site_url( [ 'dashboard', 'nexopos/reports', 'cashiers' ] )
            ),
            array(
                'title'     =>      __( 'Customers', 'nexopos' ),
                'href'      =>      site_url( [ 'dashboard', 'nexopos/reports', 'customers' ] )
            ),
            array(
                'title'     =>  __( 'Orders', 'nexopos' ),
                'href'      =>      site_url( [ 'dashboard', 'nexopos/reports', 'orders' ] )
            )

        ]);

        // Sales
        $menus  =   array_insert_after( 'dashboard', $menus, 'nexopos-sales', [
            array(
                'title'     =>  __( 'Sales', 'nexopos' ),
                'icon'      =>  'fa fa-shopping-cart',
                'href'      =>  site_url( [ 'dashboard', 'nexopos/sales' ] )
            )
        ]);

        if( get_option( 'register_enabled' ) != 'yes' ) {
            // POS Menu
            $menus  =   array_insert_after( 'dashboard', $menus, 'nexopos', [
                array(
                    'title'     =>  __( 'Open POS', 'nexopos' ),
                    'icon'      =>  'fa fa-desktop',
                    'href'      =>  site_url( [ 'dashboard', 'nexopos' ] )
                )
            ]);
        } else {
            // Pos Registers
            $menus  =   array_insert_after( 'nexopos', $menus, 'nexopos-registers', [
                array(
                    'title'     =>  __( 'Registers', 'nexopos' ),
                    'icon'      =>  'fa fa-desktop',
                    'href'      =>  site_url( [ 'dashboard', 'nexopos/registers' ] )
                ),
                array(
                    'title'     =>  __( 'New Register', 'nexopos' ),
                    'icon'      =>  'fa fa-desktop',
                    'href'      =>  site_url( [ 'dashboard', 'nexopos/registers', 'add' ] )
                )
            ]);
        }

        return $menus;
    }
}
