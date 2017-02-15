<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NexoPOS_Main_Controller extends Tendoo_Module
{
    public function __default()
    {
        global $onNexoPOS;
        $onNexoPOS          =   true;

        $this->Gui->set_title( __( 'NexoPOS', 'nexopos_advanced' ) );
        $this->load->module_view( 'nexopos_advanced', 'main_gui' );
    }

    public function controllers( $namespace )
    {
        $namespace  =   str_replace( '.js', '', $namespace );
        $this->load->module_view( 'nexopos_advanced', 'angular/' . $namespace . '/controllers/' . $namespace . 'Controller' );
    }

    /**
     *  Require
     *  @param
     *  @return
    **/

    public function templates( $namespace, $view = 'main' )
    {
        $this->load->module_view(
            'nexopos_advanced',
            'angular/' . $namespace . '/templates/' . $view
        );
    }

    /**
     *  Load Directive
     *  @param
     *  @return
    **/

    public function directives( $namespace, $view = 'main' )
    {
        $view  =   str_replace( '.js', '', $view );
        $this->load->module_view(
            'nexopos_advanced',
            'angular/' . $namespace . '/directives/' . $view
        );
    }

    /**
     *  Load Directive
     *  @param
     *  @return
    **/

    public function factories( $namespace, $view = 'main' )
    {
        $view  =   str_replace( '.js', '', $view );
        $this->load->module_view(
            'nexopos_advanced',
            'angular/' . $namespace . '/factories/' . $view
        );
    }

    /**
     *  Load Directive
     *  @param
     *  @return
    **/

    public function services( $namespace, $view = 'main' )
    {
        $view  =   str_replace( '.js', '', $view );
        $this->load->module_view(
            'nexopos_advanced',
            'angular/' . $namespace . '/services/' . $view
        );
    }

    /**
     *  Shared
     *  @param
     *  @return
    **/

    public function shared( $ressource, $file )
    {
        $file  =   str_replace( '.js', '', $file );
        $this->load->module_view(
            'nexopos_advanced',
            'angular/shared/' . $ressource . '/' . $file
        );
    }
}
