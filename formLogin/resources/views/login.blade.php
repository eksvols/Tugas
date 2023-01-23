<form method="post" action="{{ route('login') }}">
    @csrf
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="form-group">
        <div class="g-recaptcha" data-sitekey="your_site_key"></div>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
