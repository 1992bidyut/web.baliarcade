@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Dashboard</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="#">Home</a></li>
	          <li class="breadcrumb-item active">Dashboard</li>
	        </ol>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
	  <div class="container-fluid">
	    <!-- Small boxes (Stat box) -->
	    	@if(Auth::user()->type == 1)
	    		@php
	    			$customer = DB::table('customers')->count();
	    			$order = DB::table('orders')->count();

	    			$todOrder = DB::table('orders')->where('order_date',date('d/m/Y'))->get();
	    			$todTotSale=0;
	    			foreach ($todOrder as $row) {
	    				$data = DB::table('orderdetails')->where('order_id',$row->id)->where('status','Complete')->sum('unit_total');
	    				$todTotSale = $todTotSale + $data;
	    			}

	    			$totOrder = DB::table('orders')->get();
	    			$totSale=0;
	    			foreach ($totOrder as $row) {
	    				$data = DB::table('orderdetails')->where('order_id',$row->id)->where('status','Complete')->sum('unit_total');
	    				$totSale = $totSale + $data;
	    			}
	    			$totShopSale=0;
	    			$totRestaurantSale=0;
	    			$orderdetails = DB::table('orderdetails')->where('status','Complete')->get();
	    			foreach ($orderdetails as $row) {
	    				if (is_numeric($row->shop_id)) {
	    					$totShopSale = $totShopSale+$row->unit_total;
	    					
	    				}elseif(is_numeric($row->restaurant_id)){
	    					$totRestaurantSale = $totRestaurantSale+$row->unit_total;
	    					
	    				}
	    				
	    			}

	    		@endphp
	    		<div class="row">
			          <div class="col-12 col-sm-6 col-md-3">
			            <div class="info-box">
			              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-building"></i></span>

			              <div class="info-box-content">
			                <span class="info-box-text"><b>Total Floor</b></span>
			                <span class="info-box-number">
			                  {{ $floor }}
			                </span>
			              </div>
			              <!-- /.info-box-content -->
			            </div>
			            <!-- /.info-box -->
			          </div>
			          <!-- /.col -->
			          <div class="col-12 col-sm-6 col-md-3">
			            <div class="info-box mb-3">
			              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user"></i></span>

			              <div class="info-box-content">
			                <span class="info-box-text"><b>Total Admin</b></span>
			                <span class="info-box-number">{{ $admin }}</span>
			              </div>
			              <!-- /.info-box-content -->
			            </div>
			            <!-- /.info-box -->
			          </div>
			          <!-- /.col -->

			          <!-- fix for small devices only -->
			          <div class="clearfix hidden-md-up"></div>

			          <div class="col-12 col-sm-6 col-md-3">
			            <div class="info-box mb-3">
			              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user"></i></span>

			              <div class="info-box-content">
			                <span class="info-box-text"><b>Total Customer</b></span>
			                <span class="info-box-number">{{ $customer }}</span>
			              </div>
			              <!-- /.info-box-content -->
			            </div>
			            <!-- /.info-box -->
			          </div>
			          <!-- /.col -->
			          <div class="col-12 col-sm-6 col-md-3">
			            <div class="info-box mb-3">
			              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-cart"></i></span>

			              <div class="info-box-content">
			                <span class="info-box-text"><b>Total Order</b></span>
			                <span class="info-box-number">{{ $order }}</span>
			              </div>
			              <!-- /.info-box-content -->
			            </div>
			            <!-- /.info-box -->
			          </div>
			          <!-- /.col -->
			        </div>

			        <div class="row">
			        	<div class="col-md-8">
			        		<div class="card card-danger">
				              <div class="card-header">
				                <h3 class="card-title"><b>Pie Chart of Shop and Restaurant</b></h3>

				                <div class="card-tools">
				                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
				                  </button>
				                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
				                </div>
				              </div>
				              <div class="card-body">
				                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
				              </div>
				              <!-- /.card-body -->
				            </div>
			        	</div>
			        	<div class="col-md-4">
			        		<div class="info-box mb-3 bg-warning">
				              <span class="info-box-icon"><i class="fas fa-list"></i></span>

				              <div class="info-box-content">
				                <span class="info-box-text"><b>Total Shop Category</b></span>
				                <span class="info-box-number">{{ $shopcategory }}</span>
				              </div>
				              <!-- /.info-box-content -->
				            </div>
				            <!-- /.info-box -->
				            <div class="info-box mb-3 bg-success">
				              <span class="info-box-icon"><i class="fas fa-store"></i></span>

				              <div class="info-box-content">
				                <span class="info-box-text"><b>Total Shop</b></span>
				                <span class="info-box-number">{{ $shop }}</span>
				              </div>
				              <!-- /.info-box-content -->
				            </div>
				            <!-- /.info-box -->
				            <div class="info-box mb-3 bg-danger">
				              <span class="info-box-icon"><i class="fas fa-list"></i></span>

				              <div class="info-box-content">
				                <span class="info-box-text"><b>Total Restaurant Category</b></span>
				                <span class="info-box-number">{{ $restaurantcategory }}</span>
				              </div>
				              <!-- /.info-box-content -->
				            </div>
				            <!-- /.info-box -->
				            <div class="info-box mb-3 bg-info">
				              <span class="info-box-icon"><i class="fas fa-hotel"></i></span>

				              <div class="info-box-content">
				                <span class="info-box-text"><b>Total Restaurant</b></span>
				                <span class="info-box-number">{{ $restaurant }}</span>
				              </div>
				              <!-- /.info-box-content -->
				            </div>
				            <!-- /.info-box -->
			        	</div>
			        </div>

			        <div class="row">
			        	<div class="col-md-8">
			        		<div class="card card-danger">
				              <div class="card-header bg-info">
				                <h3 class="card-title"><b>Pie Chart of Total Sales</b></h3>

				                <div class="card-tools">
				                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
				                  </button>
				                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
				                </div>
				              </div>
				              <div class="card-body">
				                <canvas id="pieChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
				              </div>
				              <!-- /.card-body -->
				            </div>
			        	</div>
			        	<div class="col-md-4">
			        		<div class="info-box mb-3 bg-warning">
				              <span class="info-box-icon"><i class="fas fa-list"></i></span>

				              <div class="info-box-content">
				                <span class="info-box-text"><b>Today Sale</b></span>
				                <span class="info-box-number">{{ $todTotSale }} Taka</span>
				              </div>
				              <!-- /.info-box-content -->
				            </div>
				            <!-- /.info-box -->
				            <div class="info-box mb-3 bg-success">
				              <span class="info-box-icon"><i class="fas fa-store"></i></span>

				              <div class="info-box-content">
				                <span class="info-box-text"><b>Total Sale</b></span>
				                <span class="info-box-number">{{ $totSale }} Taka</span>
				              </div>
				              <!-- /.info-box-content -->
				            </div>
				            <!-- /.info-box -->
				            <div class="info-box mb-3 bg-danger">
				              <span class="info-box-icon"><i class="fas fa-list"></i></span>

				              <div class="info-box-content">
				                <span class="info-box-text"><b>Total Sale From Shops</b></span>
				                <span class="info-box-number">{{ $totShopSale }} Taka</span>
				              </div>
				              <!-- /.info-box-content -->
				            </div>
				            <!-- /.info-box -->
				            <div class="info-box mb-3 bg-info">
				              <span class="info-box-icon"><i class="fas fa-hotel"></i></span>

				              <div class="info-box-content">
				                <span class="info-box-text"><b>Total Sales From Restaurants</b></span>
				                <span class="info-box-number">{{ $totRestaurantSale }} Taka</span>
				              </div>
				              <!-- /.info-box-content -->
				            </div>
				            <!-- /.info-box -->
			        	</div>
			        </div>


		    		
	    	@elseif(Auth::user()->type == 0)
	    		@if(Auth::user()->module == 'shop')
	    			@php
	    				$recentProduct = DB::table('shopproducts')->where('shop_id',Auth::user()->shop_id)->orderBy('id','DESC')->limit(4)->get();
	    				$productcategory = DB::table('productcategories')->where('shop_id',Auth::user()->shop_id)->count();
	    				$product = DB::table('shopproducts')->where('shop_id',Auth::user()->shop_id)->count();
	    				$total = DB::table('orderdetails')->where('shop_id',Auth::user()->shop_id)->where('status','Complete')->sum('unit_total');
	    				$todaySale = DB::table('orderdetails')
	    								->join('orders','orderdetails.order_id','orders.id')
	    								->where('orderdetails.shop_id',Auth::user()->shop_id)
	    								->where('orders.order_date',date('d/m/Y'))
	    								->where('orderdetails.status','Complete')
	    								->sum('unit_total');
	    				$order = DB::table('orders')->where('phone','!=',Null)->get();
	    				$pending=0;
	    				$processing=0;
	    				$complete=0;
	    				foreach($order as $row){
	    					$checkPending = DB::table('orderdetails')->where('order_id',$row->id)->where('shop_id','!=','NULL')->where('shop_id',Auth::user()->shop_id)->where('status','Pending')->count();
	    					$checkProcess = DB::table('orderdetails')->where('order_id',$row->id)->where('shop_id','!=','NULL')->where('shop_id',Auth::user()->shop_id)->where('status','Processing')->count();
	    					$checkComplete = DB::table('orderdetails')->where('order_id',$row->id)->where('shop_id','!=','NULL')->where('shop_id',Auth::user()->shop_id)->where('status','Complete')->count();
	    					if ($checkPending) {
	    						$pending++;
	    					}
	    					if ($checkProcess) {
	    						$processing++;
	    					}
	    					if ($checkComplete) {
	    						$complete++;
	    					}
	    				}
	    			@endphp

	    			<div class="row">
			          <div class="col-12 col-sm-6 col-md-3">
			            <div class="info-box">
			              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-list"></i></span>

			              <div class="info-box-content">
			                <span class="info-box-text"><b>Category</b></span>
			                <span class="info-box-number">
			                  {{ $productcategory }}
			                </span>
			              </div>
			              <!-- /.info-box-content -->
			            </div>
			            <!-- /.info-box -->
			          </div>
			          <!-- /.col -->
			          <div class="col-12 col-sm-6 col-md-3">
			            <div class="info-box mb-3">
			              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-list"></i></span>

			              <div class="info-box-content">
			                <span class="info-box-text"><b>Product</b></span>
			                <span class="info-box-number">{{ $product }}</span>
			              </div>
			              <!-- /.info-box-content -->
			            </div>
			            <!-- /.info-box -->
			          </div>
			          <!-- /.col -->

			          <!-- fix for small devices only -->
			          <div class="clearfix hidden-md-up"></div>

			          <div class="col-12 col-sm-6 col-md-3">
			            <div class="info-box mb-3">
			              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

			              <div class="info-box-content">
			                <span class="info-box-text"><b>Total Sales</b></span>
			                <span class="info-box-number">{{ $total }} Taka</span>
			              </div>
			              <!-- /.info-box-content -->
			            </div>
			            <!-- /.info-box -->
			          </div>
			          <!-- /.col -->
			          <div class="col-12 col-sm-6 col-md-3">
			            <div class="info-box mb-3">
			              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-cart"></i></span>

			              <div class="info-box-content">
			                <span class="info-box-text"><b>Today Sales</b></span>
			                <span class="info-box-number">{{ $todaySale }} Taka</span>
			              </div>
			              <!-- /.info-box-content -->
			            </div>
			            <!-- /.info-box -->
			          </div>
			          <div class="col-12 col-sm-6 col-md-3">
			            <div class="info-box mb-3">
			              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-list"></i></span>

			              <div class="info-box-content">
			                <span class="info-box-text"><b>Pending Order</b></span>
			                <span class="info-box-number">{{ $pending }}</span>
			              </div>
			              <!-- /.info-box-content -->
			            </div>
			            <!-- /.info-box -->
			          </div>
			          <div class="col-12 col-sm-6 col-md-3">
			            <div class="info-box mb-3">
			              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-sync-alt"></i></span>

			              <div class="info-box-content">
			                <span class="info-box-text"><b>Processing Order</b></span>
			                <span class="info-box-number">{{ $processing }} </span>
			              </div>
			              <!-- /.info-box-content -->
			            </div>
			            <!-- /.info-box -->
			          </div>
			          <div class="col-12 col-sm-6 col-md-3">
			            <div class="info-box mb-3">
			              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check-circle"></i></span>

			              <div class="info-box-content">
			                <span class="info-box-text"><b>Complete Order</b></span>
			                <span class="info-box-number">{{ $complete }} </span>
			              </div>
			              <!-- /.info-box-content -->
			            </div>
			            <!-- /.info-box -->
			          </div>
			          <div class="col-12 col-sm-6 col-md-3">
			            <div class="info-box mb-3">
			              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-plus"></i></span>

			              <div class="info-box-content">
			                <span class="info-box-text"><b>Total Order</b></span>
			                <span class="info-box-number">{{ $complete+$processing+$pending }} </span>
			              </div>
			              <!-- /.info-box-content -->
			            </div>
			            <!-- /.info-box -->
			          </div>
			          <!-- /.col -->
			        </div>
			        <div class="row">
			        	<div class="col-md-6">
			        		<div class="card card-danger">
				              <div class="card-header">
				                <h3 class="card-title"><b>Pie Chart of Orders</b></h3>

				                <div class="card-tools">
				                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
				                  </button>
				                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
				                </div>
				              </div>
				              <div class="card-body">
				                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
				              </div>
				              <!-- /.card-body -->
				            </div>
			        	</div>
			        	<div class="col-md-6">
			        		<!-- PRODUCT LIST -->
				            <div class="card">
				              <div class="card-header bg-info">
				                <h3 class="card-title"><b>Recently Added Products</b></h3>

				                <div class="card-tools">
				                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
				                    <i class="fas fa-minus"></i>
				                  </button>
				                  <button type="button" class="btn btn-tool" data-card-widget="remove">
				                    <i class="fas fa-times"></i>
				                  </button>
				                </div>
				              </div>
				              <!-- /.card-header -->
				              <div class="card-body p-0">
				                <ul class="products-list product-list-in-card pl-2 pr-2">
				                	@foreach($recentProduct as $row)
				                		@php
				                			$categoryProduct = DB::table('productcategories')->where('id',$row->productcategory_id)->first();
				                		@endphp
				                		<li class="item">
				                		  <div class="product-img">
				                		    <img src="{{ URL::to($row->image) }}" alt="Product Image" class="img-size-50">
				                		  </div>
				                		  <div class="product-info">
				                		    <a href="javascript:void(0)" class="product-title">{{ $row->name_en }} | {{ $row->name_bn }}
				                		      <span class="badge badge-warning float-right"><b>{{ $row->price_en }}</b> Taka</span></a>
				                		    
				                		    <span class="product-description">
				                		      Category : {{ $categoryProduct->name_en }} | {{ $categoryProduct->name_bn }}
				                		    </span>
				                		  </div>
				                		</li>
				                  	@endforeach
				                  <!-- /.item -->
				                 
				                  <!-- /.item -->
				                </ul>
				              </div>
				              <!-- /.card-body -->
				              <div class="card-footer text-center">
				                <a href="{{ route('all.shop.product') }}" class="uppercase">View All Products</a>
				              </div>
				              <!-- /.card-footer -->
				            </div>
				            
			        	</div>
			        </div>
			        <div class="row">
			        	<div class="col-md-12">
			        		<!-- Calendar -->
				            <div class="card">
				              <div class="card-header border-transparent bg-primary">
				                <h3 class="card-title"><b>Latest Orders</b></h3>

				                <div class="card-tools">
				                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
				                    <i class="fas fa-minus"></i>
				                  </button>
				                  <button type="button" class="btn btn-tool" data-card-widget="remove">
				                    <i class="fas fa-times"></i>
				                  </button>
				                </div>
				              </div>
				              <!-- /.card-header -->
				              <div class="card-body p-0">
				                <div class="table-responsive">
				                  <table class="table m-0">
				                    <thead>
					                    <tr>
					                      <th>Order ID</th>
					                      <th>Name</th>
					                      <th>Email</th>
					                      <th>Phone</th>
					                      <th>Address</th>
					                      <th>Order Type</th>
					                      <th>Status</th>
					                      <th>Time</th>
					                    </tr>
				                    </thead>
				                    <tbody>
				                    	@php
				                    		$shop_order = DB::table('orders')->where('phone','!=',Null)->orderBy('id','DESC')->limit(8)->get();

				                    	@endphp
					                    @foreach($shop_order as $row)
					                    	@php
					                    		$checkData = DB::table('orderdetails')->where('order_id',$row->id)->where('shop_id','!=','NULL')->where('shop_id',Auth::user()->shop_id)->count();
					                    		$checkStatus = DB::table('orderdetails')->where('order_id',$row->id)->where('shop_id','!=','NULL')->where('shop_id',Auth::user()->shop_id)->first();
					                    	@endphp
					                    	@if($checkData)
					                    		<tr>
					                    		  <td><a href="#"><b>#{{ $row->id }}</b></a></td>
					                    		  <td>{{ $row->name }}</td>
					                    		  <td>{{ $row->email }}</td>
					                    		  <td>{{ $row->phone }}</td>
					                    		  <td>{{ $row->shipping_addr }}</td>
					                    		  <td>{{ $row->order_type }}</td>
					                    		  <td><span  @if($checkStatus->status == 'Complete') class="badge badge-success" @elseif($checkStatus->status == 'Processing') class="badge badge-info" @elseif($checkStatus->status == 'Pending') class="badge badge-danger" @endif>{{ $checkStatus->status }}</span></td>
					                    		  <td><span style="color:green;font-weight: bold;">{{ \Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</span></td>
					                    		</tr>
					                    	@endif
					                    @endforeach
				                    </tbody>
				                  </table>
				                </div>
				                <!-- /.table-responsive -->
				              </div>
				              <!-- /.card-body -->
				              <div class="card-footer clearfix">
				                <a href="{{ route('all.pending.order') }}" class="btn btn-sm btn-secondary float-right">View All Orders</a>
				              </div>
				              <!-- /.card-footer -->
				            </div>
			        	</div>
			        </div>
	    		@elseif(Auth::user()->module == 'food')
	    			@php
	    				$recentMenu = DB::table('menus')->where('restaurant_id',Auth::user()->restaurant_id)->orderBy('id','DESC')->limit(4)->get();
	    				$menucategory = DB::table('menucategories')->where('restaurant_id',Auth::user()->restaurant_id)->count();
	    				$menu = DB::table('menus')->where('restaurant_id',Auth::user()->restaurant_id)->count();
	    				$total = DB::table('orderdetails')->where('restaurant_id',Auth::user()->restaurant_id)->where('status','Complete')->sum('unit_total');
	    				$todaySale = DB::table('orderdetails')
	    								->join('orders','orderdetails.order_id','orders.id')
	    								->where('orderdetails.restaurant_id',Auth::user()->restaurant_id)
	    								->where('orders.order_date',date('d/m/Y'))
	    								->where('orderdetails.status','Complete')
	    								->sum('unit_total');
	    				$order = DB::table('orders')->where('phone','!=',Null)->get();
	    				$pending=0;
	    				$processing=0;
	    				$complete=0;
	    				foreach($order as $row){
	    					$checkPending = DB::table('orderdetails')->where('order_id',$row->id)->where('restaurant_id','!=','NULL')->where('restaurant_id',Auth::user()->restaurant_id)->where('status','Pending')->count();
	    					$checkProcess = DB::table('orderdetails')->where('order_id',$row->id)->where('restaurant_id','!=','NULL')->where('restaurant_id',Auth::user()->restaurant_id)->where('status','Processing')->count();
	    					$checkComplete = DB::table('orderdetails')->where('order_id',$row->id)->where('restaurant_id','!=','NULL')->where('restaurant_id',Auth::user()->restaurant_id)->where('status','Complete')->count();
	    					if ($checkPending) {
	    						$pending++;
	    					}
	    					if ($checkProcess) {
	    						$processing++;
	    					}
	    					if ($checkComplete) {
	    						$complete++;
	    					}
	    				}
	    			@endphp

	    			<div class="row">
			          <div class="col-12 col-sm-6 col-md-3">
			            <div class="info-box">
			              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-list"></i></span>

			              <div class="info-box-content">
			                <span class="info-box-text"><b>Category</b></span>
			                <span class="info-box-number">
			                  {{ $menucategory }}
			                </span>
			              </div>
			              <!-- /.info-box-content -->
			            </div>
			            <!-- /.info-box -->
			          </div>
			          <!-- /.col -->
			          <div class="col-12 col-sm-6 col-md-3">
			            <div class="info-box mb-3">
			              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-list"></i></span>

			              <div class="info-box-content">
			                <span class="info-box-text"><b>Menu</b></span>
			                <span class="info-box-number">{{ $menu }}</span>
			              </div>
			              <!-- /.info-box-content -->
			            </div>
			            <!-- /.info-box -->
			          </div>
			          <!-- /.col -->

			          <!-- fix for small devices only -->
			          <div class="clearfix hidden-md-up"></div>

			          <div class="col-12 col-sm-6 col-md-3">
			            <div class="info-box mb-3">
			              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

			              <div class="info-box-content">
			                <span class="info-box-text"><b>Total Sales</b></span>
			                <span class="info-box-number">{{ $total }} Taka</span>
			              </div>
			              <!-- /.info-box-content -->
			            </div>
			            <!-- /.info-box -->
			          </div>
			          <!-- /.col -->
			          <div class="col-12 col-sm-6 col-md-3">
			            <div class="info-box mb-3">
			              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-cart"></i></span>

			              <div class="info-box-content">
			                <span class="info-box-text"><b>Today Sales</b></span>
			                <span class="info-box-number">{{ $todaySale }} Taka</span>
			              </div>
			              <!-- /.info-box-content -->
			            </div>
			            <!-- /.info-box -->
			          </div>
			          <div class="col-12 col-sm-6 col-md-3">
			            <div class="info-box mb-3">
			              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-list"></i></span>

			              <div class="info-box-content">
			                <span class="info-box-text"><b>Pending Order</b></span>
			                <span class="info-box-number">{{ $pending }}</span>
			              </div>
			              <!-- /.info-box-content -->
			            </div>
			            <!-- /.info-box -->
			          </div>
			          <div class="col-12 col-sm-6 col-md-3">
			            <div class="info-box mb-3">
			              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-sync-alt"></i></span>

			              <div class="info-box-content">
			                <span class="info-box-text"><b>Processing Order</b></span>
			                <span class="info-box-number">{{ $processing }} </span>
			              </div>
			              <!-- /.info-box-content -->
			            </div>
			            <!-- /.info-box -->
			          </div>
			          <div class="col-12 col-sm-6 col-md-3">
			            <div class="info-box mb-3">
			              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check-circle"></i></span>

			              <div class="info-box-content">
			                <span class="info-box-text"><b>Complete Order</b></span>
			                <span class="info-box-number">{{ $complete }} </span>
			              </div>
			              <!-- /.info-box-content -->
			            </div>
			            <!-- /.info-box -->
			          </div>
			          <div class="col-12 col-sm-6 col-md-3">
			            <div class="info-box mb-3">
			              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-plus"></i></span>

			              <div class="info-box-content">
			                <span class="info-box-text"><b>Total Order</b></span>
			                <span class="info-box-number">{{ $complete+$processing+$pending }} </span>
			              </div>
			              <!-- /.info-box-content -->
			            </div>
			            <!-- /.info-box -->
			          </div>
			          <!-- /.col -->
			        </div>
			        <div class="row">
			        	<div class="col-md-6">
			        		<div class="card card-danger">
				              <div class="card-header">
				                <h3 class="card-title"><b>Pie Chart of Orders</b></h3>

				                <div class="card-tools">
				                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
				                  </button>
				                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
				                </div>
				              </div>
				              <div class="card-body">
				                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
				              </div>
				              <!-- /.card-body -->
				            </div>
			        	</div>
			        	<div class="col-md-6">
			        		<!-- PRODUCT LIST -->
				            <div class="card">
				              <div class="card-header bg-info">
				                <h3 class="card-title"><b>Recently Added Menu</b></h3>

				                <div class="card-tools">
				                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
				                    <i class="fas fa-minus"></i>
				                  </button>
				                  <button type="button" class="btn btn-tool" data-card-widget="remove">
				                    <i class="fas fa-times"></i>
				                  </button>
				                </div>
				              </div>
				              <!-- /.card-header -->
				              <div class="card-body p-0">
				                <ul class="products-list product-list-in-card pl-2 pr-2">
				                	@foreach($recentMenu as $row)
				                		@php
				                			$categoryMenu = DB::table('menucategories')->where('id',$row->menucategory_id)->first();
				                		@endphp
				                		<li class="item">
				                		  <div class="product-img">
				                		    <img src="{{ URL::to($row->image) }}" alt="Product Image" class="img-size-50">
				                		  </div>
				                		  <div class="product-info">
				                		    <a href="javascript:void(0)" class="product-title">{{ $row->name_en }} | {{ $row->name_bn }}
				                		      <span class="badge badge-warning float-right"><b>{{ $row->price_en }}</b> Taka</span></a>
				                		    
				                		    <span class="product-description">
				                		      Category : {{ $categoryMenu->name_en }} | {{ $categoryMenu->name_bn }}
				                		    </span>
				                		  </div>
				                		</li>
				                  	@endforeach
				                  <!-- /.item -->
				                 
				                  <!-- /.item -->
				                </ul>
				              </div>
				              <!-- /.card-body -->
				              <div class="card-footer text-center">
				                <a href="{{ route('all.menu') }}" class="uppercase">View All Menu</a>
				              </div>
				              <!-- /.card-footer -->
				            </div>
				            
			        	</div>
			        </div>
			        <div class="row">
			        	<div class="col-md-12">
			        		<!-- Calendar -->
				            <div class="card">
				              <div class="card-header border-transparent bg-primary">
				                <h3 class="card-title"><b>Latest Orders</b></h3>

				                <div class="card-tools">
				                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
				                    <i class="fas fa-minus"></i>
				                  </button>
				                  <button type="button" class="btn btn-tool" data-card-widget="remove">
				                    <i class="fas fa-times"></i>
				                  </button>
				                </div>
				              </div>
				              <!-- /.card-header -->
				              <div class="card-body p-0">
				                <div class="table-responsive">
				                  <table class="table m-0">
				                    <thead>
					                    <tr>
					                      <th>Order ID</th>
					                      <th>Name</th>
					                      <th>Email</th>
					                      <th>Phone</th>
					                      <th>Address</th>
					                      <th>Order Type</th>
					                      <th>Status</th>
					                      <th>Time</th>
					                    </tr>
				                    </thead>
				                    <tbody>
				                    	@php
				                    		$restaurant_order = DB::table('orders')->where('phone','!=',Null)->orderBy('id','DESC')->limit(8)->get();

				                    	@endphp
					                    @foreach($restaurant_order as $row)
					                    	@php
					                    		$checkData = DB::table('orderdetails')->where('order_id',$row->id)->where('restaurant_id','!=','NULL')->where('restaurant_id',Auth::user()->restaurant_id)->count();
					                    		$checkStatus = DB::table('orderdetails')->where('order_id',$row->id)->where('restaurant_id','!=','NULL')->where('restaurant_id',Auth::user()->restaurant_id)->first();
					                    	@endphp
					                    	@if($checkData)
					                    		<tr>
					                    		  <td><a href="#"><b>#{{ $row->id }}</b></a></td>
					                    		  <td>{{ $row->name }}</td>
					                    		  <td>{{ $row->email }}</td>
					                    		  <td>{{ $row->phone }}</td>
					                    		  <td>{{ $row->shipping_addr }}</td>
					                    		  <td>{{ $row->order_type }}</td>
					                    		  <td><span  @if($checkStatus->status == 'Complete') class="badge badge-success" @elseif($checkStatus->status == 'Processing') class="badge badge-info" @elseif($checkStatus->status == 'Pending') class="badge badge-danger" @endif>{{ $checkStatus->status }}</span></td>
					                    		  <td><span style="color:green;font-weight: bold;">{{ \Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</span></td>
					                    		</tr>
					                    	@endif
					                    @endforeach
				                    </tbody>
				                  </table>
				                </div>
				                <!-- /.table-responsive -->
				              </div>
				              <!-- /.card-body -->
				              <div class="card-footer clearfix">
				                <a href="{{ route('all.pending.order') }}" class="btn btn-sm btn-secondary float-right">View All Orders</a>
				              </div>
				              <!-- /.card-footer -->
				            </div>
			        	</div>
			        </div>
	    		@endif

	    	@endif
	    <!-- /.row (main row) -->
	  </div><!-- /.container-fluid -->
	</section>
@endsection()

@section('script')
	@if(Auth::user()->type == 0)
		<script>
			var donutData        = {
			      labels: [
			          'Pending Order', 
			          'Processing Order',
			          'Complete Order', 
			          
			      ],
			      datasets: [
			        {
			          data: [{{ $pending }},{{ $processing }},{{ $complete }}],
			          backgroundColor : ['#f56954','#00c0ef','#00a65a'],
			        }
			      ]
			    }
			var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
			    var pieData        = donutData;
			    var pieOptions     = {
			      maintainAspectRatio : false,
			      responsive : true,
			    }
			    //Create pie or douhnut chart
			    // You can switch between pie and douhnut using the method below.
			    var pieChart = new Chart(pieChartCanvas, {
			      type: 'pie',
			      data: pieData,
			      options: pieOptions      
			    })
		</script>
	@elseif(Auth::user()->type == 1)
		<script>
			var donutData = {
			    labels: [
			        'Total Shop', 
			        'Total Restaurant',
			           
			    ],
			    datasets: [
			      	{
			          data: [{{ $shop }},{{ $restaurant }}],
			          backgroundColor : ['#f56954','#00c0ef'],
			        }
			    ]
			}
			var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
			var pieData  = donutData;
			var pieOptions = {
				maintainAspectRatio : false,
			    responsive : true,
			}
			//Create pie or douhnut chart
			// You can switch between pie and douhnut using the method below.
			var pieChart = new Chart(pieChartCanvas, {
			    type: 'pie',
			    data: pieData,
			    options: pieOptions      
			})
		</script>

		<script>
			var donutData = {
			    labels: [
			        'Total Sale From Shop', 
			        'Total Sale From Restaurant',
			           
			    ],
			    datasets: [
			      	{
			          data: [{{ $totShopSale }},{{ $totRestaurantSale }}],
			          backgroundColor : ['#f56954','#00c0ef'],
			        }
			    ]
			}
			var pieChartCanvas = $('#pieChart2').get(0).getContext('2d')
			var pieData  = donutData;
			var pieOptions = {
				maintainAspectRatio : false,
			    responsive : true,
			}
			//Create pie or douhnut chart
			// You can switch between pie and douhnut using the method below.
			var pieChart = new Chart(pieChartCanvas, {
			    type: 'pie',
			    data: pieData,
			    options: pieOptions      
			})
		</script>
	@endif
@endsection