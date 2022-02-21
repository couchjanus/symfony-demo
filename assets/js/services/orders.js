export const OrdersService = {
    checkout(cart_items, address, order_info){
        return axios.post('/orders', {
            ...address, ...order_info, cart_items: cart_items
        });
    },
    fetchAll() {
        return axios.get('/fetch-orders')
    }
}