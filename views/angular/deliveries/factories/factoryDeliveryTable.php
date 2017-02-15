tendooApp.factory( 'factoryDeliveryTable', function(){
    return {
        columns     :   [
            {
                text    :   '<?php echo _s( 'Identifiant', 'nexopos_advanced' );?>',
                namespace   :   'id'
            },
            {
                text    :   '<?php echo _s( 'Intitulé', 'nexopos_advanced' );?>',
                namespace   :   'name'
            },
            {
                text    :   '<?php echo _s( 'Coût d\'achat', 'nexopos_advanced' );?>',
                namespace   :   'author_name'
            },
            {
                text    :   '<?php echo _s( 'Coût Automatique', 'nexopos_advanced' );?>',
                namespace   :   'auto_cost'
            },
            {
                text    :   '<?php echo _s( 'Livré le', 'nexopos_advanced' );?>',
                namespace   :   'shipping_date'
            },
            {
                text    :   '<?php echo _s( 'Crée le', 'nexopos_advanced' );?>',
                namespace   :   'date_creation'
            },
            {
                text    :   '<?php echo _s( 'Modifié le', 'nexopos_advanced' );?>',
                namespace   :   'date_modification'
            },
            {
                text    :   '<?php echo _s( 'Par', 'nexopos_advanced' );?>',
                namespace   :   'author_name'
            }
        ]
    }
});
