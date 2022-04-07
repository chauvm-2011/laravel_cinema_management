<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Movie;
use App\Models\MovieSchedule;
use App\Models\Room;
use App\Models\Ticket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function showPaymentForm(Request $request)
    {
        DB::beginTransaction();
        $data = $request->query();
        $bill = Bill::create([
            'total_money' => $data['total'],
            'status' => Bill::BILLPRIVATE,
            'user_id' => Auth::user()->id,
        ]);
        $a = explode(',', $data['seat']);
        foreach ($a as $seat){
            Ticket::create([
                'name' => 'Ve phim',
                'movie_schedule_id' => $data['movie_schedule_id'],
                'seat_name' => $seat,
                'price' => $data['price'],
                'bill_id' => $bill->id
            ]);
        }
        DB::commit();
        return view('user.payment', [
            'param' => $request->query(),
            'bill' => $bill,
        ]);
    }
    public function paymentVNPay(Request $request, Bill $bill)
    {
        $vnp_Url = config('app.vnp_url');
        $vnp_Returnurl = config('app.vnp_return_url');
        $vnp_TmnCode = config('app.vnp_tmn_code');
        $vnp_HashSecret = config('app.vnp_hash_secret'); //Chuỗi bí mật
        $vnp_TxnRef = $request->query('order_id');
        $vnp_OrderInfo = $_POST['order_desc'];
        $vnp_OrderType = $_POST['order_type'];
        $vnp_Amount = $request->query('total') * 100;
        $vnp_Locale = $_POST['language'];
        $vnp_BankCode = $_POST['bank_code'];
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00',
            'message' => 'success',
            'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }

    public function vnpReturn(Request $request)
    {
        $bill = Bill::where('id',$request->vnp_TxnRef)->first();
        $users = User::query()->get();
        $movie_schedules = MovieSchedule::query()->get();
        $movies = Movie::query()->get();
        $rooms = Room::query()->get();
        $tickets = $bill->tickets;
        if ($request->vnp_ResponseCode === '00'){
            $bill->status = Bill::BILLPUBLIC;
            $bill->save();
            foreach ($users as $user) {
                if ($user->id == $bill->user_id) {
                    Mail::send('send_email', compact('user','tickets', 'movie_schedules', 'bill', 'movies', 'rooms'), function($email) use ($user) {
                        $email->subject('test email');
                        $email->to($user->email, $user->name);
                    });
                }
            }
        }
        return view('user.vnpay_return');
    }
}
