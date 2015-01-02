'use strict';

angular.module('app.account', ['ui.router'])

    .config(['$stateProvider', function($stateProvider) {
        $stateProvider.state('homepage', {
            url: "/homepage",
            templateUrl: '/app/views/account/homepage.html',
            controller: 'HomepageCtrl'
        });
    }])

    .controller('HomepageCtrl', ['$scope', '$interval', 'Account', function($scope, $interval, Account) {
        Account.getList().then(function(accounts) {
            $scope.accounts = accounts;
        });
    }]);