<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NexoPOS_Filters extends Tendoo_Module
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     *  Angular Dashboard dependency
     *  @param array
     *  @return array
    **/

    public function dependencies( $deps )
    {
        $deps[]     =   'ngRoute';
        $deps[]     =   'ngAnimate';
        $deps[]     =   'oc.lazyLoad';
        $deps[]     =   'ui-notification';
        $deps[]     =   'ui.bootstrap.datetimepicker';
        $deps[]     =   'ui.bootstrap';
        $deps[]     =   'ae-datetimepicker';
        return $deps;
    }
}
