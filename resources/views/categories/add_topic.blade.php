@extends('layouts.master')
@section('title')
    Tópicos
@endsection
@section('content')
<x-page-title title="Novo Tópico" pagetitle="Tópico" />

<div class="w-full">
    <form class="tablelist-form w-full" method="POST" action="{{urL('addOrEditTopic')}}" enctype="multipart/form-data">
        @csrf
    
        <div class="w-full flex mb-3">
            <div class="w-1/12 mb-3 mr-4" id="modal-id" style="">
                <label for="id_topic" class="inline-block mb-2 text-base font-medium">ID do Plano</label>
                <input readonly type="text" id="id_topic" name="id_topic" class="input-text" @if ($topic != null) value="{{substr($topic->getRelativeName(), -20)}}"@endif  readonly="">
            </div>
        
            {{-- Titulo --}}
            <div class="w-4/12 mb-3">
                <label for="title_topic" class="inline-block mb-2 text-base font-medium">Título
                    <span class="text-red-500">*</span></label>
                <input type="text" id="title_topic" name="title_topic"class="input-text" placeholder="Digite o Título" @if ($topic != null) value="{{$topic->get('title')}}"@endif required>
                <input type="text" id="old_title_topic" name="old_title_topic"class="hidden" @if ($topic != null) value="{{$topic->get('title')}}"@endif required readonly>
                    
            </div>
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
                            <option value="{{substr($subcat->getRelativeName(), -20)}}">{{$subcat->get('title')}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="my-3 ml-4">
                <label for="subcategory" class="inline-block mb-2 text-base font-medium">
                    Acesso <span class="text-red-500">*</span>
                </label>

                {{-- Checkboxes dos planos --}}
                <div class="flex gap-6 ">
                    {{-- se no topico o Free, Gold ou Premium for igual a 1, marca como checked o plano --}}
                    @foreach ($plans as $plan)
                        <div class="flex items-center">
                            <input type="checkbox" id="access_topic" name="access_topic[]" value="{{$plan->get('name')}}" @if ($topic != null && $topic->get($plan->get('name')) == 1) checked @endif>
                            <label for="access_topic" class="ml-2">{{$plan->get('name')}}</label>
                        </div>
                    @endforeach
                </div>
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
                    <p>Insira uma descrição curta aqui!.</p>
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
