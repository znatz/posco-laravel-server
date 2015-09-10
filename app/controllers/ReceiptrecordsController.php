<?php

class ReceiptrecordsController extends \BaseController {

	/**
	 * Display a listing of receiptrecords
	 *
	 * @return Response
	 */
	public function index()
	{
		$receiptrecords = Receiptrecord::orderBy('serveTime', 'desc')->get();

		return View::make('receiptrecords.index', compact('receiptrecords'));
	}

	/**
	 * Show the form for creating a new receiptrecord
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('receiptrecords.create');
	}

	/**
	 * Store a newly created receiptrecord in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Receiptrecord::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Receiptrecord::create($data);

		return Redirect::route('receiptrecords.index');
	}

	/**
	 * Display the specified receiptrecord.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$receiptrecord = Receiptrecord::findOrFail($id);

		return View::make('receiptrecords.show', compact('receiptrecord'));
	}

	/**
	 * Show the form for editing the specified receiptrecord.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$receiptrecord = Receiptrecord::find($id);

		return View::make('receiptrecords.edit', compact('receiptrecord'));
	}

	/**
	 * Update the specified receiptrecord in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$receiptrecord = Receiptrecord::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Receiptrecord::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$receiptrecord->update($data);

		return Redirect::route('receiptrecords.index');
	}

	/**
	 * Remove the specified receiptrecord from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Receiptrecord::destroy($id);

		return Redirect::route('receiptrecords.index');
	}

}
