<?php

class View implements ArrayAccess
{
    /**
     * @var string view file
     */
    private $file;

    /** 
     * @var array view data
     */
    private $data;

    public function __construct($file)
    {
        $this->file = $file;
    }
    
    public function render($data)
    {
        $this->data = $data;

        ob_start();

        include ($this->file);
        
        ob_end_flush();
        
    }

    public function fetch($data)
    {
        ob_start();
        $this->render($data);
        return ob_get_clean();
    }

    public function get_data()
    {
        return $this->data;
    }

    /* ArrayAccess methods */
    public function offsetExists($offset)      { return isset($this->data[$offset]); }
    public function offsetGet($offset)         { return $this->data[$offset]; }
    public function offsetSet($offset, $value) { $this->data[$offset] = $value; }
    public function offsetUnset($offset)       { unset($this->data[$offset]); }

}