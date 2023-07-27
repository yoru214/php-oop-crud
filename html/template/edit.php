<div class="container">
    <div class="row">
        <div class="col-6"> 
        <h1> Edit <?php echo $_GET["type"]; ?> </h1>
        </div>
        <div class="col-6 pull-right"> 
            <a href="?page=<?php echo strtolower($_GET["type"]); ?>s" class="pull-right" style="float:right;">
            <button type="button" class="btn btn-lg btn-outline-secondary pull-right">Back to List</button>
            </a>
        </div>
    </div>
    <div clase="row">
        <form method="post" action="/?page=edit&type=<?php echo $_GET['type'] ?>&id=<?php echo $data->id(); ?>">
            <input type="hidden" name="id" value="<?php echo $data->id(); ?>" />
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name"  value="<?php echo $data->name(); ?>" placeholder="Hero">
            </div>
            <div class="mb-3">
                <label for="breed" class="form-label">Breed</label>
                <input type="text" class="form-control" id="breed" name="breed"  value="<?php echo $data->breed(); ?>" placeholder="Labrador Retriever">
            </div>
            <div class="mb-3">
                <label for="remarks" class="form-label">Remarks</label>
                <textarea class="form-control" id="remarks" name="remarks" rows="3" placeholder="Loves cuddles"><?php echo $data->remarks(); ?></textarea>
            </div>
            <div class="col-6"> 
                <a href="?page=delete&type=<?php echo $_GET["type"]; ?>&id=<?php echo $data->id(); ?>" class="pull-right" style="float:left;">
                    <button type="button" class="btn btn-lg btn-outline-danger pull-right">Delete</button>
                </a>
            </div>
            <div class="col-6 pull-right"  style="float:right;"> 
                <button type="submit" class="btn  btn-lg  btn-outline-dark" style="float:right;">Save</button>
            </div>
        </form>
    </div>
</div>