<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>


<body class="h-full w-full bg-white">
    <x-navbar />

    <div class="m-[26px] mt-[48.4px]">
        <div class="flex items-center space-x-4">
            <div class="w-[114px] h-[100px]">
                <img style="width: 100px; height: 100px; border-radius: 50%;"
                    src="https://mdbcdn.b-cdn.net/img/new/avatars/9.webp" alt="">
            </div>
            <div class="font-medium flex-grow">
                <div class="text-[28px] text-[#343a40] flex items-center justify-between">
                    <p class="flex">{{ $user->name }}</p>
                </div>
                <p class="text-[15px] font-extralight text-[#343a40]">
                    {{ $user->email }}
                </p>
            </div>
        </div>
    </div>

    <div class="mx-[26px] mt-[48.4px]">
        <h1 class="text-lg font-medium text-left text-[#343a40]">My account</h1>
        <form method="POST" action="{{ route('user.update') }}">
            @csrf
            @method('PUT')

            <div class="mt-[28px]">
                <p class=" text-base text-left text-[#343a40] mb-[8px]">Name</p>
                <input value="{{ $user->name }}"
                    class="w-full rounded-lg bg-[#f3f7fb] border border-[#d4d7e3] mb-[18px]" type="text"
                    name="name" id="">
                <p class=" text-base text-left text-[#343a40] mb-[8px]">Email</p>
                <input value="{{ $user->email }}"
                    class="w-full rounded-lg bg-[#f3f7fb] border border-[#d4d7e3] mb-[18px]" type="text"
                    name="email" id="">
                <p class=" text-base text-left text-[#343a40] mb-[8px]">Phone number</p>
                <input value="{{ $user->phone ?? '' }}"
                    class="w-full rounded-lg bg-[#f3f7fb] border border-[#d4d7e3] mb-[18px]" type="text"
                    name="phone" id="">
            </div>
            <button type="submit"
                class="mt-[10px] rounded-xl bg-[#00487c] py-3.5 text-center text-white w-full h-full">Save
                changes</button>
        </form>
    </div>

    <x-footer />

</body>

</html>
