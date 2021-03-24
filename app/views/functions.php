<?php
    function print_cattree($catlist, $parent, $is_cat_hidden = false)
    {
        $is_empty = true;
        foreach ($catlist as $uri => $array) {
            if ($array[2] == $parent) {
                $is_empty = false;
                break;
            }
        }
        if ($is_empty == true) {
            return;
        }
        if ($parent == null) {
            if ($is_cat_hidden == false) {
              echo "\n<ul class=\"cat_menu\">\n";
            }
            else {
              echo "\n<ul class=\"cat_menu cat_menu_hidden\">\n";
            }
        } else {
            echo "\n<ul>\n";
        }
        foreach ($catlist as $uri => $array) {
            if ($array[2] == $parent) {
                if (!has_child($array[0], $catlist)) {
                    echo "<li><a href=\"",Settings::$BASE_URL,"/category/{$uri}/\">{$array[1]}<i class=\"fas fa-chevron-right\"></i></a>";
                } else {
                    echo "<li class=\"hassubs\"><a href=\"",Settings::$BASE_URL,"/category/{$uri}/\">{$array[1]}<i class=\"fas fa-chevron-right\"></i></a>";
                }
                print_cattree($catlist, $array[0]);
                echo "</li>\n";
            }
        }
        echo "</ul>\n";
    }
    
    function has_child($id, $catlist)
    {
        foreach ($catlist as $uri => $array) {
            if ($array[2] == $id) {
                return true;
            }
        }
        return false;
    }