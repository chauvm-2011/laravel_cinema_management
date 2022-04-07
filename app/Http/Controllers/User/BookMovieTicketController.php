<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookMovieTicketPostRequest;
use App\Http\Services\BookMovieTicketService;
use App\Models\Movie;
use App\Models\MovieSchedule;
use App\Models\ScheduleShowtime;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookMovieTicketController extends Controller
{
    public function bookMovieTicket(Movie $movie)
    {
        return view('user.book_movie_ticket', [
            'movie' => $movie,
        ]);
    }

    public function getTime(Request $request, Movie $movie)
    {
        $movieschedules = MovieSchedule::with('movieshowtimes')
            ->where('date',$request->query()['date'])
            ->where('movie_id',$movie->id)->get();
        return response()->json($movieschedules);
    }

    public function getSeat(Request $request, MovieSchedule $movie_schedule_id)
    {
        $movie_schedule = MovieSchedule::query()->get();
        return response()->json([
            'tickets' => $movie_schedule_id->tickets,
            'movie_schedule' => $movie_schedule,
        ]);
    }
}
