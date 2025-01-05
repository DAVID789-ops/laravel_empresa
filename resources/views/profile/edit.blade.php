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
    <h1>Editar Perfil</h1>
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PATCH') <!-- Cambiado a PATCH -->

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Guardar Cambios</button>
    </form>

    <hr>

    <form action="{{ route('profile.destroy') }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar tu cuenta?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar Cuenta</button>
    </form>
</div>
@endsection
