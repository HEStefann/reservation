<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="min-h-screen flex justify-center items-center">
    <div class="mx-[26px] align-center content-center flex flex-col gap-[48px]">
        <div class="flex items-center justify-center flex-col">
            <div>
                <p class="text-2xl font-medium text-center text-[#343a40]">Welcome 👋</p>
                <p class="text-base text-center text-[#313957]">
                    Register an account to book your table
                </p>
            </div>
        </div>
        <form class="flex flex-col" method="POST" action="<?php echo e(route('login', ['redirect' => url()->previous()])); ?>">
            <?php echo csrf_field(); ?>

            <p class=" text-base text-left text-[#343a40] mb-[8px]">Email</p>
            <input name="email" class="w-full rounded-lg bg-[#f3f7fb] border border-[#d4d7e3] mb-[18px]" type="text"
                name="" id="">
            <div class="w-full justify-center" x-data="{ show: false }">
                <p class=" text-base text-left text-[#343a40] mb-[8px]">Password</p>
                <div class="relative">
                    <input name="password" placeholder="Enter your password" :type="show ? 'text' : 'password'"
                        class="w-full rounded-lg bg-[#f3f7fb] border border-[#d4d7e3] text-[#8897ad]" />
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center leading-5">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="flex-grow-0 flex-shrink-0 w-6 h-6 relative"
                            preserveAspectRatio="xMidYMid meet" @click="show = !show"
                            :class="{ 'hidden': !show, 'block': show }">
                            <path
                                d="M12 6.5C15.79 6.5 19.17 8.63 20.82 12C19.17 15.37 15.8 17.5 12 17.5C8.2 17.5 4.83 15.37 3.18 12C4.83 8.63 8.21 6.5 12 6.5ZM12 4.5C7 4.5 2.73 7.61 1 12C2.73 16.39 7 19.5 12 19.5C17 19.5 21.27 16.39 23 12C21.27 7.61 17 4.5 12 4.5ZM12 9.5C13.38 9.5 14.5 10.62 14.5 12C14.5 13.38 13.38 14.5 12 14.5C10.62 14.5 9.5 13.38 9.5 12C9.5 10.62 10.62 9.5 12 9.5ZM12 7.5C9.52 7.5 7.5 9.52 7.5 12C7.5 14.48 9.52 16.5 12 16.5C14.48 16.5 16.5 14.48 16.5 12C16.5 9.52 14.48 7.5 12 7.5Z"
                                fill="black" fill-opacity="0.54"></path>
                        </svg>

                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="flex-grow-0 flex-shrink-0 w-6 h-6 relative"
                            preserveAspectRatio="none" @click="show = !show"
                            :class="{ 'block': !show, 'hidden': show }">
                            <path
                                d="M5.974 17.7855L8.91704 14.8425C8.17611 14.0626 7.76915 13.0241 7.78292 11.9485C7.79669 10.8729 8.23011 9.84516 8.99077 9.0845C9.75142 8.32385 10.7791 7.89043 11.8548 7.87666C12.9304 7.86288 13.9689 8.26985 14.7488 9.01078L17.7422 6.01688C16.0967 4.91297 14.1827 4.36047 12 4.35938C7.49533 4.35938 4.13439 6.70547 1.9172 11.3977C1.82808 11.5864 1.78186 11.7925 1.78186 12.0012C1.78186 12.2099 1.82808 12.416 1.9172 12.6047C2.99954 14.8845 4.35181 16.6115 5.974 17.7855ZM22.0828 11.3953C21.2588 9.65953 20.2783 8.24391 19.1414 7.14844L15.7613 10.5298C16.0444 11.2736 16.1064 12.0835 15.9398 12.8617C15.7732 13.64 15.3852 14.3535 14.8224 14.9163C14.2596 15.4791 13.546 15.8671 12.7678 16.0337C11.9895 16.2002 11.1796 16.1382 10.4358 15.855L7.57033 18.7207C8.89845 19.334 10.375 19.6406 12 19.6406C16.5047 19.6406 19.8656 17.2945 22.0828 12.6023C22.172 12.4136 22.2182 12.2075 22.2182 11.9988C22.2182 11.7901 22.172 11.584 22.0828 11.3953Z"
                                fill="black" fill-opacity="0.15"></path>
                            <path
                                d="M22.0828 11.3953C21.2589 9.65953 20.2785 8.24391 19.1414 7.14844L17.9489 8.34094C18.9213 9.27024 19.7684 10.4859 20.5008 12C18.5508 16.0359 15.7828 17.9531 12 17.9531C10.8645 17.9531 9.81869 17.7783 8.86244 17.4286L7.57033 18.7207C8.89845 19.334 10.375 19.6406 12 19.6406C16.5047 19.6406 19.8656 17.2945 22.0828 12.6023C22.172 12.4136 22.2182 12.2075 22.2182 11.9988C22.2182 11.7901 22.172 11.584 22.0828 11.3953ZM20.5929 3.88032L19.5938 2.88C19.5764 2.86257 19.5557 2.84874 19.5329 2.8393C19.5101 2.82987 19.4858 2.82501 19.4611 2.82501C19.4365 2.82501 19.4121 2.82987 19.3893 2.8393C19.3665 2.84874 19.3459 2.86257 19.3285 2.88L16.7651 5.44219C15.3518 4.72032 13.7635 4.35938 12 4.35938C7.49533 4.35938 4.13439 6.70547 1.9172 11.3977C1.82808 11.5864 1.78186 11.7925 1.78186 12.0012C1.78186 12.2099 1.82808 12.416 1.9172 12.6047C2.80298 14.4703 3.86939 15.9657 5.11642 17.0909L2.63626 19.5703C2.60113 19.6055 2.58139 19.6531 2.58139 19.7029C2.58139 19.7526 2.60113 19.8002 2.63626 19.8354L3.63681 20.8359C3.67197 20.8711 3.71964 20.8908 3.76935 20.8908C3.81906 20.8908 3.86673 20.8711 3.90189 20.8359L20.5929 4.14563C20.6103 4.12821 20.6242 4.10754 20.6336 4.08477C20.643 4.06201 20.6479 4.03761 20.6479 4.01297C20.6479 3.98833 20.643 3.96393 20.6336 3.94117C20.6242 3.91841 20.6103 3.89773 20.5929 3.88032ZM3.49923 12C5.45158 7.96407 8.21954 6.04688 12 6.04688C13.2783 6.04688 14.4406 6.26625 15.495 6.71227L13.8474 8.35992C13.067 7.94359 12.1736 7.78907 11.2988 7.91917C10.424 8.04927 9.61413 8.4571 8.98874 9.08248C8.36336 9.70787 7.95553 10.5177 7.82543 11.3925C7.69533 12.2673 7.84985 13.1608 8.26619 13.9411L6.31103 15.8963C5.22892 14.9412 4.29611 13.6472 3.49923 12ZM9.28126 12C9.28167 11.5867 9.37957 11.1794 9.56699 10.811C9.75442 10.4427 10.0261 10.1237 10.3599 9.8801C10.6938 9.63648 11.0804 9.47504 11.4883 9.4089C11.8963 9.34276 12.3141 9.37379 12.7078 9.49946L9.40572 12.8016C9.32295 12.5424 9.28097 12.272 9.28126 12Z"
                                fill="#343A40" fill-opacity="0.75"></path>
                            <path
                                d="M11.9062 14.625C11.8251 14.625 11.7452 14.6212 11.666 14.614L10.428 15.8519C11.1726 16.1371 11.9839 16.2005 12.7637 16.0344C13.5435 15.8683 14.2586 15.4799 14.8224 14.9161C15.3862 14.3523 15.7746 13.6373 15.9406 12.8575C16.1067 12.0776 16.0433 11.2664 15.7582 10.5218L14.5202 11.7598C14.5275 11.839 14.5312 11.9189 14.5312 12C14.5314 12.3448 14.4637 12.6862 14.3318 13.0048C14.2 13.3233 14.0066 13.6128 13.7628 13.8566C13.519 14.1004 13.2296 14.2937 12.911 14.4256C12.5924 14.5574 12.251 14.6252 11.9062 14.625Z"
                                fill="#343A40" fill-opacity="0.75"></path>
                        </svg>
                    </div>
                </div>
            </div>

            
           



            <button type="submit"
                class="mt-[48px] mx-[18px] rounded-xl bg-[#00487c] text-white text-2xl h-[57px]">Login</button>
        </form>

        <div>
            <p class="text-base text-center">
                <span class="text-base text-center text-[#313957]">Don’t you have an account?
                </span>
                <a href="<?php echo e(route('register')); ?>">
                    <span class="flex-grow-0 flex-shrink-0 text-base text-center text-[#005fa4]">Register</span>
                </a>
            </p>
        </div>

    </div>
</body>

</html>
<?php /**PATH /home/cakizy/Documents/github/reservation/resources/views/login.blade.php ENDPATH**/ ?>