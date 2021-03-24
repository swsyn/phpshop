<?php
    class PageModel extends Model
    {
        public function get_page($params)
        {
            if (!isset($params['uri'])) {
                $params['uri'] = "main";
            }
            $result = $this->query("SELECT * FROM pages WHERE uri=\"{$params['uri']}\" LIMIT 1");
            $array = mysqli_fetch_assoc($result);
            if (mysqli_num_rows($result)) {
                return $array;
            } else {
                echo "error";
                return 0;
            }
        }
        
        public function get_pagelist()
        {
            $result = $this->query("SELECT uri, name FROM pages WHERE uri<>\"main\" ORDER BY uri");
            while($buf = mysqli_fetch_assoc($result)) {
            	$array[$buf['uri']] = $buf['name'];
            }
            return $array;
        }
    }