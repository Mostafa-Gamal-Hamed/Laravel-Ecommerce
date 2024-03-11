<?php

namespace App\Http\Controllers;

use App\Mail\AdminMail;
use App\Models\Order;
use App\Models\User;
use App\Models\userOrders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;
use Vonage\Client;
use Vonage\Client\Credentials\Basic;
use Vonage\SMS\Message\SMS;

class UserOrdersController extends Controller
{
    public function index(Request $request)
    {
        $color  = $request->cookie("theme");
        $orders = Order::all();
        $count  = Order::count();
        return view("admin.Users.orders",compact("color","orders","count"));
    }

    public function shippedDate(Request $request , $id)
    {
        $request->validate(["shippedDate"=>"required|date"]);
        $order = Order::findOrFail($id);
        $order->update(["shippedDate"=>$request->shippedDate]);
        return redirect()->back()->with("success","Updated Successfully");
    }

    public function status(Request $request , $id)
    {
        $request->validate(["status"=>"required"]);
        $order = Order::findOrFail($id);
        $order->update(["status"=>$request->status]);
        if($request->status == "delivered") {
            userOrders::create([
                "orderDate"=>$order->orderDate,
                "shippedDate"=>$order->shippedDate,
                "product_id"=>$order->product_id,
                "quantity"=>$order->quantity,
                "user_id"=>$order->user_id
            ]);
        }
        return redirect()->back()->with("success","Updated to $request->status Successfully");
    }

    public function show(string $id,Request $request)
    {
        $color = $request->cookie("theme");
        $order = Order::findOrFail($id);
        return view("admin.Users.showOrder",compact("color","order"));
    }

    public function download(string $id)
    {
        $order = Order::findOrFail($id);
        $pdf   = PDF::loadView("admin.Users.download", compact("order"));
        return $pdf->download("order.pdf");
    }

    public function searchOrder(Request $request) {
        $date   = $request->date;
        $key    = $request->search;
        if (empty($date)) {
            $request->validate(["search"=>"required|numeric"]);
            $orders = Order::where("id","LIKE","%$key%")->get();
        } elseif(empty($key)) {
            $request->validate(["date"=>"required|date"]);
            $orders = Order::where("orderDate","LIKE","%$date%")->get();
        }else{
            $request->validate(["date"=>"required|date","search"=>"required|numeric"]);
            $orders = Order::where("id","LIKE","%$key%")->where("orderDate","LIKE","%$date%")->get();
        }
        $count  = $orders->count();
        $color  = $request->cookie("theme");
        return view("admin.Users.orders",compact("orders","count","color"));
    }

    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->back()->with("success","Order Deleted Successfully");
    }

    /// Send message ///
    // Send email
    public function message($id,Request $request) {
        $color = $request->cookie("theme");
        $user  = User::findOrFail($id);
        return view("admin.Users.message",compact("color","user"));
    }

    public function email(Request $request) {
        $request->validate([
            "name"=>"required|min:3",
            "email"=>"required|email",
            "body"=>"required"
        ]);
        $data = [
            "name"=>$request->name,
            "email"=>$request->email,
            "subject"=>$request->subject,
            "body"=>$request->body
        ];
        Mail::to("$request->email")->send(new AdminMail($data));
        return redirect()->back()->with("success","Message Send Successfully");
    }

    // Send sms
    public function sms(Request $request) {
        $request->validate([
            "name"=>"required|min:3",
            "phone"=>"required|min:10",
            "message"=>"required"
        ]);
        $basic  = new Basic("c4f42a72", "Wt3wPclb2uvKPthB");
        $client = new Client($basic);
        $response = $client->sms()->send(
            new SMS("01141669674", "RESTING CLOTHES", "Clint Name: $request->name \n Clint Number:$request->phone \n $request->message")
        );

        $message = $response->current();
        if ($message->getStatus() == 0) {
            return redirect()->back()->with("success","The message was sent successfully\n");
        } else {
            return redirect()->back()->with("success","The message failed with status: " . $message->getStatus() . "\n");
        }
    }
}
