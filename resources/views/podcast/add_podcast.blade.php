@extends('layouts.master')
@section('title')
    Podcast
@endsection
@section('content')
<x-page-title title="Novo Podcast" pagetitle="Podcast" />

<form class="tablelist-form" method="POST" action="{{urL('addEditPodcast')}}" enctype="multipart/form-data">
    @csrf

    <div class="mb-3" id="modal-id" style="display: none;">
        <label for="id_podcast" class="inline-block mb-2 text-base font-medium">ID</label>
        <input type="text" id="id_podcast" name="id_podcast" class="input-text" @if (isset($podcast->id)) value="{{$podcast->id}}"@endif  readonly="">
    </div>

    <div class="mb-3">
        <label for="title_podcast" class="inline-block mb-2 text-base font-medium">Título
            <span class="text-red-500">*</span></label>
        <input type="text" id="title_podcast" name="title_podcast"class="input-text"placeholder="Digite o Título" @if (isset($podcast->title)) value="{{$podcast->title}}"@endif required>
             
    </div>

    {{-- Link --}}
    <div class="mb-3">
        <label for="link_podcast" class="inline-block mb-2 text-base font-medium">Link
            <span class="text-red-500">*</span></label>
        <input type="text" id="link_podcast" name="link_podcast"class="input-text"placeholder="Insira o link do vídeo" @if (isset($podcast->link)) value="{{$podcast->link}}"@endif required>
            
    </div>
     
    {{-- Editor --}}
    <div class="card">
        <div class="card-body">
            <h6 class="mb-4 text-15">Texto</h6>
            <textarea class=" text-slate-800 min-h-[400px]" id="content_post" name="content_post">
               @if (isset($podcast->content))
                   {!! $podcast->content !!}
                   
               @else
                <h3>Exemplo de Podcast</h3>
                <p><br data-cke-filler="true"></p>
                <p>Insira uma descrião curta aqui!.</p>
                <p><br data-cke-filler="true"></p>

                
               @endif
            </textarea>
        </div>
    </div>

    <div class="flex justify-end gap-2">
        <a href="{{url('podcast')}}" class="btn-cancel" >Cancelar</a>

        <button type="submit" class="btn-submit">@if(isset($podcast->id)) Editar Podcast @else Add Podcast @endif</button>
    </div>
</form>
        
    
@endsection
@push('scripts')
   
     {{-- Editor --}}
     <script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

     <script src="{{ URL::asset('build/js/pages/form-editor-classic.init.js') }}"></script>

     <script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
     <script src="{{ URL::asset('build/js/pages/form-file-upload.init.js') }}"></script>

      <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endpush
