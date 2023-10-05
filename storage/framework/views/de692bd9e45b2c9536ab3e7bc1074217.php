<?php $__env->startSection('title', 'RevelApps'); ?>
<?php $__env->startPush('styles'); ?>
    <link href="<?php echo e(asset('css/index.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="sliki h-[234px] w-full flex flex-col grow">
        <div class="vrtac inline-flex">
            <img src="<?php echo e(asset('/images/carousel-animate.png')); ?>" alt="carousel" class="carousel-image" />
            <img src="<?php echo e(asset('images/gabriel-santos-gNa-eXVr_KQ-unsplash.png')); ?>" alt="carousel" class="carousel-image" />
            <img src="<?php echo e(asset('images/nick-karvounis-Ciqxn7FE4vE-unsplash.png')); ?>" alt="carousel"
                class="carousel-image" />
            <img src="<?php echo e(asset('/images/carousel-animate.png')); ?>" alt="carousel" class="carousel-image" />
        </div>
    </div>
    <div class="flex justify-center">
        <div class="w-[218px] text-center text-neutral-700 text-2xl font-medium pt-[10px] pb-[14px]">Seamless dining,
            reserved by you</div>
    </div>

    <form action="<?php echo e(route('user.restaurantspage')); ?>" method="GET" class="z-10">
        <div class="px-[25px] pb-[24px] mb-[40px] flex flex-col gap-[10px] z-10 bg-white">
            
            <div class="flex items-center relative">
                <svg viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="w-[23.31px] h-6 absolute ml-[14px]" preserveAspectRatio="none">
                    <path
                        d="M12.5798 1.17578C7.7261 1.17578 3.79138 4.88867 3.79138 9.46875C3.79138 11.0004 4.1091 12.5824 5.02084 13.7227L12.5798 23.1758L20.1387 13.7227C20.9668 12.687 21.3682 10.8561 21.3682 9.46875C21.3682 4.88867 17.4335 1.17578 12.5798 1.17578ZM12.5798 5.97888C14.622 5.97888 16.2781 7.54163 16.2781 9.46874C16.2781 11.3959 14.622 12.9586 12.5798 12.9586C10.5375 12.9586 8.88144 11.3959 8.88144 9.46875C8.88144 7.54163 10.5375 5.97888 12.5798 5.97888Z"
                        fill="#343A40"></path>
                    <rect x="1.42273" y="0.675781" width="22.3143" height="23" rx="9.5" stroke="white">
                    </rect>
                </svg>
                <input id="searchLocation" type="text"
                    class="w-full pl-[52px] h-12 rounded-[10px] bg-white border border-[#6b686b]"
                    placeholder="3583 RJ Utrecht, Neth...">
                <svg id="clearLocationButton" width="17" height="14" viewBox="0 0 17 14" fill="none"
                    xmlns="http://www.w3.org/2000/svg" class="w-[14.57px] h-[12.02px] absolute mr-[18px] right-0"
                    preserveAspectRatio="xMidYMid meet">
                    <path d="M1.22168 0.941406L15.7929 12.9588" stroke="#343A40"></path>
                    <path d="M15.793 0.941406L1.22176 12.9588" stroke="#343A40"></path>
                </svg>
            </div>
            
            
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
                    class="w-full pl-[52px] h-12 rounded-[10px] bg-white border border-[#6b686b]" placeholder="Restaurant">
                <svg id="clearRestaurantButton" width="17" height="14" viewBox="0 0 17 14" fill="none"
                    xmlns="http://www.w3.org/2000/svg" class="w-[14.57px] h-[12.02px] absolute mr-[18px] right-0"
                    preserveAspectRatio="xMidYMid meet">
                    <path d="M1.22168 0.941406L15.7929 12.9588" stroke="#343A40"></path>
                    <path d="M15.793 0.941406L1.22176 12.9588" stroke="#343A40"></path>
                </svg>
            </div>
            <ul id="autocomplete-results" class="bg-white border border-gray-300 rounded-lg shadow-md  w-full hidden px-1">
                <!-- Suggestions will be added here dynamically -->
            </ul>

            
            
            <button type="submit"
                class="flex justify-center items-center self-stretch flex-grow-0 flex-shrink-0 h-[42px] relative gap-2.5 px-4 py-3.5 rounded-[10px]"
                style="background: linear-gradient(132.41deg, #00487c 3.7%, #005fa4 97.14%);">
                <p class="flex-grow-0 flex-shrink-0 text-lg font-medium text-center text-white">Search</p>
            </button>
        </div>
    </form>

    <div class="flex flex-col gap-[18px] items-center">
        <div id="image-scroll"
            class="px-[26px] w-full flex gap-[11px] overflow-x-scroll scrollbar-hide snap-x scroll-smooth snap-mandatory hide-scrollbar">
            <?php $__currentLoopData = $promotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promotion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div style="min-width: 277px; min-height: 120px;width: 277px; height: 120px">
                    <img class="rounded-[28px] snap-center w-full h-full" style="width: 100%; height: 100%;"
                        src="<?php echo e(asset('storage/' . $promotion->image)); ?>" alt=""
                        onclick="window.location.href = '<?php echo e(route('user.restaurant', $promotion->restaurant->title)); ?>'">
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <svg width="35" height="9" viewBox="0 0 35 9" fill="none" xmlns="http://www.w3.org/2000/svg"
            class="w-[35px] h-[9px]" preserveAspectRatio="none">
            <circle id="circle1" class="dots-promotions" cx="4.5" cy="4.5" r="4.5"
                fill="#005FA4">
            </circle>
            <circle id="circle2" class="dots-promotions" cx="17.5" cy="4.5" r="4.5"
                fill="#E2E2E2">
            </circle>
            <circle id="circle3" class="dots-promotions" cx="30.5" cy="4.5" r="4.5"
                fill="#E2E2E2">
            </circle>
        </svg>
    </div>
    <div class="flex justify-between ml-[26px] mr-[14px] mt-[64px]">
        <div>
            <p class="text-lg font-medium text-left text-[#343a40]">Nearby Restaurant</p>
            <p class="text-xs text-left text-gray-500">Check your city nearby restaurant</p>
        </div>
        <a href="#" onclick="getLocation()">
            <div class="flex items-center">
                <p class=" text-xs font-medium text-left text-[#005fa4] mr-[5px]">
                    See All
                </p>
                <svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="" preserveAspectRatio="xMidYMid meet">
                    <path d="M1 0.761963L6 5.16096L1 9.55995" stroke="#005FA4" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                </svg>
            </div>
        </a>
    </div>
    <div id="nearestRestaurants"
        class="pt-[16px] px-[26px] flex pb-[64px] gap-[18px] overflow-scroll snap-x scroll-smooth snap-mandatory hide-scrollbar">
    </div>
    <div class="flex justify-between ml-[26px] mr-[14px]">
        <div>
            <p class="text-lg font-medium text-left text-[#343a40]">Highly Rated</p>
            <p class="text-xs text-left text-gray-500">Check highly rated restaurants</p>
        </div>
        <a href="<?php echo e(route('user.highlyrated')); ?>">
            <div class="flex items-center">
                <p class="text-xs font-medium text-left text-[#005fa4] mr-[5px]">
                    See All
                </p>
                <svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="" preserveAspectRatio="xMidYMid meet">
                    <path d="M1 0.761963L6 5.16096L1 9.55995" stroke="#005FA4" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                </svg>
            </div>
        </a>
    </div>
    <div
        class="pt-[16px] px-[26px] flex pb-[64px] gap-[18px] overflow-scroll snap-x scroll-smooth snap-mandatory hide-scrollbar">
        <?php if($highliyRated->count() > 0): ?>
            <?php $__currentLoopData = $highliyRated; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginalb87e44b034a31b9c98380c3f9ff10fe0 = $component; } ?>
