<x-page-layout title="FAQs">
    <div class="flex flex-col md:flex-row">
        <div class="w-full md:w-1/3 flex-shrink-0 animate" data-animate="animate-from-left">
            <div class="flex flex-col space-y-2">
                <h1 class="text-primary text-4xl font-bold">FAQs</h1>
                <div class="text-primary-light text-xl font-semibold">Frequently Asked Questions</div>
                <div class="font-bold">Ingin tahu lebih banyak tentang kami?</div>
                <div>Berikut ini merupakan beberapa pertanyaan yang sering muncul mengenai lembaga Aqobah International School (AIS). Disajikan juga pertanyaan-pertanyaan yang sering diajukan oleh wali santri mengenai keseharian aktifitas putra/putrinya di AIS.</div>
            </div>
        </div>
        <div class="flex-grow">
            <div class="flex flex-col space-y-2">
                @foreach ($faqs as $faq)
                    <x-faq-item :faq="$faq" class="animate" :dataAnimate="$faq->id % 2 == 0 ? 'animate-from-left' : 'animate-from-right'" />
                @endforeach
            </div>
        </div>
    </div>
</x-page-layout>