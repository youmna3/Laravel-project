<?php

namespace App\Http\Controllers;

// use App\Models\Product;
use App\Interfaces\ProductRepositoryInterface;
use App\Http\Requests\ProductStoreRequest;
use App\Jobs\StatusJob;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private ProductRepositoryInterface $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function index()
    {
        //
        $products = $this->productRepository->getAllProducts();
        // StatusJob::dispatch()->delay(60);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {

        $validated = $request->validated();

        $this->productRepository->createProduct($validated);
        // StatusJob::dispatch();
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Request $request)
    // {
    //     //
    //     $product = $this->productRepository->getProduct($request->id);
    //     return view('Products.show', compact('products'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $product = $this->productRepository->getProduct($id);
        return view('Products.edit', compact('product'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, ProductStoreRequest $request)
    {
        //
        $validated = $request->validated();
        $this->productRepository->updateProduct($id, $validated);
        return redirect()->route('products.index');

    }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    public function destroy($id)
    {
        //
        $this->productRepository->deleteProduct($id);
        return redirect()->route('products.index');

    }

}