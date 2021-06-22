@extends('layout')
@section('content')
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng nhập tài khoản</h2>
						<form action="{{URL::to('login-customer')}}" method="POST">
						{{csrf_field()}}
							<input type="text" name="account_email" placeholder="E-mail" />
							<input type="password" name="account_password" placeholder="Password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								ghi nhớ
							</span>
							<button type="submit" class="btn btn-default">Đăng nhập</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Đăng kí tài khoản</h2>
						<form action="{{URL::to('add-customer')}}" method="POST">
                            {{csrf_field()}}
							<input type="text" name="customer_name" placeholder="Name"/>
							<input type="email" name="customer_email" placeholder="Email Address"/>
							<input type="password" name="customer_password" placeholder="Password"/>
                            <input type="text" name="customer_phone" placeholder="Phone Number"/>
							<button type="submit" class="btn btn-default">Đăng kí</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
</section><!--/form-->
@endsection