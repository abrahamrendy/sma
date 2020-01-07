<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PdfController extends Controller
{
    /**
    *
    * Generating and download the billing invoice file
    *
    * @param Request $request The request from ajax
    */
    public function getpdf(Request $request){
        /** invoice.pdf format is based on invoice.blade */
    	$invoices = $request->input('invoicebutton');
    	$invoice = explode(",", $invoices);
    	$billings_data=[];
    	foreach ($invoice as $data ) {
    		$billing =$this->getInvoice($data);
            
            array_push($billings_data, $billing);
        }   

            $pdf = PDF::loadView('invoice',['data' => $billings_data]);
   		   return $pdf->download('transaction_'.$invoices.'.pdf');
            // return view('invoice',['data' => $billings_data]);  
    }

    public function getpdfParam($invoice){
        /** invoice.pdf format is based on invoice.blade */
        $billings_data=[];
            $billing =$this->getInvoice($invoice);
            
            array_push($billings_data, $billing);

            $pdf = PDF::loadView('invoice',['data' => $billings_data]);
           return $pdf->download('transaction_'.$invoice.'.pdf');
            // return view('invoice',['data' => $billings_data]);  
    }
    /**
    *
    * This function is used to get the transaction data from database by invoice number
    *
    * @param int $invoicenumber The invoice number of this transaction
    */
    public function getInvoice($invoicenumber) {
        return DB::select(" SELECT
                            transaction_carts.id as invoice, time_added, payment_option,
                            transaction_carts.status as status, total_amount, created_by, participant AS participant_id , participant.name AS participant_name , 
                            employer.name as employer_name, employer.email as employer_email, employer.organization as employer_organization,
                            occupation.name as designation ,currencies.symbol AS currency,
                            user.name,user.organization,user.email,
                            course.title,course.created_by 
                            FROM transaction_carts 
                            INNER JOIN courses as course on transaction_carts.course_id = course.id 
                            INNER JOIN users as user on course.created_by=user.id
                            LEFT JOIN users as participant on transaction_carts.participant = participant.id
                            LEFT JOIN user_occupations as occupation on participant.occupation = occupation.id 
                            LEFT JOIN currencies on  course.currency_id = currencies.id
                            LEFT JOIN users as employer on participant.employee_of = employer.id
                            WHERE transaction_carts.id = ?",[$invoicenumber]);
    }
}
