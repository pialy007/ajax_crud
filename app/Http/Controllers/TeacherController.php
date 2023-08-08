<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function teacher_index(){
        $teachers =Teacher::latest()->paginate(5);
        return view('teacher.admin_dash',[
            'teachers' =>$teachers,
        ]);
    }

    public function add_teacher(Request $request){
        $request->validate(
            [
                'name'=>'required',
                'title'=>'required',
                'institute'=>'required',
            ],
            [
                'name.required'=>'Name is Required',
                'title.required'=>'Title is Required',
                'institute.required'=>'Institute is Required',
            ]
        );

        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->title = $request->title;
        $teacher->institute = $request->institute;
        $teacher->save();
        return response()->json([
            'status'=>'success',
        ]);

    }


    // update product
    public function update_teacher(Request $request){

        $request->validate(
            [
                'up_name'=>'required',
                'up_title'=>'required',
                'up_institute'=>'required',
            ],
            [
                'up_name.required'=>'Name is Required',
                'up_title.required'=>'Title is Required',
                'up_institute.required'=>'Institute is Required',
            ]

        );

        Teacher::where('id',$request->up_id)->update([
            'name'=>$request->up_name,
            'title'=>$request->up_title,
            'institute'=>$request->up_institute,
        ]);
        return response()->json([
            'status'=>'success',
        ]);

    }


    // delete product

    public function delete_teacher(Request $request){
        Teacher::findOrFail($request->teacher_id)->delete();
        return response()->json([
            'status'=>'success',
        ]);

    }

       // pagination
       public function pagination(Request $request){
        $teachers = Teacher::latest()->paginate(5);
        return view('teacher.pagination_teachers', [
            'teachers' =>$teachers,
        ])->render();

    }
}
