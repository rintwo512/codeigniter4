<div class="container">
    <div class="row">
        <div class="col-12 col-sm8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
        <div class="container">
            <h3>Login</h3>
            <hr>
            <?php if(session()->get('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?=session()->get('success');?>
                </div>
            <?php endif ;?>
            <form action="/" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control"  value="<?=set_value('email');?>">
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" name="password" id="password" class="form-control"  value="">
                </div>
                <div class="row">
                    <div class="col-12 col-sm-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>

        </div>    
    </div>    
</div>