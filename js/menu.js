window.addEventListener("load", init);

function init(){
    // When the user scrolls the page, execute myFunction
    var navbar = document.getElementById("menu");
    window.onscroll = function() {myFunction(navbar.offsetTop, navbar)};

    // AJAX to get change cart button to homepage button if on cart page already
    if (location.href.replace(/(.+\w\/)(.+)/,"/$2") == '/cart.php')
    {
        var cartbutton = document.getElementById('cart');
        var req = new XMLHttpRequest();
        req.onload =
        function()
        {
            cartbutton.innerHTML = this.responseText;
        }
        req.open("GET", "../ajaxphp/switchButton.php", true);
        req.send();
    }

    // When on the logged in version of menu uses AJAX to get the username to display to user
    var text = document.getElementById('userin');
    if (text !== null){
        var req = new XMLHttpRequest();
        req.onload = 
        function()
        {
            text.innerHTML = this.responseText;
        }
    ;
    req.open("GET", "../ajaxphp/getName.php", true);
    req.send();
    }
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