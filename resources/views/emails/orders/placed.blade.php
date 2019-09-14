@component('mail::message')
    # Orden recibida

    Gracias por su orden.

    **Id de Orden:** {{ $order->id }}

    **Email:** {{ $order->billing_email }}

    **Nombre:** {{ $order->billing_name }}

    **Total a pagar:** ${{ round($order->billing_total, 2) }}

    **Artículos ordenados**

    @foreach ($order->products as $product)
        Nombre: {{ $product->name }} <br>
        Precio: ${{ round($product->price, 2)}} <br>
        Cantidad: {{ $product->pivot->quantity }} <br>
    @endforeach

    Puede obtener más detalles sobre su pedido ingresando a nuestro sitio web.

    @component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
        Ir al sitio web
    @endcomponent

    Gracias de nuevo por elegirnos.

    Saludos,<br>
    {{ config('app.name') }}
@endcomponent
