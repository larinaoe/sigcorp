<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTableJobVacancies extends Migration
{

    public function up()
    {
        Schema::create('job_vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
        
        DB::table('job_vacancies')->insert([
            [
                'type' => 'CLT',
            ],
            [
                'type' => 'Freelancer',
            ],
            [
                'type' => 'Pessoa Juridica',
            ],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('job_vacancies');
    }
}
