@push('meta')
    <title>{{ config('app.name', 'Laravel') }}</title>
@endpush
<x-layouts.home-layout>
    <div>
        <div class="relative my-3">
            <div class="sidebar-header text-light border-b-2 leading-tight border-primary">
                <div class="title-sidebar-header inline-block text-lg xl:text-xl inline font-playfair bg-primary px-2">Artikel Terbaru</div>
            </div>
        </div>
        <div class="p-1">
            @foreach ($dummydata as $data)
                <div class="md:grid md:grid-cols-12 md:gap-3 mb-4 relative">
                    <div class="md:col-span-4 relative">
                        <a href="http://" target="_blank" rel="noopener noreferrer">
                            <div class="h-64 md:h-48 bg-cover text-center overflow-hidden post-thumb hover:opacity-50 transition duration-500 ease-in-out" style="background-image: url('https://1.bp.blogspot.com/-LRRkXVe_sfk/Xtoiou_T2DI/AAAAAAAACfs/FN3QMOYzsGYP45RVuhXagJaVFeq9lCehACLcBGAsYHQ/w680/TY%2BImage%2B%25281%2529.webp')" title="Woman holding a mug">
                            </div>
                        </a>
                        <a href="http://" target="_blank" rel="noopener noreferrer" class="tag-blog-content bg-primary p-1 rounded text-white hover:opacity-80 transition duration-500 ease-in-out">Lifestyle</a>
                    </div>
                    <div class="description-blog-container md:col-span-8 absolute md:relative bottom-0 right-0">
                        <div class="title-blog-content leading-tight text-2xl mb-1 text-dark dark:text-light hover:text-primary dark:hover:text-primary transition duration-500 ease-in-out">
                            <a href="http://" target="_blank" rel="noopener noreferrer">{{ $data->id }} Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit aperiam id perspiciatis officia, autem officiis sint dignissimos tempora impedit libero.</a>
                        </div>
                        <div class="description-blog-content">
                            <div class="meta-blog-content text-gray-600 dark:text-gray-400">
                                <span class="author-blog-content mr-2"><i class="fas fa-user"></i> <a href="http://" target="_blank" rel="noopener noreferrer" class="dark:hover:text-gray-300 hover:text-gray-400">Agus prema</a></span>
                                <span class="post-date-blog-content" datetime="2018-05-23T20:17:00-07:00"><i class="fas fa-clock"></i> May 23, 2018</span>
                            </div>
                            <div class="hidden md:block">
                                <div class="snipet-blog-content break-all text-gray-600 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, natus. Dolorum magnam velit fugit delectus excepturi dolores dolore vero eius ratione. Magni dolore, neque repellat, nesciunt quos modi voluptates optio ipsam corporis laudantium possimus alias distinctio nisi non assumenda dicta reprehenderit quas eligendi et magnam suscipit adipisci libero veritatis quisquam. Ipsam debitis consequuntur necessitatibus ex exercitationem neque illum quia quasi excepturi dignissimos sit sunt
                                    asperiores iste sapiente
                                    dolorem amet iure, voluptatibus dolores voluptate quos, in eum accusantium distinctio. Hic corporis ducimus commodi sint eaque similique laudantium ab nulla reprehenderit laboriosam velit enim placeat ipsam repellat ratione, quae perferendis quos praesentium!</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $dummydata->links() }}
    </div>
</x-layouts.home-layout>
