<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Lesson;
use JWTAuth;

class LessonsFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'body' => 'required|min:10'
        ];
    }


    public function store()
    {
        // $errors = session('errors');

        // if($errors){

        //     return response()->json(['message' => 'Missing/Invalid Data!']);

        // }
        // $user = JWTAuth::parseToken()->authenticate();

        // $lesson = new Lesson([
            
        //     'title' => $this->get('title'),
        //     'body' => $this->get('body')

        // ]);

        // $user->lessons()->save($lesson);

        // return new LessonResource($lesson);
    }
}
