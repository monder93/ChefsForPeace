var app=angular.module('app',['ngRoute']);

app.controller('submitCtr',['$scope',function($scope){

 $scope.ok=function(){
        
        alert("Thank You for Contacting Us , u will recieve a message to your email soon, Good Day");
		
    }  
                             
}]);         



app.config(function($routeProvider){$routeProvider
.when('/', {
    templateUrl: "home.php"})
	
.when('/about', {
    templateUrl: "about.php"})
	
.when('/contact', {
    templateUrl: "contact.php"})
	
.when('/gallery', {
    templateUrl: "gallery.php"})
	
.when('/signin', {
    templateUrl: "signin.php"})

.when('/registration', {
    templateUrl: "registration.php"})	

.when('/events', {
    templateUrl: "events.php"})	
.when('/profilepage',{
    templateUrl: "profilepage.php"})
.when('/chefs',{
    templateUrl: "chefs.php"})
.when('/comments',{
    templateUrl: "comments.php"})
.otherwise({
    templateUrl: "home.php"})

	
});


    
