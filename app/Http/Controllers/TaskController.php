<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\TaskProperties;
use App\TaskPriority;
use App\TaskContent;
use App\TaskStatus;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $tasks = DB::table('task_properties AS tp')
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
                        ->get();

        return view('task.index', compact('tasks'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::All();
        $priorities = TaskPriority::All();

        return view('task.create', compact('users', 'priorities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {

        $TaskProperties = new TaskProperties();

        $TaskProperties->status = 1;

        $this->validate( $request, [
            'setter' => 'required|integer',
            'responsible' => 'required|integer',
            'title' => 'required|min:10|max:255',
            'body' => 'required',
            'priorities' => 'required|integer',
        ]);

        $TaskProperties->setter = $request->input('setter');
        $TaskProperties->responsible  = $request->input('responsible');
        $TaskProperties->title = $request->input('title');
        $TaskProperties->body = $request->input('body');
        $TaskProperties->deadline  = '';
        $TaskProperties->priorities  = $request->input('priorities');
        $TaskProperties->deadline  = $request->input('date') . ' ' . $request->input('time');
        $TaskProperties->factline  = '';

        $TaskProperties->save();


        $tasks = DB::table('task_properties AS tp')
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
                        ->get();

        return view('task.index', compact('tasks'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('task.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
