<?php
require('pdf-cmyk.php');

$pdf = new cmykPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 6);
//$pdf->SetLineWidth(1);


$pdf->SetCreator("CMYK Farbkarte");
$pdf->SetAuthor("Simon Kainz, simon@familiekainz.at");
$pdf->SetDisplayMode("fullpage","single");
$anz_x=9;
$anz_y=9;

$max_x=200;
$min_x=10;

$max_y=280;
$min_y=20;


$size_y=10;

$step_x=($max_x-$min_x)/($anz_x+1);
$step_y=($max_y-$min_y)/($anz_y+1);

$size_x=$step_x*0.8;
$size_y=$size_x;

$label_y=$min_y/5*4;
//$size_x=10;
//die($size_x);
//return 0;
//$step_y=10;


$posx=$min_x;

$c_s=90;
$c_e=100;

$c=$c_s;
$m_s=90;
$m_e=100;

$c=$_GET['c'];
$m=$_GET['m'];
$y=$_GET['y'];
$k=$_GET['k'];



$c_s=intval($_GET['c'])-5;
$c_e=intval($_GET['c'])+5;
if ($c_e>100) {$c_e=100;};
if ($c_s<0) {$c_s=0;};

$m_s=intval($_GET['m'])-5;
$m_e=intval($_GET['m'])+5;
if ($m_e>100) {$m_e=100;};
if ($m_s<0) {$m_s=0;};

$y_s=intval($_GET['y'])-5;
$y_e=intval($_GET['y'])+5;
if ($y_e>100) {$y_e=100;};
if ($y_s<0) {$y_s=0;};

$k_s=intval($_GET['k'])-5;
$k_e=intval($_GET['k'])+5;
if ($k_e>100) {$k_e=100;};
if ($k_s<0) {$k_s=0;};




//phpinfo();
//return;
//var_dump($_GET);

//return;
$posx=$min_x;
$posy=$min_y;
$size_x=15;
$size_y=10;
$step_x=$size_x+0.2;
$step_y=$size_y+0.2+3;

$ss=2;

if ($_GET['s']) { $ss=intval($_GET['s']);};
        if ($ss<1) {$ss=1;};
$pdf->SetFont('Arial', '', 12);
$pdf->Text($min_x+$size_x+3, $label_y, "Bereich C:".$c_s."-".$c_e."/M:".$m_s."-".$m_e."/Y:".$y_s."-".$y_e."/K:".$k_s."-".$k_e);

$pdf->SetTitle("Farbkarte "."Bereich C:".$c_s."-".$c_e."/M:".$m_s."-".$m_e."/Y:".$y_s."-".$y_e."/K:".$k_s."-".$k_e);

$pdf->Rect($min_x, $label_y-$size_y, $size_x, $size_y,'F');

$ncl=$c-5;
if ($ncl<0) {$ncl=0;};
$ncu=$c+5;
if ($ncu>100) {$ncu=100;};


$pdf->SetFillColor(20,0,0,0);
$pdf->Rect(120, $label_y-$size_y, 5,5,'F');
$link = $pdf->AddLink();
$pdf->Link(120, $label_y-$size_y,5,5,"http://".$_SERVER["SERVER_NAME"]."".$_SERVER["SCRIPT_NAME"]."?c=".$ncl."&m=".$m."&y=".$y."&k=".$k."&s=".$ss ); 

$pdf->SetFillColor(100,0,0,0);
$pdf->Rect(120, $label_y-$size_y+5.2, 5,5,'F');
$pdf->Link(120, $label_y-$size_y+5.2,5,5,"http://".$_SERVER["SERVER_NAME"]."".$_SERVER["SCRIPT_NAME"]."?c=".$ncu."&m=".$m."&y=".$y."&k=".$k."&s=".$ss ); 


$nml=$m-5;
if ($nml<0) {$nml=0;};
$nmu=$m+5;
if ($nmu>100) {$nmu=100;};


$pdf->SetFillColor(0,20,0,0);
$pdf->Rect(120+5.5, $label_y-$size_y, 5,5,'F');
$link = $pdf->AddLink();
$pdf->Link(120+5.5, $label_y-$size_y,5,5,"http://".$_SERVER["SERVER_NAME"]."".$_SERVER["SCRIPT_NAME"]."?c=".$c."&m=".$nml."&y=".$y."&k=".$k."&s=".$ss ); 
$pdf->SetFillColor(0,100,0,0);
$pdf->Rect(120+5.5, $label_y-$size_y+5.2, 5,5,'F');
$pdf->Link(120+5.5, $label_y-$size_y+5.2,5,5,"http://".$_SERVER["SERVER_NAME"]."".$_SERVER["SCRIPT_NAME"]."?c=".$c."&m=".$nmu."&y=".$y."&k=".$k."&s=".$ss );



$nyl=$y-5;
if ($nyl<0) {$nyl=0;};
$nyu=$y+5;
if ($nyu>100) {$nyu=100;};

