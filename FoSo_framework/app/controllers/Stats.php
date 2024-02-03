<?php

//use Dompdf\Dompdf;

class Stats extends Controller
{
    public function index(){
        
        $this->checkConnected();
        unset($_SESSION['searchProduct']);
        $stats = new GetStats();
        $data = json_decode($stats->index(),true);
        if(isset($_POST['submit'])){
            
            //require_once '../app/dompdf/autoload.inc.php';
            $pdfContent = new PdfBuilder();
            $pdfContent->buildPdf($data);
            // $dompdf = new Dompdf();
            // $dompdf->loadHtml($pdfContent->buildPdf($data));
            // $dompdf->setPaper('A4','landscape');
            
            // $dompdf->render();
            // $dompdf->stream();
            $this->view('stats','',$data);
        }else{
        
        $this->view('stats','',$data);
        }
    }
}


?>