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
        ]);
    }

    public function updateMovieSchedule(MovieSchedule $movieSchedule, UpdateMovieSchedulePostRequest $request)
    {
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $data = $request->all();
        $movie = MovieSchedule::where('room_id', $data['room_id'])->first();
        $room = MovieSchedule::where('room_id', $data['room_id'])->get();
        $time_stamp = strtotime($data['start_time']);
        $time_new = $time_stamp + 2*60*60;
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $data = $request->all();
        $movieSchedule = MovieSchedule::where('room_id', $data['room_id'])->first();
        $rooms = MovieSchedule::where('room_id', $data['room_id'])->get();
        $time_stamp = strtotime($data['start_time']);
        $time_new = $time_stamp + 2*60*60;
        if (date('H:i',$time_new) != date('H:i',strtotime($data['end_time']))) {
            return redirect()->route('update_movie_schedule', [$movieSchedule->id])->with('error', 'The start time must be 2 hours greater than the end time');
        }

        if ($data['start_time'] > $data['end_time']) {
            return redirect()->route('update_movie_schedule', [$movieSchedule->id])->with('error', 'End time must be greater than start time');
        }

        if ($data['date'] < $dt->toDateString()) {
            return redirect()->route('update_movie_schedule', [$movieSchedule->id])->with('error', 'Invalid date!');
        }
        if ($movieSchedule) {
            foreach ($rooms as $room){
                if ($data['date'] == $room->date && $room->start_time <= $data['start_time'] && $data['start_time'] <= $room->end_time) {
                    return redirect()->route('update_movie_schedule', [$movieSchedule->id])->with('error', 'Invalid showtime');
                }
                if ($data['date'] == $room->date && $data['start_time'] <= $room->end_time && $data['end_time'] <= $room->end_time) {
                    return redirect()->route('update_movie_schedule', [$movieSchedule->id])->with('error', 'Invalid showtime');
                }
            }
            if ($data['date'] == $movieSchedule->date && $rooms->count() > 5) {
                return redirect()->route('update_movie_schedule', [$movieSchedule->id])->with('error', 'You can only set 5 showtimes for a room in one day!');
            }
        }
        $result = $this->movieScheduleService->update($request, $movieSchedule);

        return redirect()->route('list_movie_schedule')->with('message', 'Update movie schedule successfully!');
    }
}
