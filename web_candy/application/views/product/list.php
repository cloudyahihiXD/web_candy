<div class="container">
    <div class="card">
        <div class="card-header">
            Product List
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Subcategory</th>
                        <th scope="col">Price</th>
                        <th scope="col">Company name</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <th scope="row"><?php echo $product->id ?></th>
                            <td><?php echo $product->productName ?></td>
                            <td><?php foreach ($categories as $category): ?>
                                    <?php if ($category->id == $product->categoryid): ?>
                                        <?php echo $category->categoryName ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <td><?php foreach ($subcategories as $subcategory): ?>
                                    <?php if ($subcategory->id == $product->subcategoryid): ?>
                                        <?php echo $subcategory->subcategory ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                            <td><?php echo $product->productPrice ?></td> 
                            <td><?php echo $product->productCompany ?></td> 
                            <td>
                                <a href="<?php echo base_url('product/delete/'.$product->id) ?>" class="btn btn-danger">Delete</a>
                                <a href="<?php echo base_url('product/edit/'.$product->id) ?>" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
