@extends('layouts.admin')

@section('admin_content')
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">All splash screens</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
						<li class="breadcrumb-item active">All Splash Screen</li>
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
					<h3 class="card-title">All Splash Screen</h3>

				</div>

				<div class="card-body">
					<form action="{{ route('store.splash_screen') }}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-lg-3">
								<div class="form-group">
									<label for="exampleInputEmail1">Title</label>
									<input type="text" class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp" placeholder="Splash Screen Title">
								</div>
							</div>
							<div class="col-lg-3">
								<div class="form-group">
									<label for="exampleInputPassword1">Splash Screen</label>
									<input type="file" name="image" class="form-control" id="exampleInputPassword1">
								</div>
							</div>
							<div class="col-lg-2">
								<div class="form-group">
									<label for="">Add</label>
									<button type="submit" class="btn btn-sm btn-primary form-control">Add</button>
								</div>
							</div>
						</div>
					</form>
				</div>

				<!-- /.card-header -->
				<div class="card-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
						<tr>
							<th>Title</th>
							<th>Splash Screen</th>
							<th>Created At</th>
							<th>Action</th>
						</tr>
						</thead>
						<tbody>
						@foreach($Splashes as $Splash )
                        <tr>
                            <td>{{$Splash->name}}</td>
                            <td><img src="{{$Splash->image}}" width="140px" height="100px"  alt=""></td>
                            <td>{{$Splash->created_at->diffForHumans()}}</td>
                            <td>
                                <a href="#"  data-toggle="modal" data-target="#deleteSplash" class="btn btn-sm btn-danger">x</a>
                            </td>
                        </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteSplash" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Splash Screen</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        Are You Sure You Want To Delete?
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="{{route('splash.destroy',$Splash->id)}}" class="btn btn-danger">Yes</a>
                                    </div>
                                </div>
                                </div>
                            </div>
						@endforeach
						</tbody>
						<tfoot>
						<tr>
							<th>Title</th>
							<th>Splash Screen</th>
							<th>Created At</th>
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
