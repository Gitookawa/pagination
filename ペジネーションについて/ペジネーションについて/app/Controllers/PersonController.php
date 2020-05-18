<?php

namespace App\Http\Controllers;

use App\Person;

use Illuminate\Http\Request;

class PersonController extends Controller
{
	public function index(Request $request){

  	   $items = Person::all();
	   return view('person.index',['items'=>$items]);

	}
	public function personhasmany(Request $request)
	{
		$items = Person::all();
		return view('ookawa1.personhasmany',['items'=>$items]);
	}
	public function personhasone(Request $request)
	{
		$items = Person::all();
		return view('ookawa1.personhasone',['items'=>$items]);
	}
  
	public function person(Request $request){

	    $items = Person::all();
	    return view('ookawa1.person',['items'=>$items]);

	}

	public function getData()
	{
		$items = Person::all();
		return view('ookawa1.person1',['items'=>$items]);
	}

	public function find(Request $request){

		return view('ookawa1.personfind',['input'=>'']);
	}

	public function search(Request $request)
	{
		$item = Person::find($request->input);
		$param =['input' => $request->input,'item' => $item];
                return view('ookawa1.personfind',$param);		
	}
        
        public function personwhere(Request $request)
	{
		return view('ookawa1.personwhere',['input'=>'']);
	}

	public function wheresearch(Request $request)
	{
		$item = Person::where('name',$request->input)->first();
		$param = ['input' => $request->input, 'item' => $item];
		return view('ookawa1.personwhere',$param);
	}

	public function namefanction(Request $request)
	{
		return view('ookawa1.namefanction',['input'=>'']);
	}

	public function namesearch(Request $request)
	{
		$item = Person::nameEqual($request->input)->first();
		$param = ['input'=>$request->input, 'item' => $item];
		return view('ookawa1.namefanction',$param);
	}

	public function personscope(Request $request)
        {
		return view('ookawa1.personscope',['input'=>'']);
        }


	public function personsearch(Request $request)
	{
		$min = $request->input * 1;
		$max = $min + 10;
		$item = Person::ageGreaterThan($min)->
			ageLessThan($max)->first();
		$param = ['input' => $request->input,'item' => $item];
		return view('ookawa1.personscope',$param);
	}

	public function personadd(Request $request)
	{
		return view('ookawa1.personadd');
	}

	public function personcreate(Request $request)
	{
		$this->validate($request, Person::$rules);
		$person = new Person;
		$form = $request->all();
		unset($form['_token']);
		$person->fill($form)->save();
		return redirect('/ookawa1/personadd');
	}

	public function personedit(Request $request)
	{
		$person = Person::find($request->id);
		return view('ookawa1.personedit',['form'=>$person]);
	}

	public function personupdate(Request $request)
	{
		$this->validate($request,Person::$rules);
		$person = Person::find($request->id);
		$form = $request->all();
		unset($form['_token']);
		$person->fill($form)->save();
		return redirect('/ookawa1/personedit');
	}

	public function persondel(Request $request)
	{
		$person = Person::find($request->id);
		return view('ookawa1.persondel',['form'=>$person]);
	}

	public function personremove(Request $request)
	{
		Person::find($request->id)->delete();
		return redirect('/ookawa1/persondel');
	}
}
