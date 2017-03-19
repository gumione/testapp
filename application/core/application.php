<?php

class Application
{
    /** @var null controller */
    private $url_controller = null;

    /** @var null action */
    private $url_action = null;

    /** @var array args */
    private $url_params = array();
    
    
    /**
     * parse URL, callin' controller/method/args
     */
    public function __construct()
    {
        // explode URL
        $this->splitUrl();

        // if no controller callin' default
        if (!$this->url_controller) {
            $controller = DEFAULT_CONTROLLER;
            require_once APP . 'controller/' . $controller . '.php';
            $page = new $controller();
            $page->index();

        } elseif (file_exists(APP . 'controller/' . $this->url_controller . '.php')) {
            // if controller exists
            
            //loading controller
            require_once APP . 'controller/' . $this->url_controller . '.php';
            $this->url_controller = new $this->url_controller();

            // if method exists
            if (method_exists($this->url_controller, $this->url_action)) {

                if (!empty($this->url_params)) {
                    // calling method and pass arguments to it
                    call_user_func_array(array($this->url_controller, $this->url_action), $this->url_params);
                } else {
                    // if no args just calling method
                    $this->url_controller->{$this->url_action}();
                }

            } else {
                if (strlen($this->url_action) == 0) {
                    // if no action calling index of our controller
                    $this->url_controller->index();
                } else {
                    throw new Exception("Can't find action {$this->url_action}");
                }
            }
        } else {
            throw new Exception("Can't load controller file controllers/{$this->url_controller}");
        }
    }

    /**
     * Get and explode the URL
     */
    private function splitUrl()
    {
        if (isset($_GET['url'])) {

            // exploding URL
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            // putting the parts to properties
            $this->url_controller = isset($url[0]) ? $url[0] : null;
            $this->url_action = isset($url[1]) ? $url[1] : null;

            // Removing controller and action from URL
            unset($url[0], $url[1]);

            $this->url_params = array_values($url);
        }
    }
}
