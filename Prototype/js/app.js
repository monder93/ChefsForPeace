var app=angular.module('app',['ngRoute']);

app.controller('submitCtr',['$scope',function($scope){

 $scope.ok=function(){
        
        alert("Thank You for Contacting Us , u will recieve a message to your email soon, Good Day");
		
    }  
                             
}]);         



app.config(function($routeProvider){$routeProvider
.when('/', {
    templateUrl: "home.html"})
	
.when('/about', {
    templateUrl: "about.html"})
	
.when('/contact', {
    templateUrl: "contact.html"})
	
.when('/gallery', {
    templateUrl: "gallery.html"})
	
.when('/signin', {
    templateUrl: "signin.html"})

.when('/signup', {
    templateUrl: "signup.html"})	

.when('/events', {
    templateUrl: "events.html"})	
.otherwise({
    templateUrl: "home.html"})
	
});