<?php


namespace App\Utility\Excel\Handlers;

abstract class AbstractHandler
{
    protected $filename;
    protected $fileSize;
    protected $fileSrc;
    protected $mediaType;
    protected $stream;
    protected $error;

    const __SLUG = 'upload';

    /**
     * @param $filename
     * @param $file_size
     * @param $media_type
     * @param $file_location
     * @param null $error
     * @param null $stream
     */
    public function __construct($filename, $file_size, $media_type, $file_location, $error = null, $stream = null)
    {
        $this->filename = $filename;
        $this->fileSize = $file_size;
        $this->mediaType = $media_type;
        $this->fileSrc = $file_location;
        $this->stream = $stream;
    }

    /**
     * @throws ExcelDocumentException
     */
    abstract protected function validate();

    abstract protected function import();

    abstract protected function export();

    /**
     * @throws ExcelDocumentException
     */
    public function handleImport()
    {
        $this->validate();
        return $this->import();
    }

    public function handleExport()
    {
        $this->validate();
        return $this->export();
    }

    public function __extract_error($upload_errors)
    {
        $error = "There were some error(s) that occurred.\n";
        foreach ($upload_errors as $key => $errors)
        {
            $error .= sprintf("%d) An error has occurred at line (%s) of the document\n[\n\t%s\n]\n",
                $key + 1, $errors['row_id'], self::__getErrors($errors['errors']));
        }
        return ['error' => $error];
    }

    private function __getErrors($errors = [])
    {
        $error = "";
        foreach ($errors as $column => $value)
        {
            if(is_array($value))
            {
                $error .= sprintf("%s =>\n\t\t %s", $column, self::__getErrors($value));
            }else if(!is_null($value)){
                $error .= sprintf("%s: %s", $column, $value);
            }
        }
        return $error;
    }
}