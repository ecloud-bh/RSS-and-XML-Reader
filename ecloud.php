<?php
function rssoku() 
{   
    $feed = file_get_contents("http://www.trt.net.tr/rss/gundem.rss");
    $xml= new SimpleXMLElement($feed);
    $sayac="1";
    // Okuma sınırı
    $limit="10";
    foreach ($xml -> channel -> item as $veri){
        if ($sayac <= $limit){ 
        $desc= $veri -> description;
        $desc=substr($desc,0,5000);
        $link = $veri -> link;
        $title= $veri -> title;
$baslik = str_replace("ÄŸ", "ğ", $title); 
$baslik = str_replace("Äz", "Ğ", $baslik); 
$baslik = str_replace("Ã¼", "ü", $baslik); 
$baslik = str_replace("Ãœ", "Ü", $baslik); 
$baslik = str_replace("ÅŸ", "ş", $baslik); 
$baslik = str_replace("Åz", "Ş", $baslik); 
$baslik = str_replace("Ä°", "İ", $baslik); 
$baslik = str_replace("Ä±", "ı", $baslik); 
$baslik = str_replace("Ã¶", "ö", $baslik); 
$baslik = str_replace("Ã–", "Ö", $baslik); 
$baslik = str_replace("Ã§", "ç", $baslik); 
$baslik = str_replace("Ã‡", "Ç", $baslik); 
$baslik = str_replace("â€“", "-", $baslik);
$baslik = str_replace("â€˜ ", "'", $baslik);
$baslik = str_replace("â€²", "'", $baslik);
 
$aciklama = str_replace("ÄŸ", "ğ", $desc); 
$aciklama = str_replace("Äz", "Ğ", $aciklama); 
$aciklama = str_replace("Ã¼", "ü", $aciklama); 
$aciklama = str_replace("Ãœ", "Ü", $aciklama); 
$aciklama = str_replace("ÅŸ", "ş", $aciklama); 
$aciklama = str_replace("Åz", "Ş", $aciklama); 
$aciklama = str_replace("Ä°", "İ", $aciklama); 
$aciklama = str_replace("Ä±", "ı", $aciklama); 
$aciklama = str_replace("Ã¶", "ö", $aciklama); 
$aciklama = str_replace("Ã–", "Ö", $aciklama); 
$aciklama = str_replace("Ã§", "ç", $aciklama); 
$aciklama = str_replace("Ã‡", "Ç", $aciklama); 
$aciklama = str_replace("â€“", "-", $aciklama);
$aciklama = str_replace("â€˜ ", "'", $aciklama);
$aciklama = str_replace("â€²", "'", $aciklama);
        echo "
        <html>
        <head>
        </head>
        <body>
        <div class='konular'>
        <div class='baslik'><a target=\" href=\"$baslik\">$baslik</a></div><br />
        <p>$aciklama</p>
        </div>
        </body>
        </html>
        ";
         
        }
    $sayac++;
    }
}
rssoku();
?>