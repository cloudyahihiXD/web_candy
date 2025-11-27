<div class="container">
    <div class="card">
        <div class="card-header">
            Edit product
        </div>
        <div class="card-body">
            <?php
            if ($this->session->flashdata('success')) {
                ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success') ?>
                </div>
                <?php
            } else if ($this->session->flashdata('error')) {
                ?>
                    <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('error') ?>
                    </div>
                <?php
            }
            ?>
            <form action="<?php echo base_url('product/update/' . $products->id) ?>" method="POST"
                enctype="multipart/form-data">
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" class="form-control" required>
                        <option value="">Select Category</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category->id ?>" <?php echo ($category->id == $products->categoryid) ? 'selected' : ''; ?>>
                                <?php echo $category->categoryName ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                </script>
                <div class="form-group">
                    <label for="subcategory">Subcategory</label>
                    <select name="subcategory" class="form-control" required>
                        <option value="">Select Subcategory</option>
                        <?php
                        foreach ($subcategories as $subcategory): ?>
                            <option value="<?php echo $subcategory->id ?>" <?php echo ($subcategory->id == $products->subcategoryid) ? 'selected' : ''; ?>>
                                <?php echo $subcategory->subcategory ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="productName">Product Name</label>
                    <input type="text" name="productName" value="<?php echo $products->productName ?>"
                        placeholder="Enter Product Name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="productCompany">Product Company</label>
                    <input type="text" name="productCompany" value="<?php echo $products->productCompany ?>"
                        placeholder="Enter Product Company Name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="productprice">Product Price</label>
                    <input type="text" name="productprice" value="<?php echo $products->productPrice ?>"
                        placeholder="Enter Product Price" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="productDescription">Product Description</label>
                    <label for="productDescription">Product Description</label>
                    <textarea name="productDescription" placeholder="Enter Product Description" rows="6"
                        class="form-control"><?php echo $products->productDescription; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="productAvailability">Product Availability</label>
                    <select name="productAvailability" value="<?php echo $products->productAvailability ?>"
                        id="productAvailability" class="form-control" required>
                        <option value="In Stock">In Stock</option>
                        <option value="Out of Stock">Out of Stock</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="productimage1">Product Image 1</label>
                    <input type="file" name="productimage1" value="<?php echo $products->productImage1 ?>"
                        class="form-control-file" id="productimage1" required>
                    <img src="<?php echo base_url('uploads/products/' . $products->productImage1); ?>" width="150"
                        height="150" alt="Product Image 1">
                    <small>
                        <?php if (isset($error)) {
                            echo $error;
                        } ?>
                    </small>
                </div>
                <div class="form-group">
                    <label for="productimage2">Product Image 2</label>
                    <input type="file" name="productimage2" value="<?php echo $products->productImage2 ?>"
                        class="form-control-file" id="productimage2" required>
                    <img src="<?php echo base_url('uploads/products/' . $products->productImage2); ?>" width="150"
                        height="150" alt="Product Image 2">
                    <small>
                        <?php if (isset($error)) {
                            echo $error;
                        } ?>
                    </small>
                </div>
                <div class="form-group">
                    <label for="productimage3">Product Image 3</label>
                    <input type="file" name="productimage3" value="<?php echo $products->productImage3 ?>"
                        class="form-control-file" id="productimage3" required>
                    <img src="<?php echo base_url('uploads/products/' . $products->productImage3); ?>" width="150"
                        height="150" alt="Product Image 3">
                    <small>
                        <?php if (isset($error)) {
                            echo $error;
                        } ?>
                    </small>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>