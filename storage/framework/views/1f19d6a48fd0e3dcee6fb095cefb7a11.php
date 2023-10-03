<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>


<body class="h-full w-full bg-white">
    <?php if (isset($component)) { $__componentOriginalb9eddf53444261b5c229e9d8b9f1298e = $component; } ?>
<?php $component = App\View\Components\Navbar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Navbar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb9eddf53444261b5c229e9d8b9f1298e)): ?>
<?php $component = $__componentOriginalb9eddf53444261b5c229e9d8b9f1298e; ?>
<?php unset($__componentOriginalb9eddf53444261b5c229e9d8b9f1298e); ?>
<?php endif; ?>

    <div class="m-[26px] mt-[48.4px]">
        <div class="flex items-center space-x-4">
            <div class="w-[114px] h-[100px]">
                <img style="width: 100px; height: 100px; border-radius: 50%;"
                    src="https://mdbcdn.b-cdn.net/img/new/avatars/9.webp" alt="">
            </div>
            <div class="font-medium flex-grow">
                <div class="text-[28px] text-[#343a40] flex items-center justify-between">
                    <p class="flex"><?php echo e($user->name); ?></p>
                </div>
                <p class="text-[15px] font-extralight text-[#343a40]">
                    <?php echo e($user->email); ?>

                </p>
            </div>
        </div>
    </div>

    <div class="mx-[26px] mt-[48.4px]">
        <h1 class="text-lg font-medium text-left text-[#343a40]">My account</h1>
        <div class="rounded-[5px] bg-white p-[26px] mt-[26px] ">
            <a href="<?php echo e(route('editpersonalinfo')); ?>">
            <div class="flex mb-[10px]">
                <svg width="22" height="24" viewBox="0 0 22 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="w-[20.69px] h-6 relative" preserveAspectRatio="none">
                    <path
                        d="M11.0407 12C13.4217 12 15.3519 9.76142 15.3519 7C15.3519 4.23858 13.4217 2 11.0407 2C8.65969 2 6.72949 4.23858 6.72949 7C6.72949 9.76142 8.65969 12 11.0407 12Z"
                        stroke="#FC7F09"></path>
                    <path
                        d="M15.352 14H15.6555C16.2858 14.0002 16.8945 14.2674 17.367 14.7513C17.8395 15.2352 18.1434 15.9026 18.2215 16.628L18.5587 19.752C18.589 20.0334 18.5673 20.3191 18.4952 20.5901C18.423 20.8611 18.302 21.1112 18.1401 21.3238C17.9783 21.5364 17.7793 21.7066 17.5563 21.8232C17.3334 21.9398 17.0916 22.0001 16.8471 22H5.23439C4.98984 22.0001 4.74808 21.9398 4.52514 21.8232C4.30221 21.7066 4.10321 21.5364 3.94134 21.3238C3.77948 21.1112 3.65845 20.8611 3.5863 20.5901C3.51414 20.3191 3.49251 20.0334 3.52283 19.752L3.85911 16.628C3.93731 15.9022 4.24144 15.2346 4.71431 14.7506C5.18718 14.2667 5.79621 13.9997 6.42687 14H6.72952"
                        stroke="#FC7F09" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <div class="mx-[16px] flex">
                    <p class="text-[15px] text-[#343a40]">Personal information</p>
                </div>
                    <svg class="ml-auto" width="10" height="21" viewBox="0 0 10 21" fill="none"
                        xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                        <path d="M1.13281 1L9.32414 10.5L1.13281 20" stroke="#FC7F09"></path>
                    </svg>
                </div>
            </a>
            <div class="w-full">
                <svg width="100%" height="2" viewBox="0 0 301 2" fill="none" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none">
                    <path d="M0.693848 1L300.755 1" stroke="#EDEDED"></path>
                </svg>
            </div>
            <a href="">
            <div class="flex mt-[27px] mb-[10px]">
                <svg width="18" height="24" viewBox="0 0 18 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="xMidYMid meet">
                    <path
                        d="M14.8188 16.6154V16.799L14.9376 16.9389L16.9081 19.2605V19.8077H1.19385V19.2605L3.16433 16.9389L3.28313 16.799V16.6154V10.4615C3.28313 6.7877 4.92483 3.91659 7.61846 3.16467L7.98403 3.06262V2.68308V1.84615C7.98403 1.02076 8.5338 0.5 9.05099 0.5C9.56818 0.5 10.118 1.02076 10.118 1.84615V2.68308V3.06226L10.4831 3.16454C13.167 3.91637 14.8188 6.80052 14.8188 10.4615V16.6154ZM10.5886 22.0385C10.4008 22.9212 9.72921 23.5 9.05099 23.5C8.65842 23.5 8.26162 23.3169 7.95484 22.9555C7.74318 22.7061 7.59004 22.3887 7.51461 22.0385H10.5886Z"
                        stroke="#FC7F09"></path>
                </svg>
                <div class="mx-[16px] flex">
                    <p class="text-[15px] text-[#343a40]">Notifications</p>
                </div>
                    <svg class="ml-auto" width="10" height="21" viewBox="0 0 10 21" fill="none"
                        xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                        <path d="M1.13281 1L9.32414 10.5L1.13281 20" stroke="#FC7F09"></path>
                    </svg>
                </div>
            </a>
            <div class="w-full">
                <svg width="100%" height="2" viewBox="0 0 301 2" fill="none" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none">
                    <path d="M0.693848 1L300.755 1" stroke="#EDEDED"></path>
                </svg>
            </div>
            <a href="<?php echo e(route('user.reservations')); ?>">

            <div class="flex mt-[27px] mb-[10px]">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6 relative" preserveAspectRatio="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M2.625 6.75C2.625 6.45163 2.74353 6.16548 2.9545 5.9545C3.16548 5.74353 3.45163 5.625 3.75 5.625C4.04837 5.625 4.33452 5.74353 4.5455 5.9545C4.75647 6.16548 4.875 6.45163 4.875 6.75C4.875 7.04837 4.75647 7.33452 4.5455 7.5455C4.33452 7.75647 4.04837 7.875 3.75 7.875C3.45163 7.875 3.16548 7.75647 2.9545 7.5455C2.74353 7.33452 2.625 7.04837 2.625 6.75ZM7.5 6.75C7.5 6.55109 7.57902 6.36032 7.71967 6.21967C7.86032 6.07902 8.05109 6 8.25 6H20.25C20.4489 6 20.6397 6.07902 20.7803 6.21967C20.921 6.36032 21 6.55109 21 6.75C21 6.94891 20.921 7.13968 20.7803 7.28033C20.6397 7.42098 20.4489 7.5 20.25 7.5H8.25C8.05109 7.5 7.86032 7.42098 7.71967 7.28033C7.57902 7.13968 7.5 6.94891 7.5 6.75ZM2.625 12C2.625 11.7016 2.74353 11.4155 2.9545 11.2045C3.16548 10.9935 3.45163 10.875 3.75 10.875C4.04837 10.875 4.33452 10.9935 4.5455 11.2045C4.75647 11.4155 4.875 11.7016 4.875 12C4.875 12.2984 4.75647 12.5845 4.5455 12.7955C4.33452 13.0065 4.04837 13.125 3.75 13.125C3.45163 13.125 3.16548 13.0065 2.9545 12.7955C2.74353 12.5845 2.625 12.2984 2.625 12ZM7.5 12C7.5 11.8011 7.57902 11.6103 7.71967 11.4697C7.86032 11.329 8.05109 11.25 8.25 11.25H20.25C20.4489 11.25 20.6397 11.329 20.7803 11.4697C20.921 11.6103 21 11.8011 21 12C21 12.1989 20.921 12.3897 20.7803 12.5303C20.6397 12.671 20.4489 12.75 20.25 12.75H8.25C8.05109 12.75 7.86032 12.671 7.71967 12.5303C7.57902 12.3897 7.5 12.1989 7.5 12ZM2.625 17.25C2.625 16.9516 2.74353 16.6655 2.9545 16.4545C3.16548 16.2435 3.45163 16.125 3.75 16.125C4.04837 16.125 4.33452 16.2435 4.5455 16.4545C4.75647 16.6655 4.875 16.9516 4.875 17.25C4.875 17.5484 4.75647 17.8345 4.5455 18.0455C4.33452 18.2565 4.04837 18.375 3.75 18.375C3.45163 18.375 3.16548 18.2565 2.9545 18.0455C2.74353 17.8345 2.625 17.5484 2.625 17.25ZM7.5 17.25C7.5 17.0511 7.57902 16.8603 7.71967 16.7197C7.86032 16.579 8.05109 16.5 8.25 16.5H20.25C20.4489 16.5 20.6397 16.579 20.7803 16.7197C20.921 16.8603 21 17.0511 21 17.25C21 17.4489 20.921 17.6397 20.7803 17.7803C20.6397 17.921 20.4489 18 20.25 18H8.25C8.05109 18 7.86032 17.921 7.71967 17.7803C7.57902 17.6397 7.5 17.4489 7.5 17.25Z"
                        fill="#FC7F09"></path>
                </svg>
                <div class="mx-[16px] flex">
                    <p class="text-[15px] text-[#343a40]">My reservations</p>
                </div>
                    <svg class="ml-auto" width="10" height="21" viewBox="0 0 10 21" fill="none"
                        xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                        <path d="M1.13281 1L9.32414 10.5L1.13281 20" stroke="#FC7F09"></path>
                    </svg>
                </div>
            </a>
            <div class="w-full">
                <svg width="100%" height="2" viewBox="0 0 301 2" fill="none"
                    xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                    <path d="M0.693848 1L300.755 1" stroke="#EDEDED"></path>
                </svg>
            </div>
            <a href="<?php echo e(route('userfavourites')); ?>">
            <div class="flex mt-[27px]">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 relative" preserveAspectRatio="none">
                    <path
                        d="M12.1 18.55L12 18.65L11.89 18.55C7.14 14.24 4 11.39 4 8.5C4 6.5 5.5 5 7.5 5C9.04 5 10.54 6 11.07 7.36H12.93C13.46 6 14.96 5 16.5 5C18.5 5 20 6.5 20 8.5C20 11.39 16.86 14.24 12.1 18.55ZM16.5 3C14.76 3 13.09 3.81 12 5.08C10.91 3.81 9.24 3 7.5 3C4.42 3 2 5.41 2 8.5C2 12.27 5.4 15.36 10.55 20.03L12 21.35L13.45 20.03C18.6 15.36 22 12.27 22 8.5C22 5.41 19.58 3 16.5 3Z"
                        fill="#FC7F09"></path>
                </svg>
                <div class="mx-[16px] flex">
                    <p class="text-[15px] text-[#343a40]">Favourites</p>
                </div>
                    <svg class="ml-auto" width="10" height="21" viewBox="0 0 10 21" fill="none"
                        xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                        <path d="M1.13281 1L9.32414 10.5L1.13281 20" stroke="#FC7F09"></path>
                    </svg>
                </div>
            </a>
            <form action="<?php echo e(route('logout')); ?>" method="post" class="cursor-pointer">
                <?php echo csrf_field(); ?>
                <button class="flex justify-start items-center gap-2.5 mt-[48px]">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" preserveAspectRatio="xMidYMid meet">
                        <path
                            d="M14.167 5.83333L12.992 7.00833L15.142 9.16667H6.66699V10.8333H15.142L12.992 12.9833L14.167 14.1667L18.3337 10L14.167 5.83333ZM3.33366 4.16667H10.0003V2.5H3.33366C2.41699 2.5 1.66699 3.25 1.66699 4.16667V15.8333C1.66699 16.75 2.41699 17.5 3.33366 17.5H10.0003V15.8333H3.33366V4.16667Z"
                            fill="#343A40"></path>
                    </svg>
                    <p class="text-[15px] text-[#005fa4]">
                        Log out from your account
                    </p>
                </button>
            </form>
        </div>
    </div>
    <?php if (isset($component)) { $__componentOriginal99051027c5120c83a2f9a5ae7c4c3cfa = $component; } ?>
<?php $component = App\View\Components\Footer::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Footer::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal99051027c5120c83a2f9a5ae7c4c3cfa)): ?>
<?php $component = $__componentOriginal99051027c5120c83a2f9a5ae7c4c3cfa; ?>
<?php unset($__componentOriginal99051027c5120c83a2f9a5ae7c4c3cfa); ?>
<?php endif; ?>
</body>
<?php /**PATH C:\xampp\htdocs\reservation\resources\views/userprofile.blade.php ENDPATH**/ ?>