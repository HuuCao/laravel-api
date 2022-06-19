<h1>Thêm chuyên mục</h1>

<form method="POST" action="<?php echo route('categories.add') ?>">
    <div>
        <input type="text" name="category_name" placeholder="Nhập tên..." value="<?php echo old('category_name') ?>">
    </div>
    <?php echo csrf_field(); ?>
    <!-- <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> -->
    <button type="submit">Thêm chuyên mục</button>
</form>