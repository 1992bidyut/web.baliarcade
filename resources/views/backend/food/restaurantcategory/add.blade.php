@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Add New Restaurant Category</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">Add New Restaurant Category</li>
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
			    <h3 class="card-title">Add New Shop Category</h3>
			    <div class="btn-group float-sm-right">
                	<a href="{{ route('all.restaurant.category') }}" class="btn btn-danger btn-sm float-sm-right text-white">
                  		All Restaurant Category
                	</a>
			    </div>
			  </div>
			  <!-- /.card-header -->
			  			<div class="card-body">
			  				<form action="{{ route('store.restaurant.category') }}" method="post">
			  					@csrf
			  					<div class="row">
			  						
			  						<div class="col-md-6">
			  							
			               	 			 <div class="form-group">
			  								<label>Restaurant Category Name (English)</label>
			  								<input type="text" name="name_en" id="name_en" class="form-control @error('name_en') is-invalid @enderror" placeholder="Enter Restaurant Category Name English">
			  							</div>
			  							@error('name_en')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror
			               	 			 
                                        <div class="form-group">
			  								<label>Floor</label>
			  								<select name="floor_id" id="floor_id" class="form-control @error('floor_id') is-invalid @enderror">
			  									<option selected="" disabled="">Select A Floor</option>
			  									@foreach($floor as $row)
			  										<option value="{{ $row->id }}">{{ $row->name_en }} | {{ $row->name_bn }}</option>
			  									@endforeach
			  								</select>
			  							</div>
			  							@error('floor_id')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror
			               	 			 
			  							<button type="submit" class="btn btn-info">Add</button>
			  						</div>
			  						<div class="col-md-6">
			  							<div class="form-group">
			  								<label>Restaurant Category Name (Bangla)</label>
			  								<input type="text" name="name_bn" id="name_bn" class="form-control @error('name_bn') is-invalid @enderror" placeholder="Enter Restaurant Category Name Bangla">
			  							</div>
			  							@error('name_bn')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror
			  						</div>
			  					
			  				</form>
			  			</div>
			  <!-- /.card-body -->
			</div>
	    <!-- /.row -->
	    <!-- Main row -->
	    <!-- /.row (main row) -->
	  </div><!-- /.container-fluid -->
	</section>
@endsection()

