<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NexoPOS_Events extends Tendoo_Module
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     *  register actions
     *  @param
     *  @return
    **/

    public function register_actions()
    {
        $this->events->add_action( 'load_dashboard', [ $this, 'dashboard' ] );
    }

    /**
     *  Register Filters
     *  @param void
     *  @return void
    **/

    public function register_filters()
    {

    }

    /**
     *  Dashboard Init
     *  @param void
     *  @return void
    **/

    public function dashboard()
    {
        $this->events->add_filter( 'admin_menus', [ $this->menus, 'register' ] );
    }
}
