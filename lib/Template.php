<?php
class Template{

    //path to template
    protected $template;

    // var passin
    protected $vars = array();

    //constractor
    public function __construct($template){
        $this->template = $template;

        $this->vars['user'] = null;
        

        if(!empty($_SESSION['user'])) {
            $this->vars['user'] = $_SESSION['user'];
        }
    }

    public function __get($key){
        return $this->vars[$key];
    }

    public function __set($key, $value){
        $this->vars[$key] = $value;
    }

    public function __toString(){
        extract($this->vars);

        chdir(dirname($this->template));
        ob_start();

        include basename($this->template);

        return ob_get_clean();
    }
}

?>