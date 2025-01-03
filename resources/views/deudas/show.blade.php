@extends('adminlte::page')

@section('title', 'Título de la Página')

@section('content_header')
    <h1>Legion</h1>
@endsection



@section('content')
<div class="container mt-4">
    <h1>Detalles de la Deuda</h1>

    <div class="card">
        <div class="card-header">
            <h3>Deuda de: {{ $deuda->nombre_colegio }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Nombre Colegio:</strong> {{ $deuda->nombre_colegio }}</p>
            <p><strong>Cantidad Deuda:</strong> {{ number_format($deuda->cantidad_deuda, 2) }}</p>
            <p><strong>Producto Entregado:</strong> {{ $deuda->producto_entregado }}</p>
            <p><strong>Fecha de Entrega:</strong> {{ $deuda->fecha_entrega }}</p>
            <p><strong>Email de Contacto:</strong> {{ $deuda->email_contacto }}</p>
            <p><strong>Tiempo:</strong> {{ $deuda->tiempo }}</p>
            <p><strong>Signo:</strong> {{ $deuda->signo }}</p>
            <p><strong>Intensidad:</strong> {{ $deuda->intensidad }}</p>
            <p><strong>Idioma:</strong> {{ $deuda->idioma }}</p>
            <p><strong>Teléfono 1:</strong> {{ $deuda->telefono_1 }}</p>
            <p><strong>Teléfono 2:</strong> {{ $deuda->telefono_2 }}</p>
            <p><strong>Email Marketing:</strong> {{ $deuda->email_marketing ? 'Activado' : 'Desactivado' }}</p>
            <p><strong>Cobrar:</strong> {{ $deuda->cobrar ? 'Sí' : 'No' }}</p>
            <p><strong>Fecha de Creación:</strong> {{ $deuda->created_at }}</p>
            <p><strong>Fecha de Última Actualización:</strong> {{ $deuda->updated_at }}</p>

            <!-- Verificar si el PDF existe y agregar enlace para visualizar o descargar -->
            @if ($deuda->pdf_documento)
                <p><strong>Documento PDF:</strong></p>
                <a href="{{ asset('storage/' . $deuda->pdf_documento) }}" target="_blank" class="btn btn-info">
                    <i class="fas fa-file-pdf"></i> Ver Documento
                </a>
                <a href="{{ asset('storage/' . $deuda->pdf_documento) }}" download class="btn btn-success">
                    <i class="fas fa-download"></i> Descargar Documento
                </a>
            @else
                <p>No hay documento PDF disponible.</p>
            @endif
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('deudas.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver a la Lista
            </a>
        </div>
    </div>
</div>
@endsection
