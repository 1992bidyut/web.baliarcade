@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">All Product</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">All Product</li>
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
			    <h3 class="card-title">All Product</h3>
			    <a href="{{ route('add.new.product') }}" class="btn btn-sm btn-danger" style="float: right;">Add New Product</a>
                
			  </div>
			  <!-- /.card-header -->
			  <div class="card-body">
			    <table id="example1" class="table table-bordered table-striped">
			      <thead>
			      <tr>
			        <th>Product Name</th>
			        <th>Product Category Name</th>
			        <th>Shop</th>
			        <th>Price</th>
			        <th>image</th>
			        <th>Action</th>
			      </tr>
			      </thead>
			      <tbody>
			      @foreach($data as $row)
				    <tr>
				        <td>{{ $row->name_en }} | {{ $row->name_bn }}</td>
				        <td>@if($row->productcategory) {{ $row->productcategory->name_en }} | {{ $row->productcategory->name_bn }} @else <span class="text-danger">Product Category Not Found</span> @endif</td>
				        <td>@if($row->shop) {{ $row->shop->name_en }} | {{ $row->shop->name_bn }} @else <span class="text-danger">Shop Not Found</span> @endif</td>
				        <td>{{ $row->price_en }} | {{ $row->price_bn }}</td>
				        <td><img src="{{ URL::to($row->image) }}" alt="" style="height: 50px;width: 50px;"></td>
				        <td><div class="btn-group"><a href="{{ route('product.edit',$row->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a><a href="{{ route('product.delete',$row->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="fas fa-trash-alt"></i></a></div></td>
				    </tr>
			      @endforeach()
			      </tbody>
			      <tfoot>
			      <tr>
					<th>Product Name</th>
			        <th>Product Category Name</th>
			        <th>Shop</th>
			        <th>Price</th>
			        <th>image</th>
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