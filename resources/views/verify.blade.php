<div style="width: 600px; margin: 0 auto">
    <div style="text-align: center">
        <h2> Xin chào {{ $user->name }}</h2>
        <p>Bạn đã đăng ký tài khoản tại hệ thống của chúng tôi</p>
        <p>Để có thể tiếp tục sử dụng cho các dịch vụ bạn vui lòng click vào nút kích hoạt bên dưới để kích hoạt tài khoản</p>
        <p>
            <a class="btn btn-primary" href="{{route('user.accept',['user' => $user->id, 'token' => $user->token ])}}">Kích hoạt</a>
        </p>
    </div>
</div>
