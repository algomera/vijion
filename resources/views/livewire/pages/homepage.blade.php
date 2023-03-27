@push('styles')
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
    />
    <style>
        .swiper {
            width: 100%;
            padding-bottom: 40px;
        }
    </style>
@endpush
<div>
    <div class="container">
        <div class="mt-4 relative isolate overflow-hidden bg-gray-900 py-24 px-6 sm:py-32 lg:px-8">
            <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&crop=focalpoint&fp-y=.8&w=2830&h=1500&q=80&blend=111827&sat=-100&exp=15&blend-mode=multiply" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover">
            <svg viewBox="0 0 1097 845" aria-hidden="true" class="hidden transform-gpu blur-3xl sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:w-[68.5625rem]">
                <path fill="url(#10724532-9d81-43d2-bb94-866e98dd6e42)" fill-opacity=".2" d="M301.174 646.641 193.541 844.786 0 546.172l301.174 100.469 193.845-356.855c1.241 164.891 42.802 431.935 199.124 180.978 195.402-313.696 143.295-588.18 284.729-419.266 113.148 135.13 124.068 367.989 115.378 467.527L811.753 372.553l20.102 451.119-530.681-177.031Z" />
                <defs>
                    <linearGradient id="10724532-9d81-43d2-bb94-866e98dd6e42" x1="1097.04" x2="-141.165" y1=".22" y2="363.075" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#776FFF" />
                        <stop offset="1" stop-color="#FF4694" />
                    </linearGradient>
                </defs>
            </svg>
            <svg viewBox="0 0 1097 845" aria-hidden="true" class="absolute left-1/2 -top-52 -z-10 w-[68.5625rem] -translate-x-1/2 transform-gpu blur-3xl sm:top-[-28rem] sm:ml-16 sm:translate-x-0 sm:transform-gpu">
                <path fill="url(#8ddc7edb-8983-4cd7-bccb-79ad21097d70)" fill-opacity=".2" d="M301.174 646.641 193.541 844.786 0 546.172l301.174 100.469 193.845-356.855c1.241 164.891 42.802 431.935 199.124 180.978 195.402-313.696 143.295-588.18 284.729-419.266 113.148 135.13 124.068 367.989 115.378 467.527L811.753 372.553l20.102 451.119-530.681-177.031Z" />
                <defs>
                    <linearGradient id="8ddc7edb-8983-4cd7-bccb-79ad21097d70" x1="1097.04" x2="-141.165" y1=".22" y2="363.075" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#776FFF" />
                        <stop offset="1" stop-color="#FF4694" />
                    </linearGradient>
                </defs>
            </svg>
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">Lorem ipsum dolor sit</h2>
                <p class="mt-6 text-lg leading-8 text-gray-300">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.</p>
            </div>
        </div>
        <section class="my-8">
            <h3 class="text-center text-2xl font-bold tracking-tight mt-10 mb-6">I nostri brand</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mb-5">
                <x-coupon-card amount="20%" coins="50" :brand="['name' => 'Zalando', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Zalando_logo.svg/2560px-Zalando_logo.svg.png', 'category' => 'Abbigliamento e Scarpe']" />
                <x-coupon-card amount="30%" coins="75" :brand="['name' => 'ManoMano', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/1/1c/ManoMano_2018.png', 'category' => 'Casa e Giardino']" />
                <x-coupon-card amount="45%" coins="90" :brand="['name' => 'Notino', 'logo' => 'https://logos-download.com/wp-content/uploads/2021/01/Notino_Logo.png', 'category' => 'Salute e Bellezza']" />
                <x-coupon-card amount="15%" coins="35" :brand="['name' => 'Leroy Merlin', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Leroy_Merlin.svg/2560px-Leroy_Merlin.svg.png', 'category' => 'Casa e Giardino']" />
                <x-coupon-card amount="35%" coins="90" :brand="['name' => 'Dyson', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Dyson_logo.svg/2560px-Dyson_logo.svg.png', 'category' => 'Casa e Giardino']" />
                <x-coupon-card amount="25%" coins="33" :brand="['name' => 'Foot Locker', 'logo' => 'https://upload.wikimedia.org/wikipedia/en/thumb/9/94/Foot_Locker_logo.svg/1200px-Foot_Locker_logo.svg.png', 'category' => 'Abbigliamento e Scarpe']" />
            </div>
            <div class="flex justify-center">
                <button type="button" class="rounded-md bg-[#63184c] py-4 px-6 text-xs font-semibold text-white uppercase shadow-sm transition duration-300 hover:bg-[#7a2962] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#63184c]">Carica altro</button>
            </div>
        </section>
    </div>
    <!-- Slider main container -->
    <section class="bg-gray-800 py-8">
        <h3 class="text-center text-2xl text-white font-bold tracking-tight mt-10 mb-6">Gli imperdibili</h3>
        <div class="swiper container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">
                    <x-coupon-card-highlight amount="45%" coins="85" :brand="['name' => 'Zalando', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Zalando_logo.svg/2560px-Zalando_logo.svg.png', 'category' => 'Abbigliamento e Scarpe']" bg="https://images.unsplash.com/photo-1679678691006-d8a1484830c4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80"></x-coupon-card-highlight>
                </div>
                <div class="swiper-slide">
                    <x-coupon-card-highlight amount="13%" coins="50" :brand="['name' => 'Notino', 'logo' => 'https://logos-download.com/wp-content/uploads/2021/01/Notino_Logo.png', 'category' => 'Salute e Bellezza']" bg="https://images.unsplash.com/photo-1679850136404-cff6c8714271?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2344&q=80"></x-coupon-card-highlight>
                </div>
                <div class="swiper-slide">
                    <x-coupon-card-highlight amount="13%" coins="50" :brand="['name' => 'Dyson', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Dyson_logo.svg/2560px-Dyson_logo.svg.png', 'category' => 'Casa e Giardino']" bg="https://plus.unsplash.com/premium_photo-1677528816821-2e373e2602cb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1041&q=80"></x-coupon-card-highlight>
                </div>
                <div class="swiper-slide">
                    <x-coupon-card-highlight amount="45%" coins="85" :brand="['name' => 'Zalando', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0b/Zalando_logo.svg/2560px-Zalando_logo.svg.png', 'category' => 'Abbigliamento e Scarpe']" bg="https://images.unsplash.com/photo-1679678691006-d8a1484830c4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80"></x-coupon-card-highlight>
                </div>
                <div class="swiper-slide">
                    <x-coupon-card-highlight amount="13%" coins="50" :brand="['name' => 'Notino', 'logo' => 'https://logos-download.com/wp-content/uploads/2021/01/Notino_Logo.png', 'category' => 'Salute e Bellezza']" bg="https://images.unsplash.com/photo-1679850136404-cff6c8714271?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2344&q=80"></x-coupon-card-highlight>
                </div>
                <div class="swiper-slide">
                    <x-coupon-card-highlight amount="13%" coins="50" :brand="['name' => 'Dyson', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Dyson_logo.svg/2560px-Dyson_logo.svg.png', 'category' => 'Casa e Giardino']" bg="https://plus.unsplash.com/premium_photo-1677528816821-2e373e2602cb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1041&q=80"></x-coupon-card-highlight>
                </div>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>
</div>
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            slidesPerView: 3,
            // Optional parameters
            direction: 'horizontal',
            loop: false,
            spaceBetween: 16,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>
@endpush