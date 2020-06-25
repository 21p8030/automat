<div class="container-fluid">
    <div class="row mt-1">
        <div class="col-1">
            <button class=" btn  btn-primary backBtn btn-lg pull-left" type="button" onclick="history.back(-1)"><i
                    class="fa fa-arrow-left"></i></button>
        </div>
        <div class="col-2">
        </div>
        <div class="col-6">
            <h1 class="display-5 text-center border border-primary border-info mb-3">Übersicht</h1>
        </div>
    </div>
    <?php
      $sitzung = $data['sitzung'];
      ?>
    <div class="row">
        <div class="col-3">
        </div>
        <div class="col align-self-center border border-primary border-info col-6">
            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th>
                            
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-dark">
                        <td>Art</td>
                        <td ALIGN="RIGHT"><?php echo $sitzung['Art'];?></td>
                    </tr>
                    <?php
                  $Anzahl_Mehrfahrten = $sitzung['Anzahl_Mehrfahrten'];
                  if ($Anzahl_Mehrfahrten != 0) {
                      echo'<tr class="table-dark">
                      <td>Anzahl Fahrten</td>
                      <td ALIGN="RIGHT">'.$Anzahl_Mehrfahrten.'</td>
                      </tr>';
                  }
                  $retour = $sitzung['retour'];
                  if ($retour == 1){
                      echo'<tr class="table-dark">
                      <td>Hin- oder Retour</td>
                      <td ALIGN="RIGHT">Einfache Fahrt</td>
                      </tr>';
                  } elseif ($retour == 2) {
                      echo'<tr class="table-dark">
                      <td>Hin- oder Retour</td>
                      <td ALIGN="RIGHT">Hin- und Rückfahrt</td>
                      </tr>';
                  }
                  
                  ?>
                    <tr class="table-dark">
                        <td>Start</td>
                        <td ALIGN="RIGHT"><?php echo $sitzung['Start']; ?></td>
                    </tr>
                    <tr class="table-dark">
                        <td>Ziel</td>
                        <td ALIGN="RIGHT"><?php echo $sitzung['Ziel']; ?></td>
                    </tr>
                    <tr class="table-dark">
                        <td>Datum</td>
                        <td ALIGN="RIGHT"><?php echo $sitzung['Datum']; ?></td>
                    </tr>
                    <tr class="table-dark">
                        <td>Ermässigung</td>
                        <td ALIGN="RIGHT"><?php echo $sitzung['Ermässigung']; ?></td>
                    </tr>
                    <tr class="table-dark">
                        <td>Klasse</td>
                        <td ALIGN="RIGHT"><?php echo $sitzung['Klasse']; ?></td>
                    </tr>
                    <tr class="table-dark">
                        <td>Anzahl Billettes</td>
                        <td ALIGN="RIGHT"><?php echo $sitzung['Anzahl']; ?></td>
                    </tr>
                    <tr class="bg-warning">
                        <td>Preis</td>
                        <td ALIGN="RIGHT"><?php echo $sitzung['Preis']; ?> CHF</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-4">
    <div class="col-4">
        </div>
        <div class="col-4">
            <a class="btn btn-primary btn-lg btn-block border border-primary border-info " role="button"
                onclick="location.href='http://localhost/TemplateMVC/TemplateMVC/public/home/bezahlen'">Auswahl
                bestätigen</a>
        </div>
    </div>

</div>