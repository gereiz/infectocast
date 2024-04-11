@extends('layouts.master')
@section('title')
    Políticas
@endsection
@section('content')
<x-page-title title="Nova Política de Privacidade" pagetitle="Políticas" />
<form class="tablelist-form" method="POST" action="{{urL('addOrEditPolicy')}}" enctype="multipart/form-data">
    @csrf

    <div class="mb-3" id="modal-id" style="display: none;">
        <label for="id_policy" class="inline-block mb-2 text-base font-medium">ID</label>
        <input type="text" id="id_policy" name="id_policy" class="input-text" @if (isset($policy->id)) value="{{$policy->id}}"@endif  readonly="">
    </div>

    <div class="mb-3">
        <label for="title_policy" class="inline-block mb-2 text-base font-medium">Título
            <span class="text-red-500">*</span></label>
        <input type="text" id="title_policy" name="title_policy"class="input-text"placeholder="Digite o Título" @if (isset($policy->title)) value="{{$policy->title}}"@endif required>
            
    </div>

    {{-- Subcategoria --}}
    <div class="mb-3">
        <label for="active_policy" class="inline-block mb-2 text-base font-medium">
            Status <span class="text-red-500">*</span>
        </label>
        <div>
            <select id="active_policy" name="active_policy" required
                class="input-text">
                <option value="1" selected>Ativo</option>
                <option value="0">Inativo</option>
            </select>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <h6 class="mb-4 text-15">Texto</h6>
            <textarea class="text-slate-800 min-h-[400px]" id="content_policy" name="content_policy">
               @if (isset($policy->content))
                   {!! $policy->content !!}
                   
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
        <a href="{{url('privacyPolicy')}}" class="btn-cancel" >Cancelar</a>

        <button type="submit" class="btn-submit">Add Política</button>
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
