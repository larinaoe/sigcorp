<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidateRequest;
use App\Models\Candidate;
use Illuminate\Database\Eloquent\Collection;

class CandidateController extends Controller
{

    public function index(): Collection
    {
        return Candidate::all();
    }

    public function store(CandidateRequest $request)
    {
        $data = $request->all();

        return Candidate::create($data);
    }

    public function update(Candidate $candidate, CandidateRequest $request)
    {
        $data = $request->all();
        $candidate->name = $data['name'];
        $candidate->save();
    }

    public function destroy(Candidate $candidate)
    {
        $candidate->delete();
    }
    
  }