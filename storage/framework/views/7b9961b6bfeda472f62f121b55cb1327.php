<?php $__env->startSection('title', 'RevelApps'); ?>
<?php $__env->startSection('content'); ?>
    <div id="searchBar" class="px-[26px] z-10 sticky bg-white top-[46pxs] pb-[23px]">
        <form action="<?php echo e(route('user.restaurantspage')); ?>" method="GET">
            <div class="mt-[15px] mb-[20px] flex flex-col gap-[10px]">
                
                <div class="flex items-center relative">
                    <svg viewBox="0 0 29 23" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="w-[23.31px] h-6 absolute ml-[14px]" preserveAspectRatio="xMidYMid meet">
                        <g clip-path="url(#clip0_693_3130)">
                            <path
                                d="M12.0596 3C10.5226 3 9.02007 3.46919 7.74207 4.34824C6.46406 5.22729 5.46798 6.47672 4.87978 7.93853C4.29158 9.40034 4.13768 11.0089 4.43754 12.5607C4.7374 14.1126 5.47756 15.538 6.56441 16.6569C7.65126 17.7757 9.036 18.5376 10.5435 18.8463C12.051 19.155 13.6136 18.9965 15.0336 18.391C16.4537 17.7855 17.6674 16.7602 18.5213 15.4446C19.3753 14.129 19.8311 12.5822 19.8311 11C19.8309 8.87831 19.0121 6.84356 17.5547 5.34329C16.0973 3.84303 14.1207 3.00014 12.0596 3Z"
                                stroke="#343A40" stroke-width="1.5" stroke-miterlimit="10"></path>
                            <path d="M19.1068 15.0996L25.0339 19.9398" stroke="#343A40" stroke-width="1.5"
                                stroke-miterlimit="10" stroke-linecap="round"></path>
                        </g>
                        <rect x="1.42273" y="0.675781" width="26.7993" height="21.5882" rx="9.5" stroke="white">
                        </rect>
                        <defs>
                            <clipPath id="clip0_693_3130">
                                <rect x="0.922729" y="0.175781" width="27.7993" height="22.5882" rx="10"
                                    fill="white">
                                </rect>
                            </clipPath>
                        </defs>
                    </svg>
                    <input id="searchRestaurant" type="text" name="searchRestaurant"
                        class="w-full pl-[52px] h-12 rounded-[10px] bg-white border border-[#6b686b]"
                        placeholder="Restaurant">
                    <svg id="clearRestaurantButton" width="17" height="14" viewBox="0 0 17 14" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="w-[14.57px] h-[12.02px] absolute mr-[18px] right-0"
                        preserveAspectRatio="xMidYMid meet">
                        <path d="M1.22168 0.941406L15.7929 12.9588" stroke="#343A40"></path>
                        <path d="M15.793 0.941406L1.22176 12.9588" stroke="#343A40"></path>
                    </svg>
                </div>
            </div>
        </form>

        <div class="flex items-center gap-2 overflow-scroll relative hide-scrollbar">
            <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="flex-grow-0 flex-shrink-0 w-6 h-6 relative" preserveAspectRatio="none">
                <rect y="0.5" width="24" height="24" rx="8" fill="url(#paint0_linear_693_3750)">
                </rect>
                <path
                    d="M21.1429 7.35798H8.57146M6.28575 7.35798H2.85718M21.1429 18.7866H8.57146M6.28575 18.7866H2.85718M15.4286 13.0723H2.85718M21.1429 13.0723H17.7143M7.42861 5.07227C7.73171 5.07227 8.0224 5.19267 8.23673 5.407C8.45106 5.62133 8.57146 5.91202 8.57146 6.21512V8.50084C8.57146 8.80394 8.45106 9.09463 8.23673 9.30896C8.0224 9.52329 7.73171 9.64369 7.42861 9.64369C7.1255 9.64369 6.83481 9.52329 6.62048 9.30896C6.40616 9.09463 6.28575 8.80394 6.28575 8.50084V6.21512C6.28575 5.91202 6.40616 5.62133 6.62048 5.407C6.83481 5.19267 7.1255 5.07227 7.42861 5.07227ZM7.42861 16.5008C7.73171 16.5008 8.0224 16.6212 8.23673 16.8356C8.45106 17.0499 8.57146 17.3406 8.57146 17.6437V19.9294C8.57146 20.2325 8.45106 20.5232 8.23673 20.7375C8.0224 20.9519 7.73171 21.0723 7.42861 21.0723C7.1255 21.0723 6.83481 20.9519 6.62048 20.7375C6.40616 20.5232 6.28575 20.2325 6.28575 19.9294V17.6437C6.28575 17.3406 6.40616 17.0499 6.62048 16.8356C6.83481 16.6212 7.1255 16.5008 7.42861 16.5008ZM16.5715 10.7866C16.8746 10.7866 17.1653 10.907 17.3796 11.1213C17.5939 11.3356 17.7143 11.6263 17.7143 11.9294V14.2151C17.7143 14.5182 17.5939 14.8089 17.3796 15.0232C17.1653 15.2376 16.8746 15.358 16.5715 15.358C16.2684 15.358 15.9777 15.2376 15.7633 15.0232C15.549 14.8089 15.4286 14.5182 15.4286 14.2151V11.9294C15.4286 11.6263 15.549 11.3356 15.7633 11.1213C15.9777 10.907 16.2684 10.7866 16.5715 10.7866Z"
                    stroke="white" stroke-linecap="round" stroke-linejoin="round"></path>
                <defs>
                    <linearGradient id="paint0_linear_693_3750" x1="0.472907" y1="1.80908" x2="24.2335" y2="2.20736"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#00487C"></stop>
                        <stop offset="1" stop-color="#005FA4"></stop>
                    </linearGradient>
                </defs>
            </svg>
            <a href="<?php echo e(route('user.restaurantspage')); ?>">
                <div class="px-4 py-1 rounded-[14px] bg-[#2d6adc]/[0.08] border border-[#2d6adc]">
                    <p class="text-sm w-max text-[#005fa4]">All (<?php echo e($allRestaurantsNumber); ?>)</p>
                </div>
            </a>
            <?php
                // Sort the tags by descending count
                $tags = $tags->sortByDesc(function ($tag) {
                    return $tag->restaurants->count();
                });
            ?>

            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('searchByTag', ['tag' => $tag->name])); ?>" class="block">
                    <div class="px-4 py-1 rounded-[14px] bg-[#2d6adc]/[0.08] border border-[#2d6adc]">
                        <p class="text-sm w-max text-[#005fa4]">
                            <?php echo e($tag->name); ?> (<?php echo e($tag->restaurants->count()); ?>)
                        </p>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="mx-[26px] mt-[14px]">
        <p id="searchLocationDisplay" class="text-lg font-medium text-[#343a40] pb-[8px]">The best restaurants in
            Macedonia<span id="searchLocationValue"></span></p>
        <p id="restaurantCount" class="text-xs font-light text-[#6b686b]"></p>
        <?php if (isset($component)) { $__componentOriginalf309ac63b16f8adfd0540f71f7e84555 = $component; } ?>
