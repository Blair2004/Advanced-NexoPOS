var deliveries          =   function( crud, $scope, $http, deliveriesFields, deliveryResource, $location, validate, factoryTable, factoryDeliveryTable ) {
    $scope.crud             =   crud;
    $scope.fields           =   deliveriesFields;
    $scope.item             =   {};
    $scope.item.auto_cost   =   'no';
    $scope.validate         =   validate;
    $scope.table            =   factoryTable;
    $scope.table.columns    =   factoryDeliveryTable.columns;


    /**
     *  Update Date
     *  @param object date
     *  @return void
    **/

    $scope.updateDate   =   function( date, key ){
        $scope.item[ key ]    =   date;
    }

    $scope.submit       =   function(){
        $scope.item.author          =   <?= User::id()?>;
        $scope.item.date_creation   =   '<?php echo date_now();?>';

        if( angular.isDefined( $scope.item.shipping_date ) ) {
            $scope.item.shipping_date   =   moment( $scope.item.shipping_date ).format();
        }

        if( ! validate.run( $scope.fields, $scope.item ).isValid ) {
            return validate.blurAll( $scope.fields, $scope.item );
        }

        $scope.submitDisabled       =   true;

        deliveryResource.save(
            $scope.item,
            function(){
                $location.url( '/deliveries?notice=done' );
            },function(){
                $scope.submitDisabled       =   false;
            }
        )
    }

    /**
     *  Table Get
     *  @param object query object
     *  @return void
    **/

    $scope.table.get        =   function( data ){
        console.log( data );
    }
}

deliveries.$inject    =   [ 'crud', '$scope', '$http', 'deliveriesFields', 'deliveryResource', '$location', 'validate', 'factoryTable', 'factoryDeliveryTable' ];
tendooApp.controller( 'deliveries', deliveries );
