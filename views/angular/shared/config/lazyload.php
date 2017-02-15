<script type="text/javascript">
    "use strict";
    tendooApp.config( function( $controllerProvider, $provide, $compileProvider ) {
        // Let's keep the older references.
        tendooApp._controller   = tendooApp.controller;
        tendooApp._service      = tendooApp.service;
        tendooApp._factory      = tendooApp.factory;
        tendooApp._value        = tendooApp.value;
        tendooApp._directive    = tendooApp.directive;

        // Provider-based controller.
        tendooApp.controller = function( name, constructor ) {
            $controllerProvider.register( name, constructor );
            return( this );
        };
        // Provider-based service.
        tendooApp.service = function( name, constructor ) {
            $provide.service( name, constructor );
            return( this );
        };
        // Provider-based factory.
        tendooApp.factory = function( name, factory ) {
            $provide.factory( name, factory );
            return( this );
        };
        // Provider-based value.
        tendooApp.value = function( name, value ) {
            $provide.value( name, value );
            return( this );
        };
        // Provider-based directive.
        tendooApp.directive = function( name, factory ) {
            $compileProvider.directive( name, factory );
            return( this );
        };
    });
</script>
