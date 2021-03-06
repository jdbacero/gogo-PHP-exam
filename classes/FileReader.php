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
        // So that the previous output file wont be overwritten
        $ctr = 0;
        $filename = "csvoutput.csv";
        while (file_exists($filename)) {
            $filename = "csvoutput{$ctr}.csv";
            $ctr++;
        }

        // Create csv based on array
        $fp = fopen($filename, 'wb');

        // Make it UTF-8
        fprintf($fp, chr(0xEF) . chr(0xBB) . chr(0xBF));

        foreach ($array as $fields) {
            fputcsv($fp, $fields);
        }

        fclose($fp);
    }
}
