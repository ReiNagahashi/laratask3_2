@extends('welcome')
@section('page')
<div class="container">
        @if(count($errors) > 0)
            <ul class="list-group">
                @foreach($errors->all() as $errors)
                     <li class="list-group-item text-danger">{{$errors}}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{route('task.create')}}" method="POST">
          @csrf
            <div class="form-group">
                <input type="text" name="title" class="form-control">
            </div>
            <input type="submit" value="Submit" class="btn btn-primary">
        </form>
        <div class="card">
            @if(count($tasks) > 0)
                <table class="table">
                    <thead> 
                        <th>Id</th>
                        <th>タイトル</th>
                        <th>Action</th>
                    </thead> 
                    <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$task->title}}</td>
                                <td>
                                    <form action="/delete" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="task_id" value="{{$task->id}}">
                                        <input type="submit" value="削除" class="btn btn-danger">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
    </div>
</div>
@endsection