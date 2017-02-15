<?php
get_instance()->load->model( 'Nexo_Shipping' );

$providers      =   get_instance()->Nexo_Shipping->get_providers();
?>
tendooApp.factory( 'providers', [ 'rawToOptions', function( rawToOptions ){
    var data    =   {
        raw     :   <?php echo json_encode( $providers );?>
    };

    data.options    =   rawToOptions( data.raw, 'ID', 'NOM' );

    return data;
}]);
