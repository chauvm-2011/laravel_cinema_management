<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateMovieSchedulePostRequest;
use App\Http\Services\MovieScheduleService;
use App\Models\MovieSchedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UpdateMovieScheduleController extends Controller
{
    protected $movieScheduleService;

    public function __construct(MovieScheduleService $movieScheduleService)
    {
        $this->movieScheduleService = $movieScheduleService;
    }

    public function updateMovieScheduleForm(MovieSchedule $movieSchedule)
    {
        return view('admin.update_movie_schedule', [
            'movie_schedule' => $movieSchedule,
            'movies' => $this->movieScheduleService->getMovie(),
            'rooms' => $this->movieScheduleService->getRoom(),
            'movieshowtimes' => $this->movieScheduleService->getShowtime()
        ]);
    }

    public function updateMovieSchedule(MovieSchedule $movieSchedule, UpdateMovieSchedulePostRequest $request)
    {
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $data = $request->all();
        $movieSchedule = MovieSchedule::where('room_id', $data['room_id'])->first();
        $rooms = MovieSchedule::where('room_id', $data['room_id'])->where('date', $data['date'])->get();

        if ($data['date'] < $dt->toDateString()) {
            return redirect()->back()->with('error', 'Invalid date!');
        }
        if ($movieSchedule) {
            foreach ($rooms as $room){
                foreach ($room->movieshowtimes as $movieshowtime) {
                    if ($data['date'] == $room->date && $data['showtime'] == $movieshowtime->id) {
                        return  redirect()->back()->with('error', 'Time frame '.date('H:i',strtotime($movieshowtime->start_time)).' date '.$data['date'].' has a showtime!');
                    }
                }
            }
        }
        $result = $this->movieScheduleService->update($request, $movieSchedule);

        return redirect()->route('list_movie_schedule')->with('message', 'Update movie schedule successfully!');
    }
}
