<div class="container">
    <div clase="row">
        <h1> Add <?php echo $_GET["type"]; ?> </h1>
    </div>
    <div clase="row">
        <form method="post" action="/?page=add&type=<?php echo $_GET['type'] ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Hero">
            </div>
            <div class="mb-3">
                <label for="breed" class="form-label">Breed</label>
                <input type="text" class="form-control" id="breed" name="breed" placeholder="Labrador Retriever">
            </div>
            <div class="mb-3">
                <label for="remarks" class="form-label">Remarks</label>
                <textarea class="form-control" id="remarks" name="remarks" rows="3" placeholder="Loves cuddles"></textarea>
            </div>
            <div class="col-6"> 
                <a href="?page=cats" class="pull-right" style="float:left;">
                    <button type="button" class="btn btn-lg btn-outline-secondary pull-right">Cancel</button>
                </a>
            </div>
            <div class="col-6 pull-right"  style="float:right;"> 
                <button type="submit" class="btn  btn-lg  btn-outline-dark" style="float:right;">Save</button>
            </div>
        </form>
    </div>
</div>