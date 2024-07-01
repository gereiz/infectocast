@extends('layouts.master')
@section('title')
    Planos
@endsection
@section('content')
<x-page-title title="Novo Plano de Pagamento" pagetitle="Planos" />

<div class="w-full">
    <form class="tablelist-form w-full" method="POST" action="{{urL('addOrEditPlan')}}" enctype="multipart/form-data">
        @csrf
    
       
    
        {{-- Nome do Plano / Icone do Plano--}}
        <div class="w-full flex mb-3">

            <div class="w-1/12 mb-3 mr-4" id="modal-id" style="">
                <label for="id_plan" class="inline-block mb-2 text-base font-medium">ID do Plano</label>
                <input readonly type="text" id="id_plan" name="id_plan" class="input-text" @if ((($plan)) != null) value="{{substr($plan->getRelativeName(), -20)}}"@endif  readonly="">
            </div>

            <div class="w-4/12 mb-3 mr-4">
                <label for="name_plan" class="inline-block mb-2 text-base font-medium">Nome do Plano
                    <span class="text-red-500">*</span></label>
                <input type="text" id="name_plan" name="name_plan"class="input-text"placeholder="Digite o nome do plano" @if ($plan != null) value="{{$plan->get('name')}}"@endif required>
                    
            </div>

            <div class="mb-3 space-y-2">
                <label for="icon_plan" class="inline-block mb-2 text-base font-medium">
                    Icone <span class="text-red-500">*</span>
                </label>
                <div>
                    <input type="file" id="icon_plan" name="icon_plan"
                        class="cursor-pointer form-file form-file-sm border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500"
                        placeholder="Enter your name">
                </div>
                    
            </div>
        </div>
    
        {{-- Valor do Plano / Tipo do Plano --}}
        <div class="w-full flex mb-3">
            <div class="w-3/12 flex flex-col mr-4">
                <label for="price_plan" class="inline-block mb-2 text-base font-medium">Valor do Plano
                    <span class="text-red-500">*</span>
                </label>
                <input type="text" id="price_plan" name="price_plan"class="input-text"placeholder="Digite o valor do plano" @if (($plan) != null) value="{{formataMoeda($plan->get('price'))}}"@endif required>
            </div>

             {{-- Status --}}
            <div class="w-4/12 mb-3">
                <label for="active_plan" class="inline-block mb-2 text-base font-medium">
                    Status <span class="text-red-500">*</span>
                </label>
                <div>
                    <select id="active_plan" name="active_plan" required
                        class="input-text">
                        <option value="1" selected>Ativo</option>
                        <option value="0">Inativo</option>
                    </select>
                </div>
            </div>
            
        </div>
    
        {{-- <div class="w-3/12 flex flex-col me-4">
                <label for="type_plan" class="inline-block mb-2 text-base font-medium">Tipo de Plano
                    <span class="text-red-500">*</span>
                </label>
                <select id="type_plan" name="type_plan" required
                    class="input-text">
                    <option value="" selected disabled>Selecione</option> 
                    <option value="1">Plano Mensal</option>
                    <option value="2">Plano Anual</option>
                </select>
            </div>

            <div class="w-3/12 flex flex-col">
                <label for="recurrence_plan" class="inline-block mb-2 text-base font-medium">Recorrente
                    <span class="text-red-500">*</span>
                </label>
                <select id="recurrence_plan" name="recurrence_plan" required
                    class="input-text">
                    <option value="" selected disabled>Selecione</option>
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div> --}}
       
    
        {{-- Descrição --}}
        <div class="card">
            <div class="card-body">
                <h6 class="mb-4 text-15">Texto</h6>
                <textarea class=" text-slate-800 min-h-[400px]" id="description_plan" name="description_plan">
                   @if (($plan) != null)
                       {!! $plan->get('description') !!}
                       
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
            <a href="{{url('plans')}}" class="btn-cancel" >Cancelar</a>
    
            <button type="submit" class="btn-submit">@if(isset($plan->id))Editar Plano @else Add Plano @endif</button>
        </div>
    </form>
</div>

        
    
@endsection
@push('scripts')
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>

     {{-- Editor --}}
     <script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

     <script src="{{ URL::asset('build/js/pages/form-editor-classic.init.js') }}"></script>
@endpush
