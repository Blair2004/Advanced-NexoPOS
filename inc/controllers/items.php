<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NexoPOS_Items_Controller extends Tendoo_Module
{
    public function index()
    {
        $data[ 'current_page' ]     =   'items';
        $this->Gui->set_title( __( 'NexoPOS &mdash; Items' ) );
        $this->load->module_view( 'nexopos_advanced', 'items/gui', $data );
    }

    /**
     *  New Items
     *  @param
     *  @return
    **/

    public function add()
    {
        echo 'Hello World';
    }
}
