<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\MovieScheduleService;
use App\Models\MovieSchedule;
use Illuminate\Http\Request;

class ListMovieScheduleController extends Controller
{
    protected $movieScheduleService;

    public function __construct(MovieScheduleService $movieScheduleService)
    {
        $this->movieScheduleService = $movieScheduleService;
    }

    public function listMovieSchedule()
    {
        return view('admin.list_movie_schedule',[
            'movie_schedules' => $this->movieScheduleService->getAll(),
            'movies' => $this->movieScheduleService->getMovie(),
            'rooms' => $this->movieScheduleService->getRoom(),
        ]);
    }

    public function destroy(Request $request)
    {
        $result = $this->movieScheduleService->destroy($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Delete movie schedule successfully!',
            ]);
        }

        return response()->json([
            'error' => true,
        ]);
    }
}
