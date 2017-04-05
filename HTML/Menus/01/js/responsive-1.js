function topNavfunction(){
    var x = document.getElementById("myTopNav");
    
    //console.log(x.className);
    
    if(x.className === "topNav"){
        x.className += " responsive";
    }
    else{
        x.className = "topNav";
    }    
}