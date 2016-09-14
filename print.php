<?php
/* Change to the correct path if you copy this example! */
require __DIR__ . '../../vendor/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
/**
 * Install the printer using USB printing support, and the "Generic / Text Only" driver,
 * then share it (you can use a firewall so that it can only be seen locally).
 *
 * Use a WindowsPrintConnector with the share name to print.
 *
 * Troubleshooting: Fire up a command prompt, and ensure that (if your printer is shared as
 * "Receipt Printer), the following commands work:
 *
 *  echo "Hello World" > testfile
 *  copy testfile "\\%COMPUTERNAME%\Receipt Printer"
 *  del testfile
 */
  function cetak($nmr,$sisaantrian){
	  
 
try {
    // Enter the share name for your USB printer here
    $connector = null;
    $connector = new WindowsPrintConnector("POS-58");
    /* Print a "Hello world" receipt" */
    $printer = new Printer($connector);
	/* cetak tengah*/
	$printer -> setJustification(Printer::JUSTIFY_CENTER);
	/* Cetak Nama bank BOLD*/
	$printer -> setTextSize(2, 2);
	$printer -> setEmphasis(true);
    $printer -> text("BANK VOKASI");
	$printer -> setEmphasis(false);
	$printer -> feed(2);
	
	$printer -> setTextSize(1, 1);
	$printer -> text("Nomor antrian anda:");
	$printer -> feed();
	
	/*cetak ukuran antrian nomor besar*/
	$printer -> setTextSize(8, 8);
	$printer -> text($nmr);
	$printer -> feed();
	
	/*cetak sisa antrian*/
	$printer -> setTextSize(1, 1);
	$printer -> text("Sisa antrian: ".$sisaantrian);
	$printer -> feed();
	
	/*cetak tanggal*/
	$curr_timestamp = date("Y-m-d H:i:s");
    $printer -> text($curr_timestamp);
	$printer -> feed(5);
	$printer -> cut();
    
	
    /* Close printer */
    $printer -> close();
} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}
 }