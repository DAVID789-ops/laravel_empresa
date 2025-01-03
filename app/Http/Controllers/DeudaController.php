<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deuda;
use Illuminate\Support\Facades\Storage;
class DeudaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $search = $request->get('search');

    if ($search) {
        $deudas = Deuda::where('nombre_colegio', 'like', "%$search%")
            ->orWhere('producto_entregado', 'like', "%$search%")
            ->paginate(25);
    } else {
        $deudas = Deuda::paginate(25); // Paginación de 25 registros por página
    }

    return view('dashboard', compact('deudas'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('deudas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validación de los datos del formulario
    $request->validate([
        'nombre_colegio' => 'required|string|max:255',
        'cantidad_deuda' => 'required|numeric',
        'signo' => 'required|string|max:5',
        'producto_entregado' => 'required|string|max:255',
        'fecha_entrega' => 'required|date',
        'tiempo' => 'nullable|integer|max:10',
        'email_contacto' => 'required|email',
        'pdf_documento' => 'nullable|mimes:pdf|max:2240', // PDF máximo 2MB
        'telefono_1' => 'nullable|string|max:15',
        'telefono_2' => 'nullable|string|max:15',
        'email_marketing' => 'boolean',
        'cobrar' => 'boolean',
    ]);

    // Guardar la deuda
    $deuda = new Deuda();
    $deuda->nombre_colegio = $request->nombre_colegio;
    $deuda->cantidad_deuda = $request->cantidad_deuda;
    $deuda->signo = $request->signo;
    $deuda->producto_entregado = $request->producto_entregado;
    $deuda->fecha_entrega = $request->fecha_entrega;
    $deuda->email_contacto = $request->email_contacto;
    $deuda->idioma = $request->idioma;
    $deuda->intensidad = $request->intensidad;
    $deuda->tiempo = $request->tiempo;
    $deuda->telefono_1 = $request->telefono_1;
    $deuda->telefono_2 = $request->telefono_2;
    $deuda->email_marketing = $request->email_marketing ?? false;
    $deuda->cobrar = $request->cobrar ?? false;

    // Subir el archivo PDF
    if ($request->hasFile('pdf_documento')) {
        $pdfPath = $request->file('pdf_documento')->store('pdfs', 'public');
        $deuda->pdf_documento = $pdfPath;
    }

    // Guardar la deuda en la base de datos
    $deuda->save();

    return redirect()->route('dashboard')->with('success', 'Deuda creada correctamente');
}

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    // Obtener la deuda por su ID
    $deuda = Deuda::findOrFail($id);

    // Retornar la vista con los detalles de la deuda
    return view('deudas.show', compact('deuda'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deuda $deuda)
    {
        return view('deudas.edit', compact('deuda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deuda $deuda)
    {
        $request->validate([
            'nombre_colegio' => 'required|string|max:255',
            'cantidad_deuda' => 'required|numeric',
            'producto_entregado' => 'required|string|max:255',
            'fecha_entrega' => 'required|date',
            'email_contacto' => 'required|email|max:255',
            'tiempo' => 'nullable|integer|max:10',
            'signo' => 'nullable|string|max:5',
            'intensidad' => 'nullable|integer|between:0,9',
            'idioma' => 'nullable|string|max:20',
            'pdf_documento' => 'nullable|mimes:pdf|max:10240',
            'telefono_1' => 'nullable|string|max:15',
            'telefono_2' => 'nullable|string|max:15',
            'email_marketing' => 'boolean',
            'cobrar' => 'boolean',
        ]);

        $deuda->update($request->all());
        return redirect()->route('deudas.index')->with('success', 'Deuda actualizada exitosamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deuda $deuda)
    {
        // Verificar si existe el archivo y eliminarlo
        if ($deuda->pdf_documento && Storage::exists('public/' . $deuda->pdf_documento)) {
            Storage::delete('public/' . $deuda->pdf_documento); // Eliminar archivo PDF
        }

        // Eliminar el registro de la base de datos
        $deuda->delete();

        return redirect()->route('deudas.index')->with('success', 'Deuda eliminada exitosamente');
    }
}
