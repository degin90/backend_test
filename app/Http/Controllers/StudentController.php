<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index(){
        $data['title'] = 'Students';
        $students = new Student;
        $students = $students->get();
        $data['students'] = $students;
        return view('pages.student.show',$data);
    }

    public function add(){
        $data['title'] = 'Add Students';
        return view('pages.student.add',$data);
    }

    public function add_form(Request $request){
        $request->validate([
            'name' => 'required'
        ]);

        $imageName = $request->file('avatar')->getClientOriginalName();
        $imagePath = $request->file('avatar')->storeAs('public/uploads',$imageName);

        $student = new Student([
            'name' => $request->name,
            'gender' => $request->gender,
            'avatar' => $imageName,
            'dob' => $request->dob
        ]);
        $student->save();

        return redirect()->route('student')->with('success', 'Student has been registered.');
    }

    public function edit($id){
        $data['title'] = 'Students Edit';
        $students = new Student;
        $students = $students->where('id',$id);
        $students = $students->get()->first();
        $data['student'] = $students;
        return view('pages.student.edit',$data);
    }

    public function edit_form(Request $request){
        $request->validate([
            'id'=>'required',
            'name' => 'required'
        ]);

        $student = new Student;
        $student = $student->where('id',$request->id)->first();

        if(!empty($request->file('avatar'))){
            $imageName = $request->file('avatar')->getClientOriginalName();
            $imagePath = $request->file('avatar')->storeAs('public/uploads',$imageName);
            $student->avatar    = $imageName;
        }

        $student->name      = $request->name;
        $student->gender    = $request->gender;
        $student->dob       = $request->dob;
        $student->update();

        return redirect()->route('student')->with('success', 'Student has been updated.');
    }

    public function delete($id){
        $student = new Student;
        $student = $student->where('id',$id)->first()->delete();
        return redirect()->route('student')->with('success', 'Student has been deleted.');
    }

    public function ajax(Request $request){
		$columns = $request->input('columns');
		$search = $request->input('search');
		$keyword = !empty($search) ? $search['value'] : "";
		$limit = $request->input('length');
		$offset = $request->input('start');
		$order = $request->input('order');
		$sort = [];
		if (!empty($order) && !empty($order[0]['column'])) {
			$sort['field'] = $columns[$order[0]['column']]['data'];
			$sort['direction'] = $order[0]['dir'];
		}
        $filters = [];
        $students = Student::getList($keyword, $sort, $limit, $offset, $filters);

        return response()->json($students);
    }
}
