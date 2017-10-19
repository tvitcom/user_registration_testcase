
/*/
//*
***/

var UsersManagement = angular.module('UsersManagement',[]);

UsersManagement.controller('UsersCRUD'),function($scope){
    $scope.currUserId=-1;
    $scope.profiles = [
        {
            "id":"1",
            "fio":"Adm",
            "whois":"Admin user",
            "email":"adminu@sh.ka",
            "credit_card":"asGDaadFHSdtrh54whwt\r",
        },
        {
            "id":"2",
            "fio":"1dm",
            "whois":"Admin",
            "email":"adminu@sh.ka", 
            "credit_card":"aaadFHSdtrh54whwt\r",

        },
        {
            "id":"3",
            "fio":"2dm",
            "whois":"dmin user",
            "email":"adminu@sh.ka",
            "credit_card":"asGDaadFHdtrh54whwt\r",
        },
        {
            "id":"4",
            "fio":"3dm",
            "whois":"Admi user",
            "email":"adminu@sh.ka",
            "credit_card":"asGDaadFHSdtrhwhwt\r",
        },
        {
            "id":"5",
            "fio":"4Adm",
            "whois":"Amin user",
            "email":"adminu@sh.ka",
            "credit_card":"asGDaFHSdtrh54whwt\r",
        },
    ];
    $scope.userAdd = function(){
        if ($scope.fio!=""){
            $scope.userList.push({
               // --ввести Id вместо id и раскоментить  "id":$scope.id,
                "fio":$scope.fio,
                "whois":$scope.whois,
                "credit_card":$scope.credit_card,
                "email":$scope.email, 
            });
            // --ввести Id вместо id и раскоментить $scope.id="";
            $scope.fio="";
            $scope.whois="";
            $scope.credit_card="";
            $scope.email="";
    
        }
    };
    $scope.userSave = function(id){
        if ($scope.currid>-1){
            var id=$scope.currid;
            // --ввести Id вместо id и раскоментить $scope.profiles[id]=$scope.id;
            $scope.profiles[id].fio=$scope.fio;
            $scope.profiles[id].whois=$scope.whois;
            $scope.profiles[id].credit_card=$scope.credit_card;
            $scope.profiles[id].email=$scope.email;
            
            // --ввести Id вместо id и раскоментить $scope.id="";
            $scope.fio="";
            $scope.whois="";
            $scope.credit_card="";
            $scope.email="";
            $scope.currId=-1;
        }
    };
    $scope.editUser = function(id){
        $scope.currId = id;
        // --ввести Id вместо id и раскоментить $scope.profiles[id]=$scope.id;
        $scope.fio=$scope.profiles[id].fio;
        $scope.whois=$scope.profiles[id].whois;
        $scope.credit_card=$scope.profiles[id].credit_card;
        $scope.email=$scope.profiles[id].email;
    };
    $scope.deleteUser = function(id){
        $scope.profiles.splice(id,1);
    };
    
};
