window.addEventListener("load", init);

function init(){
    // When the user scrolls the page, execute myFunction
    var navbar = document.getElementById("menu");
    window.onscroll = function() {myFunction(navbar.offsetTop, navbar)};
}

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction(sticky, navbar) {
    if(navbar == null){
        console.log("Unable to obtain menu element");
    }

    if (window.scrollY >= sticky) {
        navbar.classList.add("sticky")
    } else{
        navbar.classList.remove("sticky");
    }
}