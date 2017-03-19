<?php

class Admin extends Controller
{
    public function init() {
        $this->loadModel('comments');
               
    }
    
    public function login() {
        if(!empty($_POST)) {
            if($_POST['username'] == 'admin' && $_POST['password'] == '123') {
                $_SESSION['logged_in'] = true;
                Header('location: /admin/index');
            } else {
                $result['action_result'] = array('result' => 'danger', 'data' => 'Неверное имя пользователя или пароль');
            }
        } else {
            $result = array();
        }
        $this->layout = $this->loadView('_templates/auth_layout'); 
        $view = $this->loadView('admin/login');
        $this->layout->render(array('content' => $view->fetch($result)));
    }
    
    public function index()
    {
        if(!isset($_SESSION['logged_in']) OR $_SESSION['logged_in'] == false) header('Location: /admin/login');
        
        $result['comments'] = $this->comments_model->getAll(true);
        $this->layout = $this->loadView('_templates/admin_layout'); 
        $view = $this->loadView('admin/comments');
        $this->layout->render(array('content' => $view->fetch($result)));
    }
    public function approve($comment)
    {
        if($this->comments_model->approveComment($comment)) {
                header('Location: /admin/');
            }
    }
    public function decline($comment)
    {
        if($this->comments_model->declineComment($comment)) {
                header('Location: /admin/');
            }
    }
    public function edit($comment)
    {
        if(!isset($_SESSION['logged_in']) OR $_SESSION['logged_in'] == false) header('Location: /admin/login');
        
        if(empty($_POST)) {
            $result['item'] = $this->comments_model->getOne($comment);
            $this->layout = $this->loadView('_templates/admin_layout');
            $view = $this->loadView('admin/comment_edit');
            $this->layout->render(array('content' => $view->fetch($result)));
        } else {
            if($this->comments_model->updateComment($comment, $_POST)) {
                header('Location: /admin/');
            }
        }
    }
}
