<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->Gui->col_width(1, 4);

$this->Gui->add_meta( array(
    'col_id'    =>  1,
    'namespace' =>  'gui_main',
    'type'      =>  'unwrapped'
) );

$this->Gui->add_item( array(
'type'        =>    'dom',
'content'    =>    $this->load->module_view( 'nexopos_advanced', 'main_dom', null, true )
), 'gui_main', 1 );

$this->Gui->output();
