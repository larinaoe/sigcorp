<?php

namespace Tests\Feature;

use App\Models\Candidate;
use Tests\TestCase;

class CandidateTest extends TestCase
{

    public function testIndexCandidates()
    {
        $this->get('/api/candidates')
            ->assertSuccessful();
    }

    public function testUpdateCandidate()
    {
      $candidate = Candidate::factory()->create();
        
      $this->put(
          "/api/candidates/$candidate->id",
          [
            'name' => 'Zoro',
          ]
      )->assertSuccessful();
    }

    public function testDeleteCandidate()
    {
      $candidate = Candidate::factory()->create();
      $this->delete(
          "/api/candidates/$candidate->id"
      )->assertSuccessful();
    }
}
