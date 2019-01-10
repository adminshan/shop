@extends('layouts.bst')
@section('content')

    <h1 align="center" style="color:red;">Welcome back </h1>
    <table class="table table-striped">
        <tr>

            <td>订单号</td>
            <td>总计</td>
            <td>时间</td>
            <td>操作</td>
        </tr>
        @foreach($list as $v)
            <tr>
                <td>{{$v->order_sn}}</td>
                <td>{{$v->order_amount / 100}}</td>
                <td>{{date("Y-m-d H:i:s",$v ->add_time)}}</td>
                <td><a href="/order/pay/{{$v->order_id}}">支付</a>|<a href="/order/detail/{{$v->order_id}}">查看详情</a>|<a
                            href="/order/del{{$v->order_id}}">删除</a></td>
            </tr>

        @endforeach
    </table>
@endsection