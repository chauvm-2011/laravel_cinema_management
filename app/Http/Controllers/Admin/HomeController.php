<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function showHomeForm()
    {
        $total = 0;
        $datetime = Carbon::now('Asia/Ho_Chi_Minh');
        $userDay = DB::table('users')->whereDate('created_at',$datetime->toDateString())->where('role',1)->get();
        $userMonth = DB::table('users')->whereMonth('created_at',$datetime->month)->get();
        $bills = DB::table('bills')->select('total_money')->get();
        foreach ($bills as $bill) {
            $total += $bill->total_money;
        }
        $listDates = [];
        for ($i = 0; $i < 7; $i++) {
            $date = Carbon::today()->subDay($i);
            array_push($listDates, $date->toDateString());
        }
        $userWeekCount = [];
        foreach ($listDates as $listDate ) {
            $userWeeks = DB::table('users')->whereDate('created_at',$listDate)->get();
            foreach ($userWeeks as $userWeek) {
                $userWeekCount [] = $userWeek;
            }
        }
        return view('home', [
            'userDay' => $userDay,
            'total' => $total,
            'userWeek' => $userWeekCount,
            'userMonth' => $userMonth,
        ]);
    }

    public function monthlyRevenueStatistics() {
        $totalMonths = [];
        for ($i = 1; $i<=12; $i++) {
            $total = 0;
            $months = DB::table('bills')->whereMonth('created_at',$i)->get();
            foreach ($months as $month) {
                $total += $month->total_money;
            }
            array_push($totalMonths, $total);
        }
        return response()->json($totalMonths);
    }

    public function dayRevenueStatistics(Request $request) {
//        $totalDate = DB::table('bills')->whereBetween('created_at',[])->get();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
