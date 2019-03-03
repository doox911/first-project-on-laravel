<?php

namespace App;

use App\User;

class TasksFilters
{

    protected $bilder;

    protected $request;

    public function __construct( $bilder, $request )
    {

        $this->bilder = $bilder;
        $this->request = $request;

    }

    public function applay()
    {
        foreach ( $this->filters() as $filter => $value) {

            if ( method_exists ( $this, $filter ) ) {

                $this->$filter($value);

            }

        }

        return $this->bilder;
    }

    public function filters()
    {

        # все переменные и их значения (фильтры) из строки запроса

        return $this->request->All();

    }

    # Фильтр по Постановщику задачи

    public function setter ( int $id )
    {

        $this->bilder=$this->bilder->where( 'setter', '=', $id );

    }

    # Фильтр по ответственному за задачу

    public function responsible ( int $id )
    {

        $this->bilder=$this->bilder->where( 'responsible', '=', $id );

    }

    # Фильтр по статусу задачи

    public function status ( int $id )
    {

        $this->bilder=$this->bilder->where( 'status', '=', $id );

    }

    # Фильтр по приоритету задачи

    public function priority ( int $id )
    {

        $this->bilder=$this->bilder->where( 'priority', '=', $id );

    }
}
