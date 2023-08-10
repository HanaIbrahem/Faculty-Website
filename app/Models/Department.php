<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;


class Department extends Model
{
    protected $guarded=[];
    use HasFactory;

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    protected static function boot()
    {
        parent::boot();

        // Listen for the deleting event
        static::deleting(function ($department) {
            // Delete related images of teachers
            $department->teachers->each(function ($teacher) {
                // Assuming 'image' is the name of the image column in the teachers table
                if (!empty($teacher->image)) {
                    $imagePath = public_path('images/teacher/' . $teacher->image);
                    if (File::exists($imagePath)) {
                        File::delete($imagePath);
                    }
                }
            });
        });
    }
}
