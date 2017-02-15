.when('/deliveries/:page?', {
    templateUrl: function( urlattr ) {
        if( typeof urlattr.page != 'undefined' ) {
            return 'templates/deliveries/' + urlattr.page;
        }
        return 'templates/deliveries/main';
    },
    controller: 'deliveries',
    resolve: {
        lazy: ['$ocLazyLoad', function($ocLazyLoad) {
            return $ocLazyLoad.load({
                name: 'Deliveries',
                files: [
                    'controllers/deliveries.js',
                    'factories/deliveries/crud.js',
                    'factories/deliveries/deliveriesFields.js',
                    'factories/deliveries/resource.js',
                    'factories/deliveries/factoryDeliveryTable.js',
                    'shared/factories/options.js',
                    'shared/factories/raw-to-options.js',
                    'shared/factories/validate.js',
                    'shared/factories/factoryTable.js',

                ]
            });
        }]
    }
})
