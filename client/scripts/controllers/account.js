'use strict';

angular.module('app.account', ['ui.router'])

    .config(['$stateProvider', '$urlRouterProvider', function($stateProvider, $urlRouterProvider) {
        $stateProvider.state('homepage', {
            url: "/",
            templateUrl: 'views/account/homepage.html',
            controller: 'HomepageCtrl'
        });

        $urlRouterProvider.otherwise("/");
    }])

    .controller('HomepageCtrl', ['$scope', '$interval', 'Account', function($scope, $interval, Account) {
        Account.getList().then(function(accounts) {
            $scope.accounts = accounts;
        });
    }]);