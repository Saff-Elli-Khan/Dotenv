<?php

namespace Dotenv\DotenvOptions;

use Dotenv\Dotenv\Dotenv;

class DotenvOptions
{
    private
        $Dotenv = NULL,
        $requireds = [];

    public function __construct(Dotenv $Dotenv)
    {
        $this->Dotenv = $Dotenv;
    }

    public function required($required)
    {
        $this->requireds = [];
        if (is_array($required)) {
            if (!empty($required)) {
                foreach ($required as $var) {
                    if (!isset($_ENV[$var])) {
                        return $this->Dotenv->error("Variable ($var) Not Found!");
                    } else {
                        $this->requireds[$var] = $_ENV[$var];
                    }
                }
            }
            return $this;
        } else {
            if (isset($_ENV[$required])) {
                $this->requireds[$required] = $_ENV[$required];
                return $this;
            } else {
                return $this->Dotenv->error("Variable ($required) Not Found!");
            }
        }
    }

    public function is_ip()
    {
        if (!empty($this->requireds)) {
            foreach ($this->requireds as $key => $value) {
                if (!filter_var($value, FILTER_VALIDATE_IP)) {
                    $this->Dotenv->error("Variable ($key) Is Not A Valid IP!");
                }
            }
            return $this;
        } else {
            $this->Dotenv->error("No Required Variables Found!");
        }
    }

    public function not_empty()
    {
        if (!empty($this->requireds)) {
            foreach ($this->requireds as $key => $value) {
                if (empty($value)) {
                    $this->Dotenv->error("Variable ($key) Is Empty!");
                }
            }
            return $this;
        } else {
            $this->Dotenv->error("No Required Variables Found!");
        }
    }

    public function is_empty()
    {
        if (!empty($this->requireds)) {
            foreach ($this->requireds as $key => $value) {
                if (!empty($value)) {
                    $this->Dotenv->error("Variable ($key) Is Not Empty!");
                }
            }
            return $this;
        } else {
            $this->Dotenv->error("No Required Variables Found!");
        }
    }

    public function is_match(string $pattern)
    {
        if (!empty($this->requireds)) {
            foreach ($this->requireds as $key => $value) {
                if (!preg_match($pattern, $value)) {
                    $this->Dotenv->error("Variable ($key) Doesn't Match The Given Pattern!");
                }
            }
            return $this;
        } else {
            $this->Dotenv->error("No Required Variables Found!");
        }
    }

    public function is_url()
    {
        if (!empty($this->requireds)) {
            foreach ($this->requireds as $key => $value) {
                if (!filter_var($value, FILTER_VALIDATE_URL)) {
                    $this->Dotenv->error("Variable ($key) Is Not A Valid URL!");
                }
            }
            return $this;
        } else {
            $this->Dotenv->error("No Required Variables Found!");
        }
    }

    public function is_userName()
    {
        if (!empty($this->requireds)) {
            foreach ($this->requireds as $key => $value) {
                if (!preg_match('/^[a-zA-Z0-9]{4,}$/', $value)) {
                    $this->Dotenv->error("Variable ($key) Is Not A Valid User Name!");
                }
            }
            return $this;
        } else {
            $this->Dotenv->error("No Required Variables Found!");
        }
    }

    public function is_contact(bool $number = false)
    {
        if (!empty($this->requireds)) {
            foreach ($this->requireds as $key => $value) {
                if ($number && !is_numeric($value)) {
                    $this->Dotenv->error("Variable ($key) Is Not Numuric!");
                } else if (strlen($value) < 9 || strlen($value) > 14) {
                    $this->Dotenv->error("Variable ($key) Is Not A Valid Contact!");
                }
            }
            return $this;
        } else {
            $this->Dotenv->error("No Required Variables Found!");
        }
    }

    public function is_email()
    {
        if (!empty($this->requireds)) {
            foreach ($this->requireds as $key => $value) {
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->Dotenv->error("Variable ($key) Is Not An Email!");
                }
            }
            return $this;
        } else {
            $this->Dotenv->error("No Required Variables Found!");
        }
    }

    public function is_string()
    {
        if (!empty($this->requireds)) {
            foreach ($this->requireds as $key => $value) {
                if (!is_string($value)) {
                    $this->Dotenv->error("Variable ($key) Is Not A String!");
                }
            }
            return $this;
        } else {
            $this->Dotenv->error("No Required Variables Found!");
        }
    }

    public function is_numeric()
    {
        if (!empty($this->requireds)) {
            foreach ($this->requireds as $key => $value) {
                if (!is_numeric($value)) {
                    $this->Dotenv->error("Variable ($key) Is Not A Number!");
                }
            }
            return $this;
        } else {
            $this->Dotenv->error("No Required Variables Found!");
        }
    }

    public function is_integer()
    {
        if (!empty($this->requireds)) {
            foreach ($this->requireds as $key => $value) {
                if (!is_int($value)) {
                    $this->Dotenv->error("Variable ($key) Is Not An Integer!");
                }
            }
            return $this;
        } else {
            $this->Dotenv->error("No Required Variables Found!");
        }
    }

    public function is_float()
    {
        if (!empty($this->requireds)) {
            foreach ($this->requireds as $key => $value) {
                if (!filter_var($value, FILTER_VALIDATE_FLOAT)) {
                    $this->Dotenv->error("Variable ($key) Is Not A Float!");
                }
            }
            return $this;
        } else {
            $this->Dotenv->error("No Required Variables Found!");
        }
    }
}
