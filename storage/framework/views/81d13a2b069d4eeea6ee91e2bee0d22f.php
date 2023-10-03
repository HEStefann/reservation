<div id="navBar"
    class="flex content-center items-center justify-between w-full top-0 bg-white sticky z-20 px-[26px] mb-[14px]">
    <a href="<?php echo e(url()->previous()); ?>" class="<?php echo e(url()->previous() == '/' ? 'hidden' : ''); ?>">
        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg"
            class="flex-grow-0 flex-shrink-0 w-6 h-6" preserveAspectRatio="none">
            <g clip-path="url(#clip0_708_2859)">
                <rect y="0.760498" width="24" height="24" rx="8" fill="#D9D9D9" fill-opacity="0.15">
                </rect>
                <path d="M14.7083 4.76123L8 12.2612L14.7083 19.7612" stroke="#6B686B" stroke-width="1.5"></path>
            </g>
            <rect x="0.5" y="1.2605" width="23" height="23" rx="7.5" stroke="#DDDDDD"></rect>
            <defs>
                <clipPath id="clip0_708_2859">
                    <rect y="0.760498" width="24" height="24" rx="8" fill="white"></rect>
                </clipPath>
            </defs>
        </svg>
    </a>
    <a href="<?php echo e(route('user.home')); ?>">
        <svg width="140" height="46" viewBox="0 0 140 46" fill="none" xmlns="http://www.w3.org/2000/svg"
            class="flex-grow-0 flex-shrink-0 w-[140px] h-[45.52px]" preserveAspectRatio="none">
            <path
                d="M84.8141 17.0985C84.6332 17.1438 84.0904 17.2344 83.6154 17.325L82.756 17.4609L82.8238 23.4624L82.8917 29.4865L83.5928 30.1207C84.3392 30.7548 86.0581 31.2304 86.3973 30.8907C86.4878 30.7774 86.6235 30.2565 86.714 29.713C86.8271 28.8977 86.8044 28.7618 86.4426 28.7618C85.5379 28.7618 85.4927 28.4221 85.4927 22.6018C85.4927 19.5218 85.4248 17.0079 85.3343 17.0079C85.2212 17.0306 84.9951 17.0759 84.8141 17.0985Z"
                fill="#00487C"></path>
            <path
                d="M19.5638 17.9818C15.8094 18.933 13.5024 21.9451 13.5024 25.8177C13.5251 28.4675 14.4976 30.4604 16.5331 32.091C18.0937 33.314 19.6995 33.8122 21.9386 33.699C24.2908 33.5857 25.6026 33.0195 27.2763 31.3663C28.8142 29.8263 29.4701 28.1504 29.4927 25.7045C29.4927 24.1871 29.4023 23.6662 28.8595 22.5112C27.2763 19.0009 23.2052 17.0306 19.5638 17.9818ZM24.3134 19.7936C26.643 20.858 28.1131 23.168 28.1131 25.7951C28.1131 28.4448 26.8239 30.4604 24.3813 31.706C22.391 32.6798 20.4911 32.6798 18.5234 31.6381C14.5428 29.5772 13.6155 24.391 16.6915 21.2203C18.727 19.0915 21.5768 18.5706 24.3134 19.7936Z"
                fill="#00487C"></path>
            <path
                d="M21.328 20.3144C21.1018 20.3823 21.0339 21.1976 21.0339 23.3038V26.1574L22.3683 26.9047C23.9289 27.7427 24.6527 27.8333 24.6527 27.1765C24.6527 26.8368 24.2908 26.5424 23.4087 26.1121L22.1648 25.5006V23.2132C22.1648 20.9032 21.916 20.0879 21.328 20.3144Z"
                fill="#00487C"></path>
            <path
                d="M41.05 18.526L40.1453 18.6845L40.0775 24.7313L40.0322 30.8008H41.3666H42.7237L42.7915 28.5814L42.8594 26.3846L43.5605 26.3166C44.2164 26.2487 44.3521 26.3619 45.302 27.7887C45.8448 28.6266 46.4781 29.6684 46.6817 30.0534C47.0435 30.8008 47.0888 30.8008 48.6494 30.8008H50.2325L49.5088 29.4872C49.1017 28.7852 48.4458 27.7208 48.0161 27.1093C47.609 26.5205 47.2697 25.9769 47.2697 25.8637C47.2697 25.7731 47.5637 25.5466 47.9256 25.3202C48.8303 24.8219 49.3731 23.6896 49.3731 22.2854C49.3731 19.7942 47.6316 18.5486 44.0355 18.4354C42.882 18.4128 41.5476 18.458 41.05 18.526ZM45.1211 20.836C46.1389 21.0625 46.5912 21.5607 46.5912 22.4213C46.5912 23.4178 45.7317 24.0293 44.1938 24.0746L42.8594 24.1199L42.7915 22.6704C42.7463 21.8778 42.7689 21.0851 42.8368 20.9266C42.9725 20.5642 43.8319 20.5189 45.1211 20.836Z"
                fill="#00487C"></path>
            <path
                d="M8.59448 21.0387C8.59448 23.4167 8.6171 23.5299 9.15991 23.9602C9.70272 24.3905 9.72534 24.4358 9.77057 28.6708L9.83842 32.9512H10.4039H10.9693L11.0371 28.6256C11.0824 24.2773 11.0824 24.2773 11.6478 23.9149C12.1906 23.5526 12.2132 23.462 12.2132 21.0614C12.2132 19.544 12.1228 18.5702 11.9871 18.5702C11.8513 18.5702 11.7609 19.2949 11.7609 20.2687C11.7609 21.6276 11.693 21.9673 11.4216 21.9673C11.1502 21.9673 11.0824 21.6276 11.0824 20.2687C11.0824 19.2949 10.9919 18.5702 10.8562 18.5702C10.7205 18.5702 10.63 19.2949 10.63 20.2687C10.63 21.2426 10.5396 21.9673 10.4039 21.9673C10.2681 21.9673 10.1777 21.2426 10.1777 20.2687C10.1777 19.2949 10.0872 18.5702 9.95151 18.5702C9.81581 18.5702 9.72534 19.2949 9.72534 20.2687C9.72534 21.6276 9.65749 21.9673 9.38608 21.9673C9.11468 21.9673 9.04682 21.6276 9.04682 20.2687C9.04682 19.2949 8.95636 18.5702 8.82065 18.5702C8.68495 18.5702 8.59448 19.544 8.59448 21.0387Z"
                fill="#00487C"></path>
            <path
                d="M31.4378 19.0017C31.3021 19.2508 31.2117 21.0626 31.2117 23.282C31.2117 26.9282 31.2343 27.1321 31.664 27.2453C32.0937 27.3585 32.1164 27.5624 32.1164 30.0989C32.1164 32.3409 32.1842 32.8845 32.4556 32.9751C32.6365 33.0656 32.9532 32.9977 33.1341 32.8392C33.4281 32.59 33.4734 31.5256 33.4734 25.9997C33.4734 21.9232 33.3829 19.2735 33.2472 19.0017C33.0889 18.7299 32.7723 18.5714 32.3425 18.5714C31.9128 18.5714 31.5962 18.7299 31.4378 19.0017Z"
                fill="#00487C"></path>
            <path
                d="M91.803 19.6357C90.2198 23.2593 87.5283 30.144 87.5283 30.597C87.5283 30.7102 88.139 30.8008 88.8627 30.8008H90.1971L90.6269 29.4872L91.0792 28.1964L93.5671 28.1284L96.055 28.0605L96.4621 29.4419L96.8692 30.8008H98.3393H99.7868L99.6285 30.1667C99.4023 29.2381 97.0954 23.3046 96.0097 20.836L95.0824 18.6845L93.6802 18.6166L92.2779 18.5486L91.803 19.6357ZM94.0194 22.2401C94.1551 22.6478 94.517 23.6669 94.8563 24.5049L95.4443 26.0449H93.6123C91.5089 26.0449 91.622 26.3393 92.7755 23.2593C93.1374 22.3081 93.5219 21.5154 93.6123 21.5154C93.7028 21.5154 93.8837 21.8551 94.0194 22.2401Z"
                fill="#00487C"></path>
            <path
                d="M53.8967 21.8781C52.3361 22.6481 51.5671 24.0976 51.5671 26.2491C51.5671 28.1061 52.1552 29.397 53.3991 30.2576C54.1455 30.7785 54.5978 30.8917 56.0453 30.9823C57.0179 31.0276 58.2166 30.9597 58.7594 30.8011C59.6188 30.5747 59.7319 30.4841 59.6188 30.0538C59.551 29.782 59.4831 29.3291 59.4831 29.08C59.4831 28.6044 59.4153 28.6044 57.5154 28.6949C55.7061 28.8082 55.4573 28.7629 54.9145 28.3099C54.5526 28.0382 54.2812 27.6305 54.2812 27.3814C54.2812 26.9738 54.4621 26.9511 57.2214 26.9511H60.1616V25.6376C60.1616 22.1273 57.0857 20.2702 53.8967 21.8781ZM57.2893 24.0523C57.4928 24.3014 57.6738 24.709 57.6738 24.9355C57.6738 25.3205 57.4928 25.3658 56.0227 25.3658C55.0954 25.3658 54.3038 25.2979 54.2133 25.2299C53.9646 24.9808 54.7335 23.7579 55.2537 23.554C55.9322 23.2596 56.8143 23.4861 57.2893 24.0523Z"
                fill="#00487C"></path>
            <path
                d="M74.5233 21.7193C72.7592 22.5346 71.9224 24.0294 71.9224 26.3394C71.9224 28.3776 72.5783 29.5779 74.1615 30.3932C75.134 30.8915 75.6768 31.0273 76.8755 31.0273C77.6897 31.0273 78.7527 30.9141 79.2277 30.7782C80.1098 30.5518 80.1098 30.5518 79.9514 29.6006C79.861 29.0797 79.7705 28.6267 79.7253 28.5814C79.7027 28.5588 79.1146 28.6041 78.4587 28.7173C76.3327 29.0344 74.6364 28.4456 74.6364 27.3585C74.6364 26.9735 74.8626 26.9508 77.554 26.9508C80.4264 26.9508 80.4943 26.9282 80.5621 26.43C80.6978 25.5467 80.3359 23.7802 79.8384 22.9876C78.8884 21.4476 76.4006 20.8587 74.5233 21.7193ZM77.6445 24.052C77.8481 24.3011 78.029 24.7088 78.029 24.9352C78.029 25.3202 77.8481 25.3655 76.3327 25.3655C74.9531 25.3655 74.6364 25.2976 74.6364 25.0032C74.6364 23.5085 76.6493 22.8743 77.6445 24.052Z"
                fill="#00487C"></path>
            <path
                d="M102.523 21.5601L101.325 21.7866V27.9919V34.1973H102.682H104.039V32.3855V30.5737L104.627 30.8002C106.278 31.4343 108.562 30.619 109.399 29.1016C110.055 27.924 110.281 25.999 109.942 24.7081C109.173 21.8545 106.685 20.7901 102.523 21.5601ZM106.911 24.4363C107.522 25.3422 107.612 26.8596 107.092 27.8334C106.73 28.5581 106.346 28.7619 105.396 28.7619C104.061 28.7619 104.039 28.694 104.039 25.999V23.5304L105.215 23.5984C106.278 23.6663 106.459 23.7569 106.911 24.4363Z"
                fill="#00487C"></path>
            <path
                d="M113.38 21.5601L112.181 21.7866V27.9919V34.1973H113.538H114.895V32.3855V30.5737L115.483 30.8002C117.134 31.4343 119.418 30.619 120.255 29.1016C120.911 27.924 121.137 25.999 120.798 24.7081C120.029 21.8545 117.541 20.7901 113.38 21.5601ZM117.767 24.4363C118.378 25.3422 118.468 26.8596 117.948 27.8334C117.586 28.5581 117.202 28.7619 116.252 28.7619C114.918 28.7619 114.895 28.694 114.895 25.999V23.5304L116.071 23.5984C117.134 23.6663 117.315 23.7569 117.767 24.4363Z"
                fill="#00487C"></path>
            <path
                d="M124.507 21.5827C123.489 22.0582 122.992 22.7377 122.879 23.8247C122.743 25.2968 123.331 26.0442 125.412 27.0406C126.882 27.7427 127.131 27.9465 127.063 28.3768C126.995 28.8298 126.859 28.8751 125.751 28.8751C125.073 28.8751 124.191 28.7845 123.783 28.6939C123.105 28.5127 123.037 28.558 122.901 29.1468C122.834 29.4865 122.72 29.9621 122.675 30.1659C122.517 30.7321 124.1 31.0945 126.226 30.9812C128.284 30.8907 129.076 30.4604 129.573 29.1015C129.867 28.3768 129.867 28.1277 129.573 27.3124C129.279 26.4745 129.098 26.3159 127.402 25.478C126.339 24.9571 125.502 24.4136 125.435 24.1871C125.254 23.4171 126.633 23.1 128.171 23.5303C128.895 23.7341 128.895 23.7341 129.098 22.8056C129.212 22.2847 129.212 21.7638 129.121 21.6506C128.827 21.3109 125.254 21.2429 124.507 21.5827Z"
                fill="#00487C"></path>
            <path
                d="M62.197 24.0519C62.672 25.456 63.4636 27.5169 63.9385 28.6493L64.8206 30.6875H66.0419H67.2632L68.1453 28.6493C68.6203 27.5169 69.4119 25.456 69.8868 24.0519L70.7689 21.5154H69.4571H68.1227L67.1502 24.5728C66.63 26.2486 66.1324 27.5622 66.0419 27.5169C65.9515 27.4716 65.4765 26.0901 65.0015 24.4595L64.1195 21.5154H62.7172H61.3149L62.197 24.0519Z"
                fill="#00487C"></path>
        </svg></a>
    
    <a href="<?php echo e(Auth::check() ? route('user.profile') : route('login')); ?>">
        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg"
            class="flex-grow-0 flex-shrink-0 w-6 h-6 relative" preserveAspectRatio="xMidYMid meet">
            <path
                d="M19.6515 21.1659C20.2043 21.0507 20.5336 20.4722 20.2589 19.9788C19.6533 18.8912 18.6993 17.9354 17.4788 17.207C15.907 16.269 13.9812 15.7605 12 15.7605C10.0188 15.7605 8.09292 16.269 6.52112 17.207C5.30069 17.9354 4.34666 18.8912 3.74108 19.9788C3.46638 20.4722 3.79562 21.0507 4.34843 21.1659C9.39524 22.2177 14.6047 22.2177 19.6515 21.1659Z"
                fill="#343A40"></path>
            <circle cx="12" cy="8.7605" r="5" fill="#343A40"></circle>
        </svg>
    </a>
</div>
<?php /**PATH /home/cakizy/Documents/github/reservation/resources/views/components/navbar.blade.php ENDPATH**/ ?>