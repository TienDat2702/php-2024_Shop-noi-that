var app = angular.module('myapp', ['ngRoute'])
    app.config(function ($routeProvider) {
        $routeProvider
            .when('/', {
                templateUrl: '../../app/View/home.html?' + Math.random(),
                controller: 'homeCtrl'
            })
            .when('/login', {
                templateUrl: '../../app/View/login.html?' + Math.random(),
                controller: 'loginCtrl'
            })
            .when('/register', {
                templateUrl: '../../app/View/register.html?' + Math.random(),
                controller: 'registerCtrl'
            })
            .when('/contact', {
                templateUrl: '../../app/View/contact.html?' + Math.random(),
                controller: 'registerCtrl'
            })
            .when('/blog', {
                templateUrl: '../../app/View/blog.html?' + Math.random(),
                controller: 'registerCtrl'
            })
            .when('/detail/:id', {
                templateUrl: '../../app/View/detail.html?' + Math.random(),
                controller: 'detailCtrl'
            })
            .when('/cart', {
                templateUrl: '../../app/View/cart.html?' + Math.random(),
                controller: 'cartCtrl'
            })
            .when('/checkout', {
                templateUrl: '../../app/View/checkout.html?' + Math.random(),
                controller: 'checkoutCtrl'
            })
            .when('/thankyou', {
                templateUrl: '../../app/View/thankyou.html?' + Math.random(),
                controller: 'checkoutCtrl'
            })
            .when('/product', {
                templateUrl: '../../app/View/product.html?' + Math.random(),
                controller: 'productCtrl'
            })
            .otherwise({
                template: '<h1> 404-Không tìm thấy trang </h1>'
            })
    })
    app.run(function ($rootScope, $timeout) {

        $rootScope.$on('routeChangeStart', function () {
            $rootScope.isLoading = true;
        });
        $rootScope.$on('routeChangeSuccess', function () {
            $timeout(function () {
                $rootScope.isLoading = false;
            }, 3000);
        });
        $rootScope.$on('routeChangeError', function () {
            $rootScope.isLoading = false;
            alert('Lỗi không tải được trang');
        });
    })
    app.filter('search', function () {
        return function (input, keyword, attr) {
            let kq = [];
            if (keyword) {
                keyword = keyword.toLowerCase();
                attr.forEach(thuoctinh => {
                    let tmp = input.filter(item => item[thuoctinh].toString().toLowerCase().indexOf(keyword) >= 0);
                    kq.push(...tmp);
                })
            } else {
                kq = input
            }
            return kq;
        }
    })
