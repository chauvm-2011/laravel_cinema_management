<?php

namespace App\Http\Services;

use App\Models\Movie;
use App\Models\MovieSchedule;
use App\Models\MovieShowtime;
use App\Models\Room;
use App\Models\ScheduleShowtime;
use Illuminate\Support\Facades\DB;

class MovieScheduleService
{
    public function getMovie()
    {
        return Movie::query()->get();
    }

    public function getRoom()
    {
        return Room::query()->get();
    }

    public function getShowtime()
    {
        return MovieShowtime::query()->get();
    }

    public function getAll()
    {
        return MovieSchedule::query()->paginate(10);
    }

    public function create($request)
    {
        try {
            DB::transaction(function () use ($request){
                $data = $request->all();
                foreach ($data['room_id'] as $room){
                    $movieschedule = MovieSchedule::create([
                        'movie_id' => $data['movie_id'],
                        'room_id' => $room,
                        'date' => $data['date']
                    ]);
                    ScheduleShowtime::create([
                        'movie_schedule_id' => $movieschedule->id,
                        'movie_showtime_id' => $data['showtime'],
                    ]);
                }
            });
        } catch (\Exception $exception) {
            return response($exception);
        }
    }

    public function update($request, $movieSchedule)
    {
        try {
            DB::transaction(function () use ($request, $movieSchedule){
                $room = MovieSchedule::where('room_id', $movieSchedule->room_id)->first();
                if ($room) {
                        $showtime = ScheduleShowtime::where('movie_schedule_id', $movieSchedule->id)->first();
                        $showtime->movie_showtime_id = $request->input('showtime');
                        $showtime->save();
                        $movieSchedule->update($request->all());
                }
            });
        } catch (\Exception $exception) {
            return response($exception);
        }
    }

    public function destroy($request)
    {
        $scheduleshowtime = ScheduleShowtime::where('movie_schedule_id', $request->input('id'))->first();
        if ($scheduleshowtime) {
            ScheduleShowtime::where('movie_schedule_id', $request->input('id'))->delete();
            $movieschedule = MovieSchedule::where('id', $request->input('id'))->first();
            if ($movieschedule) {
                return MovieSchedule::where('id', $request->input('id'))->delete();
            }
        }
    }
}
