<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    <body>
        <div class="bg-gray-200" style="position: sticky; top: 0;">
            <x-navbar>
            </x-navbar>
            <div class="m-[25px] flex flex-col gap-[10px]">
                <div class="flex items-center relative">
                    {{-- Search Location --}}
                    <svg viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="w-[23.31px] h-6 absolute ml-[14px]" preserveAspectRatio="none">
                        <path
                            d="M12.5798 1.17578C7.7261 1.17578 3.79138 4.88867 3.79138 9.46875C3.79138 11.0004 4.1091 12.5824 5.02084 13.7227L12.5798 23.1758L20.1387 13.7227C20.9668 12.687 21.3682 10.8561 21.3682 9.46875C21.3682 4.88867 17.4335 1.17578 12.5798 1.17578ZM12.5798 5.97888C14.622 5.97888 16.2781 7.54163 16.2781 9.46874C16.2781 11.3959 14.622 12.9586 12.5798 12.9586C10.5375 12.9586 8.88144 11.3959 8.88144 9.46875C8.88144 7.54163 10.5375 5.97888 12.5798 5.97888Z"
                            fill="#343A40"></path>
                        <rect x="1.42273" y="0.675781" width="22.3143" height="23" rx="9.5"
                            stroke="white"></rect>
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
            </div>
        </div>
        <div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus beatae libero neque quam nesciunt,
                accusamus quas odit rerum nostrum voluptatibus earum architecto qui omnis et veniam alias delectus?
                Temporibus dolor repellat, rem laboriosam tempora quam dolores reiciendis nisi quae cum nesciunt autem
                debitis sequi sit sapiente deleniti! Quis nam esse ratione iure, maxime quidem possimus porro, maiores
                nemo culpa nisi laudantium, fugiat delectus eveniet excepturi dolorem quae error? Doloribus accusamus,
                porro nemo eius earum natus facilis, vero hic omnis veniam soluta assumenda eum aliquid! Asperiores
                facilis quia culpa fuga debitis eligendi sequi totam aliquid, dolor, modi, ab quibusdam molestiae magni!
                Natus illum soluta itaque, fugit assumenda nam. Architecto, placeat voluptate? Nihil maxime distinctio
                minima placeat voluptas provident harum dicta dolore deleniti, enim optio veniam nam molestiae odit
                mollitia fugiat commodi ex quidem accusamus sequi totam quam! Reprehenderit, doloremque. Maxime, autem
                dignissimos nobis id repellat optio tenetur sunt facere assumenda. Fuga esse fugit autem minima
                architecto unde vero! Magnam quis at quam dolor quae provident veritatis, nobis, architecto ratione
                laborum suscipit deleniti quibusdam, necessitatibus quaerat minima vitae eum rem repellendus. Enim
                perspiciatis provident, harum, consequatur dicta quos, id quas aliquam voluptates odit incidunt neque
                expedita suscipit nihil! Corporis, aut libero possimus nam laudantium voluptate fugit sunt magnam?
                Aspernatur tempora doloribus ad? Inventore molestiae minima soluta modi architecto tempora commodi totam
                amet ex maxime fuga, temporibus magni quia delectus doloremque ipsam dolore numquam hic facilis aut eos,
                laudantium reprehenderit possimus! Repudiandae nisi veritatis voluptates. Ad, quia nulla facilis
                eligendi aspernatur quam consequuntur! Similique, totam? Nemo voluptatum, error voluptates quibusdam,
                architecto eligendi commodi maiores mollitia ratione eius temporibus porro eum laudantium vitae veniam
                cupiditate repellendus. Quas incidunt iure tempore nostrum, ex laudantium id fuga reiciendis amet vero,
                animi dignissimos dicta quis error autem at illo vitae commodi ullam iusto explicabo! Amet eius, vel a
                beatae sunt nihil dolore ea asperiores, eveniet nesciunt, deleniti excepturi necessitatibus quae hic
                voluptate nulla. Architecto doloribus harum maxime quas iste modi. Laudantium consequatur fuga officiis
                expedita est aperiam illo unde velit beatae quia odio facilis quam voluptate quisquam quas, impedit
                necessitatibus asperiores, reiciendis quod. Similique velit totam id reiciendis natus fugiat sed eum ad
                cumque distinctio quam obcaecati vitae, ex quasi expedita aperiam incidunt voluptate veritatis alias
                rerum neque illo dicta quo earum. Quo eveniet inventore incidunt quia soluta ex blanditiis ducimus
                possimus nobis modi iure delectus ad eligendi fugiat, sit officia ipsum fuga a iusto sequi velit.
                Voluptas illum provident est nisi recusandae aliquam officiis quod sequi amet laboriosam a, eum, dolore
                adipisci quae tempore ad dicta maxime quos! Deleniti nesciunt rem fugit, labore suscipit perspiciatis
                distinctio totam quasi ab asperiores debitis esse doloremque porro eaque mollitia, sequi quam. Mollitia
                vel debitis, sunt sequi alias vero odit dolorum architecto sapiente unde molestias hic voluptates
                numquam laudantium quibusdam, error amet impedit porro maiores! Nisi, molestias animi ab at nobis
                architecto officiis ducimus minus modi nemo tempora nihil eius repellendus temporibus soluta tempore
                assumenda inventore? Cum unde et sed est voluptatum optio neque qui, in quasi fugit tenetur consequuntur
                quaerat perspiciatis! Atque, commodi voluptates sed officia architecto odit eius voluptatibus porro quia
                earum autem, assumenda iure error aut id. A, est. Quas sit tempore temporibus molestias eos voluptas,
                earum distinctio expedita error, mollitia, reiciendis officia harum eius quaerat quidem rerum sequi
                fugiat. Praesentium, consequuntur doloremque? Saepe illum consequatur fugit, necessitatibus eveniet
                amet. Saepe ducimus aperiam repellat iure quasi, cum facere voluptas sunt nulla, quis molestiae!
                Molestias nemo, amet voluptatem optio odit veritatis sunt voluptatum officia? Dignissimos sit fuga sunt
                libero explicabo temporibus aut qui minus, quibusdam ratione aliquid eligendi nemo. Reiciendis cumque ut
                maxime rerum repudiandae repellendus omnis ipsa labore, temporibus saepe! Inventore, fuga! Blanditiis
                iusto ipsum, natus facere dolore aliquid eaque ab rem magni adipisci ea assumenda dignissimos beatae
                modi earum, suscipit harum. Asperiores eligendi maiores tempora numquam et sunt quasi enim! Alias
                delectus voluptatem repudiandae, quisquam vel, voluptas commodi tenetur nihil unde, laboriosam nostrum
                quia animi cum illum dolorem doloremque iste laudantium quam placeat dolor officia nulla praesentium
                autem neque. Alias, iste facere illum deserunt sit officia velit vitae, repudiandae dolorem non animi
                saepe incidunt reiciendis natus fugit expedita in eaque accusantium totam tempore enim. Libero expedita
                corporis nihil ducimus molestias, error rem repellat similique voluptates nobis temporibus nemo, enim
                neque numquam, vitae adipisci itaque molestiae doloremque? Recusandae vel fuga, enim fugiat quas ullam.
                Eveniet dolore consequuntur illo vero? Dignissimos quis ex quae beatae natus rem, possimus porro, minus
                cupiditate molestias soluta, debitis vitae neque praesentium suscipit? Natus in autem quasi, dolor
                distinctio facere commodi, nihil rem reiciendis dolorem quibusdam nisi veritatis totam nam, magnam
                consequatur qui tempore nulla adipisci inventore tempora laboriosam. Ab, omnis officia doloremque vitae
                molestias minus, ut temporibus ad voluptates deleniti fugiat hic obcaecati cum fugit quasi porro ullam
                culpa nemo delectus reprehenderit. Iusto optio nobis accusamus esse, architecto eum dicta ipsam in
                fugiat explicabo nostrum expedita magnam sit id cumque possimus ullam adipisci! A architecto est dolorum
                dignissimos placeat dolore reprehenderit quia expedita accusantium pariatur saepe fuga dicta quaerat
                facilis, quos corporis ab repellendus excepturi atque, illum obcaecati asperiores. Accusantium
                perspiciatis deserunt ratione repellendus aut, placeat aliquid a quae perferendis omnis suscipit facilis
                delectus molestias natus mollitia error odio dolore amet? Facere quia doloribus natus eligendi aliquam
                error labore accusamus dicta? Laboriosam nam in deleniti commodi quisquam quo dicta veritatis accusamus
                sequi, adipisci ipsa quis tempora molestias! Repellat, iusto expedita, corporis cumque mollitia
                necessitatibus fuga, sequi dolorum fugit quasi ut aperiam provident.</p>
        </div>


    </body>

</html>
