

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
                    <th scope="col">Amount</th>
                    <th scope="col">Created_at</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $withdraw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <th scope="row">
                      <?php echo e($users->user->address); ?>

                    </th>
                    <td>
                      <?php echo e($users->name); ?> <?php echo e($manager->currency_name); ?>

                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2"><?php echo e($users->created_at); ?></span>
                       
                      </div>
                    </td>
                     <td>
                      <div class="d-flex align-items-center">
                          <?php if($users->action1 == "pending"): ?>
                          <a href="<?php echo e(route('confirmwith',[$users->id])); ?>" style="color:white;" class="btn btn-primary ">Confirm</a>
                          <a  href="<?php echo e(route('rejectwith',[$users->id])); ?>" style="color:white;" class="btn btn-primary ">Reject</a>
                         
                          <?php endif; ?>
                           <?php if($users->action1 == "confirm"): ?>
                         <a  style="color:white;" class="btn btn-primary ">done</a>
                       <?php endif; ?>
                        <?php if($users->action1 == "reject"): ?>
                         <a  style="color:white;" class="btn btn-primary ">Reject</a>
                       <?php endif; ?>
                       
                      </div>
                    </td>
                    
                  </tr>
                 
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
              <?php echo e($withdraw->links()); ?>

            </div>
          </div>
        </div>
      </div>



   <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/xzoomtech/portfolio.pxdollar.com/resources/views/admin/withdraw.blade.php ENDPATH**/ ?>