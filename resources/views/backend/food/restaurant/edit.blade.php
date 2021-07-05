@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Edit Restaurant</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">Edit Restaurant</li>
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
			    <h3 class="card-title">Edit Restaurant</h3>
			    <div class="btn-group float-sm-right">
                	<a href="{{ route('all.restaurant') }}" class="btn btn-danger btn-sm float-sm-right text-white">
                  		All Restaurant
                	</a>
			    </div>
			  </div>
			  <!-- /.card-header -->
			  			<div class="card-body">
			  				<form action="{{ route('update.restaurant',$data->id) }}" method="post" enctype="multipart/form-data">
			  					@csrf
			  					<div class="row">
			  						
			  						<div class="col-md-6">
			  							
			               	 			 <div class="form-group">
			  								<label>Restaurant Name (English)</label>
			  								<input type="text" name="name_en" id="name_en" class="form-control @error('name_en') is-invalid @enderror" value="{{ $data->name_en }}">
			  							</div>
			  							@error('name_en')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 <div class="form-group">
			  								<label>Restaurant Category</label>
			  								<select name="restaurantcategory_id" id="restaurantcategory_id" class="form-control @error('restaurantcategory_id') is-invalid @enderror">
			  									<option selected="" disabled="">Select A Restaurant Category</option>
			  									@foreach($restaurantcategory as $row)
			  										<option @if($row->id == $data->restaurantcategory_id) selected="" @endif value="{{ $row->id }}">{{ $row->name_en }} | {{ $row->name_bn }}</option>
			  									@endforeach
			  								</select>
			  							</div>
			  							@error('restaurantcategory_id')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 <div class="form-group">
			  								<label>Phone (English)</label>
			  								<input type="text" name="phone_en" id="phone_en" class="form-control @error('phone_en') is-invalid @enderror" value="{{ $data->phone_en }}">
			  							</div>
			  							@error('phone_en')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 <div class="form-group">
			  								<label>Description (English) <small class="text-primary">* Optional</small></label>
			  								<textarea name="description_en" id="description_en" class="form-control @error('description_en') is-invalid @enderror" >{{ $data->description_en }}</textarea>
			  							</div>
			  							@error('description_en')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 <div class="form-group">
			  								<label>Owner Name (English) <small class="text-primary">* Optional</small></label>
			  								<input type="text" name="owner_en" id="owner_en" class="form-control @error('owner_en') is-invalid @enderror" value="{{ $data->owner_en }}">
			  							</div>
			  							@error('owner_en')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror
			               	 			 
			               	 			 <div class="form-group">
			  								<label>Ratting (English) <small class="text-primary">* Optional</small></label>
			  								<input type="text" name="ratting_en" id="owner_en" class="form-control @error('ratting_en') is-invalid @enderror" value="{{ $data->ratting }}">
			  							</div>
			  							@error('ratting_en')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror
			               	 			 
			               	 			 <div class="form-group">
			               	 			 	<img src="{{ URL::to($data->image) }}" alt="" style="height: 120px;width:120px;" id="image">
			               	 			 	<label for="exampleInputFile">Restaurant Image</label>
			               	 			 	<div class="input-group">
			               	 			 		<div class="custom-file">
			               	 			 			<input type="file"  accept="image/*" name="image" id="image" class="custom-file-input" id="exampleInputFile" onchange="readURL(this);">
			               	 			 			<label class="custom-file-label" for="exampleInputFile">Choose file</label>
			               	 			 		</div>
			               	 			 	</div>
			               	 			 </div>
			               	 			 @error('image')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 
			  							<button type="submit" class="btn btn-info">Update</button>
			  						</div>
			  						<div class="col-md-6">
			  							<div class="form-group">
			  								<label>Restaurant Name (Bangla)</label>
			  								<input type="text" name="name_bn" id="name_bn" class="form-control @error('name_bn') is-invalid @enderror" value="{{ $data->name_bn }}">
			  							</div>
			  							@error('name_bn')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 <div class="form-group">
			  								<label>Floor</label>
			  								<select name="floor_id" id="floor_id" class="form-control @error('floor_id') is-invalid @enderror">
			  									<option selected="" disabled="">Select A Floor</option>
			  									@foreach($floor as $row)
			  										<option @if($row->id == $data->floor_id) selected="" @endif value="{{ $row->id }}">{{ $row->name_en }} | {{ $row->name_bn }}</option>
			  									@endforeach
			  								</select>
			  							</div>
			  							@error('floor_id')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror
			               	 			 <div class="form-group">
			  								<label>Phone (Bangla)</label>
			  								<input type="text" name="phone_bn" id="phone_bn" class="form-control @error('phone_bn') is-invalid @enderror" value="{{ $data->phone_bn }}">
			  							</div>
			  							@error('phone_bn')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 <div class="form-group">
			  								<label>Description (Bangla) <small class="text-primary">* Optional</small></label>
			  								<textarea name="description_bn" id="description_bn" class="form-control @error('description_bn') is-invalid @enderror" >{{ $data->description_bn }}</textarea>
			  							</div>
			  							@error('description_bn')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 <div class="form-group">
			  								<label>Owner Name (Bangla) <small class="text-primary">* Optional</small></label>
			  								<input type="text" name="owner_bn" id="owner_bn" class="form-control @error('owner_bn') is-invalid @enderror" value="{{ $data->owner_bn }}">
			  							</div>
			  							@error('owner_bn')
			               	      			<div class="alert alert-danger">{{ $message }}</div>
			               	 			 @enderror

			               	 			 <div class="form-group">
			  								<label>Open Time<small class="text-primary">* Optional</small></label>
			  								<input type="text" name="open" id="open" class="form-control @error('open') is-invalid @enderror" value="{{ $data->open }}">
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

