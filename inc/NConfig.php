<?php
class NConfig {

    public $filepath;
    public $json = [];//as assoc array object

    public function __construct($filepath)
    {
        $this->filepath = $filepath;
    }

    public function save(){
        $fp = fopen($this->file_name(), 'w');
        // $fp = fopen(__DIR__.'/'.$this->file_name(), 'w');
        fwrite($fp, json_encode($this->json));
        fclose($fp);
    }

    public function read($defaultvalue = []){
        try {
            $file = @file_get_contents($this->file_name());
            // $file = @file_get_contents(__DIR__.'/'.$this->file_name());
            if(!$file || empty($file)) {
                $this->json = $defaultvalue;
                return false;
            };
            $this->json = json_decode( $file, true );
        } catch (\Throwable $th) {
            $this->json = $defaultvalue;
        }
        return $this->json;
    }

    public function file_name(){
        return $this->filepath;
        // return $this->filepath.'.'.$this->user.'.ignore.json';
    }


} 