@extends('layouts.content')

@section('content')
<!-- Default form login -->
<form class="text-center border border-light p-5" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" id="defaultLoginFormEmail" class="form-control mb-4" name="email">
    <input type="password" id="defaultLoginFormEmail" class="form-control mb-4" name="password">
    <button class="btn btn-info btn-block my-4" type="submit">Login</button>

</form>
<!-- Default form login -->
@endsection
