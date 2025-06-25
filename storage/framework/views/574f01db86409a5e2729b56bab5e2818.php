 

<?php $__env->startSection('title', config('app.name'). ' | Mes Trajets'); ?>

<?php $__env->startSection('content'); ?>

    <style>
        @media (min-width: 1400px) {
            .container {
                max-width: 2000px !important;
            }
        }
        
        /* Table réactive pour les mobiles */
        .mobile-table {
            width: 100% !important;
            overflow-x: auto !important;
            display: block !important;
            border-collapse: collapse !important;
            margin-bottom: 1rem !important;
        }
        
        .mobile-table thead {
            display: none !important; /* Cacher l'en-tête sur mobile */
        }
        
        .mobile-table tbody tr {
            display: flex !important;
            flex-direction: column !important;
            border: 1px solid var(--bs-border-color) !important;
            margin-bottom: 1rem !important;
            border-radius: 8px !important;
            background-color: var(--bs-background-white) !important;
            overflow: hidden !important;
        }
        
        .mobile-table tbody tr td {
            display: flex !important;
            justify-content: space-between !important;
            padding: 0.5rem 1rem !important;
            font-size: 0.9rem !important;
            color: var(--bs-neutral-500) !important;
        }
        
        .mobile-table tbody tr td::before {
            content: attr(data-label) !important;
            font-weight: bold !important;
            color: var(--bs-neutral-700) !important;
            margin-right: 1rem !important;
        }
        
        .mobile-table .btn-action svg {
            fill: var(--bs-neutral-900); /* Couleur sombre visible */
            width: 20px; /* Taille de l'icône */
            height: 20px; /* Taille de l'icône */
        }
        
        .mobile-table  .btn-action {
            background-color: var(--bs-neutral-100); /* Couleur de fond */
            border-radius: 50%; /* Cercle autour de l'icône */
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 30px; /* Taille du bouton */
            height: 30px; /* Taille du bouton */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Ombre pour le contraste */
        }
        
        .table-mybooking .btn-action svg {
            fill: var(--bs-neutral-900); /* Couleur sombre visible */
            width: 20px; /* Taille de l'icône */
            height: 20px; /* Taille de l'icône */
        }
        
        .table-mybooking  .btn-action {
            background-color: var(--bs-neutral-100); /* Couleur de fond */
            border-radius: 50%; /* Cercle autour de l'icône */
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 30px; /* Taille du bouton */
            height: 30px; /* Taille du bouton */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Ombre pour le contraste */
        }

    </style>
    
    <main class="main">
        <div class="box-content">
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
                      <li><span>Liste</span></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="box-heading-right"> 
                    <a class="btn btn-brand-secondary" href="<?php echo e(route('annonces.create')); ?>"> 
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11 0C8.82441 0 6.69767 0.645139 4.88873 1.85383C3.07979 3.06253 1.66989 4.78049 0.83733 6.79048C0.00476617 8.80047 -0.213071 11.0122 0.211367 13.146C0.635804 15.2798 1.68345 17.2398 3.22183 18.7782C4.76021 20.3166 6.72022 21.3642 8.85401 21.7886C10.9878 22.2131 13.1995 21.9952 15.2095 21.1627C17.2195 20.3301 18.9375 18.9202 20.1462 17.1113C21.3549 15.3023 22 13.1756 22 11C21.9966 8.08367 20.8365 5.28778 18.7744 3.22563C16.7122 1.16347 13.9163 0.00344047 11 0ZM16 12H12V16C12 16.2652 11.8946 16.5196 11.7071 16.7071C11.5196 16.8946 11.2652 17 11 17C10.7348 17 10.4804 16.8946 10.2929 16.7071C10.1054 16.5196 10 16.2652 10 16V12H6C5.73479 12 5.48043 11.8946 5.2929 11.7071C5.10536 11.5196 5 11.2652 5 11C5 10.7348 5.10536 10.4804 5.2929 10.2929C5.48043 10.1054 5.73479 10 6 10H10V6C10 5.73478 10.1054 5.48043 10.2929 5.29289C10.4804 5.10536 10.7348 5 11 5C11.2652 5 11.5196 5.10536 11.7071 5.29289C11.8946 5.48043 12 5.73478 12 6V10H16C16.2652 10 16.5196 10.1054 16.7071 10.2929C16.8946 10.4804 17 10.7348 17 11C17 11.2652 16.8946 11.5196 16.7071 11.7071C16.5196 11.8946 16.2652 12 16 12Z" fill="black"></path>
                        </svg>
                        Créer un trajet
                    </a>
                </div>
            </div>
            <div class="section-box box-statistical">
              <div class="row"> 
                <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6"> 
                  <div class="card-style-1 hover-up">
                    <div class="card-image"> <span><img src="<?php echo e(asset('dash/assets/imgs/template/icons/hotel2.svg')); ?>" alt="Azilink"></span></div>
                    <div class="card-info"> 
                      <div class="card-title">
                        <h3 class="text-xl-bold neutral-1000"><span class="count"><?php echo e($trajets_en_cours->count()); ?></span>
                        </h3>
                      </div>
                      <p class="text-sm-medium neutral-500">Trajets en cours</p>
                    </div>
                  </div>
                </div>
                <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6">
                  <div class="card-style-1 hover-up">
                    <div class="card-image"> <span><img src="<?php echo e(asset('dash/assets/imgs/template/icons/user.svg')); ?>" alt="Azilink"></span></div>
                    <div class="card-info"> 
                      <div class="card-title">
                        <h3 class="text-xl-bold neutral-1000"><span class="count">  <?php echo e($trajets_termine->count()); ?> </span>
                        </h3>
                      </div>
                      <p class="text-sm-medium neutral-500">Trajets Terminés</p>
                    </div>
                  </div>
                </div>
                <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6">
                  <div class="card-style-1 hover-up">
                    <div class="card-image"> <span><img src="<?php echo e(asset('dash/assets/imgs/template/icons/book.svg')); ?>" alt="Azilink"></span></div>
                    <div class="card-info"> 
                      <div class="card-title">
                        <h3 class="text-xl-bold neutral-1000"><span class="count"> <?php echo e($trajets_termine->count() + $trajets_en_cours->count()); ?> </span>
                        </h3>
                      </div>
                      <p class="text-sm-medium neutral-500">Total Trajets</p>
                    </div>
                  </div>
                </div>
                <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6">
                  <div class="card-style-1 hover-up">
                    <div class="card-image"> <span><img src="<?php echo e(asset('dash/assets/imgs/template/icons/earn.svg')); ?>" alt="Azilink"></span></div>
                    <div class="card-info"> 
                      <div class="card-title">
                        <h3 class="text-xl-bold neutral-1000"><span class="count"> <?php echo e($gain_en_cours->count()); ?> </span>
                        </h3>
                      </div>
                      <p class="text-sm-medium neutral-500">Gain en cours </p>
                    </div>
                  </div>
                </div>
                <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6">
                  <div class="card-style-1 hover-up">
                    <div class="card-image"> <span><img src="<?php echo e(asset('dash/assets/imgs/template/icons/earn.svg')); ?>" alt="Azilink"></span></div>
                    <div class="card-info"> 
                      <div class="card-title">
                        <h3 class="text-xl-bold neutral-1000"><span class="count"> <?php echo e($gain_termine->count()); ?> </span>
                        </h3>
                      </div>
                      <p class="text-sm-medium neutral-500">Gain Encaissé</p>
                    </div>
                  </div>
                </div>
                <div class="col-xxl-2 col-xl-4 col-lg-4 col-md-4 col-sm-6">
                  <div class="card-style-1 hover-up">
                    <div class="card-image"> <span><img src="<?php echo e(asset('dash/assets/imgs/template/icons/book.svg')); ?>" alt="Azilink"></span></div>
                    <div class="card-info"> 
                      <div class="card-title">
                        <h3 class="text-xl-bold neutral-1000"><span class="count"><?php echo e($gain_en_cours->count() + $gain_termine->count()); ?></span>
                        </h3>
                      </div>
                      <p class="text-sm-medium neutral-500">Total Gain</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="table-responsive">
                <?php if(session('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>
                
                <?php if(session('warning')): ?>
                    <div class="alert alert-warning">
                        <?php echo e(session('warning')); ?>

                    </div>
                <?php endif; ?>
                <table class="table table-stripped table-mybooking">
                    <thead> 
                        <tr>
                          <th class="mw-450"><span class="sort">Type</span></th>
                          <th class="mw-450"><span class="sort">Depart</span></th>
                          <th class="mw-145"><span class="sort">Arrivée</span></th>
                          <th class="mw-145"><span class="sort">Poids</span></th>
                          <th class="mw-145"><span class="sort">Prix/kg</span></th>
                          <th class="mw-145"><span class="sort">Status</span></th>
                          <th class="mw-76">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        
                    <?php $__empty_1 = true; $__currentLoopData = $trajets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trajet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr> 
                            <td alt="titre" > <span class="text-md-medium neutral-500"> <?php echo e($trajet->type==1 ? 'Offre' : 'Demande'); ?> </span></td>
                            <td> <span class="text-md-medium neutral-500"> <?php echo e($trajet->starts_city); ?> </span></td>
                            <td> <span class="text-md-medium neutral-500"> <?php echo e($trajet->ends_city); ?> </span></td>
                            <td> <span class="text-md-medium neutral-500"> <?php echo e($trajet->kg); ?> kg </span></td>
                            <td> <span class="text-md-medium neutral-500"> <?php echo e($trajet->price); ?> €</span></td>
                            <?php if($trajet->status == 'en_attente'): ?>
                              <td> <span class="btn btn-status pending">  En attente </span> </td>
                            <?php endif; ?>
                            <?php if($trajet->status == 'termine'): ?>
                              <td> <span class="btn btn-status">  Terminé </span> </td>
                            <?php endif; ?>

                            
                        <td class="text-center"> 
                            <div class="dropdown">
                                <a class="btn-action"  type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static">
                                    <svg width="3" height="14" viewbox="0 0 3 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.25863 11.4676C1.56383 11.4676 1.85652 11.5889 2.07232 11.8047C2.28812 12.0205 2.40936 12.3132 2.40936 12.6184C2.40936 12.9236 2.28812 13.2162 2.07232 13.432C1.85652 13.6478 1.56383 13.7691 1.25863 13.7691C0.953444 13.7691 0.660752 13.6478 0.444949 13.432C0.229147 13.2162 0.10791 12.9236 0.10791 12.6184C0.10791 12.3132 0.229147 12.0205 0.444949 11.8047C0.660752 11.5889 0.953444 11.4676 1.25863 11.4676ZM1.25863 6.09759C1.56383 6.09759 1.85652 6.21882 2.07232 6.43463C2.28812 6.65043 2.40936 6.94312 2.40936 7.24831C2.40936 7.5535 2.28812 7.84619 2.07232 8.062C1.85652 8.2778 1.56383 8.39904 1.25863 8.39904C0.953444 8.39904 0.660752 8.2778 0.444949 8.062C0.229147 7.84619 0.10791 7.5535 0.10791 7.24831C0.10791 6.94312 0.229147 6.65043 0.444949 6.43463C0.660752 6.21882 0.953444 6.09759 1.25863 6.09759ZM1.25863 0.727539C1.56383 0.727539 1.85652 0.848776 2.07232 1.06458C2.28812 1.28038 2.40936 1.57307 2.40936 1.87826C2.40936 2.18345 2.28812 2.47615 2.07232 2.69195C1.85652 2.90775 1.56383 3.02899 1.25863 3.02899C0.953444 3.02899 0.660752 2.90775 0.444949 2.69195C0.229147 2.47615 0.10791 2.18345 0.10791 1.87826C0.10791 1.57307 0.229147 1.28038 0.444949 1.06458C0.660752 0.848776 0.953444 0.727539 1.25863 0.727539Z" fill=""></path>
                                    </svg>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-light dropdown-menu-end">
                                    <?php if($trajet->type == 1): ?>
                                    <li><a class="dropdown-item" href="<?php echo e(route('offers.show', [$trajet->slug(), $trajet] )); ?>">Voir</a></li>
                                    <?php else: ?>
                                    <li><a class="dropdown-item" href="<?php echo e(route('requests.show', [$trajet->slug(), $trajet] )); ?>">Voir</a></li>
                                    <?php endif; ?>
    
                                   
                                    <li><a class="dropdown-item" href="<?php echo e(route('annonces.edit', $trajet)); ?>">Editer</a></li>
                                    <li>
                                         <form action="<?php echo e(route('annonces.archive', $trajet)); ?>" method="POST" >
                                            <?php echo csrf_field(); ?>
    
                                            <button style="all: unset" >
                                                <a class="dropdown-item">Archiver</a>
                                            </button>
                                        </form>
                                    </li>
                                    <li>
                                         <form action="<?php echo e(route('annonces.destroy', $trajet)); ?>" method="POST" >
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('delete'); ?>
    
                                            <button style="all: unset" >
                                                <a class="dropdown-item">Supprimer</a>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                          
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        
                    <?php endif; ?>
                        
                       
                    </tbody>
                </table>
            </div>

            <?php if(!$trajets->isEmpty() && $trajets->count()>= 30): ?>
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item"><a class="page-link" href="<?php echo e($trajets->previousPageUrl()); ?>" aria-label="Previous"><span aria-hidden="true"> 
                      <svg width="12" height="12" viewbox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.00016 1.33325L1.3335 5.99992M1.3335 5.99992L6.00016 10.6666M1.3335 5.99992H10.6668" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg></span></a></li>

                
                <?php for($i = 1; $i <= $trajets->lastPage(); $i++): ?>

                  <?php if($trajets->currentPage() === $i): ?>
                  <li class="page-item"><a class="page-link active"><?php echo e($i); ?></a></li>
                  <?php else: ?>
                  <li class="page-item"><a class="page-link" href="<?php echo e($trajets->url($i)); ?>"><?php echo e($i); ?></a></li>
                  <?php endif; ?>

                <?php endfor; ?>

                <li class="page-item"><a class="page-link" href="<?php echo e($trajets->nextPageUrl()); ?>" aria-label="Next"><span aria-hidden="true"> 
                      <svg width="12" height="12" viewbox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.99967 10.6666L10.6663 5.99992L5.99968 1.33325M10.6663 5.99992L1.33301 5.99992" stroke="" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg></span></a></li>
              </ul>
            </nav>
            <?php endif; ?>
           
          </div>
        </div>
      </div>
    </main>
    
    <script>
        document.querySelectorAll('.dropdown-item').forEach(item => {
            item.addEventListener('click', e => {
                // e.preventDefault(); Désactivez temporairement cette ligne
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projets\taffe\azilink\resources\views/annonces/trajets.blade.php ENDPATH**/ ?>