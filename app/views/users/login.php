<form method="post" action="<?= route('user/check') ?>">
    <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" name="email" class="form-control" id="email">
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password"  name="password" class="form-control" id="pwd">
    </div>
    <div class="checkbox">
        <label><input type="checkbox" name="remember" > Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>