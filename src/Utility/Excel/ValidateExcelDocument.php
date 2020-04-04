<?php


namespace App\Utility\Excel;


class ValidateExcelDocument
{
    const ACCEPTED_MIME_TYPES = [
        'text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'application/vnd.ms-excel',
        'application/x-csv',
        'text/x-csv',
        'text/csv',
        'application/csv',
        'application/excel',
        'application/vnd.msexcel',
        'text/plain',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    public static function isMimeTypeIsSupported($mediaType)
    {
        return in_array($mediaType, ValidateExcelDocument::ACCEPTED_MIME_TYPES);
    }

    public static function hasExpectedColumns($sheetDataKey = [], $matchExpectedColumns = [])
    {
        if(empty($sheetDataKey) || count($sheetDataKey) != count($matchExpectedColumns)) {
            return false;
        }
        return true;
    }
}
