$(function () {

    var address=$("#paddress");
    address.keypress(function (event) {
    var address_Width =this.value.length+1;
    document.getElementById("paragraph").innerHTML=address_Width;
    });
   
    address.keyup(function(event) {
    var address_Width =this.value.length;
    document.getElementById("paragraph").innerHTML=address_Width;
    this.value.length-1;
    });
   
});