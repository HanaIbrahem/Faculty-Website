<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;


class Department extends Model
{
    protected $guarded=[];
    use HasFactory;
    protected $fillable = [
        'name',
        'name_ku',
        'description',
        'description_ku',
        'image',
    ];
    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
   
    public function get($key, $default = null)
    {
        if (session('local') === 'ku' && $key === 'name') {
            return $this->attributes['name_ku'] ?? $default;
        } elseif (session('local') === 'ku' && $key === 'description') {
            return $this->attributes['description_ku'] ?? $default;
        }

        return parent::get($key, $default);
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
