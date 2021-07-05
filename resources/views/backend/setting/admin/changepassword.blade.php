@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Change Your Password</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">Change Your Password</li>
	        </ol>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="card card-default">
			<div class="card-header bg-info">
				<h3 class="card-title">Change Your Password</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<form action="{{ route('update.admin.password',Auth::user()->id) }}" method="post">
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Enter New Password</label>
								<input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
							</div>
							@error('password')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			@enderror
							<div class="form-group">
								<label>Re Type New Password</label>
								<input type="password" name="confirmpassword" id="confirmpassword" class="form-control @error('confirmpassword') is-invalid @enderror">
							</div>
							@error('confirmpassword')
             	      			<div class="alert alert-danger">{{ $message }}</div>
             	 			@enderror
             	 			@if(Session::has('messege'))
             	 				<p class="alert alert-danger">{{ Session::get('messege') }}</p>
             	 			@endif
						</div>
						<!-- /.col -->
					
					</div>
					
					<button class="btn btn-info">Change</button>
				</form>
			</div>
        </div>
	</div><!-- /.container-fluid -->
</section>
@endsection()