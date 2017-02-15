<?php
/**
 * Load All Trait Available
**/

foreach (glob(dirname(__FILE__) . "/traits/*.php") as $filename) {
    include_once($filename);
}
