export const OrdersService = {
    checkout(cartItems, address){
        return axios.post('/orders', {
            ...address, cart_items: cartItems
        });
    }
}