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

    public function setter ( $value )
    {
        if ( empty ( $value ) ) return;
        $this->bilder->whereHas( 'user_setter', function($query) use ($value){
             $query->Where( 'name', 'LIKE', "%$value%" )
             ->orWhere( 'second_name', 'LIKE', "%$value%")
             ->orWhere( 'patronumic', 'LIKE', "%$value%" );
        });



    }

    # Фильтр по ответственному за задачу

    public function responsible ( $value )
    {
        if ( empty ( $value ) ) return;
        $this->bilder->whereHas( 'user_responsible', function($query) use ($value){
             $query->Where( 'name', 'LIKE', "%$value%" )
             ->orWhere( 'second_name', 'LIKE', "%$value%")
             ->orWhere( 'patronumic', 'LIKE', "%$value%" );
        });
    }

    # Фильтр по статусу задачи

    public function status ( $id )
    {
        if ( empty ( $id ) ) return;
        $this->bilder->where( 'status', '=', $id );

    }

    # Фильтр по приоритету задачи

    public function priority ( $id )
    {
        if ( empty ( $id ) ) return;
        $this->bilder->where( 'priorities', '=', $id );

    }
}
