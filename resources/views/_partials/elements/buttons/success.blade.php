<?php

    $default = ['class' => 'button py1 m1 button bg-green regular h5 button-upper'];

    if (!isset($options)) {
        $options = [];
    }

    $options = array_merge($default, $options);

    if (!isset($params)) {
        $params = [];
    }

 ?>

{!! link_to_route($route, $label, $params, $options) !!}