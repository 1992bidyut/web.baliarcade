@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Add New Shop</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">Add New Shop</li>
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
			    <h3 class="card-title">Add New Shop</h3>
			    <div class="btn-group float-sm-right">
                	<a href="{{ route('all.shop') }}" class="btn btn-danger btn-sm float-sm-right text-white">
                  		All Shop
                	</a>
			    </div>
			  </div>
			  <!-- /.card-header -->
			  			<div class="card-body">
			  				<form action="{{ route('store.shop') }}" method="post" enctype="multipart/form-data">
			  					@csrf
			  					<div class="row">
			  						
			  						<div class="col-md-6">
			  							
			               	 			 <div class="form-group">
			  								<label>Shop Name (English)</label>
			  								<input type="text" name="name_en" id="name_en" class="form-control @error('name_en') is-invalid @enderror" placeholder="Enter shop Name English">
			  							</div>
			  							@error('name_en')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 <div class="form-group">
			  								<label>Shop Category</label>
			  								<select name="shopcategory_id" id="shopcategory_id" class="form-control @error('shopcategory_id') is-invalid @enderror">
			  									<option selected="" disabled="">Select A Shop Category</option>
			  									@foreach($shopcategory as $row)
			  										<option value="{{ $row->id }}">{{ $row->name_en }} | {{ $row->name_bn }}</option>
			  									@endforeach
			  								</select>
			  							</div>
			  							@error('shopcategory_id')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 <div class="form-group">
			  								<label>Phone (English)</label>
			  								<input type="text" name="phone_en" id="phone_en" class="form-control @error('phone_en') is-invalid @enderror" placeholder="Enter shop phone English">
			  							</div>
			  							@error('phone_en')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 <div class="form-group">
			  								<label>Description (English) <small class="text-primary">* Optional</small></label>
			  								<textarea name="description_en" id="description_en" class="form-control @error('description_en') is-invalid @enderror" ></textarea>
			  							</div>
			  							@error('description_en')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 <div class="form-group">
			  								<label>Owner Name (English) <small class="text-primary">* Optional</small></label>
			  								<input type="text" name="owner_en" id="owner_en" class="form-control @error('owner_en') is-invalid @enderror" placeholder="Enter shop phone English">
			  							</div>
			  							@error('owner_en')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror
			               	 			 <div class="form-group">
			               	 			 	<img src="#" alt="" id="image">
			               	 			 	<label for="exampleInputFile">Shop Image</label>
			               	 			 	<div class="input-group">
			               	 			 		<div class="custom-file">
			               	 			 			<input type="file"  accept="image/*" name="image" id="image" class="custom-file-input" id="exampleInputFile" onchange="readURL(this);" required="">
			               	 			 			<label class="custom-file-label" for="exampleInputFile">Choose file</label>
			               	 			 		</div>
			               	 			 	</div>
			               	 			 </div>
			               	 			 @error('image')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 
			  							<button type="submit" class="btn btn-info">Add</button>
			  						</div>
			  						<div class="col-md-6">
			  							<div class="form-group">
			  								<label>Shop Name (Bangla)</label>
			  								<input type="text" name="name_bn" id="name_bn" class="form-control @error('name_bn') is-invalid @enderror" placeholder="Enter shop Name Bangla">
			  							</div>
			  							@error('name_bn')
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
			               	 			 <div class="form-group">
			  								<label>Phone (Bangla)</label>
			  								<input type="text" name="phone_bn" id="phone_bn" class="form-control @error('phone_bn') is-invalid @enderror" placeholder="Enter shop Phone Bangla">
			  							</div>
			  							@error('phone_bn')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 <div class="form-group">
			  								<label>Description (Bangla) <small class="text-primary">* Optional</small></label>
			  								<textarea name="description_bn" id="description_bn" class="form-control @error('description_bn') is-invalid @enderror" ></textarea>
			  							</div>
			  							@error('description_bn')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 <div class="form-group">
			  								<label>Owner Name (Bangla) <small class="text-primary">* Optional</small></label>
			  								<input type="text" name="owner_bn" id="owner_bn" class="form-control @error('owner_bn') is-invalid @enderror" placeholder="Enter shop Owner Name Bangla">
			  							</div>
			  							@error('owner_bn')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 <div class="form-group">
			  								<label>Open Time<small class="text-primary">* Optional</small></label>
			  								<input type="text" name="open" id="open" class="form-control @error('open') is-invalid @enderror" placeholder="Enter shop open time">
			  							</div>
			  							@error('open')
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

