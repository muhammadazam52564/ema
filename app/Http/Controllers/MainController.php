<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Auth;
use App\Models\ManagerPermition;
use App\Models\ProductImage;
use App\Models\OrderItem;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use App\Models\Address;
use App\Models\Order;
use App\Models\Promo;
use App\Models\User;
use Carbon\Carbon;
use Redirect;
use URL;
// Super Admin 0
// Admin 1
// Agent 2
// User 3
// Rider 4
class MainController extends Controller
{
    //
    //  Category Funtions
    public function category(){

        $categories = Category::where('branch_id', auth()->user()->id)->get();
        $compacts = compact('categories');
        return Auth::user()->role == 1 ?  view('admin.categories', $compacts): view('agent.categories', $compacts);
    }
    public function add_category(){
        return Auth::user()->role == 1 ?  view('admin.addCategory'): view('agent.addCategory');
    }
    public function add_new_category(Request $request)
    {
        $validated  = $request->validate([
            'name'  => 'required|max:255'
        ]);
        $category               = new Category;
        $category->name         = $request->name;
        $category->branch_id    = auth()->user()->id;
        $category->save();
        return Auth::user()->role == 1 ? redirect()->route('admin.categories')->with('msg', 'Category Added Successfully'): "sorry";
    } 
    public function edit_category($id){
        $category = Category::find($id);
        $compacts = compact('category');
        return Auth::user()->role == 1 ?  view('admin.Editcategory', $compacts): view('agent.Editcategory', $compacts);
    }
    public function update_category(Request $request, $id)
    {
        $validated  = $request->validate([
            'name'  => 'required|max:255'
        ]);
        $category               = Category::find($id);
        $category->name         = $request->name;
        $category->save();
        return Auth::user()->role == 1 ? redirect()->route('admin.categories')->with('msg', 'Category Updated Successfully'): "sorry";
    } 
    public function delete_category($id)
    {
        $category = Category::find($id)->delete();
        return Redirect::back()->with('msg', 'Category Deleted Successfully');
    }

