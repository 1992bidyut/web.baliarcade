@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">All Admin</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
	          <li class="breadcrumb-item active">All Admin</li>
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
			    <h3 class="card-title">All Admin</h3>
			    <a href="{{ route('create.admin') }}" class="btn btn-sm btn-danger" style="float: right;">Add New Admin</a>
                
			  </div>
			  <!-- /.card-header -->
			  <div class="card-body">
			    <table id="example1" class="table table-bordered table-striped">
			      <thead>
			      <tr>
			        <th>Name</th>
			        <th>Emial</th>
			        <th>Type</th>
			        <th>Status</th>
			        <th>Module</th>
			        <th>Shop</th>
			        <th>Restaurant</th>
			        <th>Action</th>
			      </tr>
			      </thead>
			      <tbody>
			      @foreach($admins as $row)
				    <tr @if($row->id == Auth::user()->id) class="bg-secondary" @endif>
				        <td>{{ $row->name }}</td>
				        <td>{{ $row->email }}</td>
				        <td>{!! $row->type==1 ? '<span class="badge badge-success">Super Admin</span>' : '<span class="badge badge-danger">Normal Admin</span>' !!}</td>
				        <td>{!! $row->status==1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Disabled</span>' !!}</td>
				        <td><span class="badge badge-primary">{{ $row->module }}</span></td>
				        <td>@if($row->shop) {{ $row->shop->name_en }} @endif</td>
				        <td>@if($row->restaurant) {{ $row->restaurant->name_en }} @endif</td>
				        <td><div class="btn-group"><a href="{{ route('edit.admin',$row->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>@if($row->id != Auth::user()->id)<a href="{{ route('admin.delete',$row->id) }}" class="btn btn-sm btn-danger" id="delete"><i class="fas fa-trash-alt"></i></a>  @endif</div></td>
				    </tr>
			      @endforeach()
			      
			      </tbody>
			      <tfoot>
			      <tr>
					<th>Name</th>
			        <th>Emial</th>
			        <th>Type</th>
			        <th>Status</th>
			        <th>Module</th>
			        <th>Shop</th>
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