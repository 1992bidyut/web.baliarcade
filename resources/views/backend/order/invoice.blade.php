<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bali Arcade</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<style type="text/css" media="print">
      @media print
      {
         @page {
           margin-top: 0;
           margin-bottom: 0;
         }
         body  {
           padding-top: 72px;
           padding-bottom: 72px ;
         }
      } 
</style>
</head>
<body>
    @php
        $system;
        if ($module == 'Shop') {
          $system = DB::table('shops')->where('id',Auth::user()->shop_id)->first();
        }else if($module == 'Restaurant'){
          $system = DB::table('restaurants')->where('id',Auth::user()->restaurant_id)->first();
        }
    @endphp
    @php
        $en = ['0','1','2','3','4','5','6','7','8','9'];
        $bn = ['০','১','২','৩','৪','৫','৬','৭','৮','৯'];
        
    @endphp
    <div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <center style="padding:2%;">
            <h2 class="page-header">
              <span style="margin-right:-13%;">{{ $system->name_bn }}</span>
              <small class="float-right">তারিখ: {{ str_replace($en,$bn,date('d-m-Y')) }}</small>
            </h2>
            <div>
                <img style="height:150px;width:300px;" src="{{ URL::to($system->image) }}">
            </div>
            <div style="width:20%;margin-top:2px;">
                <address>
                   ফোন :    {{ $system->phone_bn }}     
                </address>
            </div>
            <div style="width:25%;">
                <address>
                   ঠিকানা: {!! $system->description_bn !!}      
                </address>
            </div>
        </center>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info" style="margin-top:6%;">
      <div class="col-sm-4 invoice-col">
         
                <address>
                  নাম: <strong>{{ $info->name }}</strong><br><br>
                  ফোন: <strong>{{ $info->phone }}</strong><br><br>
                  ঠিকানা: <strong>{{ $info->shipping_addr }}</strong><br>
                </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>পেমেন্ট:</b>{{ $info->payment_by }}<br><br>
        <b>সর্বমোট : </b>{{ str_replace($en,$bn,$total) }} টাকা <br><br>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>অর্ডার আইডি:</b> {{ str_replace($en,$bn,$info->id) }}<br><br>
        <b>অর্ডার এর তারিখ:</b> {{str_replace($en,$bn,$info->order_date) }}</b><br><br>
        <b>অর্ডার স্টেটাস:</b> {{ $status->status }}
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row" style="margin-top:5%;">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>@if($module=='Shop') প্রোডাক্টের নাম @elseif($module == 'Restaurant') মেনু নাম @endif</th>
            <th>ক্যাটাগরি</th>
            <th>@if($module == 'Shop') দোকানের নাম @elseif($module=='Restaurant') রেস্টুরেন্টের নাম @endif</th>
            <th>ইউনিট খরচ</th>
            <th>পরিমাণ</th>
            <th>সর্বমোট</th>
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
                          $category = $product_category->name_bn;
                          $prodOrMenu = $product->name_bn;
                          $shop = DB::table('shops')->where('id',$order->shop_id)->first();
                          $shopOrRes = $shop->name_bn;
                        }else if($module == 'Restaurant'){
                          $menu = DB::table('menus')->where('id',$order->menu_id)->first();
                          $menu_category = DB::table('menucategories')->where('id',$menu->menucategory_id)->first();
                          $category = $menu_category->name_bn;
                          $prodOrMenu = $menu->name_bn;
                          $restuarant = DB::table('restaurants')->where('id',$order->restaurant_id)->first();
                          $shopOrRes = $restuarant->name_bn;
                        }
                      @endphp
                      <tr>
                          <td>{{ $prodOrMenu }}</td>
                          <td>{{ $category }}</td>
                          <td>{{ $shopOrRes }}</td>
                          <td>{{ str_replace($en,$bn,$order->unit_cost) }}</td>
                          <td>{{ str_replace($en,$bn,$order->unit_quantity) }}</td>
                          <td>{{ str_replace($en,$bn,$order->unit_total) }}</td>
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
        

        <div class="table-responsive">
          <table class="table">
            <tr>
                      <th style="width:50%">মোট:</th>
                      <td>‎<b></b> {{ str_replace($en,$bn,$total) }} টাকা</td>
                    </tr>
                    {{-- <tr>
                      <th>শিপিং খরচ</th>
                      <td>‎<b></b> {{ str_replace($en,$bn,$order->shipping_cost) }} টাকা</td>
                    </tr> --}}
                    {{-- <tr>
                      <th>Shipping:</th>
                      <td>$5.80</td>
                    </tr> --}}
                    {{-- <tr>
                      <th>সর্বমোট:</th>
                      <td>‎<b></b> {{ str_replace($en,$bn,$order->grand_total) }} টাকা</td>
                    </tr> --}}
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
    
<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>