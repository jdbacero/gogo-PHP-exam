<?php

class FileReader
{
    protected $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public static function csvToArr($file)
    {
        $rows   = array_map('str_getcsv', file($file));
        $header = array_shift($rows);
        $csv    = array();
        foreach ($rows as $row) {
            $csv[] = array_combine($header, $row);
        }
        return $csv;
    }

    public static function getCSV()
    {
        $file = "";
        while (!file_exists($file)) {
            if ($file == "exit") {
                exit();
            }
            $file = readline("Select CSV: ");

            if (!file_exists($file)) {
                echo "CSV file does not exist.\n";
            }
        }
        return $file;
    }

    public static function saveCSV($array)
    {
        $fp = fopen('output.csv', 'wb');

        foreach ($array as $fields) {
            fputcsv($fp, $fields);
        }

        fclose($fp);
    }
}
