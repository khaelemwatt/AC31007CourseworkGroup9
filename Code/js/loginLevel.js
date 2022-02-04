window.sessionStorage;

var nav = document.getElementById("navbar");
console.log(sessionStorage.getItem("username"));
console.log(sessionStorage.getItem("level"));

if(sessionStorage.getItem("username") != null){
    if(sessionStorage.getItem("level") == 0){
    nav.innerHTML += '<a href="./createAdmin.html" class="btn btn-info" role="button">Create Admin</a>';
    }
    if(sessionStorage.getItem("level") <= 1){      
    nav.innerHTML += '<a href="./editEvent.html" class="btn btn-info" role="button">Edit Event</a>';
    nav.innerHTML += '<a href="./createEvent.html" class="btn btn-info" role="button">Create Event</a>'; 
    nav.innerHTML += '<a href="./CreateTour.html" class="btn btn-info" role="button">Create tour</a>'; 
    nav.innerHTML += '<a href="./viewTours.html" class="btn btn-info" role="button">view tour</a>';
    nav.innerHTML += '<a href="./suggestions.html class="btn btn-info role="button"Suggestions</a>';
    nav.innerHTML += '<a href="#" class="btn btn-info" role="button" onclick="logOut();">Log Out></a>;'
    }
    if(sessionStorage.getItem("level") <=2){
    //Placeholder for now
    }    
}else{    
    nav.innerHTML += '<a href="./login.html" class="btn btn-info" role="button">Login</a>';
}

function logOut() {
    sessionStorage.clear();
}