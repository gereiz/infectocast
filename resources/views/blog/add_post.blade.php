@extends('layouts.master')
@section('title')
    Blog
@endsection
@section('content')
<x-page-title title="Novo Post" pagetitle="Blog" />
<form class="tablelist-form" method="POST" action="{{urL('addEditPost')}}" enctype="multipart/form-data">
    @csrf

    <div class="mb-3" id="modal-id" style="display: none;">
        <label for="id_field" class="inline-block mb-2 text-base font-medium">ID</label>
        <input type="text" id="id_post" name="id_post" class="input-text" @if (isset($post->id)) value="{{$post->id}}"@endif  readonly="">
    </div>

    <div class="mb-3">
        <label for="title_post" class="inline-block mb-2 text-base font-medium">Título
            <span class="text-red-500">*</span></label>
        <input type="text" id="title_post" name="title_post"class="input-text"placeholder="Digite o Título" @if (isset($post->title)) value="{{$post->title}}"@endif required>
            
    </div>

    <div class="mb-3">
        <label for="image_post" class="inline-block mb-2 text-base font-medium">
            Imagem <span class="text-red-500">*</span>
        </label>
        <div>
            <input type="file" id="image_post" name="image_post"
                class="cursor-pointer form-file form-file-sm border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500"
                placeholder="Imagem">
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h6 class="mb-4 text-15">Texto</h6>
            <textarea class="ckeditor-classic text-slate-800 min-h-[400px]" id="content_post" name="content_post">
               @if (isset($post->content))
                   {!! $post->content !!}
                   
               @else
                <h3>Exemplo de Post</h3>
                <p><br data-cke-filler="true"></p>
                <p>Like all the great things on earth traveling teaches us by example. Here are some of the most precious
                    lessons I’ve learned over the years of traveling.</p>
                <p><br data-cke-filler="true"></p>

                <h4>Appreciation of diversity</h4>
                <p>Getting used to an entirely different culture can be challenging. While it’s also nice to learn about
                    cultures online or from books, nothing comes close to experiencing cultural diversity in person. You
                    learn to appreciate each and every single one of the differences while you become more culturally fluid.
                </p>
                <p><br data-cke-filler="true"></p>
                <p>Life doesn't allow us to execute every single plan perfectly. This especially seems to be the case when
                    you travel. You plan it down to every minute with a big checklist. But when it comes to executing it,
                    something always comes up and you’re left with your improvising skills. You learn to adapt as you go.
                    Here’s how my travel checklist looks now:</p>
                <p><br data-cke-filler="true"></p>
                <ul>
                    <li>buy the ticket</li>
                    <li><i>start your adventure</i></li>
                </ul>
               @endif
            </textarea>
        </div>
    </div>

    <div class="flex justify-end gap-2">
        <a href="{{url('blog')}}" class="btn-cancel" >Cancelar</a>

        <button type="submit" class="btn-submit">Add Post</button>
    </div>
</form>
        
    
@endsection
@push('scripts')
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>

     {{-- Editor --}}
     <script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

     <script src="{{ URL::asset('build/js/pages/form-editor-classic.init.js') }}"></script>
@endpush
