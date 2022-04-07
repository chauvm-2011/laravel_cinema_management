<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\MovieScheduleService;
use App\Models\MovieSchedule;
use Illuminate\Http\Request;

class DetailMovieScheduleController extends Controller
{
    protected $movieScheduleService;

    public function __construct(MovieScheduleService $movieScheduleService)
    {
        $this->movieScheduleService = $movieScheduleService;
    }

    public function detailMovieScheduleForm(MovieSchedule $movieSchedule)
    {
        return view('admin.detail_movie_schedule', [
            'movie_schedule' => $movieSchedule,
            'movie_schedules' => $this->movieScheduleService->getAll(),
            'movies' => $this->movieScheduleService->getMovie(),
            'rooms' => $this->movieScheduleService->getRoom(),
        ]);
    }
}
