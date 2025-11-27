<div class="container">
    <div class="card">
        <div class="card-header">
            Category List
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $category): ?>
                        <tr>
                            <th scope="row"><?php echo $category->id ?></th>
                            <td><?php echo $category->categoryName ?></td>
                            <td><?php echo $category->categoryDescription ?></td>
                            <td>
                                <a href="<?php echo base_url('category/delete/'.$category->id) ?>" class="btn btn-danger">Delete</a>
                                <a href="<?php echo base_url('category/edit/'.$category->id) ?>" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
