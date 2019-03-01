<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TaskProperties extends Model {

    public function status() {

        return $this->hasOne('App\TaskStatus');

    }

    public function setter() {

        return $this->hasOne('App\User');

    }

    public function responsible() {

        return $this->hasOne('App\TaskPriority');

    }

    public static function tasksAll( int $limit )
    {

        return DB::table('task_properties AS tp')
                        ->select(
                            'tp.id', 'ts.name AS status',
                            'u.name AS setter_name', 'u.second_name AS setter_second_name',
                            'us.name AS responsible_name', 'us.second_name AS responsible_second_name',
                            't_pri.name AS priorities',
                            'tp.title', 'tp.body', 'tp.deadline', 'tp.factline', 'tp.created_at', 'tp.updated_at'
                        )
                        ->join('task_statuses AS ts', 'ts.id', '=', 'tp.status')
                        ->join('task_priorities AS t_pri', 't_pri.id', '=', 'tp.priorities')
                        ->join('users AS u', 'u.id', '=', 'tp.setter')
                        ->join('users AS us', 'us.id', '=', 'tp.responsible')
                        ->orderBy('tp.id' , 'desc')
                        ->take( $limit )
                        ->get();

    }

    public static function task( int $id )
    {

        return DB::table('task_properties AS tp')
                        ->select(
                            'tp.id', 'ts.name AS status',
                            'u.name AS setter_name', 'u.second_name AS setter_second_name',
                            'us.name AS responsible_name', 'us.second_name AS responsible_second_name',
                            't_pri.name AS priorities',
                            'tp.title', 'tp.body', 'tp.deadline', 'tp.factline', 'tp.created_at', 'tp.updated_at'
                        )
                        ->join('task_statuses AS ts', 'ts.id', '=', 'tp.status')
                        ->join('task_priorities AS t_pri', 't_pri.id', '=', 'tp.priorities')
                        ->join('users AS u', 'u.id', '=', 'tp.setter')
                        ->join('users AS us', 'us.id', '=', 'tp.responsible')
                        ->where('tp.id', '=', $id )
                        ->get();

    }

    public static function pagination ( $limit )
    {

        return DB::table('task_properties')->paginate( $limit );

    }

}
