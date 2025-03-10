<?php $__env->startSection('content'); ?>
   <!-- Main Content -->
    <section class="section">
      <div class="section-header">
        <h1>Category</h1>
      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Create Category</h4>
              </div>
              <div class="card-body">
                <form action="<?php echo e(route('admin.category.store')); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                  <div class="form-group">
                    <label>Icon</label>
                    <div>
                      <button class="btn btn-primary" data-selected-class="btn-danger"
                        data-unselected-class="btn-info" role="iconpicker" name="icon"></button>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="">
                  </div>
                  <div class="form-group">
                    <label for="inputState">Status</label>
                    <select id="inputState" class="form-control" name="status">
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Create</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\ecommerce\resources\views/admin/category/create.blade.php ENDPATH**/ ?>