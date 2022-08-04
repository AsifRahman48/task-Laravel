@extends('layout.master')

@section('title','Todo')

@section('content')

    <a href="{{ route('todo.create') }}">Add Data</a><br/><br/>

    {{session('msg')}}
<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Created At</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($todoArr as $list)
        <tr>
            <td>{{$list->id}}</td>
            <td>{{$list->name}}</td>
            <td>{{$list->created_at}}</td>
            <td>
                <a class="delete" href="{{ route('todo.destroy', $list->id) }}">Delete</a>
                <a class="edit" href="{{ route('todo.edit', $list->id) }}">Edit</a>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>

    <style>
        .delete{
            color: white;
        }
        .edit{
            color: white;
        }
    </style>
@endsection

