// "@/store/modules/order";

import {OrderAction} from "@/store/types.actions";
import {OrdersService} from "../../services/orders";

const state = {
    orders: [],
};

const mutations = {
    [OrderAction.local.SET_ORDERS] (state, data) {
        state.orders = data.orders;
    },

};

const actions = {
    [OrderAction.remote.MAKE_ORDER]: (context, {cart_items, address, order_info}) => {
        return new Promise(resolve => {
            return OrdersService.checkout(cart_items, address, order_info)
                .then(response => {
                    if(response.data.success){
                        context.dispatch('cart/CLEAR_CART', false, {root:true});
                        resolve(response.data)
                    }
                })
                .catch(err => {
                    console.log(err);
                });
        });

    },

    [OrderAction.remote.FETCH_ALL](context){
        return new Promise(resolve => {
            return OrdersService.fetchAll().then(response => {
                if(response.data.success){
                    context.commit(OrderAction.local.SET_ORDERS, {
                        orders: JSON.parse(response.data.orders)
                    });
                    resolve(response.data);
                }
            })
                .catch(err => console.log(err))
        });
    },

};

const getters = {
    getOrders: state => state.orders,
    getOrderCount: state => state.orders.length,
};

export const order = {
    namespaced: true,
    state,
    mutations,
    actions,
    getters
};

