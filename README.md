# Coaster
A PHP package mainly developed for Laravel to make array for Form::select() with/without a placeholder.  
(This is for Laravel 5+. [For Laravel 4.2](https://github.com/SUKOHI/Coaster/tree/1.0))

Installation
====

Add this package name in composer.json

    "require": {
      "sukohi/coaster": "2.*"
    }

Execute composer command.

    composer update

Register the service provider in app.php

    'providers' => [
        ...Others...,  
        Sukohi\Coaster\CoasterServiceProvider::class,
    ]

Also alias

    'aliases' => [
        ...Others...,  
        'Coaster'   => Sukohi\Coaster\Facades\Coaster::class
    ]
    
Usage
====

**Minimal Way**

    $lists = \Coaster::get([
        '1' => 'Text - 1',
        '2' => 'Text - 2',
        '3' => 'Text - 3',
    ], 'Please choose');
    echo Form::select('test1', $lists);

    /* Output

        <select name="test1">
            <option value="" selected="selected">Please choose</option>
            <option value="0">Text - 1</option>
            <option value="1">Text - 2</option>
            <option value="2">Text - 3</option>
        </select>

    */


**with Displaying Flag (If $placeholder_flag is false, the placeholder will not be displayed)**

    $lists = \Coaster::get([
        '1' => 'Text - 1',
        '2' => 'Text - 2',
        '3' => 'Text - 3',
    ], 'Please choose', $placeholder_flag = true);
    echo Form::select('test2', $lists);

    /* Output

        <select name="test2">
            <option value="" selected="selected">Please choose</option>
            <option value="0">Text - 1</option>
            <option value="1">Text - 2</option>
            <option value="2">Text - 3</option>
        </select>

    */


**Using Closure**

    $lists = \Coaster::get(function(){

        return \App\User::where('id', '<', 5)->lists('name', 'id')->all();    // You need to return array values.

    }, 'Please choose');
    echo Form::select('test3', $lists);

    /* Output

        <select name="test3">
            <option value="" selected="selected">Please choose</option>
            <option value="0">title - 0</option>
            <option value="1">title - 1</option>
            <option value="2">title - 2</option>
            <option value="3">title - 3</option>
        </select>

    */


**with Default Value**

    $lists = \Coaster::get([
        '1' => 'Text - 1',
        '2' => 'Text - 2',
        '3' => 'Text - 3',
    ], ['default' => 'Please choose'], true);
    echo Form::select('test4', $lists);

    /* Output

    <select name="test4">
        <option value="default">Please choose</option>
        <option value="0">Text - 1</option>
        <option value="1">Text - 2</option>
        <option value="2">Text - 3</option>
    </select>

    */
        
License
====
This package is licensed under the MIT License.

Copyright 2015 Sukohi Kuhoh