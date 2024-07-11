@extends('layouts.master')
@section('title')
    Tópicos
@endsection
@push('css')
    <!-- Sweet Alert css-->
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
    
@endpush
@section('content')
<!-- page title -->
    <x-page-title title="Tópicos" pagetitle="Categorias" /> 

    {{-- Lista de Topicos --}}
    <div class="card" id="customerList">
        <div class="card-body">
            <div class="grid grid-cols-1 gap-5 mb-5 xl:grid-cols-2">
                <div>
                    <div class="relative xl:w-3/6">
                        <input type="text"
                            class="ltr:pl-8 rtl:pr-8 search input-text"
                            placeholder="Pesquisar Categoria ..." autocomplete="off">
                        <i data-lucide="search"
                            class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
                    </div>
                </div>
                <div class="ltr:md:text-end rtl:md:text-start">
                    <a type="button" class="btn-add" href="{{url('addTopic')}}">
                        <i class="align-bottom ri-add-line me-1"></i>
                        Add tópico
                    </a>
                    <button type="button"
                        class="text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20"
                        onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full whitespace-nowrap" id="customerTable">
                    <thead class="bg-slate-100 dark:bg-zink-600">
                        <tr>
                            <th class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500"
                                scope="col" style="width: 50px;">
                                <input
                                    class="size-4 border rounded-sm appearance-none cursor-pointer bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-custom-500 checked:border-custom-500 dark:checked:bg-custom-500 dark:checked:border-custom-500 checked:disabled:bg-custom-400 checked:disabled:border-custom-400"
                                    type="checkbox" id="checkAll" value="option">
                            </th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                data-sort="titulo">
                                Título
                            </th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                data-sort="categoria">
                                SubCategoria
                            </th>

                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                data-sort="icone">
                                Acesso
                            </th>
                            <th class="sort px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right"
                                data-sort="action">
                                Ações
                            </th>
                        </tr>
                    </thead> 
                    <tbody class="list form-check-all">
                        @foreach ($topics as $topic)
                            <tr class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                <th class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500" scope="row">
                                    <input
                                        class="size-4 border rounded-sm appearance-none cursor-pointer bg-slate-100 border-slate-200 dark:bg-zink-600 dark:border-zink-500 checked:bg-custom-500 checked:border-custom-500 dark:checked:bg-custom-500 dark:checked:border-custom-500 checked:disabled:bg-custom-400 checked:disabled:border-custom-400"
                                        type="checkbox" name="chk_child">
                                </th>
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 id" style="display:none;">
                                    <a href="javascript:void(0);" class="fw-medium link-primary id">
                                        {{$topic->getRelativeName()}}
                                    </a>
                                </td>

                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 customer_name">
                                    {{$topic->get('title')}}
                                </td>
            
                                @foreach ($subcategories as $subcat)
                                    @if ($subcat->getRelativeName() == "/".$topic->get('id_subcategory')->getData())
                                        <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500 email">
                                            {{$subcat->get('title')}}
                                        </td>

                                    @endif
                                @endforeach

                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                    @if($topic->get('Free') == 1)
                                        <span class="badge bg-success">Grátis,</span>
                                    @endif
                                    @if($topic->get('Gold') == 1)
                                        <span class="badge bg-success">Gold,</span>
                                    @endif
                                    @if($topic->get('Premium') == 1)
                                        <span class="badge bg-success">Premium</span>
                                    @endif
                                </td>
                                
                            
                                <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                                    <div class="flex gap-2">
                                        <div class="edit">
                                            <a href="{{'addTopic/'.substr($topic->getRelativeName(), -20)}}"
                                                class="py-1 text-xs text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20 edit-item-btn">
                                                Editar
                                            </a>
                                        </div>
                                        <div class="remove">
                                            <button data-modal-target="{{'deleteModal/'.$topic->getRelativeName()}}" id="delete-record" class="py-1 text-xs text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20 remove-item-btn">
                                                Excluir
                                            </button>
                                        </div>
                                    </div>
                                </td> 
                            </tr>
                            
                            {{-- Modal Delete --}}
                            <div id={{'deleteModal/'.$topic->getRelativeName()}} modal-center
                                class="fixed flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
                                <div class="w-screen md:w-[25rem] bg-white shadow rounded-md dark:bg-zink-600">
                                    <div class="max-h-[calc(theme('height.screen')_-_180px)] overflow-y-auto px-6 py-8">
                                        <form method="POST" action="{{urL('deleteTopic')}}">
                                            @csrf
                                            <div class="mb-3" id="modal-id" style="display: none;">
                                                <label for="id_topic" class="inline-block mb-2 text-base font-medium">ID</label>
                                                <input type="text" id="id_topic" name="id_topic" value="{{substr($topic->getRelativeName(), -20)}}"
                                                    class="input-text"
                                                    placeholder="ID" readonly="">
                                            </div>
                                            <div class="float-right">
                                                <button data-modal-close={{'deleteModal/'.$topic->getRelativeName()}} id="close-removeNotesModal"
                                                    class="transition-all duration-200 ease-linear text-slate-500 hover:text-red-500"><i
                                                        data-lucide="x" class="size-5"></i></button>
                                            </div>
                                            <img src="{{ URL::asset('build/images/delete.png') }}" alt="" class="block h-12 mx-auto">
                                            <div class="mt-5 text-center">
                                                <h5 class="mb-1">Você tem certeza?</h5>
                                                <p class="text-slate-500 dark:text-zink-200">Deseja  realmente excluir esse registro?</p>
                                                <div class="flex justify-center gap-2 mt-6">
                                                    <button type="button" data-modal-close={{'deleteModal/'.$topic->getRelativeName()}}
                                                        class="bg-white text-slate-500 btn hover:text-slate-500 hover:bg-slate-100 focus:text-slate-500 focus:bg-slate-100 active:text-slate-500 active:bg-slate-100 dark:bg-zink-600 dark:hover:bg-slate-500/10 dark:focus:bg-slate-500/10 dark:active:bg-slate-500/10">Cancelar</button>
                                                    <button type="submit" id="remove-notes"
                                                        class="text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20">Sim, Deletar!</button>
                                                </div>
                                            </div>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>    

                        @endforeach
                    </tbody>
                </table>
                <div class="noresult" style="display: none">
                    <div class="text-center p-7">
                        <h5 class="mb-2">Sorry! No Result Found</h5>
                        <p class="mb-0 text-slate-500 dark:text-zink-200">We've searched more than 150+ Orders We did not
                            find any orders for you search.</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-end mt-4">
                <div class="flex gap-2 pagination-wrap">
                    <a class="inline-flex items-center justify-center bg-white dark:bg-zink-700 h-8 px-3 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-500 dark:[&.active]:text-custom-500 [&.active]:bg-custom-50 dark:[&.active]:bg-custom-500/10 [&.active]:border-custom-50 dark:[&.active]:border-custom-500/10 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto page-item pagination-prev disabled pagination-prev disabled"
                        href="#">
                        Anterior
                    </a>
                    <ul class="flex gap-2 mb-0 pagination listjs-pagination"></ul>
                    <a class="inline-flex items-center justify-center bg-white dark:bg-zink-700 h-8 px-3 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-500 dark:[&.active]:text-custom-500 [&.active]:bg-custom-50 dark:[&.active]:bg-custom-500/10 [&.active]:border-custom-50 dark:[&.active]:border-custom-500/10 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto page-item pagination-prev disabled pagination-next"
                        href="#">
                        Próximo
                    </a>
                </div>
            </div>
        </div>
    </div>




@endsection

@push('scripts')
    <!-- list js-->
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/flatpickr/flatpickr.min.js') }}"></script>
    <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- listjs init -->
    <script src="{{ URL::asset('build/js/pages/listjs.init.js') }}"></script>
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endpush


<script>
    // $(document).ready(function() {
    //     // $('#hoverableTable').dataTables()
    // });
</script>