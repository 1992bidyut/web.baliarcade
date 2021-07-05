@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Edit Admin Info</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">Edit Admin Info</li>
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
			    <h3 class="card-title">Edit Admin Info</h3>
			    <div class="btn-group float-sm-right">
                	<a href="{{ route('make.admin') }}" class="btn btn-danger btn-sm float-sm-right text-white">
                  		All Admin
                	</a>
			    </div>
			  </div>
			  <!-- /.card-header -->
			  			<div class="card-body">
			  				<form action="{{ route('update.admin',$data->id) }}" method="post" enctype="multipart/form-data">
			  					@csrf
			  					<div class="row">
			  						
			  						<div class="col-md-6">
			  							
			               	 			 <div class="form-group">
			  								<label>Name</label>
			  								<input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $data->name }}">
			  							</div>
			  							@error('name')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 <div class="form-group">
			  								<label>Password</label>
			  								<input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="You Can Change Password">
			  							</div>
			  							@error('password')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 <div class="form-group">
			  								<label>Email</label>
			  								<input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $data->email }}">
			  							</div>
			  							@error('email')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 <div class="form-group">
			  								<label>Status</label>
			  								<select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
			  									<option selected="" disabled="">Select A Status</option>
			  									<option @if($data->status == 1) selected="" @endif value="1">Active</option>
			  									<option @if($data->status == 0) selected="" @endif value="0">Disable</option>
			  									
			  								</select>
			  							</div>
			  							@error('status')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 
			  							<button type="submit" class="btn btn-info">Update</button>
			  						</div>
			  						<div class="col-md-6">
			  							
			               	 			 <div class="form-group">
			  								<label>Admin Type</label>
			  								<select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
			  									<option selected="" disabled="">Select Admin Type</option>
			  									<option @if($data->type == 1) selected="" @endif value="1">Super Admin</option>
			  									<option @if($data->type == 0) selected="" @endif value="0">Normal Admin</option>
			  									
			  								</select>
			  							</div>
			  							@error('type')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror
			               	 			 
			        					@if($data->type == 0)
			        						<div class="form-group module">
			  								<label>Module</label>
			  								<select name="module" id="module" class="form-control @error('module') is-invalid @enderror">
			  									<option selected="" disabled="">Select A Module</option>
			  									<option @if($data->module == 'shop') selected="" @endif value="shop">Shop</option>
			  									<option @if($data->module == 'food') selected="" @endif value="food">Food Court</option>
			  									
			  								</select>
				  							</div>
				  							@error('module')
				               	      			<div class="alert alert-danger">{{ $message }}</div>
				               	 			 @enderror

				               	 			 @if($data->module == 'shop')
				               	 			 	<div class="form-group shopcategory">
				  								<label>Shop Category</label>
				  								<select name="shopcategory_id" id="shopcategory_id" class="form-control @error('shopcategory_id') is-invalid @enderror">
				  									<option selected="" disabled="">Select A Shop Category</option>
				  									@foreach($shopcategories as $row)
				  										<option @if($data->shopcategory_id == $row->id) selected="" @endif value="{{ $row->id }}">{{ $row->name_en }} | {{ $row->name_bn }}</option>
				  									@endforeach
				  									
				  								</select>
					  							</div>
					  							@error('shopcategory_id')
					               	      			<div class="alert alert-danger">{{ $message }}</div>
					               	 			 @enderror

					               	 			 <div class="form-group shop">
					  								<label>Shop</label>
					  								<select name="shop_id" id="shop_id" class="form-control @error('shop_id') is-invalid @enderror">
					  									<option selected="" disabled="">Select A Shop</option>
					  									@foreach($shops as $row)
				  										<option @if($data->shop_id == $row->id) selected="" @endif value="{{ $row->id }}">{{ $row->name_en }} | {{ $row->name_bn }}</option>
				  										@endforeach
					  									
					  								</select>
					  							</div>
					  							@error('shop_id')
					               	      			<div class="alert alert-danger">{{ $message }}</div>
					               	 			@enderror
				               	 			 @elseif($data->module == 'food')
				               	 			 	<div class="form-group restaurantcategory">
					  								<label>Restaurant Category</label>
					  								<select name="restaurantcategory_id" id="restaurantcategory_id" class="form-control @error('restaurantcategory_id') is-invalid @enderror">
					  									<option selected="" disabled="">Select A Restaurant Category</option>
					  									@foreach($restaurantcategories as $row)
					  										<option @if($data->restaurantcategory_id == $row->id) selected="" @endif value="{{ $row->id }}">{{ $row->name_en }} | {{ $row->name_bn }}</option>
					  									@endforeach
					  									
					  								</select>
					  							</div>
					  							@error('restaurantcategory_id')
					               	      			<div class="alert alert-danger">{{ $message }}</div>
					               	 			 @enderror

					               	 			 <div class="form-group restaurant">
					  								<label>Restaurant</label>
					  								<select name="restaurant_id" id="restaurant_id" class="form-control @error('restaurant_id') is-invalid @enderror">
					  									<option selected="" disabled="">Select A Restaurant</option>
					  									@foreach($restaurants as $row)
					  										<option @if($data->restaurant_id == $row->id) selected="" @endif value="{{ $row->id }}">{{ $row->name_en }} | {{ $row->name_bn }}</option>
					  									@endforeach
					  									
					  									
					  								</select>
					  							</div>
					  							@error('restaurant_id')
					               	      			<div class="alert alert-danger">{{ $message }}</div>
					               	 			 @enderror
				               	 			 @endif
			        					@endif
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

