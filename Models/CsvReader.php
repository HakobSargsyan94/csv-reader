<?php
/**
 * Copyright © Hakob Sargsyan, All rights reserved.
 * Hakob Sargsyan <hakobsargsyan94@gmail.com>
 */

require_once "Interfaces/FileManagerInterface.php";

/**
 * Class CsvReader
 */
class CsvReader implements FileManagerInterface
{
    /**
     * @var array $fileArr
     */
    private $fileArr = [];

    /**
     * @var $file
     */
    private $file;

    /**
     * @var $mode
     */
    private $mode;

    /**
     * Csv constructor.
     * @param $filename
     * @param $mode
     */
    public function __construct(
        $filename,
        $mode
    ) {
        $this->file = $filename;
        $this->mode = $mode;
    }

    /**
     * @return false|mixed|resource
     */
    public function openFile() {
        return $file = $this->file = fopen($this->file, $this->mode);
    }

    /**
     * @return array|mixed
     */
    public function getFile() {
        $file = $this->openFile();

        if (!$file) {
            die('The system can not open file!');
        }

        for ($i = 0; $row = fgetcsv($file); ++$i) {
            $this->fileArr[$i] = $row;
        }

        return $this->fileArr;
    }

    /**
     * @return mixed|void
     */
    public function close() {
        fclose($this->file);
    }
}