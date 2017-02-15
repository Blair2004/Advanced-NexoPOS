<script type="text/javascript">
    "use strict";
    tendooApp.config(['$routeProvider', function ($routeProvider) {
        $routeProvider
            <?php $this->load->module_view( 'nexopos_advanced', 'angular.items.config.route' );?>
            <?php $this->load->module_view( 'nexopos_advanced', 'angular.deliveries.config.route' );?>
            .otherwise({
                redirectTo: '/'
            });
    }]);
</script>
