<div class="container">
    <div class="card">
        <div class="card-header">
            Create product
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
            <form action="<?php echo base_url('product/store') ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control" required
                        onchange="getSubcat(this.value)">
                        <option value="">Select Category</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category->id ?>">
                                <?php echo $category->categoryName ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <script>
                    function getSubcat(categoryId) {
                        document.getElementById("demo").innerHTML = "You selected: " + categoryId;
                    }
                </script>
                <p id="demo"></p>
                </script>
                <div class="form-group">
                    <label for="subcategory">Subcategory</label>
                    <select name="subcategory" id="subcategory" class="form-control" required>
                        <option value="">Select Subcategory</option>

                        <?php
                        foreach ($subcategories as $subcategory): ?>
                            <option value="<?php echo $subcategory->id ?>">
                                <?php echo $subcategory->subcategory ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="productName">Product Name</label>
                    <input type="text" name="productName" placeholder="Enter Product Name" class="form-control"
                        required>
                </div>
                <div class="form-group">
                    <label for="productCompany">Product Company</label>
                    <input type="text" name="productCompany" placeholder="Enter Product Company Name"
                        class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="productprice">Product Price</label>
                    <input type="text" name="productprice" placeholder="Enter Product Price" class="form-control"
                        required>
                </div>
                <div class="form-group">
                    <label for="productDescription">Product Description</label>
                    <textarea name="productDescription" placeholder="Enter Product Description" rows="6"
                        class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="productAvailability">Product Availability</label>
                    <select name="productAvailability" id="productAvailability" class="form-control" required>
                        <option value="In Stock">In Stock</option>
                        <option value="Out of Stock">Out of Stock</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="productimage1">Product Image 1</label>
                    <input type="file" name="productimage1" class="form-control-file" required>
                    <small>
                        <?php if (isset($error)) {
                            echo $error;
                        } ?>
                    </small>
                </div>
                <div class="form-group">
                    <label for="productimage2">Product Image 2</label>
                    <input type="file" name="productimage2" class="form-control-file" required>
                    <small>
                        <?php if (isset($error)) {
                            echo $error;
                        } ?>
                    </small>
                </div>
                <div class="form-group">
                    <label for="productimage3">Product Image 3</label>
                    <input type="file" name="productimage3" class="form-control-file">
                    <small>
                        <?php if (isset($error)) {
                            echo $error;
                        } ?>
                    </small>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#category').change(function() {
            var categoryId = $(this).val();
            if (categoryId) {
                $.ajax({
                    type: 'GET',
                    url: '<?php echo base_url('product/getSubcategories/'); ?>' + categoryId,
                    success: function(response) {
                        var subcategorySelect = $('#subcategory');
                        subcategorySelect.empty();
                        subcategorySelect.append('<option value="">Select Subcategory</option>');
                        $.each(response, function(index, subcategory) {
                            subcategorySelect.append('<option value="' + subcategory.id + '">' + subcategory.subcategory + '</option>');
                        });
                    },
                    error: function() {
                        console.error('Error fetching subcategories');
                    }
                });
            } else {
                $('#subcategory').empty();
            }
        });
    });
</script> -->