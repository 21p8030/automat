<div class="container-fluid">
    <div class="row mt-1">
        <div class="col-1">
            <button class="btn btn-primary backBtn btn-lg pull-left" type="button" onclick="history.back(-1)"><i
                    class="fa fa-arrow-left"></i></button>
        </div>
        <div class="col-2"></div>
        <div class="col-6">
            <h1 class="display-5 text-center border border-primary border-info mb-5">Hin- und Retourbillette</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 border border-primary border-info mb-5">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>
                            Ihre Auswahl
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <?php
                    $sitzung = $data['sitzung'];
                    ?>
                <tbody>
                    <tr class="table-dark">
                        <td>Art</td>
                        <td ALIGN="RIGHT">Hin- oder Rückfahrt</td>
                    </tr>
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
                        <td ALIGN="RIGHT"><?php echo $sitzung['Datum'];  ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-8">
            <form action="/TemplateMVC/TemplateMVC/public/home/uebersicht" method="post" id="billet_art">
                <div class="row">
                    <div class="form-group col">
                        <label for="discount">Ermässigung</label>

                        <select class="custom-select" id="discount" name="discount" required>
                            <option value="">Wählen Sie eine Ermässigung</option>
                            <?php
                            $discount = $data['discount'];
                            foreach($discount as $key =>
                            $value): echo '
                            <option value="'.$key.'">'.$value.'</option>
                            '; endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="ride_kind">Art</label>
                        <select class="custom-select" id="ride_kind" required name="ride_kind">
                            <option value="">Wählen Sie eine Art</option>
                            <option value="1">Einfache Fahrt</option>
                            <option value="2">Hin- und Rückfahrt</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col  col-md-6 ">
                        <label for="number-input">Anzahl Billete</label>
                        <input class="form-control" type="number" value="1" id="count_tickets" min="1" name="count"
                            required />
                    </div>
                    <div class="form-group ml-4">
                        <label>Klasse</label>
                        <div class="custom-control custom-radio">
                            <input value="1" type="radio" id="second_class" name="customRadio"
                                class="custom-control-input" checked="" />
                            <label class="custom-control-label" for="second_class">2. Klasse</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input value="2" type="radio" id="first_class" name="customRadio"
                                class="custom-control-input" />
                            <label class="custom-control-label" for="first_class">1. Klasse</label>
                        </div>
                    </div> 
                    <div class="col">
                    <label style="color: #272b30;">Weiter</label>
                        <button type="submit" class="btn btn-primary btn-lg btn-block border border-primary border-info">Weiter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>