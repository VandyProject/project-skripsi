<?php


/** Include PHPExcel */
require_once dirname(__FILE__) . '/PHPExcel/Classes/PHPExcel.php';

$file = new PHPExcel ();
    $file->getProperties ()->setCreator ( "Template" );
    $file->getProperties ()->setLastModifiedBy ( "Template" );
    $file->getProperties ()->setTitle ( "Data Set" );
    $file->getProperties ()->setSubject ( "Data Set" );
    $file->getProperties ()->setDescription ( "Data Set" );
    $file->getProperties ()->setKeywords ( "Data Set" );
    $file->getProperties ()->setCategory ( "Template Data Set" );
/*end - BLOCK PROPERTIES FILE EXCEL*/

/*start - BLOCK SETUP SHEET*/
    $file->createSheet ( NULL,0);
    $file->setActiveSheetIndex ( 0 );
    $sheet = $file->getActiveSheet ( 0 );
    //memberikan title pada sheet
$sheet->setTitle ( "Template Set Data" );
/*end - BLOCK SETUP SHEET*/
$style_col = array(
    'font' => array('bold' => true), // Set font nya jadi bold
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
    ),
    'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
    )
);

// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
$style_row = array(
    'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
    ),
    'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
    )
);
/*start - BLOCK HEADER*/
    /* menambahkan baris khusus untuk Judul Header pada Sheet
     * melakukan Merge Cell untuk A1 sampai E1*/
    $file   ->setActiveSheetIndex(0);
    //$file   ->getActiveSheet()->mergeCells('A1:G1');
    $file   ->getActiveSheet()->getStyle('A1:J1')->getFont()->setBold(TRUE);
    $file   ->getActiveSheet()->getStyle('A1:J1')->getFont()->setSize(12);
   //$file   ->getActiveSheet()->getStyle('A1:AH1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    
    /* bagian sini diubah menjadi baris kedua 
     * karena baris pertama telah dipakai untuk judul
     * */
    $file       ->setActiveSheetIndex(0)->setCellValue ( 'A1', "Jenis Kelamin" );
    $file        ->setActiveSheetIndex(0)->setCellValue ( 'B1', "Nikah" );
    $file        ->setActiveSheetIndex(0)->setCellValue ( 'C1', "Cuti" );
    $file        ->setActiveSheetIndex(0)->setCellValue ( 'D1', "Jumlah MK" );
    $file        ->setActiveSheetIndex(0)->setCellValue ( 'E1', "Jumlah SKS" );
    $file        ->setActiveSheetIndex(0)->setCellValue ( 'F1', "Tinggi Badan" );
    $file        ->setActiveSheetIndex(0)->setCellValue ( 'G1', "Berat Badan" );
    $file        ->setActiveSheetIndex(0)->setCellValue ( 'H1', "Lingkar Kepala" );
    $file        ->setActiveSheetIndex(0)->setCellValue ( 'I1', "Lingkar Lengan" );
    $file        ->setActiveSheetIndex(0)->setCellValue ( 'J1', "Kelas (*)" );
    

    $nomor=2;
    $sheet      ->setCellValue ( "A".$nomor, "L (Jika Laki-Laki)" )
                ->setCellValue ( "B".$nomor, "B (Jika Belum)" )
                ->setCellValue ( "C".$nomor, "T (Jika Tidak)" )
                ->setCellValue ( "D".$nomor, "61" )
                ->setCellValue ( "E".$nomor, "80" )
                ->setCellValue ( "F".$nomor, "3.1")
                ->setCellValue ( "G".$nomor, "3.35")
                ->setCellValue ( "H".$nomor, "2.35")
                ->setCellValue ( "I".$nomor, "2.35")
                ->setCellValue ( "J".$nomor, "Tidak");
                
    $nomor=3;
    $sheet      ->setCellValue ( "A".$nomor, "P (Jika Perempuan)" )
                ->setCellValue ( "B".$nomor, "S (Jika Sudah)" )
                ->setCellValue ( "C".$nomor, "Y (Jika Ya)" )
                ->setCellValue ( "D".$nomor, "61" )
                ->setCellValue ( "E".$nomor, "80" )
                ->setCellValue ( "F".$nomor, "3.1")
                ->setCellValue ( "G".$nomor, "3.35")
                ->setCellValue ( "H".$nomor, "2.35")
                ->setCellValue ( "I".$nomor, "2.35")
                ->setCellValue ( "J".$nomor, "Stunting");
          



/*start - BLOK AUTOSIZE*/
    $sheet ->getColumnDimension ( "A" )->setAutoSize ( true );
    $sheet ->getColumnDimension ( "B" )->setAutoSize ( true );
    $sheet ->getColumnDimension ( "C" )->setAutoSize ( true );
    $sheet ->getColumnDimension ( "D" )->setAutoSize ( true );
    $sheet ->getColumnDimension ( "E" )->setAutoSize ( true );
    $sheet ->getColumnDimension ( "F" )->setAutoSize ( true );
    $sheet ->getColumnDimension ( "G" )->setAutoSize ( true );
    $sheet ->getColumnDimension ( "H" )->setAutoSize ( true );
    $sheet ->getColumnDimension ( "I" )->setAutoSize ( true );
    $sheet ->getColumnDimension ( "J" )->setAutoSize ( true );
/*end - BLOG AUTOSIZE*/


/* start - BLOCK MEMBUAT LINK DOWNLOAD*/
    header ( 'Content-Type: application/vnd.ms-excel' );
    //namanya adalah keluarga.xls
    header ( 'Content-Disposition: attachment;filename="Template Data Set.xls"' ); 
    header ( 'Cache-Control: max-age=0' );
    $writer = PHPExcel_IOFactory::createWriter ( $file, 'Excel5' );
    $writer->save ( 'php://output' );
/* start - BLOCK MEMBUAT LINK DOWNLOAD*/

?>

