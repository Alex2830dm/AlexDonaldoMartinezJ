<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Ventas;
use App\Models\Pagos;


class PaypalController extends Controller {
    public function createPaypal() {
        return view('ventas');
    }


    public function processPaypal(Request $request) {
        //dd($request);
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('processSuccess'),
                "cancel_url" => route('processCancel'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "MXN",
                        "value" => "1.00"
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('ventasPayPal')
                ->with('error', 'Error: Algo salió mal :(');

        } else {
            return redirect()
                ->route('ventasPayPal')
                ->with('error', $response['message'] ?? 'Error: Algo salió mal :(');
        }
    }

    public function processSuccess(Request $request) {
        //dd($request->all());
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $pagos = new Pagos;
            $pagos->token = $request->input('token');
            $pagos->PayerID = $request->input('PayerID');
            $pagos->save();

            $token = $request->input('token');
            $payerID = $request->input('PayerID');
            $venta = \DB::select('SELECT MAX(id) AS id, MAX(codigo) AS codigo FROM ventas');
            return view('ventas.pagos')->with(['token' => $token, 'payerID' => $payerID, 'venta' => $venta]);
            /* return redirect()
                ->route('ventasPayPal')
                ->with('success', 'Transacción completa.'); */
        } else {
            return redirect()
                ->route('ventasPayPal')
                ->with('error', $response['message'] ?? 'Error: Algo salió mal :)');
        }
    }

    public function processCancel(Request $request) {
        return redirect()
            ->route('ventasPayPal')
            ->with('error', $response['message'] ?? 'Ha cancelado la transacción.');
    }
    public function statusVentas(Request $request){
        //dd($request);
        $id_venta = $request->get('id_venta');
        $venta = Ventas::find($id_venta);
        $venta->estatus_pago = $request->get("estaus");
        $venta->payerID = $request->get("payerID");
        $venta->update();
        $status = '!Aprovado! El pago a traves de PayPal se realizo correctamente';
        return redirect('cliente/preventa')->with(compact('status'));
    }
}
