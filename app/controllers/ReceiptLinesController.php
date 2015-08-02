<?php

class ReceiptLinesController extends \BaseController {

	/**
	 * Display a listing of receiptlines
	 *
	 * @return Response
	 */
	public function index()
	{
		$receiptlines = Receiptline::all();

		return View::make('receiptlines.index', compact('receiptlines'));
	}

	/**
	 * Show the form for creating a new receiptline
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('receiptlines.create');
	}

	/**
	 * Store a newly created receiptline in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Receiptline::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Receiptline::create($data);

		return Redirect::route('receiptlines.index');
	}

	/**
	 * Display the specified receiptline.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$receiptline = Receiptline::findOrFail($id);

		return View::make('receiptlines.show', compact('receiptline'));
	}

	/**
	 * Show the form for editing the specified receiptline.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$receiptline = Receiptline::find($id);

		return View::make('receiptlines.edit', compact('receiptline'));
	}

	/**
	 * Update the specified receiptline in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$receiptline = Receiptline::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Receiptline::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$receiptline->update($data);

		return Redirect::route('receiptlines.index');
	}

	/**
	 * Remove the specified receiptline from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Receiptline::destroy($id);

		return Redirect::route('receiptlines.index');
	}

}
