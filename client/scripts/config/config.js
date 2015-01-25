(function() {

    angular
        .module('app')
        .config(function($urlRouterProvider, RestangularProvider, ENV) {
            $urlRouterProvider.otherwise('/');

            RestangularProvider.setBaseUrl(ENV.apiEndPoint);
        })

})();