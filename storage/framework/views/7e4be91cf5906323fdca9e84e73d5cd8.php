

<?php $__env->startSection('title', config('app.name') . ' | Profile'); ?>

<?php $__env->startSection('content'); ?>


    <section class="box-section box-breadcrumb background-body">
        <div class="container">
            <ul class="breadcrumbs">
                <li> <a href="/"></a><span class="arrow-right">
                        
                </li>
            </ul>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="profile-card-4 z-depth-3">
                    <div class="card">
                        <div class="card-body text-center bg-primary rounded-top" style="background-color: blue !important">
                            <div class="user-box">
                                <img src="<?php echo e(asset('/storage/' . $user->image)); ?>" alt="user avatar">
                            </div>
                            <h5 class="mb-1 text-white"> <?php echo e($user->first_name); ?> <?php echo e($user->name); ?>

                                <?php echo e($user->profileBadge()); ?> </h5>
                            <h8 class="text-light"> Membre depuis <?php echo e(auth()->user()->created_at->translatedFormat('M Y')); ?>

                            </h8>
                        </div>
                        <div class="card-body">
                            <ul class="list-group shadow-none">
                                <li class="list-group-item">
                                    <div class="list-icon">
                                        <i class="fa fa-phone-square"></i>
                                    </div>
                                    <div class="list-details">
                                        <span> <?php echo e($user->phone); ?> </span>
                                        <small> Numéro de téléphone </small>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="list-icon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div class="list-details">
                                        <span> <?php echo e($user->email); ?> </span>
                                        <small>Adresse email</small>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="list-icon">
                                        <i class="fa fa-globe"></i>
                                    </div>
                                    <div class="list-details">
                                        <span> <?php echo e($user->pays); ?> </span>
                                        <small> Pays </small>
                                    </div>
                                </li>
                            </ul>
                            <div class="row text-center mt-4">
                                <div class="col p-2">
                                    <h4 class="mb-1 line-height-5"> <?php echo e($user->creatorAnnonces()->count()); ?> </h4>
                                    <small class="mb-0 font-weight-bold"> Trajets </small>
                                </div>
                                <div class="col p-2">
                                    <h4 class="mb-1 line-height-5">
                                        <?php echo e($user->creatorAnnonces()->where('type', 1)->count()); ?> </h4>
                                    <small class="mb-0 font-weight-bold">Offres</small>
                                </div>
                                <div class="col p-2">
                                    <h4 class="mb-1 line-height-5">
                                        <?php echo e($user->creatorAnnonces()->where('type', 0)->count()); ?> </h4>
                                    <small class="mb-0 font-weight-bold">Demandes</small>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="javascript:void()" class="btn-social btn-facebook waves-effect waves-light m-1"><i
                                    class="fa fa-facebook"></i></a>
                            <a href="javascript:void()" class="btn-social btn-google-plus waves-effect waves-light m-1"><i
                                    class="fa fa-google-plus"></i></a>
                            <a href="javascript:void()"
                                class="list-inline-item btn-social btn-behance waves-effect waves-light"><i
                                    class="fa fa-behance"></i></a>
                            <a href="javascript:void()"
                                class="list-inline-item btn-social btn-dribbble waves-effect waves-light"><i
                                    class="fa fa-dribbble"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card z-depth-3">
                    <div class="card-body">
                        <ul class="nav nav-pills nav-pills-primary nav-justified">
                            <li class="nav-item" role="presentation">
                                <a href="#profile" class="nav-link active" data-bs-toggle="pill" role="tab"><i
                                        class="icon-user"></i> Profile</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#notification" class="nav-link" data-bs-toggle="pill" role="tab"><i
                                        class="icon-user"></i> Notification</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#edit" class="nav-link" data-bs-toggle="pill" role="tab"><i
                                        class="icon-note"></i> Informations</a>
                            </li>
                            <li class="nav-item">
                                <a href="#pdp" data-target="#pdp" data-bs-toggle="pill" class="nav-link"><i
                                        class="icon-note"></i> <span class="hidden-xs">Photo de profile</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="#mdp" data-target="#mdp" data-bs-toggle="pill" class="nav-link"><i
                                        class="icon-note"></i> <span class="hidden-xs">Sécurité</span></a>
                            </li>
                            
                        </ul>
                        <div class="tab-content p-3">
                            <div class="tab-pane active show" id="profile">
                                <h5 class="mb-3">Mon Profile</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>Niveau de Vérification (<?php echo e($user->progress()); ?> % vérifié) </h6>
                                        <p>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar"
                                                style="width: <?php echo e($user->progress()); ?>%; background-color: blue !important"
                                                aria-valuenow="<?php echo e($user->progress()); ?>" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <?php echo e($user->progress()); ?>%
                                            </div>
                                        </div>

                                        <?php if(
                                            $user->hasVerifiedEmail() &&
                                                !$user->hasVerifiedPhone() &&
                                                !$user->hasVerifiedIdentity() &&
                                                !$user->hasVerifiedAdress()): ?>
                                            <?php
                                                $phone = new Propaganistas\LaravelPhone\PhoneNumber(
                                                    auth()->user()->phone,
                                                    auth()->user()->country_code,
                                                );
                                            ?>

                                            <form action="<?php echo e(route('phone.send')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>

                                                <input type="hidden" name="phone"
                                                    value="<?php echo e(str_replace(' ', '', $phone->formatInternational())); ?>">

                                                <div class="mt-2">

                                                </div>
                                                <button class="btn btn-primary"
                                                    style="background-color: blue !important">Vérifier votre
                                                    numéro</button>

                                            </form>
                                        <?php endif; ?>

                                        <?php if(
                                            $user->hasVerifiedEmail() &&
                                                $user->hasVerifiedPhone() &&
                                                !$user->hasVerifiedIdentity() &&
                                                !$user->hasVerifiedAdress()): ?>
                                            <?php
                                                $phone = new Propaganistas\LaravelPhone\PhoneNumber(
                                                    auth()->user()->phone,
                                                    auth()->user()->country_code,
                                                );
                                            ?>

                                            <form action="<?php echo e(route('phone.send')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>

                                                <input type="hidden" name="phone"
                                                    value="<?php echo e(str_replace(' ', '', $phone->formatInternational())); ?>">

                                                <div class="mt-2">

                                                </div>
                                                <button class="btn btn-primary" style="background-color: blue !important"
                                                    disabled>Vérifier votre Identité</button>

                                            </form>
                                        <?php endif; ?>

                                        <?php if(
                                            $user->hasVerifiedEmail() &&
                                                $user->hasVerifiedPhone() &&
                                                $user->hasVerifiedIdentity() &&
                                                !$user->hasVerifiedAdress()): ?>
                                            <?php
                                                $phone = new Propaganistas\LaravelPhone\PhoneNumber(
                                                    auth()->user()->phone,
                                                    auth()->user()->country_code,
                                                );
                                            ?>

                                            <form action="<?php echo e(route('phone.send')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>

                                                <input type="hidden" name="phone"
                                                    value="<?php echo e(str_replace(' ', '', $phone->formatInternational())); ?>">

                                                <div class="mt-2">

                                                </div>
                                                <button class="btn btn-primary" style="background-color: blue !important"
                                                    disabled>Vérifier votre Adresse</button>

                                            </form>
                                        <?php endif; ?>

                                        </p>
                                        
                                        <p>
                                        <form action="<?php echo e(route('profile.update')); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('patch'); ?>

                                            <div
                                                class="box-payment-method mt-20 pt-20 border-top border-bottom mb-20 pb-20 neutral-1000">
                                                <p class="text-lg fw-bold mb-15">Autorisations</p>
                                                <div class="form-check">
                                                    <input class="form-check-input" id="accord" type="checkbox"
                                                        name="accord" value="1" <?php if($user->accord === 1): echo 'checked'; endif; ?>>
                                                    <label class="form-check-label" for="accord">Autorisez la vue public
                                                        de
                                                        vos stats</label>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group row">
                                                    <label for="bio" :value="__('Biographie')"
                                                            class="text-sm-medium neutral-500 mb-10">Biographie : </label>
                                                    <textarea id="bio" name="bio" class="form-control" placeholder="Parlez-nous un peu de vous"
                                                        rows="6"> <?php echo e(old('bio', $user->bio)); ?></textarea>
                                                    <?php $__errorArgs = ['bio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <div class="alert alert-danger"><?php echo e($message); ?></div>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    <!--<?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['class' => 'mt-2','messages' => $errors->get('bio')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-2','messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('bio'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?> -->
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <button class="btn btn-primary" style="background-color: blue !important">
                                                    Enrégistrer </button>
                                            </div>
                                        </form>
                                        </p>
                                        
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Recentes destinations</h6>
                                        <a href="javascript:void();" class="badge badge-dark badge-pill">Cotonou</a>
                                        <a href="javascript:void();" class="badge badge-dark badge-pill">Paris</a>
                                        <a href="javascript:void();" class="badge badge-dark badge-pill">Madrid</a>
                                        <a href="javascript:void();" class="badge badge-dark badge-pill">Bruxelles</a>
                                        <a href="javascript:void();" class="badge badge-dark badge-pill">Rome</a>

                                        <hr>

                                        <div class="badge-3d-container">
                                            <span class="badge badge-cube-3d-fixed bg-primary">
                                                <div class="content">
                                                    <i class="fa fa-user"></i>
                                                    <small><?php echo e($user->conversations()->count()); ?></small>
                                                    <div class="badge-label">Convs.</div>
                                                </div>
                                            </span>

                                            <span class="badge badge-cube-3d-fixed bg-success">
                                                <div class="content">
                                                    <i class="fa fa-cog"></i>
                                                    <small> <?php echo e($user->creatorCommandes()->where('status', 'terminee')->count()); ?> </small>
                                                    <div class="badge-label">Commandes</div>
                                                </div>
                                            </span>

                                            <span class="badge badge-cube-3d-fixed bg-danger">
                                                <div class="content">
                                                    <i class="fa fa-eye"></i>
                                                    <small><?php echo e($user->creatorAnnonces()->sum('views')); ?></small>
                                                    <div class="badge-label">Views</div>
                                                </div>
                                            </span>
                                        </div>

                                    </div>
                                    
                                </div>
                                <!--/row-->
                            </div>
                            <div class="tab-pane" id="notification">
                                
                                <table class="table table-hover table-striped">
                                    <tbody>

                                        <?php $__currentLoopData = $user->notifications()->paginate(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <span class="float-right font-weight-bold">
                                                        <?php echo e($notification->created_at->diffForHumans()); ?> </span>
                                                    <?php echo e($notification->data['message']); ?>

                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="edit">
                                <form action="<?php echo e(route('profile.update')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('patch'); ?>

                                    <div class="form-group row">
                                        <label for="pseudo" class="col-lg-3 col-form-label form-control-label">Pseudo
                                            :</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" id="pseudo" name="pseudo" type="text"
                                                value="<?php echo e(old('pseudo', $user->pseudo)); ?>" autocomplete="name"
                                                placeholder="Steven Job" required autofocus>
                                        </div>
                                        <?php $__errorArgs = ['pseudo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-lg-3 col-form-label form-control-label">Nom :
                                        </label>
                                        <div class="col-lg-9">
                                            <input class="form-control form-control-sm" type="text" id="name"
                                                name="name" value="<?php echo e(old('name', $user->name)); ?>" required autofocus
                                                autocomplete="name" placeholder="Steven Job">
                                        </div>
                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group row">
                                        <label for="first_name" class="col-lg-3 col-form-label form-control-label">Prenoms
                                            : </label>
                                        <div class="col-lg-9">
                                            <input class="form-control" id="first_name" name="first_name" type="text"
                                                value="<?php echo e(old('first_name', $user->first_name)); ?>"
                                                placeholder="Steven Job">
                                        </div>
                                        <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-lg-3 col-form-label form-control-label">Email :
                                        </label>
                                        <div class="col-lg-9">
                                            <input class="form-control" id="email" name="email" type="email"
                                                value="<?php echo e(old('email', $user->email)); ?>" type="text"
                                                placeholder="stevenjob@gmail.com">
                                        </div>
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="form-group row">
                                        <label for="pays" class="col-lg-3 col-form-label form-control-label">Pays :
                                        </label>
                                        <div class="col-lg-9">
                                            <input class="form-control" id="pays" name="pays"
                                                value="<?php echo e(old('pays', $user->pays)); ?>" type="text"
                                                placeholder="Pays">
                                        </div>
                                        <?php $__errorArgs = ['pays'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group row">
                                        <label for="city" class="col-lg-3 col-form-label form-control-label"></label>
                                        <div class="col-lg-3">
                                            <input class="form-control" id="city" name="city"
                                                value="<?php echo e(old('city', $user->city)); ?>" type="text"
                                                placeholder="Ville">
                                            <?php $__errorArgs = ['pays'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-danger"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-lg-6">
                                            <input class="form-control" type="text" id="adress" name="adress"
                                                value="<?php echo e(old('adress', $user->adress)); ?>"
                                                placeholder="Adresse complète (Rue Emile-Pierre Casel)" value="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="phone" class="col-lg-3 col-form-label form-control-label">Tel :
                                        </label>
                                        <div class="col-lg-9">
                                            <input id="phone" name="phone"
                                                value="<?php echo e(old('phone', $user->phone)); ?>" type="tel"
                                                placeholder="Tel">
                                        </div>
                                        <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="form-group row">
                                        <label for="date_of_birth" class="col-lg-3 col-form-label form-control-label">
                                            Date de naissance : </label>
                                        <div class="col-lg-9">
                                            <input class="form-control" id="date_of_birth" name="date_of_birth"
                                                value="<?php echo e(old('date_of_birth', $user->date_of_birth ? $user->date_of_birth->toDateString() : '')); ?>"
                                                type="date" required autofocus placeholder="Date de naissance">
                                        </div>
                                        <?php $__errorArgs = ['date_of_birth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sex" id="sex"
                                                value="M" <?php if($user->sex === 'M'): echo 'checked'; endif; ?>>
                                            <label class="form-check-label" for="sex">Homme</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sex" id="sex"
                                                value="F" <?php if($user->sex === 'F'): echo 'checked'; endif; ?>>
                                            <label class="form-check-label" for="sex">Femme</label>
                                        </div>
                                        <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['class' => 'mt-2','messages' => $errors->get('sex')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-2','messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('sex'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                                    </div>


                                    

                                    

                                    <div class="form-group row">
                                        <button class="btn btn-primary" style="background-color: blue !important">
                                            Enrégistrer les modifications</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="pdp">
                                <form action="<?php echo e(route('upload.image')); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Changer de profil</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="file" name="image" id="fileInput">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <button class="btn btn-primary" style="background-color: blue !important"> Changer
                                            la photo</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="mdp">
                                <form method="post" action="<?php echo e(route('password.update')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('put'); ?>

                                    <div class="form-group row">
                                        <label for="update_password_current_password"
                                            class="col-lg-3 col-form-label form-control-label">Mot de passe</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="password"
                                                id="update_password_current_password" name="current_password"
                                                placeholder="***************">
                                            <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="alert alert-danger"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="update_password_password"
                                            class="col-lg-3 col-form-label form-control-label">Nouveau mot de passe</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="password" id="update_password_password"
                                                name="password" placeholder="*************">
                                        </div>
                                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group row">
                                        <label for="update_password_password_confirmation"
                                            class="col-lg-3 col-form-label form-control-label">Conformer mot de
                                            passe</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="password"
                                                id="update_password_password_confirmation" name="password_confirmation"
                                                placeholder="*************">
                                        </div>
                                        <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="form-group row">
                                        <button class="btn btn-primary" style="background-color: blue !important"> Changer
                                            le mot de passe</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.1/build/js/intlTelInput.min.js"></script>

    <script>
        const input = document.querySelector("#phone");
        // window.intlTelInput(input, {
        //     loadUtils: () => import("https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.1/build/js/utils.js"),
        // });

        const userCountry = "<?php echo e(auth()->user()->country_code ?? 'fr'); ?>";

        intlTelInput(input, {
            initialCountry: "auto",
            geoIpLookup: (success, failure) => {
                fetch("https://ipapi.co/json")
                    .then((res) => res.json())
                    .then((data) => success(data.country_code))
                    .catch(() => failure());
            },
            initialCountry: userCountry.toLowerCase(),
            hiddenInput: (telInputName) => ({
                phone: "phone_full",
                country: "country_code"
            }),
            separateDialCode: true
        });
    </script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\projets\taffe\azilink\resources\views/profile/profile.blade.php ENDPATH**/ ?>