var categories               =   function( $scope, $location ){
    $scope.page         =   'Categories';
    $scope.categorie    =   'Categories New';
};
categories.$inject           =   [ '$scope', '$location' ];
tendooApp.controller( 'categories', categories );
