$(document).ready(function(){
    $("#boardSelector").change(function(e){
        window.location = '?teamid=' + $(this).val();
    });
});