$pdf->SetFillColor(0,0,20,0);
$pdf->Rect(120+5.5+5.5, $label_y-$size_y, 5,5,'F');
$pdf->Link(120+5.5+5.5, $label_y-$size_y,5,5,"http://".$_SERVER["SERVER_NAME"]."".$_SERVER["SCRIPT_NAME"]."?c=".$c."&m=".$m."&y=".$nyl."&k=".$k."&s=".$ss ); 
$pdf->SetFillColor(0,0,100,0);
$pdf->Rect(120+5.5+5.5, $label_y-$size_y+5.2, 5,5,'F');
$pdf->Link(120+5.5+5.5, $label_y-$size_y+5.2,5,5,"http://".$_SERVER["SERVER_NAME"]."".$_SERVER["SCRIPT_NAME"]."?c=".$c."&m=".$m."&y=".$nyu."&k=".$k."&s=".$ss );

$nkl=$k-5;
if ($nkl<0) {$nkl=0;};
$nku=$k+5;
if ($nku>100) {$nku=100;};


$pdf->SetFillColor(0,0,0,20);
$pdf->Rect(120+5.5+5.5+5.5, $label_y-$size_y, 5,5,'F');
$pdf->Link(120+5.5+5.5+5.5, $label_y-$size_y,5,5,"http://".$_SERVER["SERVER_NAME"]."".$_SERVER["SCRIPT_NAME"]."?c=".$c."&m=".$m."&y=".$y."&k=".$nkl."&s=".$ss ); 
$pdf->SetFillColor(0,0,0,80);
$pdf->Rect(120+5.5+5.5+5.5, $label_y-$size_y+5.2, 5,5,'F');
$pdf->Link(120+5.5+5.5+5.5, $label_y-$size_y+5.2,5,5,"http://".$_SERVER["SERVER_NAME"]."".$_SERVER["SCRIPT_NAME"]."?c=".$c."&m=".$m."&y=".$y."&k=".$nku."&s=".$ss ); 



//$pdf-($min_x+$size_x+100, $label_y, "+C","http://foobar");

$pdf->SetFont('Arial', '', 6);
$pdf->SetFillColor($c, $m, $y, $k);
$pdf->Rect($min_x, $label_y-$size_y, $size_x, $size_y,'F');
$pdf->Text($min_x, $label_y+2, $c."|".$m."|".$y."|".$k);

$cnt=0;
for ($c=$c_s;$c<=$c_e;$c=$c+$ss)
    {
        for ($m=$m_s;$m<=$m_e;$m=$m+$ss)
            {
                for ($y=$y_s;$y<=$y_e;$y=$y+$ss)
                    {
                        for ($k=$k_s;$k<=$k_e;$k=$k+$ss)
                            {
                                $pdf->SetFillColor($c, $m, $y, $k);
                                $pdf->SetTextColor(100, 100, 100, 100);
                                $pdf->Rect($posx, $posy, $size_x, $size_y,'F');
                                $link = $pdf->AddLink(); 
                                $pdf->Link($posx, $posy, $size_x, $size_y,"http://".$_SERVER["SERVER_NAME"]."".$_SERVER["SCRIPT_NAME"]."?c=".$c."&m=".$m."&y=".$y."&k=".$k."&s=".$ss ); 
                                $pdf->Text($posx, $posy+$size_y+2, $c."|".$m."|".$y."|".$k);
                                $cnt=$cnt+1;
                                   $posx=$posx+$step_x;
                                if ($posx>=$max_x)
                                    {
                                        $posx=$min_x;
                                        $posy=$posy+$step_y;
                                  
                                    }
                                if ($posy>=$max_y)
                                    {
                                        $pdf->AddPage();
                                        $posx=$min_x;
                                        $posy=$min_y;
                                    }
                                                        }
                    }
            }
    }


$pdf->Output();
//echo "      ".$cnt."   \n";
return;

for ($y=25;$y<36;$y++)
    {
        for ($k=15;$k<26;$k++){
//$y=25;
//$k=15;
$posy=$min_y;
$posx=$min_x;


$posy=$min_y;
for ($iy=0;$iy<=$anz_y;$iy++)
{
    $posx=$min_x;
    $c=0;
    for ($i=0;$i<=$anz_x;$i++)
        {
            $c=intval($c_s+ ($i)/$anz_x*($c_e-$c_s));
            //$m=intval(($iy)/$anz_y*100);
            $m=intval($m_s+ ($iy)/$anz_y*($m_e-$m_s));
            $pdf->SetFillColor($c, $m, $y, $k);
            $pdf->SetTextColor(100, 100, 100, 100);
            $pdf->Rect($posx, $posy, $size_x, $size_y,'F');
            $pdf->Text($posx, $posy+$size_y+2, $c."|".$m."|".$y."|".$k);
            $posx=$posx+$step_x;
            
        }
    $posy=$posy+$step_y;
}
$pdf->AddPage();
    }
    }
