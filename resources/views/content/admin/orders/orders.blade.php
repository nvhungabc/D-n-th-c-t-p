@extends('templates.layout')
@section('content')
    <!-- Page Content  -->
    <div id="content-page" class="content-page">
        <div class="container-fluid">
           <div class="row">
              <div class="col-sm-12">
                 <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                       <div class="iq-header-title">
                          <h4 class="card-title">Orders List</h4>
                       </div>
                    </div>
                    <div class="iq-card-body">
                       <div class="table-responsive">
                          <table class="data-tables table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width: 3%;">Order ID</th>
                                    <th style="width: 12%;">Customer Info</th>
                                    <th style="width: 40%;">Order Detail</th>
                                    <th style="width: 5%;">Total Price</th>
                                    <th style="width: 3%;">Pay</th>
                                    <th style="width: 5%;">Status</th>
                                    <th style="width: 10%;">Creation Date</th>
                                    <th style="width: 5%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order )
                                    <tr>
                                        <td>{{ $order->order_id }}</td>
                                        <td>
                                            <p>{{ $info->fname }}</p>
                                            <p>{{ $info->phone }}</p>
                                            <p>{{ $info->address }}</p>
                                        </td>
                                        <td style="max-width: 200px">
                                            @foreach ($order_info as $key => $value )
                                                @foreach ($value as $item )
                                                {{-- @php
                                                    dd(, strtotime($order->created_at));
                                                @endphp --}}
                                                    @if (strtotime($item->created_at) < strtotime($order->created_at))
                                                        <p>Product Name: {{ $item->product_name }}, Price: {{ number_format($item->price) }} đ, Quantity: {{ $item->quantity }} </p>
                                                    @endif
                                                @endforeach

                                            @endforeach
                                        </td>

                                        <td>{{ number_format($order->total_price) }} đ</td>
                                        <td>{{ $order->payment == 1 ? "Paid" : "COD" }}</td>
                                        <td>

                                            @if ($order->status == 0)
                                            <p class="mb-0">
                                                <button class="bg-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Chờ xác nhận" disabled><i class="ri-timer-flash-line"></i></button>
                                            </p>
                                            @elseif ($order->status == 1)
                                            <p class="mb-0">
                                                <button class="bg-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Đơn hàng đã được xác nhận và chờ đơn vị vận chuyển" disabled><i class="ri-exchange-box-line"></i></button>
                                            </p>
                                            @else
                                            <p class="mb-0">
                                                <button class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Đơn hàng đã hoàn tất" disabled><i class="ri-task-fill"></i></button>
                                            </p>
                                            @endif

                                        </td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>
                                        <div class="flex align-items-center list-user-action">
                                            <a {{ $order->status === 0 ? '' : 'hidden' }} class="bg-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xác nhận đơn hàng" href="{{ route('Admin.updateStatus', ['id'=>$order->id]) }}"><i class="ri-pencil-line"></i></a>
                                            <a {{ $order->status === 1 ? '' : 'hidden' }} class="bg-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="Đánh dấu đã hoàn thành" href="{{ route('Admin.updateStatus', ['id'=>$order->id]) }}"><i class="ri-task-fill"></i></a>
                                            <button {{ $order->status == 2 ? '' : 'hidden' }} class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Đơn hàng đã hoàn tất" disabled><i class="ri-task-fill"></i></button>
                                        </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
    </div>
@endsection
