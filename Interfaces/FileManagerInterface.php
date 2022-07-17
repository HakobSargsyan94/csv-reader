<?php
/**
 * Copyright © Hakob Sargsyan, All rights reserved.
 * Hakob Sargsyan <hakobsargsyan94@gmail.com>
 */

/**
 * Interface CsvInterface
 */
interface FileManagerInterface
{
    /**
     * @return mixed
     */
    public function openFile();

    /**
     * @return mixed
     */
    public function getFile();

    /**
     * @return mixed
     */
    public function close();
}
