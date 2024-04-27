@extends('layout.mainLogin')
@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="card p-3">
            <h2 class="text-center">Login</h2>
            <hr>

            <div class="card-body">
                <form action="/login/store" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" value="{{ old('email') }}" name="email" class="form-control" placeholder="Isi Email Anda">
                        @if ($errors->has('email'))
                            <div class="alert alert-danger small mt-2">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-lable">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Isi Password Anda">
                        @if ($errors->has('password'))
                            <div class="alert alert-danger small mt-2">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="text-center">
                        <input type="submit" value="Login" class="btn btn-primary w-75">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@if (session('errors'))
<script>
    Swal.fire({
        icon: "error",
        title: "Oops...",
        text: '{{ session('errors')->first() }}',
    });
</script>
@endif
@endsection
