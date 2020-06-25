<div class="container-fluid">

    <div class="row">
        <div class="col-1">
            <button class=" btn  btn-primary backBtn btn-lg pull-left" type="button" onclick="history.back(-1)"><i
                    class="fa fa-arrow-left"></i></button>
        </div>
        <div class="col-2">
        </div>
        <div class="col-6">
            <h1 class="display-5 text-center border border-primary border-info mb-3">Kauf Bestätigung</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
        </div>
        <div class="col-6">
            <div class="card text-white bg-primary mb-3" style="max-width: 25rem;">
                <div class="card-header text-center">Bestätigung</div>
                <div class="card-body">
                    <h4 class="card-title"><?php $sitzung = $data['sitzung']; echo $sitzung['Preis']; ?> CHF </h4>
                    <p class="card-text">Vielen Dank für Ihr Vertrauen und eine gute Fahrt</p>
                    <a class=" btn btn-primary" role="button"
                        onclick="location.href='http://localhost/TemplateMVC/TemplateMVC/public/home/';">Startseite</a>
                </div>
            </div>
        </div>
    </div>

</div>