<ul>
    @foreach ($orders as $order)
        <li>
            Заказ #{{ $order->id }}: Менеджер {{ $order->manager->fullName }}
        </li>
    @endforeach
</ul>