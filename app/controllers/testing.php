
<?php

class Testing extends \BaseController {


	public function index()
	{
/*
		$receiptRecords = Receiptrecord::where('tableNO', "7")->get();
		foreach ($receiptRecords as $r) {
			echo ($r->goodsTitle."<br/>");
		}
		$uuid = Uuid::generate(4);
		echo ($uuid->string);
	*/
		return View::make('testing.index');
	}

	public function create()
	{
	}

	public function store()
	{
	}

	public function show($id)
	{
	}

	public function edit($id)
	{
	}

	public function update($id)
	{
	}

	public function destroy($id)
	{
	}

}