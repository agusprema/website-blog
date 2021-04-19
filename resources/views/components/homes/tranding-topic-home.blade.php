<div class="mb-4 col-span-2 lg:col-span-2 sm:col-span-1 text-dark dark:text-light">
    <div class="relative my-3">
        <div class="sidebar-header text-light border-b-2 leading-tight border-primary">
            <div class="title-sidebar-header inline-block text-lg xl:text-xl inline font-playfair bg-primary px-2">Artikel Terbaru</div>
        </div>
    </div>
    <div class="rounded-b-lg">
        <ol class="list-decimal list-inside text-dark dark:text-light">
            @for ($i = 1; $i < 11; $i++)
                <li class="truncate">
                    <a href="#" class="truncate font-playfair hover:text-primary transition duration-500 ease-in-out pl-1">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam ad laborum quo qui quod perferendis temporibus reprehenderit. Libero saepe ullam, eum veritatis quasi assumenda et voluptatibus eaque debitis! Odio, minus!
                    </a>
                </li>
            @endfor
        </ol>
    </div>
</div>
