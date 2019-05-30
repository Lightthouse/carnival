<?php

use ESoft\Model\Gnome;
use ESoft\Model\Gem;

    function gnome_gems(Gnome $gnome){
        $gem_array = [];
        foreach($gnome->gems as $gem){
            if (array_key_exists($gem->parameter->name,$gem_array)){

                $gem_array[$gem->parameter->name]['count'] +=1;
            }
            else{
                $gem_array[$gem->parameter->name] = [
                    'gem_name' =>$gem->parameter->name,
                    'gem_img' =>$gem->parameter->img,
                    'count' => 1,
                ];
            }
        }
        return $gem_array;
    }

    function mined_gems($gems){
        $gem_array = [];
        foreach($gems as $gem){
            if (array_key_exists($gem->parameter->name,$gem_array)){

                $gem_array[$gem->parameter->name]['count'] +=1;
            }
            else{
                $gem_array[$gem->parameter->name] = [
                    'gem_name' =>$gem->parameter->name,
                    'gem_img' =>$gem->parameter->img,
                    'count' => 1,
                ];
            }
        }
        return $gem_array;
    }

