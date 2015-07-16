<?php

class ShopsController extends \BaseController
{

    /**
     * Display a listing of shops
     *
     * @return Response
     */
    public function index()
    {
        $shops = Shop::all();

        return View::make('shops.index', compact('shops'));
    }

    /**
     * Show the form for creating a new shop
     *
     * @return Response
     */
    public function create()
    {
        return View::make('shops.create');
    }

    /**
     * Store a newly created shop in storage.
     *
     * @return Response
     */
    public function store()
    {
        $shopValidator = Validator::make($data = Input::all(), Shop::$rules);

        if ($shopValidator->fails()) {
            return Redirect::back()->withErrors($shopValidator)->withInput();
        }


        /* Shop */
        if (Input::has('createShop')) Shop::create($data);

        if (Input::has('deleteShop')) {
            $s = Shop::where('Tenpo', Input::get('Tenpo'))->first();
            Shop::destroy($s->id);
        }

        if (Input::has('updateShop')) {

            $messages = array(
                'required' => '新しい店舗名を入力してください。',
            );

            $shopValidator = Validator::make($data = Input::all(), Shop::$update_rules, $messages);

            if ($shopValidator->fails()) {
                return Redirect::back()->withErrors($shopValidator)->withInput();
            }

            $s = Shop::where('Tenpo', Input::get('Tenpo'))->first();
            Shop::destroy($s->id);
            $data['Tenpo'] = $data['new_shopName'];
            Shop::create($data);
        }


        return Redirect::route('employees.index');


    }

    /**
     * Display the specified shop.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $shop = Shop::findOrFail($id);

        return View::make('shops.show', compact('shop'));
    }

    /**
     * Show the form for editing the specified shop.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $shop = Shop::find($id);

        return View::make('shops.edit', compact('shop'));
    }

    /**
     * Update the specified shop in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $shop = Shop::findOrFail($id);

        $shopValidator = Validator::make($data = Input::all(), Shop::$rules);

        if ($shopValidator->fails()) {
            return Redirect::back()->withErrors($shopValidator)->withInput();
        }

        $shop->update($data);

        return Redirect::route('shops.index');
    }

    /**
     * Remove the specified shop from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        Shop::destroy($id);

        return Redirect::route('shops.index');
    }

}
