<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Designe/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="Designe/style.css">
</head>

<body>
    <div class="container mt-5 pb-5">
        <div class="row d-flex justify-content-center">
            <h1>Fin kod üçün axtarış</h1>
        </div>
        <br>
        <div class="row d-flex justify-content-center">
            <div class="col-7 d-flex justify-content-center form_ust">
                <form method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" id="pin" name="pin" autocomplete="off">
                    </div>
                    <div class="d-flex justify-content-center duymeler">
                        <button type="submit" class="search" name="teserrufat_data" value="teserrufat_data">Təsərrüfat</button>

                        <button type="submit" class="search" name="aze_data" value="aze_data">Şəxsiyyət vəsiqəsi</button>
                        <button type="submit" class="search" name="teqaud" value="teqaud">Təqaüd</button>
                        <button type="submit" class="search" name="is" value="is">İş məlumatları</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="Designe/Jquery/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.search').click(function() {
                if ($('#pin').val() == '') {
                    alert('Fin kod daxil edin');
                    $('#pin').focus();
                } else {
                    $('form').attr('target', '_blank');
                    $('form').attr('action', 'dataTable.php');
                }
            });
        });
    </script>
</body>

</html>