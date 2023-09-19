@extends('layouts.app')

@section('main')
    <!-- Produk Unggulan -->
    <div class="container-fluid p-0">
        <!-- Full-width picture -->

        <div class="col-12 p-0">
            <img src="{{ asset('storage/'. $kawasan->foto) }}" class="post-banner-image" alt="Full-width Picture">
            {{-- <img src="{{ asset('placeholder_image.jpg') }}" class="post-banner-image placeholder bg-primary" alt="Full-width Picture"> --}}
        </div>


        <!-- Two-column section -->
        <div class="container py-4 mt-5">
            <!-- Section 1 deskripsi desa -->
            <h2 class="text-left">Destinasi Wisata</h2>
            <hr>
            <br>
            <!-- Section 2 destinasi wisata unggulan-->
            @foreach ($pariwisatas as $pariwisata)
            <section>
                <h3 class="text-left">{{ $pariwisata->nama_wisata }}</h3>
                <section>
                    <img src="{{ asset('storage/'. $pariwisata->foto_pariwisata) }}" class="img-fluid my-3 w-100" alt="Blog Image"
                        style="height: 20rem; object-fit: cover;">
                    <p>{!! $pariwisata->deskripsi !!}</p>
                    <br>
                </section>
            </section>
            @endforeach
            {{-- <section>
                <h3 class="text-left">Panorama dua</h3>
                <section>
                    <img src="https://picsum.photos/id/17/1920/1080" class="img-fluid my-3 w-100" alt="Blog Image"
                        style="height: 20rem; object-fit: cover;">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat officiis natus amet omnis
                        adipisci modi qui aspernatur, laudantium molestiae veritatis dolor quos odio consequatur
                        reiciendis facere? Unde laboriosam optio numquam.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat officiis natus amet omnis
                        adipisci modi qui aspernatur, laudantium molestiae veritatis dolor quos odio consequatur
                        reiciendis facere? Unde laboriosam optio numquam. Lorem ipsum dolor, sit amet consectetur
                        adipisicing elit. Dolorum odio similique beatae. Sapiente nihil nobis earum delectus natus
                        rerum aspernatur, ex, perspiciatis omnis consequatur iste accusamus cumque magni, eaque
                        dolore.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat officiis natus amet omnis
                        adipisci modi qui aspernatur, laudantium molestiae veritatis dolor quos odio consequatur
                        reiciendis facere? Unde laboriosam optio numquam. Lorem ipsum dolor, sit amet consectetur
                        adipisicing elit. Dolorum odio similique beatae. Sapiente nihil nobis earum delectus natus
                        rerum aspernatur, ex, perspiciatis omnis consequatur iste accusamus cumque magni, eaque
                        dolore. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolor non ducimus natus
                        odit. Qui, ex iure voluptas ea accusantium labore hic eveniet deleniti cumque ab dolor
                        numquam dicta ipsam excepturi.</p>
                    <br>
                </section>
            </section>
            <section>
                <h3 class="text-left">Panorama Tiga</h3>
                <section>
                    <img src="https://picsum.photos/id/10/1920/1080" class="img-fluid my-3 w-100" alt="Blog Image"
                        style="height: 20rem; object-fit: cover;">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat officiis natus amet omnis
                        adipisci modi qui aspernatur, laudantium molestiae veritatis dolor quos odio consequatur
                        reiciendis facere? Unde laboriosam optio numquam.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat officiis natus amet omnis
                        adipisci modi qui aspernatur, laudantium molestiae veritatis dolor quos odio consequatur
                        reiciendis facere? Unde laboriosam optio numquam. Lorem ipsum dolor, sit amet consectetur
                        adipisicing elit. Dolorum odio similique beatae. Sapiente nihil nobis earum delectus natus
                        rerum aspernatur, ex, perspiciatis omnis consequatur iste accusamus cumque magni, eaque
                        dolore.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat officiis natus amet omnis
                        adipisci modi qui aspernatur, laudantium molestiae veritatis dolor quos odio consequatur
                        reiciendis facere? Unde laboriosam optio numquam. Lorem ipsum dolor, sit amet consectetur
                        adipisicing elit. Dolorum odio similique beatae. Sapiente nihil nobis earum delectus natus
                        rerum aspernatur, ex, perspiciatis omnis consequatur iste accusamus cumque magni, eaque
                        dolore. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolor non ducimus natus
                        odit. Qui, ex iure voluptas ea accusantium labore hic eveniet deleniti cumque ab dolor
                        numquam dicta ipsam excepturi.</p>
                    <br>
                </section>
            </section> --}}

        </div>
        <!-- END -->
    </div>
@endsection
