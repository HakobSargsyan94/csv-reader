<?php
/**
 * Copyright © Hakob Sargsyan, All rights reserved.
 * Hakob Sargsyan <hakobsargsyan94@gmail.com>
 */

require_once 'Models/CsvReader.php';


class JsonInserter extends CsvReader
{
    /**
     * @const FILE_PATH_TO_WRITE
     */
    const FILE_PATH_TO_WRITE = __DIR__ . '\..\media\output.json';

    /**
     * @var array $jsonData
     */
    private $jsonData = [];

    /**
     * JsonInserter constructor.
     *
     * @param string $filename
     * @param string $mode
     */
    public function __construct(
        $filename,
        $mode
    ) {
        parent::__construct($filename, $mode);
    }

    /**
     * @param array $resArr
     * @param array $children
     * @return array
     */
    public function jsonInsert($resArr = [], $children = []) {
        foreach ($resArr as $key => $item) {
            $rowValue = explode(";", current($item));
            /*if (!empty($children)) {
                $this->jsonData[$key]['children']['itemName'] = $rowValue[0];
                $this->jsonData[$key]['children']['parent'] = $rowValue[2];
                $this->jsonData[$key]['children']['children'] = [];
            } else {*/
                if (empty($rowValue[2])) {
                    $this->jsonData[$key]['itemName'] = $rowValue[0];
                    $this->jsonData[$key]['parent'] = $rowValue[2];
                    $this->jsonData[$key]['children'] = [];
                } /*else {
                    $this->jsonInsert($resArr, $this->jsonData[$key]['children']);
                }*/
            }
//        }

        return $this->jsonData;
    }

    /**
     * @return bool
     */
    public function execute() {
        try {
            $result = $this->getFile();
            $fileInsertData = $this->jsonInsert($result);

            if (file_exists(self::FILE_PATH_TO_WRITE)) {
                file_put_contents(self::FILE_PATH_TO_WRITE, json_encode($fileInsertData));

                return true;
            }
            file_put_contents(self::FILE_PATH_TO_WRITE, json_encode($fileInsertData));

            return true;
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}