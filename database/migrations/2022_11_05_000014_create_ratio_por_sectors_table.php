<?php

use App\Models\Ratio;
use App\Models\PeriodoContable;
use App\Models\Sector;
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
        Schema::create('ratio_por_sectors', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Ratio::class)->references('id')->on('ratios');
            $table->foreignIdFor(PeriodoContable::class)->references('id')->on('periodo_contables');
            $table->foreignIdFor(Sector::class)->references('id')->on('sectors');
            $table->decimal('valor', 12, 2)->nullable();
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
        Schema::dropIfExists('ratio_por_sectors');
    }
};
