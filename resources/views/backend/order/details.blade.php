@extends('layouts.admin')
@section('admin_content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Order Details</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>

            
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="callout callout-info">
          
        <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              
              <div class="col-sm-4 invoice-col">
                <address>
                  Name: <strong>{{ $info->name }}</strong><br>
                  Phone: <strong>{{ $info->phone }}</strong><br>
                  Address: <strong>{{ $info->shipping_addr }}</strong>
                </address>
              </div>

              <div class="col-sm-4 invoice-col">
                Payment By: <b>{{ $info->payment_by }}</b><br>
                Payment Amount: <b>{{ $total }}</b> <br>
                {{--<b>Payment Status:</b> @if($order->payment_status == 0) <span class="badge badge-danger">Due</span> @elseif($order->payment_status==1) <span class="badge badge-success">Paid</span> @endif--}}
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                Order ID:<b>{{ $info->id }}</b> <br>
                Order Date:<b>{{ $info->order_date }}</b> <br>
                Order Status:<b>{{ $status->status }}</b> 
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- Table row -->

            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>@if($module=='Shop') Product Name @elseif($module=='Restaurant') Menu Name @endif</th>
                      <th>Category</th>
                      <th>@if($module=='Shop') Shop Name @elseif($module=='Restaurant') Restaurant Name @endif</th>
                      <th>Unit Cost</th>
                      <th>Quantity</th>
                      <th>Total</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $order)
                      @php
                      $category='';
                      $prodOrMenu='';
                      $shopOrRes = '';
                        if ($module=='Shop') {
                          $product = DB::table('shopproducts')->where('id',$order->product_id)->first();
                          $product_category = DB::table('productcategories')->where('id',$product->productcategory_id)->first();
                          $category = $product_category->name_en;
                          $prodOrMenu = $product->name_en;
                          $shop = DB::table('shops')->where('id',$order->shop_id)->first();
                          $shopOrRes = $shop->name_en;
                        }else if($module == 'Restaurant'){
                          $menu = DB::table('menus')->where('id',$order->menu_id)->first();
                          $menu_category = DB::table('menucategories')->where('id',$menu->menucategory_id)->first();
                          $category = $menu_category->name_en;
                          $prodOrMenu = $menu->name_en;
                          $restuarant = DB::table('restaurants')->where('id',$order->restaurant_id)->first();
                          $shopOrRes = $restuarant->name_en;
                        }
                      @endphp
                      <tr>
                          <td>{{ $prodOrMenu }}</td>
                          <td>{{ $category }}</td>
                          <td>{{ $shopOrRes }}</td>
                          <td>{{ $order->unit_cost }}</td>
                          <td>{{ $order->unit_quantity }}</td>
                          <td>{{ $order->unit_total }}</td>
                      </tr>
                    @endforeach  
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
              <!-- accepted payments column -->
              <div class="col-6">
                
                  
              </div>
              <!-- /.col -->
              <div class="col-6">
               {{--  <p class="lead">Amount Due 2/22/2014</p> --}}
                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      {{-- <th style="width:50%">Total:</th>
                      <td>‎<b>৳</b> </td> --}}
                    </tr>
                    {{-- <tr>
                      <th>Shipping Cost</th>
                      <td>‎<b>৳</b> </td>
                    </tr> --}}
                    {{-- <tr>
                      <th>Shipping:</th>
                      <td>$5.80</td>
                    </tr> --}}
                    <tr>
                      <th>Grand Total:</th>
                      <td>‎<b>৳</b>{{ $total }} </td>
                    </tr>
                  </table>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- this row will not appear when printing -->
            <div class="row no-print">
              <div class="col-12">
                <a href="{{ route('print.invoice',$info->id) }}" target="_blank" class="btn btn-info text-white" style="text-decoration:none;"><i class="fas fa-print"></i> Print</a>
                {{-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                Payment
                </button>
                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                <i class="fas fa-download"></i> Generate PDF
                </button> --}}
                {{-- @if($order->order_status == 0)
                  <a href="{{ route('order.delivery',$order->id) }}" class="btn btn-success float-right text-white" style="text-decoration: none;">
                   Approve
                  </a>
                @endif --}}
              </div>
            </div>
            <div class="mt-4">
              @if($status->status == 'Pending') <button class="btn btn-danger btn-block"><b>Pending</b></button> @elseif($status->status == 'Processing') <button class="btn btn-info btn-block"><b><i class="fas fa-sync-alt"></i> Processing</b></button>@elseif($status->status == 'Complete') <button class="btn btn-success btn-block"><b><i class="fas fa-check-circle"></i> Complete</b></button> @endif
            </div>
          </div>

        <!-- /.invoice -->
        </div><!-- /.col -->

        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      
     
      @endsection()