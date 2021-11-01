<?php

namespace App\Http\Services;

use App\Models\Movie;
use App\Models\MovieSchedule;
use App\Models\Room;
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

    public function getAll()
    {
        return MovieSchedule::query()->get();
    }

    public function create($request)
    {
        try {
            DB::transaction(function () use ($request){
                $data = $request->all();
                foreach ($data['room_id'] as $room){
                    MovieSchedule::create([
                        'movie_id' => $data['movie_id'],
                        'room_id' => $room,
                        'start_time' => $data['start_time'],
                        'end_time' => $data['end_time'],
                        'date' => $data['date'],
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
                    $movieSchedule->update($request->all());
                }
            });
        } catch (\Exception $exception) {
            return response($exception);
        }
    }

    public function destroy($request)
    {
        $movieSchedule = MovieSchedule::where('id', $request->input('id'))->first();
        if ($movieSchedule) {
            return MovieSchedule::where('id', $request->input('id'))->delete();
        }
    }
}
