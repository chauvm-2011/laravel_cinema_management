<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddMovieSchedulePostRequest;
use App\Http\Services\MovieScheduleService;
use App\Models\MovieSchedule;
use Carbon\Carbon;

class AddMovieScheduleController extends Controller
{
    protected $movieScheduleService;

    public function __construct(MovieScheduleService $movieScheduleService)
    {
        $this->movieScheduleService = $movieScheduleService;
    }

    public function addMovieScheduleForm()
    {
        return view('admin.add_movie_schedule', [
            'movies' => $this->movieScheduleService->getMovie(),
            'rooms' => $this->movieScheduleService->getRoom(),
        ]);
    }

    public function postAddMovieSchedule(AddMovieSchedulePostRequest $request)
    {
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $data = $request->all();
        $movieSchedule = MovieSchedule::where('room_id', $data['room_id'])->first();
        $rooms = MovieSchedule::where('room_id', $data['room_id'])->get();
        $time_stamp = strtotime($data['start_time']);
        $time_new = $time_stamp + 2*60*60;
        if (date('H:i',$time_new) != date('H:i',strtotime($data['end_time']))) {
            return redirect()->route('add_movie_schedule')->with('error', 'The start time must be 2 hours greater than the end time');
        }

        if ($data['start_time'] > $data['end_time']) {
            return redirect()->route('add_movie_schedule')->with('error', 'End time must be greater than start time');
        }

        if ($data['date'] < $dt->toDateString()) {
            return redirect()->route('add_movie_schedule')->with('error', 'Invalid date!');
        }
        if ($movieSchedule) {
            foreach ($rooms as $room){
                if ($data['date'] == $room->date && $room->start_time <= $data['start_time'] && $data['start_time'] <= $room->end_time) {
                    return redirect()->route('add_movie_schedule')->with('error', 'Invalid showtime');
                }
                if ($data['date'] == $room->date && $data['start_time'] <= $room->end_time && $data['end_time'] <= $room->end_time) {
                    return redirect()->route('add_movie_schedule')->with('error', 'Invalid showtime');
                }
            }
            if ($data['date'] == $movieSchedule->date && $rooms->count() > 5) {
                return redirect()->route('add_movie_schedule')->with('error', 'You can only set 5 showtimes for a room in one day!');
            }
        }
        $result = $this->movieScheduleService->create($request);

        return redirect()->route('list_movie_schedule')->with('message', 'Add movie schedule successfully!');
    }
}
