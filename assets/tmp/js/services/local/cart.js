import  {LocalStorageService} from './local-storage';

const CART_KEY = 'cart';

export const CartService = {

    addItem(product, quantity) {
        let cartItems = JSON.parse(LocalStorageService.get(CART_KEY)) || [];
        let cartItem = cartItems.find(item => item.id === product.id);

        if (cartItem){
                cartItem.quantity += quantity;
        } else {
                const {id, name, price, cover} = product;
                cartItem = {
                    id, name, price, cover, quantity
                };
                cartItems.push(cartItem);
        }
        LocalStorageService.set(CART_KEY, JSON.stringify(cartItems));

    },

    getCart() {
        if (LocalStorageService.get(CART_KEY)) {
            return JSON.parse(LocalStorageService.get(CART_KEY));
        }
    },

    removeItem(product) {
        if(LocalStorageService.get(CART_KEY)){
            let cartItems = JSON.parse(LocalStorageService.get(CART_KEY));
            cartItems = cartItems.filter(item => item.id !== product.id);
            return cartItems;
        }
        return [];
    },

    emptyCart() {
        LocalStorageService.remove(CART_KEY);
    }
}