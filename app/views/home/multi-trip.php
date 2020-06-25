<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
<script>
$.fn.datepicker.dates['de'] = {
    days: ["Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag"],
    daysShort: ["Son", "Mon", "Die", "Mit", "Don", "Fre", "Sam"],
    daysMin: ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa"],
    months: ["Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober",
        "November", "Dezember"
    ],
    monthsShort: ["Jan", "Feb", "Mär", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dez"],
    today: "Heute",
    clear: "Clear",
    format: "dd/mm/yyyy",
    titleFormat: "MM yyyy",
    weekStart: 0
};

$(document).ready(function() {
    var date = new Date();
    date.setDate(date.getDate());
    var date_input = $('input[name="date"]');
    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
    var options = {
        format: 'dd/mm/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
        orientation: 'top left',
        language: "de",
        todayBtn: "linked",
        weekStart: 1,
        startDate: date,
    };
    date_input.datepicker(options);
})

function uberprufung() {
    var msg = document.querySelector("#start_ride").value;
    console.log(msg);
    var msg2 = document.querySelector("#destination_ride").value;
    console.log(msg2);
    if (msg != msg2) {
        return true;
    } else {
        alert("Sie können nicht zweimal den selben Ort wählen!");
        return false;
    }
}
</script>


<div class="container-fluid">

    <div class="row mt-1">
        <div class="col-1">
            <button class=" btn  btn-primary backBtn btn-lg pull-left" type="button" onclick="history.back(-1)"><i
                    class="fa fa-arrow-left"></i></button>
        </div>
        <div class="col-2">
        </div>
        <div class="col-6">
            <h1 class="display-5 text-center border border-primary border-info mb-5">Mehrfahrtenkarte</h1>
        </div>


    </div>
</div>
<div class="container">
    <form action="/TemplateMVC/TemplateMVC/public/home/billetart_multi" method="post" autocomplete="off"
        onsubmit="return uberprufung()">
        <div class="row">
            <div class="form-group col">
                <label for="start_ride">Start</label>
                <select required class="custom-select" id="start_ride" name="start_ride">
                    <option value="">Wählen Sie einen Start</option>
                    <?php
                    $trainstations = $data['trainstations'];
                    foreach($trainstations as $key => $value):
                    echo '<option value="'.$key.'">'.$value.'</option>';
                    endforeach;
                    ?>
                </select>
            </div>
            <div class="form-group col">
                <label for="destination_ride">Ziel</label>
                <select required class="custom-select" id="destination_ride" name="destination_ride">
                    <option value="">Wählen Sie ein Ziel</option>
                    <?php
                    $trainstations = $data['trainstations'];
                    foreach($trainstations as $key => $value):
                    echo '<option value="'.$key.'">'.$value.'</option>';
                    endforeach;
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label>Start Datum</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i  class="fas fa-calendar-alt fa-3x">
                        </i>
                    </div>
                    <input class="form-control" id="date" name="date" placeholder="DD/MM/YYYY" type="text" required />
                </div>
            </div>
            <div class="col">
            <label style="color: #272b30;">Weiter</label>
                <button type="submit" class="btn btn-primary btn-lg btn-block border border-primary border-info mb-3">Weiter</button>
            </div>
        </div>
    </form>
</div>