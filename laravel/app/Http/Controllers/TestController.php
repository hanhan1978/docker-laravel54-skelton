<?php
/**
 * Created by PhpStorm.
 * User: hanhan
 * Date: 2017/08/04
 * Time: 15:04
 */

namespace App\Http\Controllers;


class TestController extends Controller
{
    public function show()
    {
        return 'This is test';
    }

    public function show_mysql_10000()
    {
        $tests = \App\Test::all();
        echo (count($tests));
        return 'This is test';
    }

}