<?php $component = App\View\Components\ShowRestaurant::resolve(['restaurant' => $restaurant] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('show-restaurant'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\ShowRestaurant::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb87e44b034a31b9c98380c3f9ff10fe0)): ?>
<?php $component = $__componentOriginalb87e44b034a31b9c98380c3f9ff10fe0; ?>
<?php unset($__componentOriginalb87e44b034a31b9c98380c3f9ff10fe0); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <div class="inline-flex items-center"><svg class="w-5 h-5 mr-1 text-gray-500" fill="none"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                    <path
                        d="M10.0835 6.41732H11.9168V8.25065H10.0835V6.41732ZM10.0835 10.084H11.9168V15.584H10.0835V10.084ZM11.0002 1.83398C5.94016 1.83398 1.8335 5.94065 1.8335 11.0007C1.8335 16.0607 5.94016 20.1673 11.0002 20.1673C16.0602 20.1673 20.1668 16.0607 20.1668 11.0007C20.1668 5.94065 16.0602 1.83398 11.0002 1.83398ZM11.0002 18.334C6.95766 18.334 3.66683 15.0431 3.66683 11.0007C3.66683 6.95815 6.95766 3.66732 11.0002 3.66732C15.0427 3.66732 18.3335 6.95815 18.3335 11.0007C18.3335 15.0431 15.0427 18.334 11.0002 18.334Z"
                        fill="#938F99"></path>
                </svg>
                <p class="text-xs font-light text-left text-gray-500">No restaurants found</p>
            </div>
        <?php endif; ?>
    </div>
    <div class="flex justify-between ml-[26px] mr-[14px]">
        <div>
            <p class="text-lg font-medium text-left text-[#343a40]">Recommended places</p>
            <p class="text-xs text-left text-gray-500">Check highly rated restaurants</p>
        </div>
        <a href="<?php echo e(route('user.recommended')); ?>">
            <div class="flex items-center">
                <p class="text-xs font-medium text-left text-[#005fa4] mr-[5px]">
                    See All
                </p>
                <svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="" preserveAspectRatio="xMidYMid meet">
                    <path d="M1 0.761963L6 5.16096L1 9.55995" stroke="#005FA4" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                </svg>
            </div>
        </a>
    </div>
    <div
        class="pt-[16px] px-[26px] flex pb-[64px] gap-[18px] overflow-scroll snap-x scroll-smooth snap-mandatory hide-scrollbar">
        <?php if($recommendedRestaurants->count() > 0): ?>
            <?php $__currentLoopData = $recommendedRestaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginalb87e44b034a31b9c98380c3f9ff10fe0 = $component; } ?>
