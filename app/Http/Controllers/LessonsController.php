<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lesson;
use App\Http\Resources\Lesson as LessonResource;
use App\Http\Requests\LessonsFormRequest as LessonsRequest;
use JWTAuth;
use App\Http\Controllers\ApiController;

class LessonsController extends ApiController
{

	/**
     * Display a listing of Lessons.
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @SWG\Get(
     *     path="/api/v1/lessons",
     *     description="Get All Lessons.",
     *     operationId="findAll",
     *     produces={"application/json"},
     *     tags={"Lessons"},
     *	  @SWG\Parameter(
	 *			type="string",	                                                               
	 *			name="Authorization",
	 *	  		in="header",
	 *	  		required=true
	 *	  	),
     *     @SWG\Response(
     *         response=200,
     *         description="SUCCESS"
     *     ),
     *     @SWG\Response(
     *         response=401,
     *         description="Unauthorized action.",
     *     )
     * )
     */
    
	public function findAll()
	{

		$lessons = $this->user->lessons;

		if(! $lessons->first()){

			return response()->json(['error' => 'Lessons Not Found'], 404);

		}

		// $lessons = Lesson::all();

		$lessons = LessonResource::collection($lessons);
		
		return response()->json(['data' => $lessons], 200);

		
	}

	/**
     * Display a listing of Lessons.
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @SWG\Get(
     *     path="/api/v1/lessons/{id}",
     *     description="Get Specific Lesson.",
     *     operationId="findById",
     *     produces={"application/json"},
     *	   tags={"Lessons"},
     *     @SWG\Parameter(
	 *          name="id",
	 *          in="path",
	 *          required=true,
	 *          type="integer",
	 *          description="Lesson Id",
	 * 		),
     *	   @SWG\Parameter(
	 *			type="string",	                                                               
	 *			name="Authorization",
	 *	  		in="header",
	 *	  		required=true
	 *	  	),
     *     @SWG\Response(
     *         response=200,
     *         description="SUCCESS"
     *     ),
     *     @SWG\Response(
     *         response=401,
     *         description="Unauthorized action.",
     *     )
     * )
     */

	public function findById($lesson_id)
	{

		$lesson = $this->user->findLesson($lesson_id);

		if(! $lesson){

			return response()->json(['error' => 'Lesson Not Found'], 404);
		}

		$lesson = new LessonResource($lesson);

		return response()->json(['data' => $lesson], 200);
	}


	/**
     * Create a new lesson.
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @SWG\Post(
     *     path="/api/v1/lessons",
     *     description="Add Lesson.",
     *     operationId="create",
     *     produces={"application/json"},
     *     tags={"Lessons"},
     *     @SWG\Parameter(
	 *          name="Title & Body",
	 *          in="body",
	 *          required=true,
	 *          type="string",
	 *          description="Enter Lesson Data",
	 *			schema={"$ref"="#/definitions/LessonModel"},
	 *		),
	 *	  @SWG\Parameter(
	 *			type="string",	                                                               
	 *			name="Authorization",
	 *	  		in="header",
	 *	  		required=true
	 *	  	),		
     *     @SWG\Response(
     *         response=200,
     *         description="SUCCESS"
     *     ),
     *     @SWG\Response(
     *         response=401,
     *         description="Unauthorized action.",
     *     )
     * )
     */
	public function create()
	{

		$user = JWTAuth::parseToken()->authenticate();

		$lesson = new Lesson([
			
			'title' => request('title'),
			'body' => request('body'),

		]);

		$user->lessons()->save($lesson);

		// $lesson->save();

		$lesson = new LessonResource($lesson);

		return response()->json(["data" => $lesson], 201);
	}


	/**
     * update lesson.
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @SWG\Put(
     *     path="/api/v1/lessons/update/{id}",
     *     description="Get Specific Lesson.",
     *     operationId="findById",
     *     produces={"application/json"},
     *     tags={"Lessons"},
     *     @SWG\Parameter(
	 *          name="id",
	 *          in="path",
	 *          required=true,
	 *          type="integer",
	 *          description="Lesson Id",
	 * 		),
	 *		@SWG\Parameter(
	 *          name="title",
	 *          in="body",
	 *          required=true,
	 *          type="string",
	 *          description="new title",
	 *			@SWG\Schema(
	 *	              @SWG\Property(
	 *	                  property="body",
	 *	                  type="string",
	 *	              )
	 *	 		),
	 * 		),
	 *	   @SWG\Parameter(
	 *			type="string",	                                                               
	 *			name="Authorization",
	 *	  		in="header",
	 *	  		required=true
	 *	  	),
     *     @SWG\Response(
     *         response=200,
     *         description="SUCCESS"
     *     ),
     *     @SWG\Response(
     *         response=401,
     *         description="Unauthorized action.",
     *     )
     * )
     */

	public function update(Request $request, $lesson_id)
	{

		$lesson = $this->user->findLesson($lesson_id);

		if(! $lesson){

			return response()->json(['error' => 'Lesson Not Found'], 404);
		}

		$lesson->update($request->all());

		$lesson = new LessonResource($lesson);

		return response()->json(["data" => $lesson],200);
	}

	/**
     * Delete a Lesson.
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @SWG\Delete(
     *     path="/api/v1/lessons/delete/{id}",
     *     description="Delete Lesson.",
     *     operationId="findById",
     *     produces={"application/json"},
     *     tags={"Lessons"},
     *     @SWG\Parameter(
	 *          name="id",
	 *          in="path",
	 *          required=true,
	 *          type="integer",
	 *          description="Lesson Id",
	 * 		),
	 *	   @SWG\Parameter(
	 *			type="string",	                                                               
	 *			name="Authorization",
	 *	  		in="header",
	 *	  		required=true
	 *	  	),
     *     @SWG\Response(
     *         response=204,
     *         description="SUCCESS"
     *     ),
     *     @SWG\Response(
     *         response=401,
     *         description="Unauthorized action.",
     *     )
     * )
     */

	public function delete($lesson_id)
	{

		$lesson = $this->user->findLesson($lesson_id);

		if(! $lesson){

			return response()->json(['error' => 'Lesson Not Found'], 404);
		}
			
		$lesson->delete();

		return response()->json(null, 204);

	}


}
