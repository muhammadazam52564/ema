<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Address;
use App\Models\Promo;
use App\Models\User;
use App\Models\Like;
use App\Models\ProductImage;

class MainController extends Controller
{
    public function categories(Request $request)
    {
        try{
            $categories = Category::select('id', 'name')->get();
            foreach ($categories as $category)
            {
                $products = Product::with('images')->where('category_id', $category->id)->where('parent', null)->select('id','name', 'quantity', 'price', 'description', 'type')->get();
                foreach ($products as $product) {
                    if ($product->type == 'vp')
                    {
                        $product->price = "from ". Product::where('parent', $product->id)
                                                ->where("type", "sub_product")
                                                ->orderBy('price', 'ASC')
                                                ->select('price')
                                                ->first()->price;
                        unset($product->type);
                    }
                    $product->images = ProductImage::where('product_id', $product->id)->select('image')->get();
                }
                $category->products = $products;

            }
            return response()->json([
                'status'    => true,
                'message'   => 'category details',
                'data'      =>  $categories,
            ], 200);

        } catch(\Exception $e){

            return response()->json([
                'status'    => false,
                'error'     => $e->getMessage(),
                'data'      =>  null,
            ], 400);
        }
    }
    public function product($id)
    {
        try{
            $product = Product::with('images')->where('id', $id)->select('id', 'name', 'quantity', 'price', 'description', 'type')->first();
            if ($product->type == 'sp')
            {
                $product->sub_products = [];

                $product->adons = Product::where('parent', $product->id)->where('type', 'addon')
                                ->select('id', 'name', 'price')
                                ->get();
            }
            if ($product->type == 'vp')
            {
                $product->price = "from ". Product::where('parent', $product->id)
                                        ->where("type", "sub_product")
                                        ->orderBy('price', 'ASC')
                                        ->select('price')
                                        ->first()->price;
                $product->sub_products = Product::where('parent', $product->id)
                                            ->where("type", "sub_product")
                                            ->orderBy('price', 'ASC')
                                            ->select('id', 'name', 'quantity', 'price')
                                            ->get();

                $product->adons = Product::where('parent', $product->id)
                                        ->where("type", "addon")
                                        ->select('id', 'name', 'price')
                                        ->get();
            }
            if ($product->type == 'gp')
            {
                $product->sub_products = Product::where('parent', $product->id)
                                        ->where("type", "sub_product")
                                        ->select('id', 'name', 'quantity', 'price')
                                        ->get();
                $product->addons = Product::where('parent', $product->id)
                                        ->where("type", "addon")
                                        ->select('id', 'name', 'price')
                                        ->get();
            }
            // unset($product->type);
            return response()->json([
                'status'    => true,
                'message'   => 'Product details',
                'data'      => $product,
            ], 200);

        } catch(\Exception $e){

            return response()->json([
                'status'    => false,
                'error'     => $e->getMessage(),
                'data'      =>  null,
            ], 400);
        }
    }
    public function notifications(Request $request){
        return "notifications";
    }

    public function branches(Request $request)
    {
        $branches = User::where('role', 1)->get();
        return response()->json([
            'status'    => true,
            'message'   => 'Order List',
            'data'      => $branches
        ], 200);
    }

    public function like_product(Request $request)
    {
        try{
            $validator = \Validator::make($request->all(), [
                'user_id'          => 'required',
                'product_id'       => 'required',
            ]);
            if ($validator->fails()){
                return response()->json([
                    'status' => false,
                    'error' => $validator->errors()->first(),
                    'data' => null
                ], 400);
            }else{
                if (Like::where('user_id', $request->user_id)->where('product_id', $request->product_id)->count() > 0) 
                {
                    return response()->json([
                        "status"    => true,
                        "message"   => "* Already Liked",
                        "data"      => null
                    ], 200);
                }
                $like               = new Like;
                $like->user_id     = $request->user_id;
                $like->product_id  = $request->product_id;
                $like->save();
                return response()->json([
                    "status"    => true,
                    "message"   => "Liked Successfully",
                    "data"      => null
                ], 200);
            }
        }catch(\Exception $e){
            return response()->json([
                'status'    => false,
                'error'     => $e->getMessage(),
                'data'      => null
            ], 400);
        }
    }

