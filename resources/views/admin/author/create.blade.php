@extends('layouts.content')

@section('content')
<!-- Default form login -->
<form class="text-center border border-light p-5" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" id="defaultLoginFormEmail" class="form-control mb-4" name="fname" placeholder="first name">
    <input type="text" id="defaultLoginFormEmail" class="form-control mb-4" name="lname" placeholder="last name">
    <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" name="email" placeholder="email">
    <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" name="passwd" placeholder="Password">
    <input type="file" id="defaultLoginFormPassword" class="form-control mb-4" name="avatar">
    <button class="btn btn-info btn-block my-4" type="submit">Create</button>

</form>
<!-- Default form login -->
@endsection
