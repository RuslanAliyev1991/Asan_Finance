<?php
//require_once('curl.php');
$asan_massiv = array(
    'Response' => array(
        'Person' => array(
            'Pin' => '0WHKDYV',
            'LastName' => 'QASIMOV',
            'FirstName' => 'ELNUR',
            'FatherName' => 'İBRAHİM OĞLU',
            'BirthDate' => '01.07.1976'
        ),

        'Company' => '',
        'Farms' => array(
            0 => array(
                'Id' => '395913',
                'Name' => 'Kürdəmir təsərrüfatı',
                'Fields' => array(
                    0 => array(
                        'VillageName' => 'Mollakənd kəndi',
                        'DocType' => 'Çıxarış (ƏMDK)',
                        'FieldAmount' => '1.94',
                        'Unit' => 'hektar',
                        'Plants' => array(
                            0 => array(
                                'Name' => 'PAYIZLIQ BƏRK BUĞDA, - BƏRƏKƏTLI 95 ℗ (DİGƏR)',
                                'FieldAmount' => '1.94',
                                'Unit' => 'hektar'
                            ),

                            1 => array(
                                'Name' => 'PAYIZLIQ BƏRK BUĞDA, - BƏRƏKƏTLI 95 ℗ (DİGƏR)',
                                'FieldAmount' => '1.94',
                                'Unit' => 'hektar'
                            )

                        )

                    ),

                    1 => array(
                        'VillageName' => 'Mollakənd kəndi',
                        'DocType' => 'Dövlət aktıŞəhadətnamə',
                        'FieldAmount' => '2.27',
                        'Unit' => 'hektar',
                        'Plants' => array(
                            0 => array(
                                'Name' => 'PAYIZLIQ ARPA - BAHARLI ℗ (ELİT)',
                                'FieldAmount' => '2.27',
                                'Unit' => 'hektar'
                            ),

                            1 => array(
                                'Name' => 'PAYIZLIQ ARPA - BAHARLI ℗ (DİGƏR)',
                                'FieldAmount' => '2.27',
                                'Unit' => 'hektar'
                            )

                        )

                    ),
                    2 => array(
                        'VillageName' => 'Mollakənd kəndi',
                        'DocType' => 'Dövlət aktıŞəhadətnamə',
                        'FieldAmount' => '4.27',
                        'Unit' => 'hektar',
                        'Plants' => array(
                            0 => array(
                                'Name' => 'PAYIZLIQ ARPA - BAHARLI ℗ (ELİT)',
                                'FieldAmount' => '3.27',
                                'Unit' => 'hektar'
                            ),

                            1 => array(
                                'Name' => 'aPAYIZLIQ ARPA - BAHARLI ℗ (DİGƏR)',
                                'FieldAmount' => '1.27',
                                'Unit' => 'hektar'
                            ),
                            2 => array(
                                'Name' => 'PAYIZLIQ ARPA - BAHARLI ℗ (yasil)',
                                'FieldAmount' => '0.27',
                                'Unit' => 'hektar'
                            )

                        )

                    )

                ),

                'Animals' => array(),
                'Bees' => array()

            )
        )
    )
);
// if (isset($_GET['teserrufat_data'])) {

$response = $asan_massiv['Response'];
$person = $response['Person'];
$company = $response['Company'];
$farms = $response['Farms'];
// } elseif (isset($_GET['aze_data'])) {
//     $response = $asan_massiv['Response'];
// }
$f = $farms[0]['Fields'][0]['Plants'];
$f = array_map("unserialize", array_unique(array_map("serialize", $f)));
echo '<pre>';
print_r($f);
echo '</pre>';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Usbwebserver</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />

    <link rel="stylesheet" href="../Designe/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Designe/style.css">
</head>

<body>
    <div class="container">
        <br>
        <span class="text-muted font-weight-bold">(Sorğunun tarixi: <?= date('d.m.Y'); ?>)</span>
        <!-- TESERRUFAT Melumatlari -->
        <?php //if (isset($_GET['teserrufat_data'])) { 
        ?>
        <h3 class="text-center">Şəxs</h3>
        <table class="table table-secondary table-striped">
            <tr>
                <td>Fin kod</td>
                <td><?= $person['Pin']; ?></td>
            </tr>
            <tr>
                <td>Soyadı</td>
                <td><?= $person['LastName'] ?></td>
            </tr>
            <tr>
                <td>Adı</td>
                <td><?= $person['FirstName'] ?></td>
            </tr>
            <tr>
                <td>Ata adı</td>
                <td><?= $person['FatherName'] ?></td>
            </tr>
            <tr>
                <td>Doğum tarixi</td>
                <td><?= $person['BirthDate'] ?></td>
            </tr>
        </table>

        <br>
        <?php if (!empty($company)) : ?>
            <h3 class="text-center">Şirkət</h3>
            <table class="table table-secondary table-striped">
                <tr>
                    <td>Voen</td>
                    <td colspan="2"><?= $company['Voen'] ?></td>
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
            <table class="table table-secondary table-striped">
                <?php $fi = 0;
                foreach ($farms as $key) : $fi++; ?>
                    <tr>
                        <td colspan="3" class="text-center text-bold">
                            <h4>Farm <?= $fi; ?> info</h4>
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="2">Farm <?= $fi; ?></td>
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
                                <h4>Farm <?= $fi; ?> - Fields</h4>
                            </td>
                        </tr>
                        <?php $ffi = 0;
                        foreach ($key['Fields'] as $field) : $ffi++; ?>
                            <tr>
                                <td colspan="3" class="text-center text-bold">
                                    <h5>Field <?= $ffi; ?> info</h5>
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="4">Field <?= $ffi; ?></td>
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
                                        <h6>Field <?= $ffi; ?> - Plants</h6>
                                    </td>
                                </tr>
                                <?php $field['Plants'] = array_map("unserialize", array_unique(array_map("serialize", $field['Plants'])));
                                $n = 0;
                                foreach ($field['Plants'] as $plant) : ?>
                                        <tr>
                                            <td rowspan="3">Plant <?= $n++; ?></td>
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
                                <h5>Farm <?= $fi; ?> - Animals</h5>
                            </td>
                        </tr>
                        <?php $ai = 0;
                        foreach ($key['Animals'] as $animal) : $ai++; ?>
                            <tr>
                                <td rowspan="2">Animal <?= $ai; ?></td>
                                <td>Sort</td>
                                <td><?= $animal['Sort'] ?></td>
                            </tr>
                            <tr>
                                <td>Count</td>
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
        <?php //} 
        ?>