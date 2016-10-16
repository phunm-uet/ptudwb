$(document).ready(function() {
	$.validator.setDefaults({
    highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function(error, element) {
        if(element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertBefore(element);
        }
    }
});

	$.validator.addMethod('vnumail',function(value){
		return /^[a-z0-9](\.?[a-z0-9]){2,}@vnu\.edu.vn$/i.test(value);
	},"Phai nhap email vnu");

	$("form").validate({
		rules: {
			name : {
				required : true,
			},
			email: {
				required : true,
				email : true,
				vnumail : true,
				
			},
			username : {
				required : true,
				maxlength : 30
			},
			password : {
				required : true,
			},
			password_confirmation : {
				required : true,
				equalTo : "#password"
			}
		},

		messages : {
			name :{
				required : "Bạn phải nhập tên"
			},
			email: {
				required : "Email không đưọc bỏ trống",
				email : "Khống đúng định dạng email",
				vnumail : "Chỉ chấp nhận email VNU",
			},
			username : {
				required : "Không đưọc bỏ trống tên đăng nhập",
				maxlength : "Chiều dài tối đa là 30 kí tự"
			},
			password : {
				required : "Mật khẩu không được bỏ trống",
			},
			password_confirmation : {
				required :"Mật khẩu xác thực không được bỏ trống",
				equalTo : "Mật khẩu xác thực không khớp"
			}			
		}
	});
});