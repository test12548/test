@extends('layouts.content')

@section('content')
<!-- Default form login -->
<form class="text-center border border-light p-5" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" id="defaultLoginFormEmail" class="form-control mb-4" name="name" placeholder="Book Name">
    <div class="form-group">
        <select class="form-control" name="author">
            @foreach($authors as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
    </div>
    <input type="text" id="defaultLoginFormEmail" class="form-control mb-4" name="pages" placeholder="Number Of Pages">
    <button class="btn btn-info btn-block my-4" type="submit">Create</button>

</form>
<!-- Default form login -->
@endsection
