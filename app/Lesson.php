<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
*
* @SWG\Definition(
*	
*	definition="LessonModel",
* 	required={"title", "body"},
*	
*	@SWG\Property(
*	
*		property="title",
*		type="string",
*		description="title of The Lesson",
*		example="First Title"
*	),
*
*	@SWG\Property(
*		
*		property="body",
*		type="string",
*		description="Body of The Lesson",
*		example="Your Text .."
*	),
*	
* )
*
*/

class Lesson extends Model
{
    protected $fillable = ['title', 'body'];


    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
