@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">All Customer</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">All Customer</li>
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
			    <h3 class="card-title">All Customer</h3>
			    
                
			  </div>
			  <!-- /.card-header -->
			  <div class="card-body">
			    <table id="example1" class="table table-bordered table-striped">
			      <thead>
			      <tr>
			        <th>Name</th>
			        <th>Phone</th>
			        <th>Email</th>
			        <th>Verified</th>
			        <th>Total Order</th>
			        <th>Created At</th>
			        <th>Action</th>
			      </tr>
			      </thead>
			      <tbody>
				      @foreach($customer as $row)
				      	@php
				      		$order = DB::table('orders')->where('email',$row->email)->count();
				      	@endphp
				      	 <tr>
				      	 	<td>{{ $row->name }}</td>
				      	 	<td>{{ $row->phone }}</td>
				      	 	<td>{{ $row->email }}</td>
				      	 	<td>@if($row->verify == 1) <span class="badge badge-success">yes</i></span> @else <span class="badge badge-danger">no</span> @endif</td>
				      	 	<td>{{ $order }}</td>
				      	 	<td>{{ $row->created_at->diffForHumans() }}</td>
				      	 	<td><div class="btn-group"><a href="{{ route('customer.delete',$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a></div></td>
				      	 </tr>
				      @endforeach
			      </tbody>
			      <tfoot>
			      <tr>
					<th>Name</th>
			        <th>Phone</th>
			        <th>Email</th>
			        <th>Status</th>
			        <th>Total Order</th>
			        <th>Created At</th>
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