<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddMovieSchedulePostRequest;
use App\Http\Services\MovieScheduleService;
use App\Models\MovieSchedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AddMovieScheduleController extends Controller
{
    protected $movieScheduleService;

    public function __construct(MovieScheduleService $movieScheduleService)
    {
        $this->movieScheduleService = $movieScheduleService;
    }

    public function addMovieScheduleForm(Request $request)
    {
        return view('admin.add_movie_schedule', [
            'movies' => $this->movieScheduleService->getMovie(),
            'rooms' => $this->movieScheduleService->getRoom(),
            'movieshowtimes' => $this->movieScheduleService->getShowtime(),
            'param' => $request->query(),
        ]);
    }

    public function postAddMovieSchedule(AddMovieSchedulePostRequest $request)
    {
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $data = $request->all();
        $movieSchedule = MovieSchedule::where('room_id', $data['room_id'])->first();
        $rooms = MovieSchedule::where('room_id', $data['room_id'])->get();
        if ($data['date'] < $dt->toDateString()) {
            return  redirect()->back()->with('error', 'Invalid date!');
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
        $result = $this->movieScheduleService->create($request);
        return redirect()->route('list_movie_schedule')->with('message', 'Add movie schedule successfully!');
    }
}
