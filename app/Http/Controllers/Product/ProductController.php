<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderby('id','desc')->paginate(50);
        $type_menu = 'master-product';
        
        return view('pages.master-product',[
            'products' => $products,
            'type_menu' => $type_menu,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.master-product-create',[
            'type_menu' => 'master-product'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $product = $request->only([
                'name',
                'description'
            ]);
            Product::create($product);
            session()->put('msg',[
                'code'      => 'success',
                'status'    => 'success',
                'msg'       => 'Success Add Data'
            ]);
        } catch (\Throwable $th) {
            session()->put('msg', [
                'msg'=> $th->getMessage(),
                'code'=>'danger',
                'status'=>'danger'
            ]);
        }

        return redirect('/manageproduct');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('pages.master-product-detail',[
            'type_menu' => 'master-product',
            'product'   => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            $this->setMessage('success','Delete Data Success');
        } catch (\Throwable $th) {
            $this->setMessage('danger','Delete Data Faield');
        }

        return redirect('/manageproduct');
    }

    public function setMessage($code, $msg)
    {
        session()->put('msg',[
            'code'  => $code,
            'status'    => $code,
            'msg'       => $msg
        ]);
    }
}
