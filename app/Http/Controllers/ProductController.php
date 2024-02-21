<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Size;
use App\Models\Price;
use App\Models\Color;
use App\Models\Product;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Http;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('items')->with('user')->paginate(100);
        $columnHeaders = Schema::getColumnListing('products'); // Assuming 'products' is your table name

        return view('products.index', compact('products', 'columnHeaders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $categories = Category::all();
    $sizes = Size::all();
    $colors = Color::all();

    return view('products.create', compact('categories', 'sizes','colors'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {   
        $productData = $request->only(['name', 'description', 'sku', 'status']);
        $productData['user_id'] = auth()->id(); // Assuming you're using authentication

        $product = Product::create($productData);

        

        $product->category()->attach($request->input('categories'));
        $itemsData = $request->input('items');
        foreach ($itemsData as $itemData) {
            
            
            
            
            
            $item = new Item();
            $item->product_id = $product->id;
    
            // Assign the size ID to the item
            $item->size_id = $itemData['size_id'];
    
            // You can also assign other attributes such as color, status, sku, etc. if needed
            $item->color_id = $itemData['color_id'];
            
            $item->sku = $itemData['sku'];
            $item->inventory = $itemData['inventory'];
            $item->weight = $itemData['weight'];
    
            // Save the item
            $item->save();
            if (isset($itemData['prices']) && is_array($itemData['prices'])) {
                foreach ($itemData['prices'] as $priceData) {
                    $price = new Price();
                    $price->item_id = $item->id;
                    $price->price = $priceData['price'];
                    $price->quantity = $priceData['quantity'];
                    $price->weight = $priceData['weight'];
                    $price->save();
                }
            }
    
            // You can perform other operations such as attaching prices, images, etc. here if needed
        }

        

        $imagesData = $request->file('images');
        
        foreach ($imagesData as $image) {
            
            $path = $image->store('images', 'public');
            $product->images()->create(['image' => $path]);
           
        }

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::where('id',$id)->with(['images','category','items'])->first();
        
        return view('products.show', compact('product'));
    }
    public function getProductItems(Request $request, $id)
    {
        $productItems = Item::where('product_id', $id)->select('sku', 'inventory', 'status')->get();

        return response()->json($productItems);
    }
    public function getProductBySKU(Request $request)
    {
        $sku = $request->input('sku');

        // Find the item by SKU
        $item = Item::select("id","product_id","status","inventory")->where('sku', $sku)->with('product:id,name')->first();

        if (!$item) {
            $item = (object) [
                'status' => 0,
                'inventory' => 0
            ];
        }

        return response()->json($item);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // Load all categories to display in the select dropdown
        $product->load('category');
        $categories = Category::all();
        $sizes = Size::all();
        $colors = Color::all();

        // Load all items, images, and prices associated with the product
        $items = $product->items()->with('prices')->get();
        $images = $product->with('images')->get();

        // Fetch status and inventory from the API
        $response = Http::withOptions(['verify' => false])->get('https://voxshipsapi.shikhartech.com/inventoryItems/' . $product->sku);
            
        if ($response->successful()) {
            $inventoryData = $response->json();

            // Pass the inventory data to the view
            return view('products.edit', compact('product', 'categories', 'items', 'images', 'sizes', 'colors', 'inventoryData'));
        } else {
            // Handle error when the API request fails
            // For example, you can set default values for status and inventory
            $inventoryData = ['status' => 0, 'inventory' => 0];

            // Pass the inventory data to the view
            return view('products.edit', compact('product', 'categories', 'items', 'images', 'sizes', 'colors', 'inventoryData'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {   
        //dd($request->all());
        $productData = $request->only(['name', 'description',  'status']);
        $product->update($productData);

        // Update the relationship with categories
        $product->category()->sync($request->input('categories'));

        // Remove existing items not present in the request
        $product->items()->whereNotIn('id', collect($request->input('items'))->pluck('id'))->delete();

         $itemsData = $request->input('items');
        foreach ($itemsData as $itemData) {
            $item = Item::updateOrCreate(
                ['id' => $itemData['id']], // Assuming 'id' is included in the request for each item
                [
                    'product_id' => $product->id,
                    'size_id' => $itemData['size_id'],
                    'color_id' => $itemData['color_id'],
                    'sku' => $itemData['sku'],
                    'inventory' => $itemData['inventory'],
                    'weight' => $itemData['weight'],
                ]
            );
            //dd($item);

            if (isset($itemData['prices']) && is_array($itemData['prices'])) {
                foreach ($itemData['prices'] as $priceData) {
                    Price::updateOrCreate(
                        ['id' => $priceData['id']], // Assuming 'id' is included in the request for each price
                        [
                            'item_id' => $item->id,
                            'price' => $priceData['price'],
                            'quantity' => $priceData['quantity'],
                            'weight' => $priceData['weight'],
                        ]
                    );
                }
            }

            // You can perform other operations such as updating prices, images, etc. here if needed
        }
        // $imagesData = $request->file('images');
        // foreach ($imagesData as $image) {
        //     $path = $image->store('images', 'public');
        //     $product->images()->create(['image' => $path]);
        // }

        // Redirect back to the product index page or any other appropriate route
        return redirect()->route('products.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}
