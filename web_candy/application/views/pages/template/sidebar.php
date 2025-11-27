<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordion">
            <!-- Loop through categories -->
            <?php foreach ($category as $cate): ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $cate->id; ?>">
                                <?php echo $cate->categoryName; ?><i class="fa fa-angle-down"></i>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse<?php echo $cate->id; ?>" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <!-- Loop through subcategories for this category -->
                                <?php foreach ($subcategory as $key => $subcate): ?>
                                    <?php if ($subcate->categoryid === $cate->id): ?>
                                        <li><a href="<?php echo base_url('subcat/' . $subcate->id) ?>">
                                                <?php echo $subcate->subcategory; ?>
                                            </a></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="form-group">
            <h2>Sorted by</h2>
            <select class="form-control select-filter" id="select-filter">
                <option value="0">-----Sorted by-----</option>
                <option value="?letter=asc">A-Z</option>
                <option value="?letter=desc">Z-A</option>
                <option value="?price=asc">Low to high</option>
                <option value="?price=desc">High to low</option>
            </select>
        </div>
    </div>
</div>