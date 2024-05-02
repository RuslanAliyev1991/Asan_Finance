<?php

require_once('Languages/lang.php');
require_once('curl.php');

if (isset($_GET['teserrufat_data'])) {
    @$response = $asan_massiv['Response'];
    @$person = $response['Person'];
    @$company = $response['Company'];
    @$farms = $response['Farms'];
} elseif (isset($_GET['aze_data'])) {
    @$response = $asan_massiv['Response'];
} elseif (isset($_GET['teqaud'])) {
    @$response = $asan_massiv['Response'];
    // echo "<pre>";
    // print_r($response);
} elseif (isset($_GET['is'])) {
    @$response = $asan_massiv['Response'];
    @$active = $response['Active'];
    @$deactive = $response['Deactive'];
    //print_r($response);
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Asan Finance</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />

    <link rel="stylesheet" href="Designe/bootstrap/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="Designe/style.css">
</head>

<body>
    <button id="download">Download PDF</button>

    <div id="content" class="container">
        <br>
        <span class="text-muted font-weight-bold">(Sorğunun tarixi: <?= date('d.m.Y'); ?>)</span>
        <!-- TESERRUFAT Melumatlari -->
        <?php if (isset($_GET['teserrufat_data'])) { ?>
        <?php if ($response != null) { ?>
        <h1 class="text-center font-weight-bold" id="head">Təsərrüfat haqqında məlumatlar</h1><br>
        <h3 class="text-center">Şəxs</h3>
        <table class="table">
            <tr>
                <td style="border-top:1px solid black;">Fin kod</td>
                <td style="border-top:1px solid black;"><?= $person['Pin']; ?></td>
            </tr>
            <tr>
                <td>Soyadı</td>
                <td id="lastname"><?= $person['LastName'] ?></td>
            </tr>
            <tr>
                <td>Adı</td>
                <td id="name"><?= $person['FirstName'] ?></td>
            </tr>
            <tr>
                <td>Ata adı</td>
                <td id="middlename"><?= $person['FatherName'] ?></td>
            </tr>
            <tr>
                <td>Doğum tarixi</td>
                <td><?= $person['BirthDate'] ?></td>
            </tr>
        </table>

        <br>
        <?php if (!empty($company)) : ?>
        <h3 class="text-center">Şirkət</h3>
        <table class="table">
            <tr>
                <td style="border-top:1px solid black;">Voen</td>
                <td colspan="2" style="border-top:1px solid black;"><?= $company['Voen'] ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td colspan="2"><?= $company['Name'] ?></td>
            </tr>
            <tr>
                <td>PersonType</td>
                <td colspan="2"><?= $company['PersonType'] ?></td>
            </tr>
            <?php if (!empty($company['Persons'])) : ?>
            <tr>
                <td colspan="3" class="text-center text-bold">
                    <h4>Persons</h4>
                </td>
            </tr>
            <?php $pi = 0;
                            foreach ($company['Persons'] as $key) : $pi++; ?>
            <tr>
                <td rowspan="5"><?= $pi; ?></td>
                <td>Fin kod</td>
                <td><?= $key['Pin'] ?></td>
            </tr>
            <tr>
                <td>Soyadı</td>
                <td><?= $key['LastName'] ?></td>
            </tr>
            <tr>
                <td>Adı</td>
                <td><?= $key['FirstName'] ?></td>
            </tr>
            <tr>
                <td>Ata adı</td>
                <td><?= $key['FatherName'] ?></td>
            </tr>
            <tr>
                <td>Doğum tarixi</td>
                <td><?= $key['BirthDate'] ?></td>
            </tr>

            <?php endforeach; ?>
            <?php endif; ?>
        </table>
        <?php else : ?>
        <h3 class="text-center text-danger">Şirkət (məlumat yoxdur)</h3>
        <?php endif; ?>

        <br>
        <?php if (!empty($farms)) : ?>
        <h3 class="text-center">Təsərrüfatlar</h3>
        <table class="table">
            <?php $fi = 0;
                        foreach ($farms as $key) : $fi++; ?>
            <tr>
                <td colspan="3" class="text-center text-bold" style="border-top:1px solid black;">
                    <h4>Ferma <?= $fi; ?> haqqında</h4>
                </td>
            </tr>
            <tr>
                <td rowspan="2">Ferma <?= $fi; ?></td>
                <td>Kod</td>
                <td><?= $key['Id'] ?></td>
            </tr>
            <tr>
                <td>Ad</td>
                <td><?= $key['Name'] ?></td>
            </tr>
            <?php if (!empty($key['Fields'])) : ?>
            <tr>
                <td colspan="3" class="text-center text-bold">
                    <h4>Ferma <?= $fi; ?> - sahələr</h4>
                </td>
            </tr>
            <?php $ffi = 0;
                                foreach ($key['Fields'] as $field) : $ffi++; ?>
            <tr>
                <td colspan="3" class="text-center text-bold">
                    <h5>Sahə <?= $ffi; ?> haqqında</h5>
                </td>
            </tr>
            <tr>
                <td rowspan="4">Sahə <?= $ffi; ?></td>
                <td>Kənd adı</td>
                <td><?= $field['VillageName'] ?></td>
            </tr>
            <tr>
                <td>Sənəd növü</td>
                <td><?= $field['DocType'] ?></td>
            </tr>
            <tr>
                <td>Sahə miqdarı</td>
                <td><?= $field['FieldAmount'] ?></td>
            </tr>
            <tr>
                <td>Vahid</td>
                <td><?= $field['Unit'] ?></td>
            </tr>

            <?php if (!empty($field['Plants'])) : ?>
            <tr>
                <td colspan="3" class="text-center text-bold">
                    <h6>Sahə <?= $ffi; ?> - Bitkilər</h6>
                </td>
            </tr>
            <?php $field['Plants'] = array_map("unserialize", array_unique(array_map("serialize", $field['Plants'])));
                                        $n = 0;
                                        foreach ($field['Plants'] as $plant) : $n++; ?>
            <tr>
                <td rowspan="3">Bitki <?= $n; ?></td>
                <td>Ad</td>
                <td><?= $plant['Name'] ?></td>
            </tr>
            <tr>
                <td>Sahə miqdarı</td>
                <td><?= $plant['FieldAmount'] ?></td>
            </tr>
            <tr>
                <td>Vahid</td>
                <td><?= $plant['Unit'] ?></td>
            </tr>
            <?php endforeach; ?>

            <?php endif; ?>

            <?php endforeach; ?>

            <?php endif; ?>

            <?php if (!empty($key['Animals'])) : ?>
            <tr>
                <td colspan="3" class="text-center text-bold">
                    <h5>Ferma <?= $fi; ?> - Heyvanlar</h5>
                </td>
            </tr>
            <?php $ai = 0;
                                foreach ($key['Animals'] as $animal) : $ai++; ?>
            <tr>
                <td rowspan="2">Heyvan <?= $ai; ?></td>
                <td>Növ</td>
                <td><?= $animal['Sort'] ?></td>
            </tr>
            <tr>
                <td>Say</td>
                <td><?= $animal['Count'] ?></td>
            </tr>

            <?php endforeach; ?>
            <?php else : ?>
            <tr>
                <td colspan="3" class="text-center text-bold text-danger">
                    <h5>Heyvanlar (məlumat yoxdur)</h5>
                </td>
            </tr>

            <?php endif; ?>

            <?php if (!empty($key['Bees'])) : ?>
            <tr>
                <td colspan="3" class="text-center text-bold">
                    <h5>Farm <?= $fi; ?> - Bees</h5>
                </td>
            </tr>
            <?php $bi = 0;
                                foreach ($key['Bees'] as $bee) : $bi++; ?>
            <tr>
                <td rowspan="2">Bee <?= $bi; ?></td>
                <td>Sort</td>
                <td><?= $bee['Sort'] ?></td>
            </tr>
            <tr>
                <td>Count</td>
                <td><?= $bee['Count'] ?></td>
            </tr>

            <?php endforeach; ?>
            <?php else : ?>
            <tr>
                <td colspan="3" class="text-center text-bold text-danger">
                    <h5>Arılar (məlumat yoxdur)</h5>
                </td>
            </tr>

            <?php endif; ?>


            <?php endforeach; ?>
        </table>
        <?php else : ?>
        <h3 class="text-center text-danger">Təsərrüfatlar (məlumat yoxdur)</h3>
        <?php endif; ?>



        <?php } else { ?>
        <h3 class="text-center text-danger">Bu şəxsin təsərrüfatı yoxdur</h3>
        <?php } ?>
        <?php } ?>

        <!-- AZE Melumatlari -->
        <?php if (isset($_GET['aze_data'])) { ?>
        <?php if ($response != null) { ?>
        <div class="container font-weight-bold mt-4 mb-3">
            <h1 class="text-center font-weight-bold mb-5" id="head">Şəxsiyyət vəsiqəsi haqqında məlumatlar</h1>
            <br><br>
            <div class="row">
                <div class="col-8">
                    <div class="row setir">
                        <div class="col-6 p-2">Fin kod</div>
                        <div class="col-6 p-2 sutun"><?= $response['PIN'] ?></div>
                    </div>
                    <div class="row setir">
                        <div class="col-6 p-2">Seriya</div>
                        <div class="col-6 p-2 sutun"><?= $response['DocumentSeria'] ?? 'AA' ?></div>
                    </div>

                    <div class="row setir">
                        <div class="col-6 p-2">Seriya nömrəsi</div>
                        <div class="col-6 p-2 sutun"><?= $response['DocumentNumber'] ?></div>
                    </div>
                    <div class="row setir">
                        <div class="col-6 p-2">Ad</div>
                        <div class="col-6 p-2 sutun" id="name"><?= $response['Name'] ?></div>
                    </div>
                    <div class="row setir">
                        <div class="col-6 p-2">Soyad</div>
                        <div class="col-6 p-2 sutun" id="lastname"><?= $response['Surname'] ?></div>
                    </div>
                    <div class="row setir">
                        <div class="col-6 p-2">Ata adı</div>
                        <div class="col-6 p-2 sutun" id="middlename"><?= $response['Patronymic'] ?></div>
                    </div>
                    <div class="row setir">
                        <div class="col-6 p-2">Doğum tarixi</div>
                        <div class="col-6 p-2 sutun"><?= $response['BirthDate'] ?></div>
                    </div>
                    <div class="row setir">
                        <div class="col-6 p-2">Doğum yeri</div>
                        <div class="col-6 p-2 sutun"><?= $response['BirthAddress'] ?></div>
                    </div>
                    <div class="row setir">
                        <div class="col-6 p-2">Cinsi</div>
                        <div class="col-6 p-2 sutun"><?= $response['Gender'] ?></div>
                    </div>
                </div>
                <div class="col-4" style="border: 1px solid gray;">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <img class="mt-3" style="width: 81%;"
                                src="<?= 'data:image/png;base64,' . $response['Image']; ?>">
                        </div>
                    </div>
                </div>
            </div>

            <?php
                    $i = 0;
                    foreach ($response as $key => $value) :
                        if ($i > 10) :
                            if ($key !== 'ActivationDate' && $key !== 'Image' && $key !== 'Sign') : ?>
            <div class="row setir">
                <div class="col-4 p-2"><?= $lang[$key]; ?></div>
                <div class="col-8 p-2 sutun"><?= $value; ?></div>
            </div>
            <?php
                            endif;
                        endif;
                        $i++;
                    endforeach; ?>

            <div class="row setir">
                <div class="col-4 p-2"><?= $lang['Sign']; ?></div>
                <div class="col-8 p-2 sutun">
                    <img src="<?= 'data:image/png;base64,' . $response['Sign']; ?>">
                </div>
            </div>
        </div>
        <?php } else { ?>
        <h3 class="text-center text-danger">Bu şəxsin şəxsiyyət vəsiqəsi aktiv deyil (və ya yoxdur)</h3>
        <?php } ?>
        <?php } ?>

        <!-- Teqaud Melumatlari -->

        <?php if (isset($_GET['teqaud'])) { ?>
        <?php if ($response != null) { ?>
        <h2 class="text-center mt-2" id="head">Təqaüd haqqında məlumatlar</h2>
        <br> <br>
        <table class="table mb-5">
            <tr>
                <td style="border-top:1px solid black;">Ad</td>
                <td style="border-top:1px solid black;" id="name"><?= $response['Name'] ?></td>
            </tr>
            <tr>
                <td>Soyad</td>
                <td id="lastname"><?= $response['Surname'] ?></td>
            </tr>
            <tr>
                <td>Atasının adı</td>
                <td id="middlename"><?= $response['Patronymic'] ?></td>
            </tr>
            <tr>
                <td>Doğum tarixi</td>
                <td><?= $response['BirthDate'] ?></td>
            </tr>
        </table>


        <!-- Muavinet haqqinda -->
        <?php if (!empty($response['Allowance'])) { ?>
        <table class="table mb-5">
            <tr>
                <td colspan="2" style="border-top: 1px solid black;">
                    <h4 class="text-center">Müavinət</h4>
                </td>
            </tr>
            <tr>
                <td>Bitmə tarixi</td>
                <td><?= $response['Allowance'][0]['EndDate'] ?></td>
            </tr>
            <tr>
                <td>Başlama tarixi</td>
                <td><?= $response['Allowance'][0]['BeginDate'] ?></td>
            </tr>
            <?php if (!empty($response['Allowance'][0]['Type'])) { ?>
            <tr>
                <td colspan="2">
                    <h5 class="text-center">Müavinət növü</h5>
                </td>
            </tr>
            <tr>
                <td>Təsvir</td>
                <td><?= $response['Allowance'][0]['Type']['Description'] ?></td>
            </tr>
            <tr>
                <td>Kod</td>
                <td><?= $response['Allowance'][0]['Type']['Id'] ?></td>
            </tr>
            <?php } ?>

            <?php if (!empty($response['Allowance'][0]['Group'])) { ?>
            <tr>
                <td colspan="2">
                    <h5 class="text-center">Qrup</h5>
                </td>
            </tr>
            <tr>
                <td>Təsvir</td>
                <td><?= $response['Allowance'][0]['Group']['Description'] ?></td>
            </tr>
            <tr>
                <td>Kod</td>
                <td><?= $response['Allowance'][0]['Group']['Id'] ?></td>
            </tr>
            <?php } ?>
            <tr>
                <td>Məbləğ</td>
                <td><?= $response['Allowance'][0]['Amount'] ?></td>
            </tr>
        </table>
        <?php } else { ?>
        <h4 class="text-center text-danger mb-3">Bu şəxs müavinət almır</h4>
        <?php } ?>


        <!-- Teqaud haqqinda -->
        <?php if (!empty($response['Pension'])) { ?>
        <table class="table">
            <tr>
                <td colspan="2" style="border-top: 1px solid black;">
                    <h4 class="text-center">Təqaüd</h4>
                </td>
            </tr>
            <?php if (!empty($response['Pension'][0]['Type'])) { ?>
            <tr>
                <td colspan="2">
                    <h5 class="text-center">Təqaüd növü</h5>
                </td>
            </tr>
            <tr>
                <td>Etiket</td>
                <td><?= $response['Pension'][0]['Type']['Label'] ?></td>
            </tr>
            <tr>
                <td>Kod</td>
                <td><?= $response['Pension'][0]['Type']['Id'] ?></td>
            </tr>
            <tr>
                <td>Təsvir</td>
                <td><?= $response['Pension'][0]['Type']['Description'] ?></td>
            </tr>
            <?php } ?>
            <tr>
                <td>Başlama tarixi</td>
                <td><?= $response['Pension'][0]['StartDate'] ?></td>
            </tr>
            <tr>
                <td>Bitmə tarixi</td>
                <td><?= $response['Pension'][0]['EndDate'] ?></td>
            </tr>

            <?php if (!empty($response['Pension'][0]['Group'])) { ?>
            <tr>
                <td colspan="2">
                    <h5 class="text-center">Qrup</h5>
                </td>
            </tr>
            <tr>
                <td>Təsvir</td>
                <td><?= $response['Pension'][0]['Group']['Description'] ?></td>
            </tr>
            <tr>
                <td>Kod</td>
                <td><?= $response['Pension'][0]['Group']['Id'] ?></td>
            </tr>
            <?php } ?>
            <tr>
                <td>Məbləğ</td>
                <td><?= $response['Pension'][0]['Amount'] ?></td>
            </tr>
        </table>
        <?php } else { ?>
        <h4 class="text-center text-danger  mb-3">Bu şəxs təqaüd almır</h4>
        <?php } ?>
        <?php } else { ?>
        <h3 class="text-center text-danger">Bu şəxs təqaüd və müavinət almır</h3>
        <?php } ?>
        <?php } ?>

        <!-- IS melumatlari -->
        <?php if (isset($_GET['is'])) { ?>
        <?php if ($response != null) { ?>
        <?php if (!empty($active)) : ?>
        <h1 class="text-center font-weight-bold" id="head">İş haqqında məlumatlar</h1>
        <h1 class="text-center">Aktiv</h1>

        <?php $fi = 0;
        foreach ($active as $key) : $fi++; ?>

        <!-- IS -->
        <table class="table">
            <tr>
                <td colspan="2" style="border-top:1px solid black;">
                    <h2 class="text-center p-0 font-weight-bold"><?= $fi; ?></h2>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    <h4>Aktiv iş <?= $fi; ?> (iş yeri)</h4>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center font-weight-bold">İşə götürən</td>
            </tr>
            <tr>
                <td>Vöen</td>
                <td><?= $key['Employer']['Voen'] ?></td>
            </tr>
            <tr>
                <td>Ad</td>
                <td><?= $key['Employer']['Name'] ?></td>
            </tr>
            <tr>
                <td>İşçi sayı</td>
                <td><?= $key['Employer']['WorkerCount'] ?></td>
            </tr>
            <tr>
                <td>Telefon</td>
                <td><?= $key['Employer']['Phone'] ?></td>
            </tr>
            <tr>
                <td>Qanuni Ünvan</td>
                <td><?= $key['Employer']['LegalAddress'] ?></td>
            </tr>


            <!-- IS INFO-->
            <tr>
                <td colspan="2" class="text-center">
                    <h4>Aktiv iş <?= $fi; ?> (işçi məlumatları)</h4>
                </td>
            </tr>

            <tr>
                <td>Ad</td>
                <td id="name"><?= $key['Employee']['Name'] ?></td>
            </tr>
            <tr>
                <td>Soyad</td>
                <td id="lastname"><?= $key['Employee']['Surname'] ?></td>
            </tr>
            <tr>
                <td>Atasının adı</td>
                <td id="middlename"><?= $key['Employee']['Patronymic'] ?></td>
            </tr>
            <tr>
                <td>Telefon</td>
                <td><?= $key['Employee']['Phone'] ?></td>
            </tr>
            <tr>
                <td colspan="2" class="text-center font-weight-bold">
                    İş yerinin növü
                </td>
            </tr>
            <tr>
                <td>Etiket</td>
                <td><?= $key['Employee']['WorkPlaceType']['Label'] ?></td>
            </tr>
            <tr>
                <td>Təsvir</td>
                <td><?= $key['Employee']['WorkPlaceType']['Description'] ?></td>
            </tr>
            <tr>
                <td>İş yeri</td>
                <td><?= $key['Employee']['WorkPlace'] ?></td>
            </tr>
            <tr>
                <td>Vəzifə</td>
                <td><?= $key['Employee']['Position'] ?></td>
            </tr>
            <tr>
                <td>Vəzifə Əmək müqaviləsi</td>
                <td><?= $key['Employee']['PositionLabourContract'] ?></td>
            </tr>
            <tr>
                <td>Maaş</td>
                <td><?= $key['Employee']['Salary'] ?></td>
            </tr>
            <tr>
                <td colspan="2" class="text-center font-weight-bold">
                    İş növü
                </td>
            </tr>
            <tr>
                <td>Etiket</td>
                <td><?= $key['Employee']['WorkCasualType']['Label'] ?></td>
            </tr>
            <tr>
                <td>Təsvir</td>
                <td><?= $key['Employee']['WorkCasualType']['Description'] ?></td>
            </tr>
            <tr>
                <td>Sosial təminat nömrəsi</td>
                <td><?= $key['Employee']['SSN'] ?></td>
            </tr>
            <tr>
                <td colspan="2" class="text-center font-weight-bold">
                    <h4>Aktiv iş <?= $fi; ?> (Müqavilə)</h4>
                </td>
            </tr>
            <tr>
                <td>Başlama tarixi</td>
                <td><?= $key['Contract']['BeginDate'] ?></td>
            </tr>
            <tr>
                <td>İmzalanma tarixi</td>
                <td><?= $key['Contract']['SignDate'] ?></td>
            </tr>
            <tr>
                <td>Daxil edilmə tarixi</td>
                <td><?= $key['Contract']['InsertDate'] ?></td>
            </tr>
            <tr>
                <td>Bitmə tarixi</td>
                <td><?= $key['Contract']['EndDate'] ?></td>
            </tr>
            <tr>
                <td>Növbəti bitmə tarixi</td>
                <td><?= $key['Contract']['NextEndDate'] ?></td>
            </tr>
            <tr>
                <td colspan="2" class="text-center font-weight-bold">Dövr növü</td>
            </tr>
            <tr>
                <td>Etiket</td>
                <td><?= $key['Contract']['PeriodType']['Label'] ?></td>
            </tr>
            <tr>
                <td>Təsvir</td>
                <td><?= $key['Contract']['PeriodType']['Description'] ?></td>
            </tr>
            <tr>
                <td>Sayı</td>
                <td><?= $key['Contract']['Number'] ?></td>
            </tr>
            <tr>
                <td colspan="2" class="text-center font-weight-bold">Status</td>
            </tr>
            <tr>
                <td>Etiket</td>
                <td><?= $key['Contract']['Status']['Label'] ?></td>
            </tr>
            <tr>
                <td>Təsvir</td>
                <td><?= $key['Contract']['Status']['Description'] ?></td>
            </tr>
        </table>
        <?php endforeach; ?>
        <?php else : ?>
        <h3 class="text-center text-danger">hal-hazırda işləmir</h3>
        <?php endif; ?>
        <br><br><br><br><br><br><br><br><br><br><br>

        <?php if (!empty($deactive)) : ?>
        <h1 class="text-center">Deaktiv</h1>

        <?php
        $fi = 0;
        $margin = 30;
        foreach ($deactive as $key) : $fi++; ?>

        <!-- IS -->
        <div style="width: 100%; height: 820px; margin-bottom: <?= $margin; ?>px;">
            <table class="table">
                <tr>
                    <td colspan="2" style="border-top:1px solid black;">
                        <h2 class="text-center p-0 font-weight-bold"><?= $fi; ?></h2>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center">
                        <h4>Deaktiv iş <?= $fi; ?> (İş yeri)</h4>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center font-weight-bold">İşə götürən</td>
                </tr>
                <tr>
                    <td>Ad</td>
                    <td><?= $key['Employer']['Name'] ?></td>
                </tr>

                <!-- IS INFO-->
                <tr>
                    <td colspan="2" class="text-center font-weight-bold">İşçi</td>
                </tr>
                <tr>
                    <td>Vəzifə</td>
                    <td><?= $key['Employee']['Position'] ?></td>
                </tr>
                <tr>
                    <td>Maaş</td>
                    <td><?= $key['Employee']['Salary'] ?></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center font-weight-bold">Müqavilə</td>
                </tr>
                <tr>
                    <td>Başlama tarixi</td>
                    <td><?= $key['Contract']['BeginDate'] ?></td>
                </tr>
                <tr>
                    <td>Bitmə tarixi</td>
                    <td><?= $key['Contract']['EndDate'] ?></td>
                </tr>
            </table>
        </div>
        <?php endforeach; ?>

        <?php else : ?>
        <h3 class="text-center text-danger">Əvvəl heç bir yerdə işləməyib</h3>
        <?php endif; ?>
        <?php } else { ?>
        <h3 class="text-center text-danger">Bu şəxs heç bir yerdə işləməyib</h3>
        <?php } ?>
        <?php } ?>
    </div>

    <button id="topbtn"><i class="fas fa-arrow-up"></i></button>

    <script src="Designe/Jquery/jquery-3.5.1.min.js"></script>
    <script src="Designe/Jquery/html2pdf.bundle.min.js"></script>
    <script src="Designe/JavaScript/main.js"></script>

</body>


</html>