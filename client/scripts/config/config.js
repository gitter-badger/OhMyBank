(function() {

    angular
        .module('app')
        .config(function($urlRouterProvider, RestangularProvider, ENV) {
            $urlRouterProvider.otherwise('/homepage');

            RestangularProvider.setBaseUrl(ENV.apiEndPoint);
        })

})();