<?php if (strlen($_GET["name"]) > 0): ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rafas Home page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>    
    <style>
        body {
           /* background-image: linear-gradient( green, yellow,  red);*/
            margin: 0px;   
        }

        #logo {
          text-shadow: 2px 0 0 #fff, -2px 0 0 #fff, 0 2px 0 #fff, 0 -2px 0 #fff, 1px 1px #fff, -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff;
        }
        .top-buffer { margin-top:20px; }
        img{
            width: 50%;
            max-width: 250px;
            display: block;
            float: left;
            
        }
        #controle{
            position: absolute;
            top: 20px;
            right: 20px;
        }
    </style>
    
</head>
<body ng-app="myApp" ng-controller="myCtrl">
    
    <div id="controle">
        <select ng-model="selectedName" ng-options="name for name in names" ng-change="selectCat(selectedName)"></select>
    </div>
    <img ng-repeat="photo in photos" ng-src=https://rafashomepage7.herokuapp.com/photos/{{photo}} >
    
<script>    
    
        var photos = [];
        var app = angular.module('myApp', []);
        app.controller('myCtrl', function($scope, $http) {
            
            $http.get("https://rafashomepage7.herokuapp.com/photos.php")
            .then(function(result){
                photos = result.data.split("@").filter(e=>e);
                $scope.photos = photos;
                
                $scope.names = result.data
                                    .replace(/[0-9]/g, '')
                                    .replace(/.gif|.jpe?g|.tiff|.png|.webp|.bmp/g, '')
                                    .split("@")
                
                $scope.names = $scope.names.filter(function(item, pos) {
                                        return $scope.names.indexOf(item) == pos;
                                    });
                
            })
            
            
            $scope.selectCat = function(name){
                $scope.photos =  photos.filter((photo) => photo.startsWith(name));
            }
            
        });
   
    </script>
</body>
</html>
<? else: echo 'wrong password'; endif ?>