tendooApp.directive( 'loader', function ($rootScope, $timeout) {
    return {
        // restrict: 'A',
        // replace: true,
        template: '<div class="nexo-overlay" style="width: 100%; height: 100%; background: rgba(255, 255, 255, 0.9); z-index: 5000; position: absolute; top: 0px; left: 0px;"><i class="fa fa-refresh fa-spin nexo-refresh-icon" style="color: rgb(0, 0, 0); font-size: 50px; position: absolute; top: 50%; left: 50%; margin-top: -25px; margin-left: -25px; width: 44px; height: 50px;"></i></div>',
        link: function (scope, elem, attrs) {
            var hideLoaderTimeout;
            var minLoaderDisplayTime = attrs.minLoaderDisplay || 200;
            scope.data = {
                startTime: undefined
            };

            var unregisterStart = $rootScope.$on('$routeChangeStart', function (event, toState, toParams, fromState) {
                scope.data.startTime = new Date();
                elem.removeClass('ng-hide');
            });

            var unregisterSuccess = $rootScope.$on('$routeChangeSuccess', function (event, toState, toParams, fromState) {
                var transitionTime = new Date() - scope.data.startTime;
                var loaderTimeout = minLoaderDisplayTime - transitionTime;
                loaderTimeout = loaderTimeout > 0 ? loaderTimeout : 0;
                hideLoaderTimeout = $timeout(function () {
                    elem.addClass('ng-hide');
                }, loaderTimeout);


            });

            var unregisterError = $rootScope.$on('$routeChangeError', function () {
                elem.addClass('ng-hide');
            });

            scope.$on('destroy', function () {
                unregisterStart();
                unregisterSuccess();
                unregisterError();
                $timeout.cancel(hideLoaderTimeout);
            });
        }
    };
});
