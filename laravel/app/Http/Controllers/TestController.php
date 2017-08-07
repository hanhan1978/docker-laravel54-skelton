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
        //$tests = \App\Test::all();
        return 'This is test';
    }

}