<form action="<?php echo e(route('promotions.store', ['restaurant' => $restaurantId])); ?>" method="POST"
    enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <input type="text" name="title" placeholder="Title">
    <textarea name="description" placeholder="Description"></textarea>
    <input type="file" name="image">
    <button type="submit">Create Promotion</button>
</form>
<?php /**PATH C:\xampp\htdocs\reservation\resources\views/restaurant/promotioncreate.blade.php ENDPATH**/ ?>