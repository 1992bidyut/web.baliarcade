@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Today Complete Order</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">Today Complete Order</li>
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
			<div class="card">
			  <div class="card-header bg-info">
			    <h3 class="card-title">Today Complete Order</h3>
			    
                
			  </div>
			  <!-- /.card-header -->
			  <div class="card-body">
			    <table id="example1" class="table table-bordered table-striped">
			      <thead>
			      <tr>
			        <th>Order Id</th>
			        <th>Phone</th>
			        <th>Name</th>
			        <th>Order Status</th>
			        <th>Order Type</th>
			        <th>Order Time</th>
			        <th>Action</th>
			      </tr>
			      </thead>
			      <tbody>
			      @foreach($order as $row)

			      	@php
			      		if (Auth::user()->shop_id) {
			      			$check = DB::table('orderdetails')->where('order_id',$row->id)->where('shop_id','!=','NULL')->where('shop_id',Auth::user()->shop_id)->where('status','Complete')->count();
			      			if ($check) { @endphp
			      				<tr>
						        <td><b>#{{ $row->id }}</b></td>
						        <td>{{ $row->phone }}</td>
						        <td>{{ $row->name }}</td>
						        <td><span class="badge badge-success">Complete</span></td>
						        <td>{{ $row->order_type }}</td>
						        <td><span style="color:green;font-weight: bold;">{{ $row->created_at->diffForHumans() }}</span></td>
						        <td><div class="btn-group"><a href="{{ route('order.details',$row->id) }}" class="btn btn-sm btn-success">View</a><a href="{{ route('order.delete',$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a></div></td>
				    	</tr>
			      		@php
			      			}
			      		}
			      		if (Auth::user()->restaurant_id) {
			      			$check = DB::table('orderdetails')->where('order_id',$row->id)->where('restaurant_id','!=','NULL')->where('restaurant_id',Auth::user()->restaurant_id)->where('status','Complete')->count();
			      			if ($check) { @endphp
			      				<tr>
						        <td><b>#{{ $row->id }}</b></td>
						        <td>{{ $row->phone }}</td>
						        <td>{{ $row->name }}</td>
						        <td><span class="badge badge-success">Complete</span></td>
						        <td>{{ $row->order_type }}</td>
						        <td><span style="color:green;font-weight: bold;">{{ $row->created_at->diffForHumans() }}</span></td>
						        <td><div class="btn-group"><a href="{{ route('order.details',$row->id) }}" class="btn btn-sm btn-success">View</a><a href="{{ route('order.delete',$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a></div></td>
				    	</tr>
			      		@php
			      			}
			      		}
			      	@endphp
			      		
			      	
				    
			      @endforeach
			      </tbody>
			      <tfoot>
			      <tr>
					<th>Order Id</th>
			        <th>Phone</th>
			        <th>Name</th>
			        <th>Order Status</th>
			        <th>Order Type</th>
			        <th>Order Time</th>
			        <th>Action</th>
			      </tr>
			      </tfoot>
			    </table>
			  </div>
			  <!-- /.card-body -->
			</div>
	    <!-- /.row -->
	    <!-- Main row -->
	    <!-- /.row (main row) -->
	  </div><!-- /.container-fluid -->
	</section>
@endsection()