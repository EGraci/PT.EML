<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>CRUD | Galeri</title>
    <link rel="stylesheet" href="{{asset('galeri/style.css')}}">
    <script src="{{asset('galeri/script.js')}}"></script>
</head>
<body>
    <div class="container">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-xs-6">
							<h2>CRUD <b>Galeri</b></h2>
						</div>
						<div class="col-xs-6">
							<a href="loqout" class="btn btn-danger" ><i class="material-icons"></i> <span>Keluar</span></a>	
							<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
												
						</div>
					</div>
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Judul</th>
							<th>Gambar</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($galeri as $data)
						<tr>
							<td>{{$data->id_galeri}}</td>
							<td>{{$data->judul}}</td>
							<td>{{$data->gambar}}</td>
							<td>
								<a href="#edit{{$data->id_galeri}}" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="/crud/{{$data->id_galeri}}" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>        
    </div>
	<!-- Edit Modal HTML -->
	@foreach ($galeri as $data)
	<div id="edit{{$data->id_galeri}}" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="/crud/{{$data->id_galeri}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="modal-header">						
						<h4 class="modal-title">Edit Galeri</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>ID</label>
							<input type="text" name="id" class="form-control" readonly value="{{$data->id_galeri}}">
						</div>					
						<div class="form-group">
							<label>Judul</label>
							<input type="text" name="judul" class="form-control" value="{{$data->judul}}" required>
						</div>
						<div class="form-group">
							<label>Gambar</label>
							<input type="file" name="gambar" class="form-control">
						</div>				
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>
	@endforeach
	<!-- Add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="/crud" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="modal-header">						
						<h4 class="modal-title">Tambah Galeri</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Judul</label>
							<input type="text" name="judul" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Gambar</label>
							<input type="file"  name="gambar" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>