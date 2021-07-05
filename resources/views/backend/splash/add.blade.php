@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Add New Advertise</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">Add New Splash Screen</li>
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
			    <h3 class="card-title">Add New Advertise</h3>
			    <div class="btn-group float-sm-right">
                	{{-- <a href="{{ route('all.advertisement') }}" class="btn btn-danger btn-sm float-sm-right text-white">
                  		All Advertise
                	</a> --}}
			    </div>
			  </div>
			  <!-- /.card-header -->
			  			<div class="card-body">
			  				<form action="{{ route('store.splash_screen') }}" method="post" enctype="multipart/form-data">
			  					@csrf
			  					<div class="row">
									<div class="col-lg-3">
										<div class="form-group">
											<label for="exampleInputEmail1">Title</label>
											<input type="text" class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp" placeholder="Advertise Title">
										</div>
									</div>
									<div class="col-lg-3">
										<div class="form-group">
											<label for="exampleInputPassword1">Advertise Slider</label>
											<input type="file" name="image" class="form-control" id="exampleInputPassword1">
										</div>
									</div>

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

