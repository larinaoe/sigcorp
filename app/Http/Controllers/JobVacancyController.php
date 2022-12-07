<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobVacancyRequest;
use App\Models\JobVacancy;
use Illuminate\Database\Eloquent\Collection;

class JobVacancyController extends Controller
{

    public function index(JobVacancyRequest $request): Collection
    {
        $jobVacancy = JobVacancy::orderBy('created_at', 'desc');

        $searchString = $request->get('query');

        return ! empty($searchString)
            ? $jobVacancy->where(
                fn ($jobVacancy) => $jobVacancy->where(
                    'type',
                    'like',
                    '%' . $searchString . '%'
                )->orWhere('status', 'like', '%' . $searchString . '%')
            )->paginate(20)
            : $jobVacancy->paginate(20);
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
        $jobVacancy->update(['status' => true]);
    }

    public function pausedJobVacancy(JobVacancy $jobVacancy)
    {
        $jobVacancy->update(['status' => false]);
    }
  }