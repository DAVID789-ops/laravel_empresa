<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('deudas', function (Blueprint $table) {


                    $table->id(); // id INT AUTO_INCREMENT PRIMARY KEY
                    $table->string('nombre_colegio'); // nombre_colegio VARCHAR(255) NOT NULL
                    $table->decimal('cantidad_deuda', 10, 2); // cantidad_deuda DECIMAL(10, 2) NOT NULL
                    $table->string('producto_entregado'); // producto_entregado VARCHAR(255) NOT NULL
                    $table->date('fecha_entrega'); // fecha_entrega DATE NOT NULL
                    $table->string('email_contacto'); // email_contacto VARCHAR(255) NOT NULL
                    $table->timestamps(); // created_at y updated_at
                    $table->integer('tiempo')->nullable(); // Columna para almacenar números, sin auto_increment
                    $table->string('signo', 5)->nullable(); // Columna para texto de hasta 5 caracteres
                    $table->unsignedTinyInteger('intensidad')->nullable(); // Columna para números del 0 al 9
                    $table->string('idioma', 20)->nullable();

                    // Columnas para almacenar información del archivo PDF
                    $table->string('pdf_documento')->nullable();

                    // Nuevas columnas
                    $table->boolean('email_marketing')->default(false); // Columna booleana para email_marketing
                    $table->boolean('cobrar')->default(false); // Columna booleana para cobrar

                    // Columnas de teléfono
                    $table->boolean('pdf_tipo')->default(false); // Agregar la columna pdf_tipo
                    $table->string('telefono_1', 15)->nullable(); // teléfono 1
                    $table->string('telefono_2', 15)->nullable(); // teléfono 2


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deudas');
    }
};
