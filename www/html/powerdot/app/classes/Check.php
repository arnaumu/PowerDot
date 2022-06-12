<?php
include('Portada.php');
class Check
{
    private $slideNum = 0;
    private $head;
    private $subhead;
    private $content;
    private $type;
    private $image;
    private $route = "../pictures/";

    function checkContent($txtAreaContent)
    {
    
        if(empty($txtAreaContent)) {
            echo "Empty string";
            return false;
        }
        else {
        //Devuelve separado por los saltos de linea.
        $result = preg_split('[\n]', $txtAreaContent);
        $slides = array();
        for ($i = 0; $i < sizeof($result); $i++) {

            $x = $result[$i];

            if (substr($x, 0, 1) == "[") {
                $this->type = trim(substr($x, 1, -2));
            } else if (substr($x, 0, 1) == ">") {

                switch ($this->type) {
                    case 'cover':
                        $slide = new Portada($this->head, $this->subhead, $this->type, $this->slideNum);
                        array_push($slides, $slide);
                        break;
                    case 'normal':
                        $slide = new Normal($this->head, $this->subhead, $this->type, $this->slideNum, $this->content);
                        array_push($slides, $slide);
                        break;
                    case 'image':
                        $slide = new Image($this->head, $this->subhead, $this->type, $this->slideNum, $this->content, $this->image, $this->route);
                        array_push($slides, $slide);

                }
                $this->slideNum++;
            } else if (substr($x, 0, 2) == "==") {
                $this->subhead = substr($x, 2, strlen($x));
            } else if (substr($x, 0, 1) == "/") {
                $this->content = substr($x, 1, strlen($x));
            } else if (substr($x, 0, 1) == "*") {
                $this->image = substr($x, 1, strlen($x));
            } else if (substr($x, 0, 1) == "=") {
                $this->head = substr($x, 1, strlen($x));
            }
        }
        return $slides;
        }
    }
}
