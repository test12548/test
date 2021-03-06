@extends('layouts.content')
@section('content')

    <table class="table table-hover">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Manage</th>
      </tr>
    </thead>
    <tbody>
        @foreach($authors as $author)
      <tr>
        <td>{{ $author->firstname }}</td>
        <td>{{ $author->lastname }}</td>
        <td>{{ $author->email }}</td>
        <td>
            @foreach($author->Book()->get()->pluck('name', 'created_at') as $date => $name)
            <li>{{ $name }} - {{ $date }}</li>
            @endforeach
        </td>
        <td>
            <li><a href="{{ route('admin.author.edit', $author->id) }}">Edit</a></li>
            <li><a href="{{ route('admin.author.delete', $author->id) }}">Delete</a></li>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
