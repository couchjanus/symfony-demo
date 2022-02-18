// "@/store/modules/order";

import {OrderAction} from "@/store/types.actions";
import {OrdersService} from "../../services/orders";

const state = {
    orders: [],
};

const mutations = {
    [OrderAction.local.SET_ORDERS] (state, data) {
        state.orders = data;
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

};

const getters = {
    getOrders: state => state.orders,

};

export const order = {
    namespaced: true,
    state,
    mutations,
    actions,
    getters
};

