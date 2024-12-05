<!-- resources/views/client/orders/index.blade.php -->
@extends('layout.client')
@section('content')
    <div class="container py-5">
        <h2>Đơn hàng của tôi</h2>

        @if ($orders == null)
            <div class="alert alert-info">
                Bạn chưa có đơn hàng nào.
            </div>
        @else
            @foreach ($orders as $order)
                @if (in_array($order['orders']['deliveryStatus'], ['Đang xử lý', 'Đang vận chuyển']))
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Đơn hàng #{{ $order['orders']['orderId'] }}</h5>
                                    <p class="text-muted">{{ $order['orders']['date'] }}</p>
                                </div>
                                <div class="col-md-3">
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-medium
                                        {{ $order['orders']['deliveryStatus'] === 'Đang xử lý'
                                            ? 'bg-warning/10 text-warning'
                                            : ($order['orders']['deliveryStatus'] === 'Đang vận chuyển'
                                                ? 'bg-primary/10 text-primary'
                                                : 'bg-success/10 text-success') }}">
                                        {{ $order['orders']['deliveryStatus'] }}
                                    </span>
                                </div>
                                <div class="col-md-3">
                                    <strong>{{ number_format($order['orders']['total']) }}đ</strong>
                                </div>
                                <div class="col-md-3">
                                    <a href="{{ route('order.show', $order['orders']['orderId']) }}" class="btn btn-sm">Chi
                                        tiết</a>

                                    @if ($order['orders']['deliveryStatus'] === 'Đang xử lý')
                                        <form method="POST"
                                            action="{{ route('order.cancel', $order['orders']['orderId']) }}"
                                            class="d-inline">
                                            @csrf
                                            <button type="button"
                                                onclick="cancelOrder('{{ $order['orders']['orderId'] }}', event)"
                                                class="btn btn-sm btn-danger">
                                                Hủy đơn
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    </div>
@endsection

@push('scripts')
    <!-- Add SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function cancelOrder(orderId) {
            Swal.fire({
                title: 'Xác nhận hủy đơn',
                text: 'Bạn có chắc chắn muốn hủy đơn hàng này?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Không'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Đang xử lý...',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    $.ajax({
                        url: `/order/${orderId}/cancel`,
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Thành công!',
                                text: 'Đã hủy đơn hàng thành công',
                                icon: 'success'
                            }).then(() => {
                                window.location.reload();
                            });

                        },
                        error: function(xhr) {
                            Swal.fire({
                                title: 'Lỗi!',
                                text: 'Không thể hủy đơn hàng. Vui lòng thử lại sau.',
                                icon: 'error'
                            });
                        }
                    });
                }
            });
        }
    </script>
@endpush
