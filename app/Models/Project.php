<?php

// app/Models/Project.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
	public function totalHours()
	{
		return $this->tasks->sum('hours');
	}
}



