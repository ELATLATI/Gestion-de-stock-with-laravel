<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Devi;
use App\Boncommande;
use App\BonLivraison;
use App\Linedevi;
use App\Facture;
use App\Compagnie;
use NumberFormatter;

class PDFController extends Controller
{
	public function devi(Request $Request){
	$data = Devi::find($Request->id);
	$Compagnie = Compagnie::find('1');
	$f = new NumberFormatter("fr", NumberFormatter::SPELLOUT);
    $pdf = PDF::loadView('pdf.DevisPDF', ['data'=>$data, "Compagnie"=>$Compagnie, "f"=>$f]);
    return $pdf->download('DevisPDF.pdf');
	}

	public function BonCommande(Request $Request){
	$data = Boncommande::find($Request->id);
	$Compagnie = Compagnie::find('1');
	$f = new NumberFormatter("fr", NumberFormatter::SPELLOUT);
    $pdf = PDF::loadView('pdf.BonCommandePDF', ['data'=>$data, "Compagnie"=>$Compagnie, "f"=>$f]);
    return $pdf->download('BonCommandePDF.pdf');
	}


	public function Facture(Request $Request){
	$data = Facture::find($Request->id);
	$Compagnie = Compagnie::find('1');
	$f = new NumberFormatter("fr", NumberFormatter::SPELLOUT);
    $pdf = PDF::loadView('pdf.Facture', ['data'=>$data, "Compagnie"=>$Compagnie, "f"=>$f]);
    return $pdf->download('Facture.pdf');
	}

	public function BonLivraison(Request $Request){
	$data = Bonlivraison::find($Request->id);
	$Compagnie = Compagnie::find('1');
	$f = new NumberFormatter("fr", NumberFormatter::SPELLOUT);
    $pdf = PDF::loadView('pdf.BonLivraisonPDF', ['data'=>$data, "Compagnie"=>$Compagnie, "f"=>$f]);
    return $pdf->download('BonLivraisonPDF.pdf');
	}


	
}
