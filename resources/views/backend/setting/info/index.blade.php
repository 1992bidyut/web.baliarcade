@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Info</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">Info</li>
	        </ol>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
	  <div class="container-fluid">
	    @if($module == 'Shop')
	    				<div class="card">
	    				  <div class="card-header bg-info">
	    				    <h3 class="card-title">Your Info</h3>
	    				    
	    				  </div>
	    				  <!-- /.card-header -->
	    				  			<div class="card-body">
	    				  				<form action="{{ route('update.info',$shop->id) }}" method="post" enctype="multipart/form-data">
	    				  					@csrf
	    				  					<div class="row">
	    				  						
	    				  						<div class="col-md-6">
	    				  							
	    				               	 			 <div class="form-group">
	    				  								<label>Shop Name (English)</label>
	    				  								<input type="text" name="name_en" id="name_en" class="form-control @error('name_en') is-invalid @enderror" value="{{ $shop->name_en }}" readonly="">
	    				  							</div>
	    				  							

	    				               	 			 <div class="form-group">
	    				  								<label>Shop Category</label>
	    				  								<input type="text" class="form-control" readonly="" value="{{ $shop->shopcategory->name_en }}|{{ $shop->shopcategory->name_bn }}">
	    				  							</div>

	    				               	 			 <div class="form-group">
	    				  								<label>Phone (English)</label>
	    				  								<input type="text" name="phone_en" id="phone_en" class="form-control @error('phone_en') is-invalid @enderror" value="{{ $shop->phone_en }}">
	    				  							</div>
	    				  							@error('phone_en')
	    				               	      			<div class="alert alert-danger">{{ $message }}</div>
	    				               	 			 @enderror

	    				               	 			 <div class="form-group">
	    				  								<label>Description (English) <small class="text-primary">* Optional</small></label>
	    				  								<textarea name="description_en" id="description_en" class="form-control @error('description_en') is-invalid @enderror" >{{ $shop->description_en }}</textarea>
	    				  							</div>
	    				  							@error('description_en')
	    				               	      			<div class="alert alert-danger">{{ $message }}</div>
	    				               	 			 @enderror

	    				               	 			 <div class="form-group">
	    				  								<label>Owner Name (English) <small class="text-primary">* Optional</small></label>
	    				  								<input type="text" name="owner_en" id="owner_en" class="form-control @error('owner_en') is-invalid @enderror" value="{{ $shop->owner_en }}">
	    				  							</div>
	    				  							@error('owner_en')
	    				               	      			<div class="alert alert-danger">{{ $message }}</div>
	    				               	 			 @enderror
	    				               	 			 <div class="form-group">
	    				               	 			 	<img src="{{ URL::to($shop->image) }}" alt="" style="height: 120px;width:120px;" id="image">
	    				               	 			 	<label for="exampleInputFile">Shop Image</label>
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
	    				  								<label>Shop Name (Bangla)</label>
	    				  								<input type="text" name="name_bn" id="name_bn" class="form-control @error('name_bn') is-invalid @enderror" value="{{ $shop->name_bn }}" readonly="">
	    				  							</div>
	    				  							
	    				               	 			 <div class="form-group">
	    				  								<label>Floor</label>
	    				  								<input type="text" class="form-control" readonly="" value="{{ $shop->floor->name_en }}|{{ $shop->floor->name_bn }}">
	    				  							</div>
	    				  							
	    				               	 			 <div class="form-group">
	    				  								<label>Phone (Bangla)</label>
	    				  								<input type="text" name="phone_bn" id="phone_bn" class="form-control @error('phone_bn') is-invalid @enderror" value="{{ $shop->phone_bn }}">
	    				  							</div>
	    				  							@error('phone_bn')
	    				               	      			<div class="alert alert-danger">{{ $message }}</div>
	    				               	 			 @enderror

	    				               	 			 <div class="form-group">
	    				  								<label>Description (Bangla) <small class="text-primary">* Optional</small></label>
	    				  								<textarea name="description_bn" id="description_bn" class="form-control @error('description_bn') is-invalid @enderror" >{{ $shop->description_bn }}</textarea>
	    				  							</div>
	    				  							@error('description_bn')
	    				               	      			<div class="alert alert-danger">{{ $message }}</div>
	    				               	 			 @enderror

	    				               	 			 <div class="form-group">
	    				  								<label>Owner Name (Bangla) <small class="text-primary">* Optional</small></label>
	    				  								<input type="text" name="owner_bn" id="owner_bn" class="form-control @error('owner_bn') is-invalid @enderror" value="{{ $shop->owner_bn }}">
	    				  							</div>
	    				  							@error('owner_bn')
	    				               	      			<div class="alert alert-danger">{{ $message }}</div>
	    				               	 			 @enderror

	    				               	 			 <div class="form-group">
	    				  								<label>Open Time<small class="text-primary">* Optional</small></label>
	    				  								<input type="text" name="open" id="open" class="form-control @error('open') is-invalid @enderror" value="{{ $shop->open }}">
	    				  							</div>
	    				  							@error('open')
	    				               	      			<div class="alert alert-danger">{{ $message }}</div>
	    				               	 			 @enderror
	    				               	 			 


	    				  						</div>
	    				  					
	    				  				</form>
	    				  			</div>
	    				  <!-- /.card-body -->
	    				</div>
	    @elseif($module == 'Restaurant')
	    				<div class="card">
	    				  <div class="card-header bg-info">
	    				    <h3 class="card-title">Your Info</h3>
	    				    
	    				  </div>
	    				  <!-- /.card-header -->
	    				  			<div class="card-body">
	    				  				<form action="{{ route('update.info',$restaurant->id) }}" method="post" enctype="multipart/form-data">
	    				  					@csrf
	    				  					<div class="row">
	    				  						
	    				  						<div class="col-md-6">
	    				  							
	    				               	 			 <div class="form-group">
	    				  								<label>Restaurant Name (English)</label>
	    				  								<input type="text" name="name_en" id="name_en" class="form-control @error('name_en') is-invalid @enderror" value="{{ $restaurant->name_en }}" readonly="">
	    				  							</div>
	    				  							

	    				               	 			 <div class="form-group">
	    				  								<label>Restaurant Category</label>
	    				  								<input type="text" class="form-control" value="{{ $restaurant->restaurantcategory->name_en }}|{{ $restaurant->restaurantcategory->name_en }}" readonly="">
	    				  								
	    				  							</div>
	    				  							

	    				               	 			 <div class="form-group">
	    				  								<label>Phone (English)</label>
	    				  								<input type="text" name="phone_en" id="phone_en" class="form-control @error('phone_en') is-invalid @enderror" value="{{ $restaurant->phone_en }}">
	    				  							</div>
	    				  							@error('phone_en')
	    				               	      			<div class="alert alert-danger">{{ $message }}</div>
	    				               	 			 @enderror

	    				               	 			 <div class="form-group">
	    				  								<label>Description (English) <small class="text-primary">* Optional</small></label>
	    				  								<textarea name="description_en" id="description_en" class="form-control @error('description_en') is-invalid @enderror" >{{ $restaurant->description_en }}</textarea>
	    				  							</div>
	    				  							@error('description_en')
	    				               	      			<div class="alert alert-danger">{{ $message }}</div>
	    				               	 			 @enderror

	    				               	 			 <div class="form-group">
	    				  								<label>Owner Name (English) <small class="text-primary">* Optional</small></label>
	    				  								<input type="text" name="owner_en" id="owner_en" class="form-control @error('owner_en') is-invalid @enderror" value="{{ $restaurant->owner_en }}">
	    				  							</div>
	    				  							@error('owner_en')
	    				               	      			<div class="alert alert-danger">{{ $message }}</div>
	    				               	 			 @enderror
	    				               	 			 <div class="form-group">
	    				               	 			 	<img src="{{ URL::to($restaurant->image) }}" alt="" style="height: 120px;width:120px;" id="image">
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
	    				  								<input type="text" name="name_bn" id="name_bn" class="form-control @error('name_bn') is-invalid @enderror" value="{{ $restaurant->name_bn }}|{{ $restaurant->name_bn }}" readonly="">
	    				  							</div>
	    				  							
	    				               	 			 <div class="form-group">
	    				  								<label>Floor</label>
	    				  								<input type="text" class="form-control" readonly="" value="{{ $restaurant->floor->name_en }}|{{ $restaurant->floor->name_en }}">
	    				  							</div>
	    				  							
	    				               	 			 <div class="form-group">
	    				  								<label>Phone (Bangla)</label>
	    				  								<input type="text" name="phone_bn" id="phone_bn" class="form-control @error('phone_bn') is-invalid @enderror" value="{{ $restaurant->phone_bn }}">
	    				  							</div>
	    				  							@error('phone_bn')
	    				               	      			<div class="alert alert-danger">{{ $message }}</div>
	    				               	 			 @enderror

	    				               	 			 <div class="form-group">
	    				  								<label>Description (Bangla) <small class="text-primary">* Optional</small></label>
	    				  								<textarea name="description_bn" id="description_bn" class="form-control @error('description_bn') is-invalid @enderror" >{{ $restaurant->description_bn }}</textarea>
	    				  							</div>
	    				  							@error('description_bn')
	    				               	      			<div class="alert alert-danger">{{ $message }}</div>
	    				               	 			 @enderror

	    				               	 			 <div class="form-group">
	    				  								<label>Owner Name (Bangla) <small class="text-primary">* Optional</small></label>
	    				  								<input type="text" name="owner_bn" id="owner_bn" class="form-control @error('owner_bn') is-invalid @enderror" value="{{ $restaurant->owner_bn }}">
	    				  							</div>
	    				  							@error('owner_bn')
	    				               	      			<div class="alert alert-danger">{{ $message }}</div>
	    				               	 			 @enderror

	    				               	 			 <div class="form-group">
	    				  								<label>Open Time<small class="text-primary">* Optional</small></label>
	    				  								<input type="text" name="open" id="open" class="form-control @error('open') is-invalid @enderror" value="{{ $restaurant->open }}">
	    				  							</div>
	    				  							@error('open')
	    				               	      			<div class="alert alert-danger">{{ $message }}</div>
	    				               	 			 @enderror
	    				               	 			 


	    				  						</div>
	    				  					
	    				  				</form>
	    				  			</div>
	    				  <!-- /.card-body -->
	    				</div>
	    @endif
	  </div><!-- /.container-fluid -->
	</section>
@endsection()

