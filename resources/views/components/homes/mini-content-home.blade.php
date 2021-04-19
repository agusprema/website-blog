<div>
    @for ($i = 0; $i < 2; $i++)
        <div class="mb-2">
            <div class="relative my-3">
                <div class="sidebar-header text-light border-b-2 leading-tight border-primary">
                    <div class="title-sidebar-header inline-block text-lg xl:text-xl inline font-playfair bg-primary px-2">Artikel Terbaru</div>
                </div>
                <div class="absolute bottom-0 right-0 z-1">
                    <a href="http://" class="text-dark dark:text-light hover:text-opacity-50 transition duration-500 ease-in-out">MORE <i class="fas fa-angle-right"></i></a>
                </div>
            </div>
            <div class="p-1 md:grid md:grid-cols-12 md:gap-3">
                @foreach ($dummydata as $data)
                    <div class="md:col-span-4 relative mb-2 md:mb-0">
                        <div class="relative">
                            <a href="http://" target="_blank" rel="noopener noreferrer">
                                <div class="h-64 md:h-48 bg-cover text-center overflow-hidden post-thumb hover:opacity-50 transition duration-500 ease-in-out" style="background-image: url('https://1.bp.blogspot.com/-LRRkXVe_sfk/Xtoiou_T2DI/AAAAAAAACfs/FN3QMOYzsGYP45RVuhXagJaVFeq9lCehACLcBGAsYHQ/w680/TY%2BImage%2B%25281%2529.webp')" title="Woman holding a mug">
                                </div>
                            </a>
                            <a href="http://" target="_blank" rel="noopener noreferrer" class="tag-blog-content bg-primary p-1 rounded text-white hover:opacity-75">China</a>
                        </div>
                        <div class="mini-description-blog-container absolute bottom-0 right-0 leading-none">
                            <div class="title-blog-content text-2xl mb-1 text-white hover:text-primary transition duration-500 ease-in-out">
                                <a href="http://" target="_blank" rel="noopener noreferrer">
                                    {{ $data->id }}Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit aperiam id perspiciatis officia, autem officiis sint dignissimos tempora impedit libero.
                                </a>
                            </div>
                            <div class="description-blog-content">
                                <div class="meta-blog-content text-gray-400">
                                    <span class="author-blog-content mr-2">
                                        <i class="fas fa-user"></i> <a href="http://" target="_blank" rel="noopener noreferrer" class="hover:text-gray-300">Agus prema</a>
                                    </span>
                                    <span class="post-date-blog-content" datetime="2018-05-23T20:17:00-07:00"> <i class="fas fa-clock"></i> May 23, 2018</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endfor
</div>
