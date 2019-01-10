<?php

namespace App\Http\Controllers\Order;

use App\Model\CartModel;
use App\Model\OrderModel;
use App\Model\GoodsModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    public function add($id){
        $cart_goods = CartModel::where(['id'=>$id])->first();
        $cart_num=$cart_goods->num;
        if(empty($cart_goods)){
            echo '购物车中无商品';
        }
        $orde_amount=0;
        $goods_info = GoodsModel::where(['goods_id'=>$cart_goods->goods_id])->first();
        $num=$goods_info->store;
        $update=[
            'store'=>$num-$cart_num
        ];
        $orde_amount+=$cart_goods->num*$goods_info->price;
        $order_sn = OrderModel::generateOrderSN();
        $data=[
            'order_sn'=>$order_sn,
            'goods_id'=>$goods_info->goods_id,
            'uid'=>session('uid'),
            'add_time'=>time(),
            'order_amount'=>$orde_amount
        ];
        $res=OrderModel::insertGetId($data);
        if($res){
            echo '下单成功,订单号：'.$order_sn .' 跳转支付';
            CartModel::where(['id'=>$id])->delete();
            GoodsModel::where(['goods_id'=>$goods_info->goods_id])->update($update);
            header("refresh:2;/cart/list");
        }else{
            echo '下单失败';
        }
    }

}
