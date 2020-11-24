@extends('layout')

@section('content')

<div class="mt-5">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
  <table class="table">
    <thead>
        <tr class="table-primary">
          <td># ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Phone</td>
          <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($employee as $employee)
        <tr>
            <td>{{$employee->id}}</td>
            <td>{{$employee->name}}</td>
            <td>{{$employee->email}}</td>
            <td>{{$employee->phone}}</td>
            <td class="text-center">
                <a href="{{ route('employees.edit', $employee->id)}}" class="btn btn-success btn-sm">Edit</a>
                <form action="{{ route('employees.destroy', $employee->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection