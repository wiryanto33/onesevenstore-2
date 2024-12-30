<div class="max-w-[480px] mx-auto bg-white min-h-screen relative shadow-lg pb-20">
        <!-- Header -->
        <div class="fixed top-0 left-1/2 -translate-x-1/2 w-full max-w-[480px] bg-white z-50">
            <div class="flex items-center h-16 px-4 border-b border-gray-100">
                <h1 class="text-lg font-medium">Pesanan Saya</h1>
            </div>
        </div>

        <!-- Main Content -->
        <div class="pt-20 px-4 space-y-4">
            <!-- Order Card 1 -->
            @forelse($orders as $order)
                <div class="border border-gray-200 rounded-2xl overflow-hidden">
                    <!-- Order Header -->
                    <div class="p-4 border-b border-gray-100 bg-gray-50">
                        <div class="flex items-center justify-between mb-2">
                            <div class="text-gray-400">
                                {{$order->order_number}}
                            </div>
                            <span class="{{$this->getStatusClass($order->status)}} font-medium">
                                {{$statusLabels[$order->status]}}
                            </span>
                        </div>
                        <div class="text-xs text-gray-500">
                            {{$order->created_at->format('d M Y H:i')}}
                        </div>
                    </div>

                    @foreach($order->items as $item)
                    <!-- Order Items -->
                    <div class="p-4">
                        <div class="flex gap-3">
                            <img src="{{$item->product->first_image_url}}"
                                alt="{{$item->product->name}}"
                                class="w-20 h-20 object-cover rounded-lg">
                            <div>
                                <h3 class="text-sm font-medium">{{$item->product->name}}</h3>
                                <div class="mt-2">
                                    <span class="text-sm text-gray-600">{{$item->quantity}} x </span>
                                    <span class="text-sm font-medium">Rp {{number_format($item->price, 0, ',', '.')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="px-4 py-3 border-t border-gray-100">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Total Belanja</span>
                            <span class="text-primary font-semibold">Rp {{number_format($order->total_amount, 0, ',', '.')}}</span>
                        </div>
                    </div>


                    <!-- Order Actions -->
                    <div class="p-4 border-t border-gray-100 flex justify-end gap-3">

                        <a href="{{route('order-detail', ['orderNumber' => $order->order_number])}}" class="px-4 py-2 text-sm bg-primary text-white rounded-full hover:bg-primary/90">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @empty
                <div class="flex flex-col items-center justify-center min-h-[60vh]">
                    <!-- Icon pesanan kosong -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                    <p class="text-xl font-medium text-gray-400 mb-2">Belum Ada Pesanan</p>
                    <p class="text-sm text-gray-400">Anda belum melakukan pemesanan apapun</p>

                    <!-- Tombol Mulai Belanja -->
                    <a href="{{ route('home') }}" class="mt-6 px-6 py-2 bg-primary text-white rounded-full text-sm hover:bg-primary/90 transition-colors">
                        Mulai Belanja
                    </a>
                </div>

            @endforelse
        </div>
    </div>
