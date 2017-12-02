<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
*
* @SWG\Definition(
*   
*   definition="User",
*   required={"email", "password"},
*   
*   @SWG\Property(
*   
*       property="email",
*       type="string",
*       description="user's Email",
*       example="johnDoe@Example.com"
*   ),
*
*   @SWG\Property(
*       
*       property="password",
*       type="string",
*       description="User's password",
*   ),
*   
* )
*
*/
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }


    public function findLesson($lesson_id)
    {
        return $this->lessons()->find($lesson_id);
    }
}
