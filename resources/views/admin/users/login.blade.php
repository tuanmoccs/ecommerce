<!DOCTYPE html>
<html lang="en">
    <head>
        @include('admin.head')
    </head>
    <body>
        <div class="layer"></div>
        <main class="page-center" style = "display: flex; justify-content: center;align-items: center">
            <article class="sign-up" style="height: 400px; width: 350px; border: none;
            border-radius: 15px; margin-top: 100px; display: block">
                <h1 class="sign-up__title">Welcome back!</h1>
                <p class="sign-up__subtitle">Sign in to your account to continue</p>
                @include('admin.alert')
                <form class="sign-up-form form" action="/admin/users/login/store" method="post">
                    <label class="form-label-wrapper">
                        <p class="form-label">Email</p>
                        <input class="form-input" name= "email" type="email" placeholder="Enter your email" required>
                    </label>
                    <label class="form-label-wrapper">
                        <p class="form-label">Password</p>
                        <input class="form-input" type="password" name = "password" placeholder="Enter your password" required>
                    </label>
{{--                    //<a class="link-info forget-link" href="##">Forgot your password?</a>--}}
                    <label class="form-checkbox-wrapper">
                        <input class="form-checkbox" type="checkbox" name = "remember"required>
                        <span class="form-checkbox-label">Remember me next time</span>
                    </label>
                    <button class="form-btn primary-default-btn transparent-btn">Sign in</button>
                    @csrf
                </form>
            </article>
        </main>
        <!-- Chart library -->
        @include('admin.footer')
    </body>
</html>
