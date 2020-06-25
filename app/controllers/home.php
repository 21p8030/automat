<?php

class Home extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->user = $this->model('User');
    }

    public function index($name = '')
    {
        $user = $this->model('User');
        $user->name = $name;
        $this->view('home/index', ['user' => $user]);
    }

    public function einfachefahrt()
    {
        include '../app/data/trainstations.php';
        file_put_contents(
            '../app/data/sitzung.php',
            '<?php

      $sitzung = [
         "Art" => "Einzelnes Billett",
         "Start" => "",
         "Ziel" => "",
         "Datum" => "",
         "Ermässigung" => "",
         "Klasse" => "",
         "Anzahl" => "",
         "Preis" => "",
         "Anzahl_Mehrfahrten" => "0",
         "retour" => "0"
      
         ];
      
         ?>'
        );
        $this->view('home/easy-ride', ['trainstations' => $trainstations]);
    }

    public function multi_trip()
    {
        include '../app/data/trainstations.php';
        file_put_contents(
            '../app/data/sitzung.php',
            '<?php

      $sitzung = [
         "Art" => "Mehrfahrtenkarte",
         "Start" => "",
         "Ziel" => "",
         "Datum" => "",
         "Ermässigung" => "",
         "Klasse" => "",
         "Anzahl" => "",
         "Preis" => "",
         "Anzahl_Mehrfahrten" => "0",
         "retour" => "0"
      
         ];
      
         ?>'
        );
        $this->view('home/multi-trip', ['trainstations' => $trainstations]);
    }

    public function billetart()
    {
        include '../app/data/discount.php';
        include '../app/data/trainstations.php';
        include '../app/data/sitzung.php';
        $art = $sitzung['Art'];
        $start = $_POST['start_ride'];
        $ziel = $_POST['destination_ride'];
        $datum = $_POST['date'];
        file_put_contents(
            '../app/data/sitzung.php',
            '<?php

   $sitzung = [
   "Art" => "' .
                $art .
                '",
   "Start" => "' .
                $trainstations[$start] .
                '",
   "Ziel" => "' .
                $trainstations[$ziel] .
                '",
   "Datum" => "' .
                $datum .
                '",
   "Ermässigung" => "",
   "Klasse" => "",
   "Anzahl" => "",
   "Preis" => "",
   "Anzahl_Mehrfahrten" => "0",
   "retour" => "0"

   ];

   ?>'
        );
        include '../app/data/sitzung.php';
        $this->view('home/billetart', ['discount' => $discount, 'sitzung' => $sitzung]);
    }

    public function billetart_multi()
    {
        include '../app/data/discount.php';
        include '../app/data/trainstations.php';
        include '../app/data/sitzung.php';
        $art = $sitzung['Art'];
        $start = $_POST['start_ride'];
        $ziel = $_POST['destination_ride'];
        $datum = $_POST['date'];
        file_put_contents(
            '../app/data/sitzung.php',
            '<?php

   $sitzung = [
   "Art" => "' .
                $art .
                '",
   "Start" => "' .
                $trainstations[$start] .
                '",
   "Ziel" => "' .
                $trainstations[$ziel] .
                '",
   "Datum" => "' .
                $datum .
                '",
   "Ermässigung" => "",
   "Klasse" => "",
   "Anzahl" => "",
   "Preis" => "",
   "Anzahl_Mehrfahrten" => "0",
   "retour" => "0"

   ];

   ?>'
        );
        include '../app/data/sitzung.php';
        $this->view('home/billetart2', ['discount' => $discount, 'sitzung' => $sitzung]);
    }
    public function uebersicht()
    {
        include '../app/data/sitzung.php';
        include '../app/data/discount.php';
        $art = $sitzung['Art'];
        $start = $sitzung['Start'];
        $ziel = $sitzung['Ziel'];
        $datum = $sitzung['Datum'];
        $anzahl_mehrfahrten = $sitzung['Anzahl_Mehrfahrten'];
        $retour = $sitzung['retour'];
        $discounting = $_POST['discount'];
        $klasse = $_POST['customRadio'];
        if ($klasse == '1') {
            $klasse2 = '2. Klasse';
        } else {
            $klasse2 = '1. Klasse';
        }
        $anzahl = $_POST['count'];
        if (isset($_POST['count_multiple'])) {
            $anzahl_mehrfahrten = $_POST['count_multiple'];
        }
        if (isset($_POST['ride_kind'])) {
            $retour = $_POST['ride_kind'];
        }
        if ($anzahl_mehrfahrten == 0) {
            $anzahl_mehrfahrten_preis = 1;
        } else {
            $anzahl_mehrfahrten_preis = $anzahl_mehrfahrten;
        }
        if ($retour == 0) {
            $retour_preis = 1;
        } else {
            $retour_preis = $retour;
        }
        include '../app/data/prices.php';
        foreach ($prices as $key => $value):
            if ($value['From'] == $start) {
                if ($value['To'] == $ziel) {
                    $Preis = $value['Price'];
                    $Preis_Gesammt = $Preis * $discounting * $klasse * $anzahl * $anzahl_mehrfahrten_preis * $retour_preis;
                }
            }
        endforeach;
        file_put_contents(
            '../app/data/sitzung.php',
            '<?php

 $sitzung = [
   "Art" => "' .
                $art .
                '",
 "Start" => "' .
                $start .
                '",
 "Ziel" => "' .
                $ziel .
                '",
 "Datum" => "' .
                $datum .
                '",
 "Ermässigung" => "' .
                $discount[$discounting] .
                '",
 "Klasse" => "' .
                $klasse2 .
                '",
 "Anzahl" => "' .
                $anzahl .
                '",
 "Preis" => "' .
                $Preis_Gesammt .
                '",
"Anzahl_Mehrfahrten" => "' .
                $anzahl_mehrfahrten .
                '",
"retour" => "' .
                $retour .
                '"

 ];

 ?>'
        );

        include '../app/data/sitzung.php';
        $this->view('home/uebersicht', ['sitzung' => $sitzung, 'Preis_Gesammt' => $Preis_Gesammt]);
    }

    public function bezahlen()
    {
        include '../app/data/sitzung.php';
        $this->view('home/bezahlen', ['sitzung' => $sitzung]);
    }
    public function bezahlt()
    {
        include '../app/data/sitzung.php';
        $this->view('home/bezahlt', ['sitzung' => $sitzung]);
    }
}
