<script type="text/javascript">
    "use strict";
    tendooApp.run(function ($rootScope, $location) {

        var history = [];

        $rootScope.$on('$routeChangeSuccess', function() {
            history.push($location.$$path);
        });

        $rootScope.back = function () {
            var prevUrl = history.length > 1 ? history.splice(-2)[0] : "/";
            $location.path(prevUrl);
        };

    });
</script>
