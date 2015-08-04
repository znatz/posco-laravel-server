<?php

class ReceiptLinesController extends \BaseController {

	/**
	 * Display a listing of receipt_lines
	 *
	 * @return Response
	 */
	public function index()
	{
		$receipt_lines = ReceiptLine::all();

		return View::make('receipt_lines.index', compact('receipt_lines'));
	}

	/**
	 * Show the form for creating a new receiptline
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('receipt_lines.create');
	}

	/**
	 * Store a newly created receiptline in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), ReceiptLine::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		ReceiptLine::create($data);

		return Redirect::route('receipt_lines.index');
	}

	/**
	 * Display the specified receiptline.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$receiptline = ReceiptLine::findOrFail($id);

		return View::make('receipt_lines.show', compact('receiptline'));
	}

	/**
	 * Show the form for editing the specified receiptline.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$receiptline = ReceiptLine::find($id);

		return View::make('receipt_lines.edit', compact('receiptline'));
	}

	/**
	 * Update the specified receiptline in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$receiptline = ReceiptLine::findOrFail($id);

		$validator = Validator::make($data = Input::all(), ReceiptLine::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$receiptline->update($data);

		return Redirect::route('receipt_lines.index');
	}

	/**
	 * Remove the specified receiptline from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		ReceiptLine::destroy($id);

		return Redirect::route('receipt_lines.index');
	}

}
