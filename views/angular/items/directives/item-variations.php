tendooApp.directive( 'itemVariation', function(){
    return {
        template :  <?php echo json_encode( $this->load->module_view( 'nexopos_advanced', 'angular.items.templates.parts', null , true ) );?>,
        controller  :   function( $scope, itemTypes, item, fields, providers, $rootScope ) {
            $scope.item         =   item;
            $scope.fields       =   fields;
            $scope.providers    =   providers;
            $scope.$broadcast   =   $rootScope.$broadcast;
            $scope.itemTypes    =   itemTypes;
        }
    }
});