    //
    //  Product Funtions
    public function products($id){
        $products = Product::with('images')->where('category_id', $id)->where('parent', null )->get();
        $compacts = compact('products', 'id');
        // return $products;
        return Auth::user()->role == 1 ?  view('admin.product', $compacts): view('agent.product', $compacts);
    }
    public function add_product($id){
        $category = Category::find($id);
        $compacts = compact('category');
        return Auth::user()->role == 1 ?  view('admin.addProduct', $compacts): view('agent.addProduct', $compacts);
    }
    public function add_new_product(Request $request){
        try{

            // return $request->all();
            $validator = \Validator::make($request->all(), [
                // 'product_name'          => 'required|min:1',
                // 'product_qty'           => 'required|min:1',
                // 'product_price'         => 'required|min:1',
                'product_description'   => 'required|min:1',
                'type'                  => 'required|min:1',
                'product_category'      => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status'    => false,
                    'error'     => $validator->errors()->first(),
                    'data'      => null,
                ], 400);
            }
            else
            {
                if($request->type === 'sp'){
                    $product                = new Product;
                    $product->name          = $request->product_name;
                    $product->quantity      = $request->product_qty;
                    $product->price         = $request->product_price;
                    $product->description   = $request->product_description;
                    $product->category_id   = $request->product_category;
                    $product->type          = $request->type;
                    if ($product->save()) {
                        // return $request->all();
                        $images = $request->file;
                        foreach ($images as $image)
                        {
                            // $img_path =  $image->move('product_images/', time().'.'.$image->getClientOriginalExtension());
                            $newfilename = time() .'.'. $image->getClientOriginalExtension();
                            $image->move(public_path("product_images"), $newfilename);
                            $img_path = 'product_images/'.$newfilename;

                            $image = new ProductImage;
                            $image->image = $img_path;
                            $image->product_id = $product->id;
                            $status = $image->save();
                            // if (!$status) {
                            //     break;
                            // }
                        }
                        return response()->json([
                            'status'    => 200,
                            'message'   => 'Product Successfully Added ',
                            'data'      => null
                        ]  , 200);
                    }
                }

                if($request->type === 'vp')
                {
                    $varients               = json_decode($request->varients);
                    $product                = new Product;
                    $product->name          = $request->product_name;
                    $product->description   = $request->product_description;
                    $product->category_id   = $request->product_category;
                    $product->type          = 'vp';
                    if ($product->save())
                    {
                        $images = $request->file;
                        foreach ($images as $image)
                        {
                            // $img_path =  $image->move('product_images/', time().'.'.$image->getClientOriginalExtension());
                            // return $img_path;

                            $newfilename = time() .'.'. $image->getClientOriginalExtension();
                            $image->move(public_path("product_images"), $newfilename);
                            $img_path = 'product_images/'.$newfilename;

                            $image = new ProductImage;
                            $image->image = $img_path;
                            $image->product_id = $product->id;
                            $status = $image->save();
                        }
                        foreach ($varients as  $varient)
                        {
                            $sub_product = new Product;
                            $sub_product->name          = $varient->varient;
                            $sub_product->price         = $varient->price;
                            $sub_product->category_id   = $request->product_category;
                            $sub_product->quantity      = $varient->qty;
                            $sub_product->parent        = $product->id;
                            $sub_product->save();
                        }

                        return response()->json([
                            'status'    => 200,
                            'message'   => 'Product Successfully Added ',
                            'data'      => null
                        ]  , 200);
                    }
                }
                if($request->type === 'gp')
                {
                    $products               = json_decode($request->products);
                    $product                = new Product;
                    $product->name          = $request->product_name;
                    $product->price         = $request->price;
                    $product->description   = $request->product_description;
                    $product->category_id   = $request->product_category;
                    $product->type          = 'gp';
                    if ($product->save())
                    {
                        $images = $request->file;
                        foreach ($images as $image)
                        {
                            // $img_path =  $image->move('product_images/', time().'.'.$image->getClientOriginalExtension());
                            // return $img_path;

                            $newfilename = time() .'.'. $image->getClientOriginalExtension();
                            $image->move(public_path("product_images"), $newfilename);
                            $img_path    = 'product_images/'.$newfilename;

                            $image = new ProductImage;
                            $image->image = $img_path;
                            $image->product_id = $product->id;
                            $status = $image->save();
                        }
                        foreach ($products as  $subproduct)
                        {
                            $sub_product                = new Product;
                            $sub_product->name          = $subproduct->product;
                            $sub_product->quantity      = $subproduct->qty;
                            $sub_product->category_id   = $request->product_category;
                            $sub_product->parent        = $product->id;
                            $sub_product->save();
                        }

                        return response()->json([
                            'status'    => 200,
                            'message'   => 'Product Successfully Added ',
                            'data'      => null
                        ]  , 200);
                    }
                }
            }
        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'error' => $e->getMessage(),
                'data' => 0,
            ], 400);
        }
    }
    public function remove_product($id)
    {
        $product = Product::find($id);
        $product->delete();
        return back()->with('msg', 'deleted successfully');
        // $products = Product::where('parent')
    }
    //
    //  orders  Funtions
    public function orders(Request $request)
    {
        $orders = Order::with('users')->with('orderItems')->where('branch_id', auth()->user()->id)->get();
        $compacts = compact('orders');
        // return $orders;
        return Auth::user()->role == 1 ?  view('admin.orders', $compacts): view('agent.orders', $compacts);
    }

    //
    //  Promo  Funtions
    public function promo(Request $request)
    {
        $promos = Promo::where('branch_id', auth()->user()->id)->get();
        $compacts = compact('promos');
        return Auth::user()->role == 1 ?  view('admin.promo', $compacts): view('agent.promo', $compacts);
    }
    public function add_promo(){
        return Auth::user()->role == 1 ?  view('admin.addpromo'): view('agent.addpromo');
    }
    public function add_new_promo(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|max:255',
            'code'      => 'required|max:255',
            'discount'  => 'required|max:255',
            'expiry'    => 'required|max:255',
        ]);

        $promo = new Promo;
        $promo->name        = $request->name;
        $promo->code        = $request->code;
        $promo->discount    = $request->discount;
        $promo->expiry      = $request->expiry;
        $promo->branch_id   = auth()->user()->id;
        $promo->save();
        return Auth::user()->role == 1 ? redirect()->route('admin.promo'): "sorry";
    }
    public function edit_promo($id){

        $promo = Promo::find($id);
        $compacts = compact('promo');
        return Auth::user()->role == 1 ?  view('admin.editpromo', $compacts): view('agent.editpromo', $compacts);
    }
    public function update_promo(Request $request, $id)
    {
        $validated = $request->validate([
            'name'      => 'required|max:255',
            'code'      => 'required|max:255',
            'discount'  => 'required|max:255',
            'expiry'    => 'required|max:255',
        ]);

        $promo              = Promo::find($id);
        $promo->name        = $request->name;
        $promo->code        = $request->code;
        $promo->discount    = $request->discount;
        $promo->expiry      = $request->expiry;
        $promo->save();
        return Auth::user()->role == 1 ? redirect()->route('admin.promo'): "sorry";
    }
    public function delete_promo($id)
    {
        $promo = Promo::find($id)->delete();
        return Redirect::back()->with('msg', 'Ptomo deleted Successfully');
    }
    // sale Funtions
    public function sale()
    {
        return Auth::user()->role == 1 ?  view('admin.sales'): view('agent.sales');
    }
    // invoice Funtions
    public function invoice()
    {
        return Auth::user()->role == 1 ?  view('admin.invoices'): view('agent.invoices');
    }
    // customers Funtions
    public function customers()
    {
        $customers = User::where('role', '3')->get();
        $compacts = compact('customers');
        return Auth::user()->role == 1 ?
            view('admin.customers', $compacts) :
            view('agent.customers', $compacts);
    }
    public function del_customer($id)
    {
        $customer = User::find($id)->delete();
        return Redirect::back()->with('msg', 'deleted Successfully');
    }
    public function block_customer($id, $status)
    {
        // return $status;
        $customer = User::find($id);
        $customer->status = $status;
        if($customer->save())
        {
            return Redirect::back()->with('msg', 'Blocked Successfully');
        }
    }

    //
    // Manager Funtions
    public function manager(Request $request)
    {
        if ($request->has('id')){
            $manager = User::find($id);
        }
        else{
            $manager = new User;
        }
        $manager->name  = $request->name;
        $manager->email = $request->email;
        $manager->role  = 2;
        if($request->has('password')){
            $manager->password = $request->password;
        }
        if($manager->save()){
            return redirect('/admin/managers');
        }
    }
    public function managers()
    {
        $managers = User::where('role', '2')->get();
        $compacts = compact('managers');
        return Auth::user()->role == 1 ?
            view('admin.managers', $compacts) : '';
    }
    public function edit_manager($id)
    {
        $manager = User::find($id);
        $compacts = compact('manager');
        return Auth::user()->role == 1 ?
            view('admin.editManager', $compacts) : '';
            // view('agent.editManager', $compacts);
    }
    public function del_manager($id)
    {
        $customer = User::find($id)->delete();
        return Redirect::back()->with('msg', 'deleted Successfully');
    }
    public function block_manager($id, $status)
    {
        // return $status;
        $customer = User::find($id);
        $customer->status = $status;
        if($customer->save())
        {
            if ($status == 1) {
                return Redirect::back()->with('msg', 'Unblocked Successfully');
            }else{
                return Redirect::back()->with('msg', 'Blocked Successfully');
            }
        }
    }
    public function add_manager()
    {
        $permitions = ManagerPermition::select('id', 'name')->get();
        return Auth::user()->role == 1 ?  view('admin.add-manager', compact('permitions')): '';
    }

    //
    // Riders funtion
    public function riders()
    {
        $riders = User::where('role', '4')->get();
        $compacts = compact('riders');
        return Auth::user()->role == 1 ?
            view('admin.riders', $compacts) :
            view('agent.riders', $compacts);
        // return Auth::user()->role == 1 ?  view('admin.riders'): view('agent.riders');
    }
    public function approve_rider($id)
    {
        // return $id;
        $rider = User::find($id);
        $rider->status = 1;
        if($rider->save())
        {
            return Redirect::back()->with('msg', 'Rider Successfully Approved');
        }
    }
    public function block_rider($id, $status)
    {
        // return $status;
        $rider = User::find($id);
        $rider->status = $status;
        if($rider->save())
        {
            if ($status == 1) {
                return Redirect::back()->with('msg', 'Unblocked Successfully');
            }else{
                return Redirect::back()->with('msg', 'Blocked Successfully');
            }

        }
    }
}
