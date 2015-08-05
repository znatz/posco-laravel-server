<?php

class DataFromIOsController extends \BaseController {

	/**
	 * Display a listing of datafromios
	 *
	 * @return Response
	 */
	public function index()
	{
		$datafromios = Datafromio::all();

		return View::make('datafromios.index', compact('datafromios'));
	}

	/**
	 * Show the form for creating a new datafromio
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('datafromios.create');
	}

	/**
	 * Store a newly created datafromio in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Datafromio::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Datafromio::create($data);

		return Redirect::route('dataFromIOs.index');
	}

	/**
	 * Display the specified datafromio.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$datafromio = Datafromio::findOrFail($id);

		return View::make('datafromios.show', compact('datafromio'));
	}

	/**
	 * Show the form for editing the specified datafromio.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$datafromio = Datafromio::find($id);

		return View::make('datafromios.edit', compact('datafromio'));
	}

	/**
	 * Update the specified datafromio in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$datafromio = Datafromio::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Datafromio::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$datafromio->update($data);

		return Redirect::route('dataFromIOs.index');
	}

	/**
	 * Remove the specified datafromio from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 * @todo Separate operation for Datafromio and ReceiptLine
	 */
	public function destroy($id)
	{
		if (Input::has('ReadyForPayment')) {

            $id = Input::get('id');
			$m = Datafromio::find($id);
			$i = Item::where('title', $m->goodsTitle)->first();

			/* save to Cashier.sqlite */
			$r = new ReceiptLine();
               $r->tantoID 		= $m->tanto;
               $r->goodsTitle	= $m->goodsTitle;;
               $r->kosu 		= $m->kosu;
               $r->time 		= $m->time;
               $r->receiptNo 	= $m->receiptNo;
               $r->tableNO 		= $m->tableNO;;
               $r->price 		= $i->price;
               $r->save();


			/* log to ReceiptMaster.sqlite */
			$receipt_record = Receiptrecord::where(['receiptNo'=> $m->receiptNo, 'goodsTitle'=>$m->goodsTitle])->first();
			$receipt_record->serveTime = date("Y年m月d日 h:i:sa");
			$receipt_record->price     = $i->price;
			$receipt_record->progress  = "提供済み";
			$receipt_record->save();

			/* remove from ordered items */
			Datafromio::destroy($id);

			$message = "未清算注文へ転送しました。";
			return Redirect::route('dataFromIOs.index')->with('message', $message);
		}

        $id = Input::get('id');
		Datafromio::destroy($id);
		ReceiptLine::destroy($id);

        $message = "削除しました。";
		return Redirect::route('dataFromIOs.index')->with('message', $message);
	}

    public function clear()
    {
        Datafromio::truncate();
		ReceiptLine::truncate();
        return Redirect::route('dataFromIOs.index');
    }

}
