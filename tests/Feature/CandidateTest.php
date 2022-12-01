<?php

namespace Tests\Feature;

use App\Models\Candidate;
use Tests\TestCase;

class CandidateTest extends TestCase
{
    public function testStoreCandidate()
      {
        Candidate::factory()->create([
          'id' => '1',
          'name' => 'Zoro'
        ]);

        $this->assertDatabaseHas('candidates', [
          'id' => '1',
          'name' => 'Zoro'
        ]);
    }

    public function testUpdateCandidate()
    {
        $candidate = Candidate::factory()->create([
          'id' => '2',
          'name' => 'Crona'
        ]);

        $candidate->update([
          'id' => '2',
          'name' => 'Chrona'
        ]);

        $this->assertDatabaseHas('candidates', [
          'id' => '2',
          'name' => 'Chrona'
        ]);
    }

    public function testDeleteCandidate()
    {
        $candidate = Candidate::factory()->create([
            'id' => '3',
            'name' => 'Nami'
        ]);
        
        $candidate->destroy(3);
        
        $this->assertDatabaseMissing('candidates', [
            'id' => '3',
            'name' => 'Nami'
        ]);
    }
}
