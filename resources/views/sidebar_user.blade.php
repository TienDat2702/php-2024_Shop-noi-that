<div class="info col-4">
    <div class="account-info">
        <h3 class="mb-3">Xin chào, {{ $user->first_name }}</h3>
        {{-- <div class="face">
            <img class="img-face " src="{{ asset('img/user.jpg') }}" alt="">
        </div> --}}
        <p class="customer-p d-flex align-items-center">
            {{ $user->email }}
        </p>
        <p class="customer-p d-flex align-items-center">
            {{ $user->phone }}
        </p>
        <p class="customer-p d-flex align-items-center">
            {{ $user->address }}
        </p>
    </div>
    <div class="controll-user">
        <ul class="p-0">
            <li>
                <a class="btn btn-link btn-user" href="{{ route('user', ['id' => auth()->user()->id]) }}">Đơn hàng</a>
            </li>
            <li>
                <a class="btn btn-link btn-user" href="{{ route('edit_user', ['id' => auth()->user()->id]) }}">Sửa thông tin</a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST" class="nav-link head-color fs-6" style="border: none; background: none;">
                    @csrf
                    <button type="submit" class="btn btn-link btn-user">
                        <i class="fa-solid fa-sign-out"></i> ĐĂNG XUẤT
                    </button>
                </form>        
            </li>
        </ul>
       
    </div>
    <div class="account-contact">
        <div class="account-contact__text"><p>Bạn có câu hỏi về đơn đặt hàng hoặc bình luận để chia sẻ?</p></div>
        <a class="customer-a" href="{{ route('contact') }}">LIÊN HỆ</a>
    </div>
</div>