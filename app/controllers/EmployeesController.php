<?php

class EmployeesController extends \BaseController
{

    public function index()
    {
        $employees = Employee::all();
        $categories = Category::all();
        $shops = Shop::all();

        $item = new Item();
        return View::make('employees.index', compact('employees', 'item', 'categories','shops'));
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

        if (Input::has('deleteEmployee')) {
            $e = Employee::where('name', Input::get('name'))->first();
            Employee::destroy($e->id);
        }

        if (Input::has('updateEmployee')) {
            $e = Employee::where('name', Input::get('name'))->first();
            Employee::destroy($e->id);
            $data['name'] = $data['new_name'];
            Employee::create($data);
        }

        /* Category */
        if (Input::has('createCategory')) Category::create($data);

        if (Input::has('deleteCategory')) {
            $c = Category::where('Bumon', Input::get('Bumon'))->first();
            Category::destroy($c->id);
        }

        if (Input::has('updateCategory')) {
            $c = Category::where('Bumon', Input::get('Bumon'))->first();
            Category::destroy($c->id);
            $data['Bumon'] = $data['new_categoryName'];
            Employee::create($data);
        }

         /* Shop */
        if (Input::has('createShop')) Shop::create($data);

        if (Input::has('deleteShop')) {
            $s = Shop::where('Tenpo', Input::get('Tenpo'))->first();
            Shop::destroy($s->id);
        }

        if (Input::has('updateShop')) {
            $s = Shop::where('Tenpo', Input::get('Tenpo'))->first();
            Shop::destroy($s->id);
            $data['Tenpo'] = $data['new_shopName'];
            Shop::create($data);
        }



        /* Item */
        if (Input::has('createItem')) {

            $id = DB::table('BTSMAS')->count();
            $id++;
            $file = $id . '.png';

            if (move_uploaded_file($_FILES['upload']['tmp_name'], $file)) {
                echo $file;
            } else {
                echo "error";
            }

            $data['contents'] = file_get_contents($file);
            unlink($file);
            Item::create($data);
        }

        if (Input::has('deleteItem')) {
            $id = Input::get('idItem');
            Item::destroy($id);
        }

        if (Input::has('updateItem')) {
            $id = Input::get('idItem');
            $item = Item::find($id);
            $item->title = Input::get('title');
            $item->price = Input::get('price');
            $item->genka = Input::get('genka');
            $item->Bumon = Input::get('Bumon');
            $item->Kosu  = Input::get('Kosu');
            if (file_exists($_FILES['upload']['tmp_name']))
            {
                $file = $id . '.png';
                move_uploaded_file($_FILES['upload']['tmp_name'], $file);
                $item->contents = file_get_contents($file);
                unlink($file);
            }
            $item->save();
        }

        if (Input::get('selectedItem')) {
            $targetID = Input::get('selectedItem');
            $item = Item::find($targetID);
            $employees = Employee::all();

            $shops = Shop::all();
            $categories = Category::all();
            return View::make('employees.index', compact('employees', 'item', 'categories','shops'));
        }

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
