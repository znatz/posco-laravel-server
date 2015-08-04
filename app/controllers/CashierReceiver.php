<?php

class CashierReceiver extends \BaseController
{
    public static function logToReceiptRecords($f)
    {
        $file_db = new PDO('sqlite:' . $f);
        $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $file_db->query('SELECT * FROM transactions;');
       foreach ($result as $m) {
           $receiptNo   = $m["receiptNo"];
           $receiptRecords = Receiptrecord::where('receiptNo', $receiptNo)->first();
           $receiptRecords->payment_id = $m['payment_id'];
           $receiptRecords->progress   = "支払い済み";
           $receiptRecords->save();
        }

        unlink($f);
    }

    public function index()
    {
        $file = basename($_FILES['file']['name']);

        if (move_uploaded_file($_FILES['file']['tmp_name'], $file)) {
            echo $file;
        } else {
            echo "error";
        }


        self::logToReceiptRecords($file);

    }

/*
 *
 class CashierReceiver extends \BaseController {


	public function index()
	{
		$file = basename($_FILES['file']['name']);

        if (move_uploaded_file($_FILES['file']['tmp_name'], $file)) {
            echo $file;
        } else {
            echo "error";
        }

	}

	public function create()
	{
		//
	}

	public function store()
	{
		//
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

*/
}