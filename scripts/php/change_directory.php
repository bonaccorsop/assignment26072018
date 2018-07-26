<?php

class InvalidDirectoryException extends Exception {};

class Path
{
    public $currentPath;
    const DIRSEP = DIRECTORY_SEPARATOR;

    public function __construct(string $path = self::DIRSEP)
    {
        $this->currentPath = $path;
    }

    public function cd(string $path) : void
    {
        // check for starting from the root
        if(substr($path, 0, 1) === self::DIRSEP) {
            $this->currentPath = '';
        }

        foreach(explode(self::DIRSEP, $path) as $key => $dir) {
            if($dir === '.') {
                continue;
            } elseif($dir === '..') {
                $this->goBack();
            } else {
                $this->goForward($dir);
            }
        }

        $this->currentPath = self::DIRSEP . $this->currentPath;

    }

    private function goBack() : void
    {
        $arr = explode(self::DIRSEP, $this->currentPath);
        array_pop($arr);
        $this->currentPath = implode(self::DIRSEP, $arr);
    }

    private function goForward($dir) : void
    {
        if(! $this->isValidDir($dir)) {
            throw new InvalidDirectoryException("\"$dir\" is an invalid directory!");
        }

        $arr = explode(self::DIRSEP, $this->currentPath);
        array_push($arr, $dir);

        // remove empty values from array
        $arr = array_filter($arr, function($v) {
            return ! empty($v);
        });

        $this->currentPath = implode(self::DIRSEP, $arr);
    }

    private function isValidDir($dir) : bool
    {
        preg_match("/^[A-Za-z]*$/", $dir, $out);
        return count($out) === 1;
    }

}




