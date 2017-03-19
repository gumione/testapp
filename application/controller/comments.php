<?php

class Comments extends Controller
{
    public function init() {
        $this->loadModel('comments');
        $this->layout = $this->loadView('_templates/layout');
    }
    
    public function index($sort = 'date', $direction = 'desc')
    {
        if(!empty($_POST)) {
            $data = $_POST;
            //validation
            if(empty($data['username'])) {
                $result['validation_errors']['username'] = 'Не введено имя';
            }
            if(empty($data['email']) OR !  filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $result['validation_errors']['email'] = 'Введён неверный email-адрес';
            }
            
            if($_FILES['file']['size'] !== 0) {
                $valid_types = array("image/jpeg", "image/gif", "image/png");
            
                if(in_array($_FILES['file']['type'], $valid_types)) {
                    $image = new ImageFile($_FILES['file']['name'], $_FILES['file']['tmp_name']);
                    $image->resizeImage('320');
                    $data['image'] = $image->image;
                } else {
                    $result['validation_errors']['file'] = 'Разрешены только изображения jpg, gif, png';
                }
            }
            
            if(empty($data['text'])) {
                $result['validation_errors']['text'] = 'Не введён текст комментария';
            }
            
            if(empty($result['validation_errors'])) {
                if($this->comments_model->addComment($data)) { 
                    $result['action_result'] = array('result' => 'success', 'data' => 'Ваш комментарий отправлен и будет отображен после прохождения модерации');
                } else {
                    $result['action_result'] = array('result' => 'danger', 'data' => 'Ошибка при отправке комментария');
                }
            } else {
                $result['action_result'] = array('result' => 'danger', 'data' => '<strong>Поля заполнены некорректно:</strong><br/>'.  implode($result['validation_errors'], '<br/>'));
                $result['post'] = $_POST;
            }
        }
        $result['comments'] = $this->comments_model->getAll(false, $sort, $direction);
        $result['sort'] = array($sort, $direction);
        $view = $this->loadView('comments/view');
        $this->layout->render(array('content' => $view->fetch($result)));
    }
}
