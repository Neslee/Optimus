    var currentdate = new Date();
    var hour=currentdate.getHours();
    var minute=currentdate.getMinutes();
    var second=currentdate.getSeconds();
    
function clock()
{  
    if(hour>12)
    {
    hour=hour-12;
    }

    hour=180+hour*30+minute*0.5;
    minute=180+minute*6;
    second=second*6;
 
    document.getElementsByClassName("seconds_hand")[0].style.transform="rotate("+second+"deg)";
    document.getElementsByClassName("minute_hand")[0].style.transform="rotate("+minute+"deg)";
    document.getElementsByClassName("hour_hand")[0].style.transform="rotate("+hour+"deg)";
    setInterval(second_hand,1000);
    // setInterval(minute_hand,60000);
    setInterval(hour_hand,150000);
}

function second_hand(){
    second+=6;
    var ref=document.getElementsByClassName("seconds_hand")[0];
    ref.style.transform="rotate("+second+"deg)";
    ref.style.transformOrigin="top left";
    if(second%360==180)
    {
        minute_hand();
    }
}
function minute_hand(){
    minute+=6;
    var ref=document.getElementsByClassName("minute_hand")[0];
    ref.style.transform="rotate("+minute+"deg)";
    ref.style.transformOrigin="top left";
}
function hour_hand(){
    hour+=30;
    var ref=document.getElementsByClassName("hour_hand")[0];
    ref.style.transform="rotate("+hour+"deg)";
    ref.style.transitionOrigin="top left";
}


    