<?php $component = App\View\Components\ShowRestaurant::resolve(['restaurant' => $restaurant] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('show-restaurant'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\ShowRestaurant::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb87e44b034a31b9c98380c3f9ff10fe0)): ?>
<?php $component = $__componentOriginalb87e44b034a31b9c98380c3f9ff10fe0; ?>
<?php unset($__componentOriginalb87e44b034a31b9c98380c3f9ff10fe0); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <div class="inline-flex items-center"><svg class="w-5 h-5 mr-1 text-gray-500" fill="none"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                    <path
                        d="M10.0835 6.41732H11.9168V8.25065H10.0835V6.41732ZM10.0835 10.084H11.9168V15.584H10.0835V10.084ZM11.0002 1.83398C5.94016 1.83398 1.8335 5.94065 1.8335 11.0007C1.8335 16.0607 5.94016 20.1673 11.0002 20.1673C16.0602 20.1673 20.1668 16.0607 20.1668 11.0007C20.1668 5.94065 16.0602 1.83398 11.0002 1.83398ZM11.0002 18.334C6.95766 18.334 3.66683 15.0431 3.66683 11.0007C3.66683 6.95815 6.95766 3.66732 11.0002 3.66732C15.0427 3.66732 18.3335 6.95815 18.3335 11.0007C18.3335 15.0431 15.0427 18.334 11.0002 18.334Z"
                        fill="#938F99"></path>
                </svg>
                <p class="text-xs font-light text-left text-gray-500">No restaurants found</p>
            </div>
        <?php endif; ?>
    </div>
    <p class="text-lg font-medium text-left text-[#343a40] ml-[26px]">How does it work?</p>
    <div class="relative flex justify-center pt-[16px]">
        <div id="howWorks"
            class="flex px-[26px] gap-[26px] overflow-x-scroll scrollbar-hide snap-x scroll-smooth snap-mandatory hide-scrollbar pb-[89px]">
            <div>
                <div class="h-[185px] w-[338px] rounded-2xl bg-white flex flex-col items-center justify-center snap-center"
                    style="box-shadow: 0px 20px 50px 0 rgba(0,0,0,0.1);">
                    <div class="flex justify-start items-start">
                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            class="flex-grow-0 flex-shrink-0 w-[35px] h-[35px] relative" preserveAspectRatio="none">
                            <path
                                d="M29.1666 4.37492H27.7083V1.45825H24.7916V4.37492H10.2083V1.45825H7.29163V4.37492H5.83329C4.22913 4.37492 2.91663 5.68742 2.91663 7.29159V30.6249C2.91663 32.2291 4.22913 33.5416 5.83329 33.5416H29.1666C30.7708 33.5416 32.0833 32.2291 32.0833 30.6249V7.29159C32.0833 5.68742 30.7708 4.37492 29.1666 4.37492ZM29.1666 30.6249H5.83329V11.6666H29.1666V30.6249Z"
                                fill="black" fill-opacity="0.54"></path>
                        </svg>
                    </div>
                    <p class="text-base font-semibold text-center text-[#343a40] mt-[26px] mb-[16px]">
                        Easy reservation
                    </p>
                    <p class="text-sm text-center text-[#343a40]">
                        Free, express, 24/7
                    </p>
                </div>
            </div>
            <div>
                <div class="h-[185px] w-[338px] rounded-2xl bg-white flex flex-col items-center justify-center snap-center"
                    style="box-shadow: 0px 20px 50px 0 rgba(0,0,0,0.1);">
                    <div class="flex justify-start items-start">
                        <div class="flex justify-start items-start">
                            <div class="flex justify-start items-center flex-grow-0 flex-shrink-0 relative">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="flex-grow-0 flex-shrink-0 w-[30px] h-[30px] relative"
                                    preserveAspectRatio="xMidYMid meet">
                                    <path
                                        d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z"
                                        fill="#FC7F09"></path>
                                </svg><svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="flex-grow-0 flex-shrink-0 w-[30px] h-[30px] relative"
                                    preserveAspectRatio="xMidYMid meet">
                                    <path
                                        d="M15 22.2125L22.725 26.875L20.675 18.0875L27.5 12.175L18.5125 11.4125L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125Z"
                                        fill="#FC7F09"></path>
                                </svg><svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="flex-grow-0 flex-shrink-0 w-[30px] h-[30px] relative"
                                    preserveAspectRatio="xMidYMid meet">
                                    <mask id="mask0_965_2471" style="mask-type:alpha" maskUnits="userSpaceOnUse"
                                        x="0" y="0" width="30" height="30">
                                        <path
                                            d="M27.5 12.175L18.5125 11.4L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125L22.725 26.875L20.6875 18.0875L27.5 12.175ZM15 19.875V8.25L17.1375 13.3L22.6125 13.775L18.4625 17.375L19.7125 22.725L15 19.875Z"
                                            fill="black"></path>
                                    </mask>
                                    <g mask="url(#mask0_965_2471)">
                                        <rect width="15" height="30" fill="#FC7F09"></rect>
                                        <rect x="15" width="15" height="30" fill="black"
                                            fill-opacity="0.23"></rect>
                                    </g>
                                </svg><svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="flex-grow-0 flex-shrink-0 w-[30px] h-[30px] relative"
                                    preserveAspectRatio="xMidYMid meet">
                                    <path
                                        d="M27.5 12.175L18.5125 11.4L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125L22.725 26.875L20.6875 18.0875L27.5 12.175ZM15 19.875L10.3 22.7125L11.55 17.3625L7.4 13.7625L12.875 13.2875L15 8.25L17.1375 13.3L22.6125 13.775L18.4625 17.375L19.7125 22.725L15 19.875Z"
                                        fill="black" fill-opacity="0.23"></path>
                                </svg><svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="flex-grow-0 flex-shrink-0 w-[30px] h-[30px] relative"
                                    preserveAspectRatio="xMidYMid meet">
                                    <path
                                        d="M27.5 12.175L18.5125 11.4L15 3.125L11.4875 11.4125L2.5 12.175L9.325 18.0875L7.275 26.875L15 22.2125L22.725 26.875L20.6875 18.0875L27.5 12.175ZM15 19.875L10.3 22.7125L11.55 17.3625L7.4 13.7625L12.875 13.2875L15 8.25L17.1375 13.3L22.6125 13.775L18.4625 17.375L19.7125 22.725L15 19.875Z"
                                        fill="black" fill-opacity="0.23"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <p class="text-base font-semibold text-center text-[#343a40] mt-[31px] mb-[16px]">Best choice</p>
                    <p class="text-sm text-center text-[#343a40]">Top selection of highest rated restaurants</p>
                </div>
            </div>
            <div>
                <div class="h-[185px] w-[338px] rounded-2xl bg-white flex flex-col items-center justify-center snap-center"
                    style="box-shadow: 0px 20px 50px 0 rgba(0,0,0,0.1);">
                    <div class="flex justify-start items-start relative">
                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            class="flex-grow-0 flex-shrink-0 w-[35px] h-[35px] relative"
                            preserveAspectRatio="xMidYMid meet">
                            <path
                                d="M17.5001 25.9152L26.5126 31.3548L24.1209 21.1027L32.0834 14.2048L21.598 13.3152L17.5001 3.64648L13.4022 13.3152L2.91675 14.2048L10.8792 21.1027L8.48758 31.3548L17.5001 25.9152Z"
                                fill="black" fill-opacity="0.54"></path>
                        </svg>
                    </div>
                    <p class="text-base font-semibold text-center text-[#343a40] mt-[26px] mb-[16px]">Special benefits
                    </p>
                    <p class="text-sm text-center text-[#343a40]">Various offers for many restaurants</p>
                </div>
            </div>
        </div>
        <svg width="35" height="9" viewBox="0 0 35 9" fill="none" xmlns="http://www.w3.org/2000/svg"
            class="w-[35px] h-[9px] absolute bottom-[64px]" preserveAspectRatio="none">
            <circle class="indicator" cx="4.50012" cy="4.5" r="4.5"
                fill="url(#paint0_linear_1107_8696)"></circle>
            <circle class="indicator" cx="17.5001" cy="4.5" r="4.5" fill="#E2E2E2"></circle>
            <circle class="indicator" cx="30.5001" cy="4.5" r="4.5" fill="#E2E2E2"></circle>
            <defs>
                <linearGradient id="paint0_linear_1107_8696" x1="0.00012207" y1="0" x2="9.00012"
                    y2="9" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#52D1ED"></stop>
                    <stop offset="1" stop-color="#005FA4"></stop>
                </linearGradient>
                <linearGradient id="paint1_linear_1107_8697" x1="13.0001" y1="0" x2="22.0001"
                    y2="9" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#52D1ED"></stop>
                    <stop offset="1" stop-color="#005FA4"></stop>
                </linearGradient>
                <linearGradient id="paint2_linear_1107_8698" x1="26.0001" y1="0" x2="35.0001"
                    y2="9" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#52D1ED"></stop>
                    <stop offset="1" stop-color="#005FA4"></stop>
                </linearGradient>
            </defs>
        </svg>
    </div>

    <p class="text-lg font-medium text-left text-[#343a40] ml-[26px] mb-[26px]">Are you a restauranter?</p>
    <div class="mx-[26px] flex flex-col justify-center items-center">
        <div class="h-[103px] w-full">
            <img src="<?php echo e(asset('images\Rectangle 395.png')); ?>" class="w-full h-full object-cover" alt="">
        </div>
        <p class="text-xs font-light text-[#343a40] my-[16px]">
            We'll help you manage your guests with our easy-to-use restaurant booking software.
            <br>
            Partner with us or log in to start managing your clients.
        </p>
        <div class="flex justify-between w-full">
            <button class="w-full h-8 rounded-[10px] bg-[#005fa4] text-xs font-medium text-center text-white">Partner
                with us</button>
        </div>
    </div>

    <?php if(Session::has('reservation_success')): ?>
        <div x-data="{ showModal: true }" x-show="showModal" class="fixed inset-0 flex items-center justify-center z-50">
            <!-- Modal backdrop -->
            <div x-on:click.away="showModal = false" class="fixed inset-0 bg-black opacity-50 z-40"></div>

            <!-- Modal content -->
            <div class="w-[338px] h-[268px] relative overflow-hidden rounded-lg bg-white shadow-lg z-50">
                <svg width="35" height="38" viewBox="0 0 35 38" fill="none"
                    xmlns="http://www.w3.org/2000/svg" class="w-[35px] h-[35px] absolute left-5 top-[119px]"
                    preserveAspectRatio="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12.8965 28.8871C15.0248 27.8277 25 22.3633 25 13.0059C25 6.1023 19.4036 0.505859 12.5 0.505859C5.59644 0.505859 0 6.1023 0 13.0059C0 22.3633 9.97517 27.8277 12.1035 28.8871C12.3586 29.014 12.6414 29.014 12.8965 28.8871ZM12.5 18.363C15.4587 18.363 17.8571 15.9645 17.8571 13.0059C17.8571 10.0472 15.4587 7.64872 12.5 7.64872C9.54133 7.64872 7.14286 10.0472 7.14286 13.0059C7.14286 15.9645 9.54133 18.363 12.5 18.363Z"
                        fill="white"></path>
                </svg>

                <div class="w-3 h-3 absolute left-[346px] top-[22.44px]"></div>

                <p
                    class="w-[203px] h-[46px] absolute left-[68px] top-[127px] text-lg font-semibold text-center text-[#005fa4]">
                    Reservation request successfully sent
                </p>

                <svg width="85" height="85" viewBox="0 0 85 85" fill="none"
                    xmlns="http://www.w3.org/2000/svg" class="w-[85px] h-[85px] absolute left-[126px] top-[30px]"
                    preserveAspectRatio="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M42.5002 74.3757C60.104 74.3757 74.3752 60.1045 74.3752 42.5007C74.3752 24.8968 60.104 10.6257 42.5002 10.6257C24.8963 10.6257 10.6252 24.8968 10.6252 42.5007C10.6252 60.1045 24.8963 74.3757 42.5002 74.3757ZM42.5002 77.9173C62.0608 77.9173 77.9168 62.0613 77.9168 42.5007C77.9168 22.94 62.0608 7.08398 42.5002 7.08398C22.9395 7.08398 7.0835 22.94 7.0835 42.5007C7.0835 62.0613 22.9395 77.9173 42.5002 77.9173Z"
                        fill="#005FA4"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M61.3951 28.7928C61.7434 29.1076 61.9526 29.5478 61.9765 30.0167C62.0004 30.4855 61.8371 30.9447 61.5226 31.2933L37.8713 57.4325L23.5701 43.7812C23.2489 43.453 23.0678 43.0129 23.065 42.5537C23.0621 42.0946 23.2377 41.6523 23.5547 41.3201C23.8717 40.9879 24.3054 40.7919 24.7641 40.7733C25.2229 40.7547 25.671 40.9151 26.0138 41.2206L37.6836 52.3591L58.8964 28.9186C59.0525 28.7461 59.2411 28.606 59.4514 28.5064C59.6616 28.4068 59.8895 28.3496 60.1218 28.3381C60.3542 28.3266 60.5866 28.361 60.8056 28.4393C61.0247 28.5176 61.2262 28.6384 61.3986 28.7946L61.3951 28.7928Z"
                        fill="#005FA4"></path>
                </svg>

                <p class="w-[282px] absolute left-[25px] top-[197px] text-xs text-left text-gray-600">
                    Note: Your request for table reservation was sent, you will get a confirmation e-mail with the
                    reservation details.
                </p>

                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                    xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 absolute left-[306px] top-[18px]"
                    preserveAspectRatio="none">
                    <path d="M13 1L1 13" stroke="#343A40" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                    <path d="M1 1L13 13" stroke="#343A40" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                </svg>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>
    <script src="<?php echo e(asset('js/index.js')); ?>"></script>
    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                console.log("Geolocation is not supported by this browser.");
            }
        }

        function showPosition(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

            // Redirect to the nearest restaurants page with query parameters
            window.location.href = "<?php echo e(route('user.nearest')); ?>?latitude=" + latitude + "&longitude=" + longitude;
        }
    </script>
    <script>
        // Get the user's current location
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;

                    // Fetch nearest restaurants
                    fetch('/getNearestRestaurants', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]') ? document
                                    .querySelector('meta[name="csrf-token"]').getAttribute('content') : null
                            },
                            body: JSON.stringify({
                                latitude: latitude,
                                longitude: longitude
                            })
                        })
                        .then(response => response.json())
                        .then(data => {

                            // Display the nearest restaurants
                            var nearestRestaurantsDiv = document.getElementById('nearestRestaurants');
                            if (data.message) {
                                nearestRestaurantsDiv.innerHTML = data.message;
                            } else {
                                nearestRestaurantsDiv.innerHTML = data.html;
                            }
                            console.log(data)
                        })
                        .catch(error => {
                            console.error('Error fetching nearest restaurants:', error);
                        });
                },
                function(error) {
                    console.error('Error getting current location:', error);
                }
            );
        } else {
            console.error('Geolocation is not supported by this browser.');
        }

        function handleButtonClick(restaurantId) {
            event.preventDefault(); // Prevent the default behavior
            window.location.href = '/user/favorite/' + restaurantId;
        }
    </script>
    <script>
        const searchInput = document.getElementById('searchRestaurant');
        const autocompleteResults = document.getElementById('autocomplete-results');

        searchInput.addEventListener('input', function() {
            const term = searchInput.value;

            // Make an AJAX request to the autocomplete route
            fetch(`/searchByTermName?term=${term}`)
                .then(response => response.json())
                .then(data => {
                    // Clear previous results
                    autocompleteResults.innerHTML = '';

                    // Display the suggestions or "no results found" message
                    if (data !== 'No results found') {
                        const suggestion = data;
                        const li = document.createElement('li');
                        li.textContent = suggestion.title;
                        // Add a click event listener to the suggestion
                        li.addEventListener('click', function() {
                            // Navigate to the restaurant page with the corresponding ID
                            window.location.href = `/restaurant/${suggestion.title}`;
                        });
                        autocompleteResults.appendChild(li);
                    } else {
                        const li = document.createElement('li');
                        li.textContent = 'No results found';
                        autocompleteResults.appendChild(li);
                    }

                    // Show the autocomplete results
                    autocompleteResults.classList.remove('hidden');
                });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('footer', ''); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\reservation\resources\views/user/index.blade.php ENDPATH**/ ?>