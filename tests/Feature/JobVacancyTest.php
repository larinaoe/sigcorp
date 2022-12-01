<?php

namespace Tests\Feature;

use App\Models\JobVacancy;
use Tests\TestCase;

class JobVacancyTest extends TestCase
{

    public function testUpdateJobVacancy()
    {
        $jobVacancy = JobVacancy::factory()->create([
            'id' => '11',
            'type' => 'CLT',
            'status' => 0,
        ]);

        $jobVacancy->update([
            'id' => '11',
            'type' => 'Pessoa Juridica',
            'status' => 1,
        ]);

        $this->assertDatabaseHas('job_vacancies', [
            'id' => '11',
            'type' => 'Pessoa Juridica',
            'status' => 1,
        ]);
    }

    public function testDeleteJobVacancy()
    {
        $jobVacancy = JobVacancy::factory()->create([
            'id' => '99',
            'type' => 'CLT',
            'status' => 1,
            'created_at' => null,
            'updated_at' => null,
        ]);
        
        $jobVacancy->destroy(99);
        
        $this->assertDatabaseMissing('job_vacancies', [
            'id' => '99',
            'type' => 'CLT',
            'status' => 1,
            'created_at' => null,
            'updated_at' => null,
        ]);
    }

    public function testOngoingJobVacancy()
    {
        $jobVacancy = JobVacancy::factory()->create([
            'type' => 'Freelancer',
            'status' => true
        ]);

        $this->assertTrue($jobVacancy->status);
    }

    public function testPausedJobVacancyTest()
    {
        $jobVacancy = JobVacancy::factory()->create([
            'type' => 'Pessoa Juridica',
            'status' => false
        ]);

        $this->assertFalse($jobVacancy->status);
    }
}
