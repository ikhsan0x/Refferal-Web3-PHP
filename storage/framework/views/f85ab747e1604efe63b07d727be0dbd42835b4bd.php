

   <?php $__env->startSection('content'); ?>
     <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <br><br>
          <!-- Card stats -->
          <div class="row">
          
          
           
          </div>
        </div>
      </div>
    </div>
   <div class="container-fluid mt--6">
      
      <div class="row">
        
        <div class="col-xl-4">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0"> User</h3>
                </div>
                <div class="col text-right">
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col"> Address</th>
                    <th scope="col">Total Balance</th>
                    <th scope="col">Created_at</th>
                  </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <th scope="row">
                      <?php echo e($users->address); ?>

                    </th>
                    <td>
                      <?php echo e($users->balance); ?> <?php echo e($manager->currency_name); ?>

                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2"><?php echo e($users->created_at); ?></span>
                       
                      </div>
                    </td>
                    
                  </tr>
                 
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
              <?php echo e($user->links()); ?>

            </div>
          </div>
        </div>
      </div>



   <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/xzoomtech/portfolio.pxdollar.com/resources/views/admin/user.blade.php ENDPATH**/ ?>