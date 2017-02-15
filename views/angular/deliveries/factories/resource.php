<?php
global $Options;
$this->load->config( 'rest' );
?>
tendooApp.factory( 'deliveryResource', function( $resource ) {
    return $resource(
        '<?php echo site_url( [ 'rest', 'nexopos_advanced', 'deliveries/:id' ]);?>',
        {
            id  :   '@_id'
        },{
            get  : {
                method : 'GET',
                headers			:	{
                    '<?php echo $this->config->item('rest_key_name');?>'	:	'<?php echo @$Options[ 'rest_key' ];?>'
                }
            },
            save    :   {
                method : 'POST',
                headers : {
                    '<?php echo $this->config->item('rest_key_name');?>'	:	'<?php echo @$Options[ 'rest_key' ];?>'
                }
            },
            update :    {
                method : 'PUT',
                headers : {
                    '<?php echo $this->config->item('rest_key_name');?>'	:	'<?php echo @$Options[ 'rest_key' ];?>'
                }
            },
            delete : {
                method : 'DELETE',
                headers : {
                    '<?php echo $this->config->item('rest_key_name');?>'	:	'<?php echo @$Options[ 'rest_key' ];?>'
                }
            }
        }
    );
});
