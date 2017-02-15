tendooApp.factory( 'item', function(){
    return {
        getTabs        :   function(){
            var tabs    =   new Array;
                tabs    =   [{
                    'namespace'     :   'coupon',
                    'title'         :   '<?php echo _s( 'Coupon', 'nexo' );?>',
                    'active'        :   false,
                    hide            :   function( item ) {
                        return item.namespace == 'coupon' ? false : true;
                    }
                },{
                    'namespace'     :  'basic',
                    'title'         :  '<?php echo _s( 'Prix', 'nexo' );?>',
                    'active'        :   true
                },{
                    'namespace'     :   'barcode',
                    'title'         :   '<?php echo _s( 'Etiquettes', 'nexo' );?>',
                    'active'        :   false
                },{
                    'namespace'     :   'stock',
                    'title'         :   '<?php echo _s( 'Stock', 'nexo' );?>',
                    active          :   false,
                    hide            :   function( item ){
                        return  _.indexOf([ 'services', 'coupon' ], item.namespace ) == -1 ? false : true;
                    }
                },{
                    'namespace'     :  'shipping',
                    'title'         :  '<?php echo _s( 'Caractéristiques', 'nexo' );?>',
                    active          :   false,
                    hide            :   function( item ){
                        return  _.indexOf([ 'clothes' ], item.namespace ) == -1 ? true : false;
                    }
                },{
                    'namespace'     :   'images',
                    'title'         :   '<?php echo _s( 'Images', 'nexo' );?>',
                    active          :   false
                },{
                    'namespace'     :   'galleries',
                    'title'         :   '<?php echo _s( 'Gallerie', 'nexo' );?>',
                    active          :   false
                }];
            return tabs;
        }
    };
});
