@section('title','Aqobah International School Official Website')
@section('description','Welcome to Aqobah International School Official Website')
@section('image', asset('img/header.svg'))
<x-main-layout>
    <div class="h-16 md:h-0"></div>
    <x-carousel id="main" :dots="true" :autoplay="5000" :nav="true" class="group">
        @foreach ($carousels as $carousel)
            <div class="w-full relative overflow-hidden aspect-w-7 aspect-h-3">
                <img src="{{ asset('img/carousels/' . $carousel->filename) }}" alt="" class="w-full h-full object-cover absolute">
                <div class="w-full h-full absolute bottom-0 bg-gradient-to-t from-black opacity-50 group-hover:opacity-80 transition duration-1000"></div>
                <a href="{{ $carousel->link }}" class="w-full h-full flex flex-col justify-center items-center text-center absolute text-white">
                    <h1 class="md:text-5xl text-2xl font-bold">{{ $carousel->title }}</h1>
                    <h1 class="md:text-xl text-sm font-semibold max-w-2xl">{{ $carousel->description }}</h1>
                </a>
            </div>
        @endforeach
    </x-carousel>
    <div class="min-h-screen flex items-center bg-opacity-50">
        <div class="w-10/12 mx-auto h-full">
            <div class="flex flex-col md:flex-row justify-between items-center h-full py-8 gap-20">
                
                <div class="order-1 md:order-2 group relative w-10/12 md:w-1/2 animate" data-animate="animate-from-right ">
                    <img src="{{ asset('img/pakfaqih.jpg') }}" class="h-64 w-auto object-cover rounded-lg shadow-lg -mb-32 transform group-hover:-translate-y-4 group-hover:scale-105 transition duration-500 animate-float" alt="">
                    <img src="{{ asset('img/abah.png') }}" class="h-48 transform -translate-x-8" alt="">
                </div>

                <div class="md:w-1/2 w-full flex flex-col space-y-2 order-2 md:order-1 relative animate" data-animate="animate-from-left">
                    <img src="{{ asset('img/quote.png') }}" alt="" class="absolute opacity-50 filter blur-sm -left-8 -top-4">
                    <p class="text-gray-800 transform">Mendidik itu bukan membentuk, tapi menyiapkan bahan terbaik untuk saatnya siap menjadi sesuatu. Berikan kepercayaan dan apresiasi, maka kreatifitas anak akan tumbuh dan berkembang tidak terbatas. Pendampingan, aturan, dan motivasi itu secukupnya saja. Fokus saja pada kecerdasan masing-masing murid yang memang berbeda, sehingga ilmu yang diajarkan tidak menjadi "<em>Mubadzir</em>".</p>
                    <div class="flex flex-col">    
                        <h3 class="text-primary font-bold text-xl uppercase">KH. Junaidi Hidayat SH, S.Ag</h3>
                        <h4 class="text-primary-light font-bold text-lg uppercase">Pengasuh PonPes Al-Aqobah</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-10/12 mx-auto my-10 flex flex-col md:flex-row rounded-xl md:justify-between md:items-center md:px-20 md:py-10 px-10 py-5 shadow-lg gap-8" style="background-image: url({{ asset('img/pattern1.png') }}); ">
        <div class="flex flex-col">
            <h2 class="text-3xl font-bold text-secondary">Prosedur Pendaftaran Aqobah Internasional School</h2>
            <p class="text-lg text-white">Tunggu apa lagi? Mari bergabung bersama kami dan persiapkan diri anda untuk selalu menjadi anak yang Istimewa dan Menjadi Juara!</p>
        </div>
        <div class="">
            <a href="https://admission.aqobahinternational.sch.id" class="bg-green-700 hover:bg-green-600 transition duration-300 rounded-md px-6 py-2 text-lg text-white inline-flex items-center min-w-max hover:shadow-md animate transform group" data-animate="animate-from-left">
                <span>Daftar Sekarang</span><i class="fas fa-caret-right transform -translate-x-2 opacity-0 group-hover:translate-x-2 group-hover:opacity-100 transition duration-300"></i>
            </a>
        </div>
    </div>

    <div style="background-image: url({{ asset('img/bg1.png') }}); background-position-y: bottom;background-repeat: no-repeat" class="py-10">    
        <div class="w-10/12 mx-auto flex flex-col justify-center md:flex-row md:justify-between md:items-center gap-8 min-h-screen">
            <div class="w-full md:w-2/5 flex flex-col">
                <h1 class="text-3xl font-bold text-primary">
                    FAQs
                </h1>
                <h3 class="text-xl font-bold text-primary-light">
                    Frequently Asked Questions
                </h3>
                <p class="mt-5 font-bold">
                    Ingin tahu lebih banyak tentang kami?
                </p>
                <p>Berikut ini merupakan beberapa pertanyaan yang sering muncul mengenai lembaga Aqobah International School (AIS). Disajikan juga pertanyaan-pertanyaan yang sering diajukan oleh wali santri mengenai keseharian aktifitas putra/putrinya di AIS.</p>
            </div>
            <div class="w-full md:w-3/5 flex flex-col space-y-2 relative animate" data-animate="animate-from-right">
                <span class="absolute text-7xl bg-primary font-bold w-32 h-32 text-white flex justify-center items-center rounded-full -right-8 md:-right-14 filter opacity-70">?</span>
                @foreach ($faqs as $faq)
                    <x-faq-item :faq="$faq" />
                @endforeach
                <div><a href="{{ route('faqs') }}" class="text-secondary-dark hover:text-secondary transition duration-300 hover:underline ml-3 font-bold">Show More FAQs...</a></div>
            </div>
        </div>
    </div>
    
    <div class="bg-primary" style="background-image: url({{ asset('img/bg2.png') }}); background-position-y: bottom; background-position-x: right; background-repeat: no-repeat">
        @if (isset($yt['items'][0]['snippet']['thumbnails']['default']['url']) && isset($yt['items'][0]['id']))
            <div class="w-10/12 mx-auto flex flex-col justify-center min-h-screen gap-8 md:flex-row md:justify-between md:items-center">
                <div class="flex flex-col space-y-4 w-full md:w-1/2 relative animate" data-animate="animate-from-left">
                    <img src="{{ asset('img/ytlogo.png') }}" class="absolute filter blur-sm opacity-50 -left-12 top-16 animate-float" alt="">
                    <div class="flex flex-row items-center space-x-4 transform">
                        <img src="{{ $yt['items'][0]['snippet']['thumbnails']['default']['url'] }}" class="rounded-full shadow-lg" alt="">
                        <div class="flex flex-col">
                            <a href="https://youtube.com/channel/{{ $yt['items'][0]['id'] }}" class="font-bold text-xl text-secondary-dark hover:text-secondary transition duration-300">
                                {{ $yt['items'][0]['snippet']['localized']['title'] }}
                            </a>
                            <p class="text-white"><b class="text-secondary">{{ $yt["items"][0]['statistics']['subscriberCount'] }}</b> Subscribers</p>
                            <script src="https://apis.google.com/js/platform.js"></script>
                            <div class="g-ytsubscribe" data-channelid="{{ $yt['items'][0]['id'] }}" data-layout="default" data-count="default"></div>
                        </div>
                    </div>
                    <p class="transform text-sm text-white">
                        {{ $yt['items'][0]['snippet']['localized']['description'] }}
                    </p>
                </div>
                <div class="w-full md:w-1/2 animate" data-animate="animate-from-right">
                    <div class="shadow-md md:p-5 p-2 rounded-lg backdrop-filter backdrop-blur-md bg-white bg-opacity-20">
                        <div class="aspect-w-16 aspect-h-9">
                            <iframe width="640" height="360" src="https://www.youtube.com/embed/{{ $ytVideo["items"][0]['id']['videoId'] }}" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="w-10/12 mx-auto min-h-screen py-32 flex flex-col justify-center animate" data-animate="animate-from-bottom">
            <h1 class="text-3xl font-bold text-secondary text-center mb-10" ><i class="fas fa-newspaper"></i> Latest News</h1>
            <x-carousel id="news-carousel" :dots="true" :bottomDot="true" :autoplay="3000" :nav="true" :items="3" margin="8"
            responsive="
            0: {
                items : 1
            },
            600: {
                items : 2
            },
            1000: {
                items : 3
            }
            "
            >
                @foreach ($posts as $post)
                    <x-news-item :post="$post" class="my-4" />
                @endforeach
            </x-carousel>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-20">
                @foreach ($featuredTags as $featuredTag)
                    <div class="flex flex-col space-y-2 animate" data-animate="{{ $featuredTag->id % 2 == 0 ? 'animate-from-right' : 'animate-from-left' }}">
                        <h2 class="text-2xl font-bold text-secondary"><i class="{{ $featuredTag->icon_class }}"></i> {{ $featuredTag->title }}</h2>
                        <div class="flex flex-col md:flex-row gap-4">
                            @foreach ($featuredTag->tag->posts->take(2) as $post)
                                <x-news-item :post="$post" :h="48" :small="true"/>
                            @endforeach
                        </div>
                        <a href="{{ route('news.tag', $featuredTag->tag->slug) }}" class="text-secondary font-semibold hover:text-secondary-dark hover:underline">See More...</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-main-layout>