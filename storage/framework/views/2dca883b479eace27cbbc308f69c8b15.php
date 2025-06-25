<?php $__env->startSection('title', config('app.name'). ' | 403'); ?>
    
<?php $__env->startSection('content'); ?>

<main class="main">
      <section class="box-section box-breadcrumb background-body">
        <div class="container"> 
          <ul class="breadcrumbs"> 
            <li> <a href="/">Acceuil</a><span class="arrow-right"> 
                <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M1 11L6 6L1 1" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg></span>
            </li>
            <li> <span class="text-breadcrumb">403</span></li>
          </ul>
        </div>
      </section>
      
      <section class="section-box box-become-video background-body">
        <div class="container"> 
          <div class="row"> 
            <div class="col-lg-6 col-md-12 mx-auto">
              <div class="text-center neutral-1000"><img class="mr-10" src="assets/imgs/page/pages/confirmation.svg" alt="AziLink">
                <h5 class="mt-15 mb-15 neutral-1000 wow fadeInUp" style="visibility: visible;"> Erreur 403 : Accès interdit.</h5>
                <p class="mb-50"> Vous n'avez pas les autorisations nécessaires pour accéder à cette page.</p>
                 <div class="mt-4 flex items-center justify-between">
                    <a href="<?php echo e(route('home')); ?>" class="btn btn-black">
                        <?php echo e(__('Page d\'Accueil')); ?>

                    </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</main>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projets\taffe\azilink\resources\views/errors/403.blade.php ENDPATH**/ ?>