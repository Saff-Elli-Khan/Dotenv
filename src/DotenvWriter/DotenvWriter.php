<?php

namespace Dotenv\DotenvWriter;

use Dotenv\Dotenv\Dotenv;

class DotenvWriter
{
    private
        $Dotenv = NULL;

    public function __construct(Dotenv $Dotenv)
    {
        $this->Dotenv = $Dotenv;
    }

    public function put()
    {
        $data = $this->Dotenv->parsedContent();
        $content = "";
        foreach ($data as $key => $value) {
            if ($value === NULL) {
                $content .= "#" . $key . "\n";
            } else {
                $content .= "$key=$value\n";
            }
        }
        $put = file_put_contents($this->Dotenv->file_path, $content);
        if ($put === FALSE) {
            $this->Dotenv->error("We Are Unable To Put Variables Into ENV!");
        } else {
            return $this;
        }
    }
}
