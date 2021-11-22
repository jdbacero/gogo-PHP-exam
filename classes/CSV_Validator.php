<?php

class CSV_Validator
{
    protected $csv;

    public function __construct($csv)
    {
        $this->csv = $csv;
    }

    public function getArr()
    {
        $rows   = array_map('str_getcsv', file($this->csv));
        $header = array_shift($rows);
        $csv    = array();
        foreach ($rows as $row) {
            $csv[] = array_combine($header, $row);
        }
        return $csv;
    }

    public function validateId($id)
    {
        $id = (int) $id;
        if (empty($id)) {
            return "Error required";
        } else if (!is_int($id)) {
            return "Error format";
        }

        return $id;
    }

    public function validateName($name)
    {
        if (empty($name)) {
            return "Error required";
        } else if (strlen($name) > 100) {
            return "Error limit over";
        }

        return $name;
    }

    public function validatePhone($phone)
    {
        if (empty($phone)) {
            return "Error required";
        } else if (strlen($phone) > 11) {
            return "Error format";
        }
        return $phone;
    }

    public function validateGender($gender)
    {
        if ($gender == "male" || $gender = "female" || empty($gender)) {
            return $gender;
        }
        return "Error format";
    }

    public function validateDate($date)
    {
        if (empty($date)) {
            return "Error required";
        } else if (strtotime($date)) {
            return $date;
        }
        return "Error format";
    }

    // public function mandatory($value)
    // {
    //     if (empty($value)) {
    //         return "Error required";
    //     } else {
    //         return $value;
    //     }
    // }
}
