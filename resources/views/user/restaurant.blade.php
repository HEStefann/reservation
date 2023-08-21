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
            background-color: #fefefe;
            margin: auto;
            padding: 0;
            border: 1px solid #888;
            width: 80%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
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
    <button id="myBtn" hidden>Open Modal</button>

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header flex justify-between items-center">
                <h2>Modal Header</h2>
                <span class="close">&times;</span>
            </div>

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

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        let currentIndex = -1;
        const links = document.querySelectorAll('.text-black');

        function changeStyle(link) {
            if (currentIndex !== -1) {
                links[currentIndex].style.textDecoration = 'none'; // Remove underline from the previous link
            }

            link.style.textDecoration = 'underline';
            currentIndex = Array.from(links).indexOf(link);
        }
    </script>

    </div>
    </div>
</body>

</html>
