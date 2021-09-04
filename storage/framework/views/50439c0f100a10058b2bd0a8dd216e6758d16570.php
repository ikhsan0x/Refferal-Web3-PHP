

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
    <!-- Page content -->
    <div class="container-fluid mt--6">
      
      <div class="row">
        
        <div class="col-xl-4">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Website Manager</h3>
                </div>
                <div class="col text-right">
                </div>
              </div>
            </div>
            <div class="table-responsive">
                    <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
              </div>
              <form role="form" method="post" enctype="multipart/form-data" action="<?php echo e(route('managerstore')); ?>">
                  <?php echo csrf_field(); ?>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Website Name</span>
                    </div>
                    <input class="form-control" name="website_title" value="<?php echo e($manager->website_title); ?>" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Minimum Withdraw Amount</span>
                    </div>
                    
                    <input class="form-control" name="minimum_withdraw" value="<?php echo e($manager->minimum_withdraw); ?>" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Referral Bonus</span>
                    </div>
                    <input class="form-control" name="referral_bonus" value="<?php echo e($manager->referral_bonus); ?>"  type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Currency Name</span>
                    </div>
                    <input class="form-control" name="currency_name" value="<?php echo e($manager->currency_name); ?>" type="text">
                  </div>
                </div>
                 <div class="text-muted font-italic">
                     <small>If You Don't Change Your Website Logo So leave This: <br>NOTE: This is noly for website not for admin penal.
                     </small></div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Logo</span>
                    </div>
                    <input class="form-control" name="logo"   type="file">
                  </div>
                </div>
               
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4">Update</button>
                </div>
              </form>
            </div>
            </div>
          </div>
        </div>
      </div>



   <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/xzoomtech/portfolio.pxdollar.com/resources/views/admin/manager.blade.php ENDPATH**/ ?>