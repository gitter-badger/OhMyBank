'use strict';

angular.module('app', [
    'config',
    'ui.router',
    'restangular',
    'app.account'
])

.factory('Account', function(Restangular) {
    return Restangular.service('accounts');
})

.run(['$location', '$rootScope', function($location, $rootScope) {

}]);
