<?php

namespace App\Http\Controllers;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaypalController extends Controller
{
  private function getAccessToken()
  {
    $response = Http::withoutVerifying()
      ->withBasicAuth(env('PAYPAL_CLIENT_ID'), env('PAYPAL_SECRET'))
      ->asForm()
      ->post('https://api-m.sandbox.paypal.com/v1/oauth2/token', [
        'grant_type' => 'client_credentials',
      ]);
    return $response['access_token'];
  }

  public function pay(Request $request)
  {
    $cart = session('cart', []);

    $total = 0;
    foreach ($cart as $item) {
      $total += $item['price'] * $item['quantity'];
    }

    $token = $this->getAccessToken();

    $response = Http::withToken($token)->post(
      'https://api-m.sandbox.paypal.com/v2/checkout/orders',
      [
        'intent' => 'CAPTURE',
        'purchase_units' => [
          [
            'amount' => [
              'currency_code' => 'MXN',
              'value' => $total,
            ],
          ],
        ],
        'application_context' => [
          'return_url' => route('paypal.success'),
          'cancel_url' => route('paypal.cancel'),
        ],
      ],
    );

    $approvalUrl = collect($response['links'])
      ->where('rel', 'approve')
      ->first()['href'];

    return redirect($approvalUrl);
  }

  public function success(Request $request)
  {
    $token = $this->getAccessToken();

    $response = Http::withToken($token)->post(
      'https://api-m.sandbox.paypal.com/v2/checkout/orders/' .
        $request->query('token') .
        '/capture',
    );

    $cart = session('cart', []);

    $total = 0;

    foreach ($cart as $item) {
      $total += $item['price'] * $item['quantity'];
    }

    // Crear venta
    $sale = Sale::create([
      'paypal_order_id' => $request->query('token'),
      'total' => $total,
      'status' => 'completed',
    ]);

    // Guardar productos vendidos
    foreach ($cart as $item) {
      SaleItem::create([
        'sale_id' => $sale->id,
        'product_id' => $item['product_id'],
        'quantity' => $item['quantity'],
        'price' => $item['price'],
      ]);

      // Descontar stock
      $product = Product::find($item['product_id']);

      if ($product) {
        $product->stock -= $item['quantity'];
        $product->save();
      }
    }

    // Vaciar carrito
    session()->forget('cart');

    return view('paypal.success', compact('response'));
  }

  public function cancel()
  {
    return view('paypal.cancel');
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
