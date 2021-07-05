@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Edit Menu</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">Edit Menu</li>
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
			    <h3 class="card-title">Edit Menu</h3>
			    <div class="btn-group float-sm-right">
                	<a href="{{ route('all.menu') }}" class="btn btn-danger btn-sm float-sm-right text-white">
                  		All Menu
                	</a>
			    </div>
			  </div>
			  <!-- /.card-header -->
			  			<div class="card-body">
			  				<form action="{{ route('update.menu',$data->id) }}" method="post" enctype="multipart/form-data">
			  					@csrf
			  					<div class="row">
			  						
			  						<div class="col-md-6">
			  						
			  							<div class="form-group">
			               	 			 	<img src="{{ URL::to($data->image) }}" alt="" id="image" style="width: 120px;height: 120px;">
			               	 			 	<label for="exampleInputFile">Menu Image</label>
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
			  								<label>Menu Name (English)</label>
			  								<input type="text" name="name_en" id="name_en" class="form-control @error('name_en') is-invalid @enderror" placeholder="Enter Menu English" value="{{ $data->name_en }}">
			  							</div>
			  							@error('name_en')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 <div class="form-group">
			  								<label>Price (English)</label>
			  								<input type="text" name="price_en" id="price_en" class="form-control @error('price_en') is-invalid @enderror" placeholder="Enter Menu Price English" value="{{ $data->price_en }}">
			  							</div>
			  							@error('price_en')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 
				               	 		
				               	 		
				               	 		<div class="form-group">
				  							<label>Discount (English) <small class="">  Optional</small></label>
				  							<input type="text" name="discount_en" id="discount_en" class="form-control @error('discount_en') is-invalid @enderror" placeholder="Enter Menu Discount English" value="{{ $data->discount_en }}">
				  						</div>
				  						@error('discount_en')
				               	      		<div class="alert alert-danger">{{ $message }}</div>
				               	 		@enderror
				               	 		

			               	 			 <div class="form-group">
			  								<label>Description (English) <small class=""> Optional</small></label>
			  								<textarea name="description_en" id="description_en" class="form-control @error('description_en') is-invalid @enderror" >{{ $data->description_en }}</textarea>
			  							</div>
			  							@error('description_en')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 

			               	 			 
			  							<button type="submit" class="btn btn-info">Update</button>
			  						</div>
			  						<div class="col-md-6">
			  							<div class="form-group">
			  								<label>Menu Category</label>
			  								<select name="menucategory_id" id="menucategory_id" class="form-control select2bs4 @error('menucategory_id') is-invalid @enderror">
			  									<option selected="" disabled="">Select A Menu Category</option>
			  									@foreach($menucategory as $row)
			  										<option @if($data->menucategory_id == $row->id) selected="" @endif value="{{ $row->id }}">{{ $row->name_en }} | {{ $row->name_bn }}</option>
			  									@endforeach
			  								</select>
			  							</div>
			  							@error('menucategory_id')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror
				               	 			 <div class="form-group">
				  								<label>Menu Name (Bangla)</label>
				  								<input type="text" name="name_bn" id="name_bn" class="form-control @error('name_bn') is-invalid @enderror" placeholder="Enter Menu Name Bangla" value="{{ $data->name_bn }}">
				  							</div>
				  							@error('name_bn')
				               	      			<div class="alert alert-danger">{{ $message }}</div>
				               	 			@enderror
				               	 			<div class="form-group">
				  								<label>Price (Bangla)</label>
				  								<input type="text" name="price_bn" id="price_bn" class="form-control @error('price_bn') is-invalid @enderror" placeholder="Enter Menu Price Bangla" value="{{ $data->price_bn }}">
				  							</div>
				  							@error('price_bn')
				               	      			<div class="alert alert-danger">{{ $message }}</div>
				               	 			@enderror
				               	 			
				               	 			<div class="form-group">
				  								<label>Discount (Bangla) <small class=""> Optional</small></label>
				  								<input type="text" name="discount_bn" id="discount_bn" class="form-control @error('discount_bn') is-invalid @enderror" placeholder="Enter Product Discount Bangla" value="{{ $data->discount_bn }}">
				  							</div>
				  							@error('discount_bn')
				               	      			<div class="alert alert-danger">{{ $message }}</div>
				               	 			@enderror
			  								
			               	 			 <div class="form-group">
			  								<label>Description (Bangla) <small class="">  Optional</small></label>
			  								<textarea name="description_bn" id="description_bn" class="form-control @error('description_bn') is-invalid @enderror" >{{ $data->description_bn }}</textarea>
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