$pdf->Output();

return;
$pdf->AddPage();


$pdf->SetFont('Arial', '', 12);
  $pdf->Text($min_x, $label_y, "Cyan - Yellow");
$pdf->SetFont('Arial', '', 6);

$c=0;
$m=0;
$y=0;
$k=0;
$posy=$min_y;

for ($iy=0;$iy<=$anz_y;$iy++)
{
    $posx=$min_x;
    $c=0;
    for ($i=0;$i<=$anz_x;$i++)
        {
            $c=intval(($i)/$anz_x*100);
            $y=intval(($iy)/$anz_y*100);
            $pdf->SetFillColor($c, $m, $y, $k);
            $pdf->SetTextColor(100, 100, 100, 100);
            $pdf->Rect($posx, $posy, $size_x, $size_y,'F');
            $pdf->Text($posx, $posy+$size_y+2, $c."|".$m."|".$y."|".$k);
            $posx=$posx+$step_x;
            
        }
    $posy=$posy+$step_y;
}

$pdf->AddPage();

$pdf->SetFont('Arial', '', 12);
  $pdf->Text($min_x, $label_y, "Cyan - Black");
$pdf->SetFont('Arial', '', 6);


$c=0;
$m=0;
$y=0;
$k=0;
$posy=$min_y;

for ($iy=0;$iy<=$anz_y;$iy++)
{
    $posx=$min_x;
    $c=0;
    for ($i=0;$i<=$anz_x;$i++)
        {
            $c=intval(($i)/$anz_x*100);
            $k=intval(($iy)/$anz_y*100);
            $pdf->SetFillColor($c, $m, $y, $k);
            $pdf->SetTextColor(100, 100, 100, 100);
            $pdf->Rect($posx, $posy, $size_x, $size_y,'F');
            $pdf->Text($posx, $posy+$size_y+2, $c."|".$m."|".$y."|".$k);
            $posx=$posx+$step_x;
            
        }
    $posy=$posy+$step_y;
}


$pdf->AddPage();

$pdf->SetFont('Arial', '', 12);
$pdf->Text($min_x, $label_y, "Magenta - Yellow");
$pdf->SetFont('Arial', '', 6);


$c=0;
$m=0;
$y=0;
$k=0;
$posy=$min_y;

for ($iy=0;$iy<=$anz_y;$iy++)
{
    $posx=$min_x;
    $c=0;
    for ($i=0;$i<=$anz_x;$i++)
        {
            $m=intval(($i)/$anz_x*100);
            $y=intval(($iy)/$anz_y*100);
            $pdf->SetFillColor($c, $m, $y, $k);
            $pdf->SetTextColor(100, 100, 100, 100);
            $pdf->Rect($posx, $posy, $size_x, $size_y,'F');
            $pdf->Text($posx, $posy+$size_y+2, $c."|".$m."|".$y."|".$k);
            $posx=$posx+$step_x;
            
        }
    $posy=$posy+$step_y;
}


$pdf->AddPage();

$pdf->SetFont('Arial', '', 12);
$pdf->Text($min_x, $label_y, "Magenta - Black");
$pdf->SetFont('Arial', '', 6);


$c=0;
$m=0;
$y=0;
$k=0;
$posy=$min_y;

for ($iy=0;$iy<=$anz_y;$iy++)
{
    $posx=$min_x;
    $c=0;
    for ($i=0;$i<=$anz_x;$i++)
        {
            $m=intval(($i)/$anz_x*100);
            $k=intval(($iy)/$anz_y*100);
            $pdf->SetFillColor($c, $m, $y, $k);
            $pdf->SetTextColor(100, 100, 100, 100);
            $pdf->Rect($posx, $posy, $size_x, $size_y,'F');
            $pdf->Text($posx, $posy+$size_y+2, $c."|".$m."|".$y."|".$k);
            $posx=$posx+$step_x;
            
        }
    $posy=$posy+$step_y;
}


$pdf->AddPage();


$pdf->SetFont('Arial', '', 12);
$pdf->Text($min_x, $label_y, "Yellow - Black");
$pdf->SetFont('Arial', '', 6);


$c=0;
$m=0;
$y=0;
$k=0;
$posy=$min_y;

for ($iy=0;$iy<=$anz_y;$iy++)
{
    $posx=$min_x;
    $c=0;
    for ($i=0;$i<=$anz_x;$i++)
        {
            $y=intval(($i)/$anz_x*100);
            $k=intval(($iy)/$anz_y*100);
            $pdf->SetFillColor($c, $m, $y, $k);
            $pdf->SetTextColor(100, 100, 100, 100);
            $pdf->Rect($posx, $posy, $size_x, $size_y,'F');
            $pdf->Text($posx, $posy+$size_y+2, $c."|".$m."|".$y."|".$k);
            $posx=$posx+$step_x;
            
        }
    $posy=$posy+$step_y;
}






$pdf->Output();
?>
