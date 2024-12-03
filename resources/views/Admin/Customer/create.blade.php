@extends('layout.admin')
@section('title', 'Admin Page')
@section('content')
<div class="w-full bg-gray-200 rounded-sm">
    <p class="text-center mt-10 text-3xl py-8">Thêm khách hàng mới</p>
    <form id="createCustomerForm" method="POST" action="{{ route('customer.store') }}" class="form mt-10">
        @csrf
        <div class="w-1/2 mx-auto p-3 border-2 border-lightgray/10 p-5 rounded-lg">
            <div class="h-24 bg-white dark:bg-dark dark:border-gray/20">
                <label for="name" class="text-base font-semibold mb-4">Họ và tên <span style="color: red;">*</span></label>
                <div class="space-y-4">
                    <input type="text" class="w-full rounded-sm h-12 pl-3 form-input text-lg" id="name" name="name" placeholder="Nhập họ và tên">
                    <span class="text-sm error-message mt-1" style="color: red;" id="name-error"></span>
                </div>
            </div>

            <div class="h-24 bg-white dark:bg-dark dark:border-gray/20">
                <label for="phone" class="text-base font-semibold mb-4">Số điện thoại <span style="color: red;">*</span></label>
                <div class="space-y-4">
                    <input type="text" class="w-full rounded-sm h-12 pl-3 form-input text-lg" id="phone" name="phone" placeholder="Nhập số điện thoại">
                    <span class="text-sm error-message mt-1" style="color: red;" id="phone-error"></span>
                </div>
            </div>

            <div class="h-24 bg-white dark:bg-dark dark:border-gray/20">
                <label for="email" class="text-base font-semibold mb-4">Email <span style="color: red;">*</span></label>
                <div class="space-y-4">
                    <input type="email" class="w-full rounded-sm h-12 pl-3 form-input text-lg" id="email" name="email" placeholder="Nhập email">
                    <span class="text-sm error-message mt-1" style="color: red;" id="email-error"></span>
                </div>
            </div>

            <div class="h-24 bg-white dark:bg-dark dark:border-gray/20">
                <label for="address" class="text-base font-semibold mb-4">Địa chỉ <span style="color: red;">*</span></label>
                <div class="space-y-4">
                    <input type="text" class="w-full rounded-sm h-12 pl-3 form-input text-lg" id="address" name="address" placeholder="Nhập địa chỉ" autocomplete="off">
                    <div id="suggestions" class="suggestions"></div>
                    <span class="text-sm error-message mt-1" style="color: red;" id="address-error"></span>
                </div>
            </div>

            <div class="w-full p-3">
                <button type="submit" class="btn bg-success border border-success rounded-full text-white transition-all duration-300 hover:bg-success/[0.85] hover:border-success/[0.85] text-lg py-3 px-6">
                    Thêm mới
                </button>
            </div>
        </div>
    </form>
</div>
@push('scripts')
<script>
    const addressKey = '{{ $addressKey }}';
    const addressInput = document.getElementById('address');
    const suggestionsContainer = document.getElementById('suggestions');
    const cityInput = document.getElementById('city');
    const districtInput = document.getElementById('district');
    const wardInput = document.getElementById('ward');
    let sessionToken = crypto.randomUUID();

    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    const debouncedSearch = debounce((query) => {
        if (query.length < 2) {
            suggestionsContainer.style.display = 'none';
            return;
        }


        fetch(`https://rsapi.goong.io/Place/AutoComplete?api_key=${addressKey}&input=${encodeURIComponent(query)}&sessiontoken=${sessionToken}`)
            .then(response => response.json())
            .then(data => {
                if (data.status === 'OK') {
                    suggestionsContainer.innerHTML = '';
                    suggestionsContainer.style.display = 'block';

                    data.predictions.forEach(prediction => {
                        const div = document.createElement('div');
                        div.className = 'suggestion-item';
                        div.textContent = prediction.description;
                        div.addEventListener('click', () => {
                            addressInput.value = prediction.description;
                            suggestionsContainer.style.display = 'none';

                            if (prediction.compound) {
                                cityInput.value = prediction.compound.province || '';
                                districtInput.value = prediction.compound.district || '';
                                wardInput.value = prediction.compound.commune || '';
                            }
                        });
                        suggestionsContainer.appendChild(div);
                    });
                }
            })
            .catch(error => console.error('Lỗi:', error));
    }, 300);

    addressInput.addEventListener('input', (e) => debouncedSearch(e.target.value));

    document.addEventListener('click', function (e) {
        if (!suggestionsContainer.contains(e.target) && e.target !== addressInput) {
            suggestionsContainer.style.display = 'none';
        }
    });
    $('#name').on('input', function() {
        $('#name-error').text('');
    });

    $('#phone').on('input', function() {
        $('#phone-error').text('');
    });

    $('#email').on('input', function() {
        $('#email-error').text('');
    });

    $('#address').on('input', function() {
        $('#address-error').text('');
    });

    $('#createCustomerForm').submit(function (e) {
        e.preventDefault();
        sessionToken = crypto.randomUUID();
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: $(this).serialize(),
            success: function (response) {
                if (response.success) {
                    toastr.options = {
                        timeOut: 1000,
                        onHidden: function() {
                            window.location.href = response.redirectUrl;
                        }
                    };
                    toastr.success("Tạo khách hàng thành công!");
                }
            },
            error: function (response) {
                if (response.status === 422) {
                    $('#name-error').text(response.responseJSON.errors.name);
                    $('#phone-error').text(response.responseJSON.errors.phone);
                    $('#email-error').text(response.responseJSON.errors.email);
                    $('#address-error').text(response.responseJSON.errors.address);
                }
            }
        });
    });
</script>
@endpush
@endsection
