<div class="container">

    <div class="row">
        <div class="col-6"> 
            <h1>Cat Registry</h1>
        </div>
        <div class="col-6 pull-right"> 
            <a href="?page=add&type=Cat" class="pull-right" style="float:right;">
            <button type="button" class="btn btn-lg btn-outline-dark pull-right">Add</button>
            </a>
        </div>
    </div>

    <div class="row">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Breed</th>
                <th scope="col">Remarks</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $pet){ ?>
                <tr>
                <th scope="row"><?php echo $pet["id"]; ?></th>
                <td><a href="/?page=edit&type=Cat&id=<?php echo $pet["id"]; ?>"><?php echo $pet["name"]; ?></a></td>
                <td><?php echo $pet["breed"]; ?></td>
                <td><?php echo $pet["remarks"]; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>