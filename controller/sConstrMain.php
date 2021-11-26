<?php
include "sNavMain.php";
include "sArticleMain.php";
class sConstrMain
{
    private $siteTitle;
    private $bodyClass;
    private $header;
    private $folders;

    public function __construct($bodyClass="gen", $header="genHeader", $siteTitle = "Script-Source NET")
    {
        $this->bodyClass = $bodyClass."site";
        $this->header = $header;
        $this->setSiteTitle($siteTitle);
        $this->setFolders();
     }

    /**
     * @param $siteTitle
     */
    private function setSiteTitle($siteTitle)
    {
        $this->siteTitle = $siteTitle;
    }

    private function setFolders()
    {
        $this->folders = $this->getConfig()['folders'];
    }
    private function getFolders()
    {
        return sConstrMain::getConfig()['folders'];
    }
    private function getSQL($a)
    {
        return sConstrMain::getConfig()['dbcredentials'][$a];
    }

    /**
     * @return mixed
     */public function getBodyClass()
    {
        return $this->bodyClass;
    }

    /**
     * @return mixed
     */
    public function getSiteTitle()
    {
        return $this->siteTitle;
    }

    /**
     * @return mixed
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * @return string
     */
    public function getImportFolder()
    {
        return $this->getFolders()['imports'];
        //return '/imports/';
    }

    /**
     * @return string
     */
    public function getStyleFolder()
    {
        return sConstrMain::getFolders()['style'];
        //return '/style/';
    }

    /**
     * @return mixed
     */
    public function getImageFolder()
    {
        return sConstrMain::getFolders()['images'];
        //return $this->folders['images'];
    }

    public function getDbCredentials($a){
        return $this->getSQL($a);
    }

    /**
     * @return string
     */
    public function getNavigation()
    {
        $nav = new sNavMain();
        return $nav->generateNav();
    }


    /**
     * @return string
     */
    private function getHtmlStart(){
        return '<!DOCTYPE html>
                    <html lang="de">';
    }

    /**
     * @return string
     */
    private function getHtmlEnd(){
        return '</div>
                </div>                
                </div>
                </div> 
                </div>
                </body>
                </html>';
    }

    /**
     * @return string
     */
    private function getHead(){
        return '<head>
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta charset="UTF-8">
                    <link rel="stylesheet" href="'.sConstrMain::getStyleFolder().'stylesheet.css">
                    <title>'.sConstrMain::getSiteTitle().'</title>
                </head>';
    }

    /**
     * @return string
     */
    private function getHtmlBody(){
        return '<body class="'.sConstrMain::getBodyClass().'">
                <div class="container">
                <header class="header">
                '.sConstrMain::getHeader().'
                </header>   
                <div class="siteContent">
                    <nav class="nav">
                    '.sConstrMain::getNavigation().'    
                </nav>
                <div class="mainContent">
                    <div class="content">';
    }

    /**
     *
     */
    public function getSiteBeginning(){
        echo $this->getHtmlStart() . $this->getHead() . $this->getHtmlBody();
    }

    /**
     *
     */
    public function getSiteEnd(){
        echo $this->getHtmlEnd();
    }

    /**
     * @return array|false
     */
    private function getConfig()
    {
        $folder = $_SERVER["DOCUMENT_ROOT"]."/config/";
        $file = 'config.inc.php';
        if(file_exists($folder.$file)){
            $dh = parse_ini_file($folder.$file,1);
            return $dh;
        } else {
            echo "Fehler beim lesen der Datei!";
        }

    }

}
