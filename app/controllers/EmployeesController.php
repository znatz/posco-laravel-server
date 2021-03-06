<?php

class EmployeesController extends \BaseController
{

    public function index()
    {
        /* Employee selected by clicking radio button */
        /* ! Remember to clear Input if this is redirected from delete !*/
        $selectedEmployee = new Employee();
        if (Input::has('selectedEmployee')) {
            $selectedEmployee = Employee::find(Input::get('selectedEmployee')) ;
        }

        $selectedCategory = new Category();
        if (Input::has('selectedCategory')) {
            $selectedCategory = Category::find(Input::get('selectedCategory')) ;
        }

        $selectedShop = new Shop();
        if (Input::has('selectedShop')) {
            $selectedShop = Shop::find(Input::get('selectedShop')) ;
        }

        $employees = Employee::all();
        $categories = Category::all();
        $shops = Shop::all();

        $item = new Item();
        return View::make('employees.index', compact('employees', 'item', 'categories', 'shops', 'selectedEmployee', 'selectedCategory', 'selectedShop'));
    }

    public function create()
    {
        return View::make('employees.create');
    }

    public function store()
    {

        $validator = Validator::make($data = Input::all(), Employee::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        /* Employee */
        if (Input::has('createEmployee')) Employee::create($data);
        $message = "登録しました。";

        if (Input::has('deleteEmployee')) {
            $e = Employee::where('name', Input::get('name'))->first();
            Employee::destroy($e->id);
            $message = "削除しました。";
            if (Input::has('selectedEmployee')) {
                Input::replace(array('selectedEmployee', '')) ;
            }
        }

        if (Input::has('updateEmployee')) {

            $validator_for_update = Validator::make($data = Input::all(), Employee::$update_rules);
            if ($validator_for_update->fails()) {
                return Redirect::back()->withErrors($validator_for_update)->withInput();
            }

            $e = Employee::where('name', Input::get('name'))->first();
            Employee::destroy($e->id);
            $data['name'] = $data['new_name'];
            Employee::create($data);
            $message = "更新しました。";
        }


        return Redirect::route('employees.index')->with('message',$message);
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

        if ($validator->fails()) {
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
