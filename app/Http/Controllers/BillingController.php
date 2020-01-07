<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\UsersModel;
use Session;

class BillingController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        // $this->middleware('guest');

    }

    /**
    * Generated the main page of billing
    *
    */
    public function index()
    {
        $transaction_data = $this->getTransactions(Session::get('LAD_user_id'));
        $datefrom = date("Y-m-d H:i:s", strtotime("first day of this month"));
        $dateto =  date("Y-m-d H:i:s");
        $payment_history = json_decode($this->getAllPaymentHistory(Session::get('LAD_user_id'),$datefrom,$dateto));

        $userid = Session::get('LAD_user_id');
        $users = UsersModel::where('id',$userid)
                            ->first();

        return view('header')->withTitle('LAD Global | Dashboard - Billing').view('dashboard/dashboard-sidebar',['users' => $users]).view('dashboard/billing',['transactions' => $transaction_data, 'paymenthistory' => $payment_history]).view('footer');
        // return "asd";
    }

    /**
    * The transaction data is load here
    *
    * @param int $user_id The user id of this user.
    *
    */
    public function getTransactions($user_id) {
        return DB::select(" SELECT
                            transaction_carts.id as invoice, time_added, 
                            transaction_carts.status as status, total_amount,created_by, 
                            user.name,user.organization,user.email,
                            course.title,course.created_by ,course.price,
                            currencies.symbol
                            FROM transaction_carts 
                            INNER JOIN courses as course on transaction_carts.course_id = course.id 
                            INNER JOIN currencies on course.currency_id = currencies.id
                            INNER JOIN users as user on course.created_by=user.id
                            WHERE transaction_carts.user_id = ? AND transaction_carts.status = 0 ORDER BY invoice DESC",[$user_id]);
    }

    /**
    * Get the payment data history
    *
    * @param date $datefrom The starting of the date.
    * @param date $dateto The end of the date.
    * @param int  $user_id The user id of this user.
    */
    public function getAllPaymentHistory ($user_id, $datefrom, $dateto) {
        $datefrom = date("Y-m-d H:i:s", strtotime($datefrom));
        $dateto =  date("Y-m-d H:i:s", strtotime($dateto));
        // return json_encode (DB::select(" SELECT *, transactions.time as time_paid, transactions.amount as total_payout, transactions.status as payout_status
        //                     FROM
        //                         (SELECT transaction_carts.id as invoice,  time_added, transaction_carts.status as status,  total_amount as total_amount,  title, transaction_id , currencies.symbol
        //                         FROM transaction_carts
        //                         INNER JOIN courses on transaction_carts.course_id = courses.id 
        //                         INNER JOIN currencies on courses.currency_id = currencies.id
        //                         WHERE user_id = ? GROUP BY transaction_id) as carts_table
        //                     INNER JOIN transactions on carts_table.transaction_id = transactions.id
        //                     WHERE transactions.user_id = ? 
        //                     AND transactions.status = 1
        //                     AND transactions.time >= ? AND transactions.time <= ?",[$user_id, $user_id, $datefrom, $dateto]));
        return json_encode (DB::select("SELECT transaction_carts.id as invoice,  time_added, time_completed, transaction_carts.status as status,  total_amount as total_amount,  title, currencies.symbol
                                FROM transaction_carts
                                INNER JOIN courses on transaction_carts.course_id = courses.id 
                                INNER JOIN currencies on courses.currency_id = currencies.id
                                WHERE user_id = ? AND transaction_carts.status != 0 AND transaction_carts.time_completed >= ? AND transaction_carts.time_completed <= ?
                                ORDER BY transaction_carts.id DESC",[$user_id, $datefrom, $dateto]));
    }

    /**
    * Get all of the transactions data
    */
    public function getAllTransactions(){
        return DB::select(" SELECT
                            transaction_carts.id as invoice, time_added, 
                            transaction_carts.status as status, total_amount,created_by, payment_option,
                            user.name,user.organization,user.email,
                            course.title,course.created_by ,course.price,
                            currencies.symbol
                            FROM transaction_carts 
                            INNER JOIN courses as course on transaction_carts.course_id = course.id 
                            INNER JOIN currencies on course.currency_id = currencies.id
                            INNER JOIN users as user on transaction_carts.user_id=user.id
                            GROUP BY transaction_carts.id
                            ORDER BY transaction_carts.id DESC");
    }

    public function getTransactionStatus($user_id,$course_id) {
        return json_encode(DB::table('transaction_carts')->select('status')->where('participant', $user_id)->where('course_id', $course_id)->first());
    }

    /**
    *
    * Get Transaction Manager data
    */
    public function transactionmanager(){
        $header_loggedin = true;
        $userid = Session::get('LAD_user_id');
        $users = UsersModel::where('id',$userid)
                                ->first();
        $all_transactions = $this->getAllTransactions();
        if ($users->type == 3) {
            return view('header', ['header_loggedin' => $header_loggedin])->withTitle('LAD Global | Dashboard').view('dashboard/dashboard-sidebar',['users' => $users]).view('dashboard/transactionmanager', ['all_transactions' => $all_transactions]).view('footer');
        } else {
            return abort(404);
        }
    }

    /**
    * This use to edit the Transaction Status
    */
    public function editStatusTransaction (Request $request) {
        $uid = strip_tags($request->input('id'));
        $status = strip_tags($request->input('adm-status'));

        $updates = array();

        $output = array(
            'info' => 'error',
            'message' => 'Your request could not be processed. Please try again later.',
            'code' => 'x' 
            );

        // if ($course->coursecode == $code) {

        if ($status != 0) {
            $updates['time_completed'] = date("Y-m-d H:i:s");
        }
        $updates['status'] = $status;

        if ($updates != null) {
            $update = DB::table('transaction_carts')
                                ->where('id',$uid)
                                ->update($updates);
            if ($update != 0) {
                $output['info'] = 'success';
                $output['message'] = 'Transaction has been successfully edited.';
                $output['code'] = '0';
            }
        }
        // }
        return json_encode($output);
    }
}