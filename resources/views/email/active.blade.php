<body>
	<p>Chào {{ $data['name'] or "Username" }}. Bạn đã đăng ký thành công. Vui nhấp vào link bên dưới để xác nhận đăng ký tài khoản</p>
	http://localhost/ptudwb/active/{{ $data['active_code']}}
</body>
