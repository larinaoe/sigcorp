<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTableJobVacancies extends Migration
{

    public function up()
    {
        Schema::create('table_job_vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->boolean('status');
            $table->timestamps();
        });
        
        DB::table('table_job_vacancies')->insert([
            [
                'type' => 'CLT',
            ],
            [
                'type' => 'Freelancer',
            ],
            [
                'type' => 'Pessoa Jurídica',
            ],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('table_job_vacancies');
    }
}
