@extends('adminlte::page')

@section('title', 'Título de la Página')

@section('content_header')
    <h1>Legion</h1>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1 class="m-0 text-dark">Crear Nueva Deuda</h1>
        </div>
        <div class="col text-right">
            <a href="{{ route('deudas.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Volver</a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Formulario de Nueva Deuda</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('deudas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nombre_colegio">Nombre Colegio</label>
                    <input type="text" class="form-control @error('nombre_colegio') is-invalid @enderror" id="nombre_colegio" name="nombre_colegio" value="{{ old('nombre_colegio') }}" required>
                    @error('nombre_colegio')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cantidad_deuda">Cantidad Deuda</label>
                    <input type="number" step="0.01" class="form-control @error('cantidad_deuda') is-invalid @enderror" id="cantidad_deuda" name="cantidad_deuda" value="{{ old('cantidad_deuda') }}" required>
                    @error('cantidad_deuda')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="signo">Signo</label>
                    <select class="form-control @error('signo') is-invalid @enderror" id="signo" name="signo" required>
                        <option value="" disabled selected>Seleccione un signo</option>
                        <option value="Q" {{ old('signo') == 'Q' ? 'selected' : '' }}>Q</option>
                        <option value="J$" {{ old('signo') == 'J$' ? 'selected' : '' }}>J$</option>
                        <option value="$" {{ old('signo') == '$' ? 'selected' : '' }}>$</option>
                        <option value="G" {{ old('signo') == 'G' ? 'selected' : '' }}>G</option>
                        <option value="BDS" {{ old('signo') == 'BDS' ? 'selected' : '' }}>BDS</option>
                    </select>
                    @error('signo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="producto_entregado">Producto Entregado</label>
                    <input type="text" class="form-control @error('producto_entregado') is-invalid @enderror" id="producto_entregado" name="producto_entregado" value="{{ old('producto_entregado') }}" required>
                    @error('producto_entregado')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="fecha_entrega">Fecha de Entrega</label>
                    <input type="date" class="form-control @error('fecha_entrega') is-invalid @enderror" id="fecha_entrega" name="fecha_entrega" value="{{ old('fecha_entrega') }}" required>
                    @error('fecha_entrega')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email_contacto">Email de Contacto</label>
                    <input type="email" class="form-control @error('email_contacto') is-invalid @enderror" id="email_contacto" name="email_contacto" value="{{ old('email_contacto') }}" required>
                    @error('email_contacto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campo Idioma -->
                <div class="form-group">
                    <label for="idioma">Idioma</label>
                    <select class="form-control @error('idioma') is-invalid @enderror" id="idioma" name="idioma">
                        <option value="" disabled selected>Seleccione un idioma</option>
                        <option value="frances" {{ old('idioma') == 'frances' ? 'selected' : '' }}>Francés</option>
                        <option value="ingles" {{ old('idioma') == 'ingles' ? 'selected' : '' }}>Inglés</option>
                        <option value="espanol" {{ old('idioma') == 'espanol' ? 'selected' : '' }}>Español</option>
                    </select>
                    @error('idioma')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campo Intensidad -->
                <div class="form-group">
                    <label for="intensidad">Intensidad</label>
                    <select class="form-control @error('intensidad') is-invalid @enderror" id="intensidad" name="intensidad">
                        <option value="" disabled selected>Seleccione una intensidad</option>
                        @for ($i = 1; $i <= 2; $i++)
                            <option value="{{ $i }}" {{ old('intensidad') == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                    @error('intensidad')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campo Tiempo -->
                 <!-- Nuevos campos -->
                <!-- Teléfono 1 -->
                <div class="form-group">
                    <label for="telefono_1">Teléfono 1</label>
                    <input type="text" class="form-control @error('telefono_1') is-invalid @enderror" id="telefono_1" name="telefono_1" value="{{ old('telefono_1') }}" pattern="[+\d\s]+" maxlength="15" placeholder="+502 65738953">
                    @error('telefono_1')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Teléfono 2 -->
                <div class="form-group">
                    <label for="telefono_2">Teléfono 2</label>
                    <input type="text" class="form-control @error('telefono_2') is-invalid @enderror" id="telefono_2" name="telefono_2" value="{{ old('telefono_2') }}" pattern="[+\d\s]+" maxlength="15" placeholder="+502 65738953">
                    @error('telefono_2')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email Marketing -->
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input @error('email_marketing') is-invalid @enderror" id="email_marketing" name="email_marketing" value="1" {{ old('email_marketing', true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="email_marketing">Habilitar Email Marketing</label>
                    @error('email_marketing')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Cobrar -->
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input @error('cobrar') is-invalid @enderror" id="cobrar" name="cobrar" value="1" {{ old('cobrar', false) ? 'checked' : '' }}>
                    <label class="form-check-label" for="cobrar">Cobrar</label>
                    @error('cobrar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tiempo -->
                <div class="form-group">
                    <label for="tiempo">Tiempo</label>
                    <input type="number" class="form-control @error('tiempo') is-invalid @enderror" id="tiempo" name="tiempo" value="{{ old('tiempo') }}" min="1" max="3">
                    @error('tiempo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Subir Documento PDF -->
                <div class="form-group">
                    <label for="pdf_documento">Subir Documento PDF</label>
                    <input type="file" class="form-control @error('pdf_documento') is-invalid @enderror" id="pdf_documento" name="pdf_documento" accept=".pdf">
                    @error('pdf_documento')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar Deuda</button>
            </form>
        </div>
    </div>
</div>
@endsection
