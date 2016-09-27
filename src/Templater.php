<?php
/**
 * Created by mamadou.
 * User: mamadou
 * Date: 9/27/2016
 * Time: 9:23 AM
 */

namespace Sulsira\Templater;


class Templater {

    /**
     * HTML fragment to be search and replaced
     * @var
     */
    protected $template;
    /**
     * variable map for knowing what to search for and replace with what
     *
     * @var
     */
    protected $variables;

    /**
     * data container with the data to be replaced in
     *
     * @var
     */
    protected $dataset;


    /**
     * final method call to get all the results to be serve back to the user
     *
     * @return array
     */
    public function get()
    {
        return $this->process();
    }

    /**
     * does any kind of preparation for the results
     *
     * @return array
     */
    protected function process()
    {
        $string = $this->replacementEngine($this->template, $this->variables, $this->dataset);
        return $string ;

    }


    /**
     * helps pull in the template html
     *
     * @param $template
     * @return $this
     */
    public function template($template)
    {

        $this->template = $template;

        return $this;

    }

    /**
     * pulls in the replaceable variables
     *
     * @param $variables
     * @return $this
     */
    public function variables($variables)
    {
        $this->variables = $variables;

        return $this;
    }

    /**
     * pulls in the data set that should be be replaced in
     *
     * @param $data
     * @return $this
     */
    public function data($data)
    {
        $this->dataset = $data;
        return $this;
    }

    /**
     * processes the replacement
     *
     * @param $template
     * @param $variables
     * @param $data
     * @return array
     */
    public function replacementEngine($template, $variables, $data)
    {
        if(str_contains($template, '**')){
            return $this->pullReplaceableArea($template, $variables,$data);
        }
        return null;
    }

    /**
     * makes the search and replacement of the template
     *
     * @param $template
     * @param $variables
     * @param $data
     * @return mixed
     */
    private function pullReplaceableArea($template, $variables, $data){

        $string = $template;

        foreach($variables as $match => $field){
            $replace = ' '.$data[$field]. ' ';
            $string = preg_replace('/[\s]\*\*('. $match .')\*\*[\s]/i', $replace ,$string);
        }

        return $string;
    }
} 