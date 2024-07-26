
document.addEventListener('DOMContentLoaded', loadCart);

function loadCart() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartContents = document.getElementById('cart-contents');
    const totalItems = document.getElementById('total-items');
    const totalPrice = document.getElementById('total-price');

    cartContents.innerHTML = '';
    let total = 0;
    let itemCount = 0;

    cart.forEach((item, index) => {
        const itemDiv = document.createElement('div');
        itemDiv.classList.add('cart-item');
        itemDiv.innerHTML = `
            <div class="item-details">
                <img src="../images/${item.name.toLowerCase().replace(/ /g, '_')}.jpg" alt="${item.name}">
                <div>
                    <p><strong>Name:</strong> ${item.name}</p>
                    <p><strong>Author:</strong> ${item.author}</p>
                    <p><strong>Price:</strong> $${item.price}</p>
                </div>
                <div class="quantity-controls">
                    <button onclick="updateQuantity(${index}, -1)">-</button>
                    <span>${item.quantity}</span>
                    <button onclick="updateQuantity(${index}, 1)">+</button>
                </div>
            </div>
        `;
        cartContents.appendChild(itemDiv);
        total += item.price * item.quantity;
        itemCount += item.quantity;
    });

    totalItems.innerText = itemCount;
    totalPrice.innerText = `$${total.toFixed(2)}`;
}

function updateQuantity(index, change) {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    if (cart[index].quantity + change > 0) {
        cart[index].quantity += change;
    } else {
        cart.splice(index, 1);
    }
    localStorage.setItem('cart', JSON.stringify(cart));
    loadCart();
}