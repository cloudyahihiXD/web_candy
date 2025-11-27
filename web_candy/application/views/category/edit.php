<div class="container">
    <div class="card">
        <div class="card-header">
            Edit Category
        </div>
        <div class="card-body">
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success') ?>
                </div>
            <?php elseif ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('error') ?>
                </div>
            <?php endif; ?>
            <form action="<?php echo base_url('category/update/'.$categories->id) ?>" method="POST">
                <div class="form-group">
                    <label for="categoryName">Category Name:</label>
                    <input type="text" class="form-control" id="categoryName" name="category" placeholder="Enter Category Name" value="<?php echo $categories->categoryName ?>" required>
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="5"><?php echo $categories->categoryDescription ?></textarea>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
