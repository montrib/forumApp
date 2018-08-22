<?php
/**
 * Created by PhpStorm.
 * User: montribrusselers
 * Date: 22/08/2018
 * Time: 11:46
 */

namespace App\Filters;


use Illuminate\Http\Request;

abstract class Filters
{
    protected $filters = [];
    /**
     * @var Request
     */
    protected $request, $builder;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param $builder
     * @return mixed
     */
    public function apply($builder)
    {
        $this->builder = $builder;

        foreach ($this->getFilters() as $filter => $value)
        {
            if (!$value) continue;

            if (method_exists($this, $filter)) {
                $this->filter($value);
            }

        }

        return $this->builder;

    }

    public function getFilters()
    {
        return $this->request->only($this->filters);
    }

}