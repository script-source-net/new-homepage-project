<?php


class sArticleMain extends sConstrMain
{
    private $title, $content, $image, $imagefolder;

    public function __construct($a="generatedTitle", $b="Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                        sed diam nonumy eirmod tempor invidunt ut labore et dolore
                        magna aliquyam erat, sed diam voluptua. At vero eos et accusam
                        et justo duo dolores et ea rebum. Stet clita kasd gubergren, no
                        sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem
                        ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                        tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                        At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
                        kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.", $c="test.jpg")
    {
        $this->title=$a;
        $this->content=$b;
        $this->image=$c;
        $this->imagefolder=sConstrMain::getImageFolder();

    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }
    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
    /**
     * @param string $content
     */
    public function setContent(string $content)
    {
        $this->content = $content;
    }
    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image)
    {
        $this->image = $image;
    }
    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    public function getArticleImageFolder(){
        return $this->imagefolder."articles/";
    }

    private function getArticleBody($a,$b,$c){
        $d = sArticleMain::getArticleImageFolder();
        return '<article class="article">
                    <h2>'.$a.'</h2>
                    <div class="articleImageContainer">
                        <img src="'.$d.$b.'">
                    </div>
                    <p>'.$c.'</p>
                </article>';
    }
    public function createArticle(){
        return $this->getArticleBody(sArticleMain::getTitle(), sArticleMain::getImage(), sArticleMain::getContent());
    }







}