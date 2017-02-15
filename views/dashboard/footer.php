<?php
global $onNexoPOS;
if( $onNexoPOS == true ) {
    $this->load->module_view( 'nexopos_advanced', 'angular.shared.config.dom' );
    $this->load->module_view( 'nexopos_advanced', 'angular.shared.config.lazyload' );
    $this->load->module_view( 'nexopos_advanced', 'angular.shared.config.html5' );
    $this->load->module_view( 'nexopos_advanced', 'angular.shared.config.route' );
}
