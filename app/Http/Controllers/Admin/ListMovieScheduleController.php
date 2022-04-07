<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ListMovieSchedulePostRequest;
use App\Http\Services\MovieScheduleService;
use App\Models\Movie;
use App\Models\MovieSchedule;
use App\Models\MovieShowtime;
use App\Models\Room;
use App\Models\ScheduleShowtime;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Psy\Command\ShowCommand;

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
            'movieshowtimes' => $this->movieScheduleService->getShowtime(),
        ]);
    }

    public function postListMovieSchedule(ListMovieSchedulePostRequest $request)
    {
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $data = $request->all();
        $showtimes = MovieShowtime::query()->get();
        $movieschedules = MovieSchedule::join('movie_schedule_movie_showtime','movie_schedule_movie_showtime.movie_schedule_id', '=', 'movie_schedules.id')
            ->join('movies', 'movies.id', '=', 'movie_schedules.movie_id')
            ->where('room_id',$data['room'])->where('date',$data['date'])->get();
        $count_data = $movieschedules->count();
        $date = $data['date'];
        $room = $data['room'];
        if($count_data > 0){
            if ($dt->toDateString() <= $date){
                $html = view('admin.search_list_movie_schedule', compact('movieschedules', 'count_data', 'showtimes','date', 'room'))->render();
            } else {
                $html = view('admin.search_list_movie_schedule_date', compact('movieschedules', 'count_data', 'showtimes'))->render();
            }
        } else {
            if ($dt->toDateString() > $date) {
                $html =
                    '<tr>
                <td align="center" colspan="12">No Data Found</td>
            </tr>';
            } else {
                $html = view('admin.search_list_movie_schedule_data', compact('movieschedules', 'count_data', 'showtimes','date', 'room'))->render();
            }
        }
        return response()->json([
            'movieschedules' => $movieschedules,
            'html' => $html,
            'count_data' => $count_data,
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
