@extends('adminlte::page')

@section('title', 'Título de la Página')

@section('content_header')
    <h1>Legion</h1>
@endsection
@section('content')
<!-- Vincula Awesome Notifications -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/awesome-notifications/dist/style.css">
<!-- Script de Awesome Notifications -->
<script src="https://cdn.jsdelivr.net/npm/awesome-notifications/dist/index.var.min.js"></script>
<!-- Script de Awesome Notifications -->
<script>
    const notifier = new AWN();

    // Mostrar notificación de éxito si hay un mensaje de éxito
    @if(session('success'))
        notifier.success("{{ session('success') }}");
    @endif
</script>
<div class="container">
    <h1 class="mb-4">Cambiar Contraseña</h1>

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('profile.change-password') }}">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="current_password">Contraseña Actual</label>
            <input
                type="password"
                class="form-control @error('current_password') is-invalid @enderror"
                id="current_password"
                name="current_password"
                required>
            @error('current_password')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="password">Nueva Contraseña</label>
            <input
                type="password"
                class="form-control @error('password') is-invalid @enderror"
                id="password"
                name="password"
                required>
            @error('password')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="password_confirmation">Confirmar Nueva Contraseña</label>
            <input
                type="password"
                class="form-control"
                id="password_confirmation"
                name="password_confirmation"
                required>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Actualizar Contraseña</button>
    </form>
</div>
@endsection