<?php $component = App\View\Components\SearchRestaurant::resolve(['restaurants' => $restaurants] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('search-restaurant'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SearchRestaurant::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf309ac63b16f8adfd0540f71f7e84555)): ?>
<?php $component = $__componentOriginalf309ac63b16f8adfd0540f71f7e84555; ?>
<?php unset($__componentOriginalf309ac63b16f8adfd0540f71f7e84555); ?>
<?php endif; ?>
    </div>



    <script>
        var prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
            var currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {
                document.getElementById("navBar").style.top = "0";
                document.getElementById("searchBar").style.top = "46px";
            } else {
                document.getElementById("navBar").style.top = "-240px";
                document.getElementById("searchBar").style.top = "-240px";
            }
            prevScrollpos = currentScrollPos;
        }
    </script>
    <script>
        <?php
            $totalRestaurantCount = count($restaurants); // Assuming $restaurants contains all your restaurants
        ?>
        const totalRestaurantCount = <?php echo e($totalRestaurantCount); ?>;
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("searchRestaurant");
            const clearButton = document.getElementById("clearRestaurantButton");
            const restaurantCount = document.getElementById("restaurantCount");
            restaurantCount.innerHTML = `${totalRestaurantCount} Restaurants found`;
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer', ''); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\reservation\resources\views/user/restaurantspage.blade.php ENDPATH**/ ?>