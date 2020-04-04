<?php


namespace App\Utility\Excel;


use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ExcelDocument
{

    const FILE_EXTENSION_CSV = 'csv';
    const FILE_EXTENSION_XLS = 'xls';
    const FILE_EXTENSION_XLSX = 'xlsx';
    const INVALID_FILE_FORMAT = 'File format is invalid.';
    const ONE_OR_MORE_COLUMN_MISSING = 'One or more column(s) missing in sheet.';
    private $filename;
    private $location;
    private static $spreadSheet;
    private $matchExpectedColumns;
    private $sheetColumn = [];

    public function __construct($filename, $location, $matchExpectedColumns)
    {
        $this->filename = $filename;
        $this->location = $location;
        $this->matchExpectedColumns = $matchExpectedColumns;
    }

    private static function getReader($filename)
    {
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        if($extension == self::FILE_EXTENSION_CSV){
            return new Csv();
        } elseif($extension == self::FILE_EXTENSION_XLSX) {
            return new Xlsx();
        } elseif($extension == self::FILE_EXTENSION_XLS) {
            return new Xls();
        }

        return;
    }

    public function getDocumentReader()
    {
        $reader = self::getReader($this->filename);

        if($reader == null)
        {
            // Report to the user that the document extension is not valid
            throw new ExcelDocumentException(self::INVALID_FILE_FORMAT);
        }

        return $reader;
    }

    public function getSpreadSheet()
    {

        if(self::$spreadSheet == null)
        {
            self::$spreadSheet = $this->getDocumentReader()
                ->load($this->location);
        }

        return self::$spreadSheet;
    }

    public function listDataInSheet()
    {
        $allDataInSheet = $this->getSpreadSheet()
            ->getActiveSheet()
            ->toArray(
                null,
                true,
                true,
                true
            );

        return $allDataInSheet;
    }

    public function sheetColumns($dataInSheet = [])
    {
        foreach ($dataInSheet as $key => $value)
        {
            if (in_array(trim($value), $this->matchExpectedColumns)) {
                foreach ($this->matchExpectedColumns as $columnName => $columnValue)
                {
                    if($columnValue == $value && is_string($columnName))
                    {
                        $value = $columnName;
                        break;
                    }
                }
                $value = preg_replace('/\s+/', '_', $value);
                $this->sheetColumn[trim($value)] = $key;
            }
        }

        return $this->sheetColumn;

    }

    public function sheetRows($dataInSheet)
    {
        $fetchData = [];

        if(!ValidateExcelDocument::hasExpectedColumns($this->sheetColumn, $this->matchExpectedColumns))
        {
            throw new ExcelDocumentException(self::ONE_OR_MORE_COLUMN_MISSING);
        }

        for ($row = 2; $row <= count($dataInSheet); $row++) {
            $data = [];

            $data['row_id'] = $row;
            foreach ($this->sheetColumn as $key => $column) {
                $data[strtolower($key)] = filter_var(trim($dataInSheet[$row][$column]));
            }

            array_push($fetchData, $data);
        }
        return $fetchData;
    }
}
