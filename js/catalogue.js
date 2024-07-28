document.addEventListener('DOMContentLoaded', getCatalogue); //wait for the page to fully load before executing loadCart
// there's an event listener at the bottom of catalogue


var catalogue = [];

//AJAX GET REQ
function getCatalogue(){
    var req = new XMLHttpRequest();
    req.onload = function() {
        catalogue = JSON.parse(req.responseText);//parse the JSON response to get cart items
        loadCatalogue(catalogue);//update the cart display
    };
    req.open("GET", "../ajaxphp/loadcatalogue.php", true);
    req.send();
}

//With the information, load the database and create it
function loadCatalogue(){
    var bookCatalog = document.getElementById('book-catalog');//get the element where cart items will be displayed
    bookCatalog.innerHTML = '';//clear any existing content in the cart if we ever update cart.html

    catalogue.forEach((item, index) => {//loop through each item in the cart
        var itemDiv = document.getElementById(`item-${index}`); // Check if the item div already exists

        itemDiv = document.createElement('div'); // Create a div for the item
        itemDiv.id = `item-${index}`; // Set the div id
        itemDiv.className = 'book'; // Add class name for styling
        bookCatalog.appendChild(itemDiv); // Append the new item div to the catalog container

        // Set innerHTML of itemDiv directly
        itemDiv.innerHTML = `
            <div class="book-image">
                <img src="../images/${item.image}" alt="${item.title}">
            </div>
            <div class="book-details">
                <h3>${item.title}</h3>
                <p class="author">${item.author}</p>
                <div class="price">
                    <p>$${item.price}</p>
                </div>
                <button class="add-to-cart" data-index="${index}">Add to Cart</button>
            </div>
        `;
    });
    document.getElementById('book-catalog').addEventListener('click', function(event) {
        if (event.target.classList.contains('add-to-cart')) {
            var index = event.target.getAttribute('data-index');
            var item = catalogue[index];
            addToCart(item);
        }
    });
}

function addToCart(item) {
    var req = new XMLHttpRequest();
    req.open("POST", "../ajaxphp/update_cart.php", true);
        req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');//set the content type for the request
        if(!cart.length){
            req.send('book_id=' + encodeURIComponent(item.book_id) + 
            '&quantity=' + encodeURIComponent(1));//request with updated quantity
        } else {
            req.send('book_id=' + encodeURIComponent(item.book_id) + 
            '&quantity=' + encodeURIComponent(getCartQty(item.book_id)+1));//request with updated quantity
        }
        }
