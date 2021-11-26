<?php


class sNavMain
{
    public function __constructor(){

    }

    private function getSitesFolder(){
        return "/sites/";
    }
    /**
     * @return array|false
     */
    private function getNavArray(){
        return ["/index.php" => "Home",
            $this->getSitesFolder()."service.php" => "Service",
            $this->getSitesFolder()."impressum.php" => "Impressum",
            $this->getStringServiceFolder()."index.php" => "String Service",
            $this->getSitesFolder()."testings.php" => "Testing"];
    }
    public function generateNav(){
        $outString = "<ul>";
        foreach ($this->getNavArray() as $nav=> $title) {
            $outString .= "<li><div class='navButton' id='buttons'><a href='$nav' class='$title'>$title</a></div></li></li>";
        }
        $outString .= "</ul>";
        return $outString;
    }

    private function readSites(){
        $navList[] = new ArrayObject();
        if(is_dir(sNavMain::getSitesFolder())){
            if($dh = opendir(sNavMain::getSitesFolder())){
                while (($file = readdir($dh)) != false){
                    $navList.add($file);
                }
            }
        }
        return $navList;
    }

    private function getStringServiceFolder(){
        return "/StringService/";
    }



}