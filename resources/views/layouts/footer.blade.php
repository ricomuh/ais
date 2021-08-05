<div class="bg-primary-dark text-white">
    <div class="w-10/12 mx-auto py-10 flex flex-col divide-y divide-gray-500">
        <div class="flex flex-col md:flex-row pb-5 gap-4">
            <div class="w-full md:w-6/12 flex flex-col">
                <div class="flex flex-col space-y-2 text-sm">
                    <div class="flex flex-col">
                        <h5 class="font-bold text-secondary text-base"><i class="fas fa-info-circle"></i> About Us</h5>
                        <p>Aqobah International School adalah Pondok Pesantren berbasis International yang merupakan cabang ke-6 dari Pondok Pesantren Al-Aqobah Al-Hidayah.</p>
                    </div>
                    <div class="flex flex-col">
                        <h5 class="font-bold text-secondary text-base"><i class="fas fa-map-marked-alt"></i> Location</h5>
                        <p>Desa Jombok Kec. Ngoro Jombang Jawa Timur (Jalan Raya Jombang-Malang)</p>
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
                        <a href="#" class="bg-blue-500 hover:bg-blue-600 transition duration-300 w-full rounded-md text-center shadow py-2"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="bg-purple-500 hover:bg-purple-600 transition duration-300 w-full rounded-md text-center shadow py-2"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="bg-red-500 hover:bg-red-600 transition duration-300 w-full rounded-md text-center shadow py-2"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="bg-green-500 hover:bg-green-600 transition duration-300 w-full rounded-md text-center shadow py-2"><i class="fab fa-whatsapp"></i></a>
                    </div>
                    {{-- <a href="#" class="bg-green-500 hover:bg-blue-600 transition duration-300 w-full rounded-md text-center shadow py-2 text-sm"><i class="fab fa-facebook"></i> Facebook</a>
                    <a href="#" class="bg-purple-500 hover:bg-purple-600 transition duration-300 w-full rounded-md text-center shadow py-2 text-sm"><i class="fab fa-instagram"></i> Instagram</a>
                    <a href="#" class="bg-red-500 hover:bg-red-600 transition duration-300 w-full rounded-md text-center shadow py-2 text-sm"><i class="fab fa-youtube"></i> Youtube</a>
                    <a href="#" class="bg-green-500 hover:bg-green-600 transition duration-300 w-full rounded-md text-center shadow py-2 text-sm"><i class="fab fa-whatsapp"></i> Whatsapp</a> --}}
                </div>
            </div>
        </div>
        <div class="flex flex-col md:flex-row justify-center md:justify-between items-center pt-5">
            <img src="{{ asset('img/footer.png') }}" alt="" class="h-16">
            <p>Copyright&copy; {{ date('Y') }} Aqobah International School</p>
        </div>
    </div>
</div