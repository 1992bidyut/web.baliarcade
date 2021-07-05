@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">All Menu Category</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">All Menu Category</li>
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
			    <h3 class="card-title">All Menu Category</h3>
			    <a href="{{ route('add.new.menucategory') }}" class="btn btn-sm btn-danger" style="float: right;">Add New Menu Category</a>
                
			  </div>
			  <!-- /.card-header -->
			  <div class="card-body">
			    <table id="example1" class="table table-bordered table-striped">
			      <thead>
			      <tr>
			        
			        <th>Menu Category Name (English)</th>
			        <th>Menu Category Name (Bangla)</th>
			        <th>Image</th>
			        <th>Restaurant</th>
			        <th>Action</th>
			      </tr>
			      </thead>
			      <tbody>
			      @foreach($data as $row)
				    <tr>
				        
				        <td>{{ $row->name_en }}</td>
				        <td>{{ $row->name_bn }}</td>
				        <td><img src="{{ URL::to($row->image) }}" style="width:40px;height:40px;"/></td>
				        <td>@if($row->restaurant) {{ $row->restaurant->name_en }} | {{ $row->restaurant->name_bn }} @else <span class="text-danger">Restaurant Not Found</span> @endif</td>
				        <td><div class="btn-group"><a href="{{ route('menu.category.edit',$row->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a><a href="{{ route('menu.category.delete',$row->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="fas fa-trash-alt"></i></a></div></td>
				    </tr>
			      @endforeach()
			      </tbody>
			      <tfoot>
			      <tr>
			       
			        <th>Menu Category Name (English)</th>
			        <th>Menu Category Name (Bangla)</th>
			        <th>Restaurant</th>
			        <th>Action</th>
			      </tr>
			      </tfoot>
			    </table>
			  </div>
			  <!-- /.card-body -->
			</div>
	    <!-- /.row -->
	    <!-- Main row -->
	    <!-- /.row (main row) -->
	  </div><!-- /.container-fluid -->
	</section>
@endsection()