<?php
    class CategoryModel extends Model
    {
        public function get_cat($params)
        {
            if (isset($params['uri']) && !isset($params['id'])) {
                $result = $this->query("SELECT * FROM categories WHERE uri='{$params['uri']}' LIMIT 1");
            } else if (!isset($params['uri']) && isset($params['id'])) {
                $result = $this->query("SELECT * FROM categories WHERE id={$params['id']} LIMIT 1");
            } else {
                return null;
            }
            $array = mysqli_fetch_assoc($result);
            return $array;
        }
        
        public function get_catlist()
        {
            $result = $this->query("SELECT id, title, parent, uri FROM categories ORDER BY id ASC");
            while ($buf = mysqli_fetch_assoc($result)) {
                $array[$buf['uri']] = array($buf['id'], $buf['title'], $buf['parent']);
            }
            return $array;
        }
    }