<?php
class Image extends Normal
{
    private $image;
    private $route;
    function __construct($header, $subheader, $slidetype, $slidenum, $text, $image, $route)
    {
        parent::__construct($header, $subheader, $slidetype, $slidenum, $text);
        $this->image = $image;
        $this->route = $route;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function setImage($image)
    {
        $this->image = $image;
    }


    public function getRoute()
    {
        return $this->route;
    }
    public function setRoute($route)
    {
        $this->route = $route;
    }
}
