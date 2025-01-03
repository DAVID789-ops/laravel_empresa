@extends('adminlte::page')

@section('title', 'Título de la Página')

@section('content_header')
    <h1>Legion</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1 class="m-0 text-dark">Editar Deuda</h1>
        </div>
        <div class="col text-right">
            <a href="{{ route('deudas.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Volver</a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Formulario para Editar Deuda</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('deudas.update', $deuda->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Campos existentes -->
                <div class="form-group">
                    <label for="nombre_colegio">Nombre Colegio</label>
                    <input type="text" class="form-control @error('nombre_colegio') is-invalid @enderror" id="nombre_colegio" name="nombre_colegio" value="{{ old('nombre_colegio', $deuda->nombre_colegio) }}" required>
                    @error('nombre_colegio')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cantidad_deuda">Cantidad Deuda</label>
                    <input type="number" step="0.01" class="form-control @error('cantidad_deuda') is-invalid @enderror" id="cantidad_deuda" name="cantidad_deuda" value="{{ old('cantidad_deuda', $deuda->cantidad_deuda) }}" required>
                    @error('cantidad_deuda')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="producto_entregado">Producto Entregado</label>
                    <input type="text" class="form-control @error('producto_entregado') is-invalid @enderror" id="producto_entregado" name="producto_entregado" value="{{ old('producto_entregado', $deuda->producto_entregado) }}" required>
                    @error('producto_entregado')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="fecha_entrega">Fecha de Entrega</label>
                    <input type="date" class="form-control @error('fecha_entrega') is-invalid @enderror" id="fecha_entrega" name="fecha_entrega" value="{{ old('fecha_entrega', $deuda->fecha_entrega) }}" required>
                    @error('fecha_entrega')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email_contacto">Email de Contacto</label>
                    <input type="email" class="form-control @error('email_contacto') is-invalid @enderror" id="email_contacto" name="email_contacto" value="{{ old('email_contacto', $deuda->email_contacto) }}" required>
                    @error('email_contacto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campo de archivo PDF -->
                <div class="form-group">
                    <label for="pdf">Archivo PDF</label>
                    <input type="file" class="form-control @error('pdf') is-invalid @enderror" id="pdf" name="pdf">
                    @error('pdf')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Nuevos Campos -->
                <div class="form-group">
                    <label for="intensidad">Intensidad</label>
                    <select class="form-control @error('intensidad') is-invalid @enderror" id="intensidad" name="intensidad" required>
                        <option value="1" {{ old('intensidad', $deuda->intensidad) == 1 ? 'selected' : '' }}>1</option>
                        <option value="2" {{ old('intensidad', $deuda->intensidad) == 2 ? 'selected' : '' }}>2</option>
                        <option value="3" {{ old('intensidad', $deuda->intensidad) == 3 ? 'selected' : '' }}>3</option>
                        <option value="4" {{ old('intensidad', $deuda->intensidad) == 4 ? 'selected' : '' }}>4</option>
                    </select>
                    @error('intensidad')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tiempo">Tiempo</label>
                    <select class="form-control @error('tiempo') is-invalid @enderror" id="tiempo" name="tiempo" required>
                        <option value="1" {{ old('tiempo', $deuda->tiempo) == 1 ? 'selected' : '' }}>1</option>
                        <option value="2" {{ old('tiempo', $deuda->tiempo) == 2 ? 'selected' : '' }}>2</option>
                        <option value="3" {{ old('tiempo', $deuda->tiempo) == 3 ? 'selected' : '' }}>3</option>
                        <option value="4" {{ old('tiempo', $deuda->tiempo) == 4 ? 'selected' : '' }}>4</option>

                    </select>
                    @error('tiempo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="idioma">Idioma</label>
                    <select class="form-control @error('idioma') is-invalid @enderror" id="idioma" name="idioma" required>
                        <option value="frances" {{ old('idioma', $deuda->idioma) == 'frances' ? 'selected' : '' }}>Francés</option>
                        <option value="ingles" {{ old('idioma', $deuda->idioma) == 'ingles' ? 'selected' : '' }}>Inglés</option>
                        <option value="espanol" {{ old('idioma', $deuda->idioma) == 'espanol' ? 'selected' : '' }}>Español</option>
                    </select>
                    @error('idioma')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campo de Signo -->
                <div class="form-group">
                    <label for="signo">Moneda </label>
                    <select class="form-control @error('signo') is-invalid @enderror" id="signo" name="signo" required>
                        <option value="Q" {{ old('signo', $deuda->signo) == 'Q' ? 'selected' : '' }}>Q</option>
                        <option value="J$" {{ old('signo', $deuda->signo) == 'J$' ? 'selected' : '' }}>J$</option>
                        <option value="$" {{ old('signo', $deuda->signo) == '$' ? 'selected' : '' }}>$</option>
                        <option value="G" {{ old('signo', $deuda->signo) == 'G' ? 'selected' : '' }}>G</option>
                        <option value="BDS" {{ old('signo', $deuda->signo) == 'BDS' ? 'selected' : '' }}>BDS</option>
                    </select>
                    @error('signo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Nuevos Campos -->
                <div class="form-group">
                    <label for="telefono_1">Teléfono 1</label>
                    <input type="text" class="form-control @error('telefono_1') is-invalid @enderror" id="telefono_1" name="telefono_1" value="{{ old('telefono_1', $deuda->telefono_1) }}" maxlength="15" pattern="[\d\s\+\-\(\)]{1,15}">
                    @error('telefono_1')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="telefono_2">Teléfono 2</label>
                    <input type="text" class="form-control @error('telefono_2') is-invalid @enderror" id="telefono_2" name="telefono_2" value="{{ old('telefono_2', $deuda->telefono_2) }}" maxlength="15" pattern="[\d\s\+\-\(\)]{1,15}">
                    @error('telefono_2')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email_marketing">Email Marketing</label>
                    <select class="form-control @error('email_marketing') is-invalid @enderror" id="email_marketing" name="email_marketing">
                        <option value="1" {{ old('email_marketing', $deuda->email_marketing) == 1 ? 'selected' : '' }}>Sí</option>
                        <option value="0" {{ old('email_marketing', $deuda->email_marketing) == 0 ? 'selected' : '' }}>No</option>
                    </select>
                    @error('email_marketing')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cobrar">¿Cobrar?</label>
                    <select class="form-control @error('cobrar') is-invalid @enderror" id="cobrar" name="cobrar">
                        <option value="1" {{ old('cobrar', $deuda->cobrar) == 1 ? 'selected' : '' }}>Sí</option>
                        <option value="0" {{ old('cobrar', $deuda->cobrar) == 0 ? 'selected' : '' }}>No</option>
                    </select>
                    @error('cobrar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Botón de actualización -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