    public function unlike_product(Request $request)
    {
        try{
            $validator = \Validator::make($request->all(), [
                'user_id'          => 'required',
                'product_id'       => 'required',
            ]);
            if ($validator->fails())
            {
                return response()->json([
                    'status' => false,
                    'error' => $validator->errors()->first(),
                    'data' => null
                ], 400);
            }
            else{
                $like = Like::where('user_id', $request->user_id)->where('product_id', $request->product_id)->first();
                $like->delete();
                return response()->json([
                    'status'    => true,
                    'message'   => "Like Removed successfully ",
                    'data'      => null
                ], 200);
            }
        }catch(\Exception $e){
            return response()->json([
                'status'    => false,
                'error'     => $e->getMessage(),
                'data'      => null
            ], 400);
        }
    }
    public function favorite_list($user_id)
    {
        try{
            $ids = Like::where('user_id', $user_id)->pluck('product_id');
            // return $ids;
            $products = Product::whereIn('id', $ids)
                        // ->select("id", "name", "email", "phone", "description", "profile_image")
                        ->get();
            return response()->json([
                'status'    => true,
                'message'   => "Liked  products list",
                'data'      => $products
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'status'    => false,
                'error'     => $e->getMessage(),
                'data'      => null
            ], 400);
        }
    }

    public function vouchers(Request $request)
    {
        try{
            $promos = Promo::all();
            return response()->json([
                'status'    => true,
                'message'   => "vouchers list",
                'data'      => $promos
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'status'    => false,
                'error'     => $e->getMessage(),
                'data'      => null
            ], 400);
        }
    }

    public function orders($user_id)
    {
        try{
            $orders = Order::where('user_id', $user_id)->get();
            return response()->json([
                'status'    => true,
                'message'   => 'Order List',
                'data'      => $orders
            ], 200);
        } catch(\Exception $e){
            return response()->json([
                'status'    => false,
                'error'     => $e->getMessage(),
                'data'      =>  null,
            ], 400);
        }
    }
    public function order($id)
    {
        try{
            $order = Order::with('orderItems')->find($id);
            foreach ($order->orderItems as  $item) 
            {
                $item->product = Product::with('images')->find($item->product_id);
                if ($item->product->parent !== null) 
                {
                    $parent = Product::with('images')->find($item->product->parent);  
                    $item->product->name =  $parent->name;
                    unset($item->product->images);
                    $item->product->images = $parent->images;
                }
            }
            return $order->orderItems;
            return response()->json([
                'status'    => true,
                'message'   => 'Order List',
                'data'      => $order
            ], 200);
        } catch(\Exception $e){
            return response()->json([
                'status'    => false,
                'error'     => $e->getMessage(),
                'data'      =>  null,
            ], 400);
        }
    }

    public function add_order(Request $request){
        try{
            $validator = \Validator::make($request->all(), [
                'user_id'       => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'error'  => $validator->errors()->first(),
                    'data'   => null
                ], 400);
            }
            $amount             = 0;
            $order              = new Order;
            $order->user_id     = $request->user_id;
            $order->branch_id   = $request->branch_id;
            $order->address_id  = $request->address_id;

            if($order->save()){
                foreach ($request->items as $order_item){
                    $item               = new OrderItem;
                    $item->order_id     = $order->id;
                    $item->product_id   = $order_item['id'];
                    $item->qty          = $order_item['qty'];
                    $item->save();

                    $amount = $amount +  Product::find($order_item['id'])->first()->price * $order_item['qty'];
                }
            }
            $order->amount = $amount;
            $order->save();

            return response()->json([
                'status'    => true,
                'message'   => 'Order Succesfully Submitted',
                'data'      => null,
            ], 200);

        } catch(\Exception $e){
            return response()->json([
                'status'    => false,
                'error'     => $e->getMessage(),
                'data'      =>  null,
            ], 400);
        }
    }

}
