
document.addEventListener('DOMContentLoaded', loadCart);
var cart = [];//initialize an empty array to hold cart items
var isCart;

//AJAX GET REQ
function loadCart() {
    var req = new XMLHttpRequest();
    req.onload = function() {
        try{
            cart = JSON.parse(req.responseText);//parse the JSON response to get cart items
            if(cart) // if cart is empty, skip
            updateCartContents(cart);//update the cart display
        } catch (error){
            //accessing from catalogue, user isn't logged in so it gives an error
        }
        
    };
    req.open("GET", "../ajaxphp/cartitems.php", true);
    req.send();
}

function updateCartContents(cart){
    // this cart.js is used by catalogue, so to ensure there are no errors 
    if(isCart){
        var cartContents = document.getElementById('cart-contents');
    
        //cartContents.innerHTML = ''; // gives an error
        
        function createItem(item, index){
            var itemDiv = document.getElementById(`item-${index}`);
            itemDiv = document.createElement('div');
            itemDiv.id = `item-${index}`;//div id item
            itemDiv.className = ('cart-item');
            var bookDetails = item.book_details; // simpler to user in the following html (also bc now uses db)
            itemDiv.innerHTML = `
                <div class="cart-item-image">
                    <img src="../images/${bookDetails.image}" alt="${bookDetails.title}">
                </div>
                <div class="cart-item-details">
                    <p><strong>Title:</strong> ${bookDetails.title}</p>
                    <p><strong>Author:</strong> ${bookDetails.author}</p>
                    <p><strong>Price:</strong> $${bookDetails.price}</p>
                </div>
                <div class="cart-item-quantity">
                    <button onclick="updateQuantity(${index}, -1)">-</button>
                    <span class="quantity">${item.quantity}</span> <!-- I added this class to your code to update numbers when clicked later -->
                    <button onclick="updateQuantity(${index}, 1)">+</button>
                </div>
            `;
            cartContents.appendChild(itemDiv);
        }
        cart.forEach(createItem);
        updateCartTotal();
    }
}

//i am going to edit this and turn it into an AJAX post request
// the function will also edit the number (span class="quantity")
function updateQuantity(index, change) {
    if (cart[index].quantity + change >= 0) {
        cart[index].quantity += change; // this is going to be sent via POST req after
        if(cart[index].quantity == 0){
            var itemToDel = document.getElementById(`item-${index}`); // delete item
            itemToDel.remove(); // removes the div of the entire item box
        } else {
            var qty = document.querySelector(`#item-${index} .quantity`);//to find the .quantity
            qty.textContent = cart[index].quantity; // text content enables us to change the actual text of that .quantity
        }
        
        updateCartTotal(); // for users to see immediately

        //AJAX post req
        var req = new XMLHttpRequest();
        req.open("POST", "../ajaxphp/update_cart.php", true);
        req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');//set the content type for the request
        req.send('book_id=' + encodeURIComponent(cart[index].book_id) + 
                 '&quantity=' + encodeURIComponent(cart[index].quantity));//request with updated quantity
    } else {
        // invalid, can't go lower than 0. 
        // It shouldn't even exist because we remove it
    }
}

function updateCartTotal(){
    //moved from loadCart to updateCartTotal
    let total = 0;
    let itemCount = 0;

    //added cart.foreach
    cart.forEach(function(item) {//loop through each item in the cart
        itemCount += item.quantity;
        total += item.book_details.price * item.quantity;
    });

    document.getElementById('total-items').textContent = itemCount;
    document.getElementById('total-price').textContent = `$${total.toFixed(2)}`;
}

//a function to get the number of items per book. for catalogue
function getCartQty(book_id){
    if(cart){
        cart.forEach(function(item, index){
            var currentBookId = item[1]; // book_id is at index 1
            var quantity = item[2];     // qty is at index 2
            if (currentBookId == book_id) {
                return quantity; // Return the quantity if the book_id matches
            }
        });
        return 0;
    }
}

//blocks access from catalogue
function isCart(){
    if(document.getElementById('cart-contents'))
        return TRUE;
    else
        return FALSE;
}
