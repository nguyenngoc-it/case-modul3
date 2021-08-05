$(document).ready(function (){
   let baseUrl= window.location.origin;
    $.ajax({
     url: baseUrl +'/api/search',
     type: "GET",
        data:{},
        dataType:'json',
        success: function (res){
            console.log(res);
        },
        error: function (){

        }
   });


});
