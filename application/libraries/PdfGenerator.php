<?php
 
class PdfGenerator
{
  public function generate($html,$filename)
  {
    define('DOMPDF_ENABLE_AUTOLOAD', false);
    require_once 'dompdf/lib/html5lib/Parser.php';
	require_once 'dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
	require_once 'dompdf/lib/php-svg-lib/src/autoload.php';
	require_once 'dompdf/src/Autoloader.php';
	Dompdf\Autoloader::register();
 
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
	$dompdf->setPaper('A4', 'potrait');
    $dompdf->render();
    $dompdf->stream($filename.'.pdf',array("Attachment"=>0));
  }
}