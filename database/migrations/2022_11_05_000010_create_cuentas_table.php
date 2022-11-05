<?php

use App\Models\CuentaEquivalente;
use App\Models\Empresa;
use App\Models\TipoCuenta;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Empresa::class)->references('id')->on('empresas');
            $table->foreignIdFor(TipoCuenta::class)->references('id')->on('tipo_cuentas');
            $table->foreignIdFor(CuentaEquivalente::class)->references('id')->on('cuenta_equivalentes');
            $table->string('nombreCuenta',100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuentas');
    }
};
