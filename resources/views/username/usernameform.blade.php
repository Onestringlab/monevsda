@extends('templates.app')

@section('title')
  Data Username
@endsection

@section('content')


<script>
function button_cancel(){
	location.replace('{{ asset('/') }}username');
}
</script>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Form Username</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<form class="form-horizontal" action="{{ asset('/') }}username/manage" method="post">
				@if($action == 'insert')
					<div class="form-group">
						<label class="col-sm-2 control-label">idusername</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="idusername" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">username</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="username" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">name</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="name" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">email</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="email" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">role</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="role" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">password</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="password" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">created_at</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="created_at" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">updated_at</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="updated_at" value="">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<button type="submit" class="btn btn-success">Insert</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel()">Cancel</button>
						</div>
					</div>
				@elseif($action == 'update')
					<div class="form-group">
						<label class="col-sm-2 control-label">idusername</label>
						<div class="col-sm-10">
	   					<input class="form-control" type="text" name="idusername" value="{{ $row->idusername }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">username</label>
						<div class="col-sm-10">
	   					<input class="form-control" type="text" name="username" value="{{ $row->username }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">name</label>
						<div class="col-sm-10">
	   					<input class="form-control" type="text" name="name" value="{{ $row->name }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">email</label>
						<div class="col-sm-10">
	   					<input class="form-control" type="text" name="email" value="{{ $row->email }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">role</label>
						<div class="col-sm-10">
	   					<input class="form-control" type="text" name="role" value="{{ $row->role }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">password</label>
						<div class="col-sm-10">
	   					<input class="form-control" type="text" name="password" value="{{ $row->password }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">created_at</label>
						<div class="col-sm-10">
	   					<input class="form-control" type="text" name="created_at" value="{{ $row->created_at }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">updated_at</label>
						<div class="col-sm-10">
	   					<input class="form-control" type="text" name="updated_at" value="{{ $row->updated_at }}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idusername" value = "{{ $row->idusername }}"?>
							<button type="submit" class="btn btn-success">Update</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel()">Cancel</button>
						</div>
					</div>
				@elseif($action == 'delete')
					<div class="form-group">
						<label class="col-sm-2 control-label">idusername</label>
						<div class="col-sm-10">
							{{ $row->idusername }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">username</label>
						<div class="col-sm-10">
							{{ $row->username }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">name</label>
						<div class="col-sm-10">
							{{ $row->name }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">email</label>
						<div class="col-sm-10">
							{{ $row->email }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">role</label>
						<div class="col-sm-10">
							{{ $row->role }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">password</label>
						<div class="col-sm-10">
							{{ $row->password }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">created_at</label>
						<div class="col-sm-10">
							{{ $row->created_at }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">updated_at</label>
						<div class="col-sm-10">
							{{ $row->updated_at }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idusername" value = "{{ $row->idusername }}"?>
							<button type="submit" class="btn btn-success">Delete</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel()">Cancel</button>
						</div>
					</div>
				@endif
					{{ csrf_field() }}
				</form>
			</div>
		</div>
	</div>
</div>



@endsection
