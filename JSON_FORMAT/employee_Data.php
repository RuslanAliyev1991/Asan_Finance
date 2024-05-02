<?php
$res='
"Response": {
    "Name": "sevinc",
    "Surname": "string",
    "Patronymic": "string",
    "BirthDate": "string",
    "Allowance": [
      {
        "BeginDate": "04.02.1996",
        "EndDate": "04.02.1998",
        "Type": {
          "Description": "aciqlama",
          "Id": 2
        },
        "Group": {
          "Description": "aciqlama",
          "Id": 2
        },
        "Amount": 490
      }
    ],
    "Pension": [
      {
        "Type": {
          "Label": "basliq",
          "Id": 3,
          "Description": "aciqlama"
        },
        "StartDate": "04.02.1996",
        "EndDate": "04.02.1998",
        "Group": {
          "Description": "aciqlama",
          "Id": 5
        },
        "Amount": 500
      }
    ]
  }';

  $asan_massiv = json_decode($res, true);
  echo "<pre>";
  print_r($asan_massiv);
  ?>