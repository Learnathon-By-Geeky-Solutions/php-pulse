
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown active">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link "><i class="fas fa-fire"></i><span>Dashboard</span></a>
                
            </li>   
            <li class="menu-header">Starter</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Manage Categories</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?php echo e(route('admin.category.index')); ?>">Category</a></li>
                    <li><a class="nav-link" href="<?php echo e(route('admin.sub-category.index')); ?>">Sub Category</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Manage Website</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?php echo e(route('admin.slider.index')); ?>">Slider</a></li>
                    
                </ul>
            </li>
            
            



        </ul>

    </aside>
</div>
<?php /**PATH D:\project\ecommerce\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>