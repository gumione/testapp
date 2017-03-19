<?php

class Comments_model extends Model
{
    public function getAll($all = false, $order = 'date', $direction = 'desc')
    {
        $sql = "SELECT * FROM comments";
        if(!$all) {
            $sql .= " WHERE moderated = 1 AND declined = 0";
        }
        $orders = array('username', 'date', 'email');
        $directions = array('asc', 'desc');
        if(in_array($order, $orders) && in_array($direction, $directions)) {
            $sql .= " ORDER BY :order :direction";
        } else {
            $sql .= " ORDER BY date desc";
        }
        $query = $this->db->prepare($sql);
        $parameters = array(':order' => $order, ':direction' => $direction);
        $query->execute($parameters);
        return $query->fetchAll();
    }
    
    public function getOne($id)
    {
        $sql = "SELECT * FROM comments WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);
        return $query->fetch();
    }
    
    public function addComment($data)
    {
        $sql = "INSERT INTO comments (username, email, image, text, date) VALUES (:username, :email, :image, :text, :date)";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':username' => strip_tags(htmlspecialchars($data['username'])),
            ':email' => strip_tags(htmlspecialchars($data['email'])),
            ':image' => $data['image'],
            ':text' => strip_tags(htmlspecialchars($data['text'])),
            ':date' => time()
        );
        return $query->execute($parameters);
    }
    
    public function approveComment($id)
    {
        $sql = "UPDATE comments SET moderated = 1 WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        return $query->execute($parameters);
    }
    
    public function declineComment($id)
    {
        $sql = "UPDATE comments SET moderated = 1, declined = 1 WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        return $query->execute($parameters);
    }
    
    public function updateComment($id, $data)
    {
        $sql = "UPDATE comments SET text = :text, edited_by_admin = 1 WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id, ':text' => strip_tags(htmlspecialchars($data['text'])));
        return $query->execute($parameters);
    }

}
