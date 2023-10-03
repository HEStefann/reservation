<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title', 'Reveal Apps Restaurant'); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css']); ?>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>

<body class="flex">
    <?php if (isset($component)) { $__componentOriginalfe673aa99bc3a2ef1c051a883f2f4205 = $component; } ?>
<?php $component = App\View\Components\RestaurantSidebar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('restaurant-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\RestaurantSidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfe673aa99bc3a2ef1c051a883f2f4205)): ?>
<?php $component = $__componentOriginalfe673aa99bc3a2ef1c051a883f2f4205; ?>
<?php unset($__componentOriginalfe673aa99bc3a2ef1c051a883f2f4205); ?>
<?php endif; ?>
    <div class="min-h-screen flex flex-col w-0 flex-grow">
        <div class="border-b border-black/[0.12] w-full flex justify-end" style="box-shadow: 0px 1px 25px 0 rgba(0,0,0,0.1);">
            <?php if (isset($component)) { $__componentOriginal44c63cf61a78d8574e8056ca659f46b0 = $component; } ?>
<?php $component = App\View\Components\RestaurantNavbar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('restaurant-navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\RestaurantNavbar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal44c63cf61a78d8574e8056ca659f46b0)): ?>
<?php $component = $__componentOriginal44c63cf61a78d8574e8056ca659f46b0; ?>
<?php unset($__componentOriginal44c63cf61a78d8574e8056ca659f46b0); ?>
<?php endif; ?>
        </div>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</body>

</html>
<?php /**PATH /home/cakizy/Documents/github/reservation/resources/views/layouts/restaurant.blade.php ENDPATH**/ ?>