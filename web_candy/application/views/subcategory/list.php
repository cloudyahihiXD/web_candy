<div class="container">
    <div class="card">
        <div class="card-header">
            Subcategory List
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Subcategory Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($subcategories as $subcategory): ?>
                        <tr>
                            <th scope="row"><?php echo $subcategory->id ?></th>
                            <td><?php echo $subcategory->subcategory ?></td>
                            <td><?php foreach ($categories as $category): ?>
                                    <?php if ($category->id == $subcategory->categoryid): ?>
                                        <?php echo $category->categoryName ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <a href="<?php echo base_url('subcategory/delete/'.$subcategory->id) ?>" class="btn btn-danger">Delete</a>
                                <a href="<?php echo base_url('subcategory/edit/'.$subcategory->id) ?>" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
