<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NexoPOS_Assets extends Tendoo_Module
{
    public function __construct()
    {
        parent::__construct();
        $bower_url      =   '../modules/nexopos_advanced/bower_components/';
        $js_url         =   '../modules/nexopos_advanced/js/';
        $css_url        =   '../modules/nexopos_advanced/css/';
        $root_url       =   '../bower_components/';

        $this->enqueue->css_namespace( 'dashboard_header' );
        $this->enqueue->css( $bower_url . 'angular-ui-notification/dist/angular-ui-notification.min' );
        $this->enqueue->css( $root_url . 'angular-bootstrap-datetimepicker/src/css/datetimepicker' );
        $this->enqueue->css( $bower_url . 'eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min' );

        $this->enqueue->js_namespace( 'dashboard_footer' );
        $this->enqueue->js( 'js/string.format', module_url( 'nexopos_advanced' ) );
        $this->enqueue->js( '../bower_components/angular-route/angular-route.min' );
        $this->enqueue->js( '../bower_components/angular-resource/angular-resource.min' );
        // $this->enqueue->js( '../bower_components/angular-animate/angular-animate.min' );
        $this->enqueue->js( $bower_url . 'oclazyload/dist/ocLazyLoad.min' );
        $this->enqueue->js( $bower_url . 'angular-ui-notification/dist/angular-ui-notification.min' );
        $this->enqueue->js( $bower_url . 'angular-ui-notification/dist/angular-ui-notification.min' );
        $this->enqueue->js( $bower_url . 'moment/min/moment.min' );
        $this->enqueue->js( $bower_url . 'angular-numeraljs/dist/angular-numeraljs.min' );
        $this->enqueue->js( $bower_url . 'angular-bootstrap/ui-bootstrap.min' );
        $this->enqueue->js( $bower_url . 'angular-bootstrap/ui-bootstrap-tpls.min' );
        $this->enqueue->js( $root_url . 'angular-bootstrap-datetimepicker/src/js/datetimepicker' );
        $this->enqueue->js( $root_url . 'angular-bootstrap-datetimepicker/src/js/datetimepicker.templates' );

        // bootstrap datetime picker
        $this->enqueue->js( $bower_url . 'eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min' );
        $this->enqueue->js( $bower_url . 'angular-eonasdan-datetimepicker/dist/angular-eonasdan-datetimepicker.min' );
    }
}
