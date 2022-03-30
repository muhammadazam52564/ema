<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Address;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductImage;
use Carbon\Carbon;
use Redirect;
use URL;
// Admin 1
// Agent 2
// User 3
// Rider 4
class MainController extends Controller
{
    //
    //  Category Funtions
    //
    public function category(){

        $categories = Category::all();
        $compacts = compact('categories');
        return Auth::user()->role == 1 ?  view('admin.categories', $compacts): view('agent.categories', $compacts);
    }

    public function addNewCategory(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        return Auth::user()->role == 1 ? redirect()->route('admin.categories'): "sorry";
    }
    public function addCategory(){
        return Auth::user()->role == 1 ?  view('admin.addCategory'): view('agent.addCategory');
    }

    public function editCategory($id){

        $category = Category::find($id);
        $compacts = compact('category');
        return Auth::user()->role == 1 ?  view('admin.Editcategory', $compacts): view('agent.Editcategory', $compacts);
    }
    public function deleteCategory($id)
    {
        $category = Category::find($id)->delete();
        return Redirect::back()->with('msg', 'deleted Successfully');
    }

    //
    //  Product Funtions
    //
    public function products(){
        return Auth::user()->role == 1 ?  view('admin.product'): view('agent.product');
    }

    public function addProduct(){
        $categories = Category::all();
        $compacts = compact('categories');
        return Auth::user()->role == 1 ?  view('admin.addProduct', $compacts): view('agent.addProduct', $compacts);
    }

    public function addNewProduct(Request $request){
        try{

            // return $request->all();
            $validator = \Validator::make($request->all(), [
                'product_name'          => 'required|min:1',
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
                            $img_path =  $image->move('product_images/', time().'.'.$image->getClientOriginalExtension());
                            // return $img_path;
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
                            $img_path =  $image->move('product_images/', time().'.'.$image->getClientOriginalExtension());
                            // return $img_path;
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
            }
        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'error' => $e->getMessage(),
                'data' => 0,
            ], 400);
        }
    }

    //
    //  orders  Funtions
    //

    public function orders()
    {
        return Auth::user()->role == 1 ?  view('admin.orders'): view('agent.orders');
    }

    //
    // sale Funtions
    //
    public function sale()
    {
        return Auth::user()->role == 1 ?  view('admin.sales'): view('agent.sales');
    }

    //
    // invoice Funtions
    //
    public function invoice()
    {
        return Auth::user()->role == 1 ?  view('admin.invoices'): view('agent.invoices');
    }

    //
    // customers Funtions
    //
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
    // Managers Funtions
    //
    // Add or Edit manager
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
            // view('agent.managers', $compacts);
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
        return Auth::user()->role == 1 ?  view('admin.add-manager'): view('agent.add-manager');
    }

    //
    // Riders funtion
    //
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
