<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Address;
use App\Models\ProductImage;

class MainController extends Controller
{
    public function categories(Request $request)
    {
        try{
            $categories = Category::select('id', 'name')->get();
            foreach ($categories as $category)
            {
                $products = Product::where('category_id', $category->id)->where('parent', null)->select('id','name', 'quantity', 'price', 'description')->get();
                foreach ($products as $product) {
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
            if ($product->type == 'vp')
            {
                $product->sub_products = Product::where('parent', $product->id)
                                        ->select('id', 'name', 'quantity', 'price', 'description')
                                        ->get();
            }
            unset($product->type);
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




    public function sub_categories(Request $request)
    {
        try{
            $validator = \Validator::make($request->all(), [
                'category_id'   => 'required',
                'city'          => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'error' => $validator->errors()->first(),
                    'data' => null
                ], 400);
            }
            $category = SubCategory::where('category_id', $request->category_id)->where('city', $request->city)->get();
            return response()->json([
                'status'    => true,
                'message'     => 'sub category details',
                'data'      => $category->makeHidden(['verified_at', 'updated_at', 'created_at']),
            ], 200);

        } catch(\Exception $e){

            return response()->json([
                'status'    => false,
                'error'     => $e->getMessage(),
                'data'      =>  0,
            ], 400);
        }
    }

    public function trending(Request $request)
    {
        try{
            $service = Service::where('city', $request->city)->get();
            return response()->json([
                'status'    => true,
                'message'     => 'service details',
                'data'      => $service->makeHidden(['updated_at', 'created_at']),
            ], 200);

        } catch(\Exception $e){

            return response()->json([
                'status'    => false,
                'error'     => $e->getMessage(),
                'data'      =>  0,
            ], 400);
        }
    }

    public function search(Request $request)
    {
        try{
            $service = Service::where('city', $request->city)->where('name', 'LIKE',"%{$request->name}%")->get();
            return response()->json([
                'status'    => true,
                'message'     => 'service details',
                'data'      => $service->makeHidden(['updated_at', 'created_at']),
            ], 200);

        } catch(\Exception $e){

            return response()->json([
                'status'    => false,
                'error'     => $e->getMessage(),
                'data'      =>  0,
            ], 400);
        }
    }

    public function notifications(Request $request)
    {
        return "notifications";
    }

    public function banner(Request $request)
    {
        return "banner";
    }

    public function order(Request $request)
    {
        try{

            $validator = \Validator::make($request->all(), [
                'user_id'   => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'error'  => $validator->errors()->first(),
                    'data'   => null
                ], 400);
            }
            $order = new Order;
            $order->user_id = $request->user_id;
            $order->date    = $request->date;
            $order->time    = $request->time;
            $order->selected_address    = $request->selected_address;


            if($order->save()){
                foreach ($request->items as $order_items){
                    $item = new OrderItem;
                    $item->order_id = $order->id;
                    $item->service_id = $order_items['service_id'];
                    $item->save();
                    $service = Service::find($item->service_id);
                    $service->orders = $service->orders + 1;
                    $service->save();
                }
            }
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
