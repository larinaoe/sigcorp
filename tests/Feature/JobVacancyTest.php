<?php

namespace Tests\Feature;

use App\Models\JobVacancy;
use Tests\TestCase;

class JobVacancyTest extends TestCase
{
    public function jobVacancies()
    {
        return [
            [
                [
                    'type' => 'Freelancer',
                    'status' => 1,
                ],
                [
                    'type' => 'CLT',
                    'status' => 0,
                ]
            ]
        ];
    }

    public function invalidJobVacancies()
    {
        return [
            [
                [
                    'type' => " ",
                    'status' => " ",
                ]
            ]
        ];
    }

    public function testUpdateJobVacancy()
    {
        $jobVacancy = JobVacancy::factory()->create();
        
        $this->put(
            "/api/job-vacancies/$jobVacancy->id",
            [
                'type' => 'Freelancer',
                'status' => 1,
            ]
        )->assertSuccessful();
    }

    public function testDeleteJobVacancy()
    {
        $jobVacancy = JobVacancy::factory()->create();
        $this->delete(
            "/api/job-vacancies/$jobVacancy->id"
        )->assertSuccessful();
    }

    public function testOngoingJobVacancy()
    {
        $jobVacancy = JobVacancy::factory()->create();

        $this->post('/api/job-vacancies/' . $jobVacancy->status . '/ongoingJobVacancy', [
            'status' => true,
        ]);

        $this->assertTrue($jobVacancy->status);
    }

    public function testPausedJobVacancyTest()
    {
        $jobVacancy = JobVacancy::factory()->create();

        $this->post('/api/job-vacancies/' . $jobVacancy->status . '/pausedJobVacancy', [
            'status' => false,
        ]);

        $this->assertFalse($jobVacancy->status);
    }
}
