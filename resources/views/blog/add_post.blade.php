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
            <textarea class="text-slate-800 min-h-[400px]" id="content_post" name="content_post">
               @if (isset($post->content))
                   {!! $post->content !!}
                   
               @else
                
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
     {{-- <script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script> --}}

     {{-- <script src="{{ URL::asset('build/js/pages/form-editor-classic.init.js') }}"></script> --}}
@endpush
