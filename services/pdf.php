<?php

class pdf extends FPDF
{
    function headerPDF(){
        //logo
        $this->Image('public/img/mockup.jpg');
        //Saut de ligne
        $this->Ln(20);
    }

    //Footer
    function footerPDF(){
        //1.5cm du bas de page
        $this->SetY(-15);
        //largeur + hauteur + message + bordure + saut de ligne(Ln)+ alignement
        $this->Cell(196,5,"https://www.onlineformapro.com/",0,0,'C');
    }

    function createPDF(){
        $pdf = new pdf();
        $pdf->AddPage('p','mm','A4');
        $pdf->SetFont('Helvetica','',12);
        $pdf->SetTextColor(0);
    }
}