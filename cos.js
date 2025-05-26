function addToCart(productId, quantity = 1) {
    // Get cart from localStorage or initialize as empty array
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Check if product already exists in cart
    const index = cart.findIndex(item => item.productId === productId);

    if (index !== -1) {
        // If exists, update quantity
        cart[index].quantity += quantity;
    } else {
        // If not, add new product
        cart.push({ productId, quantity });
    }

    // Save updated cart back to localStorage
    localStorage.setItem('cart', JSON.stringify(cart));
}
