tendooApp.factory( 'itemTypes', function(){
    return [{
        namespace    :   'add.clothes',
        icon    :   'shirt',
        text    :   '<?php echo __( 'Vêtements & Accessoires', 'nexo' );?>',
        desc    :   '<?php echo _s( 'Produits pour boutique de vêtement : vestes, chemises, pantalon, chaussures, lunettes & tous les acccéssoires de mode.', 'nexo' );?>',
        disableVariation   :   false
    },{
        namespace    :   'medecine',
        icon    :   'medicine',
        text    :   '<?php echo __( 'Comprimé & Accessoires', 'nexo' );?>',
        desc    :   '<?php echo _s( 'Ce produit disposera des champs pour les produis des pharmacies.', 'nexo' );?>',
        disableVariation   :   false
    },{
        namespace    :   'add.coupon',
        icon    :   'coupon',
        text    :   '<?php echo __( 'Coupon & Bon de commande', 'nexo' );?>',
        desc    :   '<?php echo _s( 'Ce produit sera liée à un bon de commande existant.', 'nexo' );?>',
        disableVariation   :   true
    },{
        namespace    :   'beer',
        icon    :   'alcoholic',
        text    :   '<?php echo __( 'Bière & Liqueurs', 'nexo' );?>',
        desc    :   '<?php echo _s( 'Vous permettra de créer des produits pour un bar ou snack bar.', 'nexo' );?>',
        disableVariation   :   false
    },{
        namespace    :   'food',
        icon    :   'turkey',
        text    :   '<?php echo __( 'Repas & Gateaux', 'nexo' );?>',
        desc    :   '<?php echo _s( 'Vous permettra de manger de produits comestibles.', 'nexo' );?>',
        disableVariation   :   false
    },{
        namespace    :   'service',
        icon    :   'customer-service',
        text    :   '<?php echo __( 'Service', 'nexo' );?>',
        desc    :   '<?php echo _s( 'Vous pourrez créer un service vendable.', 'nexo' );?>',
        disableVariation   :   true
    },{
        namespace    :   'digital',
        icon    :   'music-player',
        text    :   '<?php echo __( 'Digital', 'nexo' );?>',
        desc    :   '<?php echo _s( 'Vous pourrez créer produit digital.', 'nexo' );?>',
        disableVariation   :   false
    }];
})
