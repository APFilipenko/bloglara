@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Листинг сущности</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                <a href="{{route('users.create')}}" class="btn btn-success">Добавить</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Имя</th>
                  <th>E-mail</th>
                  <th>Аватар</th>
                  <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                	@foreach($users as $user)
                <tr>
                  <td>{{$user->id}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>
                    <img src="{{$user->getAvatar()}}" alt="" class="img-responsive" width="150">
                  </td>
                  <td>
                    @if($comment->status == 1)
                    <a href="/admin/comments/toggle/{{$comment->id}}" class="fa fa-lock"></a>
                    @else
                    <a href="/admin/comments/toggle/{{$comment->id}}" class="fa fa-thumbs-o-up"></a>
                    @endif
                    <a href="{{route('users.edit', $user->id)}}" class="fa fa-pencil"></a> 
                  	{{Form::open(['route'=>['users.destroy', $user->id], 'method'=>'delete'])}}
                  	<button onclick="return confirm('are you sure?')" type="submit" class="delete">
                  	<i class="fa fa-remove"></i></td>
                  	</button>
                  	{{Form::close()}}
                </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
          </div>
    </section>
  </div>
  @endsection