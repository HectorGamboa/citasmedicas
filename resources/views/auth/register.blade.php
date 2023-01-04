@extends('layouts.form')

@section('content')
@section('title', 'Registro')
@section('subtitle', 'Ingresa tus datos para registrarte')
<div class="container mt--8 pb-5">
<div class="row justify-content-center">
<div class="col-lg-5 col-md-7">
<div class="card bg-secondary shadow border-0">
<div class="card-header bg-transparent pb-0">
<div class="card-body px-lg-5 py-lg-5">
<div class="text-center text-muted mb-4">
@if ($errors ->any())
<div class="text-center text-muted mb-4">
<small>Oops! Se encontró un error</small>
</div>

<div class="alert alert-danger" role="alert">
{{$errors ->first()}}
</div>

@endif
</div>
<form role="form" method="POST" action="{{ route('register') }}">
@csrf
<div class="form-group mb-3">
<div class="input-group input-group-alternative">
<div class="input-group-prepend">
<span class="input-group-text"><i class="ni ni-hat-3"></i></span>
</div>
<input class="form-control" placeholder="Nombre"type="text" 
name="name" value="{{ old('name') }}" required  autofocus>
</div>
</div>


<div class="form-group mb-3">
<div class="input-group input-group-alternative">
<div class="input-group-prepend">
<span class="input-group-text"><i class="ni ni-email-83"></i></span>
</div>
<input class="form-control" placeholder="Email"type="email" 
name="email" value="{{ old('email') }}" required  autofocus>
</div>
</div>





<div class="form-group">
<div class="input-group input-group-alternative">
<div class="input-group-prepend">
<span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
</div>
<input class="form-control" placeholder="Contraseña" type="password" name="password" required autofocus>
</div>
</div>

<div class="form-group">
<div class="input-group input-group-alternative">
<div class="input-group-prepend">
<span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
</div>
<input class="form-control" placeholder="Confirmar Contraseña" type="password" name="password_confirmation" required autofocus>
</div>
</div>

<div class="text-center">
<button type="submit" class="btn btn-primary my-4">Confirmar registro</button>
</div>
</form>
</div>
</div>

</div>
</div>
</div>
</div>


@endsection
