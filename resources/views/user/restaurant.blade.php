<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-300">
    <x-navbar />
    {{-- public/images/mario-mesaglio-7BZzlV0Z9R4-unsplash 1.png --}}
    <div class="flex items-center">
        <div class="h-[200px] w-full">
            <img class="w-full h-full" src="{{ asset('/images/mario-mesaglio-7BZzlV0Z9R4-unsplash 1.png') }}"
                alt="mario mesaglio">
            <img class="w-full h-full" src="{{ asset('/images/mario-mesaglio-7BZzlV0Z9R4-unsplash 1.png') }}"
                alt="mario mesaglio">
        </div>
        {{--  absolute flex  width: -webkit-fill-available; --}}
        <div class="absolute flex mx-[10px] w-[95%] justify-between">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6" preserveAspectRatio="none">
                <g clip-path="url(#clip0_693_3918)">
                    <rect width="24" height="24" rx="8" fill="#D9D9D9" fill-opacity="0.38"></rect>
                    <rect width="24" height="24" rx="8" fill="#D9D9D9" fill-opacity="0.15"></rect>
                    <path d="M14.7083 4L8 11.5L14.7083 19" stroke="white" stroke-width="1.5"></path>
                </g>
                <rect x="0.5" y="0.5" width="23" height="23" rx="7.5" stroke="#DDDDDD">
                </rect>
                <defs>
                    <clipPath id="clip0_693_3918">
                        <rect width="24" height="24" rx="8" fill="white"></rect>
                    </clipPath>
                </defs>
            </svg>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6" preserveAspectRatio="none">
                <g clip-path="url(#clip0_693_3922)">
                    <rect x="24" y="24" width="24" height="24" rx="8"
                        transform="rotate(-180 24 24)" fill="#D9D9D9" fill-opacity="0.38"></rect>
                    <rect x="24" y="24" width="24" height="24" rx="8"
                        transform="rotate(-180 24 24)" fill="#D9D9D9" fill-opacity="0.15"></rect>
                    <path d="M9.29167 20L16 12.5L9.29167 5" stroke="white" stroke-width="1.5"></path>
                </g>
                <rect x="23.5" y="23.5" width="23" height="23" rx="7.5"
                    transform="rotate(-180 23.5 23.5)" stroke="#DDDDDD"></rect>
                <defs>
                    <clipPath id="clip0_693_3922">
                        <rect x="24" y="24" width="24" height="24" rx="8"
                            transform="rotate(-180 24 24)" fill="white"></rect>
                    </clipPath>
                </defs>
            </svg>
        </div>
    </div>
    <div class="mx-[26px] mt-[6px]">

        <div class="flex justify-between items-center">
            <a href="#" class="text-xs text-left text-black" onclick="changeStyle(this)">About</a>
            <a href="#menuSection" class="text-xs text-left text-black" onclick="changeStyle(this)">Menu</a>
            <a href="#ReviewsTab" class="text-xs text-left text-black" onclick="changeStyle(this)">Reviews</a>
            <a href="#" class="text-xs text-left text-black" onclick="changeStyle(this)">Contact</a>
        </div>
        <div class="mt-[16px]">
            <p class="text-[28px] font-medium text-left text-[#343a40]">De Kas</p>
            <p class="w-[338px] text-xs font-light text-left text-[#343a40]">
                De Kas is a renowned restaurant located in Amsterdam, Netherlands. What sets De Kas apart is its
                unique concept of serving farm-to-table cuisine. The restaurant is housed in a beautifully
                restored greenhouse, creating a charming and rustic ambiance.
            </p>
            <div class="mt-[16px] flex gap-3 items-center ">
                <svg class="w-[15px] h-[15px]" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="w-3.5 h-3.5 relative" preserveAspectRatio="none">
                    <path
                        d="M7 3C8.72391 3 10.3772 3.68482 11.5962 4.90381C12.8152 6.12279 13.5 7.77609 13.5 9.5C13.5 9.76522 13.3946 10.0196 13.2071 10.2071C13.0196 10.3946 12.7652 10.5 12.5 10.5H1.5C1.23478 10.5 0.98043 10.3946 0.792893 10.2071C0.605357 10.0196 0.5 9.76522 0.5 9.5C0.5 7.77609 1.18482 6.12279 2.40381 4.90381C3.62279 3.68482 5.27609 3 7 3ZM7 3V1.5M0.5 12.5H13.5"
                        stroke="#343A40" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <span class="text-[13px]">French cuisine</span>
            </div>
        </div>
        <div class="mt-[16px] flex gap-3 items-center ">
            <svg class="w-[15px] h-[15px]" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="w-3.5 h-3.5 relative" preserveAspectRatio="none">
                <path
                    d="M7 3C8.72391 3 10.3772 3.68482 11.5962 4.90381C12.8152 6.12279 13.5 7.77609 13.5 9.5C13.5 9.76522 13.3946 10.0196 13.2071 10.2071C13.0196 10.3946 12.7652 10.5 12.5 10.5H1.5C1.23478 10.5 0.98043 10.3946 0.792893 10.2071C0.605357 10.0196 0.5 9.76522 0.5 9.5C0.5 7.77609 1.18482 6.12279 2.40381 4.90381C3.62279 3.68482 5.27609 3 7 3ZM7 3V1.5M0.5 12.5H13.5"
                    stroke="#343A40" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <span class="text-[13px]">French cuisine</span>
        </div>
    </div>
    <div class="mx-[26px] mb-[14px]">
        <svg width="340" height="2" viewBox="0 0 340 2" fill="none" xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none">
            <path d="M1 1H339" stroke="#6B686B" stroke-opacity="0.5" stroke-linecap="round"></path>
        </svg>
    </div>
    <div class="mx-[26px] mb-[14px]">
        <p class="text-lg font-medium text-left text-[#343a40]">Menu</p>
        <p class="w-[338px] text-xs font-light text-left text-[#343a40] mt-[12px]">
            The menu at De Kas revolves around fresh, seasonal ingredients sourced directly from their own
            on-site garden and local farms. Diners can enjoy dishes that highlight the flavors of the season,
            prepared with creativity and attention to detail.
        </p>
        <div id="menuSection"
            class="flex flex-col justify-center items-center w-[338px] relative gap-3 p-3 rounded-[10px] bg-white mt-[14px]"
            style="box-shadow: 0px 20px 50px 0 rgba(0,0,0,0.1);">
            <p class="flex-grow-0 flex-shrink-0 w-[306px] text-left">
                <span
                    class="flex-grow-0 flex-shrink-0 w-[306px] text-[11px] font-medium text-left text-[#fc7f09]">Appetizers:</span><br /><span
                    class="flex-grow-0 flex-shrink-0 w-[306px] text-[10px] text-left text-[#343a40]">Bruschetta
                    Trio: Tomato basil, roasted red pepper, and olive tapenade on toasted
                    baguette.</span><br /><span
                    class="flex-grow-0 flex-shrink-0 w-[306px] text-[10px] text-left text-[#343a40]">Crispy
                    Calamari: Served with a zesty lemon aioli dipping sauce.</span><br /><span
                    class="flex-grow-0 flex-shrink-0 w-[306px] text-[10px] text-left text-[#343a40]">Caprese Salad:
                    Fresh mozzarella, heirloom tomatoes, basil, balsamic glaze.</span><br /><br /><span
                    class="flex-grow-0 flex-shrink-0 w-[306px] text-[11px] font-medium text-left text-[#fc7f09]">Soups
                    and Salads:</span><br /><span
                    class="flex-grow-0 flex-shrink-0 w-[306px] text-[10px] text-left text-[#343a40]">Lobster
                    Bisque: Creamy soup with chunks of tender lobster and a hint of sherry.</span><br /><span
                    class="flex-grow-0 flex-shrink-0 w-[306px] text-[10px] text-left text-[#343a40]">Kale and
                    Quinoa Salad: Mixed greens, kale, quinoa, cranberries, candied pecans, and a honey
                    mustard vinaigrette.</span><br /><br /><span
                    class="flex-grow-0 flex-shrink-0 w-[306px] text-[11px] font-medium text-left text-[#fc7f09]">Main
                    Courses:</span><br /><span
                    class="flex-grow-0 flex-shrink-0 w-[306px] text-[10px] text-left text-[#343a40]">Filet Mignon:
                    Grilled to perfection, served with garlic mashed potatoes and sautéed
                    asparagus.</span><br /><span
                    class="flex-grow-0 flex-shrink-0 w-[306px] text-[10px] text-left text-[#343a40]">Pan-Seared
                    Salmon: Topped with a citrus glaze, accompanied by wild rice and roasted Brussels
                    sprouts.</span><br /><span
                    class="flex-grow-0 flex-shrink-0 w-[306px] text-[10px] text-left text-[#343a40]">Mushroom
                    Risotto: Creamy Arborio rice with a medley of wild mushrooms and Parmesan
                    cheese.</span><br /><br /><span
                    class="flex-grow-0 flex-shrink-0 w-[306px] text-[11px] font-medium text-left text-[#fc7f09]">Desserts:</span><br /><span
                    class="flex-grow-0 flex-shrink-0 w-[306px] text-[10px] text-left text-[#343a40]">Molten Lava
                    Cake: Warm chocolate cake with a gooey chocolate center, served with vanilla ice
                    cream.</span><br /><span
                    class="flex-grow-0 flex-shrink-0 w-[306px] text-[10px] text-left text-[#343a40]">Tiramisu:
                    Layers of coffee-soaked ladyfingers, mascarpone cheese, and cocoa.</span><br /><span
                    class="flex-grow-0 flex-shrink-0 w-[306px] text-[10px] text-left text-[#343a40]">Berry Parfait:
                    Mixed berries, vanilla yogurt, and granola.</span><br /><br /><span
                    class="flex-grow-0 flex-shrink-0 w-[306px] text-[11px] font-medium text-left text-[#fc7f09]">Beverages:</span><br /><span
                    class="flex-grow-0 flex-shrink-0 w-[306px] text-[10px] text-left text-[#343a40]">Signature
                    Cocktail: "Garden Spritz" - A refreshing mix of gin, elderflower liqueur, cucumber,
                    and soda water.</span><br /><span
                    class="flex-grow-0 flex-shrink-0 w-[306px] text-[10px] text-left text-[#343a40]">Red Wine:
                    Cabernet Sauvignon - Rich and full-bodied with notes of dark fruit and oak.</span>
            </p>
        </div>
    </div>
    <div class="mx-[26px] mb-[14px]">
        <svg width="340" height="2" viewBox="0 0 340 2" fill="none" xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none">
            <path d="M1 1H339" stroke="#6B686B" stroke-opacity="0.5" stroke-linecap="round"></path>
        </svg>
    </div>
    <div class="mx-[26px] mb-[14px]">
        <div id="ReviewsTab" class="w-[338px] h-[76px] relative"
            style="filter: drop-shadow(0px 20px 50px rgba(0,0,0,0.1));">
            <div class="w-[338px] h-[76px] absolute left-[-0.55px] top-[-0.55px] rounded-[10px] bg-white"></div>
            <div class="flex justify-between items-center w-[65.12px] h-5 absolute left-[255.31px] top-[9px] bg-white">
                <svg width="11" height="10" viewBox="0 0 11 10" fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class="flex-grow-0 flex-shrink-0 w-[9.87px] h-[9.87px] relative"
                    preserveAspectRatio="xMidYMid meet">
                    <g clip-path="url(#clip0_819_101)">
                        <path
                            d="M10.1552 3.85132C10.0906 3.65143 9.91329 3.50946 9.70353 3.49055L6.85426 3.23184L5.72758 0.594735C5.6445 0.40147 5.4553 0.276367 5.24509 0.276367C5.03488 0.276367 4.84568 0.40147 4.76261 0.595187L3.63593 3.23184L0.786205 3.49055C0.576821 3.50991 0.399975 3.65143 0.334976 3.85132C0.269977 4.05122 0.330005 4.27047 0.488398 4.40868L2.64211 6.29749L2.00703 9.09502C1.96056 9.30071 2.0404 9.51334 2.21107 9.63671C2.3028 9.70299 2.41013 9.73673 2.51836 9.73673C2.61168 9.73673 2.70425 9.71157 2.78732 9.66186L5.24509 8.19294L7.70196 9.66186C7.88174 9.77002 8.10837 9.76015 8.27866 9.63671C8.44941 9.51296 8.52917 9.30026 8.4827 9.09502L7.84762 6.29749L10.0013 4.40905C10.1597 4.27047 10.2202 4.05159 10.1552 3.85132Z"
                            fill="#FC7F09"></path>
                    </g>
                    <defs>
                        <clipPath id="clip0_819_101">
                            <rect width="9.87179" height="9.87179" fill="white"
                                transform="translate(0.309082 0.064209)"></rect>
                        </clipPath>
                    </defs>
                </svg><svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class="flex-grow-0 flex-shrink-0 w-[9.87px] h-[9.87px] relative"
                    preserveAspectRatio="xMidYMid meet">
                    <g clip-path="url(#clip0_819_103)">
                        <path
                            d="M9.9671 3.85132C9.90247 3.65143 9.72518 3.50946 9.51542 3.49055L6.66614 3.23184L5.53947 0.594735C5.45639 0.40147 5.26719 0.276367 5.05698 0.276367C4.84677 0.276367 4.65757 0.40147 4.5745 0.595187L3.44782 3.23184L0.598094 3.49055C0.388711 3.50991 0.211865 3.65143 0.146865 3.85132C0.0818662 4.05122 0.141894 4.27047 0.300288 4.40868L2.454 6.29749L1.81892 9.09502C1.77245 9.30071 1.85229 9.51334 2.02296 9.63671C2.11469 9.70299 2.22202 9.73673 2.33025 9.73673C2.42357 9.73673 2.51614 9.71157 2.59921 9.66186L5.05698 8.19294L7.51385 9.66186C7.69363 9.77002 7.92026 9.76015 8.09055 9.63671C8.2613 9.51296 8.34106 9.30026 8.29459 9.09502L7.65951 6.29749L9.81322 4.40905C9.97161 4.27047 10.0321 4.05159 9.9671 3.85132Z"
                            fill="#FC7F09"></path>
                    </g>
                    <defs>
                        <clipPath id="clip0_819_103">
                            <rect width="9.87179" height="9.87179" fill="white"
                                transform="translate(0.120972 0.064209)"></rect>
                        </clipPath>
                    </defs>
                </svg><svg width="11" height="10" viewBox="0 0 11 10" fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class="flex-grow-0 flex-shrink-0 w-[9.87px] h-[9.87px] relative"
                    preserveAspectRatio="xMidYMid meet">
                    <g clip-path="url(#clip0_819_105)">
                        <path
                            d="M10.779 3.85132C10.7144 3.65143 10.5371 3.50946 10.3273 3.49055L7.47803 3.23184L6.35136 0.594735C6.26828 0.40147 6.07908 0.276367 5.86887 0.276367C5.65866 0.276367 5.46946 0.40147 5.38638 0.595187L4.25971 3.23184L1.40998 3.49055C1.2006 3.50991 1.02375 3.65143 0.958755 3.85132C0.893756 4.05122 0.953784 4.27047 1.11218 4.40868L3.26589 6.29749L2.63081 9.09502C2.58434 9.30071 2.66418 9.51334 2.83485 9.63671C2.92658 9.70299 3.03391 9.73673 3.14214 9.73673C3.23546 9.73673 3.32803 9.71157 3.4111 9.66186L5.86887 8.19294L8.32574 9.66186C8.50552 9.77002 8.73215 9.76015 8.90244 9.63671C9.07319 9.51296 9.15295 9.30026 9.10648 9.09502L8.4714 6.29749L10.6251 4.40905C10.7835 4.27047 10.844 4.05159 10.779 3.85132Z"
                            fill="#FC7F09"></path>
                    </g>
                    <defs>
                        <clipPath id="clip0_819_105">
                            <rect width="9.87179" height="9.87179" fill="white"
                                transform="translate(0.9328 0.064209)"></rect>
                        </clipPath>
                    </defs>
                </svg><svg width="11" height="10" viewBox="0 0 11 10" fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class="flex-grow-0 flex-shrink-0 w-[9.87px] h-[9.87px] relative"
                    preserveAspectRatio="xMidYMid meet">
                    <g clip-path="url(#clip0_819_107)">
                        <path
                            d="M10.5908 3.63917C10.5261 3.43927 10.3488 3.2973 10.1391 3.27839L7.2898 3.01968L6.16312 0.382577C6.08005 0.189312 5.89085 0.064209 5.68064 0.064209C5.47043 0.064209 5.28123 0.189312 5.19815 0.383029L4.07147 3.01968L1.22175 3.27839C1.01237 3.29775 0.835522 3.43927 0.770523 3.63917C0.705523 3.83906 0.765552 4.05831 0.923945 4.19652L3.07766 6.08534L2.44258 8.88286C2.39611 9.08856 2.47594 9.30118 2.64661 9.42455C2.73835 9.49083 2.84568 9.52457 2.95391 9.52457C3.04723 9.52457 3.13979 9.49941 3.22287 9.44971L5.68064 7.98078L8.1375 9.44971C8.31729 9.55786 8.54392 9.54799 8.71421 9.42455C8.88496 9.3008 8.96472 9.0881 8.91825 8.88286L8.28317 6.08534L10.4369 4.19689C10.5953 4.05831 10.6558 3.83944 10.5908 3.63917Z"
                            fill="#FC7F09"></path>
                    </g>
                    <defs>
                        <clipPath id="clip0_819_107">
                            <rect width="9.87179" height="9.87179" fill="white"
                                transform="translate(0.74469 0.064209)"></rect>
                        </clipPath>
                    </defs>
                </svg><svg width="11" height="10" viewBox="0 0 11 10" fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class="flex-grow-0 flex-shrink-0 w-[9.87px] h-[9.87px] relative"
                    preserveAspectRatio="xMidYMid meet">
                    <g clip-path="url(#clip0_819_109)">
                        <path
                            d="M10.4027 3.85132C10.3381 3.65143 10.1608 3.50946 9.95102 3.49055L7.10175 3.23184L5.97507 0.594735C5.892 0.40147 5.7028 0.276367 5.49259 0.276367C5.28238 0.276367 5.09318 0.40147 5.0101 0.595187L3.88342 3.23184L1.0337 3.49055C0.824319 3.50991 0.647473 3.65143 0.582473 3.85132C0.517474 4.05122 0.577502 4.27047 0.735896 4.40868L2.88961 6.29749L2.25453 9.09502C2.20806 9.30071 2.28789 9.51334 2.45856 9.63671C2.5503 9.70299 2.65763 9.73673 2.76586 9.73673C2.85918 9.73673 2.95174 9.71157 3.03482 9.66186L5.49259 8.19294L7.94945 9.66186C8.12924 9.77002 8.35587 9.76015 8.52616 9.63671C8.69691 9.51296 8.77667 9.30026 8.7302 9.09502L8.09512 6.29749L10.2488 4.40905C10.4072 4.27047 10.4677 4.05159 10.4027 3.85132Z"
                            fill="#FC7F09"></path>
                    </g>
                    <defs>
                        <clipPath id="clip0_819_109">
                            <rect width="9.87179" height="9.87179" fill="white"
                                transform="translate(0.556519 0.064209)"></rect>
                        </clipPath>
                    </defs>
                </svg>
            </div>
            <p
                class="w-[244.97px] h-4 absolute left-[62.02px] top-[11px] text-[10px] text-left lowercase text-[#343a40]">
                @KRISTINJONES
            </p>
            <p class="w-[217px] h-4 absolute left-[62px] top-[50px] text-[10px] text-left text-[#343a40]">
                I would recommend this for all my friend!
            </p>
            <p
                class="w-[244.97px] h-4 absolute left-[62.02px] top-[29px] text-[8px] text-left lowercase text-[#6b686b]">
                1 DAY AGO
            </p>
            <div class="w-[36.18px] h-[35px] absolute left-[13.44px] top-[11px]">
                <img src="https://images.pexels.com/photos/2726111/pexels-photo-2726111.jpeg?cs=srgb&dl=pexels-masha-raymers-2726111.jpg&fm=jpg"
                    class="w-[36.18px] h-[35px] absolute left-[-1px] top-[-1px] rounded-[300px] object-cover border border-[#e4e4e4]/60" />
            </div>
        </div>
    </div>
    <div class="mx-[26px] mb-[14px]">
        <svg width="340" height="2" viewBox="0 0 340 2" fill="none" xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none">
            <path d="M1 1H339" stroke="#6B686B" stroke-opacity="0.5" stroke-linecap="round"></path>
        </svg>
    </div>
    <div class="px-">
        <div class="flex justify-center items-center w-[338px] h-10 relative overflow-hidden gap-2.5 mx-6 py-2.5 rounded-[10px]"
            style="background: linear-gradient(143.6deg, #52d1ed -56.3%, #0f92cf 26.17%, #005fa4 83.39%);">
            <p class="flex-grow-0 flex-shrink-0 text-xl font-semibold text-left text-white">
                Reserve a table
            </p>
        </div>
    </div>

    {{-- Can you make reserve button with modal on them --}}
    <style>
        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 11;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

                /* Modal Content */
                .modal-content {
                    position: relative;
                    -webkit-animation-name: animatetop;
                    -webkit-animation-duration: 0.4s;
                    animation-name: animatetop;
                    animation-duration: 0.4s
                }

        /* Add Animation */
        @-webkit-keyframes animatetop {
            from {
                top: -300px;
                opacity: 0
            }

            to {
                top: 0;
                opacity: 1
            }
        }

        @keyframes animatetop {
            from {
                top: -300px;
                opacity: 0
            }

            to {
                top: 0;
                opacity: 1
            }
        }

        /* The Close Button */
        .close {
            color: black;
            font-size: 28px;
            font-weight: bold;
        }

                .close:hover,
                .close:focus {
                    color: white;
                    text-decoration: none;
                    cursor: pointer;
                }
            </style>
            <button id="myBtn">Open Modal</button>
            <button id="confirmReservation">Open Modal</button>
            <button id="reservationConfrirmed">Open Modal</button>

            <!-- The Modal -->
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content rounded-[10px] px-[11px] pb-[43px] pt-[21px] mx-[15px] bg-[#fff5ec]">
                    <div class="mb-[36px] flex items-center justify-between">
                        <p class="h-[22px] text-xl font-semibold text-left text-[#343a40]">
                            Your Reservation
                        </p>
                        <svg class="close" width="14" height="15" viewBox="0 0 14 15" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 relative" preserveAspectRatio="none">
                            <path d="M13 1.93164L1 13.9316" stroke="#343A40" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path d="M1 1.93164L13 13.9316" stroke="#343A40" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </div>
                    <div class="flex justify-between">
                        <p class="text-base font-semibold text-left text-[#343a40]">Pick your date</p>
                        <div class="flex items-center gap-[13px]">
                            <p class="text-base text-center text-[#343a40]">September</p>
                            <svg width="14" height="7" viewBox="0 0 14 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="opacity-80" preserveAspectRatio="none">
                                <path opacity="0.8" d="M1.50024 1L7.3166 6L13.133 1" stroke="black"
                                    stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                        <p class="text-base text-center text-[#343a40]">2023</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <div>
                            <svg width="7" height="12" viewBox="0 0 7 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="opacity-80" preserveAspectRatio="none">
                                <path opacity="0.8" d="M6.25763 1L0.999999 6L6.25763 11" stroke="black"
                                    stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                        <div class="flex ml-[9.54px]">
                            <div class="relative w-[49px] h-[72px]">
                                <div class="rounded-[33.92px] bg-white w-[49px] h-[72px] flex justify-center"
                                    style="box-shadow: 0px 20px 50px 0 rgba(0,0,0,0.1);">
                                    <div class="flex flex-col justify-center items-center">
                                        <p
                                            class="flex-grow-0 flex-shrink-0 text-[21.200000762939453px] font-medium text-center text-black">
                                            23
                                        </p>
                                        <p
                                            class="flex-grow-0 flex-shrink-0 text-[10.600000381469727px] font-light text-center text-black">
                                            MO
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="relative w-[49px] h-[72px]">
                                <div class="rounded-[33.92px] bg-white w-[49px] h-[72px] flex justify-center absolute -left-[9.54px]"
                                    style="box-shadow: 0px 20px 50px 0 rgba(0,0,0,0.1);">
                                    <div class="flex flex-col justify-center items-center">
                                        <p
                                            class="flex-grow-0 flex-shrink-0 text-[21.200000762939453px] font-medium text-center text-black">
                                            24
                                        </p>
                                        <p
                                            class="flex-grow-0 flex-shrink-0 text-[10.600000381469727px] font-light text-center text-black">
                                            TU
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="relative w-[49px] h-[72px]">
                                <div class="rounded-[33.92px] bg-white w-[49px] h-[72px] flex justify-center absolute -left-[9.54px]"
                                    style="box-shadow: 0px 20px 50px 0 rgba(0,0,0,0.1);">
                                    <div class="flex flex-col justify-center items-center">
                                        <p
                                            class="flex-grow-0 flex-shrink-0 text-[21.200000762939453px] font-medium text-center text-black">
                                            25
                                        </p>
                                        <p
                                            class="flex-grow-0 flex-shrink-0 text-[10.600000381469727px] font-light text-center text-black">
                                            WE
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="relative w-[49px] h-[72px]">
                                <div class="rounded-[33.92px] bg-[#fc7f09] w-[49px] h-[72px] flex justify-center absolute -left-[9.54px]"
                                    style="box-shadow: 0px 20px 50px 0 rgba(0,0,0,0.1);">
                                    <div class="flex flex-col justify-center items-center">
                                        <p
                                            class="flex-grow-0 flex-shrink-0 text-[21.200000762939453px] font-medium text-center text-black">
                                            26
                                        </p>
                                        <p
                                            class="flex-grow-0 flex-shrink-0 text-[10.600000381469727px] font-light text-center text-black">
                                            TH
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="relative w-[49px] h-[72px]">
                                <div class="rounded-[33.92px] bg-white w-[49px] h-[72px] flex justify-center absolute -left-[9.54px]"
                                    style="box-shadow: 0px 20px 50px 0 rgba(0,0,0,0.1);">
                                    <div class="flex flex-col justify-center items-center">
                                        <p
                                            class="flex-grow-0 flex-shrink-0 text-[21.200000762939453px] font-medium text-center text-black">
                                            27
                                        </p>
                                        <p
                                            class="flex-grow-0 flex-shrink-0 text-[10.600000381469727px] font-light text-center text-black">
                                            FR
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="relative w-[49px] h-[72px]">
                                <div class="rounded-[33.92px] bg-white w-[49px] h-[72px] flex justify-center absolute -left-[9.54px]"
                                    style="box-shadow: 0px 20px 50px 0 rgba(0,0,0,0.1);">
                                    <div class="flex flex-col justify-center items-center">
                                        <p
                                            class="flex-grow-0 flex-shrink-0 text-[21.200000762939453px] font-medium text-center text-black">
                                            28
                                        </p>
                                        <p
                                            class="flex-grow-0 flex-shrink-0 text-[10.600000381469727px] font-light text-center text-black">
                                            SA
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <svg width="8" height="12" viewBox="0 0 8 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="opacity-80" preserveAspectRatio="none">
                                <path opacity="0.8" d="M1.38812 11L6.64575 6L1.38812 1" stroke="black"
                                    stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex justify-between mt-[8px] mb-[17px]">
                        <p class="text-base font-medium text-left text-[#343a40]">
                            Pick your time
                        </p>
                        <div class="flex items-center w-[152.83px] h-[25px] rounded-lg bg-white justify-center">
                            <p class="w-[124.94px] text-base text-center text-[#343a40]">
                                18h30 - 19h00
                            </p>
                            <svg width="12" height="7" viewBox="0 0 12 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="opacity-80" preserveAspectRatio="none">
                                <path opacity="0.8" d="M0.920837 1L5.99309 6.13898L11.0653 1" stroke="black"
                                    stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <p class="text-base font-medium text-left text-[#343a40]">
                            How many people?
                        </p>
                        <div class="flex justify-between gap-[4px]">
                            <div class="rounded-lg bg-white border-[0.3px] border-[#c4c4c4]">
                                <p class="w-[23.45px] text-lg text-center text-black">
                                    -
                                </p>
                            </div>
                            <p class="text-lg text-center text-[#343a40]">
                                2
                            </p>
                            <div class="rounded-lg bg-white border-[0.3px] border-[#c4c4c4]">
                                <p class="w-[23.45px] text-lg text-center text-black">
                                    +
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="pt-[31px] pb-[16px]">
                        <p class="text-base font-medium text-left text-[#343a40]">
                            Notes/Allergies
                        </p>
                        <textarea class="w-full h-[69px] rounded-lg bg-white border-0" style="box-shadow: 0px 20px 50px 0 rgba(0,0,0,0.1);"></textarea>
                    </div>
                    <div class="mt-[26px]">
                        <p class="text-base font-semibold text-left text-[#343a40]">
                            Your information
                        </p>
                        <div class="flex flex-col gap-[9px]">
                            <input type="text"
                                class="text-sm text-left text-[#6b686b] w-full pl-[21px] rounded-lg bg-white border-0 h-10"
                                placeholder="Full name">
                            <input type="text"
                                class="text-sm text-left text-[#6b686b] w-full pl-[21px] rounded-lg bg-white border-0 h-10"
                                placeholder="Phone number">
                            <input type="text"
                                class="text-sm text-left text-[#6b686b] w-full pl-[21px] rounded-lg bg-white border-0 h-10"
                                placeholder="Email">
                            <div class="flex gap-[6px] mb-[48px]">
                                <input class="w-3.5 h-3.5 bg-white border border-[#343a40]" type="checkbox"
                                    id="termsOfService" name="termsOfService" value="termsOfService">
                                <label class="text-xs font-medium text-left text-[#343a40]" for="termsOfService">I
                                    agree with restaurant <span class="underline">terms of service</span></label><br>
                            </div>
                            <div class="flex justify-center items-center w-full h-10 rounded-[10px]"
                                style="background: linear-gradient(143.6deg, #52d1ed -56.3%, #0f92cf 26.17%, #005fa4 83.39%);">
                                <p class="text-xl font-semibold text-left text-white">
                                    Reserve a table
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="confirmReservationModal" class="modal">
                <div class="modal-content rounded-[10px] bg-white pt-[16px] px-[16px] pb-[34px] mx-[15px]">
                    <div class="flex justify-between items-center mb-[15px]">
                        <p class="text-xl font-semibold text-left text-[#6b686b]">
                            Your Reservation
                        </p>
                        <svg width="14" height="15" viewBox="0 0 14 15" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 close" preserveAspectRatio="none">
                            <path d="M13 1.93164L1 13.9316" stroke="#343A40" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path d="M1 1.93164L13 13.9316" stroke="#343A40" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </div>
                    <div class="flex flex-col gap-[10px] pb-[45px]">
                        <div
                            class="rounded-[10px] bg-[#fff5ec] pt-[21px] pl-[12px] pb-[17px] flex flex-col gap-[16px]">
                            <div class="flex gap-[16px]">
                                <svg width="22" height="25" viewBox="0 0 22 25" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.2705 24.8732C13.215 23.8455 21.335 19.0691 21.335 10.974C21.335 4.91322 16.6433 0 10.8558 0C5.06834 0 0.376663 4.91322 0.376663 10.974C0.376663 19.0691 8.49663 23.8455 10.4411 24.8732C10.7037 25.012 11.0079 25.012 11.2705 24.8732ZM10.856 15.6771C13.3363 15.6771 15.347 13.5715 15.347 10.974C15.347 8.37652 13.3363 6.27086 10.856 6.27086C8.37564 6.27086 6.36492 8.37652 6.36492 10.974C6.36492 13.5715 8.37564 15.6771 10.856 15.6771Z"
                                        fill="#FC7F09"></path>
                                </svg>
                                <div class="flex flex-col gap-[4px]">
                                    <p class="text-sm font-semibold text-left text-[#343a40]">Ann BBQ Su Van Hanh</p>
                                    <p class="text-xs font-medium text-left text-[#6b686b]">
                                        No. 716 Su Van Hanh, Ward 12, Dist 10, HCM
                                    </p>
                                </div>
                            </div>
                            <div class="flex gap-[16px]">
                                <svg width="21" height="22" viewBox="0 0 21 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-[20.05px] h-[21px]"
                                    preserveAspectRatio="none">
                                    <path
                                        d="M0.331558 7.21045C0.331558 5.32483 0.331558 4.38202 0.917345 3.79624C1.50313 3.21045 2.44594 3.21045 4.33156 3.21045H16.3846C18.2702 3.21045 19.213 3.21045 19.7988 3.79624C20.3846 4.38202 20.3846 5.32483 20.3846 7.21045V7.73677C20.3846 8.20817 20.3846 8.44387 20.2382 8.59032C20.0917 8.73677 19.856 8.73677 19.3846 8.73677H1.33156C0.860154 8.73677 0.624451 8.73677 0.478005 8.59032C0.331558 8.44387 0.331558 8.20817 0.331558 7.73677V7.21045Z"
                                        fill="#FC7F09"></path>
                                    <path
                                        d="M0.331558 18C0.331558 19.8856 0.331558 20.8284 0.917345 21.4142C1.50313 22 2.44594 22 4.33156 22H16.3846C18.2702 22 19.213 22 19.7988 21.4142C20.3846 20.8284 20.3846 19.8856 20.3846 18V11.9474C20.3846 11.476 20.3846 11.2403 20.2382 11.0938C20.0917 10.9474 19.856 10.9474 19.3846 10.9474H1.33156C0.860154 10.9474 0.624451 10.9474 0.478005 11.0938C0.331558 11.2403 0.331558 11.476 0.331558 11.9474V18Z"
                                        fill="#FC7F09"></path>
                                    <path d="M5.34482 1L5.34482 4.31579" stroke="#FC7F09" stroke-width="2"
                                        stroke-linecap="round"></path>
                                    <path d="M15.3714 1L15.3714 4.31579" stroke="#FC7F09" stroke-width="2"
                                        stroke-linecap="round"></path>
                                </svg>
                                <p class="text-sm font-semibold text-left text-[#343a40]">
                                    Wednesday, 25th Sep 2021
                                </p>
                            </div>
                            <div class="flex gap-[16px]">
                                <svg width="23" height="22" viewBox="0 0 23 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-[22.92px] h-[22px]"
                                    preserveAspectRatio="none">
                                    <rect width="22.9167" height="22" rx="5" fill="#FC7F09"></rect>
                                    <path
                                        d="M9.57704 17.9419C13.3457 17.9419 16.4008 14.7463 16.4008 10.8043C16.4008 6.86234 13.3457 3.66675 9.57704 3.66675C5.8084 3.66675 2.75331 6.86234 2.75331 10.8043C2.75331 14.7463 5.8084 17.9419 9.57704 17.9419Z"
                                        stroke="white" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path d="M9.57689 6.52173V10.8043L12.3064 12.2318" stroke="white"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <p class="text-sm font-semibold text-left text-[#343a40]">18h00 - 18h30
                                </p>
                            </div>
                            <div class="flex gap-[16px]">
                                <svg width="19" height="21" viewBox="0 0 19 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-[18.14px] h-[21px]"
                                    preserveAspectRatio="none">
                                    <path
                                        d="M17.5122 19.1492C18.0308 19.0308 18.3421 18.4919 18.1146 18.0109C17.4896 16.6892 16.4585 15.5278 15.1204 14.6532C13.4802 13.5811 11.4706 13 9.40318 13C7.33576 13 5.32611 13.5811 3.68592 14.6532C2.34788 15.5277 1.31672 16.6892 0.691704 18.0109C0.46429 18.4919 0.775508 19.0308 1.29415 19.1492C6.63154 20.3674 12.1748 20.3674 17.5122 19.1492Z"
                                        fill="#FC7F09"></path>
                                    <ellipse cx="9.40317" cy="5.5" rx="5.25199" ry="5.5"
                                        fill="#FC7F09"></ellipse>
                                </svg>
                                <p class="text-sm font-semibold text-left text-[#343a40]">2 People</p>
                            </div>
                        </div>
                        <div class="rounded-[10px] bg-[#fff5ec] flex gap-[19px] pt-[12px] pl-[13px] pb-[15px]">
                            <div class="w-[57.29px] h-[60px]">
                                <img src="{{ asset('images/Image.png') }}"
                                    class="w-full h-full rounded-[300px] object-cover border border-[#e4e4e4]/60" />
                            </div>
                            <div class="flex flex-col gap-[4px]">
                                <p class="text-sm font-medium text-left text-[#343a40]">
                                    Mary Nguyen
                                </p>
                                <p class="text-sm font-medium text-left text-[#343a40]">
                                    0987657992
                                </p>
                                <p class="text-sm font-medium text-left text-[#343a40]">
                                    mary.nguyen@gmail.com
                                </p>
                            </div>
                        </div>
                        <div class="flex rounded-[10px] bg-[#fff5ec] p-[10px] items-center gap-[14px]">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-[25px] h-[25px]"
                                preserveAspectRatio="xMidYMid meet">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M17.8903 11.2763L19.7917 9.37494C20.415 8.75164 20.7266 8.43999 20.8778 8.09578C21.1028 7.58329 21.1028 6.99993 20.8778 6.48743C20.7266 6.14322 20.415 5.83157 19.7917 5.20828C19.1684 4.58498 18.8567 4.27333 18.5125 4.12217C18 3.8971 17.4167 3.8971 16.9042 4.12217C16.5599 4.27333 16.2483 4.58498 15.625 5.20827L13.7001 7.13316C14.7057 8.85138 16.1492 10.2839 17.8903 11.2763ZM12.2457 8.5876L5.02305 15.8102C4.59799 16.2353 4.38546 16.4478 4.24572 16.7089C4.10599 16.97 4.04704 17.2647 3.92915 17.8542L3.27209 21.1395C3.20557 21.4721 3.17231 21.6384 3.26691 21.733C3.36152 21.8276 3.52781 21.7944 3.8604 21.7279L3.86042 21.7279L3.86044 21.7279L7.14575 21.0708C7.7352 20.9529 8.02993 20.894 8.29103 20.7542C8.55212 20.6145 8.76465 20.402 9.18971 19.9769L16.4321 12.7345C14.742 11.6777 13.3129 10.2584 12.2457 8.5876Z"
                                    fill="#FC7F09"></path>
                            </svg>
                            <p class="text-sm font-medium text-left text-[#343a40]">
                                Window Seats / Lactose Intollerant
                            </p>
                        </div>
                        <div class="rounded-[10px] bg-[#fff5ec] p-[10px] flex gap-[16px] items-center">
                            <div>
                                <svg width="25" height="18" viewBox="0 0 25 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M1.00754 0.585786C0.421753 1.17157 0.421753 2.11438 0.421753 4V13.5C0.421753 15.3856 0.421753 16.3284 1.00754 16.9142C1.59333 17.5 2.53613 17.5 4.42175 17.5H20.2944C22.18 17.5 23.1229 17.5 23.7086 16.9142C24.2944 16.3284 24.2944 15.3856 24.2944 13.5V4C24.2944 2.11438 24.2944 1.17157 23.7086 0.585786C23.1229 0 22.18 0 20.2944 0H4.42175C2.53613 0 1.59333 0 1.00754 0.585786ZM4.00266 2.75C3.45037 2.75 3.00266 3.19772 3.00266 3.75C3.00266 4.30229 3.45037 4.75 4.00266 4.75H6.38992C6.94221 4.75 7.38992 4.30229 7.38992 3.75C7.38992 3.19772 6.94221 2.75 6.38992 2.75H4.00266ZM17.3263 13.75C17.3263 13.1977 17.774 12.75 18.3263 12.75H20.7135C21.2658 12.75 21.7135 13.1977 21.7135 13.75C21.7135 14.3023 21.2658 14.75 20.7135 14.75H18.3263C17.774 14.75 17.3263 14.3023 17.3263 13.75ZM13.939 8.75C13.939 9.80447 13.1453 10.5 12.3581 10.5C11.571 10.5 10.7772 9.80447 10.7772 8.75C10.7772 7.69554 11.571 7 12.3581 7C13.1453 7 13.939 7.69554 13.939 8.75ZM15.939 8.75C15.939 10.8211 14.3358 12.5 12.3581 12.5C10.3804 12.5 8.77721 10.8211 8.77721 8.75C8.77721 6.67894 10.3804 5 12.3581 5C14.3358 5 15.939 6.67894 15.939 8.75Z"
                                        fill="#FC7F09"></path>
                                </svg>
                            </div>
                            <div class="flex flex-col gap-[9px]">
                                <p class="text-sm font-medium text-left text-[#343a40]">
                                    Your deposit is 100 $
                                </p>
                                <p class="text-xs text-left text-[#fc7f09]">
                                    Please pay within 30 minutes. If not, your reservation will be canceled
                                    automatically.
                                </p>
                            </div>

                        </div>
                    </div>
                    <button
                        class="w-[327px] h-11 rounded-[10px] bg-gradient-to-br from-[#ffcd01] to-[#fc7f09] text-xl font-semibold text-center text-white">Confirm</button>
                </div>
            </div>
            <div id="reservationConfrirmedModal" class="modal">
                <div class="modal-content rounded-[10px] bg-white p-[30px] mx-[26px]">
                    <div class="flex flex-col items-center gap-[12px] mb-[24px]">
                        <div>
                            <svg width="85" height="85" viewBox="0 0 85 85" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-[85px] h-[85px] relative"
                                preserveAspectRatio="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M42.5 74.3749C60.1039 74.3749 74.375 60.1038 74.375 42.4999C74.375 24.8961 60.1039 10.6249 42.5 10.6249C24.8962 10.6249 10.625 24.8961 10.625 42.4999C10.625 60.1038 24.8962 74.3749 42.5 74.3749ZM42.5 77.9166C62.0606 77.9166 77.9167 62.0605 77.9167 42.4999C77.9167 22.9393 62.0606 7.08325 42.5 7.08325C22.9394 7.08325 7.08334 22.9393 7.08334 42.4999C7.08334 62.0605 22.9394 77.9166 42.5 77.9166Z"
                                    fill="#005FA4"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M61.3948 28.7919C61.7432 29.1066 61.9523 29.5468 61.9762 30.0157C62.0001 30.4846 61.8368 30.9437 61.5223 31.2923L37.871 57.4316L23.5698 43.7802C23.2487 43.452 23.0676 43.0119 23.0647 42.5528C23.0618 42.0936 23.2374 41.6513 23.5544 41.3191C23.8714 40.987 24.3051 40.7909 24.7639 40.7723C25.2227 40.7538 25.6707 40.9141 26.0135 41.2196L37.6833 52.3581L58.8961 28.9176C59.0522 28.7451 59.2408 28.605 59.4511 28.5054C59.6613 28.4058 59.8892 28.3486 60.1216 28.3371C60.3539 28.3256 60.5863 28.36 60.8054 28.4383C61.0244 28.5167 61.2259 28.6374 61.3983 28.7936L61.3948 28.7919Z"
                                    fill="#005FA4"></path>
                            </svg>
                        </div>

                        <p class="text-lg font-semibold text-center text-[#005fa4]">
                            Reservation request <br /> successfully sent
                        </p>
                    </div>
                    <p class="text-xs text-left text-gray-600">
                        Note: Your request for table reservation was sent, you will get a confirmation e-mail with the
                        reservation details.
                    </p>

                </div>
            </div>
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Get the modal
        var modal = document.getElementById("myModal");
                var confirmReservationModal = document.getElementById("confirmReservationModal");
                var reservationConfrirmedModal = document.getElementById("reservationConfrirmedModal");

                // Get the button that opens the modal
                var btn = document.getElementById("myBtn");
                var confirmReservation = document.getElementById("confirmReservation");
                var reservationConfrirmed = document.getElementById("reservationConfrirmed");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];
                var span2 = document.getElementsByClassName("close")[1];
                var span3 = document.getElementsByClassName("close")[2];

                // When the user clicks the button, open the modal 
                btn.onclick = function() {
                    modal.style.display = "block";
                }
                confirmReservation.onclick = function() {
                    confirmReservationModal.style.display = "block";
                }
                reservationConfrirmed.onclick = function() {
                    reservationConfrirmedModal.style.display = "block";
                }
                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                    modal.style.display = "none";
                }
                span2.onclick = function() {
                    confirmReservationModal.style.display = "none";
                }
                span3.onclick = function() {
                    reservationConfrirmedModal.style.display = "none";
                }
                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
                window.onclick = function(event) {
                    if (event.target == confirmReservationModal) {
                        confirmReservationModal.style.display = "none";
                    }
                }
                window.onclick = function(event) {
                    if (event.target == reservationConfrirmedModal) {
                        reservationConfrirmedModal.style.display = "none";
                    }
                }
            </script>

    </div>
    </div>
</body>

</html>
