<?php

namespace App\Http\Controllers;

const LIMIT = 10;

use Illuminate\Http\Request;
use App\User;
use App\TaskProperties;
use App\TaskPriority;
use App\TaskContent;
use App\TaskStatus;
use Illuminate\Support\Facades\DB;
use App\TasksFilters;

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
    public function index( Request $request ) {

        $tasks = TaskProperties::with('user');

        $tasks = ( new TasksFilters($tasks, $request) )->applay()->paginate( LIMIT );

        return view('tasks.index', compact('tasks'));

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

        return view('tasks.create', compact('users', 'priorities'));
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

        $tasks = TaskProperties::paginate ( LIMIT );

        return view('tasks.index', compact('tasks'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show ( $id )
    {

        $task = ( TaskProperties::task( $id ) ) [0];

        return view('tasks.show', compact( 'task'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit ( $id )
    {
        $task = ( TaskProperties::task( $id ) ) [0];
        $users = User::All();
        $priorities = TaskPriority::All();
        $statuses = TaskStatus::All();

        return view('tasks.edit', compact('task', 'priorities', 'statuses', 'users'));

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

        $this->validate( $request, [
            'status' => 'required|integer',
            'responsible' => 'required|integer',
            'title' => 'required|min:10|max:255',
            'body' => 'required',
            'priorities' => 'required|integer',
        ]);

        $TaskProperties = TaskProperties::find($id);

        $TaskProperties->status = $request->input('status');
        $TaskProperties->responsible  = $request->input('responsible');
        $TaskProperties->title = $request->input('title');
        $TaskProperties->body = $request->input('body');
        $TaskProperties->priorities  = $request->input('priorities');

        $TaskProperties->save();

        return redirect()->route('tasks.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy ( $id )
    {
        $task = TaskProperties::find ( $id );
        $task->delete();

        $users = User::All();
        $priorities = TaskPriority::All();

        return view('tasks.create', compact('users', 'priorities'));
    }
}
