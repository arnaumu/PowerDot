<?php
class SlideStatus
{
    private $allSlides = array();
    private $currentSlide;
    
    function __construct($currentSlide, $allSlides)
    {
        $this->currentSlide = $currentSlide;
        $this->allSlides = $allSlides;
    }
    public function setCurrentSlide($slideNum)
    {
        return $this->currentSlide = $slideNum;
    }
    public function getAllSlides()
    {
        return $this->allSlides;
    }
    public function getCurrentSlide()
    {
        return $this->allSlides[$this->currentSlide];
    }
}