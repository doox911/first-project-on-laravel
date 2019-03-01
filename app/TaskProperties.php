<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

}
