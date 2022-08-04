@extends('layout.master')

@section('title','Todo Edit')

@section('content')
<a href="{{ route('todo.show') }}">Back</a><br/><br/>

<form method="post" action="{{ route('todo.update',$todoArr->id) }}">
    @csrf
    <table>
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="textbox" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Name" value="{{$todoArr->name}}" required>
        </div>
        <div class="form-group">
            <td></td>
            <td> <input type="submit" name="submit" class="btn btn-primary"/></td>
        </div>
    </table>
</form>
@endsection
