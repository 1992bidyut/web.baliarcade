@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Cache</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="#">Cache</a></li>
	          <li class="breadcrumb-item active">Dashboard</li>
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
	    	<div class="row">
	    		<div class="col-md-12">
	    			<div class="card">
	    				<div class="card-header">
	    					<h3 class="text-center"><b>Clear System Cache</b></h3>
	    				</div>
	    				<div class="card-body">
	    					<div class="row">
	    						<div class="col-3">
	    							<a href="{{ route('clear.cache') }}" class="btn btn-primary">Clear Cache</a>
	    						</div>
	    						<div class="col-3">
	    							<a href="{{ route('clear.config.cache') }}" class="btn btn-success">Clear Config Cache</a>
	    						</div>
	    						<div class="col-3">
	    							<a href="{{ route('clear.view.cache') }}" class="btn btn-info">Clear View Cache</a>
	    						</div>
	    						<div class="col-3">
	    							<a href="{{ route('clear.route.cache') }}" class="btn btn-danger">Clear Route Cache</a>
	    						</div>
	    					</div>
	    				</div>
	    			</div>
	    		</div>
	    	</div>
	    <!-- /.row (main row) -->
	  </div><!-- /.container-fluid -->
	</section>
@endsection()