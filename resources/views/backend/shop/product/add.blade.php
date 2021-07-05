@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Add New Product</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">Add New Product</li>
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
			    <h3 class="card-title">Add New Product</h3>
			    <div class="btn-group float-sm-right">
                	<a href="{{ route('all.shop.product') }}" class="btn btn-danger btn-sm float-sm-right text-white">
                  		All Product
                	</a>
			    </div>
			  </div>
			  <!-- /.card-header -->
			  			<div class="card-body">
			  				<form action="{{ route('store.product') }}" method="post" enctype="multipart/form-data">
			  					@csrf
			  					<div class="row">
			  						
			  						<div class="col-md-6">
			  						
			  							<div class="form-group">
			               	 			 	<img src="#" alt="" id="image">
			               	 			 	<label for="exampleInputFile">Product Image</label>
			               	 			 	<div class="input-group">
			               	 			 		<div class="custom-file">
			               	 			 			<input type="file"  accept="image/*" name="image" id="image" class="custom-file-input" id="exampleInputFile" onchange="readURL(this);" >
			               	 			 			<label class="custom-file-label" for="exampleInputFile">Choose file</label>
			               	 			 		</div>
			               	 			 	</div>
			               	 			 </div>
			               	 			 @error('image')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror
			               	 			 
			               	 			 


			               	 			 <div class="form-group">
			  								<label>Product Name (English)</label>
			  								<input type="text" name="name_en" id="name_en" class="form-control @error('name_en') is-invalid @enderror" placeholder="Enter Product English" value="{{ old('name_en') }}">
			  							</div>
			  							@error('name_en')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 <div class="form-group">
			  								<label>Price (English)</label>
			  								<input type="text" name="price_en" id="price_en" class="form-control @error('price_en') is-invalid @enderror" placeholder="Enter Product Price English" value="{{ old('price_en') }}">
			  							</div>
			  							@error('price_en')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 <div class="form-group">
				  							<label>Quantity (English)</label>
				  							<input type="text" name="quantity_en" id="quantity_en" class="form-control @error('quantity_en') is-invalid @enderror" placeholder="Enter Product Quantity English" value="{{ old('quantity_en') }}">
				  						</div>
				  						@error('quantity_en')
				               	      		<div class="alert alert-danger">{{ $message }}</div>
				               	 		@enderror
				               	 		
				               	 		<h5 class="" style="font-weight: bold;">Optional</h5><hr>
				               	 		<div class="form-group">
				  							<label>Discount (English) <small class="text-danger"> * Optional</small></label>
				  							<input type="text" name="discount_en" id="discount_en" class="form-control @error('discount_en') is-invalid @enderror" placeholder="Enter Product Discount English" value="{{ old('discount_en') }}">
				  						</div>
				  						@error('discount_en')
				               	      		<div class="alert alert-danger">{{ $message }}</div>
				               	 		@enderror
				               	 		<div class="form-group">
				  							<label>Size (English) <small class="text-danger"> * Optional</small></label>
				  							<input type="text" name="size_en" id="size_en" class="form-control @error('size_en') is-invalid @enderror" placeholder="Enter Product Size English" value="{{ old('size_en') }}">
				  						</div>
				  						@error('size_en')
				               	      		<div class="alert alert-danger">{{ $message }}</div>
				               	 		@enderror
				               	 		<div class="form-group">
				  							<label>Color (English) <small class="text-danger"> * Optional</small></label>
				  							<input type="text" name="color_en" id="color_en" class="form-control @error('color_en') is-invalid @enderror" placeholder="Enter Product Color English" value="{{ old('color_en') }}">
				  						</div>
				  						@error('color_en')
				               	      		<div class="alert alert-danger">{{ $message }}</div>
				               	 		@enderror
				               	 		<div class="form-group">
				  							<label>Warranty (English) <small class="text-danger"> * Optional</small></label>
				  							<input type="text" name="warranty_en" id="warranty_en" class="form-control @error('warranty_en') is-invalid @enderror" placeholder="Enter Product Warranty English" value="{{ old('warranty_en') }}">
				  						</div>
				  						@error('warranty_en')
				               	      		<div class="alert alert-danger">{{ $message }}</div>
				               	 		@enderror
				               	 		<div class="form-group">
					  						<label>Buying Date <small class="text-danger"> * Optional</small></label>
					  						<input type="date" name="buying_date" id="buying_date" class="form-control @error('buying_date') is-invalid @enderror" value="{{ old('buying_date') }}">
					  					</div>
					  					@error('buying_date')
					               	      	<div class="alert alert-danger">{{ $message }}</div>
					               	 	@enderror

			               	 			 <div class="form-group">
			  								<label>Description (English) <small class="text-danger"> * Optional</small></label>
			  								<textarea name="description_en" id="description_en" class="form-control @error('description_en') is-invalid @enderror" >{{ old('description_en') }}</textarea>
			  							</div>
			  							@error('description_en')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 

			               	 			 
			  							<button type="submit" class="btn btn-info">Add</button>
			  						</div>
			  						<div class="col-md-6">
			  							
			               	 			 <div class="form-group">
			  								<label>Product Category</label>
			  								<select name="productcategory_id" id="productcategory_id" class="form-control select2bs4 @error('productcategory_id') is-invalid @enderror">
			  									<option selected="" disabled="">Select A Product Category</option>
			  									@foreach($productcategory as $row)
			  										<option value="{{ $row->id }}">{{ $row->name_en }} | {{ $row->name_bn }}</option>
			  									@endforeach
			  								</select>
			  							</div>
			  							@error('productcategory_id')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror
				               	 			 <div class="form-group">
				  								<label>Product Name (Bangla)</label>
				  								<input type="text" name="name_bn" id="name_bn" class="form-control @error('name_bn') is-invalid @enderror" placeholder="Enter Product Name Bangla" value="{{ old('name_bn') }}">
				  							</div>
				  							@error('name_bn')
				               	      			<div class="alert alert-danger">{{ $message }}</div>
				               	 			@enderror
				               	 			<div class="form-group">
				  								<label>Price (Bangla)</label>
				  								<input type="text" name="price_bn" id="price_bn" class="form-control @error('price_bn') is-invalid @enderror" placeholder="Enter Product Price Bangla" value="{{ old('price_bn') }}">
				  							</div>
				  							@error('price_bn')
				               	      			<div class="alert alert-danger">{{ $message }}</div>
				               	 			@enderror
				               	 			<div class="form-group">
				  								<label>Quantity (Bangla)</label>
				  								<input type="text" name="quantity_bn" id="quantity_bn" class="form-control @error('quantity_bn') is-invalid @enderror" placeholder="Enter Product Quantity Bangla" value="{{ old('quantity_bn') }}">
				  							</div>
				  							@error('quantity_bn')
				               	      			<div class="alert alert-danger">{{ $message }}</div>
				               	 			@enderror
				               	 			<br><hr>

				               	 			<div class="form-group">
				  								<label>Discount (Bangla) <small class="text-danger"> * Optional</small></label>
				  								<input type="text" name="discount_bn" id="discount_bn" class="form-control @error('discount_bn') is-invalid @enderror" placeholder="Enter Product Discount Bangla" value="{{ old('discount_bn') }}">
				  							</div>
				  							@error('discount_bn')
				               	      			<div class="alert alert-danger">{{ $message }}</div>
				               	 			@enderror
			  								<div class="form-group">
				  								<label>Size (Bangla) <small class="text-danger"> * Optional</small></label>
				  								<input type="text" name="size_bn" id="size_bn" class="form-control @error('size_bn') is-invalid @enderror" placeholder="Enter Product Size Bangla" value="{{ old('size_bn') }}">
				  							</div>
				  							@error('size_bn')
				               	      			<div class="alert alert-danger">{{ $message }}</div>
				               	 			@enderror

				               	 			<div class="form-group">
				  								<label>Color (Bangla) <small class="text-danger"> * Optional</small></label>
				  								<input type="text" name="color_bn" id="color_bn" class="form-control @error('color_bn') is-invalid @enderror" placeholder="Enter Product Color Bangla" value="{{ old('color_bn') }}">
					  						</div>
					  						@error('color_bn')
					               	      		<div class="alert alert-danger">{{ $message }}</div>
					               	 		@enderror
					               	 		<div class="form-group">
					  							<label>Warranty (Bangla) <small class="text-danger"> * Optional</small></label>
					  							<input type="text" name="warranty_bn" id="warranty_bn" class="form-control @error('warranty_bn') is-invalid @enderror" placeholder="Enter Product Warranty Bangla" value="{{ old('warranty_bn') }}">
					  						</div>
					  						@error('warranty_bn')
					               	      		<div class="alert alert-danger">{{ $message }}</div>
					               	 		@enderror
					               	 		<div class="form-group">
					  							<label>Expire Date <small class="text-danger"> * Optional</small></label>
					  							<input type="date" name="expire_date" id="expire_date" class="form-control @error('expire_date') is-invalid @enderror" value="{{ old('expire_date') }}">
					  						</div>
					  						@error('expire_date')
					               	      		<div class="alert alert-danger">{{ $message }}</div>
					               	 		@enderror

			               	 			 <div class="form-group">
			  								<label>Description (Bangla) <small class="text-danger"> * Optional</small></label>
			  								<textarea name="description_bn" id="description_bn" class="form-control @error('description_bn') is-invalid @enderror" >{{ old('description_bn') }}</textarea>
			  							</div>
			  							@error('description_bn')
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

