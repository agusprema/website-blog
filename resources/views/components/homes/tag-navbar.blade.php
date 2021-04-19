<div class="w-full mt-2">
    <div class="container mx-auto h-2 inline-flex">
        <div class="flex-1 cursor-pointer inline text-white hover:text-fifthly" id="tag-navigate-left">
            <i class="fas fa-arrow-left"></i>
        </div>
        <div class="text-xs flex tag-container overflow-scroll" id="tag-container">
            @for ($x = 0; $x <= 6; $x++) <a href="#responsive-header"
                class="tag-items flex-1 lg:mt-0 text-white hover:text-fourth">
                HOME
                </a>
                <a href="#responsive-header" class="tag-items flex-1 text-white hover:text-fourth">
                    NEWS
                </a>
                <a href="#responsive-header" class="tag-items flex-1 text-white hover:text-fourth">
                    BISNIS
                </a>
                <a href="#responsive-header" class="tag-items flex-1 text-white hover:text-fourth">
                    TEKNO
                </a>
                <a href="#responsive-header" class="tag-items flex-1 text-white hover:text-fourth">
                    BOLA
                </a>
                <a href="#responsive-header" class="tag-items flex-1 text-white hover:text-fourth">
                    HOT
                </a>
                @endfor
        </div>
        <div class="flex-1 cursor-pointer inline text-white hover:text-fifthly" id="tag-navigate-right">
            <i class="fas fa-arrow-right"></i>
        </div>
    </div>
</div>
