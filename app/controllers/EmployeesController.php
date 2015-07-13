<?php

class EmployeesController extends \BaseController {

	public function index()
	{
		$employees = Employee::all();

		return View::make('employees.index', compact('employees'));
	}

	public function create()
	{
		return View::make('employees.create');
	}

	public function store()
	{
		$validator = Validator::make($data = Input::all(), Employee::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Employee::create($data);

		return Redirect::route('employees.index');
	}

	public function show($id)
	{
		$employee = Employee::findOrFail($id);

		return View::make('employees.show', compact('employee'));
	}

	public function edit($id)
	{
		$employee = Employee::find($id);

		return View::make('employees.edit', compact('employee'));
	}

	public function update($id)
	{
		$employee = Employee::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Employee::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$employee->update($data);

		return Redirect::route('employees.index');
	}

	public function destroy($id)
	{
		Employee::destroy($id);

		return Redirect::route('employees.index');
	}

}