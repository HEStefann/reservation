@extends('layouts.restaurant')

@section('title', 'Register')

@section('content')
    <x-auth-box action="{{ route('register') }}">
        <div class="flex flex-col justify-start items-center w-[388px] gap-[34px]">
            <div class="flex flex-col justify-start items-center flex-grow-0 flex-shrink-0 relative gap-2.5">
                <p class="flex-grow-0 flex-shrink-0 text-[32px] font-medium text-center text-[#343a40]">
                    Welcome Back 👋
                </p>
                <p class="flex-grow-0 flex-shrink-0 text-xl text-left text-[#313957]">
                    <span class="flex-grow-0 flex-shrink-0 text-xl text-left text-[#313957]"> </span><br /><span
                        class="flex-grow-0 flex-shrink-0 text-xl text-left text-[#313957]">Log in to start managing your
                        clients.</span>
                </p>
            </div>
            <div class="flex flex-col justify-center items-end self-stretch flex-grow-0 flex-shrink-0 gap-6">
                <div class="flex flex-col justify-start items-start self-stretch flex-grow-0 flex-shrink-0 relative gap-2">
                    <p class="flex-grow-0 flex-shrink-0 text-base text-left text-[#343a40]">Email</p>
                    <div class="self-stretch flex-grow-0 flex-shrink-0 h-12">
                        <div
                            class="w-[388px] h-12 absolute left-[-0.5px] top-[27.5px] rounded-xl bg-[#f7fbff] border border-[#d4d7e3]">
                        </div>
                        <p class="absolute left-4 top-11 text-base text-left text-[#8897ad]">Enter your email</p>
                    </div>
                </div>
                <div class="flex flex-col justify-start items-start flex-grow-0 flex-shrink-0 w-[388px] relative gap-2">
                    <p class="flex-grow-0 flex-shrink-0 text-base text-left text-[#343a40]">Password</p>
                    <div
                        class="flex justify-between items-center self-stretch flex-grow-0 flex-shrink-0 relative px-4 py-3 rounded-xl bg-[#f7fbff] border border-[#d4d7e3]">
                        <p class="flex-grow-0 flex-shrink-0 text-base text-left text-[#8897ad]">
                            Enter your password
                        </p>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="flex-grow-0 flex-shrink-0 w-6 h-6 relative"
                            preserveAspectRatio="none">
                            <path
                                d="M5.974 17.7855L8.91704 14.8425C8.17611 14.0626 7.76915 13.0241 7.78292 11.9485C7.79669 10.8729 8.23011 9.84516 8.99077 9.0845C9.75142 8.32385 10.7791 7.89043 11.8548 7.87666C12.9304 7.86288 13.9689 8.26985 14.7488 9.01078L17.7422 6.01688C16.0967 4.91297 14.1827 4.36047 12 4.35938C7.49533 4.35938 4.13439 6.70547 1.9172 11.3977C1.82808 11.5864 1.78186 11.7925 1.78186 12.0012C1.78186 12.2099 1.82808 12.416 1.9172 12.6047C2.99954 14.8845 4.35181 16.6115 5.974 17.7855ZM22.0828 11.3953C21.2588 9.65953 20.2783 8.24391 19.1414 7.14844L15.7613 10.5298C16.0444 11.2736 16.1064 12.0835 15.9398 12.8617C15.7732 13.64 15.3852 14.3535 14.8224 14.9163C14.2596 15.4791 13.546 15.8671 12.7678 16.0337C11.9895 16.2002 11.1796 16.1382 10.4358 15.855L7.57033 18.7207C8.89845 19.334 10.375 19.6406 12 19.6406C16.5047 19.6406 19.8656 17.2945 22.0828 12.6023C22.172 12.4136 22.2182 12.2075 22.2182 11.9988C22.2182 11.7901 22.172 11.584 22.0828 11.3953Z"
                                fill="black" fill-opacity="0.15"></path>
                            <path
                                d="M22.0828 11.3953C21.2589 9.65947 20.2785 8.24385 19.1414 7.14838L17.9489 8.34088C18.9213 9.27018 19.7684 10.4859 20.5008 11.9999C18.5508 16.0359 15.7828 17.9531 12 17.9531C10.8645 17.9531 9.81869 17.7782 8.86244 17.4285L7.57033 18.7206C8.89845 19.3339 10.375 19.6406 12 19.6406C16.5047 19.6406 19.8656 17.2945 22.0828 12.6023C22.172 12.4136 22.2182 12.2075 22.2182 11.9988C22.2182 11.7901 22.172 11.584 22.0828 11.3953ZM20.5929 3.88025L19.5938 2.87994C19.5764 2.86251 19.5557 2.84868 19.5329 2.83924C19.5101 2.82981 19.4858 2.82495 19.4611 2.82495C19.4365 2.82495 19.4121 2.82981 19.3893 2.83924C19.3665 2.84868 19.3459 2.86251 19.3285 2.87994L16.7651 5.44213C15.3518 4.72025 13.7635 4.35932 12 4.35932C7.49533 4.35932 4.13439 6.70541 1.9172 11.3976C1.82808 11.5863 1.78186 11.7924 1.78186 12.0011C1.78186 12.2098 1.82808 12.4159 1.9172 12.6046C2.80298 14.4703 3.86939 15.9656 5.11642 17.0908L2.63626 19.5703C2.60113 19.6054 2.58139 19.6531 2.58139 19.7028C2.58139 19.7525 2.60113 19.8002 2.63626 19.8353L3.63681 20.8359C3.67197 20.871 3.71964 20.8908 3.76935 20.8908C3.81906 20.8908 3.86673 20.871 3.90189 20.8359L20.5929 4.14557C20.6103 4.12815 20.6242 4.10747 20.6336 4.08471C20.643 4.06195 20.6479 4.03755 20.6479 4.01291C20.6479 3.98827 20.643 3.96387 20.6336 3.94111C20.6242 3.91835 20.6103 3.89767 20.5929 3.88025ZM3.49923 11.9999C5.45158 7.964 8.21954 6.04682 12 6.04682C13.2783 6.04682 14.4406 6.26619 15.495 6.71221L13.8474 8.35986C13.067 7.94353 12.1736 7.78901 11.2988 7.91911C10.424 8.04921 9.61413 8.45704 8.98874 9.08242C8.36336 9.70781 7.95553 10.5176 7.82543 11.3925C7.69533 12.2673 7.84985 13.1607 8.26619 13.941L6.31103 15.8962C5.22892 14.9411 4.29611 13.6471 3.49923 11.9999ZM9.28126 11.9999C9.28167 11.5867 9.37957 11.1793 9.56699 10.8109C9.75442 10.4426 10.0261 10.1237 10.3599 9.88004C10.6938 9.63642 11.0804 9.47498 11.4883 9.40884C11.8963 9.3427 12.3141 9.37372 12.7078 9.4994L9.40572 12.8015C9.32295 12.5424 9.28097 12.272 9.28126 11.9999Z"
                                fill="#343A40" fill-opacity="0.75"></path>
                            <path
                                d="M11.9063 14.6249C11.8252 14.6249 11.7453 14.6212 11.6661 14.6139L10.4281 15.8519C11.1727 16.137 11.9839 16.2004 12.7638 16.0343C13.5436 15.8683 14.2586 15.4798 14.8224 14.916C15.3862 14.3523 15.7746 13.6372 15.9407 12.8574C16.1068 12.0776 16.0434 11.2663 15.7583 10.5217L14.5203 11.7597C14.5276 11.8389 14.5313 11.9188 14.5313 11.9999C14.5315 12.3447 14.4637 12.6861 14.3319 13.0047C14.2 13.3233 14.0067 13.6127 13.7629 13.8565C13.5191 14.1003 13.2296 14.2936 12.9111 14.4255C12.5925 14.5573 12.2511 14.6251 11.9063 14.6249Z"
                                fill="#343A40" fill-opacity="0.75"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex justify-end items-center flex-grow-0 flex-shrink-0 gap-2">
                    <div class="flex justify-between items-center flex-grow-0 flex-shrink-0 w-[388px] relative">
                        <div class="flex-grow-0 flex-shrink-0 w-[155px] h-6 relative">
                            <p class="absolute left-[27px] top-[3px] text-[15px] font-light text-right text-[#6b686b]">
                                Remember me
                            </p>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 absolute left-0 top-0"
                                preserveAspectRatio="none">
                                <path
                                    d="M6 15.5C5.33696 15.5 4.70107 15.2366 4.23223 14.7678C3.76339 14.2989 3.5 13.663 3.5 13C3.5 12.337 3.76339 11.7011 4.23223 11.2322C4.70107 10.7634 5.33696 10.5 6 10.5C6.66304 10.5 7.29893 10.7634 7.76777 11.2322C8.23661 11.7011 8.5 12.337 8.5 13C8.5 13.663 8.23661 14.2989 7.76777 14.7678C7.29893 15.2366 6.66304 15.5 6 15.5ZM21.8891 9.11091C22.9205 10.1424 23.5 11.5413 23.5 13C23.5 14.4587 22.9205 15.8576 21.8891 16.8891C20.8576 17.9205 19.4587 18.5 18 18.5H6C4.54131 18.5 3.14236 17.9205 2.11091 16.8891C1.07946 15.8576 0.5 14.4587 0.5 13C0.5 11.5413 1.07946 10.1424 2.11091 9.11091C3.14236 8.07946 4.54131 7.5 6 7.5H18C19.4587 7.5 20.8576 8.07946 21.8891 9.11091ZM21.5355 9.46447C20.5979 8.52678 19.3261 8 18 8H6C4.67392 8 3.40215 8.52678 2.46447 9.46447C1.52678 10.4021 1 11.6739 1 13C1 14.3261 1.52678 15.5979 2.46447 16.5355C3.40215 17.4732 4.67392 18 6 18H18C19.3261 18 20.5979 17.4732 21.5355 16.5355C22.4732 15.5979 23 14.3261 23 13C23 11.6739 22.4732 10.4021 21.5355 9.46447Z"
                                    fill="white" stroke="#6B686B"></path>
                            </svg>
                        </div>
                        <p class="flex-grow-0 flex-shrink-0 text-[15px] font-light text-center text-[#005fa4]">
                            Forgot Password?
                        </p>
                    </div>
                </div>
                <div
                    class="flex justify-between items-center self-stretch flex-grow-0 flex-shrink-0 relative py-4 rounded-xl bg-[#00487c]">
                    <p class="flex-grow-0 flex-shrink-0 text-2xl text-center text-white">Log in</p>
                </div>
            </div>
            <div class="flex flex-col justify-start items-start flex-grow-0 flex-shrink-0 gap-6">
                <div class="flex justify-center items-center flex-grow-0 flex-shrink-0 w-[388px] relative gap-4 py-2.5">
                    <svg width="168" height="1" viewBox="0 0 168 1" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="flex-grow" preserveAspectRatio="xMidYMid meet">
                        <line y1="0.5" x2="167.5" y2="0.5" stroke="#CFDFE2"></line>
                    </svg>
                    <p class="flex-grow-0 flex-shrink-0 text-base text-center text-[#294957]">Or</p>
                    <svg width="168" height="1" viewBox="0 0 168 1" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="flex-grow" preserveAspectRatio="xMidYMid meet">
                        <line x1="0.5" y1="0.5" x2="168" y2="0.5" stroke="#CFDFE2"></line>
                    </svg>
                </div>
                <div class="flex flex-col justify-start items-start flex-grow-0 flex-shrink-0 w-[388px] gap-4">
                    <div
                        class="flex justify-center items-center self-stretch flex-grow-0 flex-shrink-0 relative gap-4 px-[9px] py-3 rounded-xl bg-[#f3f9fa]">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="flex-grow-0 flex-shrink-0 w-7 h-7 relative"
                            preserveAspectRatio="xMidYMid meet">
                            <g clip-path="url(#clip0_349_67)">
                                <path
                                    d="M27.727 14.3225C27.727 13.3709 27.6499 12.414 27.4853 11.4778H14.28V16.8689H21.842C21.5283 18.6077 20.52 20.1458 19.0436 21.1232V24.6213H23.5551C26.2044 22.1829 27.727 18.582 27.727 14.3225Z"
                                    fill="#4285F4"></path>
                                <path
                                    d="M14.28 28.0009C18.0559 28.0009 21.2402 26.7611 23.5602 24.6211L19.0487 21.1231C17.7935 21.977 16.1731 22.4606 14.2852 22.4606C10.6328 22.4606 7.53596 19.9965 6.42481 16.6836H1.76929V20.2897C4.14592 25.0172 8.98663 28.0009 14.28 28.0009Z"
                                    fill="#34A853"></path>
                                <path
                                    d="M6.41966 16.6837C5.83322 14.9449 5.83322 13.0621 6.41966 11.3234V7.71729H1.76928C-0.216388 11.6732 -0.216388 16.3339 1.76928 20.2898L6.41966 16.6837Z"
                                    fill="#FBBC04"></path>
                                <path
                                    d="M14.28 5.54127C16.276 5.51041 18.2051 6.26146 19.6506 7.64012L23.6477 3.64305C21.1167 1.26642 17.7575 -0.0402103 14.28 0.000943444C8.98663 0.000943444 4.14592 2.98459 1.76929 7.71728L6.41966 11.3234C7.52567 8.00536 10.6276 5.54127 14.28 5.54127Z"
                                    fill="#EA4335"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0_349_67">
                                    <rect width="28" height="28" fill="white"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                        <p class="flex-grow-0 flex-shrink-0 text-base text-left text-[#313957]">
                            Log in with Google
                        </p>
                    </div>
                    <div
                        class="flex justify-center items-center self-stretch flex-grow-0 flex-shrink-0 relative gap-4 px-[9px] py-3 rounded-xl bg-[#f3f9fa]">
                        <svg width="29" height="28" viewBox="0 0 29 28" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="flex-grow-0 flex-shrink-0 w-7 h-7 relative"
                            preserveAspectRatio="xMidYMid meet">
                            <g clip-path="url(#clip0_349_26)">
                                <path
                                    d="M28.5 14C28.5 6.26801 22.232 0 14.5 0C6.76801 0 0.5 6.26801 0.5 14C0.5 20.9877 5.61957 26.7796 12.3125 27.8299V18.0469H8.75781V14H12.3125V10.9156C12.3125 7.40687 14.4027 5.46875 17.6005 5.46875C19.1318 5.46875 20.7344 5.74219 20.7344 5.74219V9.1875H18.9691C17.23 9.1875 16.6875 10.2668 16.6875 11.375V14H20.5703L19.9496 18.0469H16.6875V27.8299C23.3804 26.7796 28.5 20.9877 28.5 14Z"
                                    fill="#1877F2"></path>
                                <path
                                    d="M19.9496 18.0469L20.5703 14H16.6875V11.375C16.6875 10.2679 17.23 9.1875 18.9691 9.1875H20.7344V5.74219C20.7344 5.74219 19.1323 5.46875 17.6005 5.46875C14.4027 5.46875 12.3125 7.40688 12.3125 10.9156V14H8.75781V18.0469H12.3125V27.8299C13.762 28.0567 15.238 28.0567 16.6875 27.8299V18.0469H19.9496Z"
                                    fill="white"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0_349_26">
                                    <rect width="28" height="28" fill="white" transform="translate(0.5)">
                                    </rect>
                                </clipPath>
                            </defs>
                        </svg>
                        <p class="flex-grow-0 flex-shrink-0 text-base text-left text-[#313957]">
                            Log in with Facebook
                        </p>
                    </div>
                </div>
            </div>
            <p class="flex-grow-0 flex-shrink-0 w-[294px] text-base text-center">
                <span class="flex-grow-0 flex-shrink-0 w-[294px] text-base text-center text-[#313957]">Don't you have
                    an account? </span><span
                    class="flex-grow-0 flex-shrink-0 w-[294px] text-base text-center text-[#005fa4]">Register</span>
            </p>
        </div>
    </x-auth-box>
@endsection
