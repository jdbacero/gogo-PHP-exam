<?php

require 'classes/FileReader.php';
require 'classes/CSV_Validator.php';

$file = "";

// Get CSV
$file = FileReader::getCSV();

// Get data to array
$validator = new CSV_Validator($file);
$csv_array = $validator->getArr();

// Get all data and put it in array
$output = [
    ['id', 'name', 'birthday', 'gender', 'phone-number']
];

foreach ($csv_array as $data) {
    $output[] = [
        $validator->validateId($data["id"]),
        $validator->validateName($data["name"]),
        $validator->validateDate($data["birthday"]),
        $validator->validateGender($data["gender"]),
        $validator->validatePhone($data["phone-number"])
    ];
}

FileReader::saveCSV($output);
