<?php
include('Normal.php');
class Portada
{
    private $header;
    private $subheader;
    private $slidetype;
    private $slidenum;
    function __construct($header, $subheader, $slidetype, $slidenum)
    {
        $this->header = $header;
        $this->subheader = $subheader;
        $this->slidetype = $slidetype;
        $this->slidenum = $slidenum;
    }
    public function getHeader()
    {
        return $this->header;
    }
    public function getSubheader()
    {
        return $this->subheader;
    }
    public function getSlidetype()
    {
        return $this->slidetype;
    }
    public function getSlidenum()
    {
        return $this->slidenum;
    }
}