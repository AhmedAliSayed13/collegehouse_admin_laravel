<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade as PDF;
class TestController extends Controller
{
    public function test()
    {
        $code='12132';
        return view('lease',compact('code'));
    }

    public function exportPdf() {
        
        $pdf = PDF::loadView('lease'); // <--- load your view into theDOM wrapper;
        $path = public_path('pdf_docs/'); // <--- folder to store the pdf documents into the server;
        $fileName =  time().'.'. 'pdf' ; // <--giving the random filename,
        $pdf->save($path . '/' . $fileName);
        $generated_pdf_link = url('pdf_docs/'.$fileName);
        return response()->json($generated_pdf_link);
      }

}
