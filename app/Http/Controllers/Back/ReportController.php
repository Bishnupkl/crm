<?php

namespace App\Http\Controllers\Back;

use App\Http\Services\InquiryService;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use Excel;

class ReportController extends Controller
{
    protected $inquiryService;

    public function __construct(InquiryService $inquiryService)
    {
        $this->inquiryService = $inquiryService;
    }

    public function inquiryReport()
    {
        $this->data('title',$this->title('Inquiry Report'));
        $inquiries = $this->inquiryService->index();
        return view(
            'back.pages.reports.inquiries.inquiry-report',
            $this->data, compact('inquiries')
        );
    }

    public function inquiryExportPdf(){
        $this->data('title',$this->title('Inquiry Export'));
        $inquiries = $this->inquiryService->index();
        $pdf = PDF::loadView('back.pages.reports.inquiries.export-inquiry',$this->data,compact('inquiries'));
        return $pdf->download('export-inquiry.pdf');

    }

    public function inquiryExportXlsx(){


        $results= Inquiry::get(['token','name','email','gender','dob','bloodgroup','landline','mobile',
        'temporary_address','permanent_address','nationality','marital_status','marriage_date','how_did_you_know_about_us']);
        Excel::create('export-inqquiry', function ($excel) use ($results) {
            $excel->sheet('Sheet 1', function ($sheet) use ($results) {
                $sheet->fromArray($results,null,'A1',false, false);
                $headings = array('Token','Name','Email','Gender','DOB','Blood Group','Landline','Mobile',
                    'Temporaary Address','Permanent Address','Nationality','Marital Status','Marriage Date','Contact with');
                $sheet->prependRow(1, $headings);
            });
        })->export('xls');
    }
}
