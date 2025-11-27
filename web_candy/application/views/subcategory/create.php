<div class="container">
    <div class="card">
        <div class="card-header">
            Create subcategory
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
            <form action="<?php echo base_url('subcategory/store') ?>" method="POST">
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" class="form-control" required>
                        <option value="">Select Category</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category->id ?>">
                                <?php echo $category->categoryName ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="subcategory">Subcategory Name</label>
                    <input type="text" name="subcategory" class="form-control" placeholder="Enter Subcategory Name"
                        required>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>