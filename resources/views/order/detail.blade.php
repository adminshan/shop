@extends('layouts.bst')
@section('content')

    <h1 align="center" style="color:red;">Welcome back </h1>
    <table class="table table-striped">


            <tr>订单号:{{$list->order_sn}}</tr>
            <tr>名称:{{$goods->goods_name}}</tr>
            <tr>单价:{{$goods->price}}</tr>
            <tr>数量:{{$list->order_num}}</tr>
            <tr>总计:{{$list->order_amount / 100}}</tr>
            <tr>时间:{{date("Y-m-d H:i:s",$list ->add_time)}}</tr>
            <tr>操作:<a href="/order/pay/{{$list->goods_id}}">支付</a></tr>


    </table>
@endsection