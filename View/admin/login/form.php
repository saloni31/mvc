<div class="container bg-primary shadow-dark p-5 mt-5 ml-5">
	<div class="card shadow font-weight-bold border-0 h-100">
		<div class="row">
			<div class="col-sm-6">
				<img src="./images/page-3.jpg" class="h-100 w-100">
			</div>

			<div class="col-sm-6">
				<div class="text-center mt-4 mb-5">
					<h2 class="font-weight-bold"> Login </h2>
				</div>

				<form class="form ml-2 mr-2" method="post" action="<?php echo $this->getUrl('save') ?>">
					<div class="row mt-5">
						<div class="col-sm-12">
							<label for="username" class="form-label">Username
							</label>
							<input type="text" name="loginData[username]" id="username" class="form-control">
						</div>
					</div>

					<div class="row mt-4">
						<div class="col-sm-12">
							<label for="password" class="form-label">
								Password
							</label>
							<input type="password" name="loginData[password]" id="password" class="form-control">
						</div>
					</div>

					<div class="row mt-4">
						<div class="col-sm-6">
							<input type="submit" name="login" value="Login" class="form-control btn btn-dark">
						</div>
						<div class="col-sm-6">
							<input type="reset" name="reset" class="form-control btn btn-dark">
						</div>
					</div>

					<div class="text-center mt-4">
	                    <a class="" href="/forgot-password">
	                    	Forgot Password
	                    </a>
	                </div>
	                <div class="text-center mt-2">
	                    <a class="" href="/registration">Create an Account!</a>
	                </div>
				</form>
			</div>
		</div>
	</div>
</div>