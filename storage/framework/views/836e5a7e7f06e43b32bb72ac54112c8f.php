 

<?php $__env->startSection('title', config('app.name'). ' | Publiez une trajet'); ?>

<?php $__env->startSection('content'); ?>
<style>
    @media (min-width: 1400px) {
        .container {
            max-width: 2000px !important;
        }
    }
    
    /* Conteneur principal pour la mise en page */
    .radio-group {
        display: flex;
        gap: 1rem; /* Espacement entre les options */
    }
    
    /* Masquer l'input natif */
    .radio-group input[type="radio"] {
        display: none;
    }
    
    /* Styles de base pour les labels */
    .radio-label {
        display: inline-block;
        padding: 0.8rem 1.5rem;
        border: 1px solid #ccc; /* Bordure grise */
        border-radius: 5px; /* Coins arrondis */
        background-color: #fff; /* Fond blanc */
        font-size: 1rem;
        color: #333; /* Texte sombre */
        cursor: pointer; /* Curseur pointeur */
        transition: all 0.3s ease; /* Animation douce */
    }
    
    /* Effet au survol */
    .radio-label:hover {
        background-color: #f0f0f0; /* Fond gris clair */
        border-color: #007bff; /* Bordure bleu */
    }
    
    /* Styles pour les labels sélectionnés */
    .radio-group input[type="radio"]:checked + .radio-label {
        background-color: #007bff; /* Fond bleu */
        color: #fff; /* Texte blanc */
        border-color: #0056b3; /* Bordure plus foncée */
    }

    
</style>
    
<main class="main">
    <div class="box-content" style="padding: 40px 30px 30px 30px !important;">
        <div class="section-box">
          <div class="container"> 
            <div class="box-heading">
              <div class="box-heading-left">
                <div class="box-title"> 
                  <h4 class="neutral-1000 mb-15">Mes Trajets</h4>
                </div>
                <div class="box-breadcrumb"> 
                  <div class="breadcrumbs">
                    <ul> 
                      <li> <a class="icon-home" href="#">Accueil</a></li>
                      <li><a class="icon-home" href="#">Trajets</a></li>
                      <li><span>Création</span></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    
    
    <section class="section-box background-body">
      <div class="container">       
        <div class="row"> 
          <div class="col-12"> 
            <h5 class="mb-30 neutral-1000">Entrez les Details sur le trajet</h5>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12">                
            <form action="<?php echo e(route($trajet->exists ? 'annonces.update' : 'annonces.store', $trajet)); ?>" method="POST" class="p-5 border rounded-2">
                <?php echo csrf_field(); ?>

                <?php if($trajet->exists): ?>
                    <?php echo method_field('PUT'); ?>
                <?php endif; ?>

              <div class="form-contact"> 
                <div class="row"> 
                    <div class="d-flex align-items-center">
                       <div class="radio-group">
                            <input type="radio" name="type" id="type_offer" value="1" <?php if($trajet->type === 1 || $trajet->type==null): echo 'checked'; endif; ?>>
                            <label for="type_offer" class="radio-label">Offre</label>
                        
                            <input type="radio" name="type" id="type_request" value="0" <?php if($trajet->type === 0): echo 'checked'; endif; ?>>
                            <label for="type_request" class="radio-label">Demande</label>
                        </div>
                    </div>
                    <div id="form-fields">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group"> 
                              <label for="title" class="text-sm-medium neutral-1000">Titre</label>
                              <input type="text" id="title" name="title" value="<?php echo e(old('title', $trajet->title)); ?>" class="form-control" placeholder="Titre">
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
                              <input type="text" id="kg" name="kg" value="<?php echo e(old('kg', $trajet->kg)); ?>" class="form-control" placeholder="poid en kilogramme">
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
                              <label for="price" class="text-sm-medium neutral-1000">Prix (€) </label>
                              <input  type="text" id="price" name="price" value="<?php echo e(old('price', $trajet->price)); ?>" class="form-control" placeholder="prix par kilogramme">
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
                              <input type="text" id="starts_city" name="starts_city" value="<?php echo e(old('starts_city', $trajet->starts_city)); ?>" class="form-control cityInput" placeholder="Ville de depart">
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
                              <input type="text" id="ends_city" name="ends_city" value="<?php echo e(old('ends_city', $trajet->ends_city)); ?>" class="form-control cityInput" placeholder="Ville d'arrivée">
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
                              <input type="date" id="starts_at" name="starts_at" value="<?php echo e(old('starts_at', $trajet->starts_at ? $trajet->starts_at->toDateString() : '')); ?>" class="form-control cityInput" min="<?php echo e(date('Y-m-d')); ?>" placeholder="Date de depart">
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
                              <input type="date" id="ends_at" name="ends_at" value="<?php echo e(old('ends_at', $trajet->ends_at ? $trajet->ends_at->toDateString() : '')); ?>" class="form-control" min="<?php echo e(date('Y-m-d')); ?>" placeholder="Date d'arrivée">
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
                                <select name="m_transport" id="m_transport" class="form-select">
                                    <option disabled selected>Moyen de Transport</option>
                                    <?php $__currentLoopData = $transports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transport): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if($trajet->exists && $trajet->m_transport == $transport): ?> selected  <?php endif; ?> value="<?php echo e($transport); ?>"><?php echo e($transport); ?></option>
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
                              <input type="text" id="company" name="company" value="<?php echo e(old('company', $trajet->company)); ?>" class="form-control" placeholder="compagnie de transport" >
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
                              <textarea name="description" id="description" class="form-control" rows="6" placeholder="Donnez en quelques lignes une expliaction sur votre offre..."> <?php echo e(old('description', $trajet->description)); ?> </textarea>
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
                          <div class="col-lg-12"> 
                            <button class="btn btn-book"> <?php echo e($trajet->exists ? 'Modifier' : 'Publier'); ?>

                              <svg width="17" height="16" viewbox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.5 15L15.5 8L8.5 1M15.5 8L1.5 8" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                              </svg>
                            </button>
                          </div>
                        </div>
                    </div>
                </div>
              </div>
            </form>
          </div>
         
        </div>
      </div>
    </section>
  </main><br><br>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projets\taffe\azilink\resources\views\annonces\form.blade.php ENDPATH**/ ?>