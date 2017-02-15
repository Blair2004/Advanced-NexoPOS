<?php
get_instance()->load->model( 'Nexo_Shipping' );
get_instance()->load->model( 'Nexo_Categories' );

$shippings      =   get_instance()->Nexo_Shipping->get_shipping();
$categories     =   get_instance()->Nexo_Categories->get();
?>

var items               =   function( $scope, $http, $location, itemTypes, item, fields, providers, $routeParams ) {

    /**
     *  Add Group. Duplicate group fields
     *  @param  object
     *  @return void
    **/

    $scope.addGroup         =   function( group ) {
        group.push({});
    }

    /**
     *  Add Variation
     *  @param
     *  @return
    **/

    $scope.addVariation         =   function(){
        if( item.variations.length == 10 ) {
            NexoAPI.Notify().info( '<?php echo _s( 'Attention', 'nexo' );?>', '<?php echo _s( 'Vous ne pouvez pas créer plus de 10 variations d\'un même produit.', 'nexo' );?>')
            return;
        }

        var singleVariation         =   {
            name        :   item.variations[
                item.variations.length - 1
            ].name,
            tabs        :   item.getTabs()
        };

        item.variations.push( singleVariation );
    }

    /**
     *  Active Tab
     *  @param
     *  @return
    **/

    $scope.activeTab        =   function( $event, variationIndex, tabIndex ) {
        angular.element( $event.currentTarget )
        .parent( 'li' )
        .siblings()
        .removeClass( 'active' );

        angular.element( $event.currentTarget )
        .parent( 'li' )
        .addClass( 'active' );

        _.each( item.variations[variationIndex].tabs, function( value ) {
            value.active    =   false;
        });

        item.variations[variationIndex].tabs[ tabIndex ].active     =   true;
    }

    /**
     *  Detect Item Namespace
     *  @param void
     *  @return void
    **/

    $scope.detectItemNamespace      =   function(a, b){

        // Reset Variations if he comes from item selection
        if( $scope.previousPath == '/create' ) {
            item.variations         =   [{
                name        :       item.name,
                tabs        :       item.getTabs()
            }];
        }

        switch( $location.path() ) {
            case "/items/add/clothes" :
                item.namespace    =   'clothes';
            break;
            case "/items/add/coupon" :
                item.namespace   =   'coupon';
            break;
        }

        // Save Namespace
        item.typeNamespace  =   $location.path().substr(1).replace( '/', '.' );
        item.rawNamespace   =   $location.path().substr(1);

        // Selected Type
        _.each( itemTypes, function( value, key ) {
            if( value.namespace == item.typeNamespace ) {
                item.selectedType   =   value;
            }
        });
    }

    /**
     *  Get Icon using URL
     *  @param string icon
     *  @return string
    **/

    $scope.getIcon          =   function( string ){
        return '<?php echo module_url( 'nexo' ) . 'images/items/'; ?>' + string;
    }

    /**
     *  Remove Group
     *  @param int group index
     *  @return void
    **/

    $scope.removeGroup      =   function( $index, $groups ) {
        $groups.splice( $index, 1 );
    }

    /**
     *  Remove Variation
     *  @param int variation index
     *  @return void
    **/

    $scope.removeVariation  =   function( $index ){
        item.variations.splice( $index, 1 );
    }

    /**
     *  Select Type
     *  @param string item stype
     *  @return void
    **/

    $scope.selectType       =   function( type ){
        $location.path( type );
    }

    /**
     *  Show or Hide UI
     *  @param string ui namespace
     *  @return void
    **/

    $scope.show             =   function( namespace ) {
        if( namespace == 'selectType' ) {
            $scope.showItemUI       =   false;
        } else if( namespace == 'showItemUI' ){
            $scope.showItemUI       =   true;
        }
    }

    /**
     *  tabContent is active, check whether a tab is already active
     *  @param
     *  @return
    **/

    $scope.tabContentIsActive   =   function( tabActive, index ) {
        if( angular.isDefined( tabActive ) ) {
            return tabActive;
        }

        if( index == 0 ) {
            return true;
        }
        return false;
    }

    /**
     *  Toggle Tip
     *  @param object field
     *  @return boolean
    **/

    $scope.toggleFieldTip           =   function( field ) {
        if( angular.isUndefined( field.tip ) ) {
            field.tip   =   false;
        }
        return field.tip  = ! field.tip;
    }

    /**
     *  Render Attrs
     *  @param
     *  @return
    **/

    $scope.renderAttributes         =   function( object ) {
        if( angular.isDefined( object ) ) {
            var attrs   =   '';
            _.each( object, function( value, key ) {
                attrs   +=  key + '="' + value + '" ';
            });

            return attrs;
        }
    }

    /**
     *  Reset Group if not defined
     *  @param object group object
     *  @return void
    **/

    $scope.resetGroup               =   function( group ) {
        if( angular.isUndefined( group ) ) {
            return [{}];
        }
        return group
    }

    /**
     *  Restore Slashes on item Type
     *  @param string item slash
     *  @return string
    **/

    $scope.restoreSlashes           =   function( string ) {
        return string.replace( '.', '/' );
    }

    // Yes No Options
    $scope.YesNoOptions     =   [{
        value       :   'yes',
        label       :   '<?php echo _s( 'Oui', 'nexo' );?>'
    },{
        value       :   'no',
        label       :   '<?php echo _s( 'Non', 'nexo' );?>'
    }];

    $scope.deliveries           =   <?php echo json_encode( $shippings );?>;
    $scope.categories           =   <?php echo json_encode( $categories );?>;
    $scope.groupLengthLimit     =   10;
    $scope.itemTypes            =   itemTypes;

    // Item Status
    item.status                 =   $scope.YesNoOptions[0];
    item.variations             =   new Array;
    item.name                   =   new String;
    item.category               =   new Object;

    $scope.docHeight            =   ( parseFloat( angular.element( '.content-wrapper' ).css( 'min-height' ) ) - 100 ) + 'px';

    // Watch variation
    $scope.$watch( 'item.variations', function(){
        if( item.variations.length == 0 ) {
            item.variations.push({
                name        :       item.name,
                tabs        :       item.getTabs()
            });
        }

        // Change Variation Name
        if( angular.isUndefined( item.variations[0].name ) ) {
            item.variations[0].name    =   '';
        }

    });

    // Detect item Namespace
    $scope.detectItemNamespace();

    $scope.$on('$routeChangeSuccess', function(next, current) {
        $scope.detectItemNamespace(current, next);
    });

    $scope.$on('$routeChangeStart', function(next, current) {
        $scope.previousPath    =   $location.path();
    });
};

items.$inject           =   [ '$scope', '$http', '$location', 'itemTypes', 'item', 'fields', 'providers', '$routeParams' ];

tendooApp.controller( 'items', items );
