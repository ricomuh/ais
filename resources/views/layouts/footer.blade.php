<div class="bg-primary-dark text-white">
    <div class="w-10/12 mx-auto py-10 flex flex-col divide-y divide-gray-500">
        <div class="flex flex-col md:flex-row pb-5 gap-4">
            <div class="w-full md:w-6/12 flex flex-col">
                <div class="flex flex-col space-y-2 text-sm">
                    <div class="flex flex-col">
                        <h5 class="font-bold text-secondary text-base"><i class="fas fa-info-circle"></i> About Us</h5>
                        <p>Aqobah International School (AIS) berusaha membantu setiap santri untuk menemukan potensi diri masing-masing. AIS juga berusaha, melalui berbagai program unggulannya, untuk mendorong dan mengembangkan potensi-potensi luar biasa dari setiap anak. Karena kami selalu meyakini bahwasannya setiap anak itu istimewa dan bisa menjadi juara.</p>
                    </div>
                    <div class="flex flex-col">
                        <h5 class="font-bold text-secondary text-base"><i class="fas fa-map-marked-alt"></i> Location</h5>
                        <p>Jalan Bakalan 1, Dusun Ngasem, Area sawah, Jombok, Kec. Ngoro, Kabupaten Jombang, 61473</p>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-3/12">
                <div class="flex flex-col">
                    <h5 class="font-bold text-base text-secondary"><i class="fas fa-external-link-alt"></i> Quick Links</h5>
                    <div class="flex flex-col divide-y divide-gray-500">
                        @foreach ($footerLinks as $footerLink)
                            <a href="{{ $footerLink->link }}" class="p-1 hover:text-secondary text-white text-sm transform hover:translate-x-1 transition duration-300">{{ $footerLink->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="w-full md:w-3/12">
                <div class="flex flex-col space-y-2">
                    <h5 class="font-bold text-base text-secondary"><i class="fas fa-hand-point-down"></i> Keep in touch</h5>
                    <div class="grid grid-cols-4 gap-2">
                        <a href="https://www.facebook.com/aqobahinternational/" class="bg-blue-500 hover:bg-blue-600 transition duration-300 w-full rounded-md text-center shadow py-2"><i class="fab fa-facebook"></i></a>
                        <a href="https://www.instagram.com/aqobahinternational/" class="bg-purple-500 hover:bg-purple-600 transition duration-300 w-full rounded-md text-center shadow py-2"><i class="fab fa-instagram"></i></a>
                        <a href="https://youtube.com/channel/UCikrCm-sl0pauu4tTtBqIXw" class="bg-red-500 hover:bg-red-600 transition duration-300 w-full rounded-md text-center shadow py-2"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="bg-green-500 hover:bg-green-600 transition duration-300 w-full rounded-md text-center shadow py-2"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col md:flex-row justify-center md:justify-between items-center pt-5">
            <img src="{{ asset('img/footer.png') }}" alt="" class="h-16">
            <p>Copyright&copy; {{ date('Y') }} Aqobah International School</p>
        </div>
    </div>
</div