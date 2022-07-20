<template>
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Login</div>
                        <div class="card-body">

                            <div><!--{{ route('user.login') }}-->
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input id="email" class="form-control" v-model="email" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" v-model="password" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="checkbox">
                                            <label>
                                                <a href="../forget-password">Reset Password</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <button @click="login" type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                </div>
                                <div class="flex items-center justify-end mt-4">
                                    <a href="google">
                                        <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="margin-left: 3em;">
                                    </a>
                                    <a class="ml-1 btn btn-primary" href="facebook" style="margin-top: 0px !important;background: blue;color: #ffffff;padding: 5px;border-radius:7px;" id="btn-fblogin">
                                        <i class="fa fa-facebook-square" aria-hidden="true"></i> Login with Facebook
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
export default {
    name: "Login",
    data: () => ({
        email: '',
        password: ''
    }),
    methods: {
        login () {
            axios.post ('/auth/login/vue',{
                email: this.email,
                password: this.password
            })
                .then(function () {
                    location.reload();
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    },
}
</script>

<style scoped>

</style>
