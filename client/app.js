'use strict';

// Declare app level module which depends on views, and components
angular.module('app', [
        'ui.router',
        'restangular',
        'ngTable',
        'app.account'
    ])

    .config(['$urlRouterProvider', 'RestangularProvider', function($urlRouterProvider, RestangularProvider) {
        $urlRouterProvider.otherwise('/homepage');

        RestangularProvider.setBaseUrl('/app_dev.php/api/');
        RestangularProvider.setDefaultHttpFields({cache: true});
    }])

    .factory('Account', function(Restangular) {
        return Restangular.service('accounts');
    })

    .run(['$location', '$rootScope', function($location, $rootScope) {

    }]);