@extends('layouts.app')

@section('main')
    
    <div class="container container-header py-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">BKAD</li>
            <li class="breadcrumb-item active" aria-current="page">Program Kerja</li>
          </ol>
        </nav>
        <h2 class="fw-bolder">Program Kerja</h2>
        <div class="card my-4 p-2" style="width: 100%; border-radius: 1rem">
          <div class="card-body">
            <h4 class="card-title text-danger fw-bolder mb-3">Uraian Program Kerja BKAD (mungkin dalam bentuk file excel)</h4>
            <p class="card-text">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit amet eum velit quia? Illo, fuga modi. Qui voluptatum aliquam, cum ducimus earum praesentium, eius perspiciatis voluptatibus vero autem odio natus quos consectetur
              ab iste ullam, vitae obcaecati consequuntur? Temporibus voluptas nemo totam sint deserunt voluptatibus culpa unde molestiae blanditiis perferendis veniam consectetur nobis qui, ex odio porro. Omnis soluta ipsa libero sit natus
              nisi mollitia vitae facere? Hic suscipit dolorum nam, incidunt placeat fuga qui eos? Autem nam iusto, odio vel, dolore laboriosam et non dicta hic molestias culpa possimus nisi, magni reprehenderit. Voluptate, similique id
              ducimus laudantium rem quidem.
            </p>
            <p class="card-text">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit amet eum velit quia? Illo, fuga modi. Qui voluptatum aliquam, cum ducimus earum praesentium, eius perspiciatis voluptatibus vero autem odio natus quos consectetur
              ab iste ullam, vitae obcaecati consequuntur? Temporibus voluptas nemo totam sint deserunt voluptatibus culpa unde molestiae blanditiis perferendis veniam consectetur nobis qui, ex odio porro. Omnis soluta ipsa libero sit natus
              nisi mollitia vitae facere? Hic suscipit dolorum nam, incidunt placeat fuga qui eos? Autem nam iusto, odio vel, dolore laboriosam et non dicta hic molestias culpa possimus nisi, magni reprehenderit. Voluptate, similique id
              ducimus laudantium rem quidem.
            </p>
          </div>
        </div>
      </div>
      
@endsection