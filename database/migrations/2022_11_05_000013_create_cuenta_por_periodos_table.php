<?php

use App\Models\Cuenta;
use App\Models\PeriodoContable;
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
        Schema::create('cuenta_por_periodos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Cuenta::class)->references('id')->on('cuentas');
            $table->foreignIdFor(PeriodoContable::class)->references('id')->on('periodo_contables');
            $table->decimal('saldo', 12, 2)->nullable();
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
        Schema::dropIfExists('cuenta_por_periodos');
    }
};
