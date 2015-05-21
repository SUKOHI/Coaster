<?php namespace Sukohi\Coaster;

class Coaster {

    public function get($lists, $placeholder = '', $placeholder_flag = true) {

        if(is_callable($lists)) {

            $lists = $lists();

        }

        if(!empty($placeholder) && $placeholder_flag) {

            if(!is_array($placeholder)) {

                $placeholder = ['' => $placeholder];

            }

            $lists = array_merge($placeholder, $lists);

        }

        return $lists;

    }

}