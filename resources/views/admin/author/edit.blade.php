@extends('layouts.content')

@section('content')
<!-- Default form login -->
<form class="text-center border border-light p-5" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" id="defaultLoginFormEmail" class="form-control mb-4" name="fname" value="{{ $author->firstname }}">
    <input type="text" id="defaultLoginFormEmail" class="form-control mb-4" name="lname" value="{{ $author->lastname }}">
    <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" name="email" value="{{ $author->email }}">
    <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" name="passwd" value="{{ $author->password }}">
    <input type="file" id="defaultLoginFormPassword" class="form-control mb-4" name="avatar">
    <button class="btn btn-info btn-block my-4" type="submit">Edit</button>

</form>

<!-- Default form login -->
@endsection
