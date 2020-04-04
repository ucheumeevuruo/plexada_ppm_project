<?php


namespace App\Utility\Excel;


class UploadValidation
{
    const DEFAULT_MAX_SIZE = 10000000;
    const DEFAULT_MIN_SIZE = 2000;
    private $minSize;
    private $maxSize;
    private $size;
    private $error;

    public final function __construct($error, $size, $minSize = self::DEFAULT_MIN_SIZE, $maxSize = self::DEFAULT_MAX_SIZE)
    {
        $this->minSize = $minSize;
        $this->maxSize = $maxSize;
        $this->size = $size;
        $this->error = $error;
    }

    public function isUnderPhpSizeLimit()
    {
        return $this->error !== UPLOAD_ERR_INI_SIZE;
    }

    public function isUnderFormSizeLimit()
    {
        return $this->error !== UPLOAD_ERR_FORM_SIZE;
    }

    public function isMinSize()
    {
        return ($this->minSize >= $this->size);
    }

    public function isMaxSize()
    {
        return ($this->size > $this->maxSize);
    }

}
