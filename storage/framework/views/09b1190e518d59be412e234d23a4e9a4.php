<?php $__env->startSection('title', config('app.name'). ' | Connexion'); ?>
    
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
            <li> <span class="text-breadcrumb">Vérification Email</span></li>
          </ul>
        </div>
      </section>
      
      <section class="section-box box-become-video background-body">
        <div class="container"> 
          <div class="row"> 
            <div class="col-lg-6 col-md-12 mx-auto">
              <div class="text-center neutral-1000"><img class="mr-10" src="assets/imgs/page/pages/confirmation.svg" alt="AziLink">
                <h5 class="mt-15 mb-15 neutral-1000 wow fadeInUp" style="visibility: visible;">Merci pour votre inscription !</h5>
                <p class="mb-50"> Avant de commencer, pourriez-vous vérifier votre adresse e-mail en cliquant sur le lien que nous venons de vous envoyer ? Si vous n'avez pas reçu l'e-mail, nous serons ravis de vous en renvoyer un.</p>
                
                <?php if(session('status') == 'verification-link-sent'): ?>
                    <div class="alert alert-success">
                        <?php echo e(__('Un nouveau lien de vérification a été envoyé à l\'adresse e-mail que vous avez fournie lors de votre inscription.')); ?>

                    </div>
                <?php endif; ?>
                
                 <div class="mt-4 flex items-center justify-between">
                    <form method="POST" action="<?php echo e(route('verification.send')); ?>">
                        <?php echo csrf_field(); ?>
                        
                        <div class="form-group mt-45 mb-30"> <a class="btn btn-black-lg" href=""> <button style="all: unset" > <?php echo e(__('Renvoyer l\'e-mail de vérification')); ?> </button> 
                      <svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 15L15 8L8 1M15 8L1 8" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg></a></div>
                    </form> <br>
            
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
            
                        <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 btn btn-primary">
                            <?php echo e(__('Se Déconnecter')); ?>

                        </button>
                    </form>
                </div>
                   
              </div>
            </div>
          </div>
        </div>
      </section>
</main>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projets\taffe\azilink\resources\views\auth\verify-email.blade.php ENDPATH**/ ?>