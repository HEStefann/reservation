<?php $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e(route('user.restaurant', $restaurant->id)); ?>">
        <div class="w-[148px] h-full rounded-2xl bg-white p-[10px] d-flex justify-center"
            style="filter: drop-shadow(0px 20px 50px rgba(0,0,0,0.1)); box-shadow: 0px 2px 8px 0 rgba(0,0,0,0.04);">
            <div class="w-32 h-[103.3px] rounded-tl-lg rounded-tr-lg bg-[#c4c4c4] relative">
                <?php
                    $imageUrl = $restaurant
                        ->images()
                        ->where('display_order', 1)
                        ->first()->image_url;
                    $storageUrl = Storage::url($imageUrl);
                    $isHttps = str_contains($storageUrl, 'https');
                    $finalImageUrl = $isHttps ? url($imageUrl) : $storageUrl;
                ?>
                <img src="<?php echo e($finalImageUrl); ?>" class="w-full h-full rounded-tl-lg rounded-tr-lg  object-cover" />
                <?php if(Auth::check()): ?>
                    <button class="absolute right-[3.32px] top-[6.87px]"
                        onclick="handleButtonClick(<?php echo e($restaurant->id); ?>)">
                        <?php if(Auth::user()->isFavorite($restaurant)): ?>
                            <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M5.99993 1.73472L7.68281 3.33555L9.3657 1.73472C10.6619 0.501698 12.7239 0.595538 13.9027 1.9412C14.9771 3.16758 14.9372 5.01137 13.8107 6.19007L7.68281 12.6021L1.55494 6.19007C0.428471 5.01137 0.388527 3.16758 1.46289 1.9412C2.64176 0.595538 4.70371 0.501698 5.99993 1.73472Z"
                                    fill="url(#paint0_linear_1144_6872)"></path>
                                <path
                                    d="M7.68281 3.33555L7.3382 3.69782L7.68281 4.02563L8.02743 3.69782L7.68281 3.33555ZM5.99993 1.73472L5.65532 2.09699L5.65532 2.09699L5.99993 1.73472ZM9.3657 1.73472L9.02108 1.37244L9.02108 1.37244L9.3657 1.73472ZM13.9027 1.9412L14.2788 1.61173L14.2788 1.61172L13.9027 1.9412ZM13.8107 6.19007L14.1722 6.53552L14.1722 6.53552L13.8107 6.19007ZM7.68281 12.6021L7.32133 12.9475L7.68281 13.3258L8.04428 12.9475L7.68281 12.6021ZM1.55494 6.19007L1.19347 6.53552L1.19347 6.53552L1.55494 6.19007ZM1.46289 1.9412L1.83899 2.27068L1.83899 2.27068L1.46289 1.9412ZM8.02743 2.97327L6.34454 1.37244L5.65532 2.09699L7.3382 3.69782L8.02743 2.97327ZM8.02743 3.69782L9.71031 2.09699L9.02108 1.37244L7.3382 2.97327L8.02743 3.69782ZM9.71031 2.09699C10.8006 1.05984 12.535 1.13877 13.5266 2.27068L14.2788 1.61172C12.9127 0.0523051 10.5232 -0.0564412 9.02108 1.37244L9.71031 2.09699ZM13.5266 2.27068C14.4303 3.30225 14.3967 4.85315 13.4492 5.84462L14.1722 6.53552C15.4776 5.16959 15.5239 3.03292 14.2788 1.61173L13.5266 2.27068ZM13.4492 5.84462L7.32133 12.2566L8.04428 12.9475L14.1722 6.53552L13.4492 5.84462ZM1.19347 6.53552L7.32133 12.9475L8.04428 12.2566L1.91641 5.84462L1.19347 6.53552ZM1.0868 1.61173C-0.158229 3.03292 -0.111939 5.16959 1.19347 6.53552L1.91641 5.84462C0.968881 4.85315 0.935282 3.30225 1.83899 2.27068L1.0868 1.61173ZM6.34454 1.37244C4.84242 -0.0564412 2.45292 0.052305 1.0868 1.61173L1.83899 2.27068C2.83059 1.13877 4.565 1.05984 5.65532 2.09699L6.34454 1.37244Z"
                                    fill="url(#paint1_linear_1144_6872)"></path>
                                <defs>
                                    <linearGradient id="paint0_linear_1144_6872" x1="0.682861" y1="0.867676"
                                        x2="12.2368" y2="14.6523" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FFCD01"></stop>
                                        <stop offset="1" stop-color="#FC7F09"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint1_linear_1144_6872" x1="0.682861" y1="0.867676"
                                        x2="12.2368" y2="14.6523" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FFCD01"></stop>
                                        <stop offset="1" stop-color="#FC7F09"></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                        <?php else: ?>
                            <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet">
                                <path
                                    d="M7.68281 3.33555L7.3382 3.69782L7.68281 4.02563L8.02743 3.69782L7.68281 3.33555ZM5.99993 1.73472L5.65532 2.09699L5.99993 1.73472ZM9.3657 1.73472L9.02108 1.37244V1.37244L9.3657 1.73472ZM13.9027 1.9412L14.2788 1.61172V1.61172L13.9027 1.9412ZM13.8107 6.19007L14.1722 6.53552L14.1722 6.53552L13.8107 6.19007ZM7.68281 12.6021L7.32133 12.9475L7.68281 13.3258L8.04428 12.9475L7.68281 12.6021ZM1.55494 6.19007L1.19347 6.53552L1.55494 6.19007ZM1.46289 1.9412L1.83899 2.27068L1.46289 1.9412ZM8.02743 2.97327L6.34454 1.37244L5.65532 2.09699L7.3382 3.69782L8.02743 2.97327ZM8.02743 3.69782L9.71031 2.09699L9.02108 1.37244L7.3382 2.97327L8.02743 3.69782ZM9.71031 2.09699C10.8006 1.05984 12.535 1.13877 13.5266 2.27068L14.2788 1.61172C12.9127 0.052305 10.5232 -0.0564412 9.02108 1.37244L9.71031 2.09699ZM13.5266 2.27068C14.4303 3.30225 14.3967 4.85315 13.4492 5.84462L14.1722 6.53552C15.4776 5.16959 15.5239 3.03292 14.2788 1.61172L13.5266 2.27068ZM13.4492 5.84462L7.32133 12.2566L8.04428 12.9475L14.1722 6.53552L13.4492 5.84462ZM1.19347 6.53552L7.32133 12.9475L8.04428 12.2566L1.91641 5.84462L1.19347 6.53552ZM1.0868 1.61172C-0.158229 3.03292 -0.111939 5.16959 1.19347 6.53552L1.91641 5.84462C0.968881 4.85315 0.935282 3.30225 1.83899 2.27068L1.0868 1.61172ZM6.34454 1.37244C4.84242 -0.0564412 2.45292 0.052305 1.0868 1.61172L1.83899 2.27068C2.83059 1.13877 4.565 1.05984 5.65532 2.09699L6.34454 1.37244Z"
                                    fill="url(#paint0_linear_1379_710)"></path>
                                <defs>
                                    <linearGradient id="paint0_linear_1379_710" x1="0.682861" y1="0.867676"
                                        x2="12.2368" y2="14.6523" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FFCD01"></stop>
                                        <stop offset="1" stop-color="#FC7F09"></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                        <?php endif; ?>
                    </button>
                <?php else: ?>
                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none"
                        xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet"
                        class="absolute right-[3.32px] top-[6.87px]">
                        <path
                            d="M7.68281 3.33555L7.3382 3.69782L7.68281 4.02563L8.02743 3.69782L7.68281 3.33555ZM5.99993 1.73472L5.65532 2.09699L5.99993 1.73472ZM9.3657 1.73472L9.02108 1.37244V1.37244L9.3657 1.73472ZM13.9027 1.9412L14.2788 1.61172V1.61172L13.9027 1.9412ZM13.8107 6.19007L14.1722 6.53552L14.1722 6.53552L13.8107 6.19007ZM7.68281 12.6021L7.32133 12.9475L7.68281 13.3258L8.04428 12.9475L7.68281 12.6021ZM1.55494 6.19007L1.19347 6.53552L1.55494 6.19007ZM1.46289 1.9412L1.83899 2.27068L1.46289 1.9412ZM8.02743 2.97327L6.34454 1.37244L5.65532 2.09699L7.3382 3.69782L8.02743 2.97327ZM8.02743 3.69782L9.71031 2.09699L9.02108 1.37244L7.3382 2.97327L8.02743 3.69782ZM9.71031 2.09699C10.8006 1.05984 12.535 1.13877 13.5266 2.27068L14.2788 1.61172C12.9127 0.052305 10.5232 -0.0564412 9.02108 1.37244L9.71031 2.09699ZM13.5266 2.27068C14.4303 3.30225 14.3967 4.85315 13.4492 5.84462L14.1722 6.53552C15.4776 5.16959 15.5239 3.03292 14.2788 1.61172L13.5266 2.27068ZM13.4492 5.84462L7.32133 12.2566L8.04428 12.9475L14.1722 6.53552L13.4492 5.84462ZM1.19347 6.53552L7.32133 12.9475L8.04428 12.2566L1.91641 5.84462L1.19347 6.53552ZM1.0868 1.61172C-0.158229 3.03292 -0.111939 5.16959 1.19347 6.53552L1.91641 5.84462C0.968881 4.85315 0.935282 3.30225 1.83899 2.27068L1.0868 1.61172ZM6.34454 1.37244C4.84242 -0.0564412 2.45292 0.052305 1.0868 1.61172L1.83899 2.27068C2.83059 1.13877 4.565 1.05984 5.65532 2.09699L6.34454 1.37244Z"
                            fill="url(#paint0_linear_1379_710)"></path>
                        <defs>
                            <linearGradient id="paint0_linear_1379_710" x1="0.682861" y1="0.867676" x2="12.2368"
                                y2="14.6523" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#FFCD01"></stop>
                                <stop offset="1" stop-color="#FC7F09"></stop>
                            </linearGradient>
                        </defs>
                    </svg>
                <?php endif; ?>
            </div>
            <div class="pt-[6px]">
                <p class="text-sm font-medium text-left text-[#343a40]"><?php echo e($restaurant->title); ?></p>
                <div class="flex justify-between pr-[3px] pt-[6px]">
                    <div class="flex flex-col">
                        <div class="flex gap-[5.7px]">
                            <svg width="9" height="11" viewBox="0 0 9 11" fill="none"
                                xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M0 4.13245C0 1.8478 1.85652 0 4.15196 0C6.4474 0 8.30392 1.8478 8.30392 4.13245C8.30392 7.23179 4.15196 10.9483 4.15196 10.9483C4.15196 10.9483 0 7.23179 0 4.13245ZM2.66895 4.13213C2.66895 3.31702 3.33284 2.65625 4.15179 2.65625C4.68156 2.65625 5.17108 2.93755 5.43597 3.39419C5.70085 3.85083 5.70085 4.41343 5.43597 4.87006C5.17108 5.3267 4.68156 5.608 4.15179 5.608C3.33284 5.608 2.66895 4.94723 2.66895 4.13213Z"
                                    fill="#FC7F09"></path>
                            </svg>
                            <div>
                                <p class="text-[8px] text-[#6b686b]">
                                    <?php echo e($restaurant->address); ?>

                                </p>
                                <p class="text-[6px] text-left text-[#6b686b]">
                                    <?php echo e($restaurant->restaurantTag->tag->name ?? ''); ?></p>
                                <?php if($restaurant->average_price): ?>
                                    <p class="text-[6px] font-light text-left text-[#6b686b]">
                                        <?php echo e($restaurant->average_price); ?>$ average price</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-[2px]">
                        <?php if($restaurant->rating): ?>
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                                <path
                                    d="M5 0L6.12257 3.45492H9.75528L6.81636 5.59017L7.93893 9.04508L5 6.90983L2.06107 9.04508L3.18364 5.59017L0.244718 3.45492H3.87743L5 0Z"
                                    fill="#FC7F09" fill-opacity="0.74"></path>
                            </svg>
                            <p class="text-[8px] font-medium text-left text-[#6b686b]"><?php echo e($restaurant->rating); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\reservation\resources\views/components/show-nearest-restaurants.blade.php ENDPATH**/ ?>