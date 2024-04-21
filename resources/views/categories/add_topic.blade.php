@extends('layouts.master')
@section('title')
    Tópicos
@endsection
@section('content')
<x-page-title title="Novo Tópico" pagetitle="Tópico" />

<div class="w-full">
    <form class="tablelist-form w-full" method="POST" action="{{urL('addOrEditTopic')}}" enctype="multipart/form-data">
        @csrf
    
        <div class="mb-3" id="modal-id" style="display: none;">
            <label for="id_topic" class="inline-block mb-2 text-base font-medium">ID</label>
            <input type="text" id="id_topic" name="id_topic" class="input-text" @if (isset($topic->id)) value="{{$topic->id}}"@endif  readonly="">
        </div>
    
        {{-- Titulo --}}
        <div class="w-4/12 mb-3">
            <label for="title_topic" class="inline-block mb-2 text-base font-medium">Título
                <span class="text-red-500">*</span></label>
            <input type="text" id="title_topic" name="title_topic"class="input-text"placeholder="Digite o Título" @if (isset($topic->title)) value="{{$topic->title}}"@endif required>
                
        </div>
    
        {{-- Subcategoria / Acesso--}}
        <div class="w-full flex mb-3">
            <div class="mb-3 mr-4">
                <label for="subcategory" class="inline-block mb-2 text-base font-medium">
                    Subcategoria <span class="text-red-500">*</span>
                </label>
                <div>
                    <select id="subcategory" name="subcategory" required
                        class="input-text">
                        <option value="0" selected disabled>Selecione a Subcategoria</option>
                        @foreach ($subcategories as $subcat)
                            <option value="{{$subcat->id}}">{{$subcat->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="subcategory" class="inline-block mb-2 text-base font-medium">
                    Acesso <span class="text-red-500">*</span>
                </label>
                
                <select class="text-red-500 flex flex-col" required multiple="multiple" name="access_topic[]" id="multiselect_topic">
                    @foreach ($plans as $plan)
                        <option value="{{$plan->id}}">{{$plan->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
         
        {{-- Editor --}}
        <div class="card">
            <div class="card-body">
                <h6 class="mb-4 text-15">Texto</h6>
                <textarea class=" text-slate-800 min-h-[400px]" id="content_topic" name="content_topic">
                   @if (isset($topic->content))
                       {!! $topic->content !!}
                       
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
            <a href="{{url('topics')}}" class="btn-cancel" >Cancelar</a>
    
            <button type="submit" class="btn-submit">@if(isset($topic->id)) Editar Post @else Add Post @endif</button>
        </div>
    </form>

</div>
          
@endsection
@push('scripts')
   
     {{-- Editor --}}
    <script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

    <script src="{{ URL::asset('build/js/pages/form-editor-classic.init.js') }}"></script>

    {{-- Multi Select --}}
    <script src="{{ URL::asset('build/libs/multi.js/multi.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/form-multi-select.init.js') }}"></script>

      <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endpush
