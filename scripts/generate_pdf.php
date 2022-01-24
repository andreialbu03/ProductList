<?php

    include_once 'db.php';
    include_once '../libs/fpdf184/fpdf.php';

    class PDF extends FPDF {
        function Header() {
            $this->SetFont('Arial','B',13);
            // Title
            $this->Cell(80,10,'Inventory List',1,0,'C');
            // Line break
            $this->Ln(20);
        }

        function Footer() {
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Page number
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
    }

    $display_heading = array('prod_id'=>'ID', 'quantity'=> 'Quantity', 'name'=> 'Name','description'=> 'Description',);
    $sql = "select * from inventoryList";
    $sql2 = "SHOW columns FROM inventoryList";
    $result = $conn->query($sql);
    $result2 = $conn->query($sql2);

    $pdf = new PDF();

    //header
    $pdf->AddPage();
    //footer page
    $pdf->AliasNbPages();
    $pdf->SetFont('Arial','B',12);

    foreach($result2 as $heading) {
        $pdf->Cell(40,12,$display_heading[$heading['Field']],1);
    }

    foreach($result as $row) {
        $pdf->Ln();
        foreach($row as $column) {
                $pdf->Cell(40,12,$column,1);
            }
    }

    $pdf->Output('D','inventory.pdf');

?>