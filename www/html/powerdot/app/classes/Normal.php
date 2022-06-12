<?php
include('Image.php');
class Normal extends Portada
{
    private $text;
    function __construct($header, $subheader, $slidetype, $slidenum, $text)
    {
        parent::__construct($header, $subheader, $slidetype, $slidenum);
        $this->text = $text;
    }
    public function getText()
    {
        return $this->text;
    }
    public function setText($text)
    {
        $this->text = $text;
    }
}