<?php
/**
 * Created by mamadou.
 * User: mamadou
 * Date: 9/26/2016
 * Time: 1:29 PM
 */

namespace Sulsira\Templater\Http;

use \App\Http\Controllers\Controller;
use Sulsira\Templater\Templater;

class TemplaterController extends Controller{

    public function getTest()
    {
        $templater = new Templater();

        $results = $templater
                    ->template("my name is **Fullname** and i am a gambian")
                    ->variables(['Fullname'=>'full_name'])
                    ->data(['full_name' => 'mamadou jallow'])
                    ->get();
    }
} 