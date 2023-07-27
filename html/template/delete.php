<div class="container">
    <div class="row">
      
    </div>
    <div clase="row">
        <div class="card" style="width: 28rem; height: 18rem; margin:0 auto;">
            <div class="card-body">
            <h5 class="card-title">Confirm Delete</h5>
            <p class="card-text">Are you sure you want to delete <b style="color: maroon;">"<?php echo $data->name(); ?>"</b> from <?php echo $_GET["type"]; ?>  registry?</p>
            <br><br>
            <div class="col-6"> 
                <a href="?page=edit&type=<?php echo $_GET["type"]; ?>&id=<?php echo $data->id(); ?>" class="pull-right" style="float:left;">
                    <button type="button" class="btn btn-lg btn-outline-secondary pull-right">Cancel</button>
                </a>
            </div>
            <div class="col-6 pull-right"  style="float:right;"> 
                <form method="post" action="/?page=delete&type=<?php echo $_GET['type'] ?>&id=<?php echo $data->id(); ?>">
                <input type="hidden" name="id" value="<?php echo $data->id(); ?>" />
                <button type="submit" class="btn  btn-lg  btn-outline-danger" name="delete" style="float:right;">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>