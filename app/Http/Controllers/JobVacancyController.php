<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobVacancyRequest;
use App\Models\JobVacancy;
use Illuminate\Database\Eloquent\Collection;

class JobVacancyController extends Controller
{

    public function index(JobVacancyRequest $request): Collection
    {
        $filteredVacancies = JobVacancy::where('type', 'LIKE', '%' . $request . '%')
            ->orWhere('status', 'LIKE', '%' . $request . '%')
            ->paginate(20);

        return $filteredVacancies;
    }

    public function store(JobVacancyRequest $request)
    {
        $data = $request->all();

        return JobVacancy::create($data);
    }

    public function update(JobVacancy $jobVacancy, JobVacancyRequest $request)
    {
        $data = $request->all();
        $jobVacancy->type = $data['type'];
        $jobVacancy->status = $data['status'];
        $jobVacancy->save();
    }

    public function destroy(JobVacancy $jobVacancy)
    {
        $jobVacancy->delete();
    }

    public function ongoingJobVacancy(JobVacancy $jobVacancy)
    {
        if ($jobVacancy) {
            $jobVacancy->status = true;
            $jobVacancy->save();
        }
    }

    public function pausedJobVacancy(JobVacancy $jobVacancy)
    {
      if ($jobVacancy) {
        $jobVacancy->status = false;
        $jobVacancy->save();
      }
    }

    public function searchVacancies(JobVacancyRequest $request)
    {
        $filter = JobVacancy::where('type', 'LIKE', '%' . $request . '%')
            ->orWhere('status', 'LIKE', '%' . $request . '%')
            ->paginate(20);

        return $filter;
    }
  
  }