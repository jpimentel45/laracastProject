<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
     //CAN ALSO USE: protected $guarded = []
        // guarded include only what you dont want protected
    // protected $fillable = [
    //     'title',
    //     'description'
    // ];
    protected $guarded = [];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($task)
    {
        // return  Task::create([
        //     'project_id' => $this->id,
        //     'description' => $description
        // ]);
        //since we already have a relationship to task on function above
        //with eloquent we can do bottom method
        //this task create new one with compact new description
        $this->tasks()->create($task);
    }
    public function deleteTask($task)
    {
        $this->task()->delete($task);
    }
}
