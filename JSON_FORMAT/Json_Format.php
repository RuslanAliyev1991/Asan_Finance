<?php
$asan = '{
  "RequestIdentifier": null,
  "Status": {
    "Name": "Successful",
    "Code": 0,
    "Message": ""
  },
  "Response": {
    "Active": [
      {
        "Employer": {
          "TaxNumber": "1400194461",
          "Name": "BANK OLMAYAN KREDİT TƏŞKİLATI \"İNKİŞAF ÜÇÜN MALİYYƏ\" MƏHDUD MƏSULİYYƏTLİ CƏMİYYƏTİ",
          "Phones": "0502227249; 0124927763",
          "LegalAddress": "AZ1095, BAKI ŞƏHƏRİ NƏSİMİ RAYONU, HƏZİ ASLANOV, ev 115, mənzil 8",
          "FactualAddress": ""
        },
        "EmployeeInfo": {
          "WorkPlaceType": "Əsas",
          "WorkPlace": "Maliyyə və Əməliyyat departamenti -> İnformasiya texnologiyaları",
          "Position": "Köməkçi, proqramçı",
          "PositionLaborContract": "İdarəetmə informasiya sistemləri meneceri",
          "MonthlySalary": "543.02",
          "ContractType": "Müddətli",
          "ContractBeginDate": "11.04.2019",
          "ContractSignDate": "15.05.2020 16:17:30",
          "ContractEndDate": "11.04.2021",
          "WorkCasualType": "Vaxtamuzd",
          "SocialSecurityNumber": "2111199102652",
          "ContractNumber": "5560XWZ000202",
          "ContractStatus": "Qüvvədədir"
        }
      }
    ],
    "Deactive": [
      {
        "Employer": {
          "TaxNumber": "1400194461",
          "Name": "BANK OLMAYAN KREDİT TƏŞKİLATI \"İNKİŞAF ÜÇÜN MALİYYƏ\" MƏHDUD MƏSULİYYƏTLİ CƏMİYYƏTİ"
        },
        "EmployeeInfo": {
          "WorkPlaceType": "Əsas",
          "Position": "Sistem üzrə məsləhətçi",
          "PositionLaborContract": null,
          "MonthlySalary": "543.02",
          "ContractBeginDate": "11.02.2020",
          "ContractSignDate": null,
          "ContractEndDate": "11.04.2020"
        }
      },
      {
        "Employer": {
          "TaxNumber": "1400194461",
          "Name": "BANK OLMAYAN KREDİT TƏŞKİLATI \"İNKİŞAF ÜÇÜN MALİYYƏ\" MƏHDUD MƏSULİYYƏTLİ CƏMİYYƏTİ"
        },
        "EmployeeInfo": {
          "WorkPlaceType": "Əsas",
          "Position": "Sistem üzrə məsləhətçi",
          "PositionLaborContract": null,
          "MonthlySalary": "431.29",
          "ContractBeginDate": "11.04.2019",
          "ContractSignDate": null,
          "ContractEndDate": "11.04.2020"
        }
      },
      {
        "Employer": {
          "TaxNumber": "1004136861",
          "Name": "\"GLOBAL SUPPLY TRADE COMPANY\" MƏHDUD MƏSULİYYƏTLİ CƏMİYYƏTİ"
        },
        "EmployeeInfo": {
          "WorkPlaceType": "Əsas",
          "Position": "Dizayner, mebel",
          "PositionLaborContract": null,
          "MonthlySalary": "173",
          "ContractBeginDate": "20.07.2018",
          "ContractSignDate": null,
          "ContractEndDate": "24.07.2019"
        }
      },
      {
        "Employer": {
          "TaxNumber": "1004136861",
          "Name": "\"GLOBAL SUPPLY TRADE COMPANY\" MƏHDUD MƏSULİYYƏTLİ CƏMİYYƏTİ"
        },
        "EmployeeInfo": {
          "WorkPlaceType": "Əsas",
          "Position": "Dizayner, mebel",
          "PositionLaborContract": null,
          "MonthlySalary": "173",
          "ContractBeginDate": "26.04.2018",
          "ContractSignDate": null,
          "ContractEndDate": "24.07.2018"
        }
      },
      {
        "Employer": {
          "TaxNumber": "1004136861",
          "Name": "\"GLOBAL SUPPLY TRADE COMPANY\" MƏHDUD MƏSULİYYƏTLİ CƏMİYYƏTİ"
        },
        "EmployeeInfo": {
          "WorkPlaceType": "Əsas",
          "Position": "Dizayner, mebel",
          "PositionLaborContract": null,
          "MonthlySalary": "173",
          "ContractBeginDate": "26.04.2018",
          "ContractSignDate": null,
          "ContractEndDate": "24.04.2018"
        }
      },
      {
        "Employer": {
          "TaxNumber": "1004136861",
          "Name": "\"GLOBAL SUPPLY TRADE COMPANY\" MƏHDUD MƏSULİYYƏTLİ CƏMİYYƏTİ"
        },
        "EmployeeInfo": {
          "WorkPlaceType": "Əsas",
          "Position": "Dizayner, mebel",
          "PositionLaborContract": null,
          "MonthlySalary": "173",
          "ContractBeginDate": "04.04.2018",
          "ContractSignDate": null,
          "ContractEndDate": "24.04.2018"
        }
      }
    ]
  }
}';

$p=json_decode($asan, true);
echo "<pre>";
print_r($p);

$response = $asan['Response'];
$person = $response['Person'];
$company = $response['Company'];
$farms = $response['Farms'];


?>
