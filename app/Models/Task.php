<?php

// app/Models/Task.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['project_id', 'name', 'hours', 'date', 'description'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}

