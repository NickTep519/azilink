 

<?php $__env->startSection('title', config('app.name'). ' | Publiez une offer'); ?>

<?php $__env->startSection('content'); ?>
    
<main class="main">
    <section class="box-section box-breadcrumb background-100">
      <div class="container"> 
        <ul class="breadcrumbs"> 
          <li> <a href="index.html">Accueille</a><span class="arrow-right"> 
              <svg width="7" height="12" viewbox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 11L6 6L1 1" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg></span></li>
          <li> <span class="text-breadcrumb">Publiez une offre</span></li>
        </ul>
      </div>
    </section>
    <section class="section-box box-become-video background-body">
      <div class="container">       
        <div class="text-center">               
          <h2 class="mt-15 mb-15 neutral-1000 wow fadeInUp">Publiez une offre</h2>
        </div>
        <div class="row"> 
          <div class="col-12"> 
            <h5 class="mb-30 neutral-1000">Details de l'offre</h5>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12">                
            <form action="<?php echo e(route($offer->exists ? 'annonces.update' : 'annonces.store', $offer)); ?>" method="POST" class="p-5 border rounded-2">
                <?php echo csrf_field(); ?>

                <?php if($offer->exists): ?>
                    <?php echo method_field('PUT'); ?>
                <?php endif; ?>

              <div class="form-contact"> 
                <div class="row"> 

                  <div class="col-lg-12">
                    <div class="form-group"> 
                      <label for="title" class="text-sm-medium neutral-1000">Titre</label>
                      <input type="text" id="title" name="title" value="<?php echo e(old('title', $offer->title)); ?>" class="form-control" placeholder="Titre">
                    </div>
                    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger">
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group"> 
                      <label for="kg" class="text-sm-medium neutral-1000">Poids (Kg) </label>
                      <input type="text" id="kg" name="kg" value="<?php echo e(old('kg', $offer->kg)); ?>" class="form-control" placeholder="poid en kilogramme">
                    </div>
                    <?php $__errorArgs = ['kg'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger">
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group"> 
                      <label for="price" class="text-sm-medium neutral-1000">Prix (€)</label>
                      <input  type="text" id="price" name="price" value="<?php echo e(old('price', $offer->price)); ?>" class="form-control" placeholder="prix par kilogramme">
                    </div>
                    <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger">
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group"> 
                      <label for="starts_city" class="text-sm-medium neutral-1000">Ville de depart</label>
                      <input type="text" id="starts_city" name="starts_city" value="<?php echo e(old('starts_city', $offer->starts_city)); ?>" class="form-control cityInput" placeholder="Ville de depart">
                      <ul id="suggestions" style="list-style: none; padding: 0; margin-top: 5px;  color :#303c44; background-color: #fff ; border: 1px solid #fff; max-width: 300px;"></ul>
                    </div>
                    <?php $__errorArgs = ['starts_city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger">
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group"> 
                      <label for="ends_city" class="text-sm-medium neutral-1000">Ville d'arrivée</label>
                      <input type="text" id="ends_city" name="ends_city" value="<?php echo e(old('ends_city', $offer->ends_city)); ?>" class="form-control cityInput" placeholder="Ville d'arrivée">
                      <ul id="suggestions" style="list-style: none; padding: 0; margin-top: 5px;  color :#303c44; background-color: #fff ; border: 1px solid #fff; max-width: 300px;"></ul>
                    </div>
                    <?php $__errorArgs = ['ends_city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger">
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group"> 
                      <label for="starts_at" class="text-sm-medium neutral-1000">Date de depart</label>
                      <input type="date" id="starts_at" name="starts_at" value="<?php echo e(old('starts_at',  $offer->starts_at->toDateString())); ?>" class="form-control cityInput" placeholder="Date de depart">
                    </div>
                    <?php $__errorArgs = ['starts_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger">
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group"> 
                      <label for="ends_at" class="text-sm-medium neutral-1000">Date d'arrivée</label>
                      <input type="date" id="ends_at" name="ends_at" value="<?php echo e(old('ends_at', $offer->ends_at ? $offer->ends_at->toDateString() : '')); ?>" class="form-control" placeholder="Date d'arrivée">
                    </div>
                    <?php $__errorArgs = ['ends_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger">
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>  

                  <div class="col-lg-6">
                    <div class="form-group"> 
                        <label for="m_transport" class="text-sm-medium neutral-1000">Moyen de Transport</label>
                        <select name="m_transport" id="m_transport" class="form-select form-control">
                            <option >Moyen de Transport</option>
                            <?php $__currentLoopData = $transports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transport): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if($offer->exists && $offer->m_transport == $transport): ?> selected  <?php endif; ?> value="<?php echo e($transport); ?>"><?php echo e($transport); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <?php $__errorArgs = ['m_transport'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger" >
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group"> 
                      <label for="company" class="text-sm-medium neutral-1000">Compagnie</label>
                      <input type="text" id="company" name="company" value="<?php echo e(old('company', $offer->company)); ?>" class="form-control" placeholder="compagnie de transport" >
                    </div>
                    <?php $__errorArgs = ['company'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger" >
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>

                  <div class="col-lg-12">
                    <div class="form-group"> 
                      <label for="description" class="text-sm-medium neutral-1000">Description</label>
                      <textarea name="description" id="description" class="form-control" rows="6" placeholder="Donnez en quelques lignes une expliaction sur votre offre..."> <?php echo e(old('description', $offer->description)); ?> </textarea>
                    </div>
                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="alert alert-danger" >
                      <?php echo e($message); ?>

                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  
                  <input type="hidden" name="type" value="1">

                  <div class="col-lg-12"> 
                    <button class="btn btn-book"> <?php echo e($offer->exists ? 'Modifier' : 'Publier'); ?>

                      <svg width="17" height="16" viewbox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.5 15L15.5 8L8.5 1M15.5 8L1.5 8" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg>
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
         
        </div>
      </div>
    </section>
    <section class="section-box box-media background-body"> 
        <div class="container-media wow fadeInUp"> 
          <img src="<?php echo e(asset('assets/imgs/page/homepage5/media.png')); ?>" alt="Travila">
          <img src="<?php echo e(asset('assets/imgs/page/homepage5/media2.png')); ?>" alt="Travila">
          <img src="<?php echo e(asset('assets/imgs/page/homepage5/media3.png')); ?>" alt="Travila">
          <img src="<?php echo e(asset('assets/imgs/page/homepage5/media4.png')); ?>" alt="Travila">
          <img src="<?php echo e(asset('assets/imgs/page/homepage5/media5.png')); ?>" alt="Travila">
          <img src="<?php echo e(asset('assets/imgs/page/homepage5/media6.png')); ?>" alt="Travila">
          <img src="<?php echo e(asset('assets/imgs/page/homepage5/media7.png')); ?>" alt="Travila">
        </div>
    </section>
  </main>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projets\taffe\azilink\resources\views\annonces\offers\form.blade.php ENDPATH**/ ?>