<?php

namespace Tests\Feature;

use App\Models\JobVacancy;
use Tests\TestCase;

class JobVacancyTest extends TestCase
{

    public function updateJobVacancyTest()
    {
        $jobVacancy = JobVacancy::factory()->create([
            'type' => 'CLT',
            'status' => true
        ]);

        $jobVacancy->update([
            'type' => 'Pessoa Jurídica',
            'status' => false,
        ]);
    }

    public function deleteJobVacancyTest()
    {
        $jobVacancy = JobVacancy::factory()->create([
            'type' => 'CLT',
            'status' => false
        ]);
        
        $jobVacancy->destroy($jobVacancy);
        
        $this->assertDatabaseMissing('job_vacancies', [
            'type' => 'CLT',
            'status' => false
        ]);
    }

    public function ongoingJobVacancyTest()
    {
        $jobVacancy = new JobVacancy([
            [
                'type' => "CLT",
                'status' => true,
            ]
        ]);

        $jobVacancy->ongoingJobVacancy();

        $this->assertTrue($jobVacancy->status);
    }

    public function pausedJobVacancyTest()
    {
        $jobVacancy = new JobVacancy([
            [
                'type' => "Freelancer",
                'status' => false,
            ]
        ]);
        
        $jobVacancy->pausedJobVacancy();

        $this->assertFalse($jobVacancy->status);
    }
}